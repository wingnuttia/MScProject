<!--DAshboard and cards to provide information for members
Number of positions available per role, popular skills required, member availablity-->

<?php

	//read STAR Member Skills
	$read="SELECT AL.ApplicantID, AL.userName, AL.email,  sm.SkillID, sm.AppID, sm.skillID, s.SkillID, s.Skill, s.SkillCatID, s.active, sc.SkillCatID, sc.Category, sc.active
	
	FROM SkillSetMem sm
	
	INNER JOIN ApplicantLogin AL ON sm.AppID = AL.ApplicantID
	INNER JOIN Skill s ON sm.SkillID = s.SkillID
	INNER JOIN SkillCategory sc ON s.SkillCatID = sc.SkillCatID
	
	WHERE AL.ApplicantID = '$applicant';";

	$result = $conn->query($read);
 
        if(!$result){
         echo $conn->error;    
        }

	

?>


	<div class="row"><!--Row 1-->
		<div class="col-md-4">
			<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
				<div class="row no-gutters">
					<div class="card-body">
						<div class="row">
							<h5 class="card-title">
							<?php 
								$noPos = "SELECT COUNT(*) FROM Positions WHERE assigned = '0'";
								$resnoPos = mysqli_query($conn, $noPos);
								$count = mysqli_fetch_assoc($resnoPos)['COUNT(*)'];
								echo $count;
							?>  Position(s) Available</h5>
						</div>
					</div>
					
				</div>
			</div>
		</div><!-- End No of Positions-->
	</div><!--End Row Class-->