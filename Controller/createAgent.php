<body class="bg-dark">

<?php

include '../vues/header.php';

?>

<section class="row">
  <div class="col-1">
    <a href="../index.php" class="btn btn-success mb-3">Retour</a>
  </div>
  <div class="col-1">
    <a href="createMission.php" class="btn btn-warning mb-3">Nouvelle mission</a>
  </div>
  <div class="col-1">
    <a href="createTarfget.php" class="btn btn-warning mb-3">Nouvelle cible</a>
  </div>
</section>

<?php

require './AgentManager.php';
$managerAgent = new AgentManager();
$agents = $managerAgent->getAll();

require './SpecialityManager.php';
$managerSpeciality = new SpecialityManager();
$specialities = $managerSpeciality->getAll();

require './CountryManager.php';
$managerCountry = new CountryManager();
$countries = $managerCountry->getAll();

require './SkillManager.php';
$managerSkill = new SkillManager();
$skills = $managerSkill->getAll();

  if ($_POST) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthdate = $_POST["birthdate"];
    $code_agent = $_POST["code_agent"];
    $nationality = $_POST["nationality"];
    $skill_one = $_POST["skill_one"];
    $skill_two = $_POST["skill_two"]; //=== "null" ? settype($skill_two, "null") : $_POST["skill_two"];
    $skill_three = $_POST["skill_three"];

    $newAgent = new Agent([
      "first_name" => $first_name,
      "last_name" => $last_name,
      "birthdate" => $birthdate,
      "code_agent" => $code_agent,
      "nationality" => $nationality,
    ]);
   
    $managerAgent->create($newAgent);

    //                            Ecriture des compétences de l'agent

    $idAgent = $managerAgent->getLastAgentId();

    $newSkill = new Skill([
      "agents_id" =>$idAgent,
      "specialities_id" =>$skill_one,
    ]);
    $managerSkill->create($newSkill);
    //var_dump($skill_one);

    if ($skill_two !== "null") {
      $newSkill = new Skill([
        "agents_id" =>$idAgent,
        "specialities_id" =>$skill_two,
      ]);
      $managerSkill->create($newSkill);
      //var_dump($skill_two);
    }

    if ($skill_three !== "null") {
      $newSkill = new Skill([
        "agents_id" =>$idAgent,
        "specialities_id" =>$skill_three
      ]);
      $managerSkill->create($newSkill);
    }

  };
  
?>

<main class="container-fluid">

  <form method="post" enctype="multipart/form-data">

    <div class="row m-0 justify-content-center text-center">

      <label for="first_name" class="form-label col-3 col-md-1 bg-success">Prénom</label>
      <input type="text" name="first_name" placeholder="Prénom de l'agent" id="first_name" class="col-8 col-md-2" minlength="3" maxlength="30">

      <label for="last_name" class="form-label col-3 col-md-1 bg-success">Nom</label>
      <input class ="col-8 col-md-2" type="text" name="last_name" placeholder="Nom de famille" id="last_name" minlength="3" maxlength="30">

      <label for="code_agent" class="form-label col-3 col-md-1 bg-success">Code Agent</label>
      <input class ="col-8 col-md-2" type="text" name="code_agent" placeholder="Nom de code" id="code_agent" minlength="1" maxlength="10">

    </div>

    <div  class="row m-0 mt-2 justify-content-center text-center">

      <label for="speciality" class="form-label col-3 col-md-1 bg-success">Spécialité 1</label>
          <div class="col-6 col-md-2">
            <select name="skill_one" id="skill_one" class="form-select">
            <option value="" selected>---</option>
            <?php foreach ($specialities as $speciality): ?>
              <option value="<?= $speciality->getId() ?>"><?= $speciality->getSkill(); ?></option>
            <?php endforeach ?>
            </select>
          </div>

      <label for="speciality" class="form-label col-3 col-md-1 bg-success">Spécialité 2</label>
          <div class="col-6 col-md-2">
            <select name="skill_two" id="skill_two" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($specialities as $speciality): ?>
              <option value="<?= $speciality->getId() ?>"><?= $speciality->getSkill(); ?></option>
            <?php endforeach ?>
            </select>
          </div>

      <label for="speciality" class="form-label col-3 col-md-1 bg-success">Spécialité 3</label>
          <div class="col-6 col-md-2">
            <select name="skill_three" id="skill_three" class="form-select">
            <option value="null" selected>---</option>
            <?php foreach ($specialities as $speciality): ?>
              <option value="<?= $speciality->getId() ?>"><?= $speciality->getSkill(); ?></option>
            <?php endforeach ?>
            </select>
          </div>

    </div>

    <div class="row m-0 mt-2 justify-content-center text-center">

    <div class="col-8 col-md-1">
        <label for="birthdate" class="bg-success">Date de naissance</label>
        <input type="date" id="birthdate" name="birthdate">
      </div>

      <div class="col-8 col-md-2 mt-1 mt-sm-0">
        <label for="nationality" class="bg-success">Pays d'origine</label>
        <select name="nationality" id="nationality" class="form-select">
          <?php foreach ($countries as $country): ?>
            <option value="<?= $country->getId() ?>"><?= $country->getLocation(); ?></option>
          <?php endforeach ?>
        </select>
      </div>

    </div>

      <!-- Bouton de confirmation --> 

    <div class="row m-0 mt-4 justify-content-center">
      
      <div class="col-1">
        <input type="submit" class="btn btn-warning" value="Créer un agent">
      </div>
      
    </div>  
       
  </form>
</main>

</body>