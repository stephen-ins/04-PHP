-- Création de la database tchat
CREATE DATABASE tchat;

USE tchat;

-- BDD: tchat
-- Table:  commentaire
--     id_commentaire      // INT(11) PK - AI
--     pseudo              // VARCHAR(255) NOT NULL
--     dateEnregistrement  // DATETIME
--     message             //LONGTEXT
CREATE TABLE
  commentaire (
    id_commentaire INT (11) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL,
    dateEnregistrement DATETIME NOT NULL,
    message LONGTEXT NOT NULL,
    PRIMARY KEY (id_commentaire)
  ) ENGINE = InnoDB;

-- C'est un exemple de faille de sécurité, car le mot de passe est stocké en clair dans la base de données.
-- BDD: tchat
-- Table:  utilisateur
--     id_utilisateur      // INT(11) PK - AI
--     pseudo              // VARCHAR(255) NOT NULL
--     motDePasse          // VARCHAR(255) NOT NULL
--     dateInscription     // DATETIME
CREATE TABLE
  utilisateur (
    id_utilisateur INT (11) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL,
    motDePasse VARCHAR(255) NOT NULL,
    dateInscription DATETIME NOT NULL,
    PRIMARY KEY (id_utilisateur)
  ) ENGINE = InnoDB;