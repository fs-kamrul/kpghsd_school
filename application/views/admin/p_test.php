<?php
$this->load->library('fpdf');
$pdf=new FPDF('L','mm','A4');
ob_end_clean();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);
$pdf->Cell(250, 8, 'KHANSAMA PILOT GIRLS HIGH SCHOOL', 0, 1, 'C');
$pdf->Output();