<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pdf = new FPDF('P', 'mm', array(58,93));
//$pdf->FPDFA('P', 'mm', array(58,93));
//$pdf->Open();
$pdf->SetAutoPageBreak(FALSE);

$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 3;$i = 0;$j = 0;$k=0;
$px=4;$py=4;$pz=11;
$sx=17;$sy=17;$sz=24;
//$bx=17;$by=24.2;$bz=24.8;
$rx=44;$ry=66.5;$rz=8;
//$lx=33;$ly=80;$lz=16;
$lx=35;$ly=75;$lz=16;
$bgy=3;$bgx=3;$bgz=52;

//define('FPDF_FONTPATH','fpdf/font/');
$pdf->AddFont('Tangerine_Bold', '','Lobster-Regular.php');
$pdf->AddFont('DancingScript', '','Dancing Script.php');
$pdf->AddFont('AbrilFatface-Regular', '','ROCKB.php');
$pdf->AddFont('SairaExtraCondensed', '','SairaExtraCondensedB.php');
foreach ($main_a as $key => $value) {
    $pdf->SetFont('Arial', 'I', 11);
    $pdf->AddPage();
    $pdf->SetFillColor(5,65,134);

    $picture_file = $value->photo;
//    if(empty($picture_file)){
    if(!file_exists($picture_file)){
        $pdf->Image('images/1.jpg',$sx, $sy, $sz);
    }else{
        $pdf->Image("$picture_file",$sx, $sy, $sz);
    }
    $pdf->Image('images/pdf/stu_design6.png', $bgx, $bgy, $bgz,86);
//    $pdf->Image('images/logod.png', $px, $py, $pz);
    if(file_exists('images/pdf/sonaroy.png')){
        $pdf->Image('images/pdf/sonaroy.png', $px, $py, $pz);
    }
//    $pdf->Image('images/qr.jpg',$rx, $ry, $rz,$rz);
    $pdf->Image('images/pdf/principal1.png', $lx, $ly, $lz);
//    $pdf->Image('images/im_pdf/a40_white.png', $lx, $ly, $lz);
//    $pdf->Image('images/border.jpg',$bx, $by, $bz,30.2);
//    $pdf->Image('images/qr.jpg',$rx, $ry, $rz,$rz);
//    $pdf->Image('images/site.png',$bsx, $bsy, $bsz);
//		$pdf->Cell(190, 5, ' ','LTR', 1, 'C');
//		$pdf->Cell(190, 5, ' ','LTR', 1, 'C');
    $pdf->SetXY($x, $y);
    $pdf->SetDrawColor(5,65,134);
    $pdf->SetTextColor(252,252,252);
//    $pdf->SetFont('SairaExtraCondensed', '', 13.5);
    $pdf->SetFont('Tangerine_Bold', '', 13);
    $pdf->Cell($hef,3,"",'LTR',1,'R');

    $pdf->SetX($x);
    $pdf->Cell($hef,$th-4,"Sonarai Songolshi   ",'LR',1,'R');

    $pdf->SetX($x);
    $pdf->SetFont('SairaExtraCondensed', '', 11.5);
    $pdf->Cell($hef,$th+6,"                       College, Nilphamari",'LR',1,'L');

    $pdf->SetX($x);
    $pdf->SetFillColor(215,40,45);
    $pdf->SetTextColor(0,0,160);
    $pdf->SetDrawColor(1,1,1);
    $pdf->SetFont('Tangerine_Bold', '', 10);
    $pdf->Cell($hef, 4, '                 ','LR', 1, 'L');

    $pdf->SetX($x);
    $pdf->Cell($hef,26-1.5,"",'LR',1,'C');

    $pdf->SetX($x);
    $pdf->SetDrawColor(1,1,1);
    $pdf->SetTextColor(0,0,160);
    $pdf->SetFont('AbrilFatface-Regular', '', 8.6);
    $pdf->Cell($hef, $th, ' '.$value->name,'LR', 1, 'C');

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef,$th-1.5,"        ID: $value->id",'LR',1,'L');
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,$th-.5, "         Class: $value->class, Roll: $value->roll",'LR',1,'L');  //.$value->class

//    $pdf->SetX($x);
//    $pdf->SetFont('Arial', 'B', 9);
//    $pdf->Cell($hef,$th-1,"         Section: $value->section",'LR',1,'L');
    if ($value->class == 'Nine' || $value->class == 'Eleven') {
        $session = $value->year . '-' . ($value->year + 1);
    } elseif ($value->class == 'Ten' || $value->class == 'Twelve') {
        $session = ($value->year - 1) . '-' . $value->year;
    } else {
        $session = $value->year + 1;
    }

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,$th-1,"         Session: $session",'LR',1,'L');

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,$th-1,"         Group  : $value->group_r",'LR',1,'L');

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef, $th-1, "         Blood Group : $value->blood_group",'LR', 1, 'L');

    $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell($hef, $th-1, "         Mobile : $value->stu_phone",'LR', 1, 'L');
//    $pdf->Cell($hef, $th-1, "         Validity : 31/12/2019",'LR', 1, 'L');

    $pdf->SetX($x);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Cell($hef, 6, '','LR',1,'R');

    $pdf->SetX($x);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Cell($hef, 2, 'Signature of the Principal   ','LR',1,'R');

    $pdf->SetX($x);
    $pdf->SetDrawColor(215,40,45);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,1.5, '','LR',1,'L');

    $pdf->SetX($x);
    $pdf->SetFillColor(5,65,134);
    $pdf->SetDrawColor(5,65,134);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Arial', 'B', 10.5);
    $pdf->Cell($hef, $th-3+2, $academy_info->site_url,'LBR',1,'C');


}
$pdf->Output();
