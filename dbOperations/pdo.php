<?php
//$pdo = new PDO('mysql:host=localhost; port=3306; dbname=my_db','madnisal','password');
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=microfinance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
