<?php
//STAR/Applicant/Application

require ('../include/appSession.php');	

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include("../conn.php");		

    $appID = $_SESSION['ApplicantID']; 
	
	$roleID = $conn->real_escape_string(trim($_POST['arole']));
	$create = date('y-m-d h:i:s');
	$stage='1';
		
	mysqli_query($conn, "START TRANSACTION");
		
	$insertapplic =mysqli_query($conn,"INSERT INTO Application (AppID, roleID, appStage, DateCreated) VALUES ('$appID', '$roleID', '$stage', '$create');");
	
	$last_id = mysqli_insert_id($conn);
	
	$submitted = $last_id;
	
	$insertstage = mysqli_query($conn,"INSERT INTO applicationStageRec (application, stage, stageDate)VALUES('$submitted', '$stage', '$create');");
		
	if($insertapplic && $insertstage){
			mysqli_query($conn, "COMMIT");
			header("location: ../email/submitted.php");
		}else{
			mysqli_query($conn, "ROLLBACK");
			echo $conn->error;
			echo "<p>unsuccessful</p>";
		}
		//mysqli_query($conn, "SET AUTOCOMMIT=1");
		
    //insert new application 
	/*$insertapplic = "INSERT INTO Application (AppID, roleID, appStage, DateCreated) VALUES ('$appID', '$roleID', '$stage', '$create');";
			
    
	$last_id = mysqli_insert_id($conn);
	
	$submitted = $last_id;
	
	$insertstage = mysqli_query($conn,"INSERT INTO applicationStageRec (application, stage, stageDate)VALUES('$submitted', '$stage', '$create');");

	if($conn->query($insertapplic)=== true){
        
        header("location: ../email/submitted.php");
		
    } else {
         echo $conn->error;
		 echo "<p>unsuccessful</p>";
    }*/
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

	<script>
			$(document).ready(function(){
			$('#arole').on('change', function() {
				if ( this.value == '1'){
					$("#Requirements1").show();
					$("#application").show();
					$("#Requirements2").hide();
					$("#Requirements3").hide();
					$("#Requirements4").hide();
					$("#Requirements5").hide();
				}else if ( this.value == '2'){
					$("#Requirements1").hide();
					$("#application").show();
					$("#Requirements2").show();
					$("#Requirements3").hide();
					$("#Requirements4").hide();
					$("#Requirements5").hide();
				}else if ( this.value == '3'){
					$("#Requirements1").hide();
					$("#application").show();
					$("#Requirements2").hide();
					$("#Requirements3").show();
					$("#Requirements4").hide();
					$("#Requirements5").hide();
				}else if ( this.value == '4'){
					$("#Requirements1").hide();
					$("#application").show();
					$("#Requirements2").hide();
					$("#Requirements3").hide();
					$("#Requirements4").show();
					$("#Requirements5").hide();
				}else if ( this.value == '5'){
					$("#Requirements1").hide();
					$("#application").show();
					$("#Requirements2").hide();
					$("#Requirements3").hide();
					$("#Requirements4").hide();
					$("#Requirements5").show();
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
	
		<!--<div class="container starcontain">
		
			</br><h3>STAR Application</h3>-->
			</br>
			<div>
				<p>Select role you want to apply to</p>
			</br>
			</div>
		
			<form class="form-horizontal" method="POST" action="application.php" enctype='multipart/form-data'>
			
				<div class="row group">
					<div class="col-md-9">
						<div class="form-group">
							<label for="arole">Role Applying for: </label>
							<select class = "form-select" id="arole" name="arole">
								<option>Select Role</option>
								<!--/**Use php here for title drop down**/-->
										<?php
									include('../conn.php');
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
				</div></br>
				
				<div class="container Requirements1" style="display:none;" id="Requirements1">
					<?php include '../include/requirements.php';?>
				</div>
				<div class="container Requirements2" style="display:none;" id="Requirements2">
					<?php include '../include/requirements2.php';?>
				</div>
				<div class="container Requirements3" style="display:none;" id="Requirements3">
					<?php include '../include/requirements3.php';?>
				</div>
				<div class="container Requirements4" style="display:none;" id="Requirements4">
					<?php include '../include/requirements4.php';?>
				</div>
				<div class="container Requirements5" style="display:none;" id="Requirements5">
					<?php include '../include/requirements5.php';?>
				</div>
				</br>
				
				<div class="container application" style="display:none;" id="application">
				
					<?php include '../include/persdetails.php';?>
					</br>
					<?php include '../include/qualdetails.php';?>
					</br>			
					<?php include '../include/expdetails.php';?>
					</br>
				</div>					
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
				<!--<<form class="form-horizontal" method="POST" action="apply.php" enctype='multipart/form-data'>
				<div class="row group">	
				div class="text-right col-md-6">	
					<button type="submit" class="btn btn-danger" id="viewapp" name="viewapp" >view</button>
				</div>	
				<div class="text-right col-md-6">	
					<button type="submit" class="btn btn-danger" id="apply" name="apply" >Apply</button>
				</div>
				</div>
				</form>-->
				</br></br>
			
			</div>
		
	</div> <!--closes sidebar dont remove-->
		<!--</div> Container end-->
		
<?php include '../include/footer.php';?>
