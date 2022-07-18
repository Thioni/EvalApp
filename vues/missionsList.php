<?php
  require 'Controller/MissionManager.php';
  $managerMission = new MissionManager();
  $missions = $managerMission->getAll();
  
  require 'Controller/CountryManager.php';
  $managerCountry = new CountryManager();
  $countries = $managerCountry->getAll();

  require 'Controller/CodenameManager.php';
  $managerCodename = new CodenameManager();
  $codenames = $managerCodename->getAll();

  require 'Controller/AgentManager.php';
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

foreach ($missions as $mission): ?>

  <div class="container-fluid">

    <section class="row">

      <div class="col-1 test vertF text-center">OPERATION</div>
      <div class="col-1 vertC text-center"><?= $mission->getTitle()."<br>"; ?></div>
      <div class="col-1 orangF text-center">DESCRIPTION</div>
      <div class="col-9 orangC"><?= $mission->getDescription()."<br>"; ?>
                                <!-- 199 caractères avant breakpoint -->
      </div>

    </section>

    <section class="row">

      <div class="col-1 bleuF text-center">MISSION TYPE</div>
      <div class="col-1 bleuF text-center">MISSION STATUS</div>
      <div class="col-1 bleuF text-center">START DATE</div>
      <div class="col-1 bleuF text-center">END DATE</div>
      <div class="col-1 bleuF text-center">COUNTRY</div>
      <div class="col-1 bleuF text-center">CODENAME</div>
      <div class="col-1 bleuF text-center">AGENT</div>
      <div class="col-1 bleuF text-center">TARGET</div>
      <div class="col-1 bleuF text-center">CONTACT</div>
      <div class="col-2 bleuF text-center">HIDEOUT</div>
      <div class="col-1 bleuF text-center">SPECIALITY</div>

    </section>
    
    <section class="row mb-3">

      <div class="col-1 bleuC text-center"><?= $mission->getMission_type(); ?></div>
      <div class="col-1 bleuC text-center"><?= $mission->getMission_status(); ?></div>
      <div class="col-1 bleuC text-center">
        <?php $convertTimestamp = strtotime($mission->getDate_start());
        echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
      </div>
      <div class="col-1 bleuC text-center">
      <?php $convertTimestamp = strtotime($mission->getDate_end());
        echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
      </div>

      <div class="col-1 bleuC text-center">
        <?php foreach ($countries as $country): ?>
          <?= $mission->getCountry() === $country->getId() ? $country->getLocation() : ""; ?>
        <?php endforeach; ?>
      </div >

      <div class="col-1 bleuC text-center">
        <?php foreach ($codenames as $codename): ?>
          <?= $mission->getCodename() === $codename->getId() ? $codename->getAlias() : ""; ?>
        <?php endforeach; ?>
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
        
      <div class="col-1 bleuC text-center">
      <?php foreach ($targets as $target):
          echo $mission->getContact_one() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getContact_two() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
          echo $mission->getContact_three() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        endforeach; ?>
      </div>

      <div class="col-2 bleuC text-center">
        <?php foreach ($hideouts as $hideout):
          echo $mission->getContact_one() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
          echo $mission->getContact_two() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
          echo $mission->getContact_three() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
        endforeach; ?>
      </div>

      <div class="col-1 bleuC text-center">
        <?php foreach ($specialities as $speciality): ?>
          <?= $mission->getSpeciality() === $speciality->getId() ? $speciality->getSkill() : ""; ?>
        <?php endforeach; ?>
      </div>

    </section>

  </div>

<?php endforeach; ?>

