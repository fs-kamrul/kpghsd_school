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

    // Insert photo (circular crop effect)
//    $picture_file = $value->photo;
//    if(!file_exists($picture_file) || empty($picture_file)){
//        if(file_exists('images/1.jpg')){
//            $pdf->Image('images/1.jpg', 8.5, 14, 18, 18);
//        }
//    } else {
//        $pdf->Image($picture_file, 8.5, 14, 18, 18);
//    }
//    $pdf->Image('images/pdf/header.png', 0, 0,54);

    // Company logo (top right)
    if(file_exists('images/pdf/pdf_header2.png')){
        $pdf->Image('images/pdf/pdf_header2.png', 3, 5, 50);
    }
    $pdf->Image('images/pdf/footerB.jpg', 0, 57, 54 );
    $pdf->Image('images/pdf/backCondition.png', 0, 20, 54 );
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
//    $pdf->SetTextColor(0, 125, 255);
//    $pdf->SetFont('Arial', 'B', 9);
//    $pdf->SetXY(0, 33);
//    $pdf->Cell(2, 4, '', 0, 0, 'C');
//    $pdf->Cell(52, 4, $value->admin_name, 0, 1, 'L');

    // Last name in orange
//    $pdf->SetTextColor(255, 140, 0);
//    $pdf->SetXY(0, 35);
//    $pdf->Cell(25, 4, $lastName, 1, 1, 'C');

    // Job Position
//    $pdf->SetTextColor(120, 120, 120);
//    $pdf->SetFont('Arial', '', 8);
//    $pdf->SetXY(0, 37);
//    $pdf->Cell(2, 3, '', 0, 0, 'C');
//    $pdf->Cell(52, 3, $value->profetion, 0, 1, 'L');

    // ==================== INFORMATION SECTION ====================
    $startY = 43;
    $lineHeight = 3.5;


    // Join Date
//    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetTextColor(0, 0, 0);
//    $pdf->SetFont('Arial', 'B', 7);
//    $pdf->SetX(2);
    $pdf->SetXY(2, $startY);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(50, $lineHeight,  'Contact Us', 0, 1, 'C');

    //School Code
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetX(2);
//    $pdf->Cell(30, $lineHeight, "School Code:", 0, 0, 'R');
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell(50, $lineHeight,  "EIIN: " . $academy_info->s_code, 0, 1, 'C');

    //Phone
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetX(2);
//    $pdf->Cell(22, $lineHeight, "Phone:", 0, 0, 'R');
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell(50, $lineHeight,  'Phone: '.$academy_info->phone_number, 0, 1, 'C');

    // email
//    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetX(2);
//    $pdf->Cell(17, $lineHeight, "Email:", 1, 0, 'R');
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell(50, $lineHeight, "Email: " . $academy_info->email, 0, 1, 'C');

    // s_address
//    $pdf->SetTextColor(0, 123, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetX(2);
//    $pdf->Cell(17, $lineHeight, "Email:", 1, 0, 'R');
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetTextColor(85, 85, 85);
//    $pdf->Cell(50, $lineHeight, $academy_info->s_address, 1, 1, 'C');
    $pdf->MultiCell(50, $lineHeight, $academy_info->s_address, 0, 'C');

    // ==================== BARCODE SECTION ====================
//    if(file_exists('images/barcode.png')){
//        $pdf->Image('images/barcode.png', 10, 58, 34, 6);
//    }

    // ==================== WEBSITE ====================
//    $pdf->SetTextColor(85, 85, 85);
//    $pdf->SetFont('Arial', '', 7);
//    $pdf->SetXY(0, 70);
//    $pdf->Cell(2, 3, '', 0, 0, 'C');
//    $pdf->Cell(52, 3, $academy_info->site_url, 0, 0, 'L');


}

$pdf->Output();
?>