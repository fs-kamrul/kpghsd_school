<?php


$pdf = new FPDF();
$pdf->FPDFA('L', 'mm', 'A4');
$h = 7;
$th = 7;
foreach ($main_a as $key => $value) {

    $pdf->AddPage();
    $pdf->Image('images/im_pdf/border.jpg', 0, 0, 213);
    $pdf->Image('images/im_pdf/logo.jpg', 80, 50, 35);
    $pdf->SetFont('Arial', '', 20);
    $pdf->Ln(6);
    $pdf->Cell(180, 8, 'OFFICE OF THE PRINCIPAL', 0, 1, 'C');
    $pdf->Cell(180, 8, 'Collectorate Public School & College,Nilphamari', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 16);
    $pdf->Cell(180, 8, 'Telephone :0551-61488', 0, 1, 'C');
    $pdf->Cell(180, 8, 'Post & Dist :Nilphamari', 0, 1, 'C');
    $pdf->Ln(40);
    $pdf->Cell(180, 8, 'TRANSFER CERTIFICATE', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 13);

    $pdf->Cell(250, $h, 'This is to certify that ' . $value->name . ' Son/daughter of ' . $value->father_name);
    $pdf->Ln();
    $pdf->Cell(250, $h, 'Mother\'s Name ' . $value->mother_name . ' was a student of group ' . $value->section . ', Roll ' . $value->roll . ' in  this institution ');
    $pdf->Ln();
    $pdf->Cell(250, $h, 'till to . His/Her date of birth is ' . $value->birth_bate . ' . He /she bears a good moral character. To the ');
    $pdf->Ln();
    $pdf->Cell(250, $h, 'best of my knowledge he/she took part in no activities subversive to the state or of discipline. ');
    $pdf->Ln();
    $pdf->Cell(250, $h, 'He/she has paid all the dues till .');
    $pdf->Ln(20);
    $pdf->Cell(250, $h, 'I wish him/her every success in life.');
    $pdf->Ln(20);
    $pdf->Cell(250, $h, 'The cause of living:');
    $pdf->Ln();
    $pdf->Cell(250, $h, '1. Transfer of guardian');
    $pdf->Ln();
    $pdf->Cell(250, $h, '2. On request of the guardian');
    $pdf->Ln();
    $pdf->Cell(250, $h, '3. Any other cause');
    $pdf->Ln(20);
    $pdf->Cell(250, $h, 'Dated : Nilphamari');
    $pdf->Ln();
    $pdf->Cell(250, $h, 'The ..........................');
    $pdf->Ln(30);
    $pdf->Cell(60, $h, '', 0, 0, 'C');
    $pdf->Cell(150, $h, 'Principal', 0, 1, 'C');
    $pdf->Cell(60, $h, 'Class Teacher', 0, 0, 'C');
    $pdf->Cell(150, $h, 'Collectorate Public School & College,', 0, 1, 'C');
    $pdf->Cell(60, $h, '', 0, 0, 'C');
    $pdf->Cell(150, $h, 'Nilphamari', 0, 0, 'C');
    $pdf->Ln();
}

$pdf->Output();
?>