<!DOCTYPE html>
<html lang="en">
   <head>
      <div class="banner">
         <h1>View User Request</h1>
      </div>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
   <body>
       <div class="col-md-12">
      <div class="address">
            <form action="viewUserRequest.php" method="GET"> 
               <label for="search">Search</label>
               <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for date..">
               <div class="timetable" style="overflow-x:auto;">
               <table id="myTable">
            	<tr>
               <th>Date</th>
               <th>UserID</th>
               <th>Name</th>
               <th>Request</th>
               <th>Status</th>
               </tr>
               <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "my_db";

               // Create connection
               $con = new mysqli($servername, $username, $password, $dbname);
   

               $counter=0;

               $result = mysqli_query($con, "SELECT * FROM UserRequest");
               while($row=mysqli_fetch_array($result)){
               ?>
               <tr>
               <td> <?php echo $row['date']; ?>
               <input type="hidden" value="<?php echo $row['date']; ?>" name="date[]">
               </td>
               <td> <?php echo $row['userID']; ?>
               <input type="hidden" value="<?php echo $row['userID']; ?>" name="userID[]">
               </td>
               <td> <?php echo $row['name']; ?>
               <input type="hidden" value="<?php echo $row['name']; ?>" name="name[]">
               </td>
               <td> <?php echo $row['request']; ?>
               <input type="hidden" value="<?php echo $row['request']; ?>" name="request[]">
               </td>
               <td><?php echo $row['status']; ?>
               <input type="hidden" value="<?php echo $row['status']; ?>" name="status[]">
               </td>
               <td> 
               </td>
               <td>
               <?php
               echo "<a href='dbOperations/changeStatus.php?status=pending&userID=".$row['userID']."' class='btn'>Pending</a>
				<a href='dbOperations/changeStatus.php?status=done&userID=".$row['userID']."' class='btn'>Done</a>";
               }
               ?>
               </td>
               </tr>
               </table>
               </div>
            <button type="submit">Exit</button></div>            
         </form>
</div>
   </div>
</div>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<?php 
   if($_SERVER['REQUEST_METHOD'] == "POST"){
      foreach($_POST['attendance_status'] as $id=>$attendance_status){  
         $admission_number=$_POST['admission_number'][$id];
         $date=date("Y-m-d");
         $qry=mysqli_query($con,"SELECT name,class FROM student WHERE admission_number='$admission_number'");
         $crow=mysqli_fetch_array($qry);
         $name=$crow['name'];
         $class=$crow['class'];
         $i=0;
         $j=0;
         $i++;
         $Result=mysqli_query($con,"INSERT INTO attendence(admission_number,name,class,attended,date) VALUES ('$admission_number','$name','$class','$attendance_status','$date')");
         if($Result){
            $j++;
         }

      }if($i==$j){
         Print '<script>alert("Attendence recorded successfully!");</script>';
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1; 'hometeacher.php'\">";
      }else{
         Print '<script>alert("An Error Occured while recoding!");</script>';
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1; 'studentattendence.php'\">"; 
      }
   }
 ?>
   <!--end of address-->
   </body>
</html>

