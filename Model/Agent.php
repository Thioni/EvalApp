<?php

class Agent {
  private $id;
  private $first_name;
  private $last_name;
  private $birthdate;
  private $code_agent;
  private $nationality;

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

  public function getLast_name()
  {
      return $this->last_name;
  }
  
  public function setLast_name($last_name)
  {
      $this->last_name = $last_name;
      return $this;
  }

  public function getBirthdate()
  {
      return $this->birthdate;
  }
  public function setBirthdate($birthdate)
  {
      $this->birthdate = $birthdate;
      return $this;
  }
  
  public function getCode_agent()
  {
      return $this->code_agent;
  }
  public function setCode_agent($code_agent)
  {
      $this->code_agent = $code_agent;
      return $this;
  }
  
  public function getNationality()
  {
      return $this->nationality;
  }
  public function setNationality($nationality)
  {
      $this->nationality = $nationality;
      return $this;
  }
}