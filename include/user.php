<?php

require ('../include/staffSession.php');

if(isset($_POST['chntype'])){
	include("../conn.php");
	
	$utype=0;
	
	$utype = $conn->real_escape_string(trim($_POST['utype']));
		
		//$userType = $utype;
	
		$utype = $_POST['utype'];
		
		//echo $utype;

		$checkuser = "SELECT SU.UserID, SU.StaffNo, SUT.ID, SUT.UserID, SUT.UserTypeID,SUT.defaultType, SUT.active, UT.UserTypeID, UT.UserType
		FROM StaffUser SU
		INNER JOIN StaffUserType SUT ON SU.UserID = SUT.UserID	
		INNER Join UserType UT ON SUT.UserTypeID = UT.UserTypeID
		WHERE StaffNo = '$username'";
					
		$result = $conn->query($checkuser);

		if (!$result) {
			echo $conn->error;
		}
		
	echo $utype;	

	/*	$num = $result->num_rows;

		if ($num > 0) {

			while ($row = $result->fetch_assoc()) {
				
				$utype = $row['UserTypeID'];
				
				//$_SESSION['UserTypeID'] = $utype;
			}//end of the while*/

			switch ($utype){
				case 1:
					header('Location: ../admin/welcome.php');
					//echo $utype;
					break;
				case 2:
					header('Location: ../HR/welcome.php');
					//echo $utype;
					break;
				case 3:
					header('Location: ../Manager/welcome.php');
					//echo $utype;
					break;
				default:
					header('Location: ../stafflogin/index.php?error');
					//echo $utype;
			}
		//}
}
?>