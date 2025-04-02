<?php
/*session_start();

include("../conn.php");
if (!isset($_SESSION['ApplicantID'])) {//invalid session
    header('location: index.php');
    /*     * echo '<p> invalid session<p>';* 
} else {
    echo $_SESSION['ApplicantID'];
    echo $_SESSION['userName'];
	echo $_SESSION['userTypeID'];
	}*/
	
	include ('../include/appSession.php');
	
	//Set read = variable to sessionID
	
	//$applicant = $_SESSION['ApplicantID'];
	
	//Read applicant data from database
	$read="SELECT al.ApplicantID, al.userName, al.email, 
	ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Preferred, ad.dob, ad.Mobile, ad.SexID, ad.SexID, ad.NationID, ad.Street, ad.City, ad.pcode, ad.hrsTypeID, Title.TitleID, Title.Title, Sex.Sex, Sex.SexID, nat.NationalityID, nat.Nationality,  ht.TypeID, ht.HoursType 
	
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
		
			<h1>Personal Information</h1> 
			
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
		
			<?php
			while($row = $result->fetch_assoc()){
			
				$applicant =  $row['ApplicantID']; 
				$uname = $row['userName'];
				$email= $row['email'];
				$title = $row['Title'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$pname = $row['Preferred'];
				$dob = $row['dob'];
				$contact = $row['Mobile'];
				$sex = $row['Sex'];
				$nation = $row['Nationality'];
				$street = $row['Street'];
				$city = $row['City'];
				$pcode = $row['pcode'];
				$hrtype = $row['HoursType'];
			}
				
	?>

			<!--<h3>Personal Information</h3>-->
			</br></br>
			<?php
			echo" <form class='form-horizontal' method='POST' action='personaledit.php' enctype='multipart/form-data'>
					<fieldset disabled>
					<div class='row group'>
						<div class='col-md-6'>
							<div class='form-group'>
								<label for='title'><strong>User Name: </strong></label>
									<input type='text' class='form-control' id='uname' name='uname' value='$uname'>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<label for='contact'><strong>Email: </strong></label>
								<input type='text' class='form-control' id='mail' name='mail' value='$email'>
							</div>
						</div>
					</div>
						<div class='row group'>
						<div class='col-md-4'>
							<div class='form-group'>
								<label for='title'><strong>Title: </strong></label>
									<input type='text' class='form-control' id='title' name='title' value='$title'>
							</div>
						</div>
						<div class='col-md-4'>
							<div class='form-group'>
								<label for='fname'><strong>Forename:</strong></label>
								<input type='text' class='form-control' id='fname' name='fname' value='$fname'>
							</div>
						</div>
						<div class='col-md-4'>
							<div class='form-group'>
								<label for='Sname'><strong>Surname:</strong></label>
								<input type='text' class='form-control' id='sname' name='sname' value='$sname'>
							</div>
						</div>
					</div>
					
					<div class='row group'>	
						<div class='col-md-2'>
							<div class='form-group'>	
								<label for='sex'><strong>Sex: </strong></label>
								<input type='text' class='form-control' id='sex' name='sex' value='$sex'>
									 
							</div>
						</div>
						<div class='col-md-5'>
							<div class='form-group'>
								<label for='dob'><strong>Date of Birth: </strong></label>
								<input type='date' class='form-control' id='dob' name='dob' value='$dob'>
							</div>
						</div>
						<div class='col-md-5'>
							<div class='form-group'>
								<label for='nation'><strong>Nationality: </strong></label>
								<input type class = 'form-control' id='nation' name='nation' value='$nation'>
								 
							</div>
						</div>
					</div>
					<div class='row group'>	
						
						<div class='col-md-8'>
							<div class='form-group'>
								<label for='contact'><strong>Contact: </strong></label>
								<input type='text' class='form-control' id='contact' name='contact' value='$contact'>
							</div>
						</div>
						<div class='col-md-4'>
							<div class='form-group'>
								<label for='hrtype'><strong>Preferred hours type: </strong></label>
								<input type='text' class='form-control' id='hrtype' name='hrtype' value='$hrtype'>
							</div>
						</div>
					</div>
				<div class='row group'>
					<div class='col-md-6'>
						<div class='form-group'>
							<label for='street'><strong>Street Address: </strong></label>
							<input type='text' class='form-control' id='street' name='street' value='$street'>
						</div>
					</div>
					<div class='col-md-3'>
						<div class='form-group'>
							<label for='city'><strong>City: </strong></label>
							<input type='text' class='form-control' id='city; name='city' value='$city'>
						</div>
					</div>
					<div class='col-md-3'>
						<div class='form-group'>
							<label for='pcode'><strong>Postcode: </strong></label>
							<input type='text' class='form-control' id='pcode' name='pcode' value='$pcode'>
						</div>
					</div>
				</div>
			</fieldset>
			</br>
			<div class='text-right col-md-12'>	
					<button type='submit' class='btn btn-primary' name='details'>Edit</button>
				</div>
		</form>"
	?>
		</br></br>
		</div>
	</div>		
<?php include '../include/footer.php';?>
