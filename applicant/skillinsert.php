<?php 
require ('../include/appSession.php');
include("../conn.php");

if(isset($_POST["skill"])){
	$appID = $_SESSION['ApplicantID']; 
	$skill = '';
 
	foreach($_POST["skill"] as $row){
		$skill .= $row . ', ';
	}
 echo " skill $skill app ";
	$skill = substr($skill, 0, -1);
	
	$query = "INSERT INTO SkillSetMem (AppID, SkillID) VALUES(".$skill."',".$appID.")";
 
	//if($conn->query($query)=== true){
	if(mysqli_query($conn, $query)){
	  echo "Data Inserted";
	 // header : ("location: skill.php?details=success");
	}else{
		echo "unsuccessful";
		//header : ("location: skill.php?details=nosuccess");
	}
}


/*<?php 
//insert.php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO like_table(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

		$appID = $_SESSION['ApplicantID']; 
		//$skill = $_POST['skill'];
		

		//insert applicant details
	 	$insert = "INSERT INTO SkillSetMem  (AppID, SkillID)
		VALUES";
		
		foreach($_POST ['skill'] as $skill){
			$insert="('$appID', '$skill');";
		}
	
	 
		if($conn->query($insert)=== true){
			 header("location: skill.php?details=success");
		} else {
			echo $conn->error;
			echo "<p>unsuccessful</p>";
		}
	
}*/
		
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
		
		<title>STAR</title> <!--Change this each page--> 
	</head>
	
	<body>
		<body>
		
			<header>
				<h1>Skills</h1> 
			</header>
			
			
		<div class="container starcontain">
			<?php //include '../include/navbar.php';?>
			<div class="row">
				<div class="column left">
					<?php 
						if ($userType == "4") {
							include '../include/appsidebar.php';		
						}else{
							include '../include/memsidebar.php';
						}
					?>
				</div>
			  
				<div class="column content">
				<div class="column middle">
					<div class="text-right">
						
						
						
					</div>
					</br>
					
				</div>
			
				<div class="column right">
					<?php include '../include/completed.php';?>
				</div>
				</div>
			</div>

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>