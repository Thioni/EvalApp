<?php

class Skill {
  private $agents_id;
  private $specialities_id;

  public function __construct(array $data) {
    $this->hydrate($data);
  }

  public function hydrate(array $data) {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

// Getters and Setters

  public function getAgents_id()
  {
      return $this->agents_id;
  }

  public function setAgents_id($agents_id)
  {
      $this->agents_id = $agents_id;
      return $this;
  }

  public function getSpecialities_id()
  {
      return $this->specialities_id;
  }
  
  public function setSpecialities_id($specialities_id)
  {
      $this->specialities_id = $specialities_id;
      return $this;
  }
}