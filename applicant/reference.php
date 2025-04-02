<?php

	require ('../include/appSession.php');
	
	//Set read = variable to sessionID

	
    $read = "SELECT al.ApplicantID, al.userName, ref.ReferenceID, ref.Surname, ref.Forename, ref.Company, ref.Position, ref.RelID, ref.email, ref.id, response.id, response.response,
	rr.ID, rr.Relationship, rr.active
	
	FROM EmpReference ref
	
	INNER JOIN ApplicantLogin al ON  ref.AppID = al.ApplicantID
	INNER JOIN response ON ref.id = response.id
	INNER JOIN RefRelation rr ON ref.RelID = rr.ID
	
	WHERE al.ApplicantID = '$applicant';";
	
	$result = $conn->query($read);
	
	if(!$result){
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
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Reference</title>
    </head>
	
	<body>
		<header>
			<h1>References</h1> 
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
		
			</br>
		
			<div class="text-right">
				<a href="addref.php" class='btn btn-danger'>Add New</a>	
			</div></br>
		
		</br>
			<?php
				while($row = $result->fetch_assoc()){
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
										<td width='25%'>$company</td>
										<td width='5%'></td>
									</tr>
										<tr>
											<th width='20%'>Position</th>
											<td width='30%''>$position</td>
											<th width='20%'>Relationship</th>
											<td width='25%'>$rel</td>
											<td><a href='editref.php?editid=$refID' class='btn btn-danger'>Edit</a></td>
										</tr>
										<tr>
											<th width='20%'>Email</th>
											<td width='30%'>$email</td>
											<th width='20%'>Permission to Contact</th>
											<td width='25%'>$perm</td>
											<th width='5%'></th>
										</tr>
								</thead>
						</table>";
				}
					?>
			
			</br>
			<div class="text-right">
						<a href="application.php" class='btn btn-danger'title="Next">Apply <i class="fa fa-chevron-right"></i></a>	
					</div></br>
			</br>
		
		
	</div> <!--end side navbar-->
</div><!--end container-->
<?php include '../include/footer.php';?>