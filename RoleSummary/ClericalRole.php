<?php
	$readtitle = "SELECT Role.RoleID, Role.Role, jsp.purposeID, jsp.purpose, jsp.RoleID FROM Role
		
	INNER JOIN js_purpose jsp ON Role.RoleID = jsp.RoleID
	
	WHERE Role.RoleID = '1'";
				   
	$resulttitle = $conn->query($readtitle);

	if(!$resulttitle){
		echo $conn->error;    
	}
		
				
	$readsummary = "SELECT Role.RoleID, Role.Role, jsd.SummaryID, jsd.Summary, jsd.RoleID	
	
	FROM  Role

	INNER JOIN jsduties jsd ON Role.RoleID = jsd.RoleID						
	
	WHERE Role.RoleID = '1'";

				   
	$resultsummary = $conn->query($readsummary);

	if(!$resultsummary){
		echo $conn->error;    
	}
		
		$readcriteria = "SELECT Role.RoleID, Role.Role, jsc.CriteriaID, jsc.Criteria, jsc.RoleID
			
		FROM Role 
	
		INNER JOIN jsCriteria jsc ON Role.RoleID = jsc.RoleID
							
		
		WHERE Role.RoleID = '1'";
 
					   
		$resultcriteria = $conn->query($readcriteria);
 
		if(!$resultcriteria){
			echo $conn->error;    
		}
		
		?>
		
		<?php
			while($row = $resulttitle->fetch_assoc()){
				$crole =  $row['Role']; 
				$cpurose= $row['purpose'];
			}?>

<div>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th width="10%">Title</th>
							<td width="90%"><?php echo "$crole";?></td>
							
						</tr>
						<tr>
							<th width="10%">Purpose: </th>
							<td width="90%"><?php echo "$cpurose";?></td>
						</tr>
						<tr>
							<th colspan="2">Duties</th>
						</tr>
					
						<?php
						
					while($row = $resultsummary->fetch_assoc()){
				
						
					$csum = $row['Summary'];	 
						echo "
						<tbody>
							<tr>
								<td width='5%'>-</td>
								<td width='95%'>$csum</td>
							</tr>
						</tbody>";
			}?>
						<thead>
							<tr>
								<th colspan="2">Criteria:</th>
							</tr>
						</thead>
						<?php 
						
						while($row = $resultcriteria->fetch_assoc()){
				$ccrit = $row['Criteria'];
						echo "
						<tbody>
							<tr>
								<td width='5%'>-</td>	
								<td width='95%'>$ccrit</td>
							</tr>
						</tbody>";
						}
						?>
					</table>
				</div>