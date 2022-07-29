<?php 
  session_start();
  require './login.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Spycraft, site d'espionnage depuis 1889 (oui, avant le web)">
  <title>Spycraft</title>
  <link rel="stylesheet" href="vues/bootstrap.min.css">
 </head>

<div class="container">
  <form method="post">
    <div class="row row-cols-2 justify-content-center mt-5">
      <input type="text" id="login" name="login" class="col-3" placeholder="Utilisateur">
      <input type="text" id="password" name="password" class="col-3" placeholder="Mot de passe">
    </div>
    <div class="row justify-content-center mt-1">
      <button type="submit" class="col-1 btn btn-secondary">Connexion</button>
    </div>
  </form>
</div>

<?php

if ((isset($_POST['login'])) && (isset($_POST['password']))) {
  login();
  echo '<br>'.'valeurs actuelles: '.'<br>';
  var_dump( $_SESSION);
} else {
  echo '<br>'.'Saisissez un identifiant'.'<br>'.'note pour le moi du futur: isole la navbar du reste du header de façon à pouvoir l\'utiliser seule (ici pour la page de login)';
}

require 'vues/footer.php';