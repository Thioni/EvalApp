<?php

function login() {
  //$adminPassword = 'eippZXJ0';
  $db;
  $dbName = "spycraft";
  $port = 3306;
  $username = "root";
  $password = "";
  $db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password);
  $request = $db->prepare('SELECT * FROM administrators WHERE login = :login');
  if (isset($_POST['login'])) {
    $request->bindvalue(':login', $_POST["login"]);
    $request->execute();
    $admin = $request->fetch(PDO::FETCH_ASSOC);
      if ($admin === false) {
        echo 'Identifiants invalides';
      } else {
        if (password_verify($_POST["password"], $admin['password'])) {
          echo 'Bienvenue';
        } else {
          echo 'Ne bougez pas, John Wick est en route';
        }
      }
    }
}
