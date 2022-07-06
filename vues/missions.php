<?php
  require_once 'classes/Agent.php';

  $agent1 = new Agent();
  $agent1->name;
  $choice= 11;
  
?>

<div class="row mt-5">
  <div class="col-2 test">
    Missions
  </div>
  <div class="col-2 test2">
    Nom de code
  </div>
  <div class="col-2 test">
    Status
  </div>
  <div class="col-3 test2">
    Date de début
  </div>
  <div class="col-3 test">
    Date de fin
  </div>
</div>

<div class="row">
  <div class="col-2">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Select a mission
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
            <a class="dropdown-item" href="vues/footer.html">
              <?php
                $pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
                foreach ($pdo->query("SELECT title FROM missions WHERE missions.id =3", PDO::FETCH_DEFAULT) as $test) {
                echo $test['title'];
                };
              ?>
            </a>
          </li>
        </ul>
      </div>  
  </div>
  <div class="col-2">
    <?php
    //  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
    //  $hope = ($pdo->query('SELECT id FROM codenames', PDO::FETCH_ASSOC));
    //  $hopee = ($pdo->query('SELECT codename FROM missions', PDO::FETCH_DEFAULT));
    //  $hopeee = ($pdo->query('SELECT alias FROM codenames', PDO::FETCH_DEFAULT));
    //  while  ($hope['id'] === $hopee['codename']) {
    //    echo $hopeee['alias'];
    // }
     try {
       $pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
       foreach ($pdo->query("SELECT id, alias FROM codenames WHERE codenames.id =$choice", PDO::FETCH_ASSOC) as $code) {
         echo $code['id'].' '.$code['alias'].'<br>';
       };
     } catch (PDOException $e) {
         echo ' Et oui, la merdasse';
     }
    ?>
  </div>
  <div class="col-2">
    placeholder
  </div>
  <div class="col-3">
    placeholder
  </div>
  <div class="col-3">
    placeholder
  </div>
</div>

<div class="row mt-5">
  <div class="col-9 test">
    Description
  </div>
  <div class="col-3 test3">
    Pays
  </div>
</div>

<div class="row">
  <div class="col-9">
    placeholder
  </div>
  <div class="col-3">
    placeholder 
  </div>
</div>

<div class="row mt-5">
  <div class="col-4 test">
    Type
  </div>
  <div class="col-4 test2">
    Hideout
  </div>
  <div class="col-4 test">
    Target
  </div>
</div>

<div class="row">
  <div class="col-4">
    placeholder
  </div>
  <div class="col-4">
    placeholder 
  </div>
  <div class="col-4">
    placeholder
  </div>
</div>

<div class="row mt-5">
  <div class="col-4 test2 specialty">
    Specialty
  </div>
  <div class="col-4 test">
    Agent
  </div>
  <div class="col-4 test2">
    Contact
  </div>
</div>

<?php
//  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
//  $tabtest = $pdo->query('SELECT skill FROM specialities WHERE specialities.id < 11', PDO::FETCH_ASSOC);
//  $data = $tabtest->fetchALL();
?>

<!-- speciality -->

<?php
$ops='';
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
$stmt = $pdo->query("SELECT id, skill FROM specialities");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $ops.= "<option>".$row['skill']."</option>";
};
?>

  <div class="row">
    <div class="col-4">
        <select>
          <?php echo $ops;?>
        </select>
    </div>

<!-- agent -->

<?php
$opsd='';
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=spycraft','root','');
$stmtd = $pdo->query("SELECT first_name, specialities.skill FROM specialities 
JOIN agents_skills ON specialities.id = agents_skills.specialities_id 
JOIN agents ON agents_skills.agents_id = agents.id;");

while ($rowd = $stmtd->fetch(PDO::FETCH_ASSOC)) {
  $opsd.= "<p>".$rowd['first_name']."</p>";
};

?>

  <div class="col-4">
      <p>
        <?php echo $opsd;?>
      </p>
  </div>

  <!-- contact -->

  <div class="col-4">
    placeholder contact
  </div>
</div>