<?php

require './HideoutManager.php';

$managerHideout = new HideoutManager();
$managerHideout->delete($_GET["id"]);

header("Location: ../vues/listHideouts.php");

?>

<div class="col-1 offset-6 mb-3">    
    <a href="deleteHideout.php?id=<?= $contact->getId() ?>" class="btn btn-danger">Supprimer</a>
</div>