<?php

require ('../include/staffSession.php');
	
	$userid = $_SESSION['UserID']; 
	
	$applicant = $_GET['viewid'];
	
	$readapps="SELECT sm.NSPNo, sm.ApplicantID, sm.StatusID, s.StatusID, s.Status, al.ApplicantID, al.userName, al.email,ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Mobile, ad.hrsTypeID, ht.TypeID, ht.HoursType, t.TitleID, t.Title
		
    FROM STARMember sm
    
    INNER JOIN Status s ON sm.StatusID =s.StatusID
	INNER JOIN ApplicantLogin al ON sm.ApplicantID = al.ApplicantID
	INNER Join ApplicantDetails ad on al.ApplicantID = ad.ApplicantID
	INNER Join HoursType ht ON ad.hrsTypeID= ht.TypeID
	INNER JOIN Title t ON ad.TitleID = t.TitleID
	
	WHERE al.ApplicantID = '$applicant';
	
	;";
	/*GROUP BY StartDate 
	ORDER BY StartDate DESC*/
	$resultapps = $conn->query($readapps);
	
	if(!$resultapps){
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
		
		<title>STAR</title>
	</head>
	
	<body>
				
			<header>
			<div class="row">
				<div class="col-md-8">
					<h1>STAR Member - Application Details</h1>
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
			
			
			
		
  <div class="card">
    <div class="card-header" id="Qual">
      <h2 class="mb-0">
            Application Details
        
      </h2>
    </div>
<div>
				<?php include '../include/persdetails.php';?>
			</div>
			
			<?php
			
			while ($row= $resultapps->fetch_assoc()){
				$appID = $row['ApplicantID'];
				$nsp=$row['NSPNo'];
				$status=$row['Status'];
				$title=$row['Title'];
				$hrs = $row['HoursType'];
			}
				?>
    
      <div class="card-body">
			<div class="panel-body">
					<table class="table table-hover table-bordered table-sm">
						<thead>
								<tr>
									<th width="20%">Staff No (NSP Number)</th>
									<th width="20%">Post Hours Preference</th>
									<th width="20%">Satus</th>
								</tr>
							</thead>
			
							<tbody>
								<tr>
								 
								
									<td><?php echo $nsp; ?></td>
									<td><?php echo $hrs;?></td>
									<td><?php echo $status;?></td>
									
								</tr>
							</tbody>
										
				
			</table>
				
				
					</div>
					</br>
					<div>
					<?php include '../include/qualdetails.php';?>
				</div>
				
				<div>
				<?php include '../include/expdetails.php';?>
				</div>
				</br>
				<div>
				<?php //include '../include/refdetails.php';?>
				</div>
			</section>	
				</br></br></br>
			</div>
		
		</div>
	
	</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	<?php include '../include/footer.php';?>

	