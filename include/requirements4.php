<?php
	$reqexpsect = "SELECT r.RoleID, r.Role, r.active, e.ID, e.roleID, e.sectorID, js.JobSectorID, js.JobSector, js.active
	from Role r
	JOIN RoleRequiredExp e ON r.roleID = e.roleID
	Inner Join ApplicationExpJobSector js ON e.sectorID = js.JobSectorID
	where r.RoleID = '4';";	
	
	$sect = $conn->query($reqexpsect);
	
	if(!$sect){
		echo $conn->error;
	}

	$reqexplength = "SELECT r.RoleID, r.Role, r.active, l.ID, l.length, l.period, l.RoleID, p.id, p.period
	from Role r
	JOIN RoleExpLength l ON r.RoleID= l.RoleID
	Inner Join period p on l.period = p.id
	where r.RoleID = '4';";	
	
	$len = $conn->query($reqexplength);
	
	if(!$len){
		echo $conn->error;
	}
	
	$noq="SELECT r.RoleID, r.Role, r.active, qm.ID, qm.TotalQual, qm.RoleID, qm.qtype, ql.LID, ql.Level, ql.active
	
	from Role r
	
	JOIN RoleQualMin qm ON r.RoleID= qm.RoleID
	INNER JOIN QualLevel ql ON qm.qtype = ql.LID
	
	where r.RoleID = '4';";	
	
	$noqual = $conn->query($noq);
	
	if(!$noqual){
		echo $conn->error;
	}
	
	$reqqual = "SELECT r.RoleID, r.Role, r.active, q.ID, q.QualID, q.RoleID, q.active
	from Role r
	JOIN RoleReqQual q ON r.RoleID= q.RoleID
	
	where r.RoleID = '4';";	
	
	$qual = $conn->query($reqqual);
	
	if(!$qual){
		echo $conn->error;
	}
	
	$reqgrade ="SELECT r.RoleID, r.Role, r.active, g.ID, g.Grade, g.RoleID, g.active, qg.GID, qg.Grade, qg.active
	
	from Role r
	JOIN RoleReqGrade g ON r.RoleID= g.RoleID
	INNER JOIN QualGrade qg ON g.Grade = qg.GID
	
	where r.RoleID = '4';";
	
	$grade = $conn->query($reqgrade);
	
	if(!$grade){
		echo $conn->error;
	}
	
	$reqsub  ="SELECT r.RoleID, r.Role, r.active, s.ID, s.SubjectID, s.RoleID, s.active, qs.subject, qs.active
	
	from Role r
	JOIN RoleReqSubject s ON r.RoleID= s.RoleID
	Inner JOIN QualSubject qs ON s.SubjectID = qs.SubID
	
	where r.RoleID = '4';";
	
	$sub = $conn->query($reqsub);
	
	if(!$sub){
		echo $conn->error;
	}
?>

<div class="container">


<h1>The following is required to be considered for Short Term IT Technician Appointments: </br>
</h1>

   <div class="card card-body">
   <div class="container">

 
   	<div class="row">
		
		<div class="col-md-4">
			<div class="row">
				<h3>Qualifications</h3>
			</div>
			<div class="row">
			<div class="col-md-11">
				<?php while($row = $noqual->fetch_assoc()){
					$nos = $row['TotalQual'];
					$qul = $row['Level'];
					echo"<p>At least $nos $qul in at the following grade(s): </p>";
				}?>
			</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<table class='table table-hover table-bordered table-sm'>
						<thead>
							<tr>
								<th width='100%'>Grade</th>
							</tr>
						</thead>
						<?php while($row = $grade->fetch_assoc()){
							$g = $row['Grade'];
							echo"<tbody>
									<tr>
										<td>$g</td>
									</tr>
								</tbody>";
						}?>			
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<h3>Subject</h3>
			</div>
			<div class="row">
				<div class="col-md-11">
					<p>Must have the following subject(s): </p>
					</br>
				</div>
			</div>
			<div class="col-md-10">
				<table class='table table-hover table-bordered table-sm'>
					<thead>
						<tr>
							<th width='100%'>Subject</th>
						</tr>
					</thead>
					<?php while($row = $sub->fetch_assoc()){
						$s = $row['subject'];
						echo"<tbody>
								<tr>
									<td>$s</td>
								</tr>
							</tbody>";
					} ?>
				</table>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="row">
				<h3>Experience</h3>
			</div>
		
			<div class="row">
				<div class="col-md-11">
				<?php while($row = $len->fetch_assoc()){
								$length = $row['length'];
								$period = $row['period'];
				
				
				echo"<p>At least $length $period in any of the following sectors: </p>";
				}
				?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<table class='table table-hover table-bordered table-sm'>
						<thead>
							<tr>
								<th width='100%'>Job Sector</th>
							</tr>
						</thead>
						<?php 
						while($row = $sect->fetch_assoc()){
							$sector = $row['JobSector'];
							
							echo"<tbody>
									<tr>
										<td>$sector</td>
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
	
	</div>
</div>
