CREATE DATABASE IF NOT EXISTS spycraft CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE countries (
  id INT PRIMARY KEY AUTO_INCREMENT,
  location VARCHAR(50) NOT NULL
) engine=InnoDB;

CREATE TABLE codenames (
  id INT PRIMARY KEY AUTO_INCREMENT,
  alias VARCHAR(50) NOT NULL UNIQUE
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
  code_agent INT(11) NOT NULL UNIQUE,
  nationality INT(11) NOT NULL,
  speciality_one INT(11) NOT NULL,
  speciality_two INT(11) DEFAULT NULL,
  speciality_three INT(11) DEFAULT NULL,
  FOREIGN KEY (nationality) REFERENCES countries(id),
  FOREIGN KEY (speciality_one) REFERENCES specialities(id),
  FOREIGN KEY (speciality_two) REFERENCES specialities(id),
  FOREIGN KEY (speciality_three) REFERENCES specialities(id)
) engine=InnoDB;

CREATE TABLE targets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  birthdate DATE NOT NULL,
  codename INT(11) NOT NULL UNIQUE,
  nationality INT(11) NOT NULL,
  FOREIGN KEY (codename) REFERENCES codenames(id),
  FOREIGN KEY (nationality) REFERENCES countries(id)
) engine=InnoDB;

CREATE TABLE contacts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  birthdate DATE NOT NULL,
  codename INT(11) NOT NULL UNIQUE,
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
  codename INt(11) NOT NULL UNIQUE,
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

INSERT INTO countries (location) VALUES 
  ('Afghanistan'), ('Afrique du Sud'), ('Alabanie'), ('Allemagne'),
  ('Bangladesh'), ('Belgique'), ('Birmanie'), ('Brésil'),
  ('Cambodge'), ('Canada'), ('Chili'), ('Chine'), ('Cuba'),
  ('Danemark'), ('Djibouti'), ('Égypte'), ('Émirats arabes unis'), ('Espagne'), ('États-Unis'),
  ('Finlande'), ('France'), ('Gabon'), ('Ghana'), ('Grèce'),
  ('Haïti'), ('Honduras'), ('Hongrie'),
  ('Inde'), ('Indonésie'), ('Irak'), ('Iran'), ('Irlande'), ('Israel'), ('Italie'),
  ('Japon'), ('Jordanie'), ('Kazakhstan'), ('Kenya'), ('Koweit'),
  ('Laos'), ('Lettonie'), ('Liban'), ('Libéria'), ('Libye'), ('Lituanie'), ('Luxembourg'),
  ('Madagascar'), ('Malaisie'), ('Maldives'), ('Mali'), ('Maroc'), ('Mexique'),
  ('Nicaragua'), ('Nigeria'), ('Norvège'), ('Nouvelle-Zélande'),
  ('Oman'), ('Ouganda'), ('Ouzbékistan'),
  ('Pakistan'), ('Palestine'), ('Panama'), ('Paraguay'), ('Pays-Bas'), ('Pérou'), ('Portugal'),
  ('Qatar'), ('Roumanie'), ('Royaume-Uni'), ('Russie'), ('Rwanda'),
  ('Salvador'), ('Sénégal'), ('Serbie'), ('Singapour'), ('Slovaquie'), ('Suède'), ('Suisse'),
  ('Tadjikistan'), ('Tchad'), ('Thailande'), ('Tunisie'), ('Turquie'),
  ('Ukraine'), ('Uruguay'), ('Venezuela'), ('Vietnam'), ('Yémen'), ('Zimbabwe');


INSERT INTO codenames (alias) VALUES
  ('Macaca mulatta'), ('Otaria flavescens'), ('Macropus giganteus'), ('Corvus albus'),
  ('Pavo cristatus'), ('Limnocorax flavirostra'), ('Nyctereutes procyonoides'),
  ('Connochaetus taurinus'), ('Dusicyon thous'), ('Gyps fulvus'), ('Tadorna tadorna'),
  ('Francolinus coqui'), ('Ammospermophilus nelsoni'), ('Lutra canadensis'), ('Ardea golieth'),
  ('Milvus migrans'), ('Sarcorhamphus papa'), ('Globicephala melas'), ('Crotalus cerastes'),
  ('Sarkidornis melanotos'), ('Sylvicapra grimma'), ('Panthera pardus'),
  ('Macropus agilis'), ('Gymnorhina tibicen'), ('Equus hemionus'), ('Anas punctata'),
  ('Aonyx cinerea'), ('Macaca radiata'), ('Platalea leucordia'),
  ('Elephas maximus bengalensis'), ('Tockus flavirostris'), ('Felis chaus'),
  ('Varanus salvator'), ('Spermophilus richardsonii'), ('Sciurus vulgaris'),
  ('Acrantophis madagascariensis'), ('Ninox superciliaris'), ('Meles meles'), ('Kobus leche robertsi'),
  ('Diomedea irrorata'), ('Phascogale tapoatafa'), ('Ursus americanus'), ('Ara ararauna'),
  ('Pseudocheirus peregrinus'), ('Oncorhynchus nerka'), ('Castor fiber'), ('Rangifer tarandus'),
  ('Felis libyca'), ('Recurvirostra avosetta'), ('Larus dominicanus');

INSERT INTO specialities (skill) VALUES
  ('Désinformation'), ('Élimination'), ('Exfiltration'), ('Explosifs'), ('Filature'),
  ('Infiltration'), ('Intimidation'), ('Hacking'), ('Nettoyage'), ('Sabotage');

INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Gilbertina', 'Palfreeman', '1975-09-10', 416, 24, 1, 7);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Thatch', 'Corkish', '1990-05-03', 828, 3, 3, 6);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Brendin', 'Steabler', '1985-03-18', 144, 11, 2, 9);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two, speciality_three)
VALUES ('Ansel', 'Bilbey', '1988-03-06', 500, 20, 3, 5, 8);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Ward', 'Kingdon', '1986-02-10', 659, 14, 5, 6);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Bridgette', 'Draisey', '1972-07-27', 755, 5, 8, 10);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Ilyse', 'Krimmer', '1995-03-02', 455, 27, 4);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Jehu', 'Danneil', '1984-02-16', 405, 11, 7);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Shep', 'Jaqueme', '1977-03-05', 940, 15, 5);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Raul', 'Greensall', '1970-07-24', 724, 19, 9);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Curry', 'Icke', '1979-07-09', 793, 30, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Vern', 'Mullane', '1970-03-22', 478, 27, 3, 5);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Ashleigh', 'Brandrick', '1982-03-31', 584, 8, 2);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Bonnee', 'Sibbet', '1977-01-24', 537, 22, 6);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Agnella', 'Bails', '1981-11-22', 840, 25, 6);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Tiffi', 'Gouldeby', '1984-07-13', 542, 19, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Natalie', 'Poe', '1978-10-30', 550, 30, 2);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Woodie', 'Goodliffe', '1989-08-15', 991, 3, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Rodrick', 'Popeley', '1973-12-23', 561, 9, 1);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two, speciality_three)
VALUES ('Vinita', 'Dobrowski', '1989-02-18', 616, 18, 2, 5, 10);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Julieta', 'Shovelton', '1989-02-19', 221, 21, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Cora', 'Pringour', '1994-11-03', 549, 13, 5);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one)
VALUES ('Raimondo', 'Rohlfs', '1975-11-19', 763, 25, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two, speciality_three)
VALUES ('Cleavland', 'Wiper', '1982-07-07', 204, 12, 2, 7, 9);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality, speciality_one, speciality_two)
VALUES ('Chadwick', 'Geeraert', '1971-01-09', 944, 9, 1, 8);