<?php
session_start();

include("../conn.php");

	if (!isset($_SESSION['UserID'])) {//invalid session
		header('location: ../stafflogin/index.php?error');
		/*     * echo '<p> invalid session<p>';* */
	} else {
		/*echo $_SESSION['UserID'];
		echo $_SESSION['StaffNo'];
		echo $_SESSION['UserTypeID'];*/
	}
	
	$userid = $_SESSION['UserID'];
	$username = $_SESSION['StaffNo'];
	$userType = $_SESSION['UserTypeID'];
?>