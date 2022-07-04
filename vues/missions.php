<?php
  $choice= 11;
?>
<div class="row mt-5">
  <div class="col-2 test">
    Missions
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
    placeholder
  </div>
  <div class="col-2">
    <?php
      try {
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
        foreach ($pdo->query("SELECT id, alias FROM codenames WHERE codenames.id =$choice", PDO::FETCH_ASSOC) as $code) {
          echo $code['id'].' '.$code['alias'].'<br>';
        };
      } catch (PDOException $e) {
          echo ' Et oui, la merdasse';
      }
    ?>
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
  <div class="col-4 test2">
    Specialty
  </div>
  <div class="col-4 test">
    Agent
  </div>
  <div class="col-4 test2">
    Contact
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