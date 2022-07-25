<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Spycraft, site d'espionnage depuis 1889 (oui, avant le web)">
  <title>Spycraft</title>
  <link rel="stylesheet" href="vues/bootstrap.min.css">
  <!--<link rel="stylesheet" href="styles/style.css">-->
</head>

<body class="bg-dark">
<?php
  //require_once 'vendor/autoload.php';
  //require_once 'entityManager.php';
  include 'vues/header.php';
  //include 'vues/missionsList.php';
  //include 'createAgent.php';
  //include 'createMission.php';

  require 'Controller/MissionManager.php';
  $managerMission = new MissionManager();
  $missions = $managerMission->getAll();
  
  require 'Controller/CountryManager.php';
  $managerCountry = new CountryManager();
  $countries = $managerCountry->getAll();

  require 'Controller/CodenameManager.php';
  $managerCodename = new CodenameManager();
  $codenames = $managerCodename->getAll();

  require_once 'Controller/AgentManager.php';
  $managerAgent = new AgentManager();
  $agents = $managerAgent->getAll();

  require 'Controller/TargetManager.php';
  $managerTarget = new TargetManager();
  $targets = $managerTarget->getAll();

  require 'Controller/ContactManager.php';
  $managerContact = new ContactManager();
  $contacts = $managerContact->getAll();

  require 'Controller/SkillManager.php';
  $manageragents_skills = new SkillManager();
  $agents_skills = $manageragents_skills->getAll();

  require 'Controller/SpecialityManager.php';
  $managerSpeciality = new SpecialityManager();
  $specialities = $managerSpeciality->getAll();
  
  require './Controller/GetSkills.php';
?>

<section class="row">
  <div class="col-1">
    <a href="" class="btn btn-success mb-3">Retour</a>
  </div>
  <div class="col-1">
    <a href="./Controller/createMission.php" class="btn btn-warning mb-3">Nouvelle mission</a>
  </div>
  <div class="col-1">
    <a href="./Controller/createTarget.php" class="btn btn-warning mb-3">Nouvelle cible</a>
  </div>
  <div class="col-1">
    <a href="./Controller/createAgent.php" class="btn btn-warning mb-3">Nouvel agent</a>
  </div>
</section>

<?php foreach ($agents as $agent): ?>

<div class="container-fluid">

  <section class="row m-0 justify-content-center text-center">

    <div class="col-2 bg-success text-center">AGENT</div>

  </section>

  <section class="row m-0 justify-content-center text-center">

    <div class="col-2 bg-light fs-3 text-uppercase text-center"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></div>

  </section>

  <section class="row m-0 justify-content-center text-center">

    <div class="col-1 bg-primary text-center">DATE DE NAISSANCE</div>
    <div class="col-1 bg-primary text-center">PAYS</div>
    <div class="col-1 bg-primary text-center">CODE AGENT</div>
    <div class="col-2 bg-primary text-center">COMPETENCES</div>

  </section>
  
  <section class="row m-0 justify-content-center text-center mb-1">

    <div class="col-1 bg-light text-center">
      <?php $convertTimestamp = strtotime($agent->getBirthdate());
      echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
    </div>

    <div class="col-1 bg-light text-center">
      <?php foreach ($countries as $country): ?>
        <?= $agent->getNationality() === $country->getId() ? $country->getLocation() : ""; ?>
      <?php endforeach; ?>
    </div >

    <div class="col-1 bg-light text-center">
        <?= $agent->getCode_agent(); ?>
    </div >

    <div class="col-2 bg-light text-center">      

      <?php
        $idAgents = $agent->getId();
        getSkills($idAgents);
      ?>          

    </div>

  </section>

  <section class="row m-0 justify-content-center text-center">

  <div class="col-1 offset-4 mb-3">    
    <a href="Controller/deleteAgent.php?id=<?= $agent->getId() ?>" class="btn btn-danger">Supprimer</a>
  </div>

  </section>

</div>

<?php endforeach; ?>

<div>
<a href="Controller/createMission.php" class="btn btn-success mb-3">Créer une nouvelle Mission</a>
</div>

</body>