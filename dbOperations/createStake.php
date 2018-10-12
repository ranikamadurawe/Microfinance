<?php
  // get provided username and encrypted password
  $provided_lname = trim( $_POST['lname'] );
  $provided_fname = trim( $_POST['fname'] );
  $provided_phone = trim( $_POST['phone'] );
  $provided_address = trim( $_POST['address'] );
  $provided_email = trim( $_POST['email'] );
  $provided_uname = trim( $_POST['uname'] );
  $provided_gender = trim( $_POST['gender'] );
  $provided_nic = trim( $_POST['nic'] );
  //$provided_uname = trim( $_POST['bday'] );



  // Login to DB as a Representative
  /*$connection = mysqli_connect("localhost", "root", "", "authentication");

  // query
  $result = mysqli_query($connection, $query);

  mysqli_close($connection);

  */
  header('Location: ../Rep/viewclients.php ');
?>
