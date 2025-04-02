<?php

require ('../include/staffSession.php');

	include("../conn.php");		
		
	$userid = $_SESSION['UserID']; 
	
	$readapplications="SELECT  al.ApplicantID, al.userName, al.email, ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, s.applicationID, s.AppID, s.roleID, s.appStage, St.StageID, St.Stage, r.RoleID, r.Role, rrq.ID, rrq.QualID, rrq.RoleID, rrq.active
		
    FROM Application s
    
    
	INNER JOIN ApplicantLogin al ON s.AppID = al.ApplicantID
	INNER Join ApplicantDetails ad on al.ApplicantID = ad.ApplicantID
	INNER JOIN Stage St ON s.appStage = St.StageID
	INNER JOIN Role r ON s.roleID = r.RoleID
	INNER JOIN RoleReqQual rrq ON s.roleID = rrq.RoleID


	
	WHERE s.appStage = '1'
	
	
	ORDER By Role
	
	;";
	/*GROUP BY StartDate 
	ORDER BY StartDate DESC*/
	
	$resultsapplications = $conn->query($readapplications);
	
	if(!$resultsapplications){
		echo $conn->error;
	}
		
	/*$quallevel="SELECT al.ApplicantID, qlm.ID, qlm.AppID, qlm.qualID, sum(qlm.lvlmatch)AS lmatch, a.applicationID, a.AppID, a.roleID, a.appStage, r.RoleID, r.Role
	
	from quallevelmatch qlm
	
	INNER JOIN ApplicantLogin al ON alm.AppID = al.ApplicantID
	INNER Join Application a ON qlm.AppID = a.applicationID
		INNER JOIN Role r ON a.roleID = r.RoleID
	
	WHERE AppID = 'appID';";
	
	";*/
	
	
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
		
		<title>STAR Shortlist</title>
	</head>
	
	<body>
				
			<header>
				<div class="row">
					<div class="col-md-8">
						<h1>Applications to Shortlist</h1>
					</div>
					<div class="col-md-4">
						<?php include '../include/usertype.php';?>
					</div>
				</div>
			</header>
				
		
			</br>
			<?php //include '../include/navbar.php';?>
		<div class="container starcontain">	
			<section>
				<?php 
					if ($userType == "1") {
						include '../include/adminsidebar.php';		
					}else if($userType == "2") {
						include '../include/hrsidebar.php';
					}else {
						include '../include/managersidebar.php';
					}
				?>
				
				<div>
					<table class="table table-hover table-bordered table-sm">
						<thead>
								<tr>
									<th width="10%"></th>
									<th width="10%">ID</th>
									<th width="15%">Role</th>
									<th width="15%">Forename</th>
									<th width="15%">Surname</th>
									
									
								</tr>
							</thead>
				
			<?php
			while ($row= $resultsapplications->fetch_assoc()){
				$appID = $row['ApplicantID'];
				$submit = $row['applicationID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$role = $row['Role'];
				
			echo "
			
			
				
			
				
							<tbody>
								<tr>
									<td><a href='viewapp.php?viewid=$appID' class='btn btn-danger'>View</a></td>
									<td>$submit</td>
									<td>$role</td>
									<td>$fname</td>
									<td>$sname</td>
							
								</tr>
							</tbody>
										
					";
			}
			
			?>
			</table>
				
				
					</div>
				
			</section>	
				</br></br></br>
			</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	
	
	<?php include '../include/footer.php';?>

	