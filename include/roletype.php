<form class="form-inline" method="POST" action="../include/role.php" enctype='multipart/form-data'>
	<div class="row">
		<div class="form-group mx-sm-3 mb-2">
			<!--<label for="utype">User Type: </label>-->
			<select class = "form-control form-control" id="arole" name="arole">
				<option>Select user type</option>
					<?php
				include('../conn.php');
		
					$select = "SELECT * FROM Role";
					$result = $conn->query($select);

					while($row=$result->fetch_assoc()){
						$role = $row['Role']; 
						$id = $row['RoleID'];
			
						echo"<option value='$id'>$role</option>";		
					}
				?>
			</select> 
			
			
		</div>
		<!--<div class="text-right col-md-3">-->
			<button type="submit" id="chntype" name="chntype" class="btn btn-danger btn-xs mb-2">Select Role</button>
		<!--</div>-->
	</div>
</form>