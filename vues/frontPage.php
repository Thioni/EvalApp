<body class="bg-secondary">

  <section class="d-flex flex-wrap justify-content-center bg-secondary">

    <div class="row row-cols-2"></div>
    <?php foreach ($missions as $mission): ?>    
      <div class="card m-5 bg-dark" style="width: 18rem;">
        <div class="card-body">
          <h3 class="card-title text-secondary">MISSION</h3>
          <h4 class="card-title text-light"><?= $mission->getTitle(); ?></h4>
          <h5 class="card-title text-secondary">Description</h5>
          <p class="card-text text-light"><?= $mission->getDescription(); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

  </section>
</body>