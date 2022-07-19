<?php

  if ($_POST) {
    $title = $_POST["title"];
    $codename = $_POST["code"];
    $idSpeciality = $_POST["speciality"];
    $description = $_POST["description"];
    $date_start = $_POST["début"];
    $date_end = $_POST["fin"];
    $idCountry = $_POST["country"];
    $idAgent1 = $_POST["agent1"];
    $idAgent2 = $_POST["agent2"];
    $idAgent3 = $_POST["agent3"];
    $idTarget1 = $_POST["target1"];
    $idTarget2 = $_POST["target2"];
    $idTarget3 = $_POST["target3"];
    $idContact1 = $_POST["contact1"];
    $idContact2 = $_POST["contact2"];
    $idContact3 = $_POST["contact3"];
    $idHideout1 = $_POST["hideout1"];
    $idHideout2 = $_POST["hideout2"];
    $idHideout3 = $_POST["hideout3"];
  }

?>

<main class="container-fluid">

  <form method="post">

    <div class="row m-0">
        <label for="title" class="form-label col-3 col-md-1 bleuF">Titre</label>
        <input type="text" name="title" placeholder="Titre de la mission" id="title" class="col-8 col-md-2" minlength="10" maxlength="30">

        <label for="code" class="form-label col-3 col-md-1 bleuF">Nom de code</label>
        <input class ="col-8 col-md-2" type="text" name="code" placeholder="Code" id="code" minlength="5" maxlength="20">

        <label for="speciality" class="form-label col-3 col-md-1 bleuF">Spécialité</label>
        <div class="col-6 col-md-2">
          <select name="speciality" id="speciality" class="form-select">
          <?php foreach ($specialities as $speciality): ?>
            <option value="<?= $speciality->getId() ?>"><?= $speciality->getSkill(); ?></option>
          <?php endforeach ?>
        </select>
        </div>
    </div>

    <div  class="row m-0 mt-2">
      <label for="description" class="form-label col-3 col-md-1 bleuF ">Description</label>
      <textarea name="description" id="description" class="col-6" rows="2" placeholder="Déscription de la mission" minlength="10" maxlength="150"></textarea>
    </div>

    <div class="row m-0 mt-2">
      
    <!-- inutile pour le "create", à conserver pour le "update"

    <div class="col-2">
      <label for="status">Status mission</label>
      <select name="status" id="status" class="form-select">
        <option selected>En préparation</option>
        <option selected>En cours</option>
        <option selected>Terminée</option>
      </select>
    </div>

    ------------------------------------------------------ -->


      <div class="col-8 col-md-1">
        <label for="début" class="bleuF">Date de début</label>
        <input type="date" id="début" name="début">
      </div>  

      <div class="col-8 col-md-1">
        <label for="fin" class="bleuF">Date de fin</label>
        <input type="date" id="fin" name="fin">
      </div>
            
      <div class="col-8 col-md-2 mt-1 mt-sm-0">
        <label for="country" class="bleuF">Pays</label>
        <select name="country" id="country" class="form-select">
          <?php foreach ($countries as $country): ?>
            <option value="<?= $country->getId() ?>"><?= $country->getLocation(); ?></option>
          <?php endforeach ?>
        </select>
      </div>



    </div>

    <div class="row m-0 mt-2">

      <div class="col-8 col-md-2">
          <label for="agent" class="bleuF">Agent(s)</label>
          <select name="agent1" id="agent1" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="agent2" id="agent2" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="agent3" id="agent3" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($agents as $agent): ?>
              <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
            
      <div class="col-8 col-md-2">
          <label for="target" class="bleuF">Cible(s)</label>
          <select name="target1" id="target1" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="target2" id="target2" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="target3" id="target3" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($targets as $target): ?>
              <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
            
      <div class="col-8 col-md-2">
          <label for="contact" class="bleuF">Contact(s)</label>
          <select name="contact1" id="contact1" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="contact2" id="contact2" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="contact3" id="contact3" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($contacts as $contact): ?>
              <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
            
      <div class="col-8 col-md-2">
          <label for="hideout" class="bleuF">Planque(s)</label>
          <select name="hideout1" id="hideout1" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="hideout2" id="hideout2" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
          <select name="hideout3" id="hideout3" class="form-select">
            <option value="<?= NULL ?>" selected>---</option>
            <?php foreach ($hideouts as $hideout): ?>
              <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
            <?php endforeach ?>
          </select>
      </div>
    
            <!-- Bouton de confirmation --> 

      <div class="row m-0 mt-4">
        <div class="col-2">
          <input type="submit" class="btn btn-success" value="Créer">
        </div>
      </div>  

    </div>
    
  </form>
</main>