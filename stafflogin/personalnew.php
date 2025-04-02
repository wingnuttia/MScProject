<?php

	require ('../include/staffSession.php');
	
	
	$readuser="SELECT * FROM StaffUser SU WHERE SU.UserID = '$userid';";

	$resultuser = $conn->query($readuser);
 
        if(!$resultuser){
         echo $conn->error;    
        }
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include("conn.php");		
		
		$userid = $_SESSION['UserID'];
		
		$title = $conn->real_escape_string(trim($_POST['title']));
		$fname=$conn->real_escape_string(trim($_POST['fname']));
		$sname=$conn->real_escape_string(trim($_POST['sname']));
		$contact=$conn->real_escape_string(trim($_POST['contact']));
		$school=$conn->real_escape_string(trim($_POST['sch']));
		$depart=$conn->real_escape_string(trim($_POST['dep']));
		$location=$conn->real_escape_string(trim($_POST['loc']));



		//insert applicant details
		$insert = "INSERT INTO StaffDetails (UserID,  Forename, Surname, ContactNo, Location, SchoolID, DepartmentID, TitleID) 
		VALUES('$userID', '$fname', '$sname', '$contact', $location, $school, $depart, '$title');";
	  
	   if($conn->query($insert)=== true){
			
			header("location: ../stafflogin/personal.php?details=success");
			
		} else {
			 echo $conn->error;
			 echo "<p>unsuccessful</p>";
		}
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

        <title>STAR Personal Details</title>
    </head>

    <body>

      <div class="container starcontain">
		
			<header>
				<div class="row">
					<div class="col-md-8">
						<h1>Enter your details</h1>
					</div>
					
				</div>
			</header>
			</br>
			
			<section>
				
		
		<?php
			while($row = $resultuser->fetch_assoc()){
				$sno = $row['StaffNo'];
				$email=$row['email'];	
				
			}
		?>
		
		<h3>Personal Information</h3></br></br>
            <form class="form-horizontal" method="POST" action="personal.php" enctype='multipart/form-data'>
                
				<div class="row group">
					<div class="col-md-2">
						<div class="form-group">
							<label for="title"><strong>Title: </strong></label>
								<select class="form-control" id="title" name="title">
									<option>Title</option>
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
							<label for="sname"><strong>Surname:</strong></label>
							<input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
						</div>
					</div>
					</div>
					
				<?php
					echo "<div class='row group'>	
							<div class='col-md-2'></div>
							<div class='col-md-5'>
								<div class='form-group'>
									<label for='sno'><strong>Staff Number:</strong></label>
									<input type='text' class='form-control' id='psno' name='sno' value='$sno'>
								</div>
							</div>
							<div class='col-md-5'>
								<div class='form-group'>
									<label for='emil'><strong>email:</strong></label>
									<input type='text' class='form-control' id='emil' name='emil' value='$email'>
								</div>
							</div>
					</div>";
				?>
				<div class="row group">	
				<div class="col-md-4"></div>
				
				<div class="col-md-4">
					<div class="form-group">	
						<label for="sch"><strong>School: </strong></label>
						<select class = "form-control" id="sch" name="sch">
							<option>School</option>
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM School";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$school = $row['School'];
									$id = $row['SID'];

									echo"<option value='$id'>$school</option>";
									}
								?>
						</select> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">	
						<label for="dep"><strong>Department: </strong></label>
						<select class = "form-control" id="dep" name="dep">
							<option>Department</option>
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM Department";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$depart = $row['Department'];
									$deid = $row['DID'];

									echo"<option value='$deid'>$depart</option>";
									}
								?>
						</select> 
					</div>
				</div>
				</div>
				
				<div class="row group">	
				<div class="col-md-12">
				<div class="form-group">
        <label for="contact"><strong>Contact: </strong></label>
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
    </div>
	</div>
	</div>
	<div class="row group">
	<div class="col-md-12">
				<div class="form-group">
        <label for="loc"><strong>Location: </strong></label>
        <input type="text" class="form-control" id="loc" name="loc" placeholder="Enter location">
    </div>
	</div>
	</div>
	
	</br>
	
				<div class="text-right col-md-12">	
					<button type="submit" class="btn btn-primary" name="details">Save</button>
				</div>
			</form>
		<section>	
			</br></br>
		</div>
		
<?php include '../include/footer.php';?>
