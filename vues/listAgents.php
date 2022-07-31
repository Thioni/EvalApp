<?php require './header.php'; ?>

<body class="bg-secondary">  

  <?php foreach ($agents as $agent): ?>

  <div class="container-fluid">

    <section class="row m-0 justify-content-center text-center">

      <div class="col-2 bg-success text-center">AGENT</div>

    </section>

    <section class="row m-0 justify-content-center text-center">

      <div class="col-2 bg-light fs-3 text-uppercase text-center"><?= $agent->getFirst_name()." ".$agent->getLast_name(); ?></div>

    </section>

    <section class="row m-0 justify-content-center text-center">

      <div class="col-1 bg-primary text-center">DATE DE NAISSANCE</div>
      <div class="col-1 bg-primary text-center">PAYS</div>
      <div class="col-1 bg-primary text-center">CODE AGENT</div>
      <div class="col-2 bg-primary text-center">COMPETENCES</div>

    </section>

    <section class="row m-0 justify-content-center text-center mb-1">

      <div class="col-1 bg-light text-center">
        <?php $convertTimestamp = strtotime($agent->getBirthdate());
        echo $frenchFormat = date("d-m-Y", $convertTimestamp); ?>
      </div>

      <div class="col-1 bg-light text-center">
        <?php foreach ($countries as $country): ?>
          <?= $agent->getNationality() === $country->getId() ? $country->getLocation() : ""; ?>
        <?php endforeach; ?>
      </div >

      <div class="col-1 bg-light text-center">
          <?= $agent->getCode_agent(); ?>
      </div >

      <div class="col-2 bg-light text-center">      
        
        <?php

          $idAgents = $agent->getId();
          $managerSkill->getSkills($idAgents);

        ?>

      </div>

    </section>

    <section class="row m-0 justify-content-center text-center">

    <div class="col-1 offset-4 mb-3">    
      <a href="../Controller/deleteAgent.php?id=<?= $agent->getId() ?>" class="btn btn-danger">Supprimer</a>
    </div>

    </section>

  </div>

  <?php endforeach; ?>

</body>

<?php include 'footer.php';