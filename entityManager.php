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
  ];
  
  $configuration = Setup::createAnnotationMetadataConfiguration(['/entities'], true);
  //A passer en false une fois en prod
  
  return EntityManager::create($dbParams, $configuration);
}

