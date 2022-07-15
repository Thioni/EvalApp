<?php

class Speciality {
  private $id;
  private $skill;

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

  public function getSkill()
  {
    return $this->skill;
  }

  public function setSkill($skill)
  {
    $this->skill = $skill;

    return $this;
  }
}