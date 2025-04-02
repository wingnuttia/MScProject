<form class="form-inline" method="POST" action="../include/user.php" enctype='multipart/form-data'>
	<div class="row">
		<div class="form-group mx-sm-3 mb-2">
			<!--<label for="utype">User Type: </label>-->
			<select class = "form-control form-control-sm" id="utype" name="utype">
				<option>Select user type</option>
					<?php
				include('../conn.php');
					$userread = "SELECT SU.UserID, SUT.ID, SUT.UserID, SUT.UserTypeID, SUT.active, UT.UserTypeID, UT.UserType
					FROM StaffUserType SUT
					INNER JOIN StaffUser SU ON SUT.UserID = SU.UserID	
					INNER Join UserType UT ON SUT.UserTypeID = UT.UserTypeID
					WHERE SU.UserID = '$userid' AND SUT.active='1';";
					
					$resType = $conn->query($userread);

				while($row=$resType->fetch_assoc()){			
					$type = $row['UserType']; 
					$id = $row['UserTypeID'];
	
					echo"<option value='$id'>$type</option>";	
				}
				?>
			</select> 
		</div>
		<!--<div class="text-right col-md-3">-->
			<button type="submit" id="chntype" name="chntype" class="btn btn-danger btn-xs mb-2">Switch User</button>
		<!--</div>-->
	</div>
</form>