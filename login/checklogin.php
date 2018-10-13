<?php
include_once '../dbOperations/session.php';
if (!isset($_SESSION['type'])){
    header("Location: ../login/login.php");
}