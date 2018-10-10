<?php
require 'dbconnect.php';
	class Images{
		private $table;
		public function __construct($table){
			$this->table=$table;
		}
		
		public function display(){
				$dataconnect = new DbConnect();
				$database=$dataconnect->connect();
			$query = "SELECT photo FROM teacher WHERE nic='943632740v' ";
			$result = mysqli_query($database,$query);
			while($row = mysqli_fetch_array($result)){
				if($row['photo']!=null){
				echo '<img  class="user" height="150" width="150" alt="Avatar" src="data:photo;base64,'.$row['photo'].'" >';
				}
				else{
					echo '<img  class="user" height="150" width="150" alt="Avatar" src="img\user.png" alt="Avatar">';
				}
			}
		}
		
		public function saveImage($image){
				$dataconnect = new DbConnect();
				$database=$dataconnect->connect();
				session_start();
				$body="".$_SESSION['teacher']." have updated profile Picture";
		
				$querynotify = "INSERT INTO notification VALUES ('','{$body}','{$_SESSION['teacher']}',0,0,1)";
			$query = "UPDATE teacher SET photo=('$image') where nic='{$_SESSION['nic']}'";
			$result = mysqli_query($database,$query);
				
			if ($result){
				echo "<script type='text/javascript'>alert('Details Succesfully Updated')</script>";
				mysqli_query($database,$querynotify);
				
			}
			else{
				echo "<script type='text/javascript'>alert('Erroe Occured...Please retry!!!!')</script>";
			}
		}
	}


?>