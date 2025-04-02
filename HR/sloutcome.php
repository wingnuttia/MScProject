<?php 

require ('../include/staffSession.php');



	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include("../conn.php");		
		
		$outcome=$conn->real_escape_string(trim($_POST['out']));
		
		if ($outcome == '1'){
			$updateo ="UPDATE Application SET appStage='2'";
			
			$updateresult = $conn -> query($updateo);
				if(!$updateresult){
					echo $conn->error;
				}else{
					header('location: ../email/reject.php?viewid=$appID');
				}
		}else{
			$updateo ="UPDATE Application SET appStage='3'";
			
			$updateresult = $conn -> query($updateo);
				if(!$updateresult){
					echo $conn->error;
				}else{
					header('location: ../email/documentcheck.php?viewid=$appID');
				}
		}
	}
?>