<?php

require("Model/Codename.php");

class CodenameManager {
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

  public function create(Codename $codename) {
    $request = $this->db->prepare("INSERT INTO `codenames` (alias) VALUE (:alias)");
  
    $request->bindValue(":alias", $codename->getLocation(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `codenames` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $codename = new Codename($data);
    return $codename;
  }
  
  public function getAll() {
    $codenames = [];
    $request = $this->db->query("SELECT * FROM `codenames`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $codename = new Codename($data);
      $codenames[] = $codename;
    }
    return $codenames;
  }
  
  public function update(Codename $codename)
  {
    $req = $this->db->prepare("UPDATE `codenames` SET alias = :alias");

    $request->bindValue(":alias", $mission->getLocation(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `codenames` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}