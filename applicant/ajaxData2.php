<?php
//Include database configuration file
include('../conn.php');
 
if(isset($_POST["countryID"]) && !empty($_POST["countryID"])){

   
	$query = $conn->query("SELECT * FROM QualLevel WHERE countryID = ".$_POST['countryID']." OR countryID = 30" ); //AND active = 1");

    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option value="">Level</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['LID'].'">'.$row['Level'].'</option>';
        }
    }else{
        echo '<option value="">not available</option>';
    }
}
 

?>