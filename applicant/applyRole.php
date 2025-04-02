<?php
//STAR/Applicant/Application

require ('../include/appSession.php');	

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
	

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include("../conn.php");		

    $appID = $_SESSION['ApplicantID']; 
	
	$roleID = $conn->real_escape_string(trim($_POST['roleID']));
	$create = date('y-m-d h:i:s');
	$submit = date('y-m-d h:i:s');

	$_SESSION['roleID'] = $roleID;
	
	$readexperience="SELECT al.ApplicantID, al.userName,ae.EmploymentID, ae.AppID, ae.EmployerName, ae.JobTitle, ae.JobSectorID, ae.current, ae.StartDate, ae.EndDate, ae.Duties, ajs.JobSectorID, ajs.JobSector, rre.ID, rre.roleID, rre.sectorID, Role.RoleID, Role.Role, Role.active
		
	FROM ApplicationExperience ae
	
	INNER JOIN ApplicantLogin al ON ae.AppID = al.ApplicantID
	INNER JOIN ApplicationExpJobSector ajs ON  ae.JobSectorID = ajs.JobSectorID
	INNER JOIN RoleRequiredExp rre ON ae.JobSectorID= rre.sectorID
	INNER JOIN Role ON rre.roleID = Role.RoleID
	
	WHERE al.applicantID= '$applicant' ;";/*AND Role.RoleID = $Role*/
	
	$resultexperience = $conn->query($readexperience);
	
	if(!$resultexperience){
		echo $conn->error;
	}
	
	$readqual="SELECT al.ApplicantID, al.userName, qual.QualID, qual.AppID, qual.SubjectID, qual.QualLevelID, qual.GradeID,  qual.countyID, qual.Date, ql.LID, ql.Level, ql.EdID, ql.active, qs.SubID, qs.subject, qs.LID, qs.active, qg.GID, qg.Grade, qg.LID, Country.countryID, Country.Country
		
	FROM Qualification qual
	
	INNER JOIN ApplicantLogin al ON  qual.AppID = al.ApplicantID
	INNER JOIN QualLevel ql ON qual.QualLevelID = ql.LID
	INNER JOIN Country ON qual.countyID = Country.countryID
	INNER JOIN QualSubject qs ON  qual.SubjectID = qs.subid
	INNER JOIN QualGrade qg ON qual.GradeID = qg.GID
			
	WHERE al.ApplicantID = '$applicant';";
	
	$resultqual = $conn->query($readqual);
	
	if(!$resultqual){
		echo $conn->error;
	}
	
}
//a href='apply.php?editid=$roleID'
    	
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

	<script>
			$(document).ready(function(){
			$('#roleID').on('change', function() {
				if ( this.value > '0'){
					$("#application").show();
					
				}
				else{
					$("#application").hide();
					
				}
			});
		});
	</script>


        <title>STAR Application</title>
    </head>
	
	<body>
	
	
			<header>
				<h1>STAR Application</h1> 
			</header>
		<div class="container starcontain">
		
			<?php 
				if ($userType == "4") {
					include '../include/appsidebar.php';		
				}else{
					include '../include/memsidebar.php';
				}
			?>
	
		<div class="container starcontain">
		
			</br><h3>STAR Application</h3></br>
			
			<p>Select role you want to apply to</p>
			</br>
		
			<form class="form-horizontal" method="POST" action="application.php" enctype='multipart/form-data'>
				<div class="row group">
				<div class="col-md-8">
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
					</div>
					
					<!---<a href='apply.php?roleid=$roleid' class='btn btn-danger'>Edit</a></td>-->
					
					<div class='col-md-1'>
				<?php	echo "<input type='hidden' value='$roleid' name='postid'>";?>
				</div>
					<div class="col-md-2">	
						<button type="submit" class="btn btn-danger" id="view" name="view" >Select</button>
					</div>
				</div>
			</form>
			
			<div class="container application" style="display:none;" id="Requirements">
			
			</div>
			
			<div class="container application" style="display:none;" id="application">
			
				<?php include '../include/persdetails.php';?>
				</br>
				
				<?php include '../include/appdetails.php';?>
				
				<form class="form-horizontal" method="POST" action="apply.php" enctype='multipart/form-data'>
					<div class="row group">	
					<!--<div class="text-right col-md-6">	
						<button type="submit" class="btn btn-danger" id="viewapp" name="viewapp" >view</button>
					</div>	-->
					<div class="text-right col-md-6">	
						<button type="submit" class="btn btn-danger" id="s" name="apply" >Submit</button>
					</div>
					</div>
				</form>
			
				</br></br>
			
				
				</br></br>
			
			</div>
		
	</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>
