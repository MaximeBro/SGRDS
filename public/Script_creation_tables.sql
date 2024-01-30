DROP TABLE utilisateur CASCADE;
DROP TABLE rattrapage CASCADE;
DROP TABLE etudiant CASCADE;
DROP TABLE rattrapage_etudiant CASCADE;
DROP TABLE utilisateur_rattrapage CASCADE;

-- Table pour les utilisateurs (directeur des études, enseignants)
CREATE TABLE utilisateur (
    idUtilisateur SERIAL PRIMARY KEY,
    nomUtilisateur VARCHAR(50) NOT NULL,
    prenomUtilisateur VARCHAR(50) NOT NULL,
    emailUtilisateur VARCHAR(100) NOT NULL UNIQUE,
    mdpUtilisateur VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL -- 'directeur' ou 'enseignant'
);

-- Table pour les rattrapages
CREATE TABLE rattrapage (
    idRattrapage SERIAL PRIMARY KEY,
    dateRattrapage DATE NOT NULL,
    typeRattrapage VARCHAR(50) NOT NULL, -- Exemple: 'Papier', 'Machine'
    dureeRattrapage INT NOT NULL, -- Durée en minutes
    commentaireRattrapage TEXT,
    semestre TEXT NOT NULL,
    ressource TEXT NOT NULL,
    annee VARCHAR(4) NOT NULL,
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
CREATE TABLE utilisateur_rattrapage (
    idEnseignant INT REFERENCES utilisateur(idUtilisateur),
    idRattrapage INT REFERENCES rattrapage(idRattrapage),
    dateRattrapage DATE NOT NULL,
    horaireRattrapage TIME NOT NULL,
    typeRattrapage VARCHAR(50) NOT NULL,
    salleRattrapage VARCHAR(50),
    commentaire TEXT
);
