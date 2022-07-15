<?php

require("Model/Target.php");

class TargetManager {
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

  public function create(Target $target) {
    $request = $this->db->prepare("INSERT INTO `targets` (first_name, last_name, birthdate, codename, nationality) VALUE (:first_name, :last_name, :birthdate, :codename, :nationality)");
  
    $request->bindValue(":first_name", $mission->getTitle(), PDO::PARAM_STR);
    $request->bindValue(":last_name", $mission->getDescription(), PDO::PARAM_STR);
    $request->bindValue(":birthdate", $mission->getMission_type(), PDO::PARAM_STR);
    $request->bindValue(":codename", $mission->getMission_status(), PDO::PARAM_STR);
    $request->bindValue(":nationality", $mission->getDAte_start(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `targets` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $target = new Target($data);
    return $target;
  }
  
  public function getAll() {
    $targets = [];
    $request = $this->db->query("SELECT * FROM `targets`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $target = new Target($data);
      $targets[] = $target;
    }
    return $targets;
  }
  
  public function update(Target $target)
  {
    $req = $this->db->prepare("UPDATE `targets` SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, codename = :codename, nationality = :nationality");

    $request->bindValue(":first_name", $mission->getTitle(), PDO::PARAM_STR);
    $request->bindValue(":last_name", $mission->getDescription(), PDO::PARAM_STR);
    $request->bindValue(":birthdate", $mission->getMission_type(), PDO::PARAM_STR);
    $request->bindValue(":codename", $mission->getMission_status(), PDO::PARAM_STR);
    $request->bindValue(":nationality", $mission->getDAte_start(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `targets` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}