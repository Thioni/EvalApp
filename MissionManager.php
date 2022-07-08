<?php

// NOTE: le typage (les mots en verts) n'est pas obligatoire

require("classes/Mission.php");

class MissionManager {
  private $db;

  public function __construct() {
    $dbName = "spycraft";
    $port = 3306;
    $username = "root";
    $password = "";
    try {
      $this->db = new PDO("mysql:host=localhost;dbname=$dbName';port=$port,$username,$password");
    } catch(PDOException $exception) {
      echo $exception->getMessage();
    }
  }

  public function create(Mission $mission) {
    $request = $this->db->prepare("INSERT INTO `missions` (title, description, mission_type) VALUE (:title, :description, :mission_type)");
  
    $request->bindValue(":title", $mission->getTitle(), PDO::PARAM_STR); // PDO::PARAM_ pour préciser le type. Pas obligatoire.
    $request->bindValue(":title", $mission->getDescription(), PDO::PARAM_STR);
    $request->bindValue(":title", $mission->getMission_type(), PDO::PARAM_STR);
  
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
  
  public function getAll()
  {
    $missions = [];
    $request = $this->db->query("SELECT * FROM `missions` ORDER BY id");
    $allData = $request->fecthAll();
    foreach ($allData as $data) {
      $mission = new Mission($data);
      $missions[] = $mission;
    }
    return $missions;
  }
  
  public function update(Mission $mission)
  {
    # code... mettre à jour la mission passée e nargument
  }

  public function delete(int $id)
  {
    # code...
  }
}