<?php
require ('../include/appSession.php');
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?> <!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">
		
		<title>STAR</title> <!--Change this each page--> 
	</head>
	
	<body>
		<body>
		
			<header>
				<h1>Application</h1> 
			</header>
			
			
		<div class="container starcontain">
			<?php //include '../include/navbar.php';?>
			<div class="row">
				<div class="column left">
					<?php 
						if ($userType == "4") {
							include '../include/appsidebar.php';		
						}else{
							include '../include/memsidebar.php';
						}
					?>
				</div>
			  
				<div class="column content">
				<div class="column middle">
					<div>
						
						<p>Your application has been successfully submitted </p>
							</div>
												
							<div><a href="welcome.php" class='btn btn-danger'title="home">Home</a>	</div>
						
				
					</br>
					
				</div>
			
				<div class="column right">
					
				</div>
				</div>
			</div>

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>