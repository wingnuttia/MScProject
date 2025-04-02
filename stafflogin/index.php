<?php
	session_start();
    
	include("../conn.php");

	if (isset($_POST['login'])) {

		$uname = $conn->real_escape_string(trim($_POST['StaffNo']));
		$apass = $conn->real_escape_string(trim($_POST['pw']));
		$apass=md5($apass);
		$userid = $conn->real_escape_string(trim($_POST['UserID']));
		//$date = date('y-m-d h:i:s');
		
		$uname = $_POST['uname'];
		$apass = $_POST['apass'];
		
		/*$checkuser = "SELECT * FROM StaffUser WHERE StaffNo = '$uname'";*/

		$checkuser = "SELECT SU.UserID, SU.StaffNo, SU.pw, SUT.ID, SUT.UserID, SUT.UserTypeID,SUT.defaultType, SUT.active, UT.UserTypeID, UT.UserType
		
		FROM StaffUser SU
		
		INNER JOIN StaffUserType SUT ON SU.UserID = SUT.UserID	
		INNER Join UserType UT ON SUT.UserTypeID = UT.UserTypeID
	
	WHERE SU.StaffNo = '$uname'  and SUT.defaultType='1'";
	//WHERE SU.StaffNo = '$uname' AND SU.pw='$apass' and SUT.defaultType='1'";	
		
		//$checkuser = "SELECT * FROM StaffUser WHERE StaffNo = '$uname' AND pw='$apass')";
		
		/*SELECT * FROM StaffUser WHERE StaffNo = '$uname'*/
		
		$result = $conn->query($checkuser);

		if (!$result) {
			echo $conn->error;
			//echo "<p> User does not exist</p>";
		}

		$num = $result->num_rows;

		if ($num > 0) {

			while ($row = $result->fetch_assoc()) {
				$username = $row['StaffNo'];
				$type = $row['UserTypeID'];
				$userid = $row['UserID'];

				$_SESSION['UserID'] = $userid;
				$_SESSION['StaffNo'] = $username;
				$_SESSION['UserTypeID'] = $type;
			}//end of the while

			switch ($type){
				case 1:
					//$insertlogindate = "INSERT INTO StaffLoginTime (UserID) VALUES ('$userid',);";
					header('Location: ../admin/welcome.php');
				break;
				case 2:
					//$insertlogindate = "INSERT INTO StaffLoginTime (UserID, loginTime) VALUES ('$userid', '$date');";
					header('Location: ../HR/welcome.php');
				break;
				case 3:
					//$insertlogindate = "INSERT INTO StaffLoginTime (UserID, loginTime) VALUES ('$userid', '$date');";
					header('Location: ../Manager/welcome.php');
				break;
				default:
					header('Location: ../stafflogin/index.php?loginerror');
				
			}
		} //end of if num
	}//closing of posted data
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

        <title>Staff Login</title>
    </head>
	
	<body>

      </br></br>
			
		<div class="container">
            <div class ="row">
				<div class="col-sm-8"> 
			        <h1>Existing User</h1></br>
					<form class="form-horizontal" method="POST" action="index.php" enctype='multipart/form-data'>
						<div class="row group">
							<div class="col-md-6">
								<div class="form-group">
									<label for="uname">Staff No: </label>
									<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Staff Number" required>
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
						<div class="text-right col-md-12">	
							<button type="submit" class="btn btn-primary" name="login">Login</button>
						</div>
					</form>
					</br>
					</br>

				</div>
				<div class="col-sm-1"></div> 
				<div class="col-sm-3"> 
                    <h1> Not Registered yet?</h1></br>
					<a class="btn btn-primary" href="register.php" role="button">Register Now</a>
				</div>
			</div>
		</div>
		
    <?php include '../include/footer.php';?>