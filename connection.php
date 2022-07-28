<?php 
  session_start();
  require './login.php';
?>

<form method="post" class="d-flex">
  <input type="text" id="login" name="login" class="form-control" placeholder="Utilisateur">
  <input type="text" id="password" name="password" class="form-control" placeholder="Mot de passe">
  <button type="submit" class="btn btn-secondary">Connexion</button>
</form>
<?php

if ((isset($_POST['login'])) && (isset($_POST['password']))) {
  login();
  echo '<br>'.'valeurs actuelles: '.'<br>';
  var_dump( $_SESSION);
} else {
  echo '<br>'.'Saisissez un identifiant'.'<br>'.'note pour le moi du futur: isole la navbar du reste du header de façon à pouvoir l\'utiliser seule (ici pour la page de login)';
}