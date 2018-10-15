<?php
require_once '../Classes/rep.php';
require_once '../dbOperations/session.php';
// get provided username and encrypted password
$provided_lname = trim($_POST['lname']);
$provided_fname = trim($_POST['fname']);
$provided_phone = trim($_POST['phone']);
$provided_address = trim($_POST['address']);
$provided_email = trim($_POST['email']);
$provided_uname = trim($_POST['uname']);
$provided_gender = trim($_POST['gender']);
$provided_nic = trim($_POST['nic']);
$provided_bday = trim($_POST['bday']);

$rep_id = $_SESSION['rep']->getRepId();
$connection = mysqli_connect("localhost", "jester","mafia","microfinance");
$query = "INSERT INTO clients (`rep_id`, `birthday`, `username`, `first_name`, `last_name`, `email`, `tele_phone`, `address`, `gender`, `nic`, status) 
VALUES ('$rep_id', '$provided_bday', '$provided_uname', '$provided_fname', '$provided_lname', '$provided_email', '$provided_phone', '$provided_address','$provided_gender', '$provided_nic', 'pending')";

$result = mysqli_query($connection, $query);

mysqli_close($connection);

print_r($query);
header('Location: ../Rep/viewclients.php ');
?>
