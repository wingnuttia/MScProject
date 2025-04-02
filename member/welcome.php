<?php

require ('../include/appSession.php');
	
	//Read applicant data from database
	$read="SELECT AL.ApplicantID, AL.userName, AL.email, AD.ApplicantID,
	AD.Forename, AD.Surname, AD.Preferred 
	
	FROM ApplicantDetails AD
	
	INNER JOIN ApplicantLogin AL ON AD.ApplicantID = AL.ApplicantID
	WHERE AL.ApplicantID = '$applicant';";

	$result = $conn->query($read);
 
        if(!$result){
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

        <title>STAR Home</title>
    </head>
	
	<body>
	<?php
			while($row = $result->fetch_assoc()){
				$fname = $row['Forename'];
				$pname = $row['Preferred'];
			}
		?>
		<header>
			<h1>Welcome <?php echo "$fname";?></h1> 
		</header>
		<div class="container starcontain">
		
			<?php //include '../include/navbar.php';?>
			
			
			<?php 
			if ($userType == "4") {
				include '../include/appsidebar.php';		
                    }
			if ($userType == "5") {
				include '../include/memsidebar.php';
			}
                 else {
                    header('Location: index.php');
                }
			?>
			
			</br>
			
			<?php include '../include/memDashboard.php';?>
			
			</br>
		<div class="row">
					<div class="col-md-4">
						<div class="card md-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<img src="../imgs/personal.png" class="card-img" alt="...">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">Personal Details</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/personal.php" class="btn btn-danger" title="View"><i class="fa fa-bars"></i></a>
												<a href="../applicant/personaledit.php" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--End Personal Details-->
					<div class="col-md-4">
						<div class="card md-3" style="max-width:540px;">
							<div class="row no-gutters">
								<div class="col-md-4 col-xs-6" >
									<img src="../imgs/qual.png" class="card-img" alt="...">
								</div>
								<div class="col-md-8 col-xs-6">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">Qualification</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/qualification.php" class="btn btn-danger" title="View">
												<i class="fa fa-bars"></i></a>
												<a href="../applicant/qualification.php" class="btn btn-danger" title="Add"><i class="fa fa-plus"></i></a>
												<!--<a href="qualification.php" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i></a>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> <!--End Qualification card-->
					<div class="col-md-4">
						<div class="card md-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4 col-xs-6">
									<img src="../imgs/Exp.png" class="card-img" alt="Experience">
								</div>
								<div class="col-md-8 col-xs-6">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">Experience</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/experience.php" class="btn btn-danger" title="View"><i class="fa fa-bars"></i></a>
												<a href="../applicant/addexperi.php" class="btn btn-danger" title="Add"><i class="fa fa-plus"></i></a>
												<!--<a href="editexperi.php" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i></a>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!--End row 1-->
				</br>
				<div class="row"> <!--Start Row 2-->
					<div class="col-md-4">
						<div class="card md-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4 col-xs-6">
									<img src="../imgs/skill.png" class="card-img" alt="Experience">
								</div>
								<div class="col-md-8 col-xs-6">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">Skill</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/skill.php" class="btn btn-danger" title="View"><i class="fa fa-bars"></i></a>
												<a href="#" class="btn btn-danger" title="Add"><i class="fa fa-plus"></i></a>
												<!--<a href="#" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i></a>-->
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--end experience card-->
					<div class="col-md-4">
						<div class="card md-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4 col-xs-6">
									<img src="../imgs/Ref.png" class="card-img" alt="...">
								</div>
								<div class="col-md-8 col-xs-6">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">References</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/reference.php" class="btn btn-danger"title="View"><i class="fa fa-bars"></i></a>
												<a href="../applicant/refnew.php" class="btn btn-danger" title="Add"><i class="fa fa-plus"></i></a>
												<!--<a href="refedit.php" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i></a>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--End Reference card-->
					<div class="col-md-4">
						<div class="card mb-3" style="max-width:540px;">
							<div class="row no-gutters">
								<div class="col-md-4 col-xs-6" >
									<img src="../imgs/Apply.png" class="card-img img-responsive width='40%' height='40%'" alt="...">
								</div>
								<div class="col-md-8 col-xs-6">
									<div class="card-body">
										<div class="row">
											<h5 class="card-title">Apply</h5>
										</div>
										<div class="row">
											<div class="text-right">
												<a href="../applicant/application.php" class="btn btn-danger" title="Apply"><i class="fa fa-edit"></i></a></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!--end apply card-->
					</div>
				</div> <!--end row 2-->
			
			</br></br></br>
			
			
		</div> <!--end side navbar-->
	
	</div>

	<?php include '../include/footer.php';?>

	