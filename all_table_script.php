<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container mt-4">
      <div class="mt-2">
        <h3 class="text-center mb-0" >Транскрипт</h3>
        <div>
          <table width="100%">
            <thead>
              <tr>
                <th>
                  <div>
                    <span>№</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Пәндер аты / Course / Предмет</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Количество кредитов</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Экзамен</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>В баллах</span>
                  </div>
                </th>
                <th>
                  <div>
                    <span>Суммарный балл</span>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center;" colspan="6">Семестр 1</td>
              </tr>
              <?php
              if(isset($sem1)){
                $i=1;
                foreach ($sem1 as $v) {
                  echo '<tr>
                  <td><div><span>'
                  .  $i++ .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['Subject_name'] .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['amount_of_credits'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['exam'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['digital_equivalent'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['total'] .
                  '</span></div></td>
                  </tr>';
                }
              } else {
                echo "<h1 align = center>Данных нет</h1>";
              }
              ?>
              <tr style="font-weight: bold">
                <td></td>
                <td> GPA семестровый
                <?php
                $sum1_credit=0;
                $sum_total=0;
                foreach ($sem1 as $value) {
                  $sum_total += $value['total'];
                  $sum1_credit += $value['amount_of_credits'];
                }
                $gpa_sem1 = round ($sum_total/$sum1_credit, 2);
                echo $gpa_sem1?>
              </td>
                <td><?php echo $sum1_credit ?></td>
                <td></td>
                <td></td>
                <td>
                <?php
                $sum=0;
                foreach ($sem1 as $value) {
                  $i++;
                  $sum += $value['total'];
                }
                echo $sum;?>
                </td>
              </tr>
              <tr>
                <td style="text-align: center;" colspan="6">Семестр 2</td>
              </tr>
              <?php
              if(isset($sem2)){
                $i=1;
                foreach ($sem2 as $v) {
                  echo '<tr>
                  <td><div><span>'
                  .  $i++ .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['Subject_name'] .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['amount_of_credits'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['exam'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['digital_equivalent'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['total'] .
                  '</span></div></td>
                  </tr>';
                }
              } else {
                echo "<h1 align = center>Данных нет</h1>";
              }
              ?>
              <tr style="font-weight: bold">
                <td></td>
                <td> GPA семестровый
                <?php
                $sum2_credit=0;
                $sum_total=0;
                foreach ($sem2 as $value) {
                  $sum_total += $value['total'];
                  $sum2_credit += $value['amount_of_credits'];
                }
                $gpa_sem2 = round ($sum_total/$sum2_credit, 2);
                echo $gpa_sem2?>
              </td>
                <td><?php echo $sum2_credit ?></td>
                <td></td>
                <td></td>
                <td>
                <?php
                $sum=0;
                foreach ($sem2 as $value) {
                  $i++;
                  $sum += $value['total'];
                }
                echo $sum;?>
                </td>
              </tr>

              <tr style="font-weight: bold">
                <td></td>
                <td>GPA годовой
                <?php

                echo round(($gpa_sem1+$gpa_sem2)/2,2);

                ?></td>
                <td><?php
                echo $sum1_credit+$sum2_credit;
                ?></td>
                <td></td>
                <td></td>
                <td><?php
                $sum=0;
                foreach ($sem1 as $value) {
                  $sum += $value['total'];
                }
                foreach ($sem2 as $value) {
                  $sum += $value['total'];
                }
                echo "$sum";
                ?></td>
              </tr>

              <tr>
                <td style="text-align: center;" colspan="6">Семестр 3</td>
              </tr>
              <?php
              if(isset($sem3)){
                $i=1;
                foreach ($sem3 as $v) {
                  echo '<tr>
                  <td><div><span>'
                  .  $i++ .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['Subject_name'] .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['amount_of_credits'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['exam'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['digital_equivalent'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['total'] .
                  '</span></div></td>
                  </tr>';
                }
              } else {
                echo "<h1 align = center>Данных нет</h1>";
              }
              ?>
              <tr style="font-weight: bold">
                <td></td>
                <td> GPA семестровый
                <?php
                $sum_credit=0;
                $sum_total=0;
                foreach ($sem3 as $value) {
                  $sum_total += $value['total'];
                  $sum_credit += $value['amount_of_credits'];
                }
                $gpa_sem3 = round ($sum_total/$sum_credit, 2);
                echo $gpa_sem3?>
              </td>
                <td><?php echo $sum_credit ?></td>
                <td></td>
                <td></td>
                <td>
                <?php
                $sum=0;
                foreach ($sem3 as $value) {
                  $i++;
                  $sum += $value['total'];
                }
                echo $sum;?>
                </td>
              </tr>

              <tr>
                <td style="text-align: center;" colspan="6">Семестр 4</td>
              </tr>
              <?php
              if(isset($sem4)){
                $i=1;
                foreach ($sem4 as $v) {
                  echo '<tr>
                  <td><div><span>'
                  .  $i++ .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['Subject_name'] .
                  '</span></div></td>
                  <td><div><span>'
                  . $v['amount_of_credits'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['exam'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['digital_equivalent'] .
                  '</span></div></td>
                  <td><div><span>'
                  .  $v['total'] .
                  '</span></div></td>
                  </tr>';
                }
              } else {
                echo "<h1 align = center>Данных нет</h1>";
              }
              ?>
              <tr style="font-weight: bold">
                <td></td>
                <td> GPA семестровый
                <?php
                $sum4_credit=0;
                $sum_total=0;
                foreach ($sem4 as $value) {
                  $sum_total += $value['total'];
                  $sum4_credit += $value['amount_of_credits'];
                }
                $gpa_sem4 = round ($sum_total/$sum4_credit, 2);
                echo $gpa_sem4 ?>
              </td>
                <td><?php echo $sum4_credit ?></td>
                <td></td>
                <td></td>
                <td>
                <?php
                $sum=0;
                foreach ($sem4 as $value) {
                  $i++;
                  $sum += $value['total'];
                }
                echo $sum;?>
                </td>
              </tr>

              <tr style="font-weight: bold">
                <td></td>
                <td>GPA годовой
                <?php

                echo round(($gpa_sem3+$gpa_sem4)/2,2);

                ?></td>
                <td><?php
                echo $sum1_credit+$sum2_credit;
                ?></td>
                <td></td>
                <td></td>
                <td><?php
                $sum=0;
                foreach ($sem3 as $value) {
                  $sum += $value['total'];
                }
                foreach ($sem4 as $value) {
                  $sum += $value['total'];
                }
                echo "$sum";
                ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
