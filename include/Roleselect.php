<form class="form-horizontal" method="POST"  enctype="multipart/form-data" action= "">
	<div class="row group">
		<div class="col-md-9">
			<div class="form-group">
				<label for="roleID">Role Applying for: </label>
				<select class = "form-select" id="roleID" name="roleID">
					<option>Select Role</option>
					<!--/**Use php here for title drop down**/-->
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
		</div>	
		<div class='col-md-1'>
				<?php	//echo "<input type='hidden' value='$getid' name='postid'>";?>
			</div>
			<!--<div class="col-md-2">	
				<button type="submit" class="btn btn-danger" id="select" name="select" >Select</button>
			</div>-->
		
	</div>
</form>