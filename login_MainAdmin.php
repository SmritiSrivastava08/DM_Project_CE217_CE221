<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>Main Admin Page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
					<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
<style>
	#sidebar li{padding: 22px;}
</style>
</head>
<body>
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; font-size:10px;">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_madmin.php?uid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="main_admin_registration.html">CREATE NEW MAIN ADMIN</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="approved_colleges.php">APPROVED COLLEGES PROFILES</li>
				<li><a href="pending_colleges.php">PENDING COLLEGES PROFILES</li>
				<li><a href="approved_companies.php">APPROVED COMPANIES PROFILES</li>
				<li><a href="pending_companies.php">PENDING COMPANIES PROFILES</li>
				<li><a href="logout_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
			</ul>
		</div>
		<form method="get" action="Home_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			<datalist id="Top_Searches">
				<option value="Jobs"></option>
				<option value="Colleges"></option>
				<option  value="Companies"></option>
			</datalist>
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
			<div style="margin-top:25%">
		<p>Check out the new company profile requests!!!</p>
		<a href="pending_companies.php"><button>APPROVE NOW!</button></a>
		</div><br/>
		<p>Check out the new college profile requests!!!</p>
		<a href="pending_colleges.php"><button>APPROVE NOW!</button></a>
				<?php
					}
					else
						echo die(mysqli_error($con));
				?>
			<br/>
	</body>
</html>