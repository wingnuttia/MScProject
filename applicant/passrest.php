<?php

	require ('../include/appSession.php');
		
		$appID = $_SESSION['ApplicantID']; 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['apass'] == $_POST['pass2']) {
			include("../conn.php");
			 
			
	 
			$pass = md5($_POST['apass']);
		
			$update = "UPDATE ApplicantLogin SET pw='$pass' WHERE ApplicantID=$appID;";
			
			$updateresult = $conn -> query($update);
								   
				if(!$updateresult){
					echo $conn->error;
				}else{
					echo "<p>update successful</p>";
					header('location: ../applicant/passupdatesuccess.php');
				}
		}
	}	
	
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

        <title>STAR Pass Reset</title>
    </head>

    <body>
		<header>
			<div class="row">
				<div class="col-md-8">
					<h1>Reset Password</h1>
				</div>
			</div>
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
			
		
			
					</br></br>
					<form class="form-horizontal" method="post" action="passrest.php">
						
						<div class="row group">
							<div class="col-md-6">
								<div class="form-group">
									<label for="apass">Password: </label>
									<input type="password" class="form-control" id="apass" name="apass" placeholder="password" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="pass2">Confirm Password: </label>
									<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" required>
								</div>
							</div>
						</div>
						<div class="row group">
							<div class="text-right col-md-12">	
								<div>
									<button type="submit" class="btn btn-danger" name="updatep">update</button>
								</div>				
							</div>
						</div>
					</form>
					</br></br>
				</div>
			
		
	</div> <!--closes sidebar dont remove-->
		</div> <!--Container end-->
		
<?php include '../include/footer.php';?>
