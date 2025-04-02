<?php

require ('../include/staffSession.php');
	
	//Read applicant data from database
	$read="SELECT SU.UserID, SU.StaffNo, SD.UserID, SD.Forename, SD.Surname
	
	FROM StaffDetails SD
	
	INNER JOIN StaffUser SU ON SD.UserID = SU.UserID	
	
	
	WHERE SU.UserID = '$userid';";

	$result = $conn->query($read);
 
        if(!$result){
         echo $conn->error;    
        }
		
		
		
?>

<!--star/applicant-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		
		<title>STAR AdminHome</title>
	</head>
	
	<body>
		<?php
			while($row = $result->fetch_assoc()){
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$sno=$row['StaffNo'];
			}
		?>
		<div class="container starcontain">
			
			<?php include '../include/usertype.php';?>
			
			<header>
				<div class="col-md-8">
					<h1>Welcome <?php echo "$fname $sname";?></h1>
				</div>
			
			</header>
			</br>
			<?php //include '../include/navbar.php';?>
			
			<section>
				<?php include '../include/managersidebar.php';?>
			
			<div class="row">
				<?php include '../charts/extuser.php';?>
				
				
			</div>
				<?php //include '../include/totalmembers.php';?>
				
				
				
			</section>	
				</br></br></br>
			</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	
	
	<?php include '../include/footer.php';?>

	