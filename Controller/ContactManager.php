<?php

require __DIR__ . '/../Model/Contact.php';

class ContactManager {
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

  public function create(Contact $contact) {
    $request = $this->db->prepare("INSERT INTO `contacts` (first_name, last_name, birthdate, codename, nationality) VALUE (:first_name, :last_name, :birthdate, :codename, :nationality)");
  
    $request->bindValue(":xxx", $contact->getXXX(), PDO::PARAM_STR);
  
    $request->execute();
  }
  
  public function get(int $id)
  {
    $request = $this->db->prepare("SELECT * FROM `contacts` WHERE id = :id");
    $request->bindValue(":id", $id, PDO::PARAM_INT);
    $data = $request->fetch();
    $contact = new Contact($data);
    return $contact;
  }
  
  public function getAll() {
    $contacts = [];
    $request = $this->db->query("SELECT * FROM `contacts`");
    $allData = $request->fetchAll();
    foreach ($allData as $data) {
      $contact = new Contact($data);
      $contacts[] = $contact;
    }
    return $contacts;
  }
  
  public function update(Contact $contact)
  {
    $req = $this->db->prepare("UPDATE `contacts` SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, codename = :codename, nationality = :nationality");

    $request->bindValue(":xxx", $contact->getTitle(), PDO::PARAM_STR);

    $req->execute();
  }

  public function delete(int $id)
  {
    $req = $this->db->prepare("DELETE FROM `contacts` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
}