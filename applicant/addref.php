<?php
require ('../include/appSession.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include("../conn.php");		

		$appID = $_SESSION['ApplicantID']; 
		$rfname = $conn->real_escape_string(trim($_POST['rfname']));
		$rsname=$conn->real_escape_string(trim($_POST['rsname']));
		$comp=$conn->real_escape_string(trim($_POST['comp']));
		$rel=$conn->real_escape_string(trim($_POST['rel']));
		$email=$conn->real_escape_string(trim($_POST['email']));
		$permiss=$conn->real_escape_string(trim($_POST['permiss']));
		$position=$conn->real_escape_string(trim($_POST['position']));

		//insert applicant details
	 	$insert = "INSERT INTO EmpReference ( AppID, Surname, Forename, Company, Position, RelID, email, id) 
		VALUES('$appID', '$rsname',   '$rfname', '$comp', '$position', '$rel', '$email', '$permiss');";
	  
		if($conn->query($insert)=== true){
			 header("location: reference.php?details=success");
		} else {
			echo $conn->error;
			echo "<p>unsuccessful</p>";
		}
	}
?>

<!--Need Session Variable for ApplicationID-->

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Reference</title>
    </head>
	
	<body>
	
		<header>
			<h1>References</h1> 
		</header>
		<div class="container starcontain">
			<?php// include '../include/navbar.php';?>
			
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
			
			<h3>Reference</h3>
			<!--TO DO need multiinsert form -->
			
			<form class="form-horizontal" method="POST" action="addref.php" enctype='multipart/form-data'>
				<div class="row group">
					<div class="col-md-4">
						<div class="form-group">
							<label for="rfname">Forename: </label>
							<input type="text" class="form-control" id="rfname" name="rfname" placeholder="Forename">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="rsname"><strong>Surname: </strong></label>
							<input type="text" class="form-control" id="rsname" name="rsname" placeholder="Surname">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="rel">Retlationship: </label>
							<select class = "form-control" id="rel" name="rel">
								<option>select</option>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
									$select = "SELECT * FROM RefRelation";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$rel = $row['Relationship']; 
									$id = $row['ID'];
					
									echo"<option value='$id'>$rel</option>";	
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row group">
					<div class="col-md-4">
						<div class="form-group">
							<label for="comp">Company: </label>
							<input type="text" class="form-control" id="comp" name="comp" placeholder="Company">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="position">Position: </label>
							<input type="text" class="form-control" id="position" name="position" placeholder="Position">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="email">email: </label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email">
						</div>				
					</div>				
				</div>
				<div class="row group">
					<div class="col-md-4">
						<div class="form-group">	
							<label for="permiss">Permission to Contact: </label>
							<select class = "form-control" id="permiss" name="permiss">
								<option>select</option>
								<!--/**Use php here for Job sector drop down**/-->
								<?php
								include('../conn.php');
									$select = "SELECT * FROM response";
									$result = $conn->query($select);

								while($row=$result->fetch_assoc()){			
									$res = $row['response']; 
									$id = $row['id'];
					
									echo"<option value='$id'>$res</option>";	
								}
								?>
							</select> 
						</div>
					</div>
					<div class="text-right col-md-6">	
						<button type = "submit" class="btn btn-primary" id="addref" name="addref">Add</button>
					</div>
				</div>
			</form>
		</div></br></br>

</div> <!--Container end-->
		
		</div> <!--closes sidebar dont remove
<?php include '../include/footer.php';?>