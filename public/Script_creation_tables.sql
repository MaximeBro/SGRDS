DROP TABLE utilisateur CASCADE;
DROP TABLE annee CASCADE;
DROP TABLE semestre CASCADE;
DROP TABLE ressource CASCADE;
DROP TABLE rattrapage CASCADE;
DROP TABLE etudiant CASCADE;
DROP TABLE rattrapage_etudiant CASCADE;
DROP TABLE enseignant_rattrapage CASCADE;

-- Table pour les utilisateurs (directeur des études, enseignants)
CREATE TABLE utilisateur (
    idUtilisateur SERIAL PRIMARY KEY,
    nomUtilisateur VARCHAR(50) NOT NULL,
    prenomUtilisateur VARCHAR(50) NOT NULL,
    emailUtilisateur VARCHAR(100) NOT NULL UNIQUE,
    mdpUtilisateur VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL -- 'directeur' ou 'enseignant'
);

-- Table pour les années (BUT 1, 2 et 3)
CREATE TABLE annee (
    idAnnee SERIAL PRIMARY KEY,
    nomAnnee VARCHAR(10) NOT NULL
);

-- Table pour les semestres (impair ou pair)
CREATE TABLE semestre (
    idSemestre SERIAL PRIMARY KEY,
    nomSemestre INT NOT NULL, -- Exemple: 1 pour impair, 2 pour pair
    idAnnee INT REFERENCES annee(idAnnee)
);

-- Table pour les ressources (matières, cours)
CREATE TABLE ressource (
    idRessource SERIAL PRIMARY KEY,
    nomRessource VARCHAR(100) NOT NULL
);

-- Table pour les rattrapages
CREATE TABLE rattrapage (
    idRattrapage SERIAL PRIMARY KEY,
    dateRattrapage DATE NOT NULL,
    typeRattrapage VARCHAR(50) NOT NULL, -- Exemple: 'Papier', 'Machine'
    dureeRattrapage INT NOT NULL, -- Durée en minutes
    commentaireRattrapage TEXT,
    idEnseignant INT REFERENCES utilisateur(idUtilisateur),
    idSemestre INT REFERENCES semestre(idSemestre),
    idRessource INT REFERENCES ressource(idRessource)
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
CREATE TABLE enseignant_rattrapage (
    idEnseignant INT REFERENCES utilisateur(idUtilisateur),
    idRattrapage INT REFERENCES rattrapage(idRattrapage),
    dateRattrapage DATE NOT NULL,
    horaireRattrapage TIME NOT NULL,
    typeRattrapage VARCHAR(50) NOT NULL,
    salleRattrapage VARCHAR(50),
    commentaire TEXT
);
