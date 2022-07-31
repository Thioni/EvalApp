<?php

require './ContactManager.php';

$managerContact = new ContactManager();
$managerContact->delete($_GET["id"]);

header("Location: ../vues/listContacts.php");

?>

<div class="col-1 offset-6 mb-3">    
    <a href="deleteContact.php?id=<?= $contact->getId() ?>" class="btn btn-danger">Supprimer</a>
</div>