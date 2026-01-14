<?php
  session_start();

  if($_SESSION["autentificado"] != "SI") {
    header("location: ../login.php");
    exit();
  }
?>