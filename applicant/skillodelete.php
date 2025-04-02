<?php

require ('../include/appSession.php');

	include("../conn.php");

	$deleteid = $_GET['deleteid'];

	$readskill="SELECT al.ApplicantID, al.userName, osm.OtherSkillID, osm.AppID, osm.OtherSkill, osm.catID,
	sc.SkillCatID, sc.Category, sc.active
	 	
	FROM skillOtherMem osm
	
	INNER JOIN ApplicantLogin al ON osm.AppID = al.ApplicantID

	INNER JOIN SkillCategory sc ON osm.catID = sc.SkillCatID
										
	WHERE osm.OtherSkillID = '$deleteid';";
	
	$resultskill = $conn->query($readskill);

	if(!$resultskill){
	 echo $conn->error;    
	}

	

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
		
		<title>Skills</title>
	</head>
	
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
			
			  <p>Confirm delete Skill</p>
			  </br>
			  
			<?php while($row = $resultskill->fetch_assoc()){
				//$applicant =  $row['ApplicantID']; 
				$id = $row['OtherSkillID'];
				$skill = $row['OtherSkill'];
				$cat= $row['Category'];
			}?>

			<form class="form-horizontal needs-validation" novalidate method="POST" action="skillodelete1.php" enctype='multipart/form-data'>
				<div class="row" >
					<div class="col-md-6">
						<div class="form-group" id="Skill">	
							<label for="skill"><strong>Other Skill: </strong></label>
							<?php echo "<input type='text' class='form-control' id='level' name='level' value='$skill'>";?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group" id="cat">	
							<label for="cat"><strong>Category: </strong></label>
							<?php echo"<input type='text' class='form-control' id='cat' name='cat' value='$cat'>";?>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<?php echo"	<input type='hidden' value='$deleteid' name='postid'>";?>
					</div>
					<div class="text-right col-md-6">
						<?php echo"<input type='submit' class='btn btn-primary'  name='delete' value='Confirm Delete' >";?>
					</div>
				</div>
			</form>
			</br></br>
			
			<div class="row">
				<div class="text-right col-md-12">
					<a href="skill.php" class='btn btn-danger'title="Next">Cancel</a>	
				</div>
			</div>
			</br>
			 
			</div>
			
			</div>
	
<?php include '../include/footer.php';?>				