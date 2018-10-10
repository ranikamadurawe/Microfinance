<?php
$conn = mysqli_connect('localhost', 'root', '', 'microfinance');
$name=mysqli_real_escape_string($conn,$_POST['name']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$birth_date=mysqli_real_escape_string($conn,$_POST['birth_date']);
$maritial_status=mysqli_real_escape_string($conn,$_POST['status']);
$qualification=mysqli_real_escape_string($conn,$_POST['qualification']);
$no_children=mysqli_real_escape_string($conn,$_POST['no_children']);
$phone_number=mysqli_real_escape_string($conn,$_POST['phone_number']);
$nic=mysqli_real_escape_string($conn,$_POST['nic']);
$business_name=mysqli_real_escape_string($conn,$_POST['business_name']);
$business_address=mysqli_real_escape_string($conn,$_POST['business_address']);
$business_employer=mysqli_real_escape_string($conn,$_POST['business_employer']);
$income=mysqli_real_escape_string($conn,$_POST['income']);
$income_type=mysqli_real_escape_string($conn,$_POST['income_type']);
$loan_amount=mysqli_real_escape_string($conn,$_POST['loan_amount']);
$maturity=mysqli_real_escape_string($conn,$_POST['maturity']);


if(isset($_POST['submit'])){
	$sql="INSERT INTO loan_details (name,address,gender,birth_date, maritial_status, qualification, no_children,phone_number,nic,business_name,business_address, business_employer,income,income_type,loan_amount,maturity) VALUES ('$name', '$address', '$gender', '$birth_date', '$maritial_status', '$qualification','$no_children','$phone_number','$nic','$business_name','$business_address','$business_employer','$income','$income_type','$loan_amount','$maturity');";
	mysqli_query($conn, $sql);
	header("Location: ../loanApplication.php?successfull");
	
}