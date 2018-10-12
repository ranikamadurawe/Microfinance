<?php

	class DbConnect{
		public function connect(){
			$link= mysqli_connect("localhost","root","","microfinance") or die ("SORRY!!! Server Problem");
			return $link;
		}

	}


?>
