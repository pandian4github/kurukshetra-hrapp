<?php
  session_start();
  //echo $_SESSION['hrloggedin'];
  session_unset();
  session_destroy();
  header("location:login.php");
?>