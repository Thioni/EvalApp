<?php

require("classes/Mission.php");

class MissionManager {
  private $db;

  public function __construct() {
    $dbName = "spycraft";
    $port = 3306;
    $username = "root";
    $password = "";
    try {
      $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password);
    } catch(PDOException $exception) {
      echo $exception->getMessage();
    }
  }

  public function create(Mission $mission) {
    $request = $this->db->prepare("INSERT INTO `missions` (title, description, mission_type, mission_status, date_start, date_end, codename, country, agent_one, agent_two, agent_three, target_one, target_two, target_three, contact_one, contact_two, contact_three, hideout_one, hideoute_two, hideout_three, speciality) VALUE (:title, :description, :mission_type, :mission_status, :date_start, :date_end, :codename, :country, :agent_one, :agent_two, :agent_three, :target_one, :target_two, :target_three, :contact_one, :contact_two, :contact_three, :hideout_one, :hideoute_two, :hideout_three, :speciality)");
  
    $request->bindValue(":title", $mission->getTitle(), PDO::PARAM_STR); // PDO::PARAM_ pour préciser le type. Pas obligatoire.
    $request->bindValue(":description", $mission->getDescription(), PDO::PARAM_STR);
    $request->bindValue(":mission_type", $mission->getMission_type(), PDO::PARAM_STR);
    $request->bindValue(":mission_status", $mission->getMission_status(), PDO::PARAM_STR);
    $request->bindValue(":date_start", $mission->getDAte_start(), PDO::PARAM_STR);
    $request->bindValue(":date_end", $mission->getDAte_end(), PDO::PARAM_STR);
    $request->bindValue(":codename", $mission->getCodename(), PDO::PARAM_INT);
    $request->bindValue(":country", $mission->getCountry(), PDO::PARAM_INT);
    $request->bindValue(":agent_one", $mission->getAgent_one(), PDO::PARAM_INT);
    $request->bindValue(":agent_two", $mission->getAgent_two(), PDO::PARAM_INT);
    $request->bindValue(":agent_three", $mission->getAgent_three(), PDO::PARAM_INT);
    $request->bindValue(":target_one", $mission->getTarget_one(), PDO::PARAM_INT);
    $request->bindValue(":target_two", $mission->getTarget_two(), PDO::PARAM_INT);
    $request->bindValue(":target_three", $mission->getTarget_three(), PDO::PARAM_INT);
    $request->bindValue(":contact_one", $mission->getContact_one(), PDO::PARAM_INT);
    $request->bindValue(":contact_two", $mission->getContact_two(), PDO::PARAM_INT);
    $request->bindValue(":contact_three", $mission->getContact_three(), PDO::PARAM_INT);
    $request->bindValue(":hideout_one", $mission->getHideout_one(), PDO::PARAM_INT);
    $request->bindValue(":hideout_two", $mission->getHideout_two(), PDO::PARAM_INT);
    $request->bindValue(":hideout_three", $mission->getHideout_three(), PDO::PARAM_INT);
    $request->bindValue(":speciality", $mission->getSpeciality(), PDO::PARAM_INT);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `missions` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $mission = new Mission($data);
    return $mission;
  }
  
  public function getAll() {
    $missions = [];
    $request = $this->db->query("SELECT missions.title, missions.country, countries.location FROM missions JOIN countries ON missions.country = countries.id ");
//    $request = $this->db->query("SELECT * FROM `missions`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $mission = new Mission($data);
      $missions[] = $mission;
    }
    return $missions;
  }
  
  public function update(Mission $mission)
  {
    $req = $this->db->prepare("UPDATE `missions` SET title = :title, description = :description, mission_type = :mission_type, mission_status = :mission_status, date_start = :date_start, date_end = :date_end, codename = :codename, country = :country, agent_one = :agent_one, agent_two = :agent_two, agent_three = :agent_three, target_one = :target_one, target_two = :target_two, target_three = :target_three, contact_one = :contact_one, contact_two = :contact_two, contact_three = :contact_three, hideout_one = :hideout_one, hideout_two = :hideout_two, hideout_three = :hideout_three, speciality = :speciality");

    $request->bindValue(":title", $mission->getTitle(), PDO::PARAM_STR);
    $request->bindValue(":description", $mission->getDescription(), PDO::PARAM_STR);
    $request->bindValue(":mission_type", $mission->getMission_type(), PDO::PARAM_STR);
    $request->bindValue(":mission_status", $mission->getMission_status(), PDO::PARAM_STR);
    $request->bindValue(":date_start", $mission->getDAte_start(), PDO::PARAM_STR);
    $request->bindValue(":date_end", $mission->getDAte_end(), PDO::PARAM_STR);
    $request->bindValue(":codename", $mission->getCodename(), PDO::PARAM_INT);
    $request->bindValue(":country", $mission->getCountry(), PDO::PARAM_INT);
    $request->bindValue(":agent_one", $mission->getAgent_one(), PDO::PARAM_INT);
    $request->bindValue(":agent_two", $mission->getAgent_two(), PDO::PARAM_INT);
    $request->bindValue(":agent_three", $mission->getAgent_three(), PDO::PARAM_INT);
    $request->bindValue(":target_one", $mission->getTarget_one(), PDO::PARAM_INT);
    $request->bindValue(":target_two", $mission->getTarget_two(), PDO::PARAM_INT);
    $request->bindValue(":target_three", $mission->getTarget_three(), PDO::PARAM_INT);
    $request->bindValue(":contact_one", $mission->getContact_one(), PDO::PARAM_INT);
    $request->bindValue(":contact_two", $mission->getContact_two(), PDO::PARAM_INT);
    $request->bindValue(":contact_three", $mission->getContact_three(), PDO::PARAM_INT);
    $request->bindValue(":hideout_one", $mission->getHideout_one(), PDO::PARAM_INT);
    $request->bindValue(":hideout_two", $mission->getHideout_two(), PDO::PARAM_INT);
    $request->bindValue(":hideout_three", $mission->getHideout_three(), PDO::PARAM_INT);
    $request->bindValue(":speciality", $mission->getSpeciality(), PDO::PARAM_INT);

    $req->execute();

    #  mettre à jour la mission passée en argument
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `missions` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}