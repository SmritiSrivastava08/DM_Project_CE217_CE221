<?php session_start(); if(isset($_SESSION['email'])){
	function fetch_data()
	{
		$output='';
		
					$con=mysqli_connect("localhost","root","","pms");
					$email=$_SESSION['email'];
					$sql_id="SELECT `c_id` FROM `company` where `email`='$email';";
					$query_id=mysqli_query($con,$sql_id);
					if($query_id)
					{
						$row_id=mysqli_fetch_array($query_id);
							$cid=$row_id['c_id'];
						$sql="SELECT * FROM stu_job where `application_status`='Y' && `job_status`='P' && `job_id` in (select `job_id` from `job` where `c_id`='$cid' );";
						$query=mysqli_query($con,$sql);
						if($query)
						{
							while ($row=mysqli_fetch_array($query))
							{
								$rollno=$row['enroll_no'];
								$query_Std=mysqli_query($con,"select * from `Student` where `enroll_no`='$rollno';");
								if($query_Std)
								{
									$jid=$row['job_id'];
									$row_Std=mysqli_fetch_array($query_Std);
											$output.='
												<tr>
													<td>'.$row['job_id'];'</td>
													<td>'.$row_Std["student_name"].'</td>
													<td>'.$row_Std["email"].'</td>
													<td>'.$row_Std["phone_no"].'</td>
													<td></td>
												</tr>';
									
								}
							}
						}
					}
				return $output;
	}
		require_once("library/tcpdf.php");
		$obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
		$obj_pdf->SetCreator(PDF_CREATOR);
		$obj_pdf->SetTitle("STUDENT LIST");
		$obj_pdf->SetHeaderData('','75','STUDENT LIST','The student list for job');
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins(1,'20',PDF_MARGIN_RIGHT);
		$obj_pdf->setPrintHeader(true);
		$obj_pdf->setPrintFooter(true);
		$obj_pdf->SetAutoPageBreak(TRUE,10);
		$obj_pdf->SetFont('helvetica','',10);
		$obj_pdf->AddPage();
		$content='';
		$content.='
			<table border="1" cellspacing="0" cellpadding="5">
				<tr>
					<th width="16%">JobID</th>
					<th width="26%">STUDENT NAME</th>
					<th width="26%">EMAIL</th>
					<th width="16%">Phone No</th>
					<th width="15%">SIGNATURE</th>
				</tr>
			';
		$content.=fetch_data();
		$content.="</table>";
		$content.="<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h3>Signature of the Authority:-</h3><br/>__________________________";
		$obj_pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);
		//$obj_pdf->writeHTML($content);
		ob_end_clean();
		$obj_pdf->Output("student_jobs_list.pdf","I");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>COLLEGE PAGE</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
					<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
			
</head>
<body>
<center><br><h1><b>APPROVED STUDENT PROFILES</b></h1>

			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>JOB ID</th>
					<th>STUDENT NAME</th>
					<th>PHONE NUMBER</th>
					<th>EMAIL ID</th>
					<th>SIGNATURE</th>
				</tr>
				<?php echo fetch_data();?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table>	
				<?php
						}
					else
						header("location:logincom.html");
				?>
			</center>
	</body>
</html>