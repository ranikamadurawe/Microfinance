<?php
	class DbConnect{
		public function connect(){
			$link= mysqli_connect("localhost","root","123sandun","semesterproject") or die ("SORRY!!! Server Problem");
			return $link;
		}
		
	}


?>