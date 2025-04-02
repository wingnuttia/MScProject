<?php
	
	// read Qualifications

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
	
	$noq="SELECT r.RoleID, r.Role, r.active, qm.ID, qm.TotalQual, qm.RoleID, qm.qtype, ql.LID, ql.Level, ql.active
	
	from Role r
	
	JOIN RoleQualMin qm ON r.RoleID= qm.RoleID
	INNER JOIN QualLevel ql ON qm.qtype = ql.LID
	
	where r.RoleID = '1';";
	
	$noqual = $conn->query($noq);
	
	if(!$noqual){
		echo $conn->error;
	}
	
	$reqqual = "SELECT r.RoleID, r.Role, r.active, q.ID, q.QualID, q.RoleID, q.active
	from Role r
	JOIN RoleReqQual q ON r.RoleID= q.RoleID
	
	where r.RoleID = '1';";	
	
	$qual = $conn->query($reqqual);
	
	if(!$qual){
		echo $conn->error;
	}
	
	$reqgrade ="SELECT r.RoleID, r.Role, r.active, g.ID, g.Grade, g.RoleID, g.active, qg.GID, qg.Grade, qg.active
	
	from Role r
	JOIN RoleReqGrade g ON r.RoleID= g.RoleID
	INNER JOIN QualGrade qg ON g.Grade = qg.GID
	
	where r.RoleID = '1';";
	
	$grade = $conn->query($reqgrade);
	
	if(!$grade){
		echo $conn->error;
	}
	
	$reqsub  ="SELECT r.RoleID, r.Role, r.active, s.ID, s.SubjectID, s.RoleID, s.active, qs.subject, qs.active
	
	from Role r
	JOIN RoleReqSubject s ON r.RoleID= s.RoleID
	Inner JOIN QualSubject qs ON s.SubjectID = qs.SubID
	
	where r.RoleID = '1';";
	
	$sub = $conn->query($reqsub);
	
	if(!$sub){
		echo $conn->error;
	}
	
	/*$garray = array();
	
	$sql = "ELECT r.RoleID, r.Role, r.active, g.ID, g.Grade, g.RoleID, g.active, qg.GID, qg.Grade, qg.active
	
	from RoleReqGrade g
	
	JOIN Role r ON g.RoleID= r.RoleID
	INNER JOIN QualGrade qg ON g.Grade = qg.GID
	
	where r.RoleID = '1';";
	
	$mingrade = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($mingrade) > 0){
		while ($row =mysqli_fetch_assoc($mingrade)){
			$garray[]=$row;
		}
	}
	
	//print_r($garray);
	
	foreach($garray as $g){
		print_r ($g['Grade']);
	}*/

			
?>


<div class="accordion" id="qulaccordion">
  <div class="card">
    <div class="card-header" id="Qual">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsequal" aria-expanded="false" aria-controls="collapsequal">
          Qualifications
        </button>
      </h2>
    </div>

    <div id="collapsequal" class="collapse show" aria-labelledby="Qual" data-parent="#qulaccordion">
      <div class="card-body">
			<div class="panel-body"><table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="30%">Qualification</th>
						<th width="30%">Subject</th>
						<th width="10%">Grade</th>
					
						
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
												
								</tr>
							</tbody>";
						}
					?>
			</table>
		</div>
      </div>
    </div>
  </div>
 </div>
  
 