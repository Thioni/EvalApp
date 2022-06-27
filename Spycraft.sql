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
  FOREIGN KEY (nationality) REFERENCES countries(id)
) engine=InnoDB;

CREATE TABLE agents_skills (
  specialities_id INT(11) NOT NULL,
  agents_id INT(11) NOT NULL,
  PRIMARY KEY (specialities_id, agents_id),
  FOREIGN KEY (specialities_id) REFERENCES specialities(id),
  FOREIGN KEY (agents_id) REFERENCES agents(id)
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
  agent_one INT(11) NOT NULL,
  agent_two INT(11) NULL,
  agent_three INT(11) NULL,
  target_one INT(11) NOT NULL,
  target_two INT(11) NULL,
  target_three INT(11) NULL,
  contact_one INT(11) NOT NULL,
  contact_two INT(11) NULL,
  contact_three INT(11) NULL,
  hideout_one INT(11) NOT NULL,
  hideout_two INT(11) NULL,
  hideout_three INT(11) NULL,
  speciality INT(11) NOT NULL,
  FOREIGN KEY (codename) REFERENCES codenames(id),
  FOREIGN KEY (country) REFERENCES countries(id),
  FOREIGN KEY (agent_one) REFERENCES agents(id),
  FOREIGN KEY (agent_two) REFERENCES agents(id),
  FOREIGN KEY (agent_three) REFERENCES agents(id),
  FOREIGN KEY (target_one) REFERENCES targets(id),
  FOREIGN KEY (target_two) REFERENCES targets(id),
  FOREIGN KEY (target_three) REFERENCES targets(id),
  FOREIGN KEY (contact_one) REFERENCES contacts(id),
  FOREIGN KEY (contact_two) REFERENCES contacts(id),
  FOREIGN KEY (contact_three) REFERENCES contacts(id),
  FOREIGN KEY (hideout_one) REFERENCES hideouts(id),
  FOREIGN KEY (hideout_two) REFERENCES hideouts(id),
  FOREIGN KEY (hideout_three) REFERENCES hideouts(id),
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

INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Gilbertina', 'Palfreeman', '1975-09-10', 416, 24);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Thatch', 'Corkish', '1990-05-03', 828, 3);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Brendin', 'Steabler', '1985-03-18', 144, 11);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Hubert', 'Bonisseur de La Bath', '1972-06-19', 117, 20);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Ward', 'Kingdon', '1986-02-10', 659, 14);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Jhonny', 'English', '1972-07-27', 755, 5);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Ilyse', 'Krimmer', '1995-03-02', 455, 27);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Jehu', 'Danneil', '1984-02-16', 405, 11);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Austin', 'Powers', '1963-03-25', 940, 15);
INSERT INTO agents (first_name, last_name, birthdate, code_agent, nationality)
VALUES ('Léon', 'Reno', '1948-07-30', 724, 19);

INSERT INTO agents_skills (specialities_id, agents_id) VALUES (1, 1);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (1, 7);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (2, 3);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (2, 6);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (3, 2);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (3, 9);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (4, 3);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (4, 5);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (4, 8);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (5, 5);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (5, 6);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (6, 6);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (7, 4);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (7, 10);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (8, 7);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (9, 5);
INSERT INTO agents_skills (specialities_id, agents_id) VALUES (10, 9);

INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Nappie', 'Ruoff', '1989-09-21', 44, 41);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Roy', 'Ivanusyev', '1954-05-20', 20, 76);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Kennan', 'Preshaw', '1985-07-23', 26, 75);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Isidor', 'Chimes', '1985-07-10', 43, 40);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Katinka', 'Flanders', '1996-08-19', 14, 20);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Brunhilde', 'Issacson', '1947-07-27', 8, 78);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Geraldine', 'Nurdin', '1996-01-30', 12, 79);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Rosemaria', 'Freyne', '1957-07-30', 50, 23);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Domenico', 'Ashby', '1956-09-22', 16, 32);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Elmore', 'Landall', '1965-01-17', 10, 4);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Bartholomeus', 'Hould', '1952-06-01', 32, 20);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Ilario', 'Brusin', '1968-04-11', 11, 55);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Darrin', 'Warboy', '1980-10-01', 17, 51);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Shepherd', 'Romagosa', '1974-02-08', 40, 36);
INSERT INTO targets (first_name, last_name, birthdate, codename, nationality) 
VALUES ('David', 'Dran', '1978-11-01', 23, 32);

INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Abbe', 'Devita', '1963-03-08', 17, 69);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Chic', 'Dudny', '1985-08-10', 15, 55);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Mackenzie', 'Langhor', '1988-11-04', 1, 33);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Ema', 'Caulton', '1988-03-21', 9, 84);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Ilka', 'Cianni', '1994-06-19', 22, 48);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Dalli', 'Franzke', '1992-03-03', 23, 42);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Rhiamon', 'Utterson', '1967-07-03', 25, 12);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Eugenie', 'Mackstead', '1958-05-15', 31, 87);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Raoul', 'Hussy', '1997-01-19', 7, 28);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Sigfried', 'Skylett', '1986-01-02', 4, 16);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Nicole', 'Esom', '1969-08-15', 27, 51);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Edi', 'Camplin', '1958-01-28', 35, 68);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Joanie', 'Leander', '1990-05-04', 36, 10);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Putnam', 'Blaiklock', '1996-03-25', 29, 7);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Gerick', 'Leitche', '1980-01-09', 21, 6);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Gardie', 'Goodlett', '1978-07-08', 24, 25);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Charmane', 'Godsal', '1998-08-10', 28, 50);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Rorke', 'Gingedale', '1969-10-22', 49, 48);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Riley', 'Speirs', '1945-03-06', 41, 60);
INSERT INTO contacts (first_name, last_name, birthdate, codename, nationality) 
VALUES ('Harrie', 'Dionis', '1988-11-03', 6, 32);

INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (8, '2575 Washington Center', Appartement, 23);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (49, '4006 Kinsman Terrace', Villa, 83);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (56, '3610 Vahlen Point', Bunker, 72);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (99, '2794 Monument Crossing', Maison, 58);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (62, '765 Oriole Center', Appartement, 80);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (66, '18233 Buhler Junction', Entrepot, 66);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (70, '697 Union Pass', Maison, 45);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (71, '60 Pine View Parkway', Garage, 61);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (66, '2561 Stone Corner Street', Cave, 25);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (77, '432 Armistice Street', Bunker, 72);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (45, '4 Crest Line Circle', Entrepot, 4);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (25, '127 Towne Place', Cave, 64);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (95, '5841 Superior Lane', Chalet, 20);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (10, '0157 Sugar Terrace', Villa, 54);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (16, '16 Meadow Valley Center', Armurerie, 75);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (89, '07531 Buell Parkway', Entrepot, 40);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (91, '2379 Marquette Court', Armurerie, 89);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (99, '0138 Hazelcrest Lane', Chalet, 46);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (37, '1 Fuller Center', Villa, 41);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (86, '8 Briar Crest Junction', Cave, 60);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (77, '226 Schurz Road', Garage, 26);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (5, '067 Maryland Pass', Entrepot, 67);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (60, '85791 Johnson Place', Maison, 32);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (1, '45114 Crownhardt Place', Garage, 30);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (100, '44 Maple Plaza', Villa, 1);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (16, '4 Menomonie Parkway', Maison, 11);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (30, '0 Elmside Drive', Armurerie, 4);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (74, '5881 Eliot Trail', Magasin, 17);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (3, '3519 Burning Wood Street', Cave, 17);
INSERT INTO hideouts (code_hideout, adress, type, country) 
VALUES (94, '15 Quincy Center', Cave, 41);

INSERT INTO missions (title, description, mission_type, mission_status, date_start, date_end, codename, agent_one, agent_two, agent_three, target_one, target_two, target_three, contact_one, contact_two, contact_three, hideout_one, hideout_two, hideout_three, specialty)
VALUES (null, null, 8, 1, '2021-08-06', '2022-02-16', 15, 2, 7, 21, 13, 14, 5, 6, 10, 14, 12, 26, 14, 8);
INSERT INTO missions (title, description, mission_type, mission_status, date_start, date_end, codename, agent_one, agent_two, agent_three, target_one, target_two, target_three, contact_one, contact_two, contact_three, hideout_one, hideout_two, hideout_three, specialty)
VALUES (null, null, 10, 1, '2021-06-19', '2021-08-30', 27, 7, 3, 10, 2, 14, 14, 12, 18, 15, 30, 30, 20, 6);
INSERT INTO missions (title, description, mission_type, mission_status, date_start, date_end, codename, agent_one, agent_two, agent_three, target_one, target_two, target_three, contact_one, contact_two, contact_three, hideout_one, hideout_two, hideout_three, specialty)
VALUES (null, null, 2, 3, '2021-03-13', '2022-02-08', 24, 2, 9, 25, 12, 5, 5, 6, 17, 17, 26, 20, 11, 1);

INSERT INTO administrators (first_name, last_name, mail, password, date_creation)
VALUES ('Iggie', 'Glave', 'iglave0@hao123.com', '1NNj5XuYS', '2020-06-23');
INSERT INTO administrators (first_name, last_name, mail, password, date_creation)
VALUES ('Teodorico', 'Barbe', 'tbarbe1@nationalgeographic.com', '3sPgjA', '2019-09-14');
INSERT INTO administrators (first_name, last_name, mail, password, date_creation)
VALUES ('Tina', 'Gawthorp', 'tgawthorp2@taobao.com', 'rklBBO', '2016-05-22');
INSERT INTO administrators (first_name, last_name, mail, password, date_creation)
VALUES ('Maddie', 'Kivits', 'mkivits3@google.ca', 'o5OOY2Y', '2016-01-23');
INSERT INTO administrators (first_name, last_name, mail, password, date_creation)
VALUES ('Kari', 'Torbeck', 'ktorbeck4@time.com', 'FwXLAB', '2019-03-25');