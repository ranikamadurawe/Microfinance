<?php
include_once '../dbOperations/session.php';
date_default_timezone_set("Asia/Colombo");

$db_host = 'localhost';
$db_username = 'jester';
$db_password = 'mafia';
$db_name = 'microfinance';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
