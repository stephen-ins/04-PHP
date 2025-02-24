CREATE DATABASE annonceo;

USE annonceo;

CREATE TABLE
  membre (
    id_membre INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    telephone VARCHAR(20),
    email VARCHAR(100) NOT NULL UNIQUE,
    civilite ENUM ('m', 'f') NOT NULL,
    statut TINYINT (1) NOT NULL DEFAULT 0,
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP
  );

CREATE TABLE
  photo (
    id_photo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    photo1 VARCHAR(255),
    photo2 VARCHAR(255),
    photo3 VARCHAR(255),
    photo4 VARCHAR(255),
    photo5 VARCHAR(255)
  );

CREATE TABLE
  categorie (
    id_categorie INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    motscles TEXT NOT NULL
  );

CREATE TABLE
  note (
    id_note INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    membre_id1 INT UNSIGNED NOT NULL,
    membre_id2 INT UNSIGNED NOT NULL,
    note TINYINT UNSIGNED NOT NULL CHECK (note BETWEEN 1 AND 5),
    avis TEXT,
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (membre_id1) REFERENCES membre (id_membre) ON DELETE CASCADE,
    FOREIGN KEY (membre_id2) REFERENCES membre (id_membre) ON DELETE CASCADE
  );

CREATE TABLE
  annonce (
    id_annonce INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description_courte VARCHAR(255) NOT NULL,
    description_longue TEXT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    photo VARCHAR(200),
    pays VARCHAR(50) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    cp VARCHAR(10) NOT NULL,
    membre_id INT UNSIGNED NOT NULL,
    photo_id INT UNSIGNED,
    categorie_id INT UNSIGNED NOT NULL,
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (membre_id) REFERENCES membre (id_membre) ON DELETE CASCADE,
    FOREIGN KEY (photo_id) REFERENCES photo (id_photo) ON DELETE SET NULL,
    FOREIGN KEY (categorie_id) REFERENCES categorie (id_categorie) ON DELETE CASCADE
  );

CREATE TABLE
  commentaire (
    id_commentaire INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    membre_id INT UNSIGNED NOT NULL,
    annonce_id INT UNSIGNED NOT NULL,
    commentaire TEXT NOT NULL,
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (membre_id) REFERENCES membre (id_membre) ON DELETE CASCADE,
    FOREIGN KEY (annonce_id) REFERENCES annonce (id_annonce) ON DELETE CASCADE
  );