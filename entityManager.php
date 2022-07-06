<?php
// Doctrine

require_once 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

function getEntityManager(): EntityManager
{
  $dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'spycraft',
  ];
  
  $configuration = Setup::createAnnotationMetadataConfiguration(['entities'], true, null, null, false);
  //A passer en false une fois en prod
  // Pour tester la création des tables sans executer :
  // vendor/bin/doctrine orm:schema-tool:create --dump-sql
  // Pour créer les tables :
  // vendor/bin/doctrine orm:schema-tool:create
  
  return EntityManager::create($dbParams, $configuration);
}

