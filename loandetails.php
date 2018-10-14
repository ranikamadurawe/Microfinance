<style>
.list_loan table, th, td{
	border:1px solid black;
	min-width:180px;
}

</style>
<div id="loan_details">
<?php
	if(isset($_GET['loan_id'])&&!empty($_GET['loan_id'])){
		$loan_id = $_GET['loan_id'];
		$query = "SELECT * FROM `loanapplications` WHERE `loan_id` = $loan_id";
		$dbconn = mysqli_connect("localhost", "jester","mafia","microfinance");
		$result = mysqli_query($dbconn, $query);
		mysqli_close($dbconn);

		if($result){
			echo '<table class="list_loan">';
			foreach(mysqli_fetch_assoc($result) as $attrib => $value){
				echo
				'<tr>'
						.'<td style="font-weight:bold; background:#ccc;	height:30px; padding-left:8px; align:left">'.$attrib.'</td>'
						.'<td style="height:30px; padding-left:15px;">'.$value.'</td>'
				.'</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>
