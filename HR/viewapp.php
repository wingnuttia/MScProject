<?php

require ('../include/staffSession.php');
	
	
	$userid = $_SESSION['UserID']; 
	
	$applicant = $_GET['viewid'];
	
	$readapplicants="SELECT  al.ApplicantID, al.userName, al.email, ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, s.applicationID, s.AppID, s.roleID, s.appStage, St.StageID, St.Stage, r.RoleID, r.Role, qlm.AppID, qlm.qualID, qlm.lvlmatch, qsm.AppID, qsm.qualID, qsm.submatch, qgm.AppID, qgm.qualID,qgm.gradematch 
		
    FROM Application s
    
    
	INNER JOIN ApplicantLogin al ON s.AppID = al.ApplicantID
	INNER Join ApplicantDetails ad on al.ApplicantID = ad.ApplicantID
	INNER JOIN Stage St ON s.appStage = St.StageID
	INNER JOIN Role r ON s.roleID = r.RoleID
	INNER JOIN quallevelmatch qlm ON al.ApplicantID = qlm.AppID
	INNER JOIN QualSubMatch qsm ON al.ApplicantID = qsm.AppID
	INNER JOIN QualGradeMatch qgm ON al.ApplicantID = qgm.AppID
	
	WHERE s.appStage = '1' and al.ApplicantID = '$applicant'
	
	;";
	$resultapps = $conn->query($readapplicants);
	
	if(!$resultapps){
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
		
		<title>STAR Shortlist</title>
	</head>
	
	<body>
				
			<header>
			<div class="row">
				<div class="col-md-8">
					<h1>STAR Member - Application Details</h1>
				</div>
				<div class="col-md-4">
					<?php include '../include/usertype.php';?>
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
			
			<?php
			
			while ($row= $resultapps->fetch_assoc()){
				$appID = $row['ApplicantID'];
				$submit = $row['applicationID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$role = $row['Role'];
			}
				?>
			
		
	<div class="card">
		<div class="card-header" id="Qual">
			<div class ="row">
				<div class="col-sm-8">
					<h2 class="mb-0">Application Details</h2>
				</div>
				
				<div class="col-sm-4">
					<table class="table table-hover table-bordered table-sm">
						<thead>
							<tr>
								<th width="20%">Application ID</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $submit; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<?php include '../include/persdetails.php';?>
			</div>
			<div class="card-body">
				</br>
				<div>
					<?php include '../include/qualdetails.php';?>
				</div></br>
				<div>
					<?php include '../include/expdetails.php';?>
				</div>
					</br>
				<div>
					<?php //include '../include/refdetails.php';?>
				</div>
				</br>
					
				<form class="form-horizontal" method="POST" <?Php echo"action='viewapp.php?viewid=$applicant'";?> enctype='multipart/form-data'>
				<div class="row group">
				<div class="col-md-6">
						<div class="form-group">
							<label for="out">Outcome: </label>
							<select class = "form-control" id="out" name="out">
								<option>Select Outcome</option>
								
								<?php
								include('../conn.php');
									$select = "SELECT * FROM sllist";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$out = $row['Outcome']; 
									$id = $row['ID'];
					
									echo"<option value='$id'>$out</option>";	
								}
								?>
							</select>
						</div>
					</div>
					<div class="text-right col-md-6">	
						<button type = "submit" class="btn btn-primary" id="confirm" name="confirm">Confirm</button>
					</div>
					</div>
				
				</form>
					
				
					</br></br>
			</div>
		
		</div>
	
	</div> <!--end side navbar-->
		
		</div><!--end container-->
	</div>
	
	
	
	<?php include '../include/footer.php';?>

	