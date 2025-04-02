<?php $sql = "SELECT r.RoleID, r.Role, r.active, g.ID, g.Grade, g.RoleID, g.active
	
	from Role r
	JOIN RoleReqGrade g ON r.RoleID= g.RoleID
	
	where r.RoleID = '1';";
	
	$resultarray = mysqli_query($conn, $sql);
	$grades = array();
	if (mysqli_num_rows($resultarray)>0){
		while ($row = mysqli_fetch_assoc($resultarray)){
			$grades[] = $row;
		}
	}
	
	//print_r($grades);
	
	foreach ($grades as $g){
		echo $grade['Grade'];
	}
?>