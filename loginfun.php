<?php
include('dbOperations/config 2.php');


if (isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM loginuser WHERE username='$username' and password='$password'";
	$results = $mysqli->query($query);
	$num_rows = mysqli_num_rows($results);
	if ($num_rows==1 and $results){
		$_SESSION['username'] = $username;

		$_SESSION['user_login_status'] = "alreadylogedin";
		while ($obj = $results->fetch_object()) {
			$_SESSION['username'] = $obj->username;
			$_SESSION['characterid'] = $obj->character_id;
			// add code to find out id in his own database and add to session;
			// $_SESSION['uid'] = $obj->clientid;

			break;
		}

		$character = $_SESSION['characterid'];

        if ($character == 'Client'){
            header("Location: Client/clienthome.php"); #client
        }
        else if($character == 'Representaive'){
            header("Location: Rep/rephome.php"); #representaive
        }
        else if($character == 'Officer'){
            header("Location: Officer/officerhome.php"); #officer
        }
        else if($character == 'Manager'){
            header("Location: Manager/managerhome.php"); #manager
        }
        else if($character == 'Admin'){
            header("Location: Admin/adminhome.php"); #admin
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
