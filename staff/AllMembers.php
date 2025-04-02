<?php

require ('../include/staffSession.php');
	
	$userid = $_SESSION['UserID']; 
	
	$readposts="SELECT sm.NSPNo, sm.ApplicantID, sm.StatusID, s.StatusID, s.Status, al.ApplicantID, al.userName, al.email,ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Mobile, ad.hrsTypeID, ht.TypeID, ht.HoursType, t.TitleID, t.Title
		
    FROM STARMember sm
    
    INNER JOIN Status s ON sm.StatusID =s.StatusID
	INNER JOIN ApplicantLogin al ON sm.ApplicantID = al.ApplicantID
	INNER Join ApplicantDetails ad on al.ApplicantID = ad.ApplicantID
	INNER Join HoursType ht ON ad.hrsTypeID= ht.TypeID
	INNER JOIN Title t ON ad.TitleID = t.TitleID
	
	GROUP BY Status
	ORDER By Status
	
	;";
	/*GROUP BY StartDate 
	ORDER BY StartDate DESC*/
	$resultpost = $conn->query($readposts);
	
	if(!$resultpost){
		echo $conn->error;
	}
		
?>

<!--star/applicant-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		
		<title>STAR Positions</title>
	</head>
	
	<body>
				
			<header>
			<div class="row">
				<div class="col-md-8">
					<h1>STAR Members</h1>
				</div>
				<div class="col-md-4">
					<?php include '../include/usertype.php';?>
				</div>
				</header>
				
		
			</br>
			<?php //include '../include/navbar.php';?>
		<div class="container starcontain">	
			<section>
				<?php 
					if ($userType == "1") {
						include '../include/adminsidebar.php';		
					}else if($userType == "2") {
						include '../include/hrsidebar.php';
					}else {
						include '../include/managersidebar.php';
					}
				?>
			
			
			<div>
					<table class="table table-hover table-bordered table-sm">
						<thead>
								<tr>
									<th width="10%">Staff No</th>
									<th width="5%">Title</th>
									<th width="15%">Forename</th>
									<th width="15%">Surname</th>
									<th width="15%">email</th>
									<th width="15%">Contact</th>
									<th width="10%">Hours type</th>
									<th width="10%">Satus</th>
									<th width="5%"></th>
									
								</tr>
							</thead>
			
				<?php
			
		
			
			while ($row= $resultpost->fetch_assoc()){
				$appID = $row['ApplicantID'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$hrs = $row['HoursType'];
				$email= $row['email'];
				$nsp=$row['NSPNo'];
				$status=$row['Status'];
				$title=$row['Title'];
				$con=$row['Mobile'];
			
				echo "
							<tbody>
								<tr>
									<td>$nsp</td>
									<td>$title</td>
									<td>$fname</td>
									<td>$sname</td>
									<td>$email</td>
									<td>$con</td>
									<td>$hrs</td>
									<td>$status</td>
									<td><a href='viewapp.php?viewid=$appID' class='btn btn-danger'>View</a></td>
								</tr>
							</tbody>
										
					";
			}
			
			?>
			</table>
				
				
					</div>
				
			</section>	
				</br></br></br>
			</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	
	
	<?php include '../include/footer.php';?>

	