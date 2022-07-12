<?php
  require 'CountryManager.php';
  $managerCountry = new CountryManager();
  $countries = $managerCountry->getAll();
 
  require 'MissionManager.php';
  $managerMission = new MissionManager();
  $missions = $managerMission->getAll();

  //require_once 'classes/Agent.php';

  //$agent1 = new Agent();
  //$agent1->name;
  //$choice= 11;
  
?>

<div class="row mt-5">
  <div class="col-2 test">
  </div>
  <div class="col-2 test2">
    Nom de code
  </div>
  <div class="col-2 test">
    Status
  </div>
  <div class="col-3 test2">
    Date de début
  </div>
  <div class="col-3 test">
    Date de fin
  </div>
</div>

<div class="row">
  <div class="col-2">
  </div>  
  </div>
  <div class="col-2">
  </div>
  <div class="col-2">
    placeholder
  </div>
  <div class="col-3">
    placeholder
  </div>
  <div class="col-3">
    placeholder
  </div>
</div>

<div class="row mt-5">
  <div class="col-9 test">
    Description
  </div>
  <div class="col-3 test3">
    Pays
  </div>
</div>

<div class="row">
  <div class="col-9">
    placeholder
  </div>
  <div class="col-3">
    placeholder 
  </div>
</div>

<div class="row mt-5">
  <div class="col-4 test">
    Type
  </div>
  <div class="col-4 test2">
    Hideout
  </div>
  <div class="col-4 test">
    Target
  </div>
</div>

<div class="row">
  <div class="col-4">
    placeholder
  </div>
  <div class="col-4">
    placeholder 
  </div>
  <div class="col-4">
    placeholder
  </div>
</div>

<div class="row mt-5">
  <div class="col-4 test2 specialty">
    Specialty
  </div>
  <div class="col-4 test">
    Agent
  </div>
  <div class="col-4 test2">
    Contact
  </div>
</div>

<!-- speciality -->

  <div class="row">
    <div class="col-4">
      speciality
    </div>

<!-- agent -->

    <div class="col-4">
      tyyf
    </div>

  <!-- contact -->

    <div class="col-4">
      placeholder contact
    </div>
</div>