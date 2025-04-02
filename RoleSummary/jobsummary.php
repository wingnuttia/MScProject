<?php

require ('../include/appSession.php');
include("../conn.php");
	if(!isset($_SESSION['ApplicantID'])){
		header('location: ../index.php');
		/**echo '<p> invalid session<p>';**/
	}else{
        echo $_SESSION['userName'];
        echo $_SESSION['ApplicantID'];
	echo $_SESSION['userTypeID'];	}
		
		//Set read = variable to sessionID
	
	$applicant = $_SESSION['ApplicantID'];
	
		
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		<script>
			$(document).ready(function(){
			$('#roleID').on('change', function() {
				if ( this.value == '1'){
					$("#clerical").show();
					$("#electrician").hide();
					$("#Mechanical").hide();
					$("#ITTEC").hide();
					$("#GenLab").hide();
				}else if ( this.value == '2'){
					$("#clerical").hide();
					$("#electrician").show();;
					$("#Mechanical").hide();
					$("#ITTEC").hide();
					$("#GenLab").hide();
				}else if ( this.value == '3'){
					$("#clerical").hide();
					$("#electrician").hide();
					$("#Mechanical").show();
					$("#ITTEC").hide();
					$("#GenLab").hide();
				}else if ( this.value == '4'){
					$("#clerical").hide();
					$("#electrician").hide();
					$("#Mechanical").hide();
					$("#ITTEC").show();
					$("#GenLab").hide();
				}else if ( this.value == '5'){
					$("#clerical").hide();
					$("#electrician").hide();
					$("#Mechanical").hide();
					$("#ITTEC").hide();
					$("#GenLab").show();
				}
			});
		});
	</script>
	
		<title>STAR</title> <!--Change this each page--> 
	</head>
	
	<body>
		<?php// include '../include/navbar.php';?>
		<header>
			<h1>STAR Role - Job Summary</h1> 
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
		
		<p>Select Role to view Job Details
		
		<form class="form-horizontal" method="POST" action="jobsummary.php" enctype='multipart/form-data'>
				<div class="row group">
					<div class="form-group">
						<label for="roleID">Role Applying for: </label>
						<select class = "form-select" id="roleID" name="roleID">
							<option>Select Role</option>
							<!--/**Use php here for title drop down**/-->
									<?php
								include('../../conn.php');
									$select = "SELECT * FROM Role";
										$result = $conn->query($select);

								while($row=$result->fetch_assoc()){
									$role = $row['Role']; 
									$id = $row['RoleID'];
						
										echo"<option value='$id'>$role</option>";	
								}
							
							?>
						</select>
					</div>
					<!--<div class="col-md-6">	
						<button type="submit" class="btn btn-danger" id="view" name="view" >View</button>
					</div>-->
				</div>
			</form>
		
		<div class="container clerical" style="display:none;" id="clerical">
				<?php include '../RoleSummary/ClericalRole.php';?>
			</div>
			<div class="container electrician" style="display:none;" id="electrician">
				<?php include '../RoleSummary/ElectricianRole.php';?>
			</div>
			<div class="container Mechanical" style="display:none;" id="Mechanical">
				<?php include '../RoleSummary/MechanicalRole.php';?>
			</div>
			<div class="container ITTEC" style="display:none;" id="ITTEC">
				<?php include '../RoleSummary/ITTech.php';?>
			</div>
			<div class="container GenLab" style="display:none;" id="GenLab">
				<?php include '../RoleSummary/GenLab.php';?>
			</div>
		
		
		</div> <!--Container end-->
		
		</div> <!--closes sidebar dont remove-->
<?php include '../include/footer.php';?>