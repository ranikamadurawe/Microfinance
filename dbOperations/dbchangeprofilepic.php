<?php

		
		require '../Images.php';
		$display = new Images(`clients`);
		
		
		$databasecon= new DbConnect();
		$database=$databasecon->connect();
		if(!empty($_FILES['image']['tmp_name'])){
			if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
				echo "<script type='text/javascript'>alert('Pleace select an Image')</script>";
			}
			else{
				$image=addslashes($_FILES['image']['tmp_name']);
				$image=file_get_contents($image);
				$image=base64_encode($image);
				$display->saveImage($image);
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Pleace select an Image')</script>";
		}
		
		//header('Location: ../Client/editprofile.php ');
		?>
			<script type=text/javascript>
			window.location='editprofile.php';
			</script>
		<?php
		
		
		

    ?>