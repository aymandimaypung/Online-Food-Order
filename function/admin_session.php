<?php
  include 'config.php';
  include 'function.php';

  session_start();
  if(!isset($_SESSION['admin_id']))
  {
    header("location:../guest/login.php");
  }

  ?>