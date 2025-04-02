<?php
	if(isset($_POST['delete'])){
	include("../conn.php");
				  
        $post = $_POST['postid'];
 
		$delete = "DELETE FROM SkillSetMem WHERE SkillID='$post' ";

		$deleteresult = $conn -> query($delete);
                               
            if(!$deleteresult){
                    echo $conn->error;
                                       
                }else{
                     
                header('location: skill.php');
                }
	}
?>