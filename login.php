<?php

function login() {
  //$adminPassword = 'eippZXJ0';
  $db;
  $dbName = "spycraft";
  $port = 3306;
  $username = "root";
  $password = "";
  $_SESSION['connecté'] = false;
  $db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password);
  $request = $db->prepare('SELECT * FROM administrators WHERE login = :login');
  if (isset($_POST['login'])) {
    $request->bindvalue(':login', $_POST["login"]);
    $request->execute();
    $admin = $request->fetch(PDO::FETCH_ASSOC);
      if ($admin === false) {
        echo 'Identifiants invalides. Ne bougez pas, John Wick est en route';
      } else {
        if (password_verify($_POST['password'], $admin['password'])) {
          $_SESSION['login'] = $_POST['login'];
          $_SESSION['password'] = $_POST['password'];
          $_SESSION['connecté'] = true;
          echo 'Bienvenue';
          header("Location: index.php");
        } else {
          echo 'Identifiants invalides. Ne bougez pas, John Wick est en route';
        }
      }
    }
}
