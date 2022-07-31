<?php require 'header.php'; ?>

<body class="bg-secondary">

<?php foreach ($hideouts as $hideout): ?>

  <div class="container-fluid mt-2">
  
 
    <section class="row justify-content-center text-center">
  

      <div class="col-1 bg-primary text-center">COUNTRY</div>
      <div class="col-2 bg-primary text-center">ADRESS</div>
      <div class="col-2 bg-primary text-center">CODE PLANQUE</div>
      <div class="col-2 bg-primary text-center">TYPE</div>
  
    </section>
    
    <section class="row justify-content-center text-center">
   
      <div class="col-1 bg-light text-center">
        <?php foreach ($countries as $country): ?>
          <?= $hideout->getCountry() === $country->getId() ? $country->getLocation() : ""; ?>
        <?php endforeach ?>
      </div >
        
      <div class="col-2 bg-light text-center"><?= $hideout->getAdress(); ?></div>

      <div class="col-2 bg-light text-center"><?= $hideout->getCode_hideout(); ?></div>

      <div class="col-2 bg-light text-center"><?= $hideout->getType(); ?></div>

    </section>
        
    <section class="row">
        
    <?php if (isset($_SESSION['connecté']) && $_SESSION['connecté'] === true) { ?>
    <div class="col-1 offset-6 mb-3">    
      <a href="../Controller/deleteHideout.php?id=<?= $hideout->getId() ?>" class="btn btn-danger">Supprimer</a>
    </div>
    <?php } ?>
    
    </section>
    
  </div>
    
  <?php endforeach; ?>

</body>

<?php require 'footer.php'; ?>