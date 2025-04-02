<?php
	
	include ('../include/staffSession.php');
		
	//Read applicant data from database
	$read="SELECT SU.UserID, SU.StaffNo, SU.email, SD.UserID, SD.Forename, SD.Surname, SD.ContactNo, SD.SchoolID, SD.DepartmentID, SD.TitleID, Title.TitleID, Title.Title,  sch.SID, sch.School, sch.FacultyID, fac.FacultyID, fac.Faculty, dep.DID, dep.Department, dep.SID
	
	FROM StaffDetails SD
	
	INNER JOIN StaffUser SU ON SD.UserID = SU.UserID
	INNER JOIN Title ON SD.TitleID = Title.TitleID
	INNER JOIN School sch ON SD.SchoolID = sch.SID
	INNER JOIN Faculty fac ON sch.FacultyID = fac.FacultyID 
	LEFT JOIN Department dep ON sch.SID = dep.SID
	
	WHERE SU.UserID = '$userid';";

	$result = $conn->query($read);
 
        if(!$result){
         echo $conn->error;    
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
		<link rel="stylesheet"  href="../style/style.css">
		
		<title>STAR Staff Details</title>
	</head>
	
	<body>
		<?php
			while($row = $result->fetch_assoc()){
				$t=$row['TitleID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$sno = $row['StaffNo'];
				$email=$row['email'];	
				$contact = $row['ContactNo'];
				
				$f = $row['Faculty'];
				$s= $row['SchoolID'];
				$d = $row['DepartmentID'];
			}
		?>
		<div class="container starcontain">
		
			<header>
				<div class="row">
					<div class="col-md-8">
						<h1>Welcome <?php echo "$fname $sname";?></h1>
					</div>
					<div class="col-md-4">
						<?php include '../include/usertype.php';?>
					</div>
				</div>
			</header>
			</br>
			<section>
				<?php
					switch ($userType){
						case 1:
							include '../include/adminsidebar.php';
						break;
						case 2:
							include '../include/hrsidebar.php';
						break;
						case 3:
							include '../include/managersidebar.php';
						break;
						default:
							header('Location: ../stafflogin/index.php?error');
					}
				?>

			
		<form class="form-horizontal" method="POST" action="personaleditprocess.php" enctype="multipart/form-data">
					
					<div class="row group">
						<div class="col-md-2">
							<div class="form-group">
								<label for="title"><strong>Title: </strong></label>
								<select class="form-control" id="title" name="title">
									
									<?php include("../conn.php");
										$titleSelect = "SELECT * FROM Title";
										$titleResult = $conn->query($titleSelect);
										
										while ($row = $titleResult->fetch_assoc()) {
																			
											$title = $row['Title'];
											$titleid = $row['TitleID'];
											
											if($titleid == $t){
												echo"<option selected value='$titleid'>$title</option>";
											}else{
												echo"<option value='$titleid'>$title</option>";
											}
										}
										?>
									</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="fname"><strong>Forename:</strong></label>
								<?php echo "<input type='text' class='form-control' id='fname' name='fname' value='$fname'>";?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="Sname"><strong>Surname:</strong></label>
								<?php echo "<input type='text' class='form-control' id='sname' name='sname' value='$sname'>";?>
							</div>
						</div>
					</div>		
					<div class="row group">	
						<div class="col-md-2"></div>
						<div class="col-md-5">
							<fieldset disabled>
							<div class="form-group">
								<label for="sno"><strong>Staff Number:</strong></label>
								<?php echo "<input type='text' class='form-control' id='sname' name='sname' value='$sno'>";?>
							</div>
							</fieldset>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="mail"><strong>email:</strong></label>
								<?php echo "<input type='text' class='form-control' id='mail' name='mail' value='$email'>";?>
							</div>
						</div>
					</div>
				<div class="row group">	
					<div class="col-md-4">
					<fieldset disabled>
						<div class="form-group">	
							<label for="fac"><strong>Faculty: </strong></label>
							<?php echo "<input type='text' class='form-control' id='mail' name='mail' value='$f'>";?>
								 
						</div>
						</fieldset>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="sch"><strong>School: </strong></label>
							<select class = "form-control" id="sch" name="sch">
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM School";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$school = $row['School'];
									$id = $row['SID'];

									if($id == $s){
										echo"<option selected value='$id'>$school</option>";
									}else{
										echo"<option value='$id'>$school</option>";
									}
								}
								?>
						</select> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="dep"><strong>Department: </strong></label>
							<select class = "form-control" id="dep" name="dep">
							
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM Department";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$depart = $row['Department'];
									$deid = $row['DID'];

									if($id == $d){
										echo"<option selected value='$deid'>$depart</option>";
									}else{
										echo"<option value='$deid'>$depart</option>";
									}
								}
								?>
						</select> 
						</div>
					</div>
				</div>
				<div class="row group">	
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact"><strong>Contact: </strong></label>
							<?php echo"<input type='text' class='form-control' id='contact' name='contact' value='$contact'>";?>
						</div>
					</div>
				</div>
			
			</br>
			<div class="text-right col-md-12">	
				<button type="submit" class="btn btn-danger" name="editdetails">Save</button>
			</div>
		</form>
	
		</br></br>
		</div>
	</div>
	
<?php include '../include/footer.php';?>
