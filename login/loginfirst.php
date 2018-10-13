<?php
if(session_id() == '') { session_start(); }
if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}

if (!array_key_exists("user_login_status",$_SESSION)) {
  $_SESSION['user_login_status'] = '';
}


if($_SESSION['user_login_status'] != "alreadylogedin"){
	$_SESSION['loginalertmsg'] = 'Please Login First';
	header("Location: ../index.php"); die();
}
?>