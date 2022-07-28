<?php
  session_start();
  //$_SESSION['login'] = '';
  //$_SESSION['password'] = '';
  //$_SESSION['connecté'] = false;
  $_SESSION = [];
  //session_destroy();
  header("Location: index.php");
