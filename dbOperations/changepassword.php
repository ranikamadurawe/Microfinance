<?php
    require 'dbconnect.php';

    $newpassword = trim($_POST['inputpassword']);
    $connection = mysqli_connect("localhost", "root", "", "microfinance");

?>
