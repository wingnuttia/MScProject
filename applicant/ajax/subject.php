<?php
//Include database configuration file
include('../conn.php');
 
if(isset($_POST["LID"]) && !empty($_POST["LID"])){

    $query = $conn->query("SELECT SubID, subject, active, LID FROM QualSubject WHERE LID = ".$_POST['LID']." AND active = 1");
    

    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option value="">Subject</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['SubID'].'">'.$row['subject'].'</option>';
        }
    }else{
        echo '<option value="">not available</option>';
    }
}
 

?>
    