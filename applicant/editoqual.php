<?php
require ('../include/appSession.php');
	//Set read = variable to sessionID
	//$applicant = $_SESSION['ApplicantID'];

	$applicant = $_SESSION['ApplicantID'];
	
	$getid = $_GET['editid'];

	//read qualification data from database
	$readOther="SELECT al.ApplicantID, al.userName, qo.ID, qo.AppID, qo.Qual, qo.Subject, qo.Grade, qo.date, qo.country, c.countryID, c.Country
	
	FROM QualOther qo
	
	INNER JOIN ApplicantLogin al ON  qo.AppID = al.ApplicantID
	INNER JOIN Country c ON qo.country = c.countryID

			
	WHERE qo.ID = '$getid';";

	
	$resultOther = $conn->query($readOther);

	if(!$resultOther){
		echo $conn->error;
	}
			
	 

?>



<!DOCTYPE html>
<html>
	<head>
	
		<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	

		<script src="http://code.jquery.com/jquery-3.4.1.js" integrity "sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

		<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 
		<script src="jquery.min.js"></script>
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
			
		<title>STAR Qualification</title>
	</head>
	
	<body>
		<header>
			<h1>Qualification</h1> 
		</header>
			
			
		<div class="container starcontain">
			<?php //include '../include/navbar.php';?>
			
		<!--	<div class="row">
				<div class="column left">-->
					<?php 
						if ($userType == "4") {
							include '../include/appsidebar.php';		
						}else{
							include '../include/memsidebar.php';
						}
					?>
				</div>
			  
				<!--<div class="column content">
				<div class="column middle">-->
				
				<?php
					while($row = $resultOther->fetch_assoc()){
						$applicant = $row['ApplicantID'];
						$qualID = $row['ID'];
						$s = $row['Subject'];
						$date = $row['date'];
						$l = $row['Qual'];
						$g = $row['Grade'];
						$c = $row['country'];
					
					}
				?>
				</br></br>
					<form class="form-horizontal needs-validation" novalidate method="POST" action="editqoproc.php" enctype='multipart/form-data'>
						
						<div class="row group">
						<div class="col-md-2">
								<div class="form-group">
								
									<label for="country">Country obtained: </label>
									<select class = "form-control" id="country" name="country">
										
										<!--information for country dropdown-->
										<?php
										include('../conn.php');
										
											$cSelect = "SELECT countryID, Country FROM Country";
										$cResult = $conn->query($cSelect);	

							while ($row = $cResult->fetch_assoc()) {										
											$country = $row['Country'];
											$cid = $row['countryID'];
											
											if($cid == $c){
												echo"<option selected value='$cid'>$country</option>";
											}else{
												echo"<option value='$cid'>$country</option>";
											}
							}
										?>
									</select>
								</div>
							</div>
					
							<div class="col-md-3">
								<div class="form-group">
									<label for="level">Qualification: </label>
									<?php echo "<input type='text' class='form-control' id='level' name='level' value='$l'>";?>
										
								</div>
							</div>
							<div class="col-md-3">
							<!--if level is other this should be inactive-->
								<div class="form-group">
									<label for="sub">Subject: </label>
									<?php echo "<input type='text' class='form-control' id='sub' name='sub' value='$s'>";?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								<!--if level is other this should be inactive-->
									<label for="grade">Grade: </label>
									<?php echo "<input type='text' class='form-control' id='grade' name='grade' value='$g'>";?>
								</div>
							</div>
												
							<div class="col-md-2">
								<div class="form-group">
									<label for="resdate">Date: </label>
									<?php echo"<input type='date' class='form-control' id='resdate' name='resdate'  value='$date'>";?>
								</div>	
							</div>
						</div>	
						
						
							
						<div class="row group">
						<div class='col-md-1'>
							<?php	echo "<input type='hidden' value='$getid' name='postid'>";?>
						</div>
						
						<div class="text-right col-md-12">
							<button type="submit" id="edit" name="edit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</br>
				</br>
				
			</div>
			
				<!--<div class="column right">
					<?php include '../include/completed.php';?>
				</div>
			</div>
			</div>-->

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>