<body class="bg-secondary">

<?php require '../vues/header.php'; ?>

<?php

  if ($_POST) {
    $code_hideout = $_POST["code_hideout"];
    $adress = $_POST["adress"];
    $type = $_POST["type"];
    $country = $_POST["country"];

    $newHideout = new Hideout([
      "code_hideout" => $code_hideout,
      "adress" => $adress,
      "type" => $type,
      "country" => $country,
    ]);
   
    $managerHideout->create($newHideout);    

  };
  
?>

  <main class="container-fluid">
  
    <form method="post" enctype="multipart/form-data">

      <div class="row mt-2 justify-content-center text-center">
        
        <div class="col-6 col-md-2 mt-1">
          <label for="country" class="bg-success">Pays</label>
          <select name="country" id="country" class="form-select">
            <?php foreach ($countries as $country): ?>
              <option value="<?= $country->getId() ?>"><?= $country->getLocation(); ?></option>
            <?php endforeach ?>
          </select>
        </div>
      
      </div>  

      <div class="row mt-2 justify-content-center text-center">

        <div class="col-6 col-md-2 mt-1">
          <label for="type" class="bg-success">Type</label>
            <select name="type" id="type" class="form-select">
              <?php foreach ($hideouts as $hideout): ?>
                <option value="<?= $hideout->getId() ?>"><?= $hideout->getType(); ?></option>
              <?php endforeach ?>
            </select>
        </div>

      </div>

      <div class="row row-cols-1 mt-2 justify-content-center text-center">  
        <label for="adress" class="form-label col-1 mb-0 bg-success align-self-center">Adresse</label>
      </div>

      <div class="row row-cols-1 mt-0 justify-content-center text-center">       
        <input class ="col-3 text-center" type="text" name="adress" placeholder="Adresse de la planque" id="adress" minlength="3" maxlength="30">
      </div>  
      
      <div class="row row-cols-1 mt-2 justify-content-center text-center">        
        <label for="code_hideout" class="form-label col-3 col-md-1 mb-0 bg-success">Code planque</label>
      </div>  

      <div class="row row-cols-1 mt-0 justify-content-center text-center">
        <input class ="col-8 col-md-2 text-center" type="text" name="code_hideout" placeholder="Code planque" id="code_hideout" minlength="1" maxlength="10">
      </div>  
      
        
        <!-- Bouton de confirmation --> 
            
      <div class="row m-0 mt-4 justify-content-center">
            
        <div class="col-1">
          <input type="submit" class="btn btn-warning" value="Créer une planque">
        </div>
            
      </div>  
            
    </form>

  </main>

</body>

<?php include '../vues/footer.php';