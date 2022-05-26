<?php
session_start();
if(!$_SESSION['employee']){
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
      <div class="container mt-4">
        <div class="mt-2">
            <h3 class="text-center mb-4">Информация о работнике</h3>
                <div>
                  <p><strong>ФИО: <?= $_SESSION['employee']['employee_surname']?> <?=$_SESSION['employee']['employee_name']?></p> </strong>
                  <p><strong >Логин: <?= $_SESSION['person']['login']?></p></strong>
                  <p><strong >Позиция: <?= $_SESSION['employee']['position_name']?></p></strong>
                  <p style="display: flex; justify-content: space-between;"><a href="includes/logout.php" class = "logout">Выход</a></p>
                </div>
        </div>
      </div>
      <div class="container mt-4">
        <div class="mt-2">
          <h3 class="text-center mb-0" >Поиск по студенту</h3>
          <input type="text" id="search" style="display: flex; justify-content: center; margin: 0 auto; width: 500px;" placeholder="Введите ФИО или Логин">
          <div>
            <table width="100%">
              <thead>
                <tr>
                  <th>
                    <div>
                      <span>Фамилия</span>
                    </div>
                  </th>
                  <th>
                    <div>
                      <span>Имя</span>
                    </div>
                  </th>
                  <th>
                    <div>
                      <span>Специальность</span>
                    </div>
                  </th>
                  <th>
                    <div>
                      <span>Курс</span>
                    </div>
                  </th>
                  <th>
                    <div>
                      <span>Функции</span>
                    </div>
                  </th>
                </tr>
              </thead>

              <tbody id="output">

              </tbody>

            </table>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#search").keypress(function(){
            $.ajax({
              type:'POST',
              url:'search.php',
              data:{
                name:$("#search").val(),
              },
              success:function(data){
              $("#output").html(data);
              }
            });
          });
        });
      </script>
  </body>
</html>
