<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create PDF instance with extended class
$pdf = new FPDF('P', 'mm', array(54, 86));
$pdf->SetAutoPageBreak(FALSE);

// Add custom fonts
$pdf->AddFont('Tangerine_Bold', '', 'Lobster-Regular.php');
$pdf->AddFont('DancingScript', '', 'Dancing Script.php');
$pdf->AddFont('AbrilFatface-Regular', '', 'ROCKB.php');
$pdf->AddFont('SairaExtraCondensed', '', 'SairaExtraCondensedB.php');

foreach ($main_a as $key => $value) {
    $pdf->AddPage();

    // ==================== BACKGROUND DESIGN ====================
    // Top orange diagonal section
    $pdf->SetFillColor(255, 140, 0); // Orange


    // Blue top-right section
//    $pdf->SetFillColor(0, 123, 255); // Blue
//    $pdf->Rect(25, 0, 29, 30, 'F');

    // Bottom blue diagonal wave
//    $pdf->SetFillColor(0, 123, 255);

    // Bottom orange accent
//    $pdf->SetFillColor(255, 140, 0);


    // ==================== LOGO SECTION ====================



    // Insert photo (circular crop effect)
    $picture_file = $value->photo;
    if(!file_exists($picture_file) || empty($picture_file)){
        if(file_exists('images/1.jpg')){
            $pdf->Image('images/1.jpg', 8.5, 14, 18);
        }
    } else {
        $pdf->Image($picture_file, 8.5, 14, 18);
    }
    $pdf->Image('images/pdf/header.png', 0, 0,54);

    // Company logo (top right)
    if(file_exists('images/pdf/sonaroy.png')){
        $pdf->Image('images/pdf/sonaroy.png', 40, 3, 10);
    }
//    $pdf->SetTextColor(255, 255, 255);
//    $pdf->SetFont('Arial', 'BI', 5);
//    $pdf->SetXY(35, 5);
//    $pdf->Cell(20, 3, 'Sonaroy Songolshi', 0, 1, 'L');
//    $pdf->SetXY(35, 8);
//    $pdf->Cell(20, 3, 'College, Nilphamari', 0, 1, 'L');
    // ==================== NAME SECTION ====================
//    $nameParts = explode(' ', $value->admin_name);
//    $firstName = isset($nameParts[0]) ? strtoupper($nameParts[0]) : '';
//    $lastName = isset($nameParts[1]) ? strtoupper($nameParts[1]) : '';

    // First name in gray
//    $pdf->SetTextColor(85, 85, 85);
    // comola color
//    $pdf->SetTextColor(255, 140, 0);
    // Ash color
//    $pdf->SetTextColor(120, 120, 120);
    $pdf->SetTextColor(0, 125, 255);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetXY(0, 33);
    $pdf->Cell(2, 4, '', 0, 0, 'C');
    $pdf->Cell(52, 4, $value->admin_name, 0, 1, 'L');

    // Last name in orange
//    $pdf->SetTextColor(255, 140, 0);
//    $pdf->SetXY(0, 35);
//    $pdf->Cell(25, 4, $lastName, 1, 1, 'C');

    // Job Position
    $pdf->SetTextColor(120, 120, 120);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetXY(0, 37);
    $pdf->Cell(2, 3, '', 0, 0, 'C');
    $pdf->Cell(52, 3, $value->profetion, 0, 1, 'L');

    // ==================== INFORMATION SECTION ====================
    $startY = 45;
    $lineHeight = 4;
    $foundSize = 7.5;
    $fastColum = 18;
    $secondColum = 32;



    // index_no
    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetXY(4, $startY);
    $pdf->Cell($fastColum, $lineHeight, "Index No:", 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell($secondColum, $lineHeight, $value->index_no, 0, 1, 'L');
    // department
    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetFont('Arial', 'B', $foundSize);
//    $pdf->SetX(2);
    $pdf->SetX(4);
    $pdf->Cell($fastColum, $lineHeight, "Department:", 0, 0, 'L');
    $pdf->SetFont('Arial', '', $foundSize);
    $pdf->SetTextColor(85, 85, 85);
//    $pdf->Cell($secondColum, $lineHeight,  date('d M Y', strtotime($value->join_date)), 0, 1, 'L');
    $pdf->Cell($secondColum, $lineHeight,  $value->department, 0, 1, 'L');

    // Blood Group
    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetX(4);
    $pdf->Cell($fastColum, $lineHeight, "Blood Group:", 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetTextColor(255, 0, 0); // red
    $pdf->Cell($secondColum, $lineHeight, $value->blood_group, 0, 1, 'L');
    // national_id
    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetX(4);
    $pdf->Cell($fastColum, $lineHeight, "NID:", 0, 0, 'L');
    $pdf->SetFont('Arial', '', $foundSize);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell($secondColum, $lineHeight, $value->national_id, 0, 1, 'L');
//    // ID
//    $pdf->SetTextColor(0, 123, 255);
//    $pdf->SetFont('Arial', 'B', $foundSize);
//    $pdf->SetX(4);
//    $pdf->Cell(10, $lineHeight, "ID/Mail:", 0, 0, 'L');
//    $pdf->SetFont('Arial', '', $foundSize);
//    $pdf->SetTextColor(85, 85, 85);
//    $pdf->Cell(40, $lineHeight, $value->admin_email_address, 0, 1, 'L');
    // Phone
    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetFont('Arial', 'B', $foundSize);
    $pdf->SetX(4);
    $pdf->Cell($fastColum, $lineHeight, "Phone:", 0, 0, 'L');
    $pdf->SetFont('Arial', '', $foundSize);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell($secondColum, $lineHeight, $value->mobile_number, 0, 1, 'L');

    // ==================== BARCODE SECTION ====================
//    if(file_exists('images/barcode.png')){
//        $pdf->Image('images/barcode.png', 10, 58, 34, 6);
//    }
    $pdf->Image('images/pdf/footerF.jpg', 0, 75, 54 );
    $pdf->Image('images/pdf/principal.png', 35, 75, 14 );

    // ==================== WEBSITE ====================
    $pdf->SetTextColor(85, 85, 85);
    $pdf->SetFont('Arial', '', $foundSize);
    $pdf->SetXY(0, 70);
    $pdf->Cell(4, 3, '', 0, 0, 'C');
    $pdf->Cell(52, 3, $academy_info->site_url, 0, 0, 'L');


}

$pdf->Output();
?>