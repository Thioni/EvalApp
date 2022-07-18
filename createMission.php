<main class="container-fluid">

  <form method="post">

    <div class="row m-0">
        <label for="titre" class="form-label col-3 col-md-1 bleuF">Titre</label>
        <input type="text" name="titre" placeholder="Titre de la mission" id="titre" class="col-8 col-md-2" minlength="10" maxlength="30">

        <label for="code" class="form-label col-3 col-md-1 bleuF">Nom de code</label>
        <input class ="col-8 col-md-2" type="text" name="code" placeholder="Code" id="code" minlength="5" maxlength="20">

        <label for="code" class="form-label col-3 col-md-1 bleuF">Spécialité</label>
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
  
   </form>

  <form action="post" class="row m-0 mt-2">
      
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



  </form>

  <form action="post" class="row m-0 mt-2">

    <div class="col-8 col-md-2">
        <label for="agent" class="bleuF">Agent(s)</label>
        <select name="agent" id="agent" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($agents as $agent): ?>
            <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="agent" id="agent" class="form-select">
        <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($agents as $agent): ?>
            <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="agent" id="agent" class="form-select">
        <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($agents as $agent): ?>
            <option value="<?= $agent->getId()?>"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
    </div>

    <div class="col-8 col-md-2">
        <label for="target" class="bleuF">Cible(s)</label>
        <select name="target" id="target" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($targets as $target): ?>
            <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="target" id="target" class="form-select">
        <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($targets as $target): ?>
            <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="target" id="target" class="form-select">
        <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($targets as $target): ?>
            <option value="<?= $target->getId()?>"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
    </div>

    <div class="col-8 col-md-2">
        <label for="contact" class="bleuF">Contact(s)</label>
        <select name="contact" id="contact" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($contacts as $contact): ?>
            <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="contact" id="contact" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($contacts as $contact): ?>
            <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="contact" id="contact" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($contacts as $contact): ?>
            <option value="<?= $contact->getId()?>"><?= $contact->getFirst_name()." ".$contact->getLast_name(); ?></option>
          <?php endforeach ?>
        </select>
    </div>

    <div class="col-8 col-md-2">
        <label for="hideout" class="bleuF">Planque(s)</label>
        <select name="hideout" id="hideout" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($hideouts as $hideout): ?>
            <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="hideout" id="hideout" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($hideouts as $hideout): ?>
            <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
          <?php endforeach ?>
        </select>
        <select name="hideout" id="hideout" class="form-select">
          <option value="<?= NULL ?>" selected>---</option>
          <?php foreach ($hideouts as $hideout): ?>
            <option value="<?= $hideout->getId()?>"><?= $hideout->getAdress(); ?></option>
          <?php endforeach ?>
        </select>
    </div>


  </form>

  <!-- Bouton de confirmation -->  

  <div class="row m-0 mt-4">
    <div class="col-2">
      <input type="submit" class="btn btn-success" value="Créer">
    </div>
  </div>  

</main>