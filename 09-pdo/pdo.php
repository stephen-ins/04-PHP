<?php

echo "<h2>01. PDO (php data object): CONNEXION</h2>";

echo '<br>';
echo '<br>';
echo '<br>';


// 


$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

/*
PDO est une classe prédéfinie en PHP qui permet de se connecter à une base de données.
Nous avons besoin d'instantier la classe 'new' pour pouvoir nous en servir, $pdo est un objet issu de la classe PDO.
Nous devons lui fournir en argument, les coordonnées de la BDD:
1. mysql:host (serveur de la BDD)
2. host : localhost -> adresse http du serveur (127.0.0.1)
3. dbname (nom de la BDD)
4. root : utilisateur (par défaut root en local)
5. '' : mot de passe (par défaut rien en local)
6. options (erreur warning, encodage des colonnes en utf8)
*/


echo '<br>';
echo '<br>';
echo '<br>';

echo '<pre>';
var_dump($pdo);
echo '</pre>';

// get_class_method est une fonction prédéfinie en PHP qui permet d'afficher les méthodes (fonctions) d'une classe.

/*

TOUTES LES METHODES (FONCTIONS) ISSUES DE LA CLASSE PDO :

Array
(
    [0] => __construct
    [1] => beginTransaction
    [2] => commit
    [3] => errorCode
    [4] => errorInfo
    [5] => exec
    [6] => getAttribute
    [7] => getAvailableDrivers
    [8] => inTransaction
    [9] => lastInsertId
    [10] => prepare
    [11] => query
    [12] => quote
    [13] => rollBack
    [14] => setAttribute
)
*/

echo '<br>';
echo '<br>';
echo '<br>';

echo '<pre>';
print_r(get_class_methods($pdo));
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

echo "<h2>02. PDO : EXEC -  INSERT - UPDATE - DELETE</h2>";

echo '<br>';
echo '<br>';
echo '<br>';

// INSERT
// $execute = true;
if (isset($execute)) {
  $result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Stephen', 'Ins', 'm', 'pdg', '2025-06-21', 5000)");
  echo "Nombre d'enregistrements affectés par insert :  $result  <br>";
}


// exec() est une méthode de la classe PDO qui permet de formuler des requêtes SQL de type INSERT, UPDATE, DELETE en BDD. On doit lui fournir en argument la requête SQL. Elle permet d'exécuter ces requêtes citées plus haut.
// Elle retourne le nombre d'execution de requetes enregistrées dans la BDD.

echo '<br>';
echo '<br>';
echo '<br>';


// UPDATE
// Exo : Executer le script permettant de modifier le salaire de l'employé Jean-Pierre par 1300 et son service par 'marketing' en fonction de son id 350.

$resultUpdate = $pdo->exec('UPDATE employes SET salaire = 1300, service = "Marketing" WHERE id_employes = 350');
echo "Mise à jour de Jean-Pierre affectés par insert :  $resultUpdate  <br>";


// DELETE
// Exo : Executer le script permettant de supprimer l'employé dont l'id est 350.

$resultDelete = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");
echo "Mise à jour de Jean-Pierre affectés par insert :  $resultDelete  <br>";

echo '<br>';
echo '<br>';
echo '<br>';

echo "<h2>03. PDO : QUERY -  SELECT + FETCH_ASSOC (1 seul résultat)</h2>";


echo '<br>';
echo '<br>';
echo '<br>';


// La méthode query() de la classe PDO retourne un autre objet issu d'une clase PDOStatement ! Cette classe contient ses propres méthodes (fonctions) permettant de rendre le résultat exploitable.
$data  = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'");

echo '<br>';
echo '<br>';
echo '<br>';

echo '<pre>';
var_dump($data);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

echo '<pre>';
print_r(get_class_methods($data));
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';


// Constante de la classe PDO qui retourne un Array indéxé avec le nom des champs/colonnes de la table SQL
$arrayEmploye = $data->fetch(PDO::FETCH_ASSOC);

// Constante de la classe PDO qui retourne un array indéxé numériquement.
// $arrayEmploye = $data->fetch(PDO::FETCH_NUM); 

// Constante de la classe PDO qui retourne un objet de la classe stdClass (class par défaut en PHP) avec comme propriété public les champs/colonnes de la table SQL ($arrayEmploye->prenom).
// $arrayEmploye = $data->fetch(PDO::FETCH_OBJ); 

echo '<pre>';
print_r($arrayEmploye);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

/*

$pdo représente un objet issur de la classe prédéfinie PDO
Quand on exécute une requête de séléction via la méthode query() sur l'objet PDO : 
- Succès : On obtient un autre objet issu d'une autre clase PDOStatement. Cet objet à donc des méthodes et propriétés différentes ! 
- Echec : boolean FALSE
$data est inexploitable en l'état.
La méthode fetch() issu de l'objet PDOStatement $data permet de convertir l'objet en un tableau de donnés Array indexé avec le nom des champs/colonnes de la table SQL.

Array
(
    [id_employes] => 854
    [prenom] => Daniel
    [nom] => Chevel
    [sexe] => m
    [service] => informatique
    [date_embauche] => 2011-09-28
    [salaire] => 1700
)


*/

// Il est possible de piocher dans le tableau
echo "Bonjour, je suis $arrayEmploye[prenom] $arrayEmploye[nom] et je travail au service $arrayEmploye[service] <br>";


echo '<br>';
echo '<br>';
echo '<br>';

// Nous pouvons parcourir les données à l'aide d'une boucle foreach
foreach ($arrayEmploye as $key => $value) {
  echo "$key:$value <br>";
}

echo '<br>';
echo '<br>';
echo '<br>';


echo "<h2>04. PDO : QUERY -  SELECT + FETCH_ASSOC (Plusieurs résultat)</h2>";

echo '<br>';
echo '<br>';
echo '<br>';

$data = $pdo->query("SELECT * FROM employes");


// Tant qu'il y'a des résultats que retourne la méthode fetch(), tant que $arrayEmploye retourne TRUE, la boucle continue de tourner.
// Si la requete retourne plusieurs résultats, nous sommes obligé de boucler le résultat.
while ($arrayEmploye = $data->fetch(PDO::FETCH_ASSOC)) {
  echo '<pre>';
  print_r($arrayEmploye);
  echo '</pre>';

  echo '<div style="background: green; padding: 1rem; margin-bottom; 1rem;">';
  echo "$arrayEmploye[prenom] <br>";
  echo "$arrayEmploye[nom] <br>";
  echo "$arrayEmploye[service] <br>";
  echo '</div>';
}

echo '<br>';
echo '<br>';
echo '<br>';

// rowCount() est une méthode de la classe PDOStatement qui permet de retourner le nombre de lignes affectées dans la base de donnéees, dans la table SQL. (ex: pratique pour compter le nombre de produits stockées).
echo "Nombre d'employes : " . $data->rowCount() . '<hr>';

echo '<br>';
echo '<br>';
echo '<br>';

echo "<h2>05. PDO : QUERY -  SELECT + FETCH_ALL = FECTH_ASSOC (Plusieurs résultat)</h2>";

echo '<br>';
echo '<br>';
echo '<br>';

$data = $pdo->query("SELECT * FROM employes");
echo '<pre>';
print_r($data);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

// La méthode fetchAll() de la classe PDOStatement retourne un tableau multidimensionnel, chaque ligne est indexé numériquement dans le tableau mutlidimensionnel.
$arrayAllEmployes = $data->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($arrayAllEmployes);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

// Exo: Afficher successivement les données des employés en pasant par le tableau multidimensionnel à l'aide des boucles foreach (boucles imbriqués).
// $arrayAllEmployes est un tableau multidimensionnel, nous devons donc faire une boucle foreach dans une autre boucle foreach pour parcourir les données. Et afficher les données de chaque employé. Dans un tableau associatif avec les clés et les valeurs.
foreach ($arrayAllEmployes as $employe) {
  foreach ($employe as $key => $value) {
    echo '<div style="background: salmon; padding: 1rem font-weigh: bold">';
    echo "$key : $value <br>";
    echo '</div>';
  }
  echo '<hr>';
}


// Deuxième méthode de recherche via boucle foreach
// foreach ($arrayAllEmployes as $key => $arrayUnEmploye) {
//   foreach ($arrayUnEmploye as $key2 => $value) {
//     echo '<div style="background: pink; padding: 1rem font-weigh: bold">';
//     echo "$key2 : $value <br>";
//     echo '</div>';
//   }
//   echo '<hr>';
// }

echo '<br>';
echo '<br>';
echo '<br>';

echo "<h2>06. PDO : FETCH</h2>";

echo '<br>';
echo '<br>';
echo '<br>';

// Exo : Afficher la liste des bases de données dans une liste <ul><li></li></ul> HTML.
// 1ère méthode
echo '<ul>';
$query = $pdo->query("SHOW DATABASES");
while ($database = $query->fetch(PDO::FETCH_ASSOC)) {
  echo '<li style="background: green; padding: 1rem; width: 20%">';
  echo $database['Database'];
  echo '</li>';
}
echo '</ul>';


$data = $pdo->query("SHOW DATABASES");
echo '<pre>';
echo print_r($data);
echo '</pre>';
echo '<pre>';
echo print_r(get_class_methods($data));
echo '</pre>';

$arrayDatabases = $data->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($arrayDatabases);
echo '</pre>';

// 2ème méthode
echo '<ul>';
foreach ($arrayDatabases as $key => $array) {
  echo '<li style="background: orange; padding: 1rem; width: 20%">';
  echo $array['Database'];
  echo '</li>';
}
echo '<ul>';

echo '<br>';
echo '<br>';
echo '<br>';

echo "<h2>07. PDO : QUERY -  FETCH - TABLE</h2>";

echo '<br>';
echo '<br>';
echo '<br>';

// data est un objet de la classe PDOStatement.
$data = $pdo->query("SELECT * FROM employes");

echo '<pre>';
print_r($data);
echo '</pre>';

echo '<pre>';
echo print_r(get_class_methods($data));
echo '</pre>';

$arrayAllEmployes = $data->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($arrayAllEmployes);
echo '</pre>';

// columnCount() est une méthode de la classe PDOStatement qui permet de retourner le nombre de colonnes affectées par la requête SQL.
// ici: 7 colonnes
print_r($data->columnCount());

/*

La boucle for tourne autant de fois que nous avons selectionné de colonnes dans la BDD, dans la table SQL (ici 7 colonnes).
getColumnMeta() est une méthode de la classe PDOStatement qui permet de retourner les métadonnées de la colonne en cours dans la boucle for (description de la colonne ; nom, taille, varchar, primary key, etc...).
Pour chaque tour de boucle FOR, getColumnMeta() retourne les données d'une colonne, il faut lui transmettre le numéro de la colonne en argument.
Pour afficher le nom de la colonne, il faut crocheter à l'indice $dataColonne['name'] du tableau Array retourné par getColumnMeta().

*/


echo '<table border="2">';
echo '<tr>';

for ($colonne = 0; $colonne < $data->columnCount(); $colonne++) {
  $dataColonne = $data->getColumnMeta($colonne);
  echo '<pre>';
  print_r($dataColonne);
  echo '</pre>';
  echo "<th>{$dataColonne['name']}</th>";
}
echo '</tr>';

foreach ($arrayAllEmployes as $key => $arrayEmploye) {
  echo '<tr>';

  foreach ($arrayEmploye as $key2 => $value) {
    echo "<td>$value</td>";
  }
  echo '</tr>';
}

echo '</table>';

/*

$arrayAllEmployes contient un tableau multidimensionnel avec l'ensemble des employés, indexés numériquement.
$arrayUnEmploye réceptionne l'Array (1ligne de la table SQL) d'un employé à chaque tour de boucle.
Il n'est pas possible de faire un echo de $arrayUnEmploye, on ne peut pas convertir un array en chaines de caractères.
Nous devons donc le transmettre à la 2ème boucle foreach pour le parcourir et afficher les données de chaque employé.

*/


echo '<br>';
echo '<br>';
echo '<br>';










?>


<!--  -->