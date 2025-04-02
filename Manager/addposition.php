<?php
require ('../include/staffSession.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include("../conn.php");		

		$userid = $_SESSION['UserID']; 
		
		$role = $conn->real_escape_string(trim($_POST['role']));
		$ptitle=$conn->real_escape_string(trim($_POST['ptitle']));
		$start=$conn->real_escape_string(trim($_POST['start']));
		$end=$conn->real_escape_string(trim($_POST['end']));
		$ptype=$conn->real_escape_string(trim($_POST['ptype']));
		$school=$conn->real_escape_string(trim($_POST['school']));
		$descript=trim($_POST['descript']);
		$date = date('y-m-d h:i:s');
		$depart=$conn->real_escape_string(trim($_POST['depart']));
		//$skill=$conn->real_escape_string(trim($_POST['skill']));
		//$others=$conn->real_escape_string(trim($_POST['others']));
		//$cats=$conn->real_escape_string(trim($_POST['cat']));
		$assigned = '0';
		$live = '1';
					
		$insertpost = "INSERT INTO Positions (StaffID, RoleID, PostTitle, SchoolID, DepartmentID, HoursTypeID, EstStartDate, EstEndDate, Description, live, assigned, CreatedDate) VALUES ('$userid', '$role', '$ptitle', '$school', '$depart', '$ptype', '$start', '$end', '$descript', '$live','$assigned', '$date');";
		
		$last_id = mysqli_insert_id($conn);
		
		$postID=$last_id;
		
		if($conn->query($insertpost)=== true){
			
			header("location: ../applicant/addskills.php?addskill='$postID'");
			
		} else {
			 echo $conn->error;
			 echo "<p>unsuccessful</p>";
		}
	}
				
	/*mysqli_query($conn, "SET AUTOCOMMIT=0");
	mysqli_query($conn, "START TRANSACTION");
	
	$insertpost = mysqli_query($conn, "INSERT INTO Positions (StaffID, RoleID, PostTitle, SchoolID, DepartmentID, HoursTypeID, EstStartDate, EstEndDate, Description, assigned, CreatedDate) VALUES ('$userid', '$role', '$ptitle', '$school', '$depart', '$ptype', '$start', '$end', '$descript', '$assigned', '$date');");
	
	$last_id = mysqli_insert_id($conn);
	
	$postID=$last_id;
	
	$insertskill= mysqli_query($conn,"INSERT INTO PostSkills (PostID, SkillID) VALUES ('$postID', '$skill');");
	
		if (!null($others)) {
           $insertskillother= mysqli_query($conn,"INSERT INTO PostOtherSkill ( PostID, OSkill, CatID) VALUES ('$postID','$others','$cats');");
		   
		   if($insertpost && $insertskill && $insertskillother){
			
			mysqli_query($conn, "COMMIT");
			header('location: ../email/registerinterest.php');
		
			}else{
				mysqli_query($conn, "ROLLBACK");
				echo $conn->error;
				echo "error";
			}
		   
		}else{
			
			
			if($insertpost && $insertskill){
			
			mysqli_query($conn, "COMMIT");
			header('location: ../email/registerinterest.php');
		
			}else{
				mysqli_query($conn, "ROLLBACK");
				echo $conn->error;
				echo "error";
			}
		}*/
	
		/*if($insertpost && $insertskill){
			
			mysqli_query($conn, "COMMIT");
			header('location: ../email/registerinterest.php');
		
		}else{
			mysqli_query($conn, "ROLLBACK");
			echo $conn->error;
			echo "error";
		}
	mysqli_query($conn, "SET AUTOCOMMIT=1");
}*/
?>

<!--Need Session Variable for ApplicationID-->

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js" integrity="sha256-TDtzz+WOGufaQuQzqpEnnxdJQW5xrU+pzjznwBtaWs4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha256-0LjJurLJoa1jcHaRwMDnX2EQ8VpgpUMFT/4i+TEtLyc=" crossorigin="anonymous" />
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Position</title>
		
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
		
		<!--<script>
		$(document).ready(function(){
			$('#skill').on('change', function() {
				if ( this.value == '1'){
					$("#otherSkill").show();
					$("#category").show();
				}
				else{
					$("#otherSkill").hide();
					$("#category").hide();
				}
			});
		});
	</script>-->
		
    </head>
	
	<body>
					
		<div class="container starcontain">
					
		<?php include '../include/managersidebar.php';?>
	<header>
			<h3>New Position</h3>
			</header></br></br>
			<!--TO DO need multiinsert form -->
			<form class="form-horizontal" method="POST" action="addposition.php" enctype='multipart/form-data'>
				
				
				<div class="row group">
					<div class="col-md-6">
						<div class="form-group">
							<label for="role">Role Type: </label>
							<select class = "form-control" id="role" name="role">
								<option>Select Casual Role</option>
								<!--/**Use php here for Job sector drop down**/-->
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
					<div class="col-md-6">
						<div class="form-group">
							<label for="ptitle">Post Title: </label>
							<input type="ptitle" class="form-control" id="ptitle" name="ptitle" placeholder="Post Title">
						</div>
					</div>
					</div>
					<div class="row group">
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
						</div>
				<div class="row group">	
					<div class="col-md-4">
						<div class="form-group">	
							<label for="ptype">Post Hours Type: </label>
							<select class = "form-control" id="ptype" name="ptype">
								<option>Select Post Hours Type</option>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
									$select = "SELECT * FROM HoursType";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$type = $row['HoursType']; 
									$id = $row['TypeID'];
					
									echo"<option value='$id'>$type</option>";	
								}
								?>
							</select> 
						</div>
					</div>
					
			
			
					<div class="col-md-4">
						<div class="form-group">	
							<label for="start">Start Date (Est): </label>
							<input type="date" class="form-control" id="start" name="start" placeholder="dd/mm/yyyy">
						
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="end">End Date (Est): </label>
							<input type="date" class="form-control" id="end" name="end" placeholder="dd/mm/yyyy">
							</div><!--Need Validation so that end date is not before than start date-->
						</div>
					</div>
				
				<div class="row group">
					<div class="col-md-12">
						<div class="form-group">	
							<label for="descript">Post Description: </label>
							<textarea class="form-control" id="descript" name="descript" rows="10" maxlength="2000"></textarea>
							<small id="descript" class="form-text text-muted" align="right">
								2000 characters maximum
							</small>
						</div>	
					</div>
				</div>
				
			<!--	<div class="row">
								<div class="col-md-10">
									<div class="form-group">
										<label for="skill"><strong>Skills: </strong></label>
										<select id="skill" name="skill"  class="form-control">
											<!--<select id="skill" name="skill[]" multiple="multiple" class="form-control">
											<option> Select Skill </option>-->
												<!--get options from database-->
												<?php
													/*include("../include/conn.php");
													$skillCat = "SELECT * FROM SkillCategory";
													
													$catres=$conn->query($skillCat);
													
													$skillSel = "SELECT s.SkillID, s.Skill, s.SkillCatID, s.Active, sc.SkillCatID, sc.Category, sc.active
													FROM Skill s
													INNER JOIN SkillCategory sc ON s.SkillCatID = sc.SkillCatID
													ORDER BY sc.SkillCatID;";
													
													$skillRes = $conn->query($skillSel);
																											
													while ($row = $skillRes->fetch_assoc()) {
														$skills = $row['Skill'];
														$id = $row['SkillID'];
														echo"<option value='$id'>$skills</option>";
													}*/
															
												?>
									<!--	</select> 
										<script>
											$("#skill").chosen();
										</script>			
									</div>
								</div>
							
							</div>
							<div class="row" >
								<div class="col-md-6">
									<div class="form-group" style="display:none;" id="otherSkill">	
										<label for="others">Other Skill: </label>
										<input type="text" class="form-control" id="others" name="others" placeholder="Other Skill">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="display:none;" id="category">	
										<label for="cat">Skill Category: </label>
										<select id="cat" name="cat"  class="form-control">
											<option> Select Category </option>
												<!--get options from database-->
												<?php
													/*include("../include/conn.php");
													$skillCat = "SELECT * FROM SkillCategory";
													
													$catres=$conn->query($skillCat);
													
													while ($row = $catres->fetch_assoc()) {
														$cat = $row['Category'];
														$id = $row['SkillCatID'];
														echo"<option value='$id'>$cat</option>";
													}*/
															
												?>
									<!--	</select> 
									</div>
								</div>
							</div>-->
				
				<div class="row group">	
				<div class="text-right col-md-12">
					<button type="submit" id="create" name="create" class="btn btn-primary">Create Post</button>
				</div>
				</div>
					
				<!--<div class="form-group">	
					<button type="submit" button class="btn btn-save input-group-btn" name="continue">continue</button>
				</div>-->
			</form></br></br>
		
		
	</div> <!--end side navbar-->
</div><!--end container-->
<?php include '../include/footer.php';?>
