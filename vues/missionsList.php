<section class="row bg-secondary">
  <div class="col-1">
    <a href="" class="btn btn-success mb-3">Retour</a>
  </div>
  <div class="col-1">
    <a href="./agentsList.php" class="btn btn-primary mb-3">AGENTS</a>
  </div>
  <div class="col-1">
    <a href="" class="btn btn-primary mb-3">CIBLES</a>
  </div>
</section>

<section class="row bg-secondary">
  <div class="col-1 offset-1">
    <a href="./Controller/createAgent.php" class="btn btn-warning mb-3">Nouvel agent</a>
  </div>
  <div class="col-1">
    <a href="./Controller/createTarget.php" class="btn btn-warning mb-3">Nouvelle cible</a>
  </div>
</section>


<?php foreach ($missions as $mission): ?>

<div class="container-fluid mt-2">

  <section class="row">

    <div class="col-2 offset-1 bg-success text-center">OPERATION</div>
    <div class="col-2 offset-3 bg-success text-center">DESCRIPTION</div>

  </section>

  <section class="row align-items-center">

    <div class="col-2 offset-1 bg-light fs-3 text-uppercase text-center"><?= $mission->getTitle(); ?></div>
    <div class="col-6 offset-1 bg-light text-center"><?= $mission->getDescription(); ?></div>

  </section>

  <section class="row">

    <div class="col-1 bg-primary text-center">MISSION TYPE</div>
    <div class="col-1 bg-primary text-center">MISSION STATUS</div>
    <div class="col-1 bg-primary text-center">START DATE</div>
    <div class="col-1 bg-primary text-center">END DATE</div>
    <div class="col-1 bg-primary text-center">COUNTRY</div>
    <div class="col-1 bg-primary text-center">CODENAME</div>
    <div class="col-1 bg-primary text-center">AGENT</div>
    <div class="col-1 bg-primary text-center">TARGET</div>
    <div class="col-1 bg-primary text-center">CONTACT</div>
    <div class="col-2 bg-primary text-center">HIDEOUT</div>
    <div class="col-1 bg-primary text-center">SPECIALITY</div>

  </section>
  
  <section class="row mb-1">

    <div class="col-1 bg-light text-center"><?= $mission->getMission_type(); ?></div>
    <div class="col-1 bg-light text-center"><?= $mission->getMission_status(); ?></div>
    <div class="col-1 bg-light text-center">
      <?php $convertTimestamp = strtotime($mission->getDate_start());
      echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
    </div>
    <div class="col-1 bg-light text-center">
    <?php $convertTimestamp = strtotime($mission->getDate_end());
      echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
    </div>

    <div class="col-1 bg-light text-center">
      <?php foreach ($countries as $country): ?>
        <?= $mission->getCountry() === $country->getId() ? $country->getLocation() : ""; ?>
      <?php endforeach; ?>
    </div >

    <div class="col-1 bg-light text-center">
      <?php foreach ($codenames as $codename): ?>
        <?= $mission->getCodename() === $codename->getId() ? $codename->getAlias() : ""; ?>
      <?php endforeach; ?>
    </div >

    <div class="col-1 bg-light text-center">
      <?php foreach ($agents as $agent):
        echo $mission->getAgent_one() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
        echo $mission->getAgent_two() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
        echo $mission->getAgent_three() === $agent->getId() ? $agent->getFirst_name()." ".$agent->getLast_name()."<br>" : "";
      endforeach; ?>
    </div>

    <div class="col-1 bg-light text-center">
      <?php foreach ($targets as $target):
        echo $mission->getTarget_one() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        echo $mission->getTarget_two() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        echo $mission->getTarget_three() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
      endforeach; ?>
    </div>
      
    <div class="col-1 bg-light text-center">
    <?php foreach ($targets as $target):
        echo $mission->getContact_one() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        echo $mission->getContact_two() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
        echo $mission->getContact_three() === $target->getId() ? $target->getFirst_name()." ".$target->getLast_name()."<br>" : "";
      endforeach; ?>
    </div>

    <div class="col-2 bg-light text-center">
      <?php foreach ($hideouts as $hideout):
        echo $mission->getHideout_one() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
        echo $mission->getHideout_two() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
        echo $mission->getHideout_three() === $hideout->getId() ? $hideout->getAdress()."<br>" : "";
      endforeach; ?>
    </div>

    <div class="col-1 bg-light text-center">
      <?php foreach ($specialities as $speciality): ?>
        <?= $mission->getSpeciality() === $speciality->getId() ? $speciality->getSkill() : ""; ?>
      <?php endforeach; ?>
    </div>

  </section>

  <section class="row">

  <div class="col-1 offset-6 mb-3">    
    <a href="Controller/deleteMission.php?id=<?= $mission->getId() ?>" class="btn btn-danger">Supprimer</a>
  </div>

  </section>

</div>

<?php endforeach; ?>

<div>
<a href="Controller/createMission.php" class="btn btn-success mb-3">Créer une nouvelle mission</a>
</div>