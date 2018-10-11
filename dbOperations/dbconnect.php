<?php

	class DbConnect{
		public function connect(){
			$link= mysqli_connect("localhost","root","","my_db") or die ("SORRY!!! Server Problem");
			return $link;
		}

	}


?>
