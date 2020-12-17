<?php
session_start();
require('fpdf.php');
require('dbconnection.php');
$query ="select * from users a, student_records b WHERE a.stdNum = b.stdNum";
$query_l = mysqli_query($con,$query);



$pdf= new FPDF('L', 'mm' , 'a4');
$pdf->SetFont('arial', 'b','14');
$pdf->AddPage();
// width,height,text,border,inch, align
$pdf->Cell( 40,10,'Student number', 1, 0, 'C');
$pdf->Cell(40, 10,'First Name', 1, 0, 'C');
$pdf->Cell(40, 10,'Last Name', 1, 0, 'C');
$pdf->Cell(75, 10,'Email', 1, 0, 'C');
$pdf->Cell(40, 10,'Contactno', 1, 0, 'C');
$pdf->Cell(40, 10,'posting_date', 1, 1,'C');



		 while( $row = mysqli_fetch_assoc($query_l))
		 {
			$pdf->Cell( 40,10,$row['stdNum'], 1, 0, 'C');
			$pdf->Cell( 40,10,$row['name'], 1, 0, 'C');
			$pdf->Cell( 40,10,$row['SName'], 1, 0, 'C');
			$pdf->Cell(75, 10,$row['email'], 1, 0, 'C');
			$pdf->Cell(40, 10,$row['contactno'], 1, 0, 'C');
			$pdf->Cell(40, 10,$row['posting_date'], 1, 1, 'C');
			

		 }


$pdf->Output('myfile.pdf','D');




	
	

?>
