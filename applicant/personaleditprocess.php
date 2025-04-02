<?php
	require ('../include/appSession.php');
	
	//Set read = variable to sessionID
	
	$applicant = $_SESSION['ApplicantID'];
	
	//read applicant details
    $read="SELECT ApplicantLogin.ApplicantID, ApplicantLogin.userName, ApplicantLogin.email, ApplicantDetails.ApplicantID,
	ApplicantDetails.TitleID, ApplicantDetails.Forename, ApplicantDetails.Surname,
	ApplicantDetails.Preferred, ApplicantDetails.dob, ApplicantDetails.Mobile,
	ApplicantDetails.SexID, ApplicantDetails.SexID, ApplicantDetails.NationID,
	ApplicantDetails.Street, ApplicantDetails.City, ApplicantDetails.pcode, ApplicantDetails.hrsTypeID,
	Title.Title, Sex.Sex, Nationality.Nationality, HoursType.TypeID, HoursType.HoursType FROM ApplicantDetails
	
	INNER JOIN ApplicantLogin ON ApplicantDetails.ApplicantID = ApplicantLogin.ApplicantID
	INNER JOIN Title ON ApplicantDetails.TitleID = Title.TitleID
	INNER JOIN Nationality ON ApplicantDetails.NationID = Nationality.NationalityID
	INNER JOIN Sex on ApplicantDetails.SexID = Sex.SexID
	INNER JOIN HoursType ON ApplicantDetails.hrsTypeID = HoursType.TypeID
	WHERE ApplicantLogin.ApplicantID = '$applicant';";
  
  $result = $conn->query($read);
 
        if(!$result){
         echo $conn->error;    
        }
	
if(isset($_POST['editdetails'])){
	include("../conn.php");
         
		$appID = $_SESSION['ApplicantID'];
		$title = $conn->real_escape_string(trim($_POST['title']));
		$tid= $conn->real_escape_string(trim($_POST['title']));
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
                    								
		$update = "UPDATE ApplicantDetails 
		SET TitleID='$tid', Forename='$fname', Surname = '$sname', Preferred='$pname', dob='$dob', Mobile='$contact', 
		SexID ='$sex', NationID='$nation', Street='$street', City='$city', pcode='$pcode', hrsTypeID='$hrtype'
		WHERE ApplicantID='$appID' ";
        
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: personal.php');
               }			   
							                                                
    }

?>