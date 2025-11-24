<?php


$pdf = new FPDF();
$pdf->FPDFA('P', 'mm', 'A4');
$pdf->Open();
$pdf->AddPage();

// on sup les 2 cm en bas
//$pdf->SetAutoPagebreak(False);
//$pdf->SetMargins(0,0,0);
$months = array();
for ($i = 0; $i < 12; $i++) {
    $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
    $months[date('n', $timestamp)] = date('F', $timestamp);
}

$nb_page = 1;

// 	$nb_page = $row_client[0];

$num_page = 1; $limit_inf = 0; $limit_sup = 18;
// 	While ($num_page <= $nb_page)
// 	{
//$pdf->AddPage();

// logo : 80 de largeur et 55 de hauteur
$pdf->Image('images/logod.jpg', 10, 15, 60, 55);

// n° page en haute à droite
//$pdf->SetXY( 120, 5 ); $pdf->SetFont( 'Arial', 'B', 12 ); $pdf->Cell( 160, 8, $num_page . '/' . $nb_page, 0, 0, 'C');

// n° facture, date echeance et reglement et obs

$pdf->SetXY( 5, 7 ); $pdf->SetFont('Arial','',12);$pdf->Cell( 200, 7, $academy_info->s_name, 0, 0, 'C');

$champ_date = date_create($months[1]); $annee = date_format($champ_date, 'Y');
$num_fact = "INVOICE : ".$show_date;// . $annee .'-' . str_pad($months[1], 4, '0', STR_PAD_LEFT);
$pdf->SetLineWidth(0.1); $pdf->SetFillColor(192); $pdf->Rect(120, 15, 85, 8, "DF");
$pdf->SetXY( 120, 15 ); $pdf->SetFont( 'Arial', 'B', 12 ); $pdf->Cell( 85, 8, $num_fact, 0, 0, 'C');

// nom du fichier final
$nom_file = "invoice_" . $annee .'-' . str_pad($months[1], 4, '0', STR_PAD_LEFT) . ".pdf";

// date facture

// si derniere page alors afficher total
if ($num_page == $nb_page)
{
    // les totaux, on n'affiche que le HT. le cadre après les lignes, demarre a 213
    $pdf->SetLineWidth(0.1); $pdf->SetFillColor(192); $pdf->Rect(5, 213, 95, 8, "DF");
    // HT, la TVA et TTC sont calculés après
    // en bas à droite
//    $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 227 ); $pdf->Cell( 24, 6, number_format(1, 2, ',', ' '), 0, 0, 'R');

    // trait vertical cadre totaux, 8 de hauteur -> 213 + 8 = 221
    $pdf->Rect(5, 213, 200, 8, "D"); $pdf->Line(100, 213, 100, 221);$pdf->Line(135, 213, 135, 221); $pdf->Line(170, 213, 170, 221);

    // reglement
//    $pdf->SetXY( 5, 225 ); $pdf->Cell( 38, 5, "Mode of Payment :", 0, 0, 'R'); $pdf->Cell( 55, 5, $months[6], 0, 0, 'L');
    // echeance
    $champ_date = date_create($months[7]); $date_ech = date_format($champ_date, 'd/m/Y');
    $pdf->SetXY( 5, 230 ); $pdf->Cell( 38, 5, "Date :", 0, 0, 'R'); $pdf->Cell( 38, 5, $show_date_1, 0, 0, 'L');
}
// observations
$pdf->SetFont( 'Arial', "BU", 10 ); $pdf->SetXY( 5, 75 ) ; $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");
$pdf->SetFont( 'Arial', "", 10 ); $pdf->SetXY( 5, 78 ) ; $pdf->MultiCell(190, 4, '', 0, "L");
// adr fact du client

$pdf->SetFont('Arial','B',11); $x = 110 ; $y = 50;
$pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, '' . $this->lang->line('student_id') . ':   '.$stu_info->id, 0, 0, ''); $y += 4;
if ($stu_info->name) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, 'Name:           '.$stu_info->name, 0, 0, ''); $y += 4;}
if ($stu_info->class) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $this->lang->line('class') . ':           '.$stu_info->class, 0, 0, ''); $y += 4;}
if ($stu_info->section) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, '' . $this->lang->line('section') . ':        '.$stu_info->section, 0, 0, ''); $y += 4;}
if ($stu_info->group_r) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, '' . $this->lang->line('group') . ':          '.$stu_info->group_r , 0, 0, ''); $y += 4;}
if ($stu_info->year) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $this->lang->line('year') . ':             ' . $stu_info->year, 0, 0, '');}
// ***********************
// le cadre des articles
// ***********************
// cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
$pdf->SetLineWidth(0.1); $pdf->Rect(5, 95, 200, 118, "D");
// cadre titre des colonnes
$pdf->Line(5, 105, 205, 105);
// les traits verticaux colonnes
$pdf->Line(100, 95, 100, 213); $pdf->Line(135, 95, 135, 213);
//$pdf->Line(176, 95, 176, 213);
$pdf->Line(170, 95, 170, 213);
// titre colonne
$pdf->SetXY( 1, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 95, 8, "Month", 0, 0, 'C');
$pdf->SetXY( 100, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 30, 8, "Qty", 0, 0, 'C');
$pdf->SetXY( 135, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 30, 8, "Amount", 0, 0, 'C');
//$pdf->SetXY( 177, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 10, 8, "Total", 0, 0, 'C');
$pdf->SetXY( 170, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 30, 8, "Sub Total", 0, 0, 'C');
// les articles
$y += 28;
$total_amount = $total_qty = 0;
$receite_no =  '';
foreach ($baton_invoice as $data)
{
    // libelle
    $pdf->SetXY( 7, $y+9 ); $pdf->Cell( 100, 5, $data->month_b.', '.$data->year_b, 0, 0, 'L');
    // qte
    $pdf->SetXY( 100, $y+9 ); $pdf->Cell( 30, 5, 1, 0, 0, 'C');
    // PU
    $total_qty += 1;
//    $nombre_format_francais = number_format($data->reg_id, 2, ',', ' ');
//    $pdf->SetXY( 158, $y+9 ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
    // Taux
    $nombre_format_francais = number_format($data->total_amnt, 2, '.', ' ');
    $pdf->SetXY( 135, $y+9 ); $pdf->Cell( 30, 5, $nombre_format_francais, 0, 0, 'R');
    // total
    $nombre_format_francais = number_format($data->total_amnt, 2, '.', ' ');
    $pdf->SetXY( 170, $y+9 ); $pdf->Cell( 30, 5, $nombre_format_francais, 0, 0, 'R');

    $pdf->Line(5, $y+14, 205, $y+14);
    $total_amount += $nombre_format_francais;
    $receite_no .= $data->receite_no.', ';
    $y += 8;
}

$champ_date = date_create($months[1]);
$date_fact = date_format($champ_date, 'd/m/Y');
$pdf->SetFont('Arial','',11); $pdf->SetXY( 110, 30 );$pdf->Cell( 85, 8, "Receipt No.: " . substr(trim($receite_no), 0, -1), 0, 0, '');
if ($num_page == $nb_page)
{
    // le detail des totaux, demarre a 221 après le cadre des totaux
//    $pdf->SetLineWidth(0.1); $pdf->Rect(130, 221, 75, 24, "D");
    // les traits verticaux
//    $pdf->Line(147, 221, 147, 245); $pdf->Line(164, 221, 164, 245); $pdf->Line(181, 221, 181, 245);
//    // les traits horizontaux pas de 6 et demarre a 221
//    $pdf->Line(130, 227, 205, 227); $pdf->Line(130, 233, 205, 233); $pdf->Line(130, 239, 205, 239);
//    // les titres
//    $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 221 ); $pdf->Cell( 24, 6, "TOTAL", 0, 0, 'C');
//    $pdf->SetFont('Arial','',8);
//    $pdf->SetXY( 105, 221 ); $pdf->Cell( 25, 6, "Taux TVA", 0, 0, 'R');
//    $pdf->SetXY( 105, 227 ); $pdf->Cell( 25, 6, "Total HT", 0, 0, 'R');
//    $pdf->SetXY( 105, 233 ); $pdf->Cell( 25, 6, "Total TVA", 0, 0, 'R');
//    $pdf->SetXY( 105, 239 ); $pdf->Cell( 25, 6, "Total TTC", 0, 0, 'R');

    // les taux de tva et HT et TTC
    $col_ht = 0; $col_tva = 0; $col_ttc = 0;
    $taux = 0; $tot_tva = 0; $tot_ttc = 0;
    $x = 130;



    $nombre_format_francais = $total_qty;
    $pdf->SetFont('Arial','',10); $pdf->SetXY( 100, 213 ); $pdf->Cell( 35, 8, $nombre_format_francais, 0, 0, 'C');
    $nombre_format_francais = $total_amount ;
    $pdf->SetFont('Arial','',10); $pdf->SetXY( 135, 213 ); $pdf->Cell( 35, 8, $nombre_format_francais, 0, 0, 'C');

    $nombre_format_francais = 'TOTAL';
    $pdf->SetFont('Arial','B',12); $pdf->SetXY( 5, 213 ); $pdf->Cell( 90, 8, $nombre_format_francais, 0, 0, 'C');
    $nombre_format_francais = $total_amount ;
    $pdf->SetFont('Arial','',10); $pdf->SetXY( 170, 213 ); $pdf->Cell( 35, 8, $nombre_format_francais, 0, 0, 'C');
//    $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 239 ); $pdf->Cell( 24, 6, number_format($tot_ttc, 2, ',', ' '), 0, 0, 'R');
//    $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 233 ); $pdf->Cell( 24, 6, number_format($tot_tva, 2, ',', ' '), 0, 0, 'R');
}
// **************************
// pied de page
// **************************
$pdf->SetLineWidth(0.1); $pdf->Rect(5, 260, 200, 7, "D");
$pdf->SetXY( 5, 260 ); $pdf->SetFont('Arial','',7);
$pdf->Cell( 200, 7, "THIS IS SYSTEM GENERATED COPY. NO MANUAL SIGNATURE IS REQUIRED.", 0, 0, 'C');

$y1 = 270;
//Positionnement en bas et tout centrer
//$pdf->SetXY( 1, $y1 ); $pdf->SetFont('Arial','B',10);
//$pdf->Cell( 200, 5, "BANK REF : FR76 xxx - BIC : xxxx", 0, 0, 'C');
//
//$pdf->SetFont('Arial','',10);

//$pdf->SetXY( 1, $y1 + 4 );
//$pdf->Cell( 200, 5, "NOM SOCIETE", 0, 0, 'C');

//$pdf->SetXY( 1, $y1 + 8 );
//$pdf->Cell( 200, 5, "ADRESSE 1 + CP + VILLE", 0, 0, 'C');
//
//$pdf->SetXY( 1, $y1 + 12 );
//$pdf->Cell( 200, 5, "Tel + Mail + SIRET", 0, 0, 'C');
//
//$pdf->SetXY( 1, $y1 + 16 );
//$pdf->Cell( 200, 5, "Adresse web", 0, 0, 'C');

// par page de 18 lignes
$num_page++;
$limit_inf += 18; $limit_sup += 18;
//$pdf->Output("I", $nom_file);
$pdf->Output();
?>