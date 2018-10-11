<?php
    require_once 'dbconnect.php';
    $dataconnect = new DbConnect();
    $link = $dataconnect->connect();

	print_r($_GET);
	$userID = ($_GET['userID']);
	$status = ($_GET['status']);
	mysqli_query($link,"UPDATE userRequest SET status='$status' WHERE userID='$userID'");
	Print '<script>window.location.assign("../viewUserRequest.php");</script>';
 ?>