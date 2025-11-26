<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdf = new FPDF('P', 'mm', array(54, 86));
$pdf->SetAutoPageBreak(FALSE);

// Add custom fonts
$pdf->AddFont('Tangerine_Bold', '', 'Lobster-Regular.php');
$pdf->AddFont('DancingScript', '', 'Dancing Script.php');
$pdf->AddFont('AbrilFatface-Regular', '', 'ROCKB.php');
$pdf->AddFont('SairaExtraCondensed', '', 'SairaExtraCondensedB.php');

foreach ($main_a as $key => $value) {
    $pdf->AddPage();

    // ==================== HEADER SECTION ====================
    // Gradient background header (Yellow to white)
    $pdf->SetFillColor(255, 220, 0); // Yellow
    $pdf->Rect(0, 0, 54, 22, 'F');

    // Top decorative strip - Red
    $pdf->SetFillColor(220, 53, 69);
    $pdf->Rect(0, 0, 54, 2, 'F');

    // Government emblems positions
//    $pdf->Image('images/govt_emblem_left.png', 3, 3, 8, 8); // Left emblem
    $pdf->Image('images/pdf/logo.png', 3, 3, 10, 10); // Left emblem
//    $pdf->Image('images/bd_flag.png', 43, 3, 8, 8); // Right BD flag

    // Header text
    $pdf->SetTextColor(220, 53, 69); // Red
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetXY(0, 4);
    $pdf->Cell(54, 3, "Sonaroy Songolshi", 0, 1, 'C');
    $pdf->SetX(0);
    $pdf->Cell(54, 3, "College, Nilphamari", 0, 1, 'C');

    // College name
    $pdf->SetTextColor(41, 128, 185); // Blue
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetXY(0, 13);
    $pdf->Cell(54, 4, "Sonaroy Songolshi College", 0, 1, 'C');

    // ==================== PHOTO SECTION ====================
    // White background for main content
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Rect(0, 22, 54, 64, 'F');

    // Photo frame with border
    $pdf->SetDrawColor(41, 128, 185); // Blue border
    $pdf->SetLineWidth(0.5);
    $pdf->Rect(16, 24, 22, 26, 'D');

    // Insert photo
    $picture_file = $value->photo;
    if(!file_exists($picture_file) || empty($picture_file)){
        $pdf->Image('images/1.jpg', 16.5, 24.5, 21, 25);
    } else {
        $pdf->Image($picture_file, 16.5, 24.5, 21, 25);
    }

    // ==================== NAME BANNER ====================
    $pdf->SetFillColor(41, 128, 185); // Blue
    $pdf->Rect(2, 52, 50, 6, 'F');

    $pdf->SetTextColor(255, 255, 255); // White
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetXY(2, 53.5);
    $pdf->Cell(50, 4, strtoupper($value->admin_name), 0, 1, 'C');

    // ==================== INFORMATION SECTION ====================
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 7);

    $startY = 60;
    $lineHeight = 3.5;

    // Name
    $pdf->SetXY(4, $startY);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "Name", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, $value->admin_name, 0, 1, 'L');

    // Designation
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "Designation", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, "Lecturer in Accounting", 0, 1, 'L');

    // ID
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "ID", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetTextColor(220, 53, 69); // Red for ID
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, $value->admin_email_address, 0, 1, 'L');
    $pdf->SetTextColor(0, 0, 0);

    // BCS
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "BCS", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, "34th Batch", 0, 1, 'L');

    // Department
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "Department", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, "Accounting", 0, 1, 'L');

    // NID
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "NID", 0, 0, 'L');
    $pdf->SetFont('Arial', '', 6.5);
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, "1986761057971650", 0, 1, 'L');

    // Blood Group
    $pdf->SetX(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(18, $lineHeight, "Blood Group", 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetTextColor(220, 53, 69); // Red
    $pdf->Cell(2, $lineHeight, ":", 0, 0, 'C');
    $pdf->Cell(28, $lineHeight, $value->blood_group, 0, 1, 'L');

    // ==================== FOOTER SECTION ====================
    // QR Code
//    $pdf->Image('images/qr.jpg', 39, 67, 10, 10);

    // Signature line
//    $pdf->SetDrawColor(200, 200, 200);
//    $pdf->Line(5, 77, 20, 77);
//    $pdf->SetTextColor(100, 100, 100);
//    $pdf->SetFont('Arial', 'I', 5);
//    $pdf->SetXY(3, 77.5);
//    $pdf->Cell(17, 2, "Principal's Signature", 0, 0, 'C');

    // Bottom banner with website
    $pdf->SetFillColor(41, 128, 185);
    $pdf->Rect(0, 80, 54, 6, 'F');

    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(0, 82);
    $pdf->Cell(54, 3, "www.ssdcnil.edu.bd", 0, 0, 'C');

    // Logo
    $pdf->Image('images/logod.png', 4, 81, 4, 4);
}

$pdf->Output();
?>