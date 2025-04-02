<?php
require ('../include/appSession.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include("../conn.php");		

		$appID = $_SESSION['ApplicantID']; 
	
		$subject = $conn->real_escape_string(trim($_POST['sub']));
		$level=$conn->real_escape_string(trim($_POST['level']));
		$country=$conn->real_escape_string(trim($_POST['country']));
		$grade=$conn->real_escape_string(trim($_POST['grade']));
		$resdate=$conn->real_escape_string(trim($_POST['resdate']));
		
		$otherL=$conn->real_escape_string(trim($_POST['otherL']));
		$otherG=$conn->real_escape_string(trim($_POST['otherG']));
		$otherS=$conn->real_escape_string(trim($_POST['otherS']));
	
		//work around as input not comparing to array correctly
		$Gradelist =  array('45', '46', '47', '48','94');
		
		//$gmatch=array_search($grade,$g);
		//if(in_array($grade, $g)){
		if(in_array($grade, $Gradelist)){
			$gmatch = 1;
			//echo "match = '$gmatch'";
		}else{
			$gmatch= 0;
			//echo "no Match ";
			//echo $gmatch;
		}
		
		/*if (array_key_exists($grade, $g)){
			$gmatch = 1;
		}else{
			$gmatch = 0;
		}*/
			
		//echo " match ";
		//echo $gmatch;
		
		$subarray = array();
		$ressub=mysqli_query("SELECT SubjectID FROM RoleReqSubject");
		while($row = mysqli_fetch_array($ressub)){
			$subarray =array_merge($subarray, array_Map('trim',explode(",", $row[SubjectID])));
		}
		
		$sublist =  array('1', '2', '3');
		
		if(in_array($subject, $sublist)){
			$smatch = 1;
		}else{
			$smatch= 0;
		}
		
		$quallist =  array('1', '5');
		
		if(in_array($level, $quallist)){
			$qmatch = 1;
		}else{
			$qmatch= 0;
		}
		
		//mysqli_query($conn, "SET AUTOCOMMIT=0");
		mysqli_query($conn, "START TRANSACTION");
		//insert applicant details
		if(!empty($otherL)){
			$insertQual= mysqli_query($conn,"INSERT INTO QualOther (AppID, Qual, Subject, Grade, date, country) VALUES ('$appID', '$otherL', '$otherS', '$otherG','$resdate', '$country');");
			
			//lastid
			$last_id = mysqli_insert_id($conn);
			$otherID = $last_id;
		}else{
			$insertQual= mysqli_query($conn,"INSERT INTO Qualification (AppID, SubjectID, QualLevelID, GradeID, CountyID, Date) 
			VALUES('$appID', '$subject', '$level', '$grade', '$country', '$resdate');");
			
			//lastid
			$last_id = mysqli_insert_id($conn);
			$qualID = $last_id;
		}
		  
		if(!empty($otherG)){
			$insertgradematch= mysqli_query($conn,"INSERT INTO QualGradeMatch (AppID, otherQ, gradematch) VALUES ('$appID', '$otherID', '0');");
		}else{
			$insertgradematch= mysqli_query($conn,"INSERT INTO QualGradeMatch (AppID, qualID, gradematch) VALUES ('$appID', '$qualID', '$gmatch');");
		}
		
		if(!empty($otherS)){
			$insertsubjectmatch= mysqli_query($conn,"INSERT INTO QualSubMatch (AppID, otherQ, submatch) VALUES ('$appID', '$otherID', '0');");
		}else{
			$insertsubjectmatch= mysqli_query($conn,"INSERT INTO QualSubMatch (AppID, qualID, submatch) VALUES ('$appID', '$qualID', '$smatch');");
		}
		
		if(!empty($otherL)){
			$insertqualmatch= mysqli_query($conn,"INSERT INTO quallevelmatch (AppID, otherQ, lvlmatch) VALUES ('$appID', '$otherID', '0');");
		}else{
			$insertqualmatch= mysqli_query($conn,"INSERT INTO quallevelmatch (AppID, qualID, lvlmatch) VALUES ('$appID', '$qualID', '$qmatch');");
		}
		
		if($insertQual && $insertgradematch && $insertsubjectmatch && $insertqualmatch){
			mysqli_query($conn, "COMMIT");
			header('location: ../applicant/qualification.php?details=success');
		}else{
			mysqli_query($conn, "ROLLBACK");
		}
		//mysqli_query($conn, "SET AUTOCOMMIT=1");

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
					if(LID=='13'){
						$("#otherQual").show();
						$("#othersub").show();
						$("#othergrade").show();
						$("#subject").hide();
						$("#grades").hide();
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
					
					if(LID=='13'){
						$("#otherQual").show();
						$("#othersub").show();
						$("#othergrade").show();
						$("#subject").hide();
						$("#grades").hide();
					}else{
						$("#othersub").hide();
						$("#othergrade").hide();
						$("#otherQual").hide();
					}
				});
				

			});
		</script>
		
			
	<script>
		$(document).ready(function(){
			$('#sub').on('change', function() {
				if ( this.value == '13'){
					$("#othersub").show();
						$("#othergrade").show();
						$("#sub").hide();
						$("#grade").hide();
				}else{
					$("#othersub").hide();
					$("#othergrade").hide();
					$("#otherQual").hide();
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
						
					<?php 
						if ($userType == "4") {
							include '../include/appsidebar.php';		
						}else{
							include '../include/memsidebar.php';
						}
					?>
					</br>
			  	</div>
			<!--<div class="column content">
				<div class="row">
				<div class="column fcontent">-->
				
				</br>
					<form class="form-horizontal needs-validation" novalidate method="POST" action="addqual.php" enctype='multipart/form-data'>
														
						
						<div class="row group">
							<div class="col-md-2">
								<div class="form-group">
									<label for="country">Country obtained: </label>
									<select class = "form-control" id="country" name="country">
										<option>Country of origin</option>
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
										
											/*include('../conn.php');
												$select = "SELECT * FROM Country";
													$result = $conn->query($select);

											while($row=$result->fetch_assoc()){
												$country = $row['Country']; 
												$cid = $row['countryID'];
										
									
													echo"<option value='$cid'>$country</option>";	
											}*/
										?>
									</select> 
								</div>
							</div>
						
							<div class="col-md-3">
								<div class="form-group" >
									<label for="level">Qualification: </label>
									<?php
										
										/**	include('../conn.php');
										
											$query = $conn->query("SELECT * FROM QualLevel ");//WHERE active = 1
											$rowCount = $query->num_rows;**/
									?>
									
									<select id="level" class = "form-control" name="level"  >
											<option value="">Select Qualification</option>
										
										<!--/**Use php here for Job sector drop down**/-->
										
										<?php
											/**if($rowCount > 0){
												while($row = $query->fetch_assoc()){
													echo '<option value="'.$row['LID'].'">'.$row['Level'].'</option>';
												}
											}else{
												echo '<option value="">Not available</option>';
											}

												
												
											}}**/
										?>
										</select> 
										
										<script>
											$("#level").chosen();
										</script>
								</div>
							</div>
							<div class="col-md-3">
							<!--if level is other this should be inactive-->
								<div class="form-group" id="subject">
									<label for="sub">Subject: </label>
									<select class = "form-control" name="sub" id="sub">
										<option>Select Subject</option>
										
										</select>
										<script>
											$("#sub").chosen();
										</script>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group" id="grades">
								<!--if level is other this should be inactive-->
									<label for="grade">Grade: </label>
									<select class = "form-control" name="grade" id="grade" >
										<option>Select Grade</option>
										
										</select> 
										<script>
											$("#grade").chosen();
										</script>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="resdate">Date: </label>
									<input type="date" class="form-control" id="resdate" name="resdate" placeholder="dd/mm/yyyy">
								</div>	
							</div>
						</div>
						<div class="row group">
							<div class="col-md-2">
							</div>
							<div class="col-md-3">
									<div class="form-group" style="display:none;" id="otherQual">	
										<label for="otherL">Other Qualification: </label>
										<input type="text" class="form-control" id="otherL" name="otherL" placeholder="Other Qualification">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group" style="display:none;" id="othersub">	
										<label for="otherS">Other Subject: </label>
										<input type="text" class="form-control" id="otherS" name="otherS" placeholder="Other Subject">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group" style="display:none;" id="othergrade">	
										<label for="otherG">Other Grade: </label>
										<input type="text" class="form-control" id="otherG" name="otherG" placeholder="Other Grade">
									</div>
								</div>
						</div>
						
						<div class="row group">

							<div class="text-right col-md-12">
								<button type="submit" id="add" name="add" class="btn btn-primary">Add</button>
							</div>
					</form>
							</br>
							</br>
						</div>	
			</div>
		</div>
<?php include '../include/footer.php';?>

<?php
//array code thats not working
/*if (!empty($otherL)) {
            $otherL=$conn->real_escape_string(trim($_POST['otherL']));
			$level='13';
		}else{
			$otherL= NULL;
		}
		
		if (!empty($otherG)) {
				$otherG=$conn->real_escape_string(trim($_POST['otherG']));
				//$grade=163;
			}else{
				$otherG= NULL;
		}
		
		if (!empty($otherS)) {
			$otherS=$conn->real_escape_string(trim($_POST['others']));
			//$subject=30;
		}else{
			$otherS= NULL;
		}
		
		
		$sql = "SELECT Grade from RoleReqGrade;";
		
		$resultarray = mysqli_query($conn, $sql);
		$grades = array();
		if (mysqli_num_rows($resultarray)>0){
			while ($row = mysqli_fetch_assoc($resultarray)){
				$grades[] = $row;
			}
		}
				
		foreach ($grades as $g){
			
			echo $g['Grade']." ";
		}*/
		/*if($gmatch){
			$insertgradematch= mysqli_query($conn,"INSERT INTO QualGradeMatch (AppID, qualID, gradematch) VALUES ($appID, $qualID, '1');");
			echo "Match";
		}else{
			$insertgradematch= mysqli_query($conn,"INSERT INTO QualGradeMatch (AppID, qualID, gradematch) VALUES ($appID, $qualID, '0');");
		}
		/*	mysqli_query( $insertgradematch, $conn);
			echo "match";
			//$result= $conn->query($insertgradematch);
			
			/*if(!$result){
			echo $conn->error;
			}else{
				echo" 2nd write success";
		}
		}
				
		}else{
			echo"nomatch";
		}*/
		
		
		/*echo "$insertQual";
		
		if($conn->query($insertQual)=== true){ //
			
			header("location: qualification.php?details=success");
			
		} else {
			 echo $conn->error;
			 echo "<p>unsuccessful</p>";
		}*/
		?>
