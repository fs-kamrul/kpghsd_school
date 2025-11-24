<?php
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetTitle('Invoice Copy');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$copies = ['Student Copy', 'School Copy'];

foreach ($copies as $copyType) {

    $html = '
    <style>
        th {background-color: #f2f2f2;}
        td, th {border: 1px solid #000; padding: 6px;}
    </style>
    
    <h2 align="center">'.$academy_info->s_name.'</h2>
    <p align="center">'.$academy_info->s_address.'</p>
    <h3 align="center">'.$copyType.'</h3>
    <hr>
    
    <table cellpadding="5">
        <tr>
            <td><strong>Student Name:</strong> '.$stu_info->name.'</td>
            <td><strong>Roll:</strong> '.$stu_info->roll.'</td>
        </tr>
        <tr>
            <td><strong>Class:</strong> '.$stu_info->class.'</td>
            <td><strong>Group:</strong> '.$stu_info->group_r.'</td>
        </tr>
        <tr>
            <td><strong>Section:</strong> '.$stu_info->section.'</td>
            <td><strong>Invoice Month:</strong> '.$show_date.'</td>
        </tr>
        <tr>
            <td><strong>Invoice ID:</strong> '.$baton_invoice_info.'</td>
            <td><strong>Invoice Date:</strong> '.$show_date_1.'</td>
        </tr>
    </table>
    <br>
    <table cellpadding="5">
        <tr>
            <th>Particular</th>
            <th>Amount (৳)</th>
        </tr>';

    $total = 0;
    foreach ($baton_invoice as $inv) {
        if ($inv->g_total > 0) {
            $html .= '<tr>
                <td>'.$inv->month_b.' '.$inv->year_b.' (Invoice ID: '.$inv->id.')</td>
                <td>'.$inv->g_total.'</td>
            </tr>';
            $total += $inv->g_total;
        }
    }

    $html .= '
        <tr><td><strong>Total</strong></td><td><strong>'.$total.'</strong></td></tr>
        <tr><td><strong>Paid</strong></td><td><strong>'.$invoice_info["pay_amount"].'</strong></td></tr>
        <tr><td><strong>Due</strong></td><td><strong>'.$invoice_info["due"].'</strong></td></tr>
    </table>
    <br><br><hr><br>';

    $pdf->writeHTML($html, true, false, true, false, '');
}

$pdf->Output('invoice_'.$invoice_info["id"].'.pdf', 'I');
