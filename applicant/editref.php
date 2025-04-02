<?php

	require ('../include/appSession.php');
	
	$getid = $_GET['editid'];
	
    $read = "SELECT al.ApplicantID, al.userName, ref.ReferenceID, ref.Surname, ref.Forename, ref.Company, ref.Position, ref.RelID, ref.email, ref.id, res.id, res.response, rr.ID, rr.Relationship, rr.active
	
	FROM EmpReference ref
	
	INNER JOIN ApplicantLogin al ON  ref.AppID = al.ApplicantID
	INNER JOIN response res ON ref.id = res.id
	INNER JOIN RefRelation rr ON ref.RelID = rr.ID
	
	WHERE ref.ReferenceID = '$getid';";
	
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;
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
			<?php //include '../include/navbar.php';?>
			
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
			</br><h3>Reference</h3>
			
			</br>
		
		</br>
		<?php
			while($row = $result->fetch_assoc()){
				$applicant = $row['ApplicantID'];
				$refID = $row['ReferenceID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$company = $row['Company'];
				$position = $row['Position'];
				$rel = $row['Relationship'];
				$r = $row['ID'];
				$email = $row['email'];
				$perm = $row['response'];
				$p = $row['id'];
			}
		?>
					
				<form class="form-horizontal" method="POST" action="editrefp.php" enctype='multipart/form-data'>
			
					<div class="row group">
						<div class="col-md-4">
							<div class="form-group">
								<label for="rfname">Forename: </label>
								<?php echo "<input type='text' class='form-control' id='rfname' name='rfname' value='$fname'>";?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rsname"><strong>Surname: </strong></label>
								<?php echo"<input type='text' class='form-control' id='rsname' name='rsname' value='$sname'>";?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rel">Retlationship: </label>
								<select class ="form-control" id="rel" name="rel">
									<?php //echo "<option name='rel' selected=selected value='$relID' disabled>$rel</option>"; ?>
									<option name='rel'>select</option>
									<!--/**Use php here for Job sector drop down**/-->
									<?php
									include('../conn.php');
									$select = "SELECT * FROM RefRelation";
									$result = $conn->query($select);

									while($row=$result->fetch_assoc()){
										$rel = $row['Relationship']; 
										$relID = $row['ID'];
						
										if($relID ==$r){
											echo"<option selected value='$relID'>$rel</option>";	
										}else{
											echo"<option value='$relID'>$rel</option>";	
										}
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
									<?php echo "<input type='text' class='form-control' id='comp' name='comp' value='$company'>";?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="position">Position: </label>
								<?php echo "<input type='text' class='form-control' id='position' name='position' value='$position'>";?>
							</div>
						</div>								
						<div class="col-md-4">
							<div class="form-group">
								<label for="email">email: </label>
								<?php echo "<input type='text' class='form-control' id='email' name='email' value = '$email'>";?>
							</div>				
						</div>				
					</div>
					<div class="row group">
						<div class="col-md-4">
							<div class="form-group">	
								<label for="permiss">Permission to Contact: </label>
								<select class = "form-control" id="permiss" name="permiss">
									<option>select</option>
									<?php //echo "<option name='permiss' selected=selected value='$pid' disabled>$perm</option>"; ?>
									<!--/**Use php here for Job sector drop down**/-->
									<?php
									include('../conn.php');
										$select = "SELECT * FROM response";
										$result = $conn->query($select);

									while($row=$result->fetch_assoc()){			
										$perm = $row['response']; 
										$pid = $row['id'];
						
										if($pid == $p){
											echo"<option selected value='$pid'>$perm</option>";	
										}else{
											echo"<option value='$pid'>$perm</option>";	
										}
									}
									?>
								</select> 
							</div>
						</div>
						</div>
						<div class="row group">
						<div class='col-md-1'>		
							<div class='form-group'>
								<?php	echo "<input type='hidden' value='$getid' name='postid'>";?>
							</div>
						</div>
						<div class="text-right col-md-11">	
							<button type="submit" class="btn btn-primary" id="edit" name="edit" >update</button>
						</div>
					</div>
				</form>
			</br>

		</div> <!--Container end-->
	</div>
<?php include '../include/footer.php';?>