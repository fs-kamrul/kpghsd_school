<?php
require_once '../fpdf/fpdf.php';
require_once './Db_Connect.php';
//require('../fpdf/fpdf.php');


if(isset($_POST['btr_trn']))
{
    $dbobj = new Db_Connect();
    $sql="SELECT si.name,si.father_name,si.mother_name,si.birth_bate,ar.section,ar.roll "
            . "FROM tbl_all_registration_info ar, student_information si "
            . "WHERE si.reg_id=ar.reg_id "
            . "and ar.class='$_POST[class]'"
            . "and ar.year='$_POST[year]'"
            . "and ar.section='$_POST[section]'";
    $result= mysql_query($sql);
}
$pdf=new FPDF('P','mm','A4');
		$h=7; $th=7;
while ($row = mysql_fetch_assoc($result)) {
    

$pdf->AddPage();


$pdf->Image('../images/im_pdf/border.jpg',0,0,213);
$pdf->Image('../images/im_pdf/logo.jpg',80,50,35);
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

$pdf->Cell(250, $h, 'This is to certify that '.$row['name'].' Son/daughter of '.$row['father_name']);
$pdf->Ln();
$pdf->Cell(250, $h, 'Mother\'s Name '.$row['mother_name'].' was a student of group '.$row['section'].', Roll '.$row['roll'].' in  this institution ');
$pdf->Ln();
$pdf->Cell(250, $h, 'till to . His/Her date of birth is '.$row['birth_bate'].' . He /she bears a good moral character. To the ');
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
$pdf->Cell(60, $h, '',0,0,'C');
$pdf->Cell(150, $h, 'Principal', 0, 1, 'C');
$pdf->Cell(60, $h, 'Class Teacher',0,0,'C');
$pdf->Cell(150, $h, 'Collectorate Public School & College,', 0, 1, 'C');
$pdf->Cell(60, $h, '',0,0,'C');
$pdf->Cell(150, $h, 'Nilphamari', 0, 0, 'C');
$pdf->Ln();
}

$pdf->Output();


?>