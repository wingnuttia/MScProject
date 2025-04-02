<?php
	require ('../include/appSession.php');	
	
	//Set read = variable to sessionID
	
	//$applicant = $_SESSION['ApplicantID'];
	
	//read applicant details
	$read="SELECT al.ApplicantID, al.userName, al.email, 
	ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Preferred, ad.dob, ad.Mobile, ad.SexID, ad.SexID, ad.NationID, ad.Street, ad.City, ad.pcode, ad.hrsTypeID,
	Title.TitleID, Title.Title, Sex.Sex, Sex.SexID, nat.NationalityID, nat.Nationality,  ht.TypeID, ht.HoursType 
	
	FROM ApplicantDetails ad
	
	INNER JOIN ApplicantLogin al ON ad.ApplicantID = al.ApplicantID
	INNER JOIN Title ON ad.TitleID = Title.TitleID
	INNER JOIN Nationality nat ON ad.NationID = nat.NationalityID
	INNER JOIN Sex on ad.SexID = Sex.SexID
	INNER JOIN HoursType ht ON ad.hrsTypeID = ht.TypeID
	
	WHERE al.ApplicantID = '$applicant';";
  
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
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Personal Details</title>
    </head>

    <body>
		<header>		
			<h1>Personal Details</h1> 
		</header>
			
       
		<div class="container starcontain">
					
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
            }else{
				include '../include/memsidebar.php';
			}
			?>
		
<?php
        while($row = $result->fetch_assoc()){
           
		   	$applicant =  $row['ApplicantID']; 
			$uname = $row['userName'];
			$email= $row['email'];
			$titles = $row['Title'];
			$t = $row['TitleID'];
			$fname = $row['Forename'];
			$sname = $row['Surname'];
			$pname = $row['Preferred'];
			$dob = $row['dob'];
			$contact = $row['Mobile'];
			$sex = $row['Sex'];
			$s = $row['SexID'];
			$nation = $row['Nationality'];
			$n = $row['NationalityID'];
			$street = $row['Street'];
			$city = $row['City'];
			$pcode = $row['pcode'];
			$hrtype = $row['HoursType'];
			$h = $row['TypeID'];
		}
			
?></br></br>
            <form class="form-horizontal" method="POST" action="personaleditprocess.php" enctype='multipart/form-data'>
                <fieldset disabled>
					<div class="row group">
						<div class="col-md-6">
							<div class="form-group">
								<label for="uname"><strong>User Name: </strong></label>
									<?php echo"<input type='text' class='form-control' id='uname' name='uname' value='$uname'>";?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mail"><strong>Email: </strong></label>
								<?php echo "<input type='text' class='form-control' id='mail' name='mail' value='$email'>";?>
							</div>
						</div>
					</div>
					</fieldset>
				
				<div class="row group">
					<div class="col-md-2">
						<div class="form-group">
							<label for="title"><strong>Title: </strong></label>
								<select class="form-control" id="title" name="title">
									<?php //echo "<option name='title' selected=selected value='$titleid' disabled>$title</option>"; ?>
										<!--get options from database-->
						<?php
										include("../conn.php");
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
					<div class="col-md-10">
						<div class="form-group">
							<label for="fname"><strong>Forename:</strong></label>
							<?php echo "<input type='text' class='form-control' id='fname' name='fname' value='$fname'>";?>
						</div>
					</div>
					</div>
					<div class="row">	
						<div class="col-md-2"></div>
						<div class="col-md-10">
						<div class="form-group">
							<label for="Sname"><strong>Surname:</strong></label>
							<?php echo "<input type='text' class='form-control' id='sname' name='sname' value='$sname'>";?>
						</div>
					</div>
					</div>
					
				
				<div class="row group">	
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<div class="form-group">
						<label for="pname"><strong>Preferred Name:</strong></label>
						<?php echo "<input type='text' class='form-control' id='pname' name='pname' value='$pname'>";?>
					</div>
				</div>
				</div>
				
				<div class="row group">	
				<div class="col-md-2">
					<div class="form-group">	
						<label for="sex"><strong>Sex: </strong></label>
						<select class = "form-control" id="sex" name="sex">
							<?php //echo "<option name='sex' selected=selected value='$sexid' disabled>$sex</option>"; ?>
							<!--get options from database-->
							<?php
								include("../conn.php");
								$select = "SELECT * FROM Sex";
								$result = $conn->query($select);
								
								while ($row = $result->fetch_assoc()) {
									$sex = $row['Sex'];
									$sexid = $row['SexID'];

									if($sexid == $s){
										echo"<option selected value='$sexid'>$sex</option>";
									}else{
									echo"<option value='$sexid'>$sex</option>";
									}
								}
								?>
						</select> 
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="dob"><strong>Date of Birth: </strong></label>
						<?php echo"<input type='date' class='form-control' id='dob' name='dob' value='$dob'>";?>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nation"><strong>Nationality: </strong></label>
						<select class = "form-control" id="nation" name="nation">
								<?php //echo "<option name='nation' selected=selected value='$nationid' disabled>$nation</option>"; ?>
							<!--get options from database-->
							<?php
								include("../conn.php");
								$select = "SELECT * FROM Nationality";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$nation = $row['Nationality'];
									$nationid = $row['NationalityID'];

									if($nationid == $n){
										echo"<option selected value='$nationid'>$nation</option>";
									}else{
										echo"<option value='$nationid'>$nation</option>";
									}
								}
							?>
						</select> 
					</div>
					</div>
					</div>
				<div class="row group">	
				<div class="col-md-12">
				<div class="form-group">
        <label for="contact"><strong>Contact: </strong></label>
        <?php echo"<input type='text' class='form-control' id='contact' name='contact' value='$contact'>";?>
    </div>
	</div>
	</div>
	<div class="row group">
	<div class="col-md-12">
				<div class="form-group">
        <label for="street"><strong>Street Address: </strong></label>
        <?php echo "<input type='text' class='form-control' id='street' name='street' value='$street'>";?>
    </div>
	</div>
	</div>
	<div class="row group">
				<div class="col-md-6">
				<div class="form-group">
        <label for="city"><strong>City: </strong></label>
        <input type='text' class="form-control" id="city" name="city" value="<?php echo "$city";?>">
    </div>
	</div>
	<div class="col-md-6">
				<div class="form-group">
        <label for="pcode"><strong>Postcode: </strong></label>
        <?php echo" <input type='text' class='form-control' id='pcode' name='pcode' value='$pcode'>";?>
    </div>
	</div>
	</div>
	<div class="row group">
	<div class="col-md-6">
				<div class="form-group">
        <label for="hrtype"><strong>Preferred hours type: </strong></label>
        <select class = "form-control" id="hrtype" name="hrtype">
            <?php //echo "<option name='hrtype' selected=selected value='$hrid' disabled>$hrs</option>"; ?>
            <!--get options from database-->
            <?php
            include("../conn.php");
            $select = "SELECT * FROM HoursType";
            $result = $conn->query($select);

            while ($row = $result->fetch_assoc()) {
                $hrs = $row['HoursType'];
                $hrid = $row['TypeID'];

				if($hrid == $h){
					echo"<option selected value='$hrid'>$hrs</option>";
				}else{
					echo"<option value='$hrid'>$hrs</option>";
				}
            }
            ?>
        </select> 

    </div></div></div>
	</br>
	
				<div class="text-right col-md-12">	
					<button type="submit" class="btn btn-primary" name="editdetails">Save</button>
				</div>
			</form>
			
			</br></br>
			
			</div><!--end side navbar-->
		</div><!--end container-->
<?php include '../include/footer.php';?>
