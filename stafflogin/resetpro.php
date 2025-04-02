<?php 

	require ('../include/staffSession.php');

if(isset($_POST['updatep'])){
	if ($_POST['apass'] == $_POST['pass2']) {
		include("../conn.php");
         
		$_SESSION['uname'] = $username;
 
		$pass = md5($_POST['apass']);
	
        $update = "UPDATE StaffUser SET pw='$pass' WHERE UserID=$username;";
		
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: ../stafflogin/passupdatesuccess.php');
            }
	}
}	
			?>