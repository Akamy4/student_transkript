<?php
session_start();
unset($_SESSION['person'], $_SESSION['student'], $_SESSION['teacher'], $_SESSION['employee']);
header('Location: ../index.php');
?>
