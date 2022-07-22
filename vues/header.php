<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Spycraft, site d'espionnage depuis 1889 (oui, avant le web)">
  <title>Spycraft</title>
  <style>
  <?php include __DIR__ . "/../vues/bootstrap.min.css" ?>
  <?php include __DIR__ . "/../vues/style.css" ?>
  </style>

</head>

<div class="container-fluid">
  <header>
    <div class="header row align-items-center">
      <div class="col-3 text-center bleuF">
          <img class="logo" src="" alt="Logo spycraft" width="50" height="50">
      </div>
      <div class="col-6 text-center bleuF" id="header"><h1>SPYCRAFT</h1></div>
    </div>
  </header>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-none d-lg-block mb-5">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Missions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Agents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Hideouts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Specialties</a>
        </li>
      </ul>
      <form class="d-flex">
        <input type="text" id="username" class="form-control" placeholder="Utilisateur">
        <input type="text" id="password" class="form-control" placeholder="Mot de passe">
        <button type="button" class="btn btn-secondary">Connexion</button>
      </form>
    </div>
  </div>
</nav>