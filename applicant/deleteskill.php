<?php

	if(isset($_POST['Sdelete'])){

				  
        $post = $_POST['postid'];
 
		$delete2 = "DELETE FROM SkillSetMem WHERE ID='$post' ";

		$deleteresult = $conn -> query($delete2);
                               
            if(!$deleteresult){
                    echo $conn->error;
                                       
                }else{
                     
                header('location: skill.php');
                }
	}

?>