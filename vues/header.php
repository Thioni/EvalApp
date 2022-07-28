<?php 
session_start();
define('HTTP_ROOT', $_SERVER['SERVER_NAME'] === 'localhost' ? '/Eval6' : '');

require __DIR__ . '/../Controller/MissionManager.php';
$managerMission = new MissionManager();
$missions = $managerMission->getAll();
  
require __DIR__ . '/../Controller/CountryManager.php';
$managerCountry = new CountryManager();
$countries = $managerCountry->getAll();

require __DIR__ . '/../Controller/CodenameManager.php';
$managerCodename = new CodenameManager();
$codenames = $managerCodename->getAll();

require __DIR__ . '/../Controller/AgentManager.php';
$managerAgent = new AgentManager();
$agents = $managerAgent->getAll();

require __DIR__ . '/../Controller/TargetManager.php';
$managerTarget = new TargetManager();
$targets = $managerTarget->getAll();

require __DIR__ . '/../Controller/ContactManager.php';
$managerContact = new ContactManager();
$contacts = $managerContact->getAll();

require __DIR__ . '/../Controller/HideoutManager.php';
$managerHideout = new HideoutManager();
$hideouts = $managerHideout->getAll();

require __DIR__ . '/../Controller/SkillManager.php';
$managerSkill = new SkillManager();
$agents_skills = $managerSkill->getAll();

require __DIR__ . '/../Controller/SpecialityManager.php';
$managerSpeciality = new SpecialityManager();
$specialities = $managerSpeciality->getAll();  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Spycraft, site d'espionnage depuis 1889 (oui, avant le web)">
  <title>Spycraft</title>
  <style>
  <?php require __DIR__ . "/../vues/bootstrap.min.css" ?>
  <?php //require __DIR__ . "/../vues/style.css" ?>
  </style>
</head>

<div class="container-fluid bg-secondary">
    <div class="header row align-items-center">
      <div class="col-3 text-center bleuF">
          <img class="logo" src="" alt="Logo spycraft" width="50" height="50">
      </div>
      <div class="col-6 text-center bleuF" id="header"><h1>SPYCRAFT</h1></div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-none d-lg-block">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php 
      if (isset($_SESSION['connecté']) && $_SESSION['connecté'] === true) { 
      ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Missions
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./vues/listMissions.php">Liste</a></li>
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./Controller/createMission.php">Créer</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Agents
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./vues/listAgents.php">Liste</a></li>
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./Controller/createAgent.php">Créer</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cibles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./vues/listTargets.php">Liste</a></li>
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./Controller/createTarget.php">Créer</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contacts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./vues/listContacts.php">Liste</a></li>
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./Controller/createContact.php">Créer</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Planques
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./vues/listHideouts.php">Liste</a></li>
            <li><a class="dropdown-item" href="<?= HTTP_ROOT ?>./Controller/createHideout.php">Créer</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>

      <?php 
      if (isset($_SESSION['connecté']) && $_SESSION['connecté'] === true) { 
      ?>
        <div class="text-light me-2">Bienvenue,<?=' '.$_SESSION['login'];?></div>
        <a href="<?= HTTP_ROOT ?>./logout.php" class="btn btn-warning">Déconnexion</a>
      <?php
      } else { 
      ?>        
        <a href="<?= HTTP_ROOT ?>./connection.php" class="btn btn-success">Connexion</a>       
      <?php } ?>

    </div>
  </div>
</nav>