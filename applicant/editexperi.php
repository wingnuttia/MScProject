<?php



require ('../include/appSession.php');
	
	//Set read = variable to sessionID
	
	$applicant = $_SESSION['ApplicantID'];
	
	$getid = $_GET['editid'];
	
	//read experience data from database
	$read="SELECT ae.EmploymentID, ae.AppID, ae.EmployerName, ae.JobTitle, ae.JobSectorID, ae.current, ae.StartDate, ae.EndDate, ae.current ,ae.Duties, ajs.JobSectorID, ajs.JobSector
		
	FROM ApplicationExperience ae
	
	INNER JOIN ApplicationExpJobSector ajs ON ae.JobSectorID = ajs.JobSectorID
	
	WHERE ae.EmploymentID= '$getid';";
		
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;
	}	

?>



<!DOCTYPE html>
<html>
	 <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Experience</title>
    </head>
	
	<body>
	<header>		
		<h1>Employment History</h1> 
	</header>				

				
			<div class="container starcontain">
			<?php //include '../include/navbar.php';?>
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
			
			</br><h3>Employer Information</h3></br></br>
			<!--TO DO need multiinsert form -->
			<?php
			
			while ($row= $result->fetch_assoc()){
				$empid = $row['EmploymentID'];
				$empName = $row['EmployerName'];
				$jtitle = $row['JobTitle'];
				$js=$row['JobSectorID'];
				$jsect = $row['JobSector'];
				$sdate= $row['StartDate'];
				$edate=$row['EndDate'];
				$current=$row['current'];
				$duties =$row['Duties'];
			}
				?>
				
				
			
			<form class="form-horizontal" method="POST" action="editexp.php" enctype='multipart/form-data'>
				
				<div class="row group">
					<div class="col-md-4">
						<div class="form-group">
							<label for="employer">Employer Name: </label>
							<?php echo "<input type='text' class='form-control' id='employer' name='employer' value='$empName'>";?>
								
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">	
							<label for="jobtitle">Job Title: </label>
							<?php echo"<input type='text' class='form-control' id='jobtitle' name='jobtitle'  value='$jtitle'>";?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="jobsector">Job Sector: </label>
							<select class = "form-control" id="jobsector" name="jobsector">
								<option>Select Job Sector</option>
								<?php //echo "<option select value='$sid'>$jsect</option>";?>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
									$select = "SELECT * FROM ApplicationExpJobSector";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$jsect = $row['JobSector']; 
									$sid = $row['JobSectorID'];
									
									if($sid == $js){
										echo"<option selected value='$sid'>$jsect</option>";
									}else{
										echo"<option value='$sid'>$jsect</option>";	
									}
								}
								?>
							</select> 
						</div>
					</div>
				</div>
				<div class="row group">
					<div class="col-md-4">
				<div class="form-group">	
					<label for="start">Start Date: </label>
					<?php echo "<input type='date' class='form-control' id='start' name='start'  value='$sdate'>";?>
				</div>	
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="end">End Date: </label>
					<?php echo "<input type='date' class='form-control' id='end' name='end'  value='$edate'>";?>
					</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="current">Current Position</label>
					</div>
					<div>
					<?php echo " <input class='form-input' type='checkbox' id='current' name='current' value='$current'>";?>    Yes
				</div>
				</div>
				</div>
				
				<div class="row group">
					<div class="col-md-12">
						<div class="form-group">	
							<label for="duty">Summary of Duties: </label>
							<textarea class='form-control' id='duty' name='duty' rows='10' maxlength='2000' ><?php echo htmlspecialchars($duties);?></textarea>
							<small id="dutiesinfo" class="form-text text-muted" align="right">
								2000 characters maximum
							</small>
						</div>	
					</div>
				</div>
				
				<div class='form-group'>
				
				<div class="row group">
				<div class='col-md-1'>
				<?php	echo "<input type='hidden' value='$getid' name='postid'>";?>
				</div>
			
					
				<div class="text-right col-md-11">
					<button type="submit" id="edit" name="edit" class="btn btn-primary">Update</button>
				</div>
				</div>
				</div>				
				<!--<div class="form-group">	
					<button type="submit" button class="btn btn-save input-group-btn" name="continue">continue</button>
				</div>-->
			</form></br></br>
		
		
	</div> <!--end side navbar-->
</div><!--end container-->
<?php include '../include/footer.php';?>
