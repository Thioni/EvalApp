<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Spycraft, site d'espionnage depuis 1889 (oui, avant le web)">
  <title>Spycraft</title>
  <link rel="stylesheet" href="vues/bootstrap.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <script src="bootstrap.bundle.min.js"></script> <!-- à remettre en footer? -->
</head>

<?php
//require_once 'vendor/autoload.php';
//require_once 'entityManager.php';
include 'vues/header.html';
?>

<div>
  <a href="createMission.php" class="btn btn-success">Créer une nouvelle mission</a>
</div>
<br>

  <!-- bouton temporaire
    *permet d'aller à la page createMission
    *au final il serait plus interressant d'utiliser AJAX pour rester sur la même page et la modifier (?)
  -->

<?php
include 'vues/missionsList.php';
//include 'createAgent.php';
include 'createMission.php';
//include 'vues/footer.html';

//$entityManager = getEntityManager();