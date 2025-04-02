<?php
require ('../include/appSession.php');
	//Set read = variable to sessionID
	//$applicant = $_SESSION['ApplicantID'];

	$applicant = $_SESSION['ApplicantID'];
	
	$getid = $_GET['editid'];

	//read qualification data from database
	$readqual="SELECT al.ApplicantID, al.userName, qual.QualID, qual.AppID, qual.SubjectID, qual.QualLevelID, qual.GradeID,  qual.countyID, qual.Date, 
	ql.LID, ql.Level, ql.EdID, ql.active,
	qs.SubID, qs.subject, qs.LID, qs.active,
	qg.GID, qg.Grade, qg.LID,
	Country.countryID, Country.Country
		
	FROM Qualification qual
	
	INNER JOIN ApplicantLogin al ON  qual.AppID = al.ApplicantID
	INNER JOIN QualLevel ql ON qual.QualLevelID = ql.LID
	INNER JOIN Country ON qual.countyID = Country.countryID
	INNER JOIN QualSubject qs ON  qual.SubjectID = qs.subid
	INNER JOIN QualGrade qg ON qual.GradeID = qg.GID
			
	WHERE qual.QualID = '$getid';";
	
	$resultqual = $conn->query($readqual);

	if(!$resultqual){
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
				<script type="text/javascript">
			$(document).ready(function(){
				$('#country').on('change',function(){
					var countryID = $(this).val();
					if(countryID){
						$.ajax({
							type:'POST',
							url:'ajaxData2.php',
							data:'countryID='+countryID,
							success:function(html){
								$('#level').html(html);
							}
						}); 
					}else{
						$('#level').html('<option value="">Select Country first</option>');
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#level').change(function(){
					var LID = $(this).val();
					if(LID){
						$.ajax({
							method:'POST',
							url:'ajaxData.php',
							data:'LID='+LID,
							success:function(html){
								$('#sub').html(html);
							}	
						}); 
					}else{
						$('#sub').html('<option value="">Select level first</option>');
					}
				});
			});
		</script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#level').on('change',function(){
					var LID = $(this).val();
					if(LID){
						$.ajax({
							type:'POST',
							url:'ajaxData1.php',
							data:'LID='+LID,
							success:function(html){
								$('#grade').html(html);
							}
						}); 
					}else{
						$('#grade').html('<option value="">Select level first</option>');
					}
				});
			});
		</script>
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
					while($row = $resultqual->fetch_assoc()){
						$applicant = $row['ApplicantID'];
						$qualID = $row['QualID'];
						$s = $row['subject'];
						$sidd=$row['SubjectID'];
						$date = $row['Date'];
						$l = $row['Level'];
						$g = $row['Grade'];
						$c = $row['Country'];
					}
				?>
				</br></br>
					<form class="form-horizontal needs-validation" novalidate method="POST" action="editqproc.php" enctype='multipart/form-data'>
						
						<div class="row group">
						<div class="col-md-2">
								<div class="form-group">
								
									<label for="country">Country obtained: </label>
									<select class = "form-control" id="country" name="country">
										<option><?php echo $c;?></option>
										<!--information for country dropdown-->
										<?php
										include('../conn.php');
										
											$query = $conn->query("SELECT * FROM Country ");//WHERE active = 1
											$rowCount = $query->num_rows;
																						
											if($rowCount > 0){
												while($row = $query->fetch_assoc()){
													echo '<option value="'.$row['countryID'].'">'.$row['Country'].'</option>';
												}
											}else{
												echo '<option value="">Not available</option>';
											}
										?>
									</select> 
								</div>
							</div>
					
							<div class="col-md-3">
								<div class="form-group">
									<label for="level">Qualification: </label>
									<select class = "form-control" name="level" id="level" >
										<option><?php echo $l;?></option>
									</select> 
										
								</div>
							</div>
							<div class="col-md-3">
							<!--if level is other this should be inactive-->
								<div class="form-group">
									<label for="sub">Subject: </label>
									<select class = "form-control" name="sub" id="sub">
										<option><?php echo $s;?></option>
									
										</select>
										
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								<!--if level is other this should be inactive-->
									<label for="grade">Grade: </label>
									<select class = "form-control" name="grade" id="grade" >
										<option><?php echo $g;?></option>
										
										</select> 
								</div>
							</div>
												
							<div class="col-md-2">
								<div class="form-group">
									<label for="resdate">Date: </label>
									<?php echo"<input type='date' class='form-control' id='jobtitle' name='resdate'  value='$date'>";?>
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
					<?php include //'../include/completed.php';?>
				</div>
			</div>
			</div>-->

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>