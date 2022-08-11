<?php
  session_start();
  //echo "cerrar";
  unset($_SESSION['corr']);
  unset($_SESSION['nomb']);
  unset($_SESSION['tel']);
  session_destroy();
  header("Location: ../index.php");
  exit;
?>