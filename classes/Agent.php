<?php

class Agent {
  private $id;
  private $first_name;

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

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getFirst_name()
  {
      return $this->first_name;
  }
  
  public function setFirst_name($first_name)
  {
      $this->first_name = $first_name;
      return $this;
  }
}