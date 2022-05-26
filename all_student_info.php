<?php
session_start();
if(!$_SESSION['student']){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Информация о студенте</title>
    <link rel="stylesheet" href="css/style.css">
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
    require_once 'includes/transcript.php';
    ?>
      <div class="container mt-4">
        <div class="mt-2">
            <h3 class="text-center mb-4">Информация о студенте</h3>
                <div>
                  <p><strong>ФИО: <?= $_SESSION['student']['Student_surname']?> <?=$_SESSION['student']['Student_name']?></p> </strong>
                  <p><strong >Логин: <?= $_SESSION['person']['login']?></p></strong>
                  <p><strong >Специальность: <?= $_SESSION['student']['Speciality_name']?></p></strong>
                  <p><strong >Уровень обучения: <?= $_SESSION['student']['level_name']?></p></strong>
                  <p><strong >Язык обучения: <?= $_SESSION['student']['language_name']?></p></strong>
                  <p><strong >Курс: <?= $_SESSION['student']['Student_Course']?></p></strong>
                  <p><strong >Номер: <?= $_SESSION['student']['Student_number']?></p></strong>
                  <p><strong >Дата рождения: <?= $_SESSION['student']['Birth']?></p></strong>
                  <p style="display: flex; justify-content: space-between;"><a href="includes/logout.php" class = "logout">Выход</a>
                     <a href="sem_student_info.php" class = "logout">Назад</a></p>
                </div>
        </div>
      </div>
      <?php
      require_once 'all_table_script.php';
      ?>
  </body>
</html>
