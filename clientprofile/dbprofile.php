<?php

		
		require 'images.php';
		$display = new Images('client');
		
		//session_start();
		$databasecon= new DbConnect();
		$database=$databasecon->connect();
		$query = "UPDATE teacher SET fname='$_POST[firstname]',lname='$_POST[lastname]',email='$_POST[email]',position='$_POST[position]',phone='$_POST[telephone]',address='$_POST[address]' WHERE nic = '{$_SESSION{'nic'}}'";
		
		
		
	
		if(isset($_POST["update"])){
			
			mysqli_query($database, $query);
			echo "<script type='text/javascript'>alert('Succesfully Updated!!')</script>";
		}
		
		
		?>
			<script type=text/javascript>
			window.location='editprofile.php';
			</script>
		