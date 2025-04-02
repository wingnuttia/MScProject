<?php
require ('../include/appSession.php');


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include("../conn.php");		

		$appID = $_SESSION['ApplicantID']; 
		$skill=$conn->real_escape_string(trim($_POST['skill']));
		$others=$conn->real_escape_string(trim($_POST['others']));
		$cats=$conn->real_escape_string(trim($_POST['cat']));
				
		//insert applicant details
		
		
		if (!empty($others)) {
            $insertskill="INSERT INTO skillOtherMem ( AppID, OtherSkill, catID) 
		VALUES ('$appID','$others','$cats');";
		}else{
			$insertskill="INSERT INTO SkillSetMem (AppID, SkillID) 
			VALUES ('$appID', '$skill');";
		}
		
		
		
		if($conn->query($insertskill)=== true){ //
			
			header("location: skill.php?details=success");
			
		} else {
			 echo $conn->error;
			 echo "<p>unsuccessful</p>";
		}
}		  
		//delete skill
		//$getsid = $_GET['deletesid'];
		//$getoid = $_GET['deleteoid'];
		/*$readmemskill = "SELECT ID,  AppID, SkillID FROM SkillSetMem WHERE ID = '$deletesid';";
		
		$resdelskill = $conn->query($readmemskill);

		if(!$resdelskill){
		 echo $conn->error;    
		}
		
		//delete other skill
		$getoid = $_GET['deleteoid'];
		$readother = "SELECT OtherSkillID,  AppID, OtherSkill, catID FROM skillOtherMem WHERE skillOtherMem.ID ='$deleteoid'  ";
		
		$resdelother = $conn->query($readother);

		if(!$resdelother){
		 echo $conn->error;    
		}*/

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	/*if ((isset($_POST["add"])) && ($_POST[]
		include(".._/conn.php");		

		$appID = $_SESSION['ApplicantID']; 
		//$skill = $_POST['skill'];
		
		$sql='';
		foreach ($_POST['skill'] as $skill){
			
			sql .="('$appID', '$skill'),";
		}
		
		$sql= "INSERT INTO SkillSetMem (AppID, SkillID) 
		VALUES ". trim(Sql,',');

		//insert applicant details
	 	/*$insert = "INSERT INTO SkillSetMem (AppID, SkillID) 
		VALUES";
		
		foreach($_POST ['skill'] as $skill){
			$insert="('$appID', '$skill');";
		}
	
	 
		if($conn->query($insert)=== true){
			 header("location: skill.php?details=success");
		} else {
			echo $conn->error;
			echo "<p>unsuccessful</p>";
		}*/
	

?>



<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
 
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js" integrity="sha256-TDtzz+WOGufaQuQzqpEnnxdJQW5xrU+pzjznwBtaWs4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha256-0LjJurLJoa1jcHaRwMDnX2EQ8VpgpUMFT/4i+TEtLyc=" crossorigin="anonymous" />
		
	
	<script>
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
	</script>
	

		<title>Skills</title>
	</head>
	
	<body>
		<body>
		
			<header>
				<h1>Skill</h1> 
			</header>
			
			
		<div class="container starcontain">
		</br>
			<?php //include '../include/navbar.php';?>
			
			
					<?php 
						if ($userType == "4") {
							include '../include/appsidebar.php';		
						}else{
							include '../include/memsidebar.php';
						}
					?>
			
			  
				<!--<div class="column content">
					<div class="column middle">-->
						<form class="form-horizontal needs-validation" novalidate method="POST" id="sll" name="sll" action="skill.php">
							<div class="row">
								<div class="col-md-10">
									<div class="form-group">
										<label for="skill"><strong>Skills: </strong></label>
										<select id="skill" name="skill"  class="form-control">
											<!--<select id="skill" name="skill[]" multiple="multiple" class="form-control">-->
											<option> Select Skill </option>
												<!--get options from database-->
												<?php
													include("../include/conn.php");
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
													}
															
												?>
										</select> 
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
													include("../include/conn.php");
													$skillCat = "SELECT * FROM SkillCategory";
													
													$catres=$conn->query($skillCat);
													
													while ($row = $catres->fetch_assoc()) {
														$cat = $row['Category'];
														$id = $row['SkillCatID'];
														echo"<option value='$id'>$cat</option>";
													}
															
												?>
										</select> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-right col-md-12">
									<input type="submit" class="btn btn-danger" name="submit" value = "Add"/> 
										<!--<button type="submit" id="submit" name="submit" class="btn btn-danger">submit</button>-->
								</div>
							</div>
						</form>
						</br>
						</br>
						<div class="container skill col-md-12 ">
						
						
						<header>
							<h2>My Skills</h2> 
						</header>
						</br>
						
						<?php
							$readskill1="SELECT al.ApplicantID, al.userName, ssm.AppID, ssm.SkillID, s.SkillID, s.Skill, s.SkillCatID, s.active, sc.SkillCatID, sc.Category, sc.active
	 	
							FROM SkillSetMem ssm
							
							INNER JOIN ApplicantLogin al ON ssm.AppID = al.ApplicantID
							INNER JOIN Skill s ON ssm.SkillID = s.SkillID
							INNER JOIN SkillCategory sc ON s.SkillCatID = sc.SkillCatID
																
							WHERE al.ApplicantID = '$applicant'
							
							ORDER BY Category;";
							
							$resultskill1 = $conn->query($readskill1);
					 
							if(!$resultskill1){
							 echo $conn->error;    
							}
							?>
							
						<div class="row" >
							<div class="col-md-6">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th width="15%">Category</th>
											<th width="15%">Skill</th>
											<th width="5%"></th>
										</tr>
									</thead>
								<?php while($row = $resultskill1->fetch_assoc()){
									 	$applicant =  $row['ApplicantID']; 
										$id1=$row['SkillID'];
										$skill1 = $row['Skill'];
										$cat1= $row['Category'];
									echo "
									<tbody>
										<tr>
											<td>$cat1</td>
											<td>$skill1</td>
											<td><a href='skilldelete.php?deleteid=$id1' class='btn btn-danger' name='Sdelete' title='Delete'><i class='fa fa-trash'></i></a></td>
										</tr>
										
									</tbody>";//<input type='hidden' value='$getsid' name='postid'>
								}
							?>
							</table>
							</div>
						<div class="col-md-6">
						<?php
							$readskill2="SELECT al.ApplicantID, al.userName,  sc.SkillCatID, sc.Category, sc.active, o.OtherSkillID, o.AppID, o.OtherSkill, o.catID
	 	
							FROM skillOtherMem o
							
							INNER JOIN ApplicantLogin al ON o.AppID = al.ApplicantID
							INNER JOIN SkillCategory sc ON o.CatID = sc.SkillCatID
																
							WHERE al.ApplicantID = '$applicant'
							
							ORDER BY Category;";
							
							$resultskill2 = $conn->query($readskill2);
					 
							if(!$resultskill2){
							 echo $conn->error;    
							}
							?>
						
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th width="15%">Category</th>
								<th width="15%">Other Skill</th>
								<th width="5%"></th>
							</tr>
						</thead>
						
						<?php while($row = $resultskill2->fetch_assoc()){
							   
								$applicant =  $row['ApplicantID']; 
								$id = $row['OtherSkillID'];
								$cat2= $row['Category'];
								$otherskill = $row['OtherSkill'];
							
							echo "
							<tbody>
								<tr>
									<td>$cat2</td>
									<td>$otherskill</td>
									<td><a href='skillodelete.php?deleteid=$id' class='btn btn-danger' title='Delete'><i class='fa fa-trash'></i></a></td>
								</tr>
							</tbody>";//<input type='hidden' value='$getoid' name='postid'>
						}
					?>
					</table>
						</div>
						
						
						</div>
						
						
						
						</br></br>	
						
						<div class="row">
							<div class="text-right col-md-12">
								<a href="reference.php" class='btn btn-danger'title="Next">Reference</a>	
							</div>
						</div>
</div>						
						</br>
						</br>
						
					</div>
			
					<!--<div class="column completed">
						<?php include '../include/completed.php';?>
					</div>
				</div>
			</div>-->

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>



<script>
	/*$(document).ready(function(){
		$('#skill').multiselect({
			nonSelectedText: 'Select Skills',
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			buttonWidth:'200px'
		});
		
		$('#sll').on('submit', function(event){
			event.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url:'insertskill.php',
				method:"POST",
				data:form_data,
				success:function(data)
			{
				$('#skill option:selected').each(function(){
					$(this).prop('selected', false);
				});
				$('#skill').multiselect('refresh');
				alert(data);
			}
		  });
		});
	});*/
</script>	

<?php
						
						/*include("../conn.php");

							$appID = $_SESSION['ApplicantID']; 
							$skillid = $_POST['skill'];

							if($skillid){
								foreach ($skillid as $s){
									mysqli_query($conn, "INSERT INTO SkillSetMem (SkillID, AppID) VALUES (' 
									".$s."',".$appID.")");
								}
						}*/
						?>