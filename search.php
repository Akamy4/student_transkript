<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'includes/connection.php';
    $search = $_POST['name'];

    $query = "SELECT * FROM students, users_auth, specialitys, levels, languages
    WHERE students.id_speciality = specialitys.id_speciality
    and students.id_language = languages.id_language
    and students.id_level = levels.id_level
    and students.id_Student = users_auth.id_person
    and (users_auth.login like '%$search%' or students.Student_name like '%$search%' or students.Student_surname like '%$search%')";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
        echo "<tr>
        <td>
          <div>
            <span>".$row['Student_surname']."</span>
          </div>
        </td>
        <td>
          <div>
            <span>".$row['Student_name']."</span>
          </div>
        </td>
        <td>
          <div>
            <span>".$row['Speciality_name']."</span>
          </div>
        </td>
        <td>
          <div>
            <span>".$row['Student_Course']."</span>
          </div>
        </td>
        <td>
          <div>";
          ?>
             <a href="employee/student_info.php?id_Student=<?=$row['id_Student']?>">Информация о студенте</a><br>
             <a href="employee/sem_info.php?id_Student=<?=$row['id_Student']?>">Успеваемость за семестр</a><br>
             <a href="employee/all_info.php?id_Student=<?=$row['id_Student']?>">Транскрипт</a>
             <?php
             echo "</div>
           </td>
         </tr>";
    } else {
      echo "Нет результатов";
    }
    ?>
  </body>
</html>
