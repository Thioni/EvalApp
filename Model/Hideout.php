<?php

class Hideout {
  private $id;
  private $code_hideout;
  private $adress;
  private $type;
  private $country;

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

 public function getCode_hideout()
  {
      return $this->code_hideout;
  }
 public function setCode_hideout($code_hideout)
  {
      $this->code_hideout = $code_hideout;
     return $this;
  }

 public function getAdress()
  {
      return $this->adress;
  }
 public function setAdress($adress)
  {
      $this->adress = $adress;
     return $this;
  }

 public function getType()
  {
      return $this->type;
  }
 public function setType($type)
  {
      $this->type = $type;
     return $this;
  }
  
 public function getCountry()
  {
      return $this->country;
  }
 public function setCountry($country)
  {
      $this->country = $country;
     return $this;
  }
}