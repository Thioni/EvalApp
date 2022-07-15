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

      <div class="col-1 vertF text-center">OPERATION</div>
      <div class="col-1 vertC text-center"><?= $mission->getTitle()."<br>"; ?></div>
      <div class="col-1 orangF text-center">DESCRIPTION</div>
      <div class="col-9 orangC">
      Ce texte fait 199 caractères Irure consequat nulla nisi minim nostrud laborum velit sint ex ea anim do dolore reprehenderit.
      Irure reprehenderit voluptate excepteur dolore laborum voluptate excepteur
      </div>

    </section>

    <section class="row">

      <div class="col-1 bleuF text-center">MISSION TYPE</div>
      <div class="col-1 bleuF text-center">MISSION STATUS</div>
      <div class="col-1 bleuF text-center">START DATE</div>
      <div class="col-1 bleuF text-center">END DATE</div>
      <div class="col-2 bleuF text-center">COUNTRY</div>
      <div class="col-1 bleuF text-center">CODENAME</div>
      <div class="col-1 bleuF text-center">AGENT</div>
      <div class="col-1 bleuF text-center">TARGET</div>
      <div class="col-1 bleuF text-center">CONTACT</div>
      <div class="col-1 bleuF text-center">HIDEOUT</div>
      <div class="col-1 bleuF text-center">SPECIALITY</div>

    </section>
    
    <section class="row mb-3">

      <div class="col-1 bleuC text-center"></div>
      <div class="col-1 bleuC text-center"></div>
      <div class="col-1 bleuC text-center"></div>
      <div class="col-1 bleuC text-center"></div>

      <div class="col-2 bleuC text-center">
        <?php foreach ($countries as $country):
          echo $mission->getCountry() === $country->getId() ? $country->getLocation() : "";
        endforeach; ?>
      </div >

      <div class="col-1 bleuC text-center">
        <?php foreach ($codenames as $codename):
          echo $mission->getCodename() === $codename->getId() ? $codename->getAlias() : "";
        endforeach; ?>
      </div >

      <div class="col-1 bleuC text-center">
        <?php foreach ($agents as $agent):
          echo $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_two() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
          echo $mission->getAgent_three() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>

      <div class="col-1 bleuC text-center">
        <?php foreach ($targets as $target):
          echo $mission->getTarget_one() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getTarget_two() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getTarget_three() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>
        
      <div class="col-1 bleuC text-center"></div>
      <div class="col-1 bleuC text-center"></div>
      <div class="col-1 bleuC text-center"></div>

    </section>

  </div>

<?php endforeach; ?>

