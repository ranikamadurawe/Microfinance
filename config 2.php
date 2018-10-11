<?php
date_default_timezone_set("Asia/Colombo");
if(session_id() == '') { session_start(); }
$db_username = 'root';
$db_password = NULL;
$db_name = 'my_db';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>