<?php
session_start();
require_once 'connection.php';
// print_r($_FILES);
$student_id =  $_SESSION['student']['id_Student'];
if (isset($_POST['upload'])) {
  if (isset($_FILES['document_upload']['tmp_name'])) {
    $doc = addslashes(file_get_contents($_FILES['document_upload']['tmp_name']));
    $doc_name = $_FILES['document_upload']['name'];
  } else {
    header('Location: ../document.php');
  }

  $query = "INSERT INTO `documents`
  (`id_document`, `id_student`, `document`, `document_name`)
  VALUES (NULL, '$student_id', '$doc', '$doc_name')";
  mysqli_query($connection, $query);
} 
header('Location: ../document.php');
