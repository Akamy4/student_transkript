<?php
session_start();
if (!$_SESSION['student']) {
  header('Location: index.php');
}

require_once 'includes/connection.php'
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form style="width: 800px;" method="post" enctype="multipart/form-data" action="includes/upload.php">
    <div class="container mt-4">
      <div class="mt-2">
        <h3 class="text-center mb-4">Информация о студенте</h3>
        <div>
          <p><strong>ФИО: <?= $_SESSION['student']['Student_surname'] ?> <?= $_SESSION['student']['Student_name'] ?></p> </strong>
          <p><strong>Специальность: <?= $_SESSION['student']['Speciality_name'] ?></p></strong></p>
          <!-- <p><strong>Айди: <?= $student_id ?></p></strong></p> -->
          <input type="file" class="form-control" aria-label="Default" name="document_upload"></input>
        </div>
      </div>
      <div class="col-md-12 text-center">
        <button type="submit" name="upload" class="btn btn-primary">Отправить</button>
      </div>
    </div>

  </form>
  <a href="#" class="button open-popup">Оставить заявку</a>
  <div class="popup-bg">
    <div class="popup"></div>
    <p>Текст</p>
  </div>

  <script src="includes/jquery.min.js"> </script>
  <script src="main.js"></script>
</body>

</html>


<?php
// $query = "SELECT * FROM documents";
// mysqli_query($connection, $query);
// while();
?>