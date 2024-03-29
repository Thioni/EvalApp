<body class="bg-secondary">

<?php

require '../vues/header.php';

  if ($_POST) {
    $title = $_POST["title"];
    $codename = $_POST["codename"];
    $mission_type = $_POST["mission_type"];
    $mission_status = $_POST["mission_status"];
    $speciality = $_POST["speciality"];
    $description = $_POST["description"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $country = $_POST["country"];
    $agent_one = $_POST["agent_one"];
    $agent_two = $_POST["agent_two"] === "null" ? NULL : $_POST["agent_two"]; 
    $agent_three = $_POST["agent_three"] === "null" ? NULL : $_POST["agent_three"];
    $target_one = $_POST["target_one"];
    $target_two = $_POST["target_two"] === "null" ? NULL : $_POST["target_two"];
    $target_three = $_POST["target_three"] === "null" ? NULL : $_POST["target_three"];
    $contact_one = $_POST["contact_one"];
    $contact_two = $_POST["contact_two"] === "null" ? NULL : $_POST["contact_two"];
    $contact_three = $_POST["contact_three"] === "null" ? NULL : $_POST["contact_three"];
    $hideout_one = $_POST["hideout_one"] === "null" ? NULL : $_POST["hideout_one"];
    $hideout_two = $_POST["hideout_two"] === "null" ? NULL : $_POST["hideout_two"];
    $hideout_three = $_POST["hideout_three"] === "null" ? NULL : $_POST["hideout_three"];

    $newMission = new Mission([
      "title" => $title,
      "codename" => $codename,
      "mission_type" => $mission_type,
      "mission_status" => $mission_status,
      "speciality" => $speciality,
      "description" => $description,
      "date_start" => $date_start,
      "date_end" => $date_end,
      "country" => $country,
      "agent_one" => $agent_one,
      "agent_two" => $agent_two,
      "agent_three" => $agent_three,
      "target_one" => $target_one,
      "target_two" => $target_two,
      "target_three" => $target_three,
      "contact_one" => $contact_one,
      "contact_two" => $contact_two,
      "contact_three" => $contact_three,
      "hideout_one" => $hideout_one,
      "hideout_two" => $hideout_two,
      "hideout_three" => $hideout_three,
    ]);
    
    require 'validation.php';


    // contact one

//    //$index = 1;
//    //var_dump($contact_one);
//      $contactId = $managerContact->getAll();
//      $testid = $contactId[$contact_one-1];


//    //$testid = $contactID->get($contact_one);
//    $agent_one_nat = ($contactId[$contact_one-1]->getNationality());
//    var_dump($agent_one_nat);
//    var_dump($country);
//
//    //if (isset($contact_two)) {
//    //  echo 'existe';
//    //} else {
//    //  echo 'nope';
//    //};
//
//    if (isset($agent_one_nat) && $country == $agent_one_nat) {
//      echo 'Egal';
//    } else {
//      echo 'Différent';
//    }

    //var_dump($contactID);
    //var_dump($testid);

    //$index= 0;
    //var_dump($agent_one);
    //$agentID = $managerAgent->getAll();
    //$testid = $agentID[$agent_one-1];
    ////$testid = $agentID->get($agent_one);
    //var_dump($agentID[$agent_one-1]->getNationality());
    ////var_dump($agentID);
    ////var_dump($testid);





    //$managerMission->create($newMission);
  };

?>

<main class="container-fluid">

  <form method="post" enctype="multipart/form-data">

    <div class="row mx-0 mt-2 justify-content-center text-center">

        <label for="title" class="form-label col-3 col-md-1 bg-success">Titre</label>
        <input type="text" name="title" placeholder="Titre de la mission" id="title" class="col-8 col-md-2" minlength="10" maxlength="30" required>

        <label for="codename" class="form-label col-3 col-md-1 bg-success">Code</label>
        <input class ="col-8 col-md-2" type="text" name="codename" placeholder="Code" id="codename" minlength="1" maxlength="20" required>

        <label for="speciality" class="form-label col-3 col-md-1 bg-success">Spécialité</label>
        <div class="col-6 col-md-2">
          <select name="speciality" id="speciality" class="form-select" required>
          <option value="" selected>---</option>
          <?php foreach ($specialities as $speciality): ?>
            <option value="<?= $speciality->getId() ?>"><?= $speciality->getSkill(); ?></option>
          <?php endforeach ?>
        </select>
        </div>

    </div>

    <div class="row mx-0 mt-2 justify-content-center text-center">

        <label for="mission_type" class="form-label col-3 col-md-1 bg-success">Type de mission</label>
        <input type="text" name="mission_type" placeholder="Type de mission" id="mission_type" class="col-8 col-md-2" minlength="10" maxlength="30" required>

        <label for="mission_status" class="form-label col-3 col-md-1 bg-success">Status de la mission</label>
        <input class ="col-8 col-md-2" type="text" name="mission_status" placeholder="Status de la mission" id="mission_status" minlength="5" maxlength="20" required>

    </div>

    <div class="row mx-0 mt-2 justify-content-center text-center">

      <label for="description" class="form-label col-3 col-md-1 bg-success">Description</label>
      <textarea name="description" id="description" class="col-6" rows="2" placeholder="Déscriptif de la mission" minlength="10" maxlength="400" required></textarea>

    </div>

    <div class="row mx-0 mt-2 justify-content-center text-center">

      <div class="col-8 col-md-1">
        <label for="date_start" class="bg-success">Date de début</label>
        <input type="date" id="date_start" name="date_start" required>
      </div>  

      <div class="col-8 col-md-1">
        <label for="date_end" class="bg-success">Date de fin</label>
        <input type="date" id="date_end" name="date_end" required>
      </div>
            
      <div class="col-8 col-md-2 mt-1 mt-sm-0">
        <label for="country" class="bg-success">Pays</label>
        <select name="country" id="country" class="form-select" required>
        <option value="" selected>---</option>
          <?php foreach ($countries as $country): ?>
            <option value="<?= $country->getId() ?>"><?= $country->getLocation(); ?></option>
          <?php endforeach ?>
        </select>
      </div>

    </div>

    <div class="row mx-0 mt-2 justify-content-center text-center">

      <div class="col-8 col-md-2">
          <label for="agent" class="bg-success">Agent(s)</label>
          <select name="agent_one" id="agent_one" class="form-select" required>
            <option value="" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="agent_two" id="agent_two" class="form-select">
          <option value="null" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="agent_three" id="agent_three" class="form-select">
          <option value="null" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
            
      <div class="col-8 col-md-2">
          <label for="target" class="bg-success">Cible(s)</label>
          <select name="target_one" id="target_one" class="form-select" required>
            <option value="" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="target_two" id="target_two" class="form-select">
          <option value="null" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="target_three" id="target_three" class="form-select">
          <option value="null" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
                  
      <div class="col-8 col-md-2">
          <label for="contact" class="bg-success">Contact(s)</label>
          <select name="contact_one" id="contact_one" class="form-select" required>
            <option value="" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId() ?>">
              <?= $contact->getFirst_name()." ".$contact->getLast_name()." -- ".$managerContact->getNatById($contact->getNationality()); ?></option>
            <?php endforeach ?>
          </select>
          <select name="contact_two" id="contact_two" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId() ?>">
              <?= $contact->getFirst_name()." ".$contact->getLast_name()." -- ".$managerContact->getNatById($contact->getNationality()); ?></option>
            <?php endforeach ?>
          </select>
          <select name="contact_three" id="contact_three" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId() ?>">
              <?= $contact->getFirst_name()." ".$contact->getLast_name()." -- ".$managerContact->getNatById($contact->getNationality()); ?></option>
            <?php endforeach ?>
          </select> 
      </div>
            
      <div class="col-8 col-md-2">
          <label for="hideout" class="bg-success">Planque(s)</label>
          <select name="hideout_one" id="hideout_one" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="hideout_two" id="hideout_two" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="hideout_three" id="hideout_three" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
      </div>

    </div>

      <!-- Bouton de confirmation --> 

    <div class="row mx-0 mt-4 justify-content-center">
      
      <div class="col-1">
        <input type="submit" class="btn btn-warning" value="Créer une mission">
      </div>
      
    </div>  
       
  </form>
</main>

</body>

<?php include '../vues/footer.php';