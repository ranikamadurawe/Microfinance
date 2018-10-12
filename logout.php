<?php
if(session_id() == '') { session_start(); }
$_SESSION['user_login_status'] = "";
$_SESSION['characterid'] = "";

session_destroy();
header("Location: index.php"); die();
?>