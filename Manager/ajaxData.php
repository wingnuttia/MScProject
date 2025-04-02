<?php
//Include database configuration file
include('../conn.php');
 
if(isset($_POST["SID"]) && !empty($_POST["SID"])){

    $query = $conn->query("SELECT * FROM Department WHERE SID = ".$_POST['SID']." OR SID= 24");//
    

    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option value="">Department</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['DID'].'">'.$row['Department'].'</option>';
        }
    }else{
        echo '<option value="12"></option>';
    }
}
 

?>
    