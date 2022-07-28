<?php session_start() ?>

<?php
//include './Model/Administrator.php';
require './login.php';

?>

<!--<form method="post" action="test.php" class="d-flex">-->
  <form method="post" class="d-flex">
    <input type="text" id="login" name="login" class="form-control" placeholder="Utilisateur">
    <input type="text" id="password" name="password" class="form-control" placeholder="Mot de passe">
    <button type="submit" class="btn btn-secondary">Connexion</button>
  </form>
  
  <?php

login();
//var_dump($_POST);

if (isset($_POST['login'])) {
  //$login = $_POST['login'];
  //$password = $_POST['password'];
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['password'] = $_POST['password'];
  //var_dump($_POST);
  //echo '<br>'.'La session contient actuellement le login '.$_SESSION['login'].' et le mot de passe '.$_SESSION['password'];
} else {
  echo '<br>'.'Saisissez un identifiant'.'<br>'.'note pour le moi du futur: isole la navbar du reste du header de façon à pouvoir l\'utiliser seule (ici pour la page de login)';
}
