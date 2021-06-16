<?php
	$con=mysqli_connect("localhost","root","","pms");
	$c_id=$_GET['id'];
	$sql="DELETE FROM company WHERE `c_id`="."'$c_id'"."";
	$query=mysqli_query($con,$sql);
	if($query)
		{
			echo '<script type="text/javascript">
			alert("Deleted Successfully!");
			</script>';
			header("refresh:1;url=login_MainAdmin.php");
		}
	else
		echo die(mysqli_error($con));
?>