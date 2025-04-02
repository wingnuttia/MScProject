<?php
require ('../include/appSession.php');
	
if(isset($_POST['edit'])){
	include("../conn.php");
    
    $appID = $_SESSION['ApplicantID']; 
    $fname = $conn->real_escape_string(trim($_POST['rfname']));
    $sname=$conn->real_escape_string(trim($_POST['rsname']));
    $company=$conn->real_escape_string(trim($_POST['comp']));
    $rel=$conn->real_escape_string(trim($_POST['rel']));
    $email=$conn->real_escape_string(trim($_POST['email']));
    $perm=$conn->real_escape_string(trim($_POST['permiss']));
	//$pid =$conn->real_escape_string(trim($_POST['permiss']));
	$position=$conn->real_escape_string(trim($_POST['position']));
		
	$post = $_POST['postid'];
	
	$update = "UPDATE EmpReference 
	SET Surname='$sname', Forename='$fname', Company='$company', Position='$position', RelID='$rel', email='$email', id='$perm' WHERE ReferenceID=$post;";
						
	$updateresult = $conn -> query($update);
                               
	if(!$updateresult){
		echo $conn->error;
	}else{
		echo "<p>update successful</p>";
		header('location: reference.php?update=success');
	}
}			   