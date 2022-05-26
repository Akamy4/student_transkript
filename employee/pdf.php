<?php
require_once '../includes/connection.php';

//include library
require_once ('library/tcpdf.php');

//make TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//remove default header and footer
$pdf -> SetMargins('5', '15', PDF_MARGIN_RIGHT);
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

// set font
$pdf->SetFont('FreeSerif', '', 10);

//add page
// $pdf -> setPrintHeader(false);
// $pdf -> setPrintFooter(false);
$pdf -> AddPage();

//add content

//using HTML
$html = '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    td,tr{
      text-align: center;
    }
    </style>
  </head>
    <body font-size: 14px;>
        <table>
          <tr>
            <td>
            ХАЛЫҚАРАЛЫҚ<br>
            БИЗНЕС УНИВЕРСИТЕТІ<br>
            Қазақстан Республикасы<br>
            050010, Алматы қ.,Абай даңғылы, 8А<br>
            тел. +7 (727) 2-59-80-20, 2-59-80-51<br>
            факс: +7 (727) 2-59-63-20<br>
            E-mail: uib@uib.kz; www.uib.kz<br>
            </td>
            <td>
            <img src="../image/logo.png" width="100">
            </td>
            <td>
            УНИВЕРСИТЕТ<br>
            МЕЖДУНАРОДНОГО БИЗНЕСА<br>
            Республика Казахстан<br>
            0050010, г.Алматы,проспект Абая, 8А<br>
            тел. +7 (727) 2-59-80-20, 2-59-80-51<br>
            факс: +7 (727) 2-59-63-20<br>
            E-mail: uib@uib.kz; www.uib.kz<br>
            </td>
          </tr>
        </table>
  </body>
</html>';

//output the HTML file_get_contents
$pdf -> writeHTML($html, true, false, true, false, '');

//using HTML
$html = '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    td,tr{
      text-align: center;
    }
    </style>
  </head>
    <body font-size: 14px;>
        <table>
          <tr>
            <td>
            <b>Транскрипт /The transcript /Транскрипт</b><br>
            </td>
          </tr>
        </table>
  </body>
</html>';

//output the HTML file_get_contents
$pdf -> writeHTML($html, true, false, true, false, '');

//remove default header and footer
$pdf -> SetMargins('5', '6', '3');
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

// set font
$pdf->SetFont('FreeSerif', '', 11);

//add page
// $pdf -> AddPage();
//php
$id_Student = $_GET['id_Student'];
$query = "SELECT * FROM students, languages, specialitys, levels
WHERE students.id_language = languages.id_language
AND students.id_speciality = specialitys.id_speciality
AND students.id_level = levels.id_level
AND id_Student = '$id_Student'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
while($student = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  $id_Student = $student['id_Student'];
  $Student_name = $student['Student_name'];
  $Student_surname = $student['Student_surname'];
  $Speciality_name = $student['Speciality_name'];
  $language_name = $student['language_name'];
  $level_name = $student['level_name'];
  $Student_Course = $student['Student_Course'];
  $Student_number = $student['Student_number'];
  $Birth = $student['Birth'];

}
$txt = "
Аты жөні /Name /Ф.И.О. <b> $Student_name $Student_surname</b><br>
Факультеті /Faculty /Факультет <b>Факультет Базового Высшего Образования</b><br>
Мамандығы /Specialty /Специальность <b>$Speciality_name</b><br>
Түскен жылы /Year /Год поступления <b>2019</b><br>
Оқу тілі /Language /Язык <b>$language_name</b><br>
Оку түрі /The form of education /Форма обучения <b>очное</b><br>
";


// output the HTML content
// $pdf->writeHTML($htmlcontent, true, 0, true, 0);
$pdf -> writeHTML($txt, true, false, true, false, '');
// set font
$pdf->SetFont('FreeSerif', '', 10);
  require_once '../includes/connection.php';
  $id_Student = $_GET['id_Student'];
  $query = "SELECT *, (academic_year.amount_of_credits * academic_year.digital_equivalent) AS total
  FROM academic_year, subjects, students
  WHERE academic_year.id_Subject=subjects.id_Subject AND academic_year.id_Student=students.id_Student
  AND academic_year.id_Student = students.id_Student AND students.id_Student = '$id_Student'
  ORDER BY academic_year.academic_year, academic_year.Semestr";
  $transcript_query = mysqli_query($connection, $query);
  while($transcript = mysqli_fetch_array($transcript_query)){
    if($transcript['Semestr']==1){
      $sem1[] = [
        "Subject_name" => $transcript['Subject_name'],
        "academic_year" => $transcript['academic_year'],
        "Semestr" => $transcript['Semestr'],
        "VSK1" => $transcript['VSK1'],
        "VSK2" => $transcript['VSK2'],
        "exam" => $transcript['exam'],
        "amount_of_credits" => $transcript['amount_of_credits'],
        "digital_equivalent" => $transcript['digital_equivalent'],
        "total" => $transcript['total']
      ];
    }
    if($transcript['Semestr']==2){
      $sem2[] = [
        "Subject_name" => $transcript['Subject_name'],
        "academic_year" => $transcript['academic_year'],
        "Semestr" => $transcript['Semestr'],
        "VSK1" => $transcript['VSK1'],
        "VSK2" => $transcript['VSK2'],
        "exam" => $transcript['exam'],
        "amount_of_credits" => $transcript['amount_of_credits'],
        "digital_equivalent" => $transcript['digital_equivalent'],
        "total" => $transcript['total']
      ];
    }
    if($transcript['Semestr']==3){
      $sem3[] = [
        "Subject_name" => $transcript['Subject_name'],
        "academic_year" => $transcript['academic_year'],
        "Semestr" => $transcript['Semestr'],
        "VSK1" => $transcript['VSK1'],
        "VSK2" => $transcript['VSK2'],
        "exam" => $transcript['exam'],
        "amount_of_credits" => $transcript['amount_of_credits'],
        "digital_equivalent" => $transcript['digital_equivalent'],
        "total" => $transcript['total']
      ];
    }
    if($transcript['Semestr']==4){
      $sem4[] = [
        "Subject_name" => $transcript['Subject_name'],
        "academic_year" => $transcript['academic_year'],
        "Semestr" => $transcript['Semestr'],
        "VSK1" => $transcript['VSK1'],
        "VSK2" => $transcript['VSK2'],
        "exam" => $transcript['exam'],
        "amount_of_credits" => $transcript['amount_of_credits'],
        "digital_equivalent" => $transcript['digital_equivalent'],
        "total" => $transcript['total']
      ];
    }
  }

//table
$content = '';
$content .= '
<style>
td, th{
  border:1px solid #000;
  text-align: center;
}
</style>
<table>
    <tr>
      <th width = "40%">Пәндер аты / Course / Наименование дисциплины </th>
      <th width = "15%">Кредит саны / Credit / Количество кредитов</th>
      <th width = "15%">Пайызбен / in persent / в процентах</th>
      <th width = "15%">Балмен / in points / в баллах </th>
      <th width = "15%">Балл қосындысы / Total points / Суммарный балл</th>
    </tr>
    <tr>
      <td text-align: center; colspan="6";><b>1 семестр/ 1 semester/ 1 семестр</b></td>
    </tr>';

//loop
foreach ($sem1 as $value) {
  $content .= "
  <tr>
    <td>".$value['Subject_name']."</td>
    <td>".$value['amount_of_credits']."</td>
    <td>".$value['exam']."</td>
    <td>".$value['digital_equivalent']."</td>
    <td>".$value['total']."</td>
  </tr>
  ";
}
$sum1_credit=0;
$sum_total=0;
foreach ($sem1 as $value) {
  $sum_total += $value['total'];
  $sum1_credit += $value['amount_of_credits'];
}
$gpa_sem1 = round ($sum_total/$sum1_credit, 2);
  $content .='
  <tr>
    <td><b>GPA семестровый '.$gpa_sem1.'</b></td>
    <td><b>'.$sum1_credit.'</b></td>
    <td></td>
    <td></td>
    <td><b>'.$sum_total.'</b></td>
  </tr>
  <tr>
    <td text-align: center; colspan="6";><b>2 семестр/ 2 semester/ 2 семестр</b></td>
  </tr>';
foreach ($sem2 as $value) {
  $content .= "
  <tr>
    <td>".$value['Subject_name']."</td>
    <td>".$value['amount_of_credits']."</td>
    <td>".$value['exam']."</td>
    <td>".$value['digital_equivalent']."</td>
    <td>".$value['total']."</td>
  </tr>
  ";
}
$sum2_credit=0;
$sum_total=0;
foreach ($sem2 as $value) {
  $sum_total += $value['total'];
  $sum2_credit += $value['amount_of_credits'];
}
$gpa_sem2 = round ($sum_total/$sum2_credit, 2);
$content .='
<tr>
  <td><b>GPA семестровый '.$gpa_sem2.'</b></td>
  <td><b>'.$sum2_credit.'</b></td>
  <td></td>
  <td></td>
  <td><b>'.$sum_total.'</b></td>
</tr>';
$gpa_year=round(($gpa_sem1+$gpa_sem2)/2,2);
$credit_year= $sum1_credit+$sum2_credit;
$sum=0;
foreach ($sem1 as $value) {
  $sum += $value['total'];
}
foreach ($sem2 as $value) {
  $sum += $value['total'];
}
$content .='
<tr>
  <td><b>GPA годовой '.$gpa_year.'</b></td>
  <td><b>'.$credit_year.'</b></td>
  <td></td>
  <td></td>
  <td><b>'.$sum.'</b></td>
</tr>
<tr>
  <td text-align: center; colspan="6";><b>3 семестр/ 3 semester/ 3 семестр</b></td>
</tr>';

foreach ($sem3 as $value) {
  $content .= "
  <tr>
    <td>".$value['Subject_name']."</td>
    <td>".$value['amount_of_credits']."</td>
    <td>".$value['exam']."</td>
    <td>".$value['digital_equivalent']."</td>
    <td>".$value['total']."</td>
  </tr>
  ";
}
$sum3_credit=0;
$sum_total=0;
foreach ($sem3 as $value) {
  $sum_total += $value['total'];
  $sum3_credit += $value['amount_of_credits'];
}
$gpa_sem3 = round ($sum_total/$sum3_credit, 2);
$content .='
<tr>
  <td><b>GPA семестровый '.$gpa_sem3.'</b></td>
  <td><b>'.$sum3_credit.'</b></td>
  <td></td>
  <td></td>
  <td><b>'.$sum_total.'</b></td>
</tr>
<tr>
  <td text-align: center; colspan="6";><b>4 семестр/ 4 semester/ 4 семестр</b></td>
</tr>';
foreach ($sem4 as $value) {
  $content .= "
  <tr>
    <td>".$value['Subject_name']."</td>
    <td>".$value['amount_of_credits']."</td>
    <td>".$value['exam']."</td>
    <td>".$value['digital_equivalent']."</td>
    <td>".$value['total']."</td>
  </tr>
  ";
}
$sum4_credit=0;
$sum_total=0;
foreach ($sem4 as $value) {
  $sum_total += $value['total'];
  $sum4_credit += $value['amount_of_credits'];
}
$gpa_sem4 = round ($sum_total/$sum4_credit, 2);
$content .='
<tr>
  <td><b>GPA семестровый '.$gpa_sem4.'</b></td>
  <td><b>'.$sum4_credit.'</b></td>
  <td></td>
  <td></td>
  <td><b>'.$sum_total.'</b></td>
</tr>';
$gpa_year = 0;
$gpa_year=round(($gpa_sem3+$gpa_sem4)/2,2);
$credit_year= $sum1_credit+$sum2_credit;
$sum=0;
foreach ($sem3 as $value) {
  $sum += $value['total'];
}
foreach ($sem4 as $value) {
  $sum += $value['total'];
}
$content .='
<tr>
  <td><b>GPA годовой '.$gpa_year.'</b></td>
  <td><b>'.$credit_year.'</b></td>
  <td></td>
  <td></td>
  <td><b>'.$sum.'</b></td>
</tr>';
$content .="
</table> <br>" ;

// output the HTML content
// $pdf->writeHTMLCell(192,0,9,'',$content,0);
$pdf -> writeHTML($content,  true, false, true, false, '');
$pdf -> SetMargins( PDF_MARGIN_LEFT,  PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf -> SetMargins('5', '15', PDF_MARGIN_RIGHT);
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

$txt = " <br><br><br><br>
<span>Ректор:      ____________________ Махметова А.М</span><br><br>
<span>Декан:      ____________________ Нургалиева К.О.</span><br><br>
<span>Директор ДАВ:      ____________________ Токина А.А.</span><br>
";


// output the HTML content
// $pdf->writeHTML($htmlcontent, true, 0, true, 0);
$pdf -> writeHTML($txt, true, false, true, false, '');

date_default_timezone_set('Etc/GMT-6');
$tDate=date('d.m.y');
$pdf->Cell(0, 10, 'Дата выдачи : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');

$txt = '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    td,tr{
      text-align: center;
    }
    </style>
  </head>
    <body font-size: 14px;>
    <br><br>
        <table>
          <tr>
            <td></td>
            <td>
            University of International Business LLP
            050010 Republic of Kazakhstan, Almaty, Abay ave.8A
            Tel: +7(727) 259-80-20, 259-80-16
            Fax: +7(727) 259-63-20
            www.uib.kz, E-mail: uib@uib.kz
            </td>
            <td></td>
          </tr>
        </table>
  </body>
</html>';
$pdf -> writeHTML($txt, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//output
$pdf -> Output('transcript.pdf','I');
?>
