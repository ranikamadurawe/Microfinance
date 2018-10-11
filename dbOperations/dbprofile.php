<?php
		require 'dbOperations/dbconnect.php';
		require 'images.php';
		$display = new Images('teacher');

		//session_start();
		$databasecon= new DbConnect();
		$database=$databasecon->connect();
		$query = "UPDATE teacher SET fname='$_POST[firstname]',lname='$_POST[lastname]',email='$_POST[email]',position='$_POST[position]',phone='$_POST[telephone]',address='$_POST[address]' WHERE nic = '{$_SESSION{'nic'}}'";

		//$body="".$_SESSION['teacher']." have updated profile";

		//$querynotify = "INSERT INTO notification VALUES ('','{$body}','{$_SESSION['teacher']}',0,0,1)";


		if(isset($_POST["update"])){

			mysqli_query($database, $query);
			mysqli_query($database, $querynotify);
			echo "<script type='text/javascript'>alert('Succesfully Updated!!')</script>";
		}


		?>
			<script type=text/javascript>
			window.location='../Client/editprofile.php';
			</script>
