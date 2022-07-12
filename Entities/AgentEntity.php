<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agents")
 */

class Agent
{
  /**
   * @ORM\Column(name="id", type="string")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private int $id;

  /**
   * @ORM\Column(name="first_name", type="string")
   */  
  private string $first_name;

  /**
   * @ORM\Column(name="last_name", type="string")
   */
  private string $last_name;

  /**
   * @ORM\Column(name="birthdate", type="string")
   */
  private string $birthdate;

  /**
   * @ORM\Column(name="code_agent", type="string")
   */
  private int $code_agent;

  /**
   * @ORM\ManyToOne(targetEntity="Country", inversedBy="agent")
   */
  private Country $location;
}