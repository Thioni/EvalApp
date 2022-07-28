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
  
?>

<section class="d-flex flex-wrap justify-content-center bg-dark">

  <div class="row row-cols-2">
  <?php foreach ($missions as $mission): ?>    
    <div class="card m-5 bg-secondary" style="width: 18rem;">
      <div class="card-body">
        <h3 class="card-title text-light">MISSION</h3>
        <h4 class="card-title"><?= $mission->getTitle(); ?></h4>
        <h5 class="card-title text-light">Description</h5>
        <p class="card-text"><?= $mission->getDescription(); ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</section>