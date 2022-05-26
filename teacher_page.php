<?php
session_start();
if(!$_SESSION['teacher']){
  header('Location: index.php');
}
?>
