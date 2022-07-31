<?php

require './TargetManager.php';

$managerTarget = new TargetManager();
$managerTarget->delete($_GET["id"]);

header("Location: ../vues/listTargets.php");

?>

<div class="col-1 offset-6 mb-3">    
    <a href="deleteAgent.php?id=<?= $target->getId() ?>" class="btn btn-danger">Supprimer</a>
</div>