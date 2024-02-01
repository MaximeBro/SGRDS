DROP TABLE if exists utilisateur CASCADE;
DROP TABLE if exists ressource CASCADE;
DROP TABLE if exists rattrapage CASCADE;
DROP TABLE if exists etudiant CASCADE;
DROP TABLE if exists rattrapage_etudiant CASCADE;
DROP TABLE if exists utilisateur_rattrapage CASCADE;
DROP TABLE if exists absence CASCADE;

-- Table pour les utilisateurs (directeur des études, enseignants)
CREATE TABLE utilisateur (
    idUtilisateur SERIAL PRIMARY KEY,
    nomUtilisateur VARCHAR(50) NOT NULL,
    prenomUtilisateur VARCHAR(50) NOT NULL,
    emailUtilisateur VARCHAR(100) NOT NULL UNIQUE,
    mdpUtilisateur VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL -- 'directeur' ou 'enseignant'
);

-- Table pour les ressources
CREATE TABLE ressource (
    idRessource SERIAL PRIMARY KEY,
    nomRessource TEXT NOT NULL
);

-- Table pour les rattrapages
CREATE TABLE rattrapage (
    idRattrapage SERIAL PRIMARY KEY,
    dateRattrapage TIMESTAMP NOT NULL,
    typeRattrapage VARCHAR(50) NOT NULL, -- Exemple: 'Papier', 'Machine'
    dureeRattrapage FLOAT NOT NULL, -- Durée en minutes
    etatRattrapage VARCHAR(50) CHECK (etatRattrapage IN ('En cours', 'Programmé', 'Neutralisé')) DEFAULT 'Programmé',
    commentaireRattrapage TEXT,
    semestre TEXT NOT NULL,
    idRessource INT REFERENCES ressource(idRessource),
    idEnseignant INT REFERENCES utilisateur(idUtilisateur)
);

-- Table pour les étudiants
CREATE TABLE etudiant (
    idEtudiant SERIAL PRIMARY KEY,
    nomEtudiant VARCHAR(50) NOT NULL,
    prenomEtudiant VARCHAR(50) NOT NULL,
    emailEtudiant VARCHAR(100) NOT NULL UNIQUE
);

-- Table de liaison entre les rattrapages et les étudiants absents
CREATE TABLE rattrapage_etudiant (
    idRattrapage INT REFERENCES rattrapage(idRattrapage),
    idEtudiant INT REFERENCES etudiant(idEtudiant),
    estJustifie BOOLEAN
);

-- Table pour les enseignants concernés par les rattrapages
CREATE TABLE absence (
    idAbsence SERIAL PRIMARY KEY,
    dateRattrapage DATE NOT NULL,
    semestre TEXT NOT NULL,
    idRessource INT REFERENCES ressource(idRessource)
);

-- Table reliant une absence à plusieurs étudiants
CREATE TABLE absence_etudiants (
    idAbsenceEtudiant SERIAL PRIMARY KEY,
    idAbsence INT REFERENCES absence(idAbsence),
    idEtudiant INT REFERENCES etudiant(idEtudiant)
);



insert into utilisateur(nomutilisateur, prenomutilisateur, emailutilisateur, mdputilisateur, role) values
('Brochard', 'Maxime', 'maximebrochard@univ-lehavre.fr', '$2y$10$xyUwQa00vuA7qwtmwaeNRuWKHMDK75P9jVXAou.wMC2QWO2R5jOU.', 'directeur'),
('ferrand', 'enzo', 'kzyord@gmail.com', '$2y$10$xyUwQa00vuA7qwtmwaeNRuWKHMDK75P9jVXAou.wMC2QWO2R5jOU.', 'enseignant'),
('ferrandd', 'enzod', 'kzyordd@gmail.com', '$2y$10$xyUwQa00vuA7qwtmwaeNRuWKHMDK75P9jVXAou.wMC2QWO2R5jOU.', 'directeur'),
('Philipe', 'Le Pivert', 'toto@gmail.com', '$2y$10$xyUwQa00vuA7qwtmwaeNRuWKHMDK75P9jVXAou.wMC2QWO2R5jOU.', 'directeur');

INSERT INTO etudiant(nomEtudiant,prenomEtudiant,emailEtudiant) values
('BROCHARD', 'Maxime', 'borchardmaxime@gmail.com'),
('FERRAND', 'Enzo', 'kzyord76@gmail.com'),
('BRAZEAU','Axel','axel.brazeau@gmail.com'),
('LE PIVERT', 'Philippe', 'phililip@lepivert.plp');

insert into ressource(nomressource) values
('R5.01   Initiation au management d’une équipe de projet informatique    '),
('R5.02   Projet Personnel et Professionnel'),
('R5.03   Politique de communication'),
('R5.04   Qualité algorithmique'),
('R5.05   Programmation avancée'),
('R5.06   Programmation multimédia'),
('R5.07   Automatisation de la chaîne de production'),
('R5.08   Qualité de développement'),
('R5.09   Virtualisation avancée'),
('R5.10   Nouveaux paradigmes de base de données'),
('R5.11   Méthodes d’optimisation pour l’aide à la décision'),
('R5.12   Modélisations mathématiques'),
('R5.13   Économie durable et numérique'),
('R5.14   Anglais'),

('R6.01   Initiation à l''entrepreneuriat'),
('R6.02   Droit du numérique et de la propriété intellectuelle'),
('R6.03   Communication : organisation et diffusion de l''information'),
('R6.04   Projet Personnel et Professionnel'),
('R6.05   Développement avancé'),
('R6.06   Maintenance applicative');

INSERT INTO rattrapage(dateRattrapage,typeRattrapage,dureeRattrapage,commentaireRattrapage,semestre,idRessource,idEnseignant) VALUES
('2024-01-31','Papier',2.5,'Ceci est un super rattrapage','S6',6,2),
('2024-02-24','Machine',6.5,'C'' est Philippe qui offre','S5',1,2),
('2024-03-04','Machine',1.0,'Les absents sont Logann Gouley et Enzo Ferrand, deux amants ayant triché','S6',8,2);