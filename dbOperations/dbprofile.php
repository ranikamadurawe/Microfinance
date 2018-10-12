<?php

require 'dbconnect.php';
require '../images.php';
$display = new Images('teacher');

print_r($_SESSION);
$databasecon = new DbConnect();
$database = $databasecon->connect();
$id = $_SESSION['client']->getId();
$query = "UPDATE clients SET first_name='$_POST[firstname]',last_name='$_POST[lastname]',email='$_POST[email]',marital_status='$_POST[position]',tele_phone='$_POST[telephone]',address='$_POST[address]' WHERE client_id = '$id'";

//$body="".$_SESSION['teacher']." have updated profile";

//$querynotify = "INSERT INTO notification VALUES ('','{$body}','{$_SESSION['teacher']}',0,0,1)";


if (isset($_POST["update"])) {

    mysqli_query($database, $query);
}


?>
<script type=text/javascript>
    window.location = '../Client/viewprofile.php';
</script>
