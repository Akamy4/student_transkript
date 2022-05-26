<?php
  session_start();
  if(isset($_SESSION['student'])){
    header ('Location: sem_student_info.php');
  } else if(isset($_SESSION['teacher'])) {
    header ('Location: teacher_page.php');
  } else if(isset($_SESSION['employee'])) {
    header ('Location: employee_page.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <form action="includes/signin.php" method="post">
      <div class="container mt-5">
        <h1 class="text-center">Авторизация<h1>
      </div>

      <input type="text" class = "form-control mt-1" name="login" placeholder="Введите логин">
      <input type="password" class = "form-control mt-1" name="password" placeholder="Введите пароль"> <br>
      <button type="submit">Войти</button>
    </form>
    <?php
    if (isset($_SESSION['message'])){
      echo "string";
      echo '<p style="margin: 0 auto;
      width: 400px;
      margin-top: 14px;
      border: 2px
      solid #212529;
      border-radius: 3px;
      padding: 8px;
      text-align: center;
      font-weight: bold;" mt-5>'.$_SESSION['message'].'</p>';
    }
     ?>

  </body>
</html>
