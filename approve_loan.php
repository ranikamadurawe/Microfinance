
<div id="loan_list">
<?php
	if(isset($_GET['loan_id'])&&!empty($_GET['loan_id'])){
		$loan_id = $_GET['loan_id'];
		$query ="SELECT `client_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`".
				"FROM `clients` NATURAL JOIN `loanapplications`".
				"WHERE `loan_id` = '$loan_id' ".
				"LIMIT 1";

		$dbconn = mysqli_connect("localhost", "madnisal", "password", "my_db");
		$result = mysqli_fetch_row(mysqli_query($dbconn, $query));
		if($result){
			$customer_id = $result[0];
			$customer_name = $result[1];
			$approved_status = $result[2];
			if(isset($_GET['approve'])){
				$query ="UPDATE `loanapplications`".
					"SET `approved` = '1'".
					"WHERE `loan_id` = '$loan_id' ".
					"LIMIT 1";
				$aproval_status = "aproved";
			}
			else if(isset($_GET['reject'])){
				$query ="UPDATE `loanapplications`".
					"SET `approved` = '0'".
					"WHERE `loan_id` = '$loan_id' ".
					"LIMIT 1";
				$aproval_status = "disaproved";
			}
			else if(isset($_GET['reset'])){
				$query ="UPDATE `loanapplications`".
					"SET `approved` = NULL ".
					"WHERE `loan_id` = '$loan_id' ".
					"LIMIT 1";
				$aproval_status = "Reset";
			}
		$result = mysqli_query($dbconn, $query);
		mysqli_close($dbconn);
		if($result){
			echo "</br>"
					."<div align='center'>Customer $customer_id, $customer_name's loan application $loan_id has $aproval_status Successfully.</div>"
					."<br>"
					."<div align='right'><a class='_button' href='approve_loan.php'><-Back to List</a></div>";
			}
		}
?>
<?php
	}
	else{
?>

<div id="Search bar" align="right">
	<form action="" method="GET">
		<input id="search_id" name="search_id" type="text" placeholder="Customer ID">
		<input type="submit" value="Search">
	</form>
</div>
</br>

<?php
	if (isset($_GET['search_id'])&&!empty($_GET['search_id'])){
		$search_text = $_GET['search_id'];
		$query = "SELECT `client_id`, `loan_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`".
				"FROM `clients` NATURAL JOIN `loanapplications`".
				"WHERE `client_id` LIKE '$search_text%' OR CONCAT(`first_name`, ' ', `last_name`) LIKE '%$search_text%' OR `loan_id` LIKE '$search_text%'";
		echo "<div align='left'><a class='_button' href='approve_loan'><-Back to Full List</a></br></br></div>";
	}
	else{
		$query = "SELECT `client_id`, `loan_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`".
				"FROM `clients` NATURAL JOIN `loanapplications`";
	}
		$dbconn = mysqli_connect("localhost", "madnisal", "password", "my_db");
		$result = mysqli_query($dbconn, $query);
		mysqli_close($dbconn);
		if($result){
			echo '<table class="list_loan">'.
				'<tr><th>Client ID</th><th>Loan ID</th><th>Name</th><th>Approve</th></tr>';

			while($customer = mysqli_fetch_row($result)){
				$status=$customer[3]==NULL?1:0;
				echo
				'<tr>'
						.'<td width="auto"><a class="_button" href="profile.php?client_id='.$customer[1].'">'.$customer[0].'</a></td>'
						.'<td width="auto""><a class="_button" href="viewloandetails.php?loan_id='.$customer[1].'">'.$customer[1].'</a></td>'
						.'<td width="auto"">'.$customer[2].'</td>'
						.'<td align="center">';
				if($status){
					echo '<a class="_button" href="?loan_id='.$customer[1].'&approve=#">Approve</a></br>'
							.'<a class="_button" href="?loan_id='.$customer[1].'&reject=#">Reject</a>';
				}
				else {
					$text = $customer[3]==0?"rejected":"Appoved";
					echo $text.'</br><a class="_button" href="?loan_id='.$customer[1].'&reset=#">Reset</a>';
				}
				echo '</td>'
				.'</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>
