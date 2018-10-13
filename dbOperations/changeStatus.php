<?php
require_once 'dbconnect.php';
$dataconnect = new DbConnect();
$link = $dataconnect->connect();

print_r($_GET);
$request_id = ($_GET['reqID']);
$status = ($_GET['status']);
mysqli_query($link, "UPDATE userrequests SET status='$status' WHERE request_id='$request_id'");
Print '<script>window.location.assign("../Admin/viewUserRequest.php");</script>';
?>