<div class="container starcontain">
	<div class="row"><!--Row 1-->
		<div class="card-columns">
			<div class="card border-danger">
				<div class="card-header">External Users</div>
				<div class="card-body">
					<ul>
						<li class="card-text">
							<?php 
								$totalext = "SELECT COUNT(*) FROM ApplicantLogin";
								$resnoext = mysqli_query($conn, $totalext);
								$extUser = mysqli_fetch_assoc($resnoext)['COUNT(*)'];
								echo $extUser;
							?>  Total External Users</li>
						<li>
							<?php 
							$totalapp = "SELECT COUNT(*) FROM ApplicantLogin WHERE userTypeID=4";
							$resnoapp = mysqli_query($conn, $totalapp);
							$apps = mysqli_fetch_assoc($resnoapp)['COUNT(*)'];
							echo $apps;
							?> Applications
						</li>
						<li>
							<?php 
							$totalmem = "SELECT COUNT(*) FROM ApplicantLogin WHERE userTypeID=5";
							$resnomem = mysqli_query($conn, $totalmem);
							$mem = mysqli_fetch_assoc($resnomem)['COUNT(*)'];
							echo $mem;
							?> STAR Members
						</li>
					</ul>
				</div>
			</div><!-- End No of Extrernal Users-->
			<div class="card border-danger">
			<!--<div class="card border-danger mb-3 style="max-width: 540px;">-->
				<div class="card-header">Internal Users</div>
				<div class="card-body">
					<ul>
						<li class="card-text">
							<?php 
								$totalint = "SELECT COUNT(*) FROM StaffUser";
								$resnoint = mysqli_query($conn, $totalint);
								$intUser = mysqli_fetch_assoc($resnoint)['COUNT(*)'];
								echo $intUser;
							?>  Total Internal Users</li>
						<li>
							<?php 
								$totaladm = "SELECT COUNT(*) FROM StaffUser WHERE Defusertype=1";
								$resnoadm = mysqli_query($conn, $totaladm);
								$admin = mysqli_fetch_assoc($resnoadm)['COUNT(*)'];
								echo $admin;
							?> Adminstrators
						</li>
						<li>
							<?php 
								$totalhr = "SELECT COUNT(*) FROM StaffUser WHERE Defusertype=2";
								$resnohr = mysqli_query($conn, $totalhr);
								$hr = mysqli_fetch_assoc($resnohr)['COUNT(*)'];
								echo $hr;
							?> HR Users
						</li>
						<li>
							<?php 
							$totalman = "SELECT COUNT(*) FROM StaffUser WHERE Defusertype=3";
							$resnoman = mysqli_query($conn, $totalman);
							$man = mysqli_fetch_assoc($resnoman)['COUNT(*)'];
							echo $man;
							?> Managers
						</li>
					</ul>
				</div>
			</div><!-- End No of Internal Users-->
		</div>
	</div><!-- End of Row-->
</div><!-- End of container-->