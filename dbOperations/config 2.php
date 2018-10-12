<?php
include_once '../dbOperations/session.php';
date_default_timezone_set("Asia/Colombo");
$db_username = 'root';
$db_password = '';
$db_name = 'microfinance';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
