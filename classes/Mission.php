<?php

class Mission {
  private $id;
  private $title;
  private $description;
  private $mission_type;
  private $mission_status;
  private $date_start;
  private $date_end;
  private $codename;
  private $country;
  private $agent_one;
  private $agent_two;
  private $agent_three;
  private $target_one;
  private $target_two;
  private $target_three;
  private $contact_one;
  private $contact_two;
  private $contact_three;
  private $hideout_one;
  private $hideout_two;
  private $hideout_three;
  private $speciality;

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

  // Getters - pour pouvoir acceder à nos valeurs, qui sont déclarées en private

  public function getId() {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }

    /**
   * Set the value of title
   *
   * @return  self
   */ 
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getMission_type()
  {
    return $this->mission_type;
  }

  public function getMission_status()
  {
    return $this->mission_status;
  }

  public function getDate_start()
  {
    return $this->date_start;
  }

  public function getDate_end()
  {
    return $this->date_end;
  }

  public function getCodename()
  {
    return $this->codename;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function getAgent_one()
  {
    return $this->agent_one;
  }

  public function getAgent_two()
  {
    return $this->agent_two;
  }

  public function getAgent_three()
  {
    return $this->agent_three;
  }

  public function getTarget_one()
  {
    return $this->target_one;
  }

  public function getTarget_two()
  {
    return $this->target_two;
  }

  public function getTarget_three()
  {
    return $this->target_three;
  }

  public function getContact_one()
  {
    return $this->contact_one;
  }

  public function getContact_two()
  {
    return $this->contact_two;
  }

  public function getContact_three()
  {
    return $this->contact_three;
  }

  public function getHideout_one()
  {
    return $this->hideout_one;
  }

  public function getHideout_two()
  {
    return $this->hideout_two;
  }

  public function getHideout_three()
  {
    return $this->hideout_three;
  }

  public function getSpeciality()
  {
    return $this->speciality;
  }

}