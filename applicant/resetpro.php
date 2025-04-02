<?php 

require ('../include/appSession.php');

if(isset($_POST['updatep'])){
	if ($_POST['apass'] == $_POST['pass2']) {
		include("../conn.php");
         
		$_SESSION['uname'] = $username;
		$appID = $_SESSION['ApplicantID']; 
 
		$pass = md5($_POST['apass']);
	
        $update = "UPDATE ApplicantLogin 
		SET pw='$pass' WHERE UserID=$appID;";
		
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: ../applicant/welcome.php');
            }
	}
}	
			?>