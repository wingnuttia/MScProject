
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	body {
		font-family: "Lato", sans-serif;
	}
	#flogos{
				margin:10px;
				width:50%;
			}
		
	.sidenav {
		height: 100%;
		width: 180px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #362c32;
		overflow-x: hidden;
		padding-top: 40px;
	}

	.sidenav a, .dropdown-btn {
		padding: 6px 6px 6px 16px;
		text-decoration: none;
		font-size: 14px;
		color: #818181;
		display: block;
		border: none;
		background: none;
		width: 100%;
		text-align: left;
		cursor: pointer;
		outline: none;
	}

	.sidenav a:hover , .dropdown-btn:hover {
	  color: #f1f1f1;
	}

	.main {
	  margin-left: 150px; /* Same as the width of the sidenav */
	}
	
	.active{
		background-color: #581818;
		color: white;
	}
	
	.dropdown-container {
		display: none;
		background-color: #262626;
		padding-left: 8px;
	}
	
	.fa-caret-down {
		float: right;
		padding-right: 8px;
	}
	
	
	
	@media screen and (max-height: 450px) {
	  .sidenav {padding-top: 15px;}
	  .sidenav a {font-size: 12px;}
	}	
	
	
	</style>		
	<div id="appsidenav" class="sidenav">
	<a href="../member/welcome.php"><img id="flogos" src="../imgs/starw.png" alt="Short Term Appointment Register"></a>
			
		<a href="../Manager/welcome.php">Home</a>		
		<button class="dropdown-btn">My Account  
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="../stafflogin/personal.php">Personal Details</a>
			<a href="../stafflogin/passrest.php">Change Password</a>
			<a href="#">Assigned User Roles</a>
		</div>
		<button class="dropdown-btn">Position  
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="../Manager/addposition.php">Create Position</a>
			<a href="../Manager/AllPositions.php">My Live Positions</a>
			<a href="../Manager/ArchivePositions.php">My Archived Positions</a>
		</div>
		<button class="dropdown-btn">STAR Members  
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="../staff/AllMembers.php">All Members</a>
			<a href="../staff/availMembers.php">All Unassigned Members</a>
			<a href="#">Assign Member</a>
			<a href="#">My STAR Members</a>
		</div>
		<!--<button class="dropdown-btn">Roles  
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="../RoleSummary/jobsummary.php">Role Summaries</a>
			<a href="#">Create Roles</a>
			<a href="#">Role Requirement</a>
		</div>
		<button class="dropdown-btn">System Admin 
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="#">Application Fields</a>
			<a href="#">Positions</a>
			<a href="#">Skills</a>
		</div>-->
		
		
		
		</br></br>
		<a href="../stafflogin/logout.php">Logout</a>
		<i class="fas fa-sign-out-alt"></i>
	</div>
	
	<script>

		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
</script>
	
	<div class="main" id="main">
	
	<!--<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>
		<script>
			function openNav() {
			  document.getElementById("appsidenav").style.width = "250px
			  document.getElementById("main").style.marginLeft = "250px";
			}

			function closeNav() {
			  document.getElementById("appsidenav").style.width = "0";
			  document.getElementById("main").style.marginLeft = "0";
			}
		</script>-->