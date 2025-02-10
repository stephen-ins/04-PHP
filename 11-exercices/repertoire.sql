-- Création d'une base 'repertoire' et d'une table 'annuaire':
CREATE DATABASE IF NOT EXISTS repertoire;

/*

- id_annuaire (INT, 3, AI - PK)
- nom (VARCHAR, 30)
- prenom (VARCHAR, 30)
- telephone (INT, 10, zerofill)
- profession (VARCHAR, 30)
- ville (VARCHAR, 30)
- codepostal (INT, 5, zerofill)
- adresse (VARCHAR, 30)
- date_de_naissance (DATE)
- sexe (ENUM, 'm','f')
- description (TEXT)

 */
USE repertoire;

CREATE TABLE
  IF NOT EXISTS annuaire (
    id_annuaire INT (3) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    telephone INT (10) ZEROFILL,
    profession VARCHAR(30),
    ville VARCHAR(30),
    codepostal INT (5) ZEROFILL,
    adresse VARCHAR(30),
    date_de_naissance DATE,
    sexe ENUM ('m', 'f'),
    description TEXT
  );

INSERT INTO
  personnes (
    nom,
    prenom,
    telephone,
    profession,
    ville,
    codepostal,
    adresse,
    date_de_naissance,
    sexe,
    description
  )
VALUES
  (
    'Dupont',
    'Jean',
    '0601020301',
    'Développeur',
    'Paris',
    '75001',
    '10 rue de la Paix',
    '1990-02-15',
    'M',
    'Passionné de nouvelles technologies.'
  ),
  (
    'Martin',
    'Sophie',
    '0601020302',
    'Médecin',
    'Lyon',
    '69002',
    '15 avenue des Champs',
    '1985-07-10',
    'F',
    'Aime la randonnée et la photographie.'
  ),
  (
    'Bernard',
    'Luc',
    '0601020303',
    'Architecte',
    'Marseille',
    '13001',
    '25 boulevard du Prado',
    '1988-09-22',
    'M',
    'Spécialiste en urbanisme moderne.'
  ),
  (
    'Lefebvre',
    'Emma',
    '0601020304',
    'Avocate',
    'Lille',
    '59000',
    '8 rue Nationale',
    '1992-11-05',
    'F',
    'Passionnée de droit et de justice.'
  ),
  (
    'Morel',
    'Thomas',
    '0601020305',
    'Ingénieur',
    'Bordeaux',
    '33000',
    '12 place des Quinconces',
    '1986-05-18',
    'M',
    'Travaille sur les énergies renouvelables.'
  ),
  (
    'Girard',
    'Camille',
    '0601020306',
    'Professeur',
    'Nantes',
    '44000',
    '5 allée des Acacias',
    '1995-04-27',
    'F',
    'Enseigne la littérature française.'
  ),
  (
    'Laurent',
    'Antoine',
    '0601020307',
    'Comptable',
    'Strasbourg',
    '67000',
    '18 rue de la Gare',
    '1983-12-03',
    'M',
    'Expert en fiscalité des entreprises.'
  ),
  (
    'Simon',
    'Julie',
    '0601020308',
    'Pharmacienne',
    'Toulouse',
    '31000',
    '22 rue du Capitole',
    '1991-06-30',
    'F',
    'Passionnée de médecine naturelle.'
  ),
  (
    'Michel',
    'Hugo',
    '0601020309',
    'Journaliste',
    'Nice',
    '06000',
    '30 promenade des Anglais',
    '1989-03-21',
    'M',
    'Rédige des articles sur l’actualité politique.'
  ),
  (
    'Lemoine',
    'Laura',
    '0601020310',
    'Designer',
    'Rennes',
    '35000',
    '7 rue de l’Art',
    '1994-08-12',
    'F',
    'Créatrice de mode et styliste.'
  ),
  (
    'Roux',
    'Nicolas',
    '0601020311',
    'Chef cuisinier',
    'Montpellier',
    '34000',
    '11 rue des Saveurs',
    '1980-10-25',
    'M',
    'Maître dans l’art de la cuisine française.'
  ),
  (
    'Blanc',
    'Claire',
    '0601020312',
    'Psychologue',
    'Dijon',
    '21000',
    '20 rue de la Santé',
    '1987-05-08',
    'F',
    'Spécialisée en thérapie cognitive.'
  ),
  (
    'Fontaine',
    'Alexandre',
    '0601020313',
    'Entrepreneur',
    'Grenoble',
    '38000',
    '3 avenue des Alpes',
    '1990-09-14',
    'M',
    'Créateur de startups innovantes.'
  ),
  (
    'Chevalier',
    'Marion',
    '0601020314',
    'Vétérinaire',
    'Clermont-Ferrand',
    '63000',
    '14 rue des Animaux',
    '1993-02-19',
    'F',
    'Aide les animaux en détresse.'
  ),
  (
    'Regnier',
    'Benoît',
    '0601020315',
    'Pilote de ligne',
    'Toulon',
    '83000',
    '28 boulevard de l’Aviation',
    '1984-11-11',
    'M',
    'Voyage à travers le monde.'
  ),
  (
    'Perrot',
    'Alice',
    '0601020316',
    'Artiste peintre',
    'Le Havre',
    '76600',
    '9 rue des Arts',
    '1996-01-07',
    'F',
    'Expose ses œuvres à l’international.'
  ),
  (
    'Garnier',
    'Maxime',
    '0601020317',
    'Développeur web',
    'Rouen',
    '76000',
    '13 avenue du Code',
    '1992-04-16',
    'M',
    'Spécialisé en JavaScript et React.'
  ),
  (
    'Dumont',
    'Elise',
    '0601020318',
    'Musicienne',
    'Orléans',
    '45000',
    '6 rue de la Musique',
    '1985-08-23',
    'F',
    'Joue du violon dans un orchestre.'
  ),
  (
    'Barbier',
    'Paul',
    '0601020319',
    'Écrivain',
    'Metz',
    '57000',
    '21 rue des Lettres',
    '1979-12-29',
    'M',
    'Auteur de romans à succès.'
  ),
  (
    'Meunier',
    'Charlotte',
    '0601020320',
    'Astronome',
    'Brest',
    '29200',
    '16 rue des Étoiles',
    '1988-06-05',
    'F',
    'Étudie les exoplanètes.'
  );