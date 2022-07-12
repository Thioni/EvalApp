<?php
  require 'CountryManager.php';
  $managerCountry = new CountryManager();
  $countries = $managerCountry->getAll();
 
  require 'MissionManager.php';
  $managerMission = new MissionManager();
  $missions = $managerMission->getAll();

  require 'AgentManager.php';
  $managerAgent = new AgentManager();
  $agents = $managerAgent->getAll();
?>

  <section class="row">
      <?php foreach ($missions as $mission): ?>
                  <div class="col-3 test"><?= $mission->getTitle() ?></div>
      <?php endforeach; ?>
      <?php foreach ($countries as $country): ?>
                  <div class="col-1 test2"><?= $mission->getCountry() === $country->getId() ? $country->getLocation() : false ?></div>
      <?php endforeach; ?>
      <?php foreach ($agents as $agent): ?>
                  <div class="col-8 test3"><?= $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name() : "" ?></div>
      <?php endforeach; ?>
      <?php //var_dump($country); ?>
  </section>

  <section class="row mt-5">
                  <div class="col-4 test">Titre</div>
                  <div class="col-4 test2">Country</div>
                  <div class="col-4 test3">Agent_one</div>
  </section>