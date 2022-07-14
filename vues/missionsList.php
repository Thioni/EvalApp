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

foreach ($missions as $mission): ?>

  <div class="container-fluid">

    <section class="row">

      <div class="col-2 test">TITLE</div>
      <div class="col-2 test2">COUNTRY</div>
      <div class="col-2 test3">CODENAME</div>
      <div class="col-2 test">AGENT</div>
      <div class="col-2 test2">TARGET</div>
      <div class="col-2 test3">CONTACT</div>

    </section>
    
    <section class="row mb-1">

      <div class="col-2 test">
        <?= $mission->getTitle()."<br>"; ?>
      </div >

      <div class="col-2 test2">
        <?php foreach ($countries as $country):
          echo $mission->getCountry() === $country->getId() ? $country->getLocation() : "";
        endforeach; ?>
      </div >

      <div class="col-2 test3">
        codename placeholder
      </div >

      <div class="col-2 test">
        <?php foreach ($agents as $agent):
          echo $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_two() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_three() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>

      <div class="col-2 test2">target placeholder</div>
        
      <div class="col-2 test3">contact placeholder</div>

    </section>

  </div>

<?php endforeach; ?>

