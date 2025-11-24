<?php
//require('fpdf/fpdf.php');
//require('fpdf/font/makefont/makefont.php');
//echo '<pre>';
//print_r($main_a);
//exit();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pdf = new FPDF('P','mm','A4');
$other_libraries = new other_libraries();
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 13.5;$i = 0;$j = 0;$k=0;
$px=33;$py=5;$pz=15;
$sx=29.5;$sy=35;$sz=22;
$lx=49.5;$ly=78.5;$lz=16;
$bgy=3;$bgx=13.5;$bgz=52;
$pdf->SetFont('Arial', 'I', 11);
foreach ($main_a as $key => $value) {
    $i++;$j++;$k++;
    if($j==10){
        $pdf->AddPage();
        $j=1;$y = 3;$x = 13.5;
        $px=33;$py=5;$pz=15;
        $sx=29.5;$sy=35;$sz=22;
        $lx=49.5;$ly=78.5;$lz=16;
        $bgy=3;$bgx=13.5;$bgz=52;
    }
    $pdf->SetFillColor(32,118,196);

//    $pdf->Image('images/bg.jpg', $bgx, $bgy, $bgz,86);
    $pdf->Image('images/logod.png', $px, $py, $pz);
//    $pdf->Image('images/principal.png', $lx, $ly, $lz);
    $picture_file = $value->photo;
//    if(empty($picture_file)){
    if(!file_exists($picture_file)){
                $pdf->Image('images/1.jpg',$sx, $sy, $sz);
        }else{
                $pdf->Image("$picture_file",$sx, $sy, $sz);
        }
//		$pdf->Cell(190, 5, ' ','LTR', 1, 'C');
    $pdf->SetFont('Arial', 'I', 11);
        $pdf->SetXY($x, $y);
    $pdf->Cell($hef, 20, ' ','LTR', 1, 'C');
        $pdf->SetX($x);
        $pdf->SetDrawColor(32,118,196);
        $pdf->SetTextColor(255,255,255);
    $pdf->MultiCell($hef,$th,$academy_info->s_name,'BLR','C',1);//"Collectorate Public College Nilphamari"
//        $pdf->SetX($x);
//    $pdf->Cell($hef,$th,"Nilphamari",'LTR',1,'C',1);
        $pdf->SetX($x);
        $pdf->SetTextColor(237,28,36);
        $pdf->SetDrawColor(1,1,1);
    $pdf->Cell($hef,30,"",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell($hef,$th," ID: $value->id",'LR',1,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9.4);
    $pdf->Cell($hef,$th," ".$value->name,'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($hef,$th," Class: ". $other_libraries->getClassRoman($value->class).", Roll: $value->roll, Ses: " . $other_libraries->GetClassSession($value->year, $value->class) ,'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell($hef,$th," Group  : $value->group_r",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(237,28,36);
    $pdf->Cell($hef, $th+1, " Validity : 31/12/2018",'LRB', 1, 'L');

    if ($k==1) {
        $x = $x+65.5;
        $bgx=$x;
        $px=$px+64.5;$sx=$sx+65;//$sy=40;$sz=22;
        $lx=$lx+65.5;//$ly=85;$lz=16;$lx=48;
    }elseif ($k==2) {
        $x = $x+65.5;
        $bgx=$x;
        $px=$px+65.5;$sx=$sx+64.5;$lx=$lx+65;//$sz=22;
    }elseif($k==3){
        $k=0;
        $y=$y+92;$x = 13.5;
        $px=33;$py+=92;$sy+=92;$sx=29.5;$lx=49.5;$ly+=92;
        $bgx=13.5;$bgy=$y;
    }
}
$pdf->Output();
