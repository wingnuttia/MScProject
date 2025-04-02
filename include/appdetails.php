<?php

	//read personal information

	$readPI="SELECT al.ApplicantID, al.userName, al.email, 
	ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Preferred, ad.dob, ad.Mobile, ad.SexID, ad.SexID, ad.NationID, ad.Street, ad.City, ad.pcode, ad.hrsTypeID, Title.TitleID, Title.Title, Sex.Sex, Sex.SexID, nat.NationalityID, nat.Nationality,  ht.TypeID, ht.HoursType 
	
	FROM ApplicantDetails ad
	
	INNER JOIN ApplicantLogin al ON ad.ApplicantID = al.ApplicantID
	INNER JOIN Title ON ad.TitleID = Title.TitleID
	INNER JOIN Nationality nat ON ad.NationID = nat.NationalityID
	INNER JOIN Sex on ad.SexID = Sex.SexID
	INNER JOIN HoursType ht ON ad.hrsTypeID = ht.TypeID
	
	WHERE al.ApplicantID = '$applicant';";

	$resultPI = $conn->query($readPI);
 
	if(!$resultPI){
	 echo $conn->error;    
	}

	while($row = $resultPI->fetch_assoc()){
	   
		$applicant =  $row['ApplicantID']; 
		$uname = $row['userName'];
		$email= $row['email'];
		$title = $row['Title'];
		$fname = $row['Forename'];
		$sname = $row['Surname'];
		$pname = $row['Preferred'];
		$dob = $row['dob'];
		$contact = $row['Mobile'];
		$sex = $row['Sex'];
		$nation = $row['Nationality'];
		$street = $row['Street'];
		$city = $row['City'];
		$pcode = $row['pcode'];
		$hrtype = $row['HoursType'];
	}
				
	// read Qualifications

	$readqual="SELECT al.ApplicantID, al.userName, qual.QualID, qual.AppID, qual.SubjectID, qual.QualLevelID, qual.GradeID,  qual.countyID, qual.Date, ql.LID, ql.Level, ql.EdID, ql.active, qs.SubID, qs.subject, qs.LID, qs.active, qg.GID, qg.Grade, qg.LID, Country.countryID, Country.Country
	
	FROM Qualification qual
	
	INNER JOIN ApplicantLogin al ON  qual.AppID = al.ApplicantID
	INNER JOIN QualLevel ql ON qual.QualLevelID = ql.LID
	INNER JOIN Country ON qual.countyID = Country.countryID
	INNER JOIN QualSubject qs ON  qual.SubjectID = qs.subid
	INNER JOIN QualGrade qg ON qual.GradeID = qg.GID
			
	WHERE al.ApplicantID = '$applicant'
	
	GROUP BY date
	ORDER BY date DESC;";
	
	$resultqual = $conn->query($readqual);

	if(!$resultqual){
		echo $conn->error;
	}
	//Read Experience
	$readexp="SELECT al.ApplicantID, al.userName,ae.EmploymentID, ae.AppID, ae.EmployerName, ae.JobTitle, ae.JobSectorID, ae.current, ae.StartDate, ae.EndDate, DATEDIFF(ae.EndDate,ae.StartDate) AS difference, ae.Duties, ajs.JobSectorID, ajs.JobSector
		
	FROM ApplicationExperience ae
	
	INNER JOIN  ApplicantLogin al ON ae.AppID = al.ApplicantID
	INNER JOIN ApplicationExpJobSector ajs ON  ae.JobSectorID = ajs.JobSectorID
	
	WHERE al.applicantID= '$applicant'
	
	GROUP BY StartDate 
	ORDER BY StartDate DESC;";
	
	$resultexp = $conn->query($readexp);
	
	if(!$resultexp){
		echo $conn->error;
	}
	
	
	//Read References
	$readref = "SELECT al.ApplicantID, al.userName, ref.ReferenceID, ref.Surname, ref.Forename, ref.Company, ref.Position, ref.RelID, ref.email, ref.id, response.id, response.response,
	rr.ID, rr.Relationship, rr.active
	
	FROM EmpReference ref
	
	INNER JOIN ApplicantLogin al ON  ref.AppID = al.ApplicantID
	INNER JOIN response ON ref.id = response.id
	INNER JOIN RefRelation rr ON ref.RelID = rr.ID
	
	WHERE al.ApplicantID = '$applicant';";
	
	$resultref = $conn->query($readref);
	
	if(!$resultref){
		echo $conn->error;
	}
			
?>


<div class="accordion" id="applicationaccordion">
  <div class="card">
    <div class="card-header" id="Qual">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsequal" aria-expanded="false" aria-controls="collapsequal">
          Qualifications
        </button>
      </h2>
    </div>

    <div id="collapsequal" class="collapse show" aria-labelledby="Qual" data-parent="#applicationaccordion">
      <div class="card-body">
			<div class="panel-body"><table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="30%">Qualification</th>
						<th width="30%">Subject</th>
						<th width="10%">Grade</th>
						<th width="15%">Date</th>
						<th width="15%">Country</th>
						
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
						
					</tr>
				</tbody>";
				}
?>
			</table>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="experience">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exp" aria-expanded="false" aria-controls="exp">
          Experience
        </button>
      </h2>
    </div>
    <div id="exp" class="collapse" aria-labelledby="experience" data-parent="#applicationaccordion">
      <div class="card-body">
        <?php			
			while ($row= $resultexp->fetch_assoc()){
				$applicant = $row['ApplicantID'];
				$empName = $row['EmployerName'];
				$jtitle = $row['JobTitle'];
				$jsect = $row['JobSector'];
				$sdate= $row['StartDate'];
				$edate=$row['EndDate'];
				$duties =$row['Duties'];
				$empid = $row['EmploymentID'];
				$difference=$row['difference'];
				$y = $difference/365.25;
	
				echo "
				<div>
					<table class='table table-hover table-bordered table-sm'>
						<thead>
								<tr>
									<th width='5%'></th>
									<th width='20%'>Employer Name</th>
									<th width='20%'>Sector</th>
									<th width='20%'>Job Title</th>
									<th width='10%'>Start Date</th>
									<th width='10%'>End Date</th>
									<th width='10%'>Post Length</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td></td>
									<td>$empName</td>
									<td>$jsect</td>
									<td>$jtitle</td>
									<td>$sdate</td>
									<td>$edate</td>
									<td>$y Year(s)</td>
								</tr>
							</tbody>
							<thead>
								<tr>
									<th colspan = '1'>Duties</th>
									<td colspan = '6'>$duties</td>
									
								</tr>
							</thead>
						</thead>
					</table>
				</div>";
			}
			
			?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="reference">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ref" aria-expanded="false" aria-controls="ref">
          References
        </button>
      </h2>
    </div>
    <div id="ref" class="collapse" aria-labelledby="reference" data-parent="#applicationaccordion">
      <div class="card-body">
        <?php
			while($row = $resultref->fetch_assoc()){
				$applicant = $row['ApplicantID'];
				$refID = $row['ReferenceID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$company = $row['Company'];
				$position = $row['Position'];
				$rel = $row['Relationship'];
				$email = $row['email'];
				$perm = $row['response'];
				echo "
					<table class='table table-hover table-bordered table-sm'>
						<thead>
								<tr>
									<th width='20%'>Reference Name:</th>
									<td width='30%'>$fname $sname</td>
									<th width='20%'>Company</th>
									<td width='30%'>$company</td>
									
								</tr>
									<tr>
										<th width='20%'>Position</th>
										<td width='30%''>$position</td>
										<th width='20%'>Relationship</th>
										<td width='30%'>$rel</td>
										
									</tr>
									<tr>
										<th width='20%'>Email</th>
										<td width='30%'>$email</td>
										<th width='20%'>Permission to Contact</th>
										<td width='30%'>$perm</td>
										
									</tr>
							</thead>
					</table>";
			}
		?>
      </div>
    </div>
  </div>
</div>
 