<?php

session_start();

$_SESSION['message'] = '';
include("../conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['apass'] == $_POST['pass2']) {

        $username = $conn->real_escape_string(trim($_POST['uname']));
        $email = $conn->real_escape_string(trim($_POST['uemail']));
        $pass = md5($_POST['apass']); //hashed password - need to look at other hash options
        //$date = date('y-m-d h:i:s');
		$title = $conn->real_escape_string(trim($_POST['title']));
		$fname=$conn->real_escape_string(trim($_POST['fname']));
		$sname=$conn->real_escape_string(trim($_POST['sname']));
		$ext=$conn->real_escape_string(trim($_POST['ext']));
		$school=$conn->real_escape_string(trim($_POST['school']));
		$depart=$conn->real_escape_string(trim($_POST['depart']));
    }
 
    $_SESSION['uname'] = $username;
            
			
	mysqli_query($conn, "START TRANSACTION");
	
    //insert applicant user
    $insertuser = mysqli_query($conn,"INSERT INTO StaffUser (StaffNo, email, pw, Defusertype) values ('$username', '$email', '$pass', '3');");
	
	$last_id = mysqli_insert_id($conn);
	$userID = $last_id;
	
	//insert Staff Details
	$insertdetails = mysqli_query($conn, "INSERT INTO StaffDetails (UserID, TitleID, Forename, Surname, ContactNo, SchoolID, DepartmentID) VALUES ('$userID','$title','$fname','$sname','$ext','$school','$depart');");
	
	//insert Usertype
	$inserttype = mysqli_query($conn, "INSERT INTO StaffUserType (UserID, UserTypeID, defaultType, active) VALUES ('$userID', '3', '1', '1');");
    
   	if( $insertuser && $insertdetails && $inserttype){
		mysqli_query($conn, "COMMIT");
		header('location: ../stafflogin/index.php');
	}else{
		echo $conn->error;
		mysqli_query($conn, "ROLLBACK");
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc--> 
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js" integrity="sha256-TDtzz+WOGufaQuQzqpEnnxdJQW5xrU+pzjznwBtaWs4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha256-0LjJurLJoa1jcHaRwMDnX2EQ8VpgpUMFT/4i+TEtLyc=" crossorigin="anonymous" />
		
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Register</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#school').on('change',function(){
					var SID = $(this).val();
					if(SID){
						$.ajax({
							type:'POST',
							url:'ajaxData.php',
							data:'SID='+SID,
							success:function(html){
								$('#depart').html(html);
							}
						}); 
					}else{
						$('#depart').html('<option value="">Select School first</option>');
					}
				});
			});
		</script>
    </head>

    <body>
		</br></br>
		<div class="container">
            <div class ="row">
				<div class="col-sm-8">
					<h1>Register</h1>
						<form class="form-horizontal" method="POST" action="register.php" enctype='multipart/form-data'>
							<div class="alert alert-error"><?= $_SESSION['message'] ?></div>
							<div class="row group">
								<div class="col-md-6">
									<div class="form-group">
										<!--need to check if user already exists email/username is a unique field-->
										<label for="uname">Staff Number: </label>
										<input type="text" class="form-control" id="uname" name="uname" placeholder="Staff Number" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<!--need to check if user already exists email/username is a unique field-->
										<label for="uemail">email: </label>
										<input type="email" class="form-control" id="uemail" name="uemail" placeholder="email" required>
									</div>
								</div>
							</div>	
							<div class="row group">
								<div class="col-md-6">
									<div class="form-group">
										<label for="apass">Password: </label>
										<input type="password" class="form-control" id="apass" name="apass" placeholder="password" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="pass2">Confirm Password: </label>
										<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" required>
									</div>
								</div>
							</div>
							
							<div class="row group">
								<div class="col-md-12">
								</br>
								<h1>Personal Details</h1>
								</br>
								</div>
							</div>
							
							<div class="row group">
							<div class="col-md-2">
									<div class="form-group">
										<label for="title"><strong>Title: </strong></label>
											<select class="form-control" id="title" name="title">
												<option disabled>Title</option>
													<!--get options from database-->
												<?php
													include("../include/conn.php");
													$titleSel = "SELECT * FROM Title";
													$titleRes = $conn->query($titleSel);

													while ($row = $titleRes->fetch_assoc()) {
														$title = $row['Title'];
														$id = $row['TitleID'];

														echo"<option value='$id'>$title</option>";
													}
												?>
											</select> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="fname"><strong>Forename:</strong></label>
										<input type="text" class="form-control" id="fname" name="fname" placeholder="Forename">
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label for="Sname"><strong>Surname:</strong></label>
										<input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label for="ext"><strong>Contact:</strong></label>
										<input type="text" class="form-control" id="ext" name="ext" placeholder="Extension Number">
									</div>
								</div>
								
							</div>	
							
							<div class="col-md-6">
						<div class="form-group">
							<label for="school">School/Directorate: </label>
							<select id="school" class = "form-control"  name="school">
								<option>Select School/Directorate</option>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
								
								$query =$conn->query("SELECT * FROM School");
								$rowCount = $query->num_rows;
								
								if($rowCount>0){
									while($row = $query->fetch_assoc()){
										echo '<option value="'.$row['SID'].'">'.$row['School'].'</option>';
									}
								}else{
									echo '<option value="">Not available</option>';
									}
								
								?>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
							<div class="form-group">
							<!--this should populate depending on selected school-->
									<label for="depart">Department: </label>
									<select id="depart" class = "form-control" name="depart" >
										<option value="">Select Department</option>
										<?php
								include('../conn.php');
								
								$query =$conn->query("SELECT * FROM Department");
								$rowCount = $query->num_rows;
								
								if($rowCount>0){
									while($row = $query->fetch_assoc()){
										echo '<option value="'.$row['DID'].'">'.$row['Department'].'</option>';
									}
								}else{
									echo '<option value="">Not available</option>';
									}
								
								?>
									</select>
										
								</div>
					
						</div>
						

    
							
							
							<div class="text-right col-md-12">	
								<div>
									<button type="submit" class="btn btn-danger" name="register">Register</button>
								</div>				
							</div>
						</form>
						</br></br>
				</div>
				<!--<div class="col-sm-1"></div>
				<div class="col-sm-3">
					<h1>Already Registered </h1>
					</br></br></br>
					<a href="index.php" class="btn btn-danger" role="button" aria-pressed="true">Login here</a>
				</div>-->
			</div>
        </div>
		
  <?php include '../include/footer.php';?>