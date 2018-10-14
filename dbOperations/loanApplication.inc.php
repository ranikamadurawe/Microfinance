<?php
require_once '../Classes/client.php';
require_once '../dbOperations/session.php';

$conn = mysqli_connect("localhost", "jester","mafia","microfinance");
$client_id=$_SESSION['client']->getId();
$loan_amount=trim($_POST['loan_amount']);
$duration=trim($_POST['duration']);
$start_date=trim($_POST['start_date']);


if(isset($_POST['submit'])){
	$sql="INSERT INTO loanapplications (client_id,loan_amount,interest_rate,start_date,duration) VALUES ('$client_id', '$loan_amount','12.5', '$start_date' ,'$duration')";
	$result = mysqli_query($conn, $sql);

	header('Location: ../Client/loanapplication.php ');


	
	
}
