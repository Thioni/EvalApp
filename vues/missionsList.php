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

  require 'CodenameManager.php';
  $managerCodename = new CodenameManager();
  $codenames = $managerCodename->getAll();

  require 'TargetManager.php';
  $managerTarget = new TargetManager();
  $targets = $managerTarget->getAll();

foreach ($missions as $mission): ?>

  <div class="container-fluid">

    <section class="row">

      <div class="col-2 test3">TITLE</div>
      <div class="col-2 test3">COUNTRY</div>
      <div class="col-2 test3">CODENAME</div>
      <div class="col-2 test3">AGENT</div>
      <div class="col-2 test3">TARGET</div>
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

      <div class="col-2 test">
        <?php foreach ($codenames as $codename):
          echo $mission->getCodename() === $codename->getId() ? $codename->getAlias() : "";
        endforeach; ?>
      </div >

      <div class="col-2 test2">
        <?php foreach ($agents as $agent):
          echo $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_two() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_three() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>

      <div class="col-2 test">
        <?php foreach ($targets as $target):
          echo $mission->getTarget_one() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getTarget_two() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getTarget_three() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>
        
      <div class="col-2 test2">contact placeholder</div>

    </section>

  </div>

<?php endforeach; ?>

