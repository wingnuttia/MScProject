<?php

	
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
	
		
?>


<div class="accordion" id="expaccordion">
  <div class="card">
    <div class="card-header" id="Experi">
      <h2 class="mb-0">
       
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exp" aria-expanded="false" aria-controls="exp">
          Experience
        </button>
      </h2>
    </div>
    <div id="exp" class="collapse" aria-labelledby="experience" data-parent="#expaccordion">
      <div class="card-body">
        <?php			
		$years = '';
		
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
  
</div>
 