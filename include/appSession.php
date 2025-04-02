<?php
session_start();

include("../conn.php");

	if (!isset($_SESSION['ApplicantID'])) {//invalid session
		echo $conn->error;
		header('location: index.php');
		/*     * echo '<p> invalid session<p>';* */
	} else {
		/*echo $_SESSION['ApplicantID'];
		echo $_SESSION['userName'];
		echo $_SESSION['userTypeID'];*/
	}
	
	$applicant = $_SESSION['ApplicantID'];
	$username = $_SESSION['userName'];
	$userType = $_SESSION['userTypeID'];
?>