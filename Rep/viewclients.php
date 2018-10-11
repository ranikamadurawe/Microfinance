<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
//give username and his password to connect shows uses already in the system
$con=mysqli_connect("localhost","madnisal","password","my_db");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Persons");

echo "<table class='table'>
<thead>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['LastName'] . "</td>";
echo "<td> <form action='../dbOperations/loadclient.php' method='post'><input type='hidden' name='name' value='", $row['FirstName'] ,"'><input class='btn btn-primary btn-sm' type='submit' name='submit' value='View'></form>";
echo "</tr>";
}
echo "</tbody></table>";

mysqli_close($con);
?>
