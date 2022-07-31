<?php

require __DIR__ . '/../Model/Hideout.php';

class HideoutManager {
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

  public function create(Hideout $hideout) {
    $request = $this->db->prepare("INSERT INTO `hideouts` (code_hideout, adress, type, country) VALUE (:code_hideout, :adress, :type, :country)");
  
    $request->bindValue(":code_hideout", $hideout->getCode_hideout(), PDO::PARAM_INT);
    $request->bindValue(":adress", $hideout->getAdress(), PDO::PARAM_STR);
    $request->bindValue(":type", $hideout->getType(), PDO::PARAM_INT);
    $request->bindValue(":country", $hideout->getCountry(), PDO::PARAM_INT);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `hideouts` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $hideout = new Hideout($data);
    return $hideout;
  }
  
  public function getAll() {
    $hideouts = [];
    $request = $this->db->query("SELECT * FROM `hideouts`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $hideout = new Hideout($data);
      $hideouts[] = $hideout;
    }
    return $hideouts;
  }
  
  public function update(Hideout $hideout)
  {
    $req = $this->db->prepare("UPDATE `hideouts` SET code_hideout = :code_hideout, adress = :adress, type = :type, country = :country");

    $request->bindValue(":code_hideout", $hideout->getCode_hideout(), PDO::PARAM_INT);
    $request->bindValue(":adress", $hideout->getAdress(), PDO::PARAM_STR);
    $request->bindValue(":type", $hideout->getType(), PDO::PARAM_INT);
    $request->bindValue(":country", $hideout->getCountry(), PDO::PARAM_INT);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `hideouts` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}