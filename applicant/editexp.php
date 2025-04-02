<?php

require ('../include/appSession.php');
	
	

if(isset($_POST['edit'])){
	include("../conn.php");
         
 
    $employer = $conn->real_escape_string(trim($_POST['employer']));
    $jobtitle = $conn->real_escape_string(trim($_POST['jobtitle']));
    $start = $conn->real_escape_string(trim($_POST['start']));
    $end = $conn->real_escape_string(trim($_POST['end']));
    $jobsector = $conn->real_escape_string(trim($_POST['jobsector']));
	//$sid = $conn->real_escape_string(trim($_POST['JobSectorID']));
    $duties =trim($_POST['duty']);
	
	
	if (!empty($current)) {
        $current=$_POST['current'];
	}else{
		$current= NULL;
	}
	
	$post = $_POST['postid'];
	
	
	
	if (!empty($end)) {
        $update = "UPDATE ApplicationExperience 
		SET EmployerName='$employer', JobTitle='$jobtitle', JobSectorID='$jobsector', current='$current', StartDate='$start', EndDate='$end', Duties='$duties' WHERE EmploymentID=$post;";
		
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: experience.php?update1=success');
            }
		
	}else{
		$update = "UPDATE ApplicationExperience 
		SET EmployerName='$employer', JobTitle='$jobtitle', JobSectorID='$jobsector', current='$current', StartDate='$start', EndDate=NULL, Duties='$duties' WHERE EmploymentID=$post;";
	
        
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: experience.php?update2=success');
            }
	}			   
}