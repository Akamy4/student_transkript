<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Студент</th>
          <th>Документ</th>
          <th>Действие</th>
        </tr>
      </thead>
      <tbody>
        <?php
        session_start();
        $student_id =  $_SESSION['student']['id_Student'];
        require_once 'includes/connection.php';
        $query = "SELECT id_document, Student_name, document_name FROM documents, students
        WHERE documents.id_student = students.id_Student AND students.id_Student = '$student_id'";

        $result_query = mysqli_query($connection, $query);
        while ($result = mysqli_fetch_assoc($result_query)) {
          // if(mysqli_num_rows($transcript_query) > 0){
          // $res[] = [
          //   "Student_name" => $result['Student_name'],
          //   "document_name" => $result['document_name'],
          //   "VSK2" => $result['VSK2']
          // ];

        ?>
          <tr>
            <td><?php echo $result["Student_name"] ?></td>
            <td><?php echo $result["document_name"] ?></td>
            <td><a href="includes/download.php" class="btn btn-primary"> Скачать </a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  
</body>

</html>