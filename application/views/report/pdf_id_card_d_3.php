<?php
$pdf = new FPDF('P','mm','A4');
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 13.5;$i = 0;$j = 0;$k=0;
$px=14;$py=4;$pz=12.5;
$sx=28.6;$sy=30;$sz=23;
$bx=27.7;$by=29.2;$bz=24.8;
$rx=48.4;$ry=61.5;$rz=12.5;
//$bsx=60.5;$bsy=16;$bsz=4.5;
$lx=46;$ly=74.5;$lz=16;
$bgy=22;$bgx=13.5;$bgz=52;
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
        $px=14;$py=5;$pz=12.5;
        $sx=28.6;$sy=30;$sz=23;
        $bx=27.5;$by=29;$bz=24.8;
        $rx=48.4;$ry=61.5;$rz=12.5;
        $lx=46;$ly=74.5;$lz=16;
        $bgy=22;$bgx=13.5;$bgz=52;
    }
    $pdf->SetFillColor(5,65,134);

    $pdf->Image('images/bg-new.jpg', $bgx, $bgy, $bgz,60);
    $pdf->Image('images/im_pdf/a40.png', $lx, $ly, $lz);
    $pdf->Image('images/border.jpg',$bx, $by, $bz,31.4);
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
        $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('SairaExtraCondensed', '', 13.5);
    $pdf->Cell($hef,3,"",'LBTR',1,'R',1);
        $pdf->SetX($x);
    $pdf->MultiCell($hef,$th,$academy_info->s_name,'BLR','C',1);//"Collectorate Public College Nilphamari"
//    $pdf->Cell($hef,$th,"Collectorate Public College",'LBTR',1,'R',1);
        $pdf->SetX($x);
        $pdf->SetFont('Tangerine_Bold', '', 13);
    $pdf->Cell($hef,$th+2,"Nilphamari     ",'LTR',1,'C',1);
        $pdf->SetX($x);
        $pdf->SetFillColor(215,40,45);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetDrawColor(215,40,45);
    $pdf->SetFont('Arial', '', 6.33);
    $pdf->Cell($hef, 4, 'Phone: 0551-61488, cpsc.nilphamari@yahoo.com','LBR', 1, 'L',1);
        $pdf->SetX($x);
        $pdf->SetDrawColor(1,1,1);
        $pdf->SetTextColor(0,0,160);
    $pdf->SetFont('AbrilFatface-Regular', '', 8.5);
    $pdf->Cell($hef, 10, $value->name,'LR', 1, 'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,29,"",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef,$th-1.5," ID: $value->id",'LR',1,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-1, ' Class: XI-XII','LR',1,'L');  //.$value->class
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-2," Roll: $value->roll, Ses: 2017-18",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th-1," Group  : $value->group_r",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef, $th-1, " Validity : 31/06/2019",'LR', 1, 'L');

        $pdf->SetX($x);
        $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Cell($hef, 2, 'Signature of the Principal','LR',1,'R');
        $pdf->SetX($x);
        $pdf->SetDrawColor(215,40,45);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,1.5, '','LR',1,'L',1);
        $pdf->SetX($x);
        $pdf->SetFillColor(5,65,134);
        $pdf->SetDrawColor(5,65,134);
        $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Arial', 'B', 10.5);
    $pdf->Cell($hef, $th+1, 'Web: www.cpscn.edu.bd','TLBR',1,'C',1);

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
        $px=14;$py+=92;$sy+=92;$sx=28.6;$lx=46;$ly+=92;$bx=27.5;$rx=48.4;$by+=92;$ry+=92;
        $bgx=13.5;$bgy=$bgy+92;
    }
}
$pdf->Output();
