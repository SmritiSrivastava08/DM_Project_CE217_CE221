 <?php
	include('library/tcpdf.php');
	$pdf=new TCPDF('p','mm','A4');
	$pdf->AddPage();
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->IncludeJS("print();");
	ob_end_clean();
	$pdf->Output('report.pdf','I');
 ?>