<?php
$provided_id = ($_POST['client_id']);
echo $provided_id;

$connection = mysqli_connect("localhost", "jester","mafia","microfinance");

$query = "UPDATE clients set status ='revoked' WHERE clients.client_id = '$provided_id'";
$result = mysqli_query($connection, $query);

mysqli_close($connection);


header('Location: ../Admin/araccounts.php');
