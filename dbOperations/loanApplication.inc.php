<?php
$conn = mysqli_connect('localhost', 'root', '', 'microfinance');
session_start();
$client_id=$_SESSION['userid'];
$loan_amount=mysqli_real_escape_string($conn,$_POST['loan_amount']);
$duration=mysqli_real_escape_string($conn,$_POST['duration']);
$start_date=mysqli_real_escape_string($conn,$_POST['start_date']);


if(isset($_POST['submit'])){
	$sql="INSERT INTO loanapplications (client_id,loan_amount,duration,start_date) VALUES ('$client_id', '$loan_amount', '$duration', '$start_date');";
	mysqli_query($conn, $sql);
	header("Location: ../loanApplication.php?successfull");
	
}