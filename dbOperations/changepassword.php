<?php
    session_start();
    $newpassword = trim($_POST['inputpassword']);
    $confirmation = trim($_POST['inputpassword2']);

    echo $newpassword != $confirmation; 

    if($newpassword != $confirmation){
        header("Location: ../newpassword.php");
    }

    $connection = mysqli_connect("localhost", "root", "", "microfinance");
    $username = $_SESSION['username'];
    $query = "UPDATE loginuser SET password = '$newpassword', initial_login = '1' WHERE username='$username'";
    $result = mysqli_query($connection,$query); 

    if($_SESSION['type']=='client'){
        header("Location: ../Client/clienthome.php");
    }else if($_SESSION['type']=='rep'){
        header("Location: ../Rep/rephome.php");
    }else if($_SESSION['type']=='officer'){
        header("Location: ../Officer/officerhome.php");
    }else if($_SESSION['type']=='manager'){ 
        header("Location: ../Manager/managerhome.php");
    }else if($_SESSION['type']=='admin'){
        header("Location: ../Admin/adminhome.php");
    }

?>
