<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container mt-4">
      <div class="mt-2">
        <h3 class="text-center mb-0" >Успеваемость за текущий семестр</h3>
        <div>
          <table width="100%">
            <thead>
              <tr>
                <th>
                  <div>
                    <span>Предмет</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>ВСК1</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>ВСК2</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Экзамен</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Итог</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Преподаватель</span>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($sem)){
                foreach ($sem as $v) {
                  echo '<tr>
                  <td><div><span>'
                  .  $v['Subject_name'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['VSK1'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['VSK2'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['exam'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['total'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['Teacher_name'] .
                  '</span></div></td>
                  </tr>';
                }
              } else {
                echo "<h1 align = center>Данных нет</h1>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
