<?php
	require ('../include/staffSession.php');
	
	//Set read = variable to sessionID
	
	
if(isset($_POST['editdetails'])){
	include("../conn.php");
         
		$userid = $_SESSION['UserID'];
		
		$tid = $conn->real_escape_string(trim($_POST['title']));
		$fname=$conn->real_escape_string(trim($_POST['fname']));
		$sname=$conn->real_escape_string(trim($_POST['sname']));
		$contact=$conn->real_escape_string(trim($_POST['contact']));
		$school=$conn->real_escape_string(trim($_POST['sch']));
		$depart=$conn->real_escape_string(trim($_POST['dep']));
		

                    								
		$update = "UPDATE StaffDetails 
		SET TitleID='$tid', Forename='$fname', Surname = '$sname',  ContactNo='$contact', SchoolID='$school', DepartmentID='$depart'
		WHERE UserID='$userid' ";
        
		$updateresult = $conn -> query($update);
                               
            if(!$updateresult){
                echo $conn->error;
            }else{
				echo "<p>update successful</p>";
                header('location: personal.php');
               }			   
							                                                
    }

?>