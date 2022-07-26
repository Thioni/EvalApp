<?php

class Administrator {
  private $id;
  private $first_name;
  private $last_name;
  private $creation_date;
  private $password;
  private array $roles = [];

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

  public function getId()
  {
      return $this->id;
  }

  public function setId($id)
  {
      $this->id = $id;
      return $this;
  }
//
//  public function getFirst_name()
//  {
//      return $this->first_name;
//  }
//
//  public function setFirst_name($first_name)
//  {
//      $this->first_name = $first_name;
//      return $this;
//  }
//
//  public function getLast_name()
//  {
//      return $this->last_name;
//  }
//
//  public function setLast_name($last_name)
//  {
//      $this->last_name = $last_name;
//      return $this;
//  }
//
//  public function getCreation_date()
//  {
//      return $this->creation_date;
//  }
//
//  public function setCreation_date($creation_date)
//  {
//      $this->creation_date = $creation_date;
//      return $this;
//  }

  public function getPassword()
  {
      return $this->password;
  }
  
  public function setPassword($password)
  {
      $this->password = $password;
      return $this;
  }
}