<?php

require("Model/Skill.php");

class SkillManager {
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

  public function create(Skill $skill) {
    $request = $this->db->prepare("INSERT INTO `agents_skills` (agents_id, specialities_id) VALUE (:agents_id, :specialities_id)");
  
    $request->bindValue(":agents_id", $skill->getAgents_id(), PDO::PARAM_STR);
    $request->bindValue(":specialities_id", $skill->getSpecialities_id(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $agents_id, $specialities_id)
  {
    $request = $this->db->prepare("SELECT * FROM `agents_skills` WHERE agents_id = :agents_id AND specialities_id = :specialities_id");
    $request->bindValue(":agents_id", $agents_id, PDO::PARAM_INT);
    $request->bindValue(":specialities_id", $specialities_id, PDO::PARAM_INT);
    $data = $request->fetch();
    $skill = new Skill($data);
    return $skill;
  }
  
  public function getAll() {
    $agents_skills = [];
    $request = $this->db->query("SELECT * FROM `agents_skills`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $skill = new Skill($data);
      $agents_skills[] = $skill;
    }
    return $agents_skills;
  }
  
  public function update(Skill $skill)
  {
    $req = $this->db->prepare("UPDATE `agents_skills` SET agents_id = :agents_id, specialities_id = :specialities_id");

    $request->bindValue(":agents_id", $mission->getLocation(), PDO::PARAM_STR);
    $request->bindValue(":specialities_id", $skill->getLocation(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `agents_skills` WHERE agents_id = :agents_id AND specialities_id = :specialities_id");
    $request->bindValue(":agents_id", $agents_id, PDO::PARAM_INT);
    $request->bindValue(":specialities_id", $specialities_id, PDO::PARAM_INT);
    $req->execute();
  }
}