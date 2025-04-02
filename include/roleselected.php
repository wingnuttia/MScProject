<?php

require ('../include/appSession.php');

if(isset($_POST['selrole'])){
	include("../conn.php");
	
	$roles=0;
	
	$roles = $conn->real_escape_string(trim($_POST['roles']));
		
	
		$roles = $_POST['roles'];
		
		$checkuser = "SELECT * FROM Role";
					
		$result = $conn->query($checkuser);

		if (!$result) {
			echo $conn->error;
		}
		
	switch ($r){
				case 1:
					$role = '1';
					break;
				case 2:
					$role = '2';
					break;
				case 3:
					$role = '3';
					break;
				case 4:
					$role = '4';
					break;
				case 4:
					$role = '5';
					break;
				default:
					header('Location: ../stafflogin/index.php?error');
					//echo $utype;
			}
		//}
}
?>