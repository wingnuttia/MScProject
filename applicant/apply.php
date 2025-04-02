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
	
/     
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include("../conn.php");		

    $appID = $_SESSION['ApplicantID']; 
	
	$roleID = $conn->real_escape_string(trim($_POST['roleID']));
	$create = date('y-m-d h:i:s');
	$stage='1';

		
		$_SESSION['roleID'] = $roleID;
		
    //insert new application 
	$insert = "INSERT INTO Application (ApplicantID, RoleID, DateCreated, Submitted) 
		VALUES ('$appID', '$roleID', '$create', '$submit')";
			
    if($conn->query($insert)=== true){
        
        header("location: apply.php?details=success");
		
    } else {
         echo $conn->error;
		 echo "<p>unsuccessful</p>";
    }
}      

	//$last_id = mysqli_insert_id($conn);
	
	//$ThisApplication = $last_id;
    	
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

        <title>STAR Application</title>
    </head>
	
	<body>
	
			<header>
				<h1>Application</h1> 
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
		
		</br><h3>STAR Application - <?php echo "$role"?></h3></br>
		
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

		</br>	
		
	</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>