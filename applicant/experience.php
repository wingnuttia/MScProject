<?php
	require ('../include/appSession.php');
	
	//Set read = variable to sessionID
	
	$applicant = $_SESSION['ApplicantID'];
	
	//read experience data from database
	$read="SELECT al.ApplicantID, al.userName,ae.EmploymentID, ae.AppID, ae.EmployerName, ae.JobTitle, ae.JobSectorID, ae.current, ae.StartDate, ae.EndDate, ae.Duties, ajs.JobSectorID, ajs.JobSector
		
	FROM ApplicationExperience ae
	
	INNER JOIN  ApplicantLogin al ON ae.AppID = al.ApplicantID
	INNER JOIN ApplicationExpJobSector ajs ON  ae.JobSectorID = ajs.JobSectorID
	
	WHERE al.applicantID= '$applicant'
	
	GROUP BY StartDate 
	ORDER BY StartDate DESC;";
	
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;
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
			<?php //include '../include/navbar.php';?>
			
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
			
			</br></br>
			<div class="text-right">
				<a href="addexperi.php" class='btn btn-danger'><i class="fa fa-plus"></i> New</a>	
			</div></br>
			<?php
			
		
			
			while ($row= $result->fetch_assoc()){
				$applicant = $row['ApplicantID'];
				$empName = $row['EmployerName'];
				$jtitle = $row['JobTitle'];
				$jsect = $row['JobSector'];
				$sdate= $row['StartDate'];
				$edate=$row['EndDate'];
				$duties =$row['Duties'];
				$empid = $row['EmploymentID'];
				
				
			
			echo "
			<div>
					<table class='table table-hover table-bordered table-sm'>
						<thead>
								<tr>
									<th width='5%'></th>
									<th width='25%'>Employer Name</th>
									<th width='20%'>Sector</th>
									<th width='25%'>Job Title</th>
									<th width='10%'>Start Date</th>
									<th width='10%'>End Date</th>
									
									
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td></td>
									<td>$empName</td>
									<td>$jsect</td>
									<td>$jtitle</td>
									<td>$sdate</td>
									<td>$edate</td>
								
									
								</tr>
							</tbody>
							
								
							<thead>
								<tr>
									<th colspan = '1'>Duties</th>
									<td colspan = '4'>$duties</td>
									<td><a href='editexperi.php?editid=$empid' class='btn btn-danger'><i class='fa fa-edit'></i> Edit</a></td>
								</tr>
							</thead>
							
					</thead>
					
					</table>
				</div>";
				
				}
			
			?>
			
			
			</br>
			<div class="text-right">
						<a href="skill.php" class='btn btn-danger'title="Next">Skills <i class="fa fa-chevron-right"></i></a>	
					</div></br>
			</br>
		
		
	</div> <!--end side navbar-->
</div><!--end container-->
<?php include '../include/footer.php';?>
