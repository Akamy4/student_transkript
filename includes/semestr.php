<?php
  require_once 'connection.php';
  $month = date('m');
  $student_id =  $_SESSION['student']['id_Student'];
  // var_dump($student_id);
  if($month >= 9 and $month <=12){
    $semestr_query = mysqli_query($connection, "SELECT *, ROUND (academic_year.VSK1 * 0.3 + academic_year.VSK2 * 0.3 + academic_year.exam * 0.4) AS total
      FROM academic_year, teachers, students, subjects
      WHERE academic_year.id_Teacher = teachers.id_Teacher
      AND subjects.id_Subject = academic_year.id_Subject AND academic_year.Semestr % 2 = 1 AND academic_year.academic_year = students.Student_Course
      AND academic_year.id_Student = students.id_Student AND students.id_Student = '$student_id'");
  } else if ($month >= 1 and $month <=6){
  $semestr_query = mysqli_query($connection, "SELECT *, ROUND (academic_year.VSK1 * 0.3 + academic_year.VSK2 * 0.3 + academic_year.exam * 0.4) AS total
    FROM academic_year, teachers, students, subjects
    WHERE academic_year.id_Teacher = teachers.id_Teacher AND academic_year.id_Student=students.id_Student
    AND subjects.id_Subject = academic_year.id_Subject AND academic_year.Semestr % 2 = 0 AND academic_year.academic_year = students.Student_Course
    AND academic_year.id_Student = students.id_Student AND students.id_Student = '$student_id'");
  }
  while($semestr = mysqli_fetch_array($semestr_query)){
  // if(mysqli_num_rows($transcript_query) > 0){
    $sem[] = [
      "Subject_name" => $semestr['Subject_name'],
      "VSK1" => $semestr['VSK1'],
      "VSK2" => $semestr['VSK2'],
      "exam" => $semestr['exam'],
      "total" => $semestr['total'],
      "Teacher_name" => $semestr['Teacher_name']
    ];
  }
?>
