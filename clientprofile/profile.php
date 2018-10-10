<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PROFILE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The styles -->
    <link href="css/master.css" rel="stylesheet">
     <?php
        include "header.php";
		require "Images.php";
		
    ?>

</head>

<body>
    
   

<div class="ch-container">
    <div class="row">
        
        <?php 
            include "sidebar.php";
			
         ?>

<div id="content" class="col-lg-10 col-sm-10">
            <h1 align="center" ><b>Client Profile</b></h1>
<div class=" row" align="center">
	<div class="col-md-8">
	</div>
	<div class="col-md-2" align="right">
			
				<div >
					<div class="img" align="left">
                              <?php
								$display = new Images('teacher');
								$display->display();
								?>
								
                           </div>
				</div>
			
	
	</div>
	<div class="col-md-8">
	</div>
	
	<div class="col-lg-10" align="left">
	<?php
		
		$dataconnect = new DbConnect();
		$link=$dataconnect->connect();
		//$query="select * from teacher where nic='{$_SESSION['nic']}'";
        $query="select * from teacher where nic='943632740v'";
		$result = mysqli_query($link,$query);
		
		while($row = mysqli_fetch_array($result)){
		?>
<form action=editprofile.php method="POST" class="profile">
	<table style='margin-top:50px;'>
			
            <tr>
                <td class="lcolumn" width="20%"><label for="full name">Full Name </label> :</td>
                <td><?php echo '<label  name="fullname" class="add1">'.$row['fname']. ' '.$row['lname'].'</label></br>'?></td>
            </tr>
            <tr>
                <td class="lcolumn" width="20%"><label for="id">ID Number </label> :</td>
                <td><?php echo '<label  name="nic" class="add1">'.$row['nic'].'</label></br>'?></td>
            </tr>
            <tr>
                <td class="lcolumn" width="20%"><label for="email">E-Mail </label> :</td>
                <td><?php echo '<label  name="email" class="add1">'.$row['email'].'</label></br>'?></td>
            </tr>
            <tr>
                <td class="lcolumn" width="20%"><label for="birthday">Birthday </label> :</td>
                <td><?php echo '<label  name="birthday" class="add1">'.$row['birthday'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="gender">Sex </label> :</td>
                <td><?php echo '<label  name="gender" class="add1">'.$row['gender'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="maritual">Maritual Status </label> :</td>
                <td><?php echo '<label  name="position" class="add1">'.$row['position'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="phone">TP Number </label> :</td>
                <td><?php echo '<label  name="phone" class="add1">'.$row['phone'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="bankname">Bank Name </label> :</td>
                <td><?php echo '<label  name="bank" class="add1">'.$row['bank'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="accname">Acc Number</label> :</td>
                <td><?php echo '<label  name="accnum" class="add1">'.$row['accnum'].'</label></br>'?></td>
            </tr>
			<tr>
                <td class="lcolumn" width="20%"><label for="branch">Branch </label> :</td>
                <td><?php echo '<label  name="branch" class="add1">'.$row['branch'].'</label></br>'?></td>
            </tr>
            <tr>
                <td class="lcolumn" width="20%"><label for="adress">Address </label> :</td>
                <td><?php echo '<label  name="address" class="add1">'.$row['address'].'</label></br>'?></td>
            </tr>
            <tr>
                <td class="bottom" colspan="2"><button type="submit" name="changeprofile" class="btn1"><span><b>Change Profile</b></span></button></td>
            </tr>
			
        </table>
	</form>
		<?php
		}
		?>
			
	</div>		
			
	
			

    
</div>
</div>
</body>
</html>
