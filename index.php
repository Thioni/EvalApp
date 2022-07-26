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

  require 'Controller/HideoutManager.php';
  $managerHideout = new HideoutManager();
  $hideouts = $managerHideout->getAll();

  require 'Controller/SpecialityManager.php';
  $managerSpeciality = new SpecialityManager();
  $specialities = $managerSpeciality->getAll();

  //$entityManager = getEntityManager();

  $admin = false;
  
?>

<body class="bg-secondary">

<?php include "vues/missionsList.php"; ?>

</body>
<?php include 'vues/footer.php'; ?>
</html>