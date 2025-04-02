<?php
            session_start();
            include("../conn.php");

            if (isset($_POST['login'])) {

                $uname = $conn->real_escape_string(trim($_POST['userName']));
                $apass = $conn->real_escape_string(trim($_POST['pw']));
				$userid = $conn->real_escape_string(trim($_POST['ApplicantID']));
				$date = date('y-m-d h:i:s');

                $uname = $_POST['uname'];
                $apass = $_POST['apass'];

                $checkuser = "SELECT * FROM ApplicantLogin WHERE userName = '$uname' ";
                //$checkuser = "SELECT * FROM ApplicantLogin WHERE userName = '$uname' AND pw='$apass'";
                $result = $conn->query($checkuser);

                if (!$result) {
                    echo $conn->error;
                }

                $num = $result->num_rows;
				
				if ($num > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $username = $row['userName'];
                        $userType = $row['userTypeID'];
                        $userid = $row['ApplicantID'];
						 
                        $_SESSION['ApplicantID'] = $userid;
                        $_SESSION['userName'] = $username;
						$_SESSION['userTypeID'] = $userType;
											
                    }//end of the while

					switch ($userType){
						case 4:
							$insertlogindate = "INSERT INTO AppLoginTime (UserID) VALUES ('$userid');";
							header('Location: welcome.php');
						break;
						case 5:
							$insertlogindate = "INSERT INTO AppLoginTime (UserID) VALUES ('$userid');";
							header('Location: ../member/welcome.php');
						break;
						default:
							header('Location: ../index.php?loginerror');
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

        <title>STAR Login</title>
    </head>

    <body>

			<header>
				<h1>Short Term Appointment Register</h1> 
			</header>
      </br></br>
			
		<div class="container">
            <div class ="row">
				<div class="col-sm-8"> 
			        <h1>Existing User</h1></br>
					<form class="form-horizontal" method="POST" action="index.php" enctype='multipart/form-data'>
						<div class="row group">
							<div class="col-md-6">
								<div class="form-group">
									<label for="uname">User Name: </label>
									<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter User Name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="apass">Password: </label>
									<input type="password" class="form-control" id="apass" name="apass" placeholder="password">
									
									<!--<input type="password" class="form-control" id="apass" name="apass" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>-->
								</div>
							</div>
						</div>
						<div class ="row">
						<div class="col-sm-6"></div>
						<div class="col-sm-6"> 
							<a href="forgotpass.php" >Forgot Password</a>
						</div>
				</div>
						
						<div class="text-right col-md-12">	
							<button type="submit" class="btn btn-primary" name="login">Login</button>
						</div>
					</form>
					</br>
					
					
					</br>
					</br>

					<!--<div id="message">
						<h3>Password must contain the following:</h3>
						<p id="lets" class="invalid">A <b>lowercase</b> letter</p>
						<p id="caps" class="invalid">A <b>capital (uppercase)</b> letter</p>
						<p id="nums" class="invalid">A <b>number</b></p>
						<p id="length" class="invalid">Minimum <b>8 characters</b></p>
					</div>
					<script>
						var pass = document.getElementById("apass");
						var lets = document.getElementById("letter");
						var caps = document.getElementById("capital");
						var nums = document.getElementById("number");
						var length = document.getElementById("length");
						
						//on password Click mesage is shown
						pass.onfocus = function() {
						  document.getElementById("message").style.display = "block";
						}
						
						//click anywhere outside input message hidden
						pass.onblur = function() {
							document.getElementById("message").style.display = "none";
						}
						
						//https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_password_val
						
					</script>-->
				</div>
				<div class="col-sm-1"></div> 
				<div class="col-sm-3"> 
                    <h1> Not Registered yet?</h1></br>
					<a class="btn btn-danger" href="register.php" role="button">Register Now</a>
				</div>
			</div>
			</br></br></br>
		</div>
		
    <?php include '../include/footer.php';?>