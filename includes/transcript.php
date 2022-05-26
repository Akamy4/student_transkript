
    <?php
    require_once 'connection.php';
    $id_Student =  $_SESSION['student']['id_Student'];
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

    ?>
