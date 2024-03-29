<?php

require __DIR__ . '/../Model/Agent.php';

class AgentManager {
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

  public function create(Agent $agent) {
    $request = $this->db->prepare("INSERT INTO `agents` (first_name, last_name, birthdate, code_agent, nationality) VALUE (:first_name, :last_name, :birthdate, :code_agent, :nationality)");
  
    $request->bindValue(":first_name", $agent->getFirst_name(), PDO::PARAM_STR);
    $request->bindValue(":last_name", $agent->getLast_name(), PDO::PARAM_STR);
    $request->bindValue(":birthdate", $agent->getBirthdate(), PDO::PARAM_STR);
    $request->bindValue(":code_agent", $agent->getCode_agent(), PDO::PARAM_INT);
    $request->bindValue(":nationality", $agent->getNationality(), PDO::PARAM_INT);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `agents` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $agent = new Agent($data);
    return $agent;
  }

  public function getLastAgentId() {
    $req = $this->db->query("SELECT * FROM `agents` ORDER BY id DESC LIMIT 1");
    return $req->fetch()["id"];
}
  
  public function getAll() {
    $agents = [];
    $request = $this->db->query("SELECT * FROM `agents`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $agent = new Agent($data);
      $agents[] = $agent;
    }
    return $agents;
  }
  
  public function update(Agent $agent)
  {
    $req = $this->db->prepare("UPDATE `agents` SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, code_agent = :code_agent, nationality = :nationality");

    $request->bindValue(":first_name", $agent->getFirst_name(), PDO::PARAM_STR);
    $request->bindValue(":last_name", $agent->getLast_name(), PDO::PARAM_STR);
    $request->bindValue(":birthdate", $agent->getBirthdate(), PDO::PARAM_STR);
    $request->bindValue(":codename", $agent->getCode_agent(), PDO::PARAM_INT);
    $request->bindValue(":nationality", $agent->getNationality(), PDO::PARAM_INT);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `agents` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}