<?php
	session_start();

	include("../conn.php");
	if (!isset($_SESSION['ApplicantID'])) {//invalid session
		header('location: index.php');
		/*     * echo '<p> invalid session<p>';* */
	} else {
		echo $_SESSION['ApplicantID'];
		echo $_SESSION['userName'];
		echo $_SESSION['userTypeID'];
		}

		//Set read = variable to sessionID
		$applicant = $_SESSION['ApplicantID'];

		//read qualification data from database
		$readqual="SELECT al.ApplicantID, qual.QualID, qual.AppID, qual.SubjectID, qual.QualLevelID, qual.GradeID,  qual.countyID, qual.Date, qual.OtherGrade, qual.OtherLevel, qual.OtherSubject,
		ql.LID, ql.Level, ql.EdID, ql.active,
		qs.SubID, qs.subject, qs.LID, qs.active,
		qg.GID, qg.Grade, qg.LID,	
		Country.countryID, Country.Country
		
		FROM Qualification qual
		
		INNER JOIN ApplicantLogin al ON  qual.AppID = al.ApplicantID
		INNER JOIN QualLevel ql ON qual.QualLevelID = ql.LID
		INNER JOIN QualSubject qs ON  qual.SubjectID = qs.subid
		INNER JOIN QualGrade qg ON qual.GradeID = qg.GID
		INNER JOIN Country ON qual.countyID = Country.countryID
				
		WHERE qual.AppID = '$applicant'
		
		GROUP BY date
		ORDER BY date DESC;";
		
		$resultqual = $conn->query($readqual);
	
		if(!$resultqual){
			echo $conn->error;
		}else{
		echo "read success $applicant";
		}

		$readMinQual="SELECT Role.RoleID, Role.Role, Role.active, rmq.ID, rmq.QualID, rmq.RoleID, rmq.active, ql.LID, ql.Level

		FROM Role 

		INNER JOIN Role_MinQual rmq ON Role.RoleID = rmq.RoleID
		INNER JOIN QualLevel ql ON rmq.QualID = ql.LID;";

		$resultMinQual = $conn->query($readMinQual);

		if(!resultMinQual){
			echo $conn->error;
		}

		$readMinGrade="SELECT Role.RoleID, Role.Role, Role.active, rmg.ID, rmg.Grade, rmg.RoleID, rmg.active, qg.GID, qg.Grade

		FROM Role 

		INNER JOIN Role_MinGrade rmg ON Role.RoleID = rmg.RoleID
		INNER JOIN QualGrade qg ON rmg.Grade = qg.GID;";

		$resultMinGrade = $conn->query($readMinGrade);

		if(!resultMinGrade){
			echo $conn->error;
		}

		$readreqSubject="SELECT Role.RoleID, Role.Role, Role.active, rrs.ID, rrs.SubjectID, rrs.RoleID, rrs.active, qs.SubID, qs.subject

		FROM Role 

		INNER JOIN Role_RequireSubject rrs ON Role.RoleID = rrs.RoleID
		INNER JOIN QualSubject qs ON rrs.SubjectID = qs.SubID;";

		$resultreqSubject = $conn->query($readreqSubject);

		if(!resultreqSubject){
			echo $conn->error;
		}

?>
		


<!--Need Session Variable for ApplicationID-->

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		
		<title>STAR Qualification</title> <!--Change this each page--> 
	</head>
	
	<body>
		
		
		<div class="container starcontain">
		
			<?php include '../include/appsidebar.php';?>

		<?php
			while($row = $resultMinQual->fetch_assoc()){
				
			}
		?>
		<?php
			while($row = $resultMinGrade->fetch_assoc()){
				
			}
		?>
		<?php
			while($row = $resultreqSubject->fetch_assoc()){
				
			}
		?>
			
				</br>
				<h3>Qualification</h3>
				</br>
				
				<div class="text-right">
					<a href="addqual.php" class='btn btn-danger'>Add New</a>	
				</div></br>
			
				
				
				<div>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th width="25%">Qualification</th>
								<th width="25%">Subject</th>
								<th width="7%">Grade</th>
								<th width="13%">Date</th>
								<th width="15%">Country</th>
								<th width="5%"></th>
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
							
						echo "
						<tbody>
							<tr>
								<td>$level</td>
								<td>$subject</td>
								<td>$grade</td>
								<td>$date</td>
								<td>$country</td>
								<td><a href='#'>Edit</a></td>
							</tr>
						</tbody>";
						}
?>
					</table>
</br></br>
				</div>
		
		<!--'editqual.php?editid=$qualid'-->
		

	<p>You meet the minimun qualification requirements for ROLE ID View Job Description</p>

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>