<?php
	$sqlgrade="SELECT AppID, qualID, gradematch FROM QualGradeMatch WHERE AppID = '$applicant' AND gradematch = '1' ";

	if ($result=mysqli_query($conn,$sqlgrade)){
	$rowcount=mysqli_num_rows($result);
	
	$gradecount = $rowcount;
	//echo $gradecount; echo "No of Grades";
	
	mysqli_free_result($result);
	}

	$sqllevel="SELECT AppID, qualID, lvlmatch FROM quallevelmatch WHERE AppID = '$applicant' AND lvlmatch = '1'  ";

	if ($result=mysqli_query($conn,$sqllevel)){
	$rowcount=mysqli_num_rows($result);
	
	$levelcount = $rowcount;
	//echo $levelcount; echo "No of level";
	
	mysqli_free_result($result);
	}

	$sqlsub="SELECT AppID, qualID, submatch FROM QualSubMatch WHERE AppID = '$applicant' AND lvlmatch = '1'  ";

	if ($result=mysqli_query($conn,$sqlsub)){
	$rowcount=mysqli_num_rows($result);
	
	$subcount = $rowcount;
	//echo $subcount; echo "No of sub";
	
	mysqli_free_result($result);
	}


?>