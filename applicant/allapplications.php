<?php

require ('../include/appSession.php');
	
	$appID = $_SESSION['ApplicantID']; 
	
	$readapplicants="SELECT  al.ApplicantID, al.userName, al.email, ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, s.applicationID, s.AppID, s.roleID, s.appStage, St.StageID, St.Stage, r.RoleID, r.Role, qlm.AppID, qlm.qualID, qlm.lvlmatch, qsm.AppID, qsm.qualID, qsm.submatch, qgm.AppID, qgm.qualID,qgm.gradematch 
		
    FROM Application s
    
    
	INNER JOIN ApplicantLogin al ON s.AppID = al.ApplicantID
	INNER Join ApplicantDetails ad on al.ApplicantID = ad.ApplicantID
	INNER JOIN Stage St ON s.appStage = St.StageID
	INNER JOIN Role r ON s.roleID = r.RoleID
	INNER JOIN quallevelmatch qlm ON al.ApplicantID = qlm.AppID
	INNER JOIN QualSubMatch qsm ON al.ApplicantID = qsm.AppID
	INNER JOIN QualGradeMatch qgm ON al.ApplicantID = qgm.AppID
	
	WHERE al.ApplicantID = '$appID'
	GROUP BY Role
	ORDER By Role
	
	;";
	/*
	*/
	$resultsapplicants = $conn->query($readapplicants);
	
	if(!$resultsapplicants){
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
		
		<title>STAR Positions</title>
	</head>
	
	<body>
				
			<header>
				<h1>My Applications</h1>
			</header>
				
		
			</br>
			<?php //include '../include/navbar.php';?>
		<div class="container starcontain">	
		
				<?php 
				if ($userType == "4") {
					include '../include/appsidebar.php';		
				}else{
				
				include '../include/memsidebar.php';
					}
				?>
				</br>
				<div>
					<table class="table table-hover table-bordered table-sm">
						<thead>
								<tr>
									<th width="20%">Application ID</th>
									<th width="20%">Role</th>
									<th width="30%">Status</th>
								</tr>
							</thead>
				
			<?php
			
		
			
			while ($row= $resultsapplicants->fetch_assoc()){
				$appID = $row['ApplicantID'];
				$submit = $row['applicationID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$role = $row['Role'];
				$status = $row['Stage'];
				
			echo "
			
			
				
			
				
							<tbody>
								<tr>
									<td>$submit</td>
									<td>$role</td>
									<td>$status</td>
								</tr>
							</tbody>
										
					";
			}
			
			?>
			</table>
				
				
					</div>
				
			
				</br></br></br>
			</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	
	
	<?php include '../include/footer.php';?>

	