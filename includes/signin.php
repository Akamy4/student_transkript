<?php
  session_start();
  require_once 'connection.php';


  $login = $_POST['login'];
  $password = $_POST['password'];


  $person_check = mysqli_query($connection, "SELECT * FROM `users_auth`
    WHERE login = '$login'
    AND Password = '$password'");
    if(mysqli_num_rows($person_check) > 0){
      $person = mysqli_fetch_assoc($person_check);
      print_r($person_check);
      print_r($person);
      $_SESSION['person'] = [
        "id" => $person['id'],
        "id_person" => $person['id_person'],
        "role" => $person['role'],
        "login" => $person['login'],
        "Password" => $person['Password']
      ];
    } else if(mysqli_num_rows($person_check)==0) {
      $_SESSION['message']='Не верный логин и/или пароль';
      echo $_SESSION['message'];
      header('Location: ../index.php');
    }

    $person_id =  $_SESSION['person']['id_person'];

    if($person['role'] == 1){
      $query = "SELECT * FROM students, specialitys, levels, languages, users_auth
      WHERE students.id_speciality = specialitys.id_speciality
      and students.id_language = languages.id_language
      and students.id_level = levels.id_level
      and users_auth.id_person =  users_auth.id_person
      and students.id_Student = $person_id";
      $result = mysqli_query($connection,$query);
      $student = mysqli_fetch_assoc($result);
      $_SESSION['student'] = [
        "id_Student" => $student['id_Student'],
        "Student_name" => $student['Student_name'],
        "Student_surname" => $student['Student_surname'],
        "login" => $student['login'],
        "Speciality_name" => $student['Speciality_name'],
        "language_name" => $student['language_name'],
        "level_name" => $student['level_name'],
        "Student_Course" => $student['Student_Course'],
        "Student_number" => $student['Student_number'],
        "Birth" => $student['Birth']
      ];
        header ('Location: ../sem_student_info.php');
    } else if ($person['role'] == 2) {
      $teacher_check = mysqli_query ($connection, "SELECT * FROM `teachers`, `work_experience_rank`
        WHERE teachers.id_Teacher = '$person_id'
        and teachers.work_experience_rank = work_experience_rank.id_work_experience_rank");
        if(mysqli_num_rows($teacher_check) > 0){
          $teacher = mysqli_fetch_assoc($teacher_check);
          $_SESSION['teacher'] = [
            "id_Teacher" => $teacher['id_Teacher'],
            "Teacher_name" => $teacher['Teacher_name'],
            "work_experience_age" => $teacher['work_experience_age'],
            "work_experience_rank_name" => $teacher['work_experience_rank_name']
          ];
          header ('Location: ../teacher_page.php');
        }
      } else {
        $employee_check = mysqli_query ($connection, "SELECT * FROM `employees`, `positions`
          WHERE employees.id_employee = '$person_id'
          and employees.id_position = positions.id_position");
          if(mysqli_num_rows($employee_check) > 0){
            $employee = mysqli_fetch_assoc($employee_check);
            $_SESSION['employee'] = [
              "id_employee" => $employee['id_employee'],
              "employee_name" => $employee['employee_name'],
              "employee_surname" => $employee['employee_surname'],
              "position_name" => $employee['position_name']
            ];
            header ('Location: ../employee_page.php');
      }
    }

?>
