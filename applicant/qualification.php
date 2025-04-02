<?php
	require ('../include/appSession.php');
	//Set read = variable to sessionID
	//$applicant = $_SESSION['ApplicantID'];

	//read qualification data from database
	$readqual="SELECT al.ApplicantID, al.userName, qual.QualID, qual.AppID, qual.SubjectID, qual.QualLevelID, qual.GradeID,  qual.countyID, qual.Date, ql.LID, ql.Level, ql.EdID, ql.active, qs.SubID, qs.subject, qs.LID, qs.active, qg.GID, qg.Grade, qg.LID, Country.countryID, Country.Country, gm.AppID, gm.qualID, gm.gradematch, sm.AppID, sm.qualID, sm.submatch, qm.AppID, qm.qualID, qm.lvlmatch
	
	FROM Qualification qual
	
	INNER JOIN ApplicantLogin al ON  qual.AppID = al.ApplicantID
	INNER JOIN QualLevel ql ON qual.QualLevelID = ql.LID
	INNER JOIN Country ON qual.countyID = Country.countryID
	INNER JOIN QualSubject qs ON  qual.SubjectID = qs.subid
	INNER JOIN QualGrade qg ON qual.GradeID = qg.GID
	JOIN QualGradeMatch gm ON qual.QualID = gm.qualID
	JOIN QualSubMatch sm ON qual.QualID = sm.qualID
	JOIN quallevelmatch qm ON qual.QualID = qm.qualID
			
	WHERE al.ApplicantID = '$applicant'
	
	GROUP BY date
	ORDER BY date DESC;";
	
	$resultqual = $conn->query($readqual);

	if(!$resultqual){
		echo $conn->error;
	}
	
	$readOther="SELECT al.ApplicantID, al.userName, qo.ID, qo.AppID, qo.Qual, qo.Subject, qo.Grade, qo.date, qo.country, c.countryID, c.Country
	
	FROM QualOther qo
	
	INNER JOIN ApplicantLogin al ON  qo.AppID = al.ApplicantID
	INNER JOIN Country c ON qo.country = c.countryID

			
	WHERE al.ApplicantID = '$applicant'
	
	GROUP BY date
	ORDER BY date DESC;";
	
	$resultOther = $conn->query($readOther);

	if(!$resultOther){
		echo $conn->error;
	}
		
?>

<!--Need Session Variable for ApplicationID-->

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Qualification</title>
    </head>
	
	<body>
			<header>
				<h1>Qualification</h1> 
			</header>
			
			
		<div class="container starcontain">
			<?php //include '../include/navbar.php';?>
			
			<?php 
				if ($userType == "4") {
					include '../include/appsidebar.php';		
				}else{
					include '../include/memsidebar.php';
				}
			?>
				
			<div class="row">
				<div class="column content">
				<div class="column middle">
					<div class="text-right">
						<a href="addqual.php" class='btn btn-danger'title="Add"><i class="fa fa-plus"></i> New</a>	
					</div>
					</br>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th width="15%">Country</th>
								<th width="15%">Qualification</th>
								<th width="15%">Subject</th>
								<th width="10%">Grade</th>
								<th width="15%">Date</th>
								
								<th width="5%">Edit</th>
							</tr>
						</thead>
						<?php
					  		while($row = $resultqual->fetch_assoc()){
								$applicant = $row['ApplicantID'];
								$qualID = $row['QualID'];
								$subject = $row['subject'];
								$date = $row['Date'];
								$level = $row['Level'];
								$grade = $row['Grade'];
								$country = $row['Country'];
								$smatch = $row['submatch'];
								$gmatch = $row['gradematch'];
								$qmatch = $row['lvlmatch'];
							
						echo "
						<tbody>
							<tr>
								<td>$country</td>
								<td>$level</td>";
								if($smatch == 1){
									echo "<td style='background color: #5cb85c;'>$subject</td>";
								}else{
									echo "<td>$subject</td>";
								}
								if ($gmatch == 1){
									echo "<td style='background color: #5cb85c;'>$grade</td>";
								}else{
									echo "<td style='background color: #d9534f;'>$grade</td>";
								}
							echo"	
								<td>$date</td>
								<td><a href='editqual.php?editid=$qualID' class='btn btn-danger' title='Edit'><i class='fa fa-edit'></i></a></td>
							</tr>
						</tbody>";
						}
					?>
					</table>
					</br>
					<header>
							<h1>Other Qualifications</h1> 
						</header>
					</br>
					<div class="text-right">
						<a href="addqual.php" class='btn btn-danger'title="Add"><i class="fa fa-plus"></i> New</a>	
					</div>
					</br>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th width="15%">Country</th>
								<th width="15%">Qualification</th>
								<th width="15%">Subject</th>
								<th width="10%">Grade</th>
								<th width="15%">Date</th>
								
								<th width="5%">Edit</th>
							</tr>
						</thead>
						<?php
					  		while($row = $resultOther->fetch_assoc()){
								$oapplicant = $row['ApplicantID'];
								$oqualID = $row['ID'];
								$osubject = $row['Subject'];
								$odate = $row['date'];
								$olevel = $row['Qual'];
								$ograde = $row['Grade'];
								$ocountry = $row['Country'];
								
							
						echo "
						<tbody>
							<tr>
								<td>$ocountry</td>
								<td>$olevel</td>
								<td>$osubject</td>
								<td>$ograde</td>
								<td>$odate</td>
								<td><a href='editoqual.php?editid=$oqualID' class='btn btn-danger' title='Edit'><i class='fa fa-edit'></i></a></td>
							</tr>
					</tbody>";
						}
					?>
					</table>
						
						
					<div class="text-right">
						<a href="addexperi.php" class='btn btn-danger'title="Next">Experience <i class="fa fa-chevron-right"></i></a>	
					</div></br>
				</br>
				</div>
			
			<!--	<div class="column completed">
					<?php //include '../include/completed.php';?>
				</div>-->
			</div>
			</div>

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>