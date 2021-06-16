<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>MAIN_ADMIN PAGE</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
					<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
			
</head>
<body>
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; font-size:10px;">
				<li><a href="login_MainAdmin.php">HOME</a></li></li>
				<li><a href="update1_MainAdmin.php?uid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="approved_colleges.php">APPROVED STUDENT PROFILES</li>
				<li><a href="pending_college.php">PENDING STUDENT PROFILES</li>
				<li><a href="logout_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
			</ul>
		</div><br/>
		<form method="get" action="Home_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			<datalist id="Top_Searches">
				<option value="Jobs"></option>
				<option value="Colleges"></option>
				<option  value="Companies"></option>
			</datalist>
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
		<center><h1>COLLEGE DETAILS</h1>
			<table  border="2" width="800px">
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					$sql="SELECT * FROM college;";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
					}
					else
						echo die(mysqli_error($con));
				?>
				<tr>
					<th>COLLEGE ID</th>
					<th style="color:black;"><?php echo $row['u_id']; ?></th>
				</tr>
				<tr>
					<th>COLLEGE NAME</th>
					<th style="color:black;"><?php echo $row['college_name']; ?></th>
				<tr>
					<th>ADMIN NAME</th>
					<th style="color:black;"><?php echo $row['admin_name']; ?></th>
				</tr>
				<tr>
					<th>ADMIN POST</th>
					<th style="color:black;"><?php echo $row['post']; ?></th>
				</tr>
				<tr>
					<th>WEBSITE</th>
					<th style="color:black;"><?php echo $row['website']; ?></th>
				</tr>
				<tr>
					<th>EMAIL ID</th>
					<th style="color:black;"><?php echo $row['email']; ?></th>
				</tr>
				<tr>
					<th>PHONE NUMBER</th>
					<th style="color:black;"><?php echo $row['phone_no']; ?></th>
				</tr>	
				<tr>
					<th>LOCATION</th>
					<th style="color:black;"><?php echo $row['location']; ?></th>
				</tr>
				<tr>
					<th>LANDMARK</th>
					<th style="color:black;"><?php echo $row['landmark']; ?></th>
				</tr>	
				<tr>
					<th>CITY</th>
					<th style="color:black;"><?php echo $row['city']; ?></th>
				</tr>	
			</table><br/>
			<a href="delete_college.php?id=<?php echo $row['u_id']; ?>"><input type="button" name="delete" value="DELETE"> </a>
			
			<?php
					}
					else
						echo die(mysqli_error($con));
				?>
			</center>
	</body>
</html>