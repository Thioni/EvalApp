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

      <div class="col test">1</div>
      <div class="col test2">2</div>
      <div class="col test3">3</div>
      <div class="col test">4</div>
      <div class="col test2">5</div>
      <div class="col test3">6</div>

    </section>

  <section class="row">

      <div class="col test">
        <?php foreach ($missions as $mission):
          echo $mission->getTitle();
        endforeach; ?>
      </div>

      <div class="col test2">
        <?php foreach ($countries as $country):
          echo $mission->getCountry() === $country->getId() ? $country->getLocation() : "";
         endforeach; ?>
      </div>

      <div class="col test3">
        <?php foreach ($agents as $agent):
          echo $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name() : "";
          // tester avec $agent->getFirst_name().<br> pour concatener un saut de ligne quand plusieurs noms 
        endforeach; ?>
      </div>

      <div class="col test">4</div>
      <div class="col test2">5</div>
      <div class="col test3">6</div>

  </section>
