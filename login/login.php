<?php
include('../dbOperations/dbconnect.php');
include_once '../dbOperations/session.php';
print_r($_SESSION);


if (!array_key_exists("loginalertmsg", $_SESSION)) {
    $_SESSION['loginalertmsg'] = '';
}

if (!array_key_exists("user_login_status", $_SESSION)) {
    $_SESSION['user_login_status'] = '';
}

if (array_key_exists('characterid', $_SESSION)) {
    $character = (int)$_SESSION['characterid'];
    if ($character == 1 and $_SESSION['user_login_status'] == "alreadylogedin") {
        header("Location: PatientProfile.php"); #client
    } else if ($character == 2 and $_SESSION['user_login_status'] == "alreadylogedin") {
        header("Location: docHeader.php"); #representative
    } else if ($character == 3 and $_SESSION['user_login_status'] == "alreadylogedin") {
        header("Location: pharmacyhome.php"); #officer
    } else if ($character == 4 and $_SESSION['user_login_status'] == "alreadylogedin") {
        header("Location: FinanceHome.php"); #manager
    } else if ($character == 5 and $_SESSION['user_login_status'] == "alreadylogedin") {
        header("Location: ReceptionistProfile.php"); #admin
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LOGIN</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">

</head>

<body class="text-center">


<form class="form-signin" action="loginfun.php" method="post">
    <img class="mb-4" src="assets/image/users.jpg" alt="" width="72" height="72">

    <!-- https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg  -->

    <h1 class="h3 mb-3 font-weight-normal">Log In</h1>

    <label for="inputUsername" class="sr-only">username</label>
    <input type="text" name="username" id="inputPassword" class="form-control" placeholder="Username" required
           autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div>

        <?php if ($_SESSION['loginalertmsg'] != ''): ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $_SESSION['loginalertmsg'] ?>
            </div>
            <?php $_SESSION['loginalertmsg'] = ''; ?>
        <?php endif; ?>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>
</body>
</html>

<script src="assets\js\jquery-3.3.1.js"></script>
<script src="assets\js\popper.min.js"></script>
<script src="assets\js\bootstrap.min.js"></script>


<!--   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
