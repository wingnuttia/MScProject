<?php

session_start();

$_SESSION['message'] = '';
include("../conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['apass'] == $_POST['pass2']) {
        $username = $conn->real_escape_string(trim($_POST['uname']));
        $email = $conn->real_escape_string(trim($_POST['uemail']));
        $pass = md5($_POST['apass']); //hashed password - need to look at other hash options
        $date = date('y-m-d h:i:s');
		$title = $conn->real_escape_string(trim($_POST['title']));
		$fname=$conn->real_escape_string(trim($_POST['fname']));
		$sname=$conn->real_escape_string(trim($_POST['sname']));
		$pname=$conn->real_escape_string(trim($_POST['pname']));
		$dob=$conn->real_escape_string(trim($_POST['dob']));
		$contact=$conn->real_escape_string(trim($_POST['contact']));
		$sex=$conn->real_escape_string(trim($_POST['sex']));
		$nation=$conn->real_escape_string(trim($_POST['nation']));
		$street=$conn->real_escape_string(trim($_POST['street']));
		$city=$conn->real_escape_string(trim($_POST['city']));
		$pcode=$conn->real_escape_string(trim($_POST['pcode']));
		$hrtype=$conn->real_escape_string(trim($_POST['hrtype']));
	}
    
    $_SESSION['uname'] = $username;
            
	mysqli_query($conn, "START TRANSACTION");
			
    //insert applicant user
    $insertuser = mysqli_query($conn,"INSERT INTO ApplicantLogin (userName, email, pw, userTypeID, FirstLoginDate) 
	VALUES ('$username', '$email', '$pass', '4','$date');");
	
	$last_id = mysqli_insert_id($conn);//get user ID from last ApplicantLogin
	$appID = $last_id;
	
    //insert applicant details
    $insertdetails = mysqli_query($conn,"INSERT INTO ApplicantDetails (ApplicantID, TitleID, Forename, Surname, Preferred, dob, Mobile, SexID, NationID, Street, City, pcode, hrsTypeID) 
	VALUES('$appID', '$title', '$fname', '$sname', '$pname', '$dob', '$contact', '$sex', '$nation', '$street', '$city', '$pcode', '$hrtype');");
  
	if( $insertuser && $insertdetails){
		mysqli_query($conn, "COMMIT");
		header('location: ../applicant/index.php');
	}else{
		mysqli_query($conn, "ROLLBACK");
	}
  
   /*if($conn->query($insert)=== true){
        
        header("location: ../applicant/welcome.php?details=success");
		
    } else {
         echo $conn->error;
		 echo "<p>unsuccessful</p>";
    }
	
	//$insertlogindate = "INSERT INTO AppLoginTime (UserID, loginTime) VALUES ('$Applicant', '$date')";
    
    if($conn->query($insertuser)=== true){
     // echo "<p>success</p>";
       // $_SESSION['message'] = "Welcome $usename, please complete your Personal Details";
        
		header("location: ../applicant/personalnew.php");
    } else{
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
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Register</title>
    </head>

    <body>
	
	
			<header>
				<h1>Short Term Appointments Register</h1> 
			</header>
		</br></br>
		
        <div class="container">

            <div class ="row">
			
				<div class="col-sm-9">
					

					<h1>Register</h1>
					
						<form class="form-horizontal" method="POST" action="register.php" enctype='multipart/form-data'>
							<div class="alert alert-error"><?= $_SESSION['message'] ?></div>
								<div class="row group">
									<div class="col-md-6">
										<div class="form-group">
											<!--need to check if user already exists email/username is a unique field-->
											<label for="uname"><strong>User Name: </strong></label>
											<input type="text" class="form-control" id="uname" name="uname" placeholder="User Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<!--need to check if user already exists email/username is a unique field-->
											<label for="uemail"><strong>email: </strong></label>
											<input type="email" class="form-control" id="uemail" name="uemail" placeholder="email" required>
										</div>
									</div>
								</div>	
							<div class="row group">
								<div class="col-md-6">
									<div class="form-group">
										<label for="apass"><strong>Password: </strong></label>
										<input type="password" class="form-control" id="apass" name="apass" placeholder="password" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="pass2"><strong>Confirm Password: </strong></label>
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="fname"><strong>Forename:</strong></label>
										<input type="text" class="form-control" id="fname" name="fname" placeholder="Forename">
									</div>
								</div>
								
								<div class="col-md-5">
									<div class="form-group">
										<label for="Sname"><strong>Surname:</strong></label>
										<input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
									</div>
								</div>
							</div>	
							
							<div class="row group">	
								<div class="col-md-2">
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="pname"><strong>Preferred Name:</strong></label>
										<input type="text" class="form-control" id="pname" name="pname" placeholder="Preferred Name">
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="contact"><strong>Contact Number: </strong></label>
										<input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
									</div>
								</div>
							</div>
							
							<div class="row group">	
								<div class="col-md-2">
								</div>
								<div class="col-md-2">
									<div class="form-group">	
										<label for="sex"><strong>Sex: </strong></label>
										<select class = "form-control" id="sex" name="sex">
											<option  disabled>Sex</option>
											<!--get options from database-->
											<?php
												include("../include/conn.php");
												$select = "SELECT * FROM Sex";
												$result = $conn->query($select);

												while ($row = $result->fetch_assoc()) {
													$sex = $row['Sex'];
													$id = $row['SexID'];

													echo"<option value='$id'>$sex</option>";
													}
												?>
										</select> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="dob"><strong>Date of Birth: </strong></label>
										<input type="date" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nation"><strong>Nationality: </strong></label>
										<select class = "form-control" id="nation" name="nation">
											<option  disabled>Nationality</option>
											<!--get options from database-->
											<?php
												include("../include/conn.php");
												$select = "SELECT * FROM Nationality";
												$result = $conn->query($select);

												while ($row = $result->fetch_assoc()) {
													$nation = $row['Nationality'];
													$id = $row['NationalityID'];

													echo"<option value='$id'>$nation</option>";
												}
											?>
										</select> 
									</div>
								</div>
								
							</div>
							<div class="row group">
								<div class="col-md-2">
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<label for="street"><strong>Street Address: </strong></label>
									<input type="text" class="form-control" id="street" name="street" placeholder="Enter street address">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="city"><strong>City: </strong></label>
										<input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
									</div>
								</div>
								<div class="col-md-2">
											<div class="form-group">
									<label for="pcode"><strong>Postcode: </strong></label>
									<input type="text" class="form-control" id="pcode" name="pcode" placeholder="Enter postcode">
								</div>
								</div>
							</div>
							<div class="row group">
								<div class="col-md-6">
											<div class="form-group">
									<label for="hrtype"><strong>My preference is for Position that are: </strong></label>
									<select class = "form-control" id="hrtype" name="hrtype">
										<option  disabled>Select Post Prefernce</option>
										<!--get options from database-->
										<?php
										include("../include/conn.php");
										$select = "SELECT * FROM HoursType";
										$result = $conn->query($select);

										while ($row = $result->fetch_assoc()) {
											$hrs = $row['HoursType'];
											$id = $row['TypeID'];

											echo"<option value='$id'>$hrs</option>";
										}
										?>
									</select> 

    </div></div></div>
							
							<div class="text-right col-md-12">	
								<div>
									<button type="submit" class="btn btn-danger" name="register">Register</button>
								</div>				
							</div>
						</form>
						</br></br>
					</div>
					<div class="col-sm-1">
					</div>
					<div class="col-sm-2">
						<h1>Already Registered </h1>
						<p>Go to login screen</p>
						</br></br></br>
						
						<a class="btn btn-danger" href="index.php" role="button">Login Here</a>
					
					</div>
				</div>
			</div>

        </div>
		
  <?php include '../include/footer.php';?>