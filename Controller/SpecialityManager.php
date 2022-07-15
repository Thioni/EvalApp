<?php

require("Model/Speciality.php");

class SpecialityManager {
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

  public function create(Speciality $speciality) {
    $request = $this->db->prepare("INSERT INTO `specialities` (skill) VALUE (:skill)");
  
    $request->bindValue(":skill", $speciality->getLocation(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `specialities` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $speciality = new Speciality($data);
    return $speciality;
  }
  
  public function getAll() {
    $specialities = [];
    $request = $this->db->query("SELECT * FROM `specialities`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $speciality = new Speciality($data);
      $specialities[] = $speciality;
    }
    return $specialities;
  }
  
  public function update(Speciality $speciality)
  {
    $req = $this->db->prepare("UPDATE `specialities` SET skill = :skill");

    $request->bindValue(":skill", $mission->getLocation(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `specialities` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}