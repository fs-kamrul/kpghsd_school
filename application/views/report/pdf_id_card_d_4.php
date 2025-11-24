<?php
$pdf = new FPDF('P', 'mm', 'A4');
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 13.5;$i = 0;$j = 0;$k=0;
$px=14;$py=5.5;$pz=12.5;
$sx=28.6;$sy=25;$sz=23;
$bx=27.7;$by=24.2;$bz=24.8;
$rx=52;$ry=72.2;$rz=8;
//$bsx=60.5;$bsy=16;$bsz=4.5;
$lx=46;$ly=80;$lz=16;
$bgy=3;$bgx=13.5;$bgz=52;
$pdf->SetFont('Arial', 'I', 11);
//define('FPDF_FONTPATH','fpdf/font/');
        $pdf->AddFont('Tangerine_Bold', '','Lobster-Regular.php');
        $pdf->AddFont('DancingScript', '','Dancing Script.php');
        $pdf->AddFont('AbrilFatface-Regular', '','ROCKB.php');
        $pdf->AddFont('SairaExtraCondensed', '','SairaExtraCondensedB.php');
foreach ($main_a as $key => $value) {
    $i++;$j++;$k++;
    if($j==10){
        $pdf->AddPage();
        $j=1;$y = 3;$x = 13.5;
        $px=14;$py=5.5;$pz=12.5;
        $sx=28.6;$sy=25;$sz=23;
        $bx=27.7;$by=24;$bz=24.8;
        $rx=52;$ry=72.2;$rz=8;
        $lx=46;$ly=80;$lz=16;
        $bgy=3;$bgx=13.5;$bgz=52;
    }
    $pdf->SetFillColor(5,65,134);

    $pdf->Image('images/bg_01.jpg', $bgx, $bgy, $bgz,86);
    $pdf->Image('images/im_pdf/a40.png', $lx, $ly, $lz);
    $pdf->Image('images/border.jpg',$bx, $by, $bz,30.2);
    $pdf->Image('images/qr.jpg',$rx, $ry, $rz,$rz);
//    $pdf->Image('images/site.png',$bsx, $bsy, $bsz);
    $picture_file = $value->photo;
//    if(empty($picture_file)){
    if(!file_exists($picture_file)){
                $pdf->Image('images/1.jpg',$sx, $sy, $sz);
        }else{
                $pdf->Image("$picture_file",$sx, $sy, $sz);
        }
//		$pdf->Cell(190, 5, ' ','LTR', 1, 'C');
        $pdf->SetXY($x, $y);
        $pdf->SetDrawColor(5,65,134);
        $pdf->SetTextColor(0,0,160);
//    $pdf->SetFont('SairaExtraCondensed', '', 13.5);
    $pdf->SetFont('Tangerine_Bold', '', 13.5);
    $pdf->Cell($hef,3,"",'LTR',1,'R');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"Collectorate Public   ",'LR',1,'R');
        $pdf->SetX($x);
        $pdf->SetFont('Tangerine_Bold', '', 13);
    $pdf->Cell($hef,$th+2,"    School & College",'LR',1,'C');
        $pdf->SetX($x);
        $pdf->SetFillColor(215,40,45);
        $pdf->SetTextColor(0,0,160);
        $pdf->SetDrawColor(215,40,45);
    $pdf->SetFont('Tangerine_Bold', '', 10);
    $pdf->Cell($hef, 4, '                 Nilphamari','LR', 1, 'L');
        $pdf->SetX($x);
    $pdf->Cell($hef,29+8,"",'LR',1,'C');
    $pdf->SetX($x);
    $pdf->SetDrawColor(1,1,1);
    $pdf->SetTextColor(0,0,160);
    $pdf->SetFont('AbrilFatface-Regular', '', 8.6);
    $pdf->Cell($hef, $th-1.5, ' '.$value->name,'LR', 1, 'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef,$th-1.5,"         ID: $value->id",'LR',1,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-1.5, "           Class: $value->class, Roll: $value->roll",'LR',1,'L');  //.$value->class
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-2,"           Section: $value->section, Ses: 2017-18",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-2,"           Group  : $value->group_r",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef, $th-1.5, "           Validity : 31/06/2020",'LR', 1, 'L');

        $pdf->SetX($x);
        $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Cell($hef, 4.5, '','LR',1,'R');
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
    $pdf->Cell($hef, $th-3, '','LBR',1,'C');

    $pdf->Image('images/logod.png', $px, $py, $pz);

    if ($k==1) {
        $x = $x+65.5;
        $bgx=$x;
        $px=$px+66;
        $bx=$bx+66;
        $rx=$rx+66;
        $sx=$sx+66;
        $lx=$lx+65.5;//$ly=85;$lz=16;$lx=48;
    }elseif ($k==2) {
        $x = $x+65.5;
        $bgx=$x;
        $px=$px+65;$sx=$sx+64.5;$lx=$lx+65;//$sz=22;
        $bx=$bx+64.5;
        $rx=$rx+64.5;
    }elseif($k==3){
        $k=0;
        $y=$y+92;$x = 13.5;
        $px=14;$py+=92;$sy+=92;$sx=28.6;$lx=46;$ly+=92;$bx=27.5;$rx=52;$by+=92;$ry+=92;
        $bgx=13.5;$bgy=$y;
    }
}
$pdf->Output();
