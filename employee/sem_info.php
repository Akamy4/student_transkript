<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Информация о студенте</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style media="screen">
    body {
      background-color: #cc9966;
      color: #000000;
      font-size: 24px;
      font-family: Arial;
      font-weight: 500;
    }
    td, th {
  border:solid #212529;
  text-align: left;
  padding: 4px;
  }
    </style>
  </head>
  <body>
    <?php
    require_once '../includes/connection.php';
    $id_Student = $_GET ['id_Student'];
    $query = "SELECT * FROM students, specialitys, levels, languages, users_auth
    WHERE students.id_speciality = specialitys.id_speciality
    and students.id_language = languages.id_language
    and students.id_level = levels.id_level
    and users_auth.id_person =  users_auth.id_person
    and students.id_Student = $id_Student";
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
    ?>
      <div class="container mt-4">
        <div class="mt-2">
            <h3 class="text-center mb-4">Информация о студенте</h3>
                <div>
                  <p><strong>ФИО: <?= $_SESSION['student']['Student_surname']?> <?=$_SESSION['student']['Student_name']?></p> </strong>
                  <p><strong >Логин: <?= $_SESSION['student']['login']?></p></strong>
                  <p><strong >Специальность: <?= $_SESSION['student']['Speciality_name']?></p></strong>
                  <p><strong >Уровень обучения: <?= $_SESSION['student']['level_name']?></p></strong>
                  <p><strong >Язык обучения: <?= $_SESSION['student']['language_name']?></p></strong>
                  <p><strong >Курс: <?= $_SESSION['student']['Student_Course']?></p></strong>
                  <p><strong >Номер: <?= $_SESSION['student']['Student_number']?></p></strong>
                  <p><strong >Дата рождения: <?= $_SESSION['student']['Birth']?></p></strong>
                </div>
        </div>
      </div>
        <?php
        require_once '../includes/semestr.php';
        require_once '../sem_table_script.php';
        echo "
        <div class=container mt-4>
            <div class=mt-2>
              <div>
                <p style=display: flex; justify-content: space-between;><a href=../employee_page.php class = logout>Назад</a></p>
              </div>
            </div>
        </div>";
        ?>
  </body>
</html>
