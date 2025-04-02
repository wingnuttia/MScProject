<?php

	require ('../include/appSession.php');
	
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include("conn.php");		

    $appID = $_SESSION['ApplicantID']; 
    $title = $conn->real_escape_string(trim($_POST['title']));
    $fname=$conn->real_escape_string(trim($_POST['fname']));
    $sname=$conn->real_escape_string(trim($_POST['sname']));
    $pname=$conn->real_escape_string(trim($_POST['pname']));
    $dob=$conn->real_escape_string(trim($_POST['dob']));
    $contact=$conn->real_escape_string(trim($_POST['contact']));
    $sex=$conn->real_escape_string(trim($_POST['sex']));
    $nation=$conn->real_escape_string(trim($_POST['nation']));
    $street=$conn->real_escape_string(trim($_POST['street']));
    $city=$conn->real_escape_string(trim($_POST['city']));
    $pcode=$conn->real_escape_string(trim($_POST['pcode']));
    $hrtype=$conn->real_escape_string(trim($_POST['hrtype']));

    //insert applicant details
    $insert = "INSERT INTO ApplicantDetails (ApplicantID, TitleID, Forename, Surname, Preferred, dob, Mobile, SexID, NationID, Street, City, pcode, hrsTypeID) 
	VALUES('$appID', '$title', '$fname', '$sname', '$pname', '$dob', '$contact', '$sex', '$nation', '$street', '$city', '$pcode', '$hrtype');";
  
   if($conn->query($insert)=== true){
        
        header("location: ../applicant/welcome.php?details=success");
		
    } else {
         echo $conn->error;
		 echo "<p>unsuccessful</p>";
    }
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
			<h1>Personal Information</h1> 
		</header>
      <?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
                    }
			if ($userType == "5") {
				include '../include/memsidebar.php';
			} else {
				header('Location: index.php');
			}
			?>

        <div class="container">
		<h3>Personal Information</h3></br></br>
            <form class="form-horizontal" method="POST" action="personal.php" enctype='multipart/form-data'>
                
				<div class="row group">
					<div class="col-md-2">
						<div class="form-group">
							<label for="title"><strong>Title: </strong></label>
								<select class="form-control" id="title" name="title">
									<option>Title</option>
										<!--get options from database-->
									<?php
										include("../include/conn.php");
										$titleSel = "SELECT * FROM Title";
										$titleRes = $conn->query($titleSel);

										while ($row = $titleRes->fetch_assoc()) {
											$title = $row['Title'];
											$id = $row['TitleID'];

											echo"<option value='$id'>$title</option>";
										}
									?>
								</select> 
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<label for="fname"><strong>Forename:</strong></label>
							<input type="text" class="form-control" id="fname" name="fname" placeholder="Forename">
						</div>
					</div>
					</div>
					<div class="row">	
						<div class="col-md-2"></div>
						<div class="col-md-10">
						<div class="form-group">
							<label for="Sname"><strong>Surname:</strong></label>
							<input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
						</div>
					</div>
					</div>
					
				
				<div class="row group">	
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<div class="form-group">
						<label for="pname"><strong>Preferred Name:</strong></label>
						<input type="text" class="form-control" id="pname" name="pname" placeholder="Preferred Name">
					</div>
				</div>
				</div>
				
				<div class="row group">	
				<div class="col-md-2">
					<div class="form-group">	
						<label for="sex"><strong>Sex: </strong></label>
						<select class = "form-control" id="sex" name="sex">
							<option>Sex</option>
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM Sex";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$sex = $row['Sex'];
									$id = $row['SexID'];

									echo"<option value='$id'>$sex</option>";
									}
								?>
						</select> 
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="dob"><strong>Date of Birth: </strong></label>
						<input type="date" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy">
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nation"><strong>Nationality: </strong></label>
						<select class = "form-control" id="nation" name="nation">
							<option>Nationality</option>
							<!--get options from database-->
							<?php
								include("../include/conn.php");
								$select = "SELECT * FROM Nationality";
								$result = $conn->query($select);

								while ($row = $result->fetch_assoc()) {
									$nation = $row['Nationality'];
									$id = $row['NationalityID'];

									echo"<option value='$id'>$nation</option>";
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
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
    </div>
	</div>
	</div>
	<div class="row group">
	<div class="col-md-12">
				<div class="form-group">
        <label for="street"><strong>Street Address: </strong></label>
        <input type="text" class="form-control" id="street" name="street" placeholder="Enter street address">
    </div>
	</div>
	</div>
	<div class="row group">
				<div class="col-md-6">
				<div class="form-group">
        <label for="city"><strong>City: </strong></label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
    </div>
	</div>
	<div class="col-md-6">
				<div class="form-group">
        <label for="pcode"><strong>Postcode: </strong></label>
        <input type="text" class="form-control" id="pcode" name="pcode" placeholder="Enter postcode">
    </div>
	</div>
	</div>
	<div class="row group">
	<div class="col-md-6">
				<div class="form-group">
        <label for="hrtype"><strong>Preferred hours type: </strong></label>
        <select class = "form-control" id="hrtype" name="hrtype">
            <option>Select working pattern</option>
            <!--get options from database-->
            <?php
            include("../include/conn.php");
            $select = "SELECT * FROM HoursType";
            $result = $conn->query($select);

            while ($row = $result->fetch_assoc()) {
                $hrs = $row['HoursType'];
                $id = $row['TypeID'];

                echo"<option value='$id'>$hrs</option>";
            }
            ?>
        </select> 

    </div></div></div>
	</br>
	
				<div class="text-right col-md-12">	
					<button type="submit" class="btn btn-primary" name="details">Save</button>
				</div>
			</form>
			
			</br></br>
		</div>
		
<?php include '../include/footer.php';?>
