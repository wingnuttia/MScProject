<?php
require ('../include/appSession.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include("../conn.php");		

    $appID = $_SESSION['ApplicantID']; 
    $employer = $conn->real_escape_string(trim($_POST['employer']));
    $jobtitle=$conn->real_escape_string(trim($_POST['jobtitle']));
   
    $start=$conn->real_escape_string(trim($_POST['start']));
    $end=$conn->real_escape_string(trim($_POST['end']));
    $jobsector=$conn->real_escape_string(trim($_POST['jobsector']));
    $duties=trim($_POST['duty']);
	$date = date('y-m-d h:i:s');
	if (!empty($current)) {
            $current=$_POST['current'];
	}else{
			$current= NULL;
	}
	if(!empty($end)){
	$diff=date_diff($start,$end);
	}else{
		$diff=date_diff($start,$date);
	}
	
	/*if (!empty($end)) {
            $end=$conn->real_escape_string(trim($_POST['end']));
	}else{
			$end= NULL;
	}
	
	$insert = "INSERT INTO ApplicationExperience (AppID, EmployerName, JobTitle, JobSectorID, current, StartDate, EndDate, Duties, created) 
	VALUES('$appID','$employer', '$jobtitle', '$jobsector', '$current','$start', '$end', '$duties', '$date');";*/
	
	
	if (!empty($end)) {
            $insert = "INSERT INTO ApplicationExperience (AppID, EmployerName, JobTitle, JobSectorID, current, StartDate, EndDate, Duties, created ) 
	VALUES('$appID','$employer', '$jobtitle', '$jobsector', '$current','$start', '$end', '$duties', '$date');";
	}else{
		$insert = "INSERT INTO ApplicationExperience (AppID, EmployerName, JobTitle, JobSectorID, current, StartDate, EndDate, Duties, created) 
	VALUES('$appID','$employer', '$jobtitle', '$jobsector', '$current','$start', NULL, '$duties', '$date');";
	}
	
	
	
    //insert applicant details
    
  
   if($conn->query($insert)=== true){
        
        header("location: experience.php?details=success");
		
    } else {
         echo $conn->error;
		 echo "<p>unsuccessful</p>";
    }
}
?>

<!--Need Session Variable for ApplicationID-->

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
					
			<?php 
				if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
	
			</br>
			<!--TO DO need multiinsert form -->
			<form class="form-horizontal" method="POST" action="addexperi.php" enctype='multipart/form-data'>
				
				<div class="row group">
					<div class="col-md-4">
						<div class="form-group">
							<label for="employer">Employer Name: </label>
							<input type="text" class="form-control" id="employer" name="employer" placeholder="Employer Name">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">	
							<label for="jobtitle">Job Title: </label>
							<input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="jobsector">Job Sector: </label>
							<select class = "form-control" id="jobsector" name="jobsector">
								<option>Select Job Sector</option>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
									$select = "SELECT * FROM ApplicationExpJobSector";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$jsect = $row['JobSector']; 
									$id = $row['JobSectorID'];
					
									echo"<option value='$id'>$jsect</option>";	
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
					<input type="date" class="form-control" id="start" name="start" placeholder="dd/mm/yyyy">
					
					<!--<script type="text/javascript">
						function checkstart() {
							var dateString = document.getElementById('start').value;
							var myDate = new Date(dateString);
							var today = new Date();
							if ( myDate > today ) { 
								$('#start').after('<p>You cannot enter a date in the future!.</p>');
								return false;
							}
							return true;
						}
					</script>- Need Validation so that start date is not greater than today-->
				</div>	
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="end">End Date: </label>
					<input type="date" class="form-control" id="end" name="end" placeholder="dd/mm/yyyy">
					</div><!--Need Validation so that end date is not before than start date-->
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="current">Current Position</label>
					</div>
					<div>
					<input class="form-input" type="checkbox" id="current" name="current" value="current">    Yes
				</div>
				</div>
				</div>
				
				<div class="row group">
					<div class="col-md-12">
						<div class="form-group">	
							<label for="duty">Summary of Duties: </label>
							<textarea class="form-control" id="duty" name="duty" rows="10" maxlength="2000"></textarea>
							<small id="dutiesinfo" class="form-text text-muted" align="right">
								2000 characters maximum
							</small>
						</div>	
					</div>
				</div>
					
				<div class="text-right col-md-12">
					<button type="submit" id="addexp" name="addexp" class="btn btn-primary">Add</button>
				</div>
					
				<!--<div class="form-group">	
					<button type="submit" button class="btn btn-save input-group-btn" name="continue">continue</button>
				</div>-->
			</form></br></br>
		
		
	</div> <!--end side navbar-->
</div><!--end container-->
<?php include '../include/footer.php';?>
