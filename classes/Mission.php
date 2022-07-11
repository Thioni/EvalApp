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

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  public function getMission_type()
  {
    return $this->mission_type;
  }

  public function setMission_type($mission_type)
  {
    $this->mission_type = $mission_type;

    return $this;
  }

  public function getMission_status()
  {
    return $this->mission_status;
  }

  public function setMission_status($mission_status)
  {
    $this->mission_status = $mission_status;

    return $this;
  }

  public function getDate_start()
  {
    return $this->date_start;
  }

  public function setDate_start($date_start)
  {
    $this->date_start = $date_start;

    return $this;
  }

  public function getDate_end()
  {
    return $this->date_end;
  }

  public function setDate_end($date_end)
  {
    $this->date_end = $date_end;

    return $this;
  }

  public function getCodename()
  {
    return $this->codename;
  }

  public function setCodename($codename)
  {
    $this->codename = $codename;

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

  public function getAgent_one()
  {
    return $this->agent_one;
  }

  public function setAgent_one($agent_one)
  {
    $this->agent_one = $agent_one;

    return $this;
  }

  public function getAgent_two()
  {
    return $this->agent_two;
  }

  public function setAgent_two($agent_two)
  {
    $this->agent_two = $agent_two;

    return $this;
  }

  public function getAgent_three()
  {
    return $this->agent_three;
  }

  public function setAgent_three($agent_three)
  {
    $this->agent_three = $agent_three;

    return $this;
  }

  public function getTarget_one()
  {
    return $this->target_one;
  }

  public function setTarget_one($target_one)
  {
    $this->target_one = $target_one;

    return $this;
  }

  public function getTarget_two()
  {
    return $this->target_two;
  }

  public function setTarget_two($target_two)
  {
    $this->target_two = $target_two;

    return $this;
  }

  public function getTarget_three()
  {
    return $this->target_three;
  }

  public function setTarget_three($target_three)
  {
    $this->target_three = $target_three;

    return $this;
  }

  public function getContact_one()
  {
    return $this->contact_one;
  }

  public function setContact_one($contact_one)
  {
    $this->contact_one = $contact_one;

    return $this;
  }

  public function getContact_two()
  {
    return $this->contact_two;
  }

  public function setContact_two($contact_two)
  {
    $this->contact_two = $contact_two;

    return $this;
  }

  public function getContact_three()
  {
    return $this->contact_three;
  }

  public function setContact_three($contact_three)
  {
    $this->contact_three = $contact_three;

    return $this;
  }

  public function getHideout_one()
  {
    return $this->hideout_one;
  }

  public function setHideout_one($hideout_one)
  {
    $this->hideout_one = $hideout_one;

    return $this;
  }

  public function getHideout_two()
  {
    return $this->hideout_two;
  }

  public function setHideout_two($hideout_two)
  {
    $this->hideout_two = $hideout_two;

    return $this;
  }

  public function getHideout_three()
  {
    return $this->hideout_three;
  }

  public function setHideout_three($hideout_three)
  {
    $this->hideout_three = $hideout_three;

    return $this;
  }

  public function getSpeciality()
  {
    return $this->speciality;
  }

  public function setSpeciality($speciality)
  {
    $this->speciality = $speciality;

    return $this;
  }
}