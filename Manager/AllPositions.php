<?php

require ('../include/staffSession.php');
	
	$userid = $_SESSION['UserID']; 
	
	$readposts="SELECT p.PostID, p.StaffID, p.RoleID, p.PostTitle, p.SchoolID, p.DepartmentID, p.HoursTypeID, p.EstStartDate, p.EstEndDate, p.Description, p.assigned,  p.live, r.RoleID, r.Role, r.active, s.SID, s.School, d.DID, d.Department, d.SID, ht.TypeID, ht.HoursType, su.UserID
		
    FROM StaffUser su
    
    INNER JOIN Positions p ON su.UserID =p.StaffID
	INNER JOIN Role r ON p.RoleID = r.RoleID
	INNER JOIN School s on p.SchoolID = s.SID
	LEFT JOIN Department d on p.DepartmentID = d.DID
	INNER JOIN HoursType ht on p.HoursTypeID = ht.TypeID 
	
	WHERE p.StaffID= '$userid' AND p.live= '1'
	
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
		
		<div class="container starcontain">
			
			<?php include '../include/usertype.php';?>
			
			<header>
				<div class="col-md-8">
					<h1>Positions</h1>
				</div>
			
			</header>
			</br>
			<?php //include '../include/navbar.php';?>
			
			<section>
				<?php include '../include/managersidebar.php';?>
			
			<div class="text-right">
				<a href="addposition.php" class='btn btn-danger'>Create New Position</a>	
			</div></br>	
				<?php
			
		
			
			while ($row= $resultpost->fetch_assoc()){
				$userID = $row['UserID'];
				$Role = $row['Role'];
				$ptitle = $row['PostTitle'];
				$hrs = $row['HoursType'];
				$sdate= $row['EstStartDate'];
				$edate=$row['EstEndDate'];
				$desc =$row['Description'];
				$postid = $row['PostID'];
				$school = $row['School'];
				$depart = $row['Department'];
				
			
			echo "
			<div>
					<table class='table table-hover table-bordered table-sm'>
						<thead>
								<tr>
									
									<th width='15%'>Role</th>
									<th width='15%'>Post Title</th>
									<th width='20%'>School</th>
									<th width='15%'>Department</th>
									<th width='10%'>Hours type</th>
									<th width='10%'>Start Date</th>
									<th width='10%'>End Date</th>
									<th width='5%'></th>
									
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>$Role</td>
									<td>$ptitle</td>
									<td>$school</td>
									<td>$depart</td>
									<td>$hrs</td>
									<td>$sdate</td>
									<td>$edate</td>
									<td><a href='editPost.php?editid=$postid' class='btn btn-danger'>Edit</a></td>							
								</tr>
							</tbody>
							
								<thead>
								<tr>
									
									<th colspan = '8'><a href='editPost.php?editid=$postid' class='btn btn-danger'>Assign STAR Member</a></th>
									
									
								</tr>
							</thead>
							
							
							<thead>
								<tr>
									
								</tr>
							</thead>
							
					</thead>
					
					</table>
					
					</div>";
				}
			
			?>
				
			</section>	
				</br></br></br>
			</div> <!--end side navbar-->
		
		</div><!--end container-->
	
	
	
	
	
	
	<?php include '../include/footer.php';?>

	