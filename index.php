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
require_once 'vendor/autoload.php';
require_once 'entityManager.php';
include 'vues/header.html';
include 'vues/missions.php';
include 'vues/footer.html';

$entityManager = getEntityManager();
