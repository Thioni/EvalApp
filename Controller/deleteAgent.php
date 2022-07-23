<?php

require './AgentManager.php';

$managerAgent = new AgentManager();
$managerAgent->delete($_GET["id"]);

header("Location: ../index.php");

?>

<div class="col-1 offset-6 mb-3">    
    <a href="deleteAgent.php?id=<?= $agent->getId() ?>" class="btn btn-danger">Supprimer</a>
</div>