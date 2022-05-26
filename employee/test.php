<?php
require_once '../includes/connection.php';

//include library
require_once ('library/tcpdf.php');

//make TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//remove default header and footer
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

// set font
$pdf->SetFont('FreeSerif', '', 10,);

//add page
$pdf -> AddPage();
//add content
$content = '';
$content .= '
<style>
td,tr{
  text-align: center;
}
</style>
<table border="1">
    <tr>
      <th>Пәндер аты / Course / Наименование дисциплины </th>
      <th>Кредит саны / Credit / Количество кредитов</th>
      <th>Пайызбен / in persent / в процентах</th>
      <th>Балмен / in points / в баллах </th>
      <th>Балл қосындысы / Total points / Суммарный балл</th>
    </tr>';
    $content .= fetch_data();
    $content .= '</table>';

$pdf -> writeHTML($content, true, true, true, true, '');
// reset pointer to the last page
$pdf->lastPage();

//output
$pdf -> Output();
?>
