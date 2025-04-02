<?php
            session_start();
            include("../conn.php");

                  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" href="../imgs/STARFavicon.png" type="image/png" sizes="16x16">
		
		<?php include '../include/cdns.php';?>	<!--bootstrap JS links etc--> 
		
		<!--Created CSS for STAR site-->
		<link rel="stylesheet"href="../style/style.css">

        <title>STAR Login</title>
    </head>

    <body>

		<header>
			<h1>Change Password</h1> 
		</header>
  </br></br>
			
		<div class="container">
            <div class ="row">
				<div class="col-sm-8"> 
			        <h1>Forgot Password</h1></br>
					<form class="form-horizontal" method="POST" action="../email/passlink.php" enctype='multipart/form-data'>
						<div class="row group">
							<div class="col-md-6">
								<div class="form-group">
									<label for="emil">Email: </label>
									<input type="email" class="form-control" id="emil" name="email" placeholder="Enter Email" required>
								</div>
							</div>
							
				</div>
						
						<div class="text-right col-md-12">	
							<button type="submit" class="btn btn-primary" name="submit_email">Submit</button>
						</div>
					</form>
					</br>
					
					
				</div></div>	
			</br></br></br>
		</div>
		
    <?php include '../include/footer.php';?>