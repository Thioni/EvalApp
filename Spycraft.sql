CREATE DATABASE IF NOT EXISTS spycraft CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE countries (
  id INT PRIMARY KEY AUTO_INCREMENT,
  location VARCHAR(50) NOT NULL
) engine=InnoDB;

CREATE TABLE codenames (
  id INT PRIMARY KEY AUTO_INCREMENT,
  alias VARCHAR(50) NOT NULL
) engine=InnoDB;

CREATE TABLE specialities (
  id INT PRIMARY KEY AUTO_INCREMENT,
  skill VARCHAR(50) NOT NULL
) engine=InnoDB;

CREATE TABLE agents (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  birthdate DATE NOT NULL,
  code_agent INT(11) NOT NULL,
  nationality INT(11) NOT NULL,
  speciality INT(11) NOT NULL,
  FOREIGN KEY (nationality) REFERENCES countries(id),
  FOREIGN KEY (speciality) REFERENCES specialities(id)
) engine=InnoDB;

CREATE TABLE targets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  birthdate DATE NOT NULL,
  codename INT(11) NOT NULL,
  nationality INT(11) NOT NULL,
  FOREIGN KEY (codename) REFERENCES codenames(id),
  FOREIGN KEY (nationality) REFERENCES countries(id)
) engine=InnoDB;

CREATE TABLE contacts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  birthdate DATE NOT NULL,
  codename INT(11) NOT NULL,
  nationality INT(11) NOT NULL,
  FOREIGN KEY (codename) REFERENCES codenames(id),
  FOREIGN KEY (nationality) REFERENCES countries(id)
) engine=InnoDB;

CREATE TABLE hideouts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  code_hideout INT(11) NOT NULL,
  adress VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  country INT(11) NOT NULL,
  FOREIGN KEY (country) REFERENCES countries(id)
) engine=InnoDB;

CREATE TABLE missions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  mission_type VARCHAR(50) NOT NULL,
  mission_status VARCHAR(50) NOT NULL,
  date_start DATE NOT NULL,
  date_end DATE NOT NULL,
  codename INt(11) NOT NULL,
  country INT(11) NOT NULL,
  agent INT(11) NOT NULL,
  target INT(11) NOT NULL,
  contact INT(11) NOT NULL,
  hideout INT(11) NOT NULL,
  speciality INT(11) NOT NULL,
  FOREIGN KEY (codename) REFERENCES codenames(id),
  FOREIGN KEY (country) REFERENCES countries(id),
  FOREIGN KEY (agent) REFERENCES agents(id),
  FOREIGN KEY (target) REFERENCES targets(id),
  FOREIGN KEY (contact) REFERENCES contacts(id),
  FOREIGN KEY (hideout) REFERENCES hideouts(id),
  FOREIGN KEY (speciality) REFERENCES specialities(id)
) engine=InnoDB;

CREATE TABLE administrators (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  mail VARCHAR(50) NOT NULL UNIQUE,
  password CHAR(60) NOT NULL,
  date_creation DATE NOT NULL
) engine=InnoDB;