<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();//Creation de la page
$pdf->SetFont('Arial','B',16);////Modification de la police
$pdf->Cell(40,10,'Hello World !',1,1);

$pdf->Cell(30,10,'Hello World 2!',1,2);
$pdf->Output();
?>
