<?php
//require('fpdf/image_alpha.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$pdf = new PDF_ImageAlpha();
$pdf->AddPage();
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$px=33;$py=5;$pz=15;

$pdf->SetFont('Arial','',16);
$pdf->Cell(0, 12, " Hello World!",1, 1, 'L');
$pdf->MultiCell(0,10, 'gdfgdf');

//$maskImg = $pdf->Image('images/logod.jpg', 0,0,0,0, '', '', true);
// embed image, masked with previously embedded mask
//$pdf->Image('images/logod.jpg',55,10,100,0,'','', false, $maskImg);
$pdf->Image('images/logod.jpg', $px, $py, $pz);
$pdf->ImagePngWithAlpha('images/logod.png',55,100,100);

$pdf->Output();

