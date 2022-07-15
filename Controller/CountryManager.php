<?php

require("Model/Country.php");

class CountryManager {
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

  public function create(Country $country) {
    $request = $this->db->prepare("INSERT INTO `countries` (location) VALUE (:location)");
  
    $request->bindValue(":location", $country->getLocation(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `countries` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $country = new Country($data);
    return $country;
  }
  
  public function getAll() {
    $countries = [];
    $request = $this->db->query("SELECT * FROM `countries`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $country = new Country($data);
      $countries[] = $country;
    }
    return $countries;
  }
  
  public function update(Country $country)
  {
    $req = $this->db->prepare("UPDATE `countries` SET location = :location");

    $request->bindValue(":location", $mission->getLocation(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `countries` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}