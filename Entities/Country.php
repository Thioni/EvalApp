<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="countries")
 */

class Country
{
  /**
   * @ORM\Column(name="id", type="string")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private int $id;

  /**
   * @ORM\Column(name="location", type="string")
   */  
  private string $location;

  /**
   * @ORM\OneToMany(targetEntity="Agent", mappedBy="nationality")
   */
  private array $agent;
}