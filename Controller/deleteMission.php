<?php

require './MissionManager.php';

$managerMission = new MissionManager();
$managerMission->delete($_GET["id"]);

header("Location: ../vues/listMissions.php");

?>

<div class="col-1 offset-6 mb-3">    
    <a href="deleteMission.php?id=<?= $mission->getId() ?>" class="btn btn-danger">Supprimer</a>
</div>