<?php

require ('../include/appSession.php');
	
	

if(isset($_POST['edit'])){
	include("../conn.php");
         
	$subject = $conn->real_escape_string(trim($_POST['sub']));
	$level=$conn->real_escape_string(trim($_POST['level']));
	$country=$conn->real_escape_string(trim($_POST['country']));
	$grade=$conn->real_escape_string(trim($_POST['grade']));
	$resdate=$conn->real_escape_string(trim($_POST['resdate']));
     	
	$post = $_POST['postid'];
	
	$UpdateQual="UPDATE QualOther 
	SET Qual='$level',Subject='$subject', Grade='$grade', Date='$resdate', country ='$country' WHERE ID = '$post';";
	
	$updateresult = $conn -> query($UpdateQual);
						   
		if(!$updateresult){
			echo $conn->error;
		}else{
			echo "<p>update successful</p>";
			header('location: qualification.php?update1=success');
		}
		   
}
?>