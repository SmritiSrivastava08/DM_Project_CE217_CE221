<?php
	$con=mysqli_connect("localhost","root","","pms");
	$email=$_REQUEST['email'];
	$sql="UPDATE student SET `approval_status`='Y' WHERE `email`="."'$email'"."";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		/*echo '<script type="text/javascript">
						alert("You approved the student\'s profile!");
				</script>';
		header("refresh:1;url=pending_students.php");*/
		require_once('mailDemo/approval_mail.php');
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error while approving the students profile!Please Try Again!");
				</script>';
		header("refresh:1;url=pending_students.php");
	}	
?>