<?php
require ('../include/appSession.php');
		
?>

<html>
  <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Pass Reset</title>
    </head>

    <body>
		<header>
			
					<h1>Reset Password</h1>
				
		</header>
		
      <div class="container starcontain">
	  	<div class="row">
			
				<?php 
				if ($userType == "4") {
					include '../include/appsidebar.php';		
				}else{
				
				include '../include/memsidebar.php';
					}
				?>
			
			
			</br>
					<div>
						
						<p>Your password has been updated </p>
							</div>
												
													
				
					</br>
					
				</div>
			
				<div class="column right">
					
				</div>
				</div>
			</div>

			</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>