<?php 
include('config 2.php');


if (isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$mdpassword = md5($password);
	$query = "SELECT * FROM loginuser WHERE username='$username' and password='$password'";
	$results = $mysqli->query($query);
	$num_rows = mysqli_num_rows($results);
	if ($num_rows==1 and $results){
		$_SESSION['username'] = $username;		
		$_SESSION['user_login_status'] = "alreadylogedin";
		while ($obj = $results->fetch_object()) {
			$_SESSION['username'] = $obj->username;
			$_SESSION['characterid'] = $obj->character_id;
			break;
		}

		$character = $_SESSION['characterid'];

        if ($character == 'Client'){
            header("Location: Client/addUserRequest.php"); #client
        }
        else if($character == 'Representaive'){
            header("Location: docHeader.php"); #representaive
        }
        else if($character == 'Officer'){
            header("Location: pharmacyhome.php"); #officer
        }
        else if($character == 'Manager'){
            header("Location: FinanceHome.php"); #manager
        }
        else if($character == 'Admin'){
            header("Location: ReceptionistProfile.php"); #admin
        }        
	}
	else{
		$_SESSION['loginalertmsg'] = 'Password or Username is Incorrect';
		header("Location: index.php");
	}
}
else{
	$_SESSION['loginalertmsg'] = 'Please Fill.';
	header("Location: index.php");
}









?>