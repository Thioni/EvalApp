<?php require './header.php'; ?>

<body class="bg-secondary">  

  <?php foreach ($targets as $target): ?>

  <div class="container-fluid">

    <section class="row m-0 justify-content-center text-center">

      <div class="col-2 bg-success text-center">CIBLE</div>

    </section>

    <section class="row m-0 justify-content-center text-center">

      <div class="col-2 bg-light fs-3 text-uppercase text-center"><?= $target->getFirst_name()." ".$target->getLast_name(); ?></div>

    </section>

    <section class="row m-0 justify-content-center text-center">

      <div class="col-1 bg-primary text-center">DATE DE NAISSANCE</div>
      <div class="col-1 bg-primary text-center">PAYS</div>
      <div class="col-2 bg-primary text-center">NOM DE CODE</div>

    </section>

    <section class="row m-0 justify-content-center text-center mb-1">

      <div class="col-1 bg-light text-center">
        <?php $convertTimestamp = strtotime($target->getBirthdate());
        echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
      </div>

      <div class="col-1 bg-light text-center">
        <?php foreach ($countries as $country): ?>
          <?= $target->getNationality() === $country->getId() ? $country->getLocation() : ""; ?>
        <?php endforeach; ?>
      </div >

      <div class="col-2 bg-light text-center">
        <?php foreach ($codenames as $codename): ?>
            <?= $target->getCodename() === $codename->getId() ? $codename->getAlias() : ""; ?>
          <?php endforeach; ?>
      </div >

    </section>

    <section class="row m-0 justify-content-center text-center">

    <div class="col-1 offset-3 mb-3">    
      <a href="../Controller/deleteTarget.php?id=<?= $target->getId() ?>" class="btn btn-danger">Supprimer</a>
    </div>

    </section>

  </div>

  <?php endforeach; ?>

</body>

<?php include 'footer.php';