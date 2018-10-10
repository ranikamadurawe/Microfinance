<!DOCTYPE html>
<html lang="en">
<head>
<title> | Apply For Loan</title>
    <!-- content -->
	<form style="border:1px solid #ccc" method ='POST' action="loanApplication.inc.php">
		 <h2 >Apply For Loan</h2>
		<p>Please fill in this form to apply for loan</p>
		<h3>Personal details</h3>
		<label for="fullName"><b>Full Name</b></label><br><br>
		<input type="text" placeholder="Enter full name" name="name" required><br><br>

		<label for="address"><b>Address</b></label><br>
		<input type="text" placeholder="Enter address" name="address" required><br><br>

		<label for="gender"><b>Gender</b></label><br>
		Male<input type="radio"  name="gender" value= "male" checked><br>
		Female<input type="radio"  name="gender" value= "female" ><br><br>
		
		<label for="bdate"><b>Birth date</b></label><br>
		<input type="date" placeholder="Enter birth date" name="birth_date" min="1940-01-01" max="2000-12-31" required><br><br>

		<label for="maritialStatus"><b>Maritial status</b></label><br>
		Single<input type="radio"  name="status" value ="single" checked><br>
		Married<input type="radio"  name="status" value ="married"><br><br>

		<label for="education"><b>Education</b></label><br>
		<input type="text" placeholder="Enter educational qualification" name="qualification" required><br><br>

		<label for="no_children"><b>Number of children and dependants</b></label><br>
		<input type="number" placeholder="Enter number of children and dependants" name="no_children" required><br><br>

		<label for="phoneNumber"><b>Phone number</b></label><br><br>
		<input type="number" placeholder="Enter phone number" name="phone_number" required><br><br>
		
		<h3>Identity</h3>
		<label for="NIC"><b>NIC number</b></label><br>
		<input type="text" placeholder="Enter National Identity number" name="nic" required><br><br>

		<h3>Business details</h3>
		<label for="business_name"><b>Name of business</b></label><br>
		<input type="text" placeholder="Enter name of business" name="business_name"><br><br>

		<label for="business_address"><b>Address of business</b></label><br>
		<input type="text" placeholder="Enter address of business" name="business_address"><br><br>

		<h3>Employment details</h3>
		<label for="employer_name"><b>Name of employer</b></label><br>
		<input type="text" placeholder="Enter name of employer" name="business_employer"><br><br>

		<label for="income"><b>Income</b></label><br>
		<input type="number" placeholder="Enter amount of income" name="income" required><br><br>

		<label for="income_type"><b>Income Type</b></label><br>
		Regular<input type="radio"  name="income_type" value="regular"><br><br>
		Irregular<input type="radio"  name="income_type" value="irregular"><br><br>

		<h3>Loan details</h3>
		<label for="loan_amount"><b>Requested loan amount</b></label><br>
		<input type="number" placeholder="Enter requested loan loan_amount" name="loan_amount" required><br><br>

		<label for="maturity"><b>Maturity</b></label><br>
		<input type="text" placeholder="Enter maturity period" name="maturity" required=""><br><br>

		<div >
		  <button name= "submit" type="submit">Submit Application</button>
		</div>
	</form>
</body>
</html>