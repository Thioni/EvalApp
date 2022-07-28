<body class="bg-secondary">

<?php

require '../vues/header.php';

?>
<!--
<section class="row">
  <div class="col-1">
    <a href="../index.php" class="btn btn-success mb-3">Retour</a>
  </div>
  <div class="col-1">
    <a href="createMission.php" class="btn btn-warning mb-3">Nouvelle mission</a>
  </div>
  <div class="col-1">
    <a href="createAgent.php" class="btn btn-warning mb-3">Nouvel agent</a>
  </div>  
</section>
-->

<?php

//require './TargetManager.php';
//$managerTarget = new TargetManager();
//$targets = $managerTarget->getAll();
//
//require './CountryManager.php';
//$managerCountry = new CountryManager();
//$countries = $managerCountry->getAll();
//
//require './CodenameManager.php';
//$managerCodename = new CodenameManager();
//$codenames = $managerCodename->getAll();

  if ($_POST) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthdate = $_POST["birthdate"];
    $codename = $_POST["codename"];
    $nationality = $_POST["nationality"];

    $newTarget = new Target([
      "first_name" => $first_name,
      "last_name" => $last_name,
      "birthdate" => $birthdate,
      "codename" => $codename,
      "nationality" => $nationality,
    ]);
   
    $managerTarget->create($newTarget);    

  };
  
?>

<main class="container-fluid">

  <form method="post" enctype="multipart/form-data">

    <div class="row m-0 justify-content-center text-center">

      <label for="first_name" class="form-label col-3 col-md-1 bg-success">Prénom</label>
      <input type="text" name="first_name" placeholder="Prénom" id="first_name" class="col-8 col-md-2" minlength="3" maxlength="30">

      <label for="last_name" class="form-label col-3 col-md-1 bg-success">Nom</label>
      <input class ="col-8 col-md-2" type="text" name="last_name" placeholder="Nom de famille" id="last_name" minlength="3" maxlength="30">

      <label for="codename" class="form-label col-3 col-md-1 bg-success">Nom de code</label>
      <input class ="col-8 col-md-2" type="text" name="codename" placeholder="Nom de code" id="codename" minlength="1" maxlength="10">

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
        <input type="submit" class="btn btn-warning" value="Créer une cible">
      </div>
      
    </div>  
       
  </form>
</main>

</body>

<?php include '../vues/footer.php';