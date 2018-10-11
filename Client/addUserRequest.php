<!DOCTYPE html>
<html>
<head>
   <title>User request</title>
</head>
   <body>
      <div class="banner">
         <h1>Add User Request</h1>
      </div>
      <form action="addUserRequest.php" method="POST">
            User ID: <input type="text" name="userID" required="userID"/> <br/> <br/>
            UserName:  <input type="text" name="userName" required="userName"/> <br/> <br/>
            Enter your request:<br/> <textarea rows="4" cols="50" name="request" required="required"> </textarea><br/> <br/>
            <input type="submit" value="SUBMIT"/>
      </form>
      <?php
      include_once '../dbOperations/dbconnect.php';
         if($_SERVER["REQUEST_METHOD"] == "POST"){

             $dataconnect = new DbConnect();
             $link = $dataconnect->connect(); //Connect to database.
        
         $userID = htmlentities($_POST['userID']);
         $name = ($_POST['userName']);
         $request =($_POST['request']);
         $date = date('Y-m-d H:i:s');
         $status = "pending";
         $qry = mysqli_query($link,"INSERT INTO userRequest (userID, name, request, date, status) VALUES ('$userID','$name', '$request', '$date', ' $status')");

   if($qry){
   Print '<script>alert("Successfully Recorded!");</script>'; // 
   Print '<script>window.location.assign("addUserRequest.php");</script>';
}
}

?>
   </body>
</html>
