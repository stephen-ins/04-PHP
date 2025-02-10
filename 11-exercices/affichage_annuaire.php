<?php






//  Créez une page « affichage_annuaire.php » qui permettra de récupérer les données et ainsi afficher le nom des champs suivi des informations contenues à l’intérieur de la table « annuaire ».
// Ces données devra être de la forme d'un tableau.

// 1. Connexion à la base de données
$connect_bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

// Visuel sur la table annuaire 
$data = $connect_bdd->query("SELECT * FROM annuaire");

// Ne retourne rien pour le moment
echo '<pre>';
print_r($data);
echo '</pre>';

// Récupération des données dans la table annuaire
// $data = $connect_bdd->query("SELECT * FROM annuaire");
// $arrayAnnuaire = $data->fetchAll(PDO::FETCH_ASSOC);

// print_r($arrayAnnuaire);
echo '<pre>';
print_r($arrayAnnuaire);
echo '</pre>';

// J'ai maintenant accès à toutes les données de la table annuaire y compris le plus important pour moi l'id_annuaire
// Les 2 liens ci-dessous renvoi les informations de l'id_annuaire correspondant à ma BDD dans l'url de la page.
/*
<a href="?action=delete&id=<?php echo $arrayClient['id_annuaire']; ?>" class="p-1 btn btn-danger btn-sm w-100">Supprimer</a>
<a href="?action=update&id=<?php echo $arrayClient['id_annuaire']; ?>" class="p-1 btn btn-warning btn-sm w-100 mt-2">Modifier</a>
*/

// Je vais maintenant créer une condition pour la suppression des clients de la table annuaire
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  // Je récupère l'id_annuaire de l'url
  $id = $_GET['id'];
  // Je prépare la requête de suppression en me connectant à la BDD
  $reqDelete = $connect_bdd->prepare("DELETE FROM annuaire WHERE id_annuaire = :id");
  // Je lie l'id_annuaire à la requête de suppression
  $reqDelete->bindValue(':id', $id, PDO::PARAM_INT);
  // J'exécute la requête de suppression
  $reqDelete->execute();
}


// Mais on peut aussi utiliser la méthode fetchAll() pour retourner toutes les données de la table annuaire
//                      retourne toutes les données de la table annuaire ARRAY multi
$arrayAnnuaire = $data->fetchAll(PDO::FETCH_ASSOC);
// Retourne les données de la table annuaire avec l'index et les itmes(champs) de la table ainsi que les données
echo '<pre>';
print_r($arrayAnnuaire);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

// Cette fonction retourne le nombre de colonnes de la table annuaire 

//              ici 11 colonnes dont les titres des colonnes
print_r($data->columnCount());

echo '<br>';
echo '<br>';
echo '<br>';




// Création d'un tableau pour afficher les données de la table annuaire
// Boucle for qui tourne autant de fois qu'il y a de colonnes dans la table annuaire soit ici 10 colonnes + 1 pour l'index(PK)

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

// $arrayAnnuaire est un tableau multi-dimensionnel avec les index et les items de la table annuaire
foreach ($arrayAnnuaire as $key => $arrayClient) {
  echo '<tr>';

  foreach ($arrayClient as $key2 => $value) {
    echo "<td>$value</td>";
  }
  echo '</tr>';
}
echo '</table>';


// En bas voici la version brut du tableau :

// for ($colonne = 0; $colonne < $data->columnCount(); $colonne++) {
//   $dataColonne = $data->getColumnMeta($colonne);
//   echo '<pre>';
//   print_r($dataColonne);
//   echo '</pre>';
// }

// foreach ($arrayAnnuaire as $key => $arrayClient) {
//   foreach ($arrayClient as $key2 => $value) {
//     echo "$value";
//   }
// }


// Insérer un client dans la table annuaire avec la commande INSERT INTO --> moi en l'occurence ;-)
// $execute = true;
if (isset($execute)) {
  $result = $connect_bdd->exec("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES ('Stephen', 'Ins', '0606060606', 'pdg', 'Nantes', '44000', '1 rue de la paix', '2021-06-21', 'm', 'THE BEST OF THE BEST OF THE BEST')");
  echo "Nombre d'enregistrements affectés par insert :  $result  <br>"; // 1
}

// Code pour mise à jour de la profession du client stephen ins
if (isset($execute)) {
  $result = $connect_bdd->exec("UPDATE annuaire SET profession = 'Président' WHERE nom = 'Stephen' AND prenom = 'Ins'");
  echo "Nombre d'enregistrements affectés par update :  $result  <br>"; // 1
}

if (isset($execute)) {
  $result = $connect_bdd->exec("UPDATE annuaire SET profession = 'Militaire' WHERE nom = 'Display'");
  echo "Nombre d'enregistrements affectés par update :  $result  <br>"; // 1
}


// Insérer un compteur client en différenciant les clients hommes et femmes
// fonction count() pour compter le nombre d'éléments dans un tableau

$sex = 'm';
$sex2 = 'f';

// Fonction pour définir le nombre de clients hommes et femmes
function rowCount($array, $sex)
{
  $count = 0;
  foreach ($array as $client) {
    if ($client['sexe'] === $sex) {
      $count++;
    }
  }
  return $count;
}

// Compteur client homme
$countClientM = rowCount($arrayAnnuaire, $sex);
echo "Nombre de clients hommes : $countClientM <br>";

// Compteur client femme
$countClientF = rowCount($arrayAnnuaire, $sex2);
echo "Nombre de clients femmes : $countClientF <br>";


// Nombre de client actuellement dans la table annuaire
$countClient = count($arrayAnnuaire);
echo "Nombre de clients : $countClient <br>";




















?>

<!--  -->




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Le repertoire | Informations clients</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <div class="d-flex flex-column justify-content-center align-items-center col-10 mx-auto p-5 rounded-3 my-5 w-90">

    <h1 class="text-center p-lg-5 my-3 w-100">VISUEL EXECUTION COMMANDE</h1>


    <div class="alert alert-danger m-5 w-100" role="alert">
      <p class="text-white text-center text-bg-dark">print_r :</p>

      <?php
      echo '<pre>';
      print_r($_POST);
      echo '</pre>';
      ?>
    </div>

    <div class="alert alert-danger m-5 w-100" role="alert">
      <p class="text-white text-center text-bg-dark">Méthodes(fonctions) de la classe PDO (BDD: $connect_bdd) :</p>
      <?php
      echo '<pre>';
      print_r(get_class_methods($connect_bdd));
      echo '</pre>';
      ?>
    </div>

    <!-- Affichage du dernier client enregistré dans la base -->
    <div class="alert alert-success m-5 w-100" role="alert">
      <p class="text-white text-center text-bg-dark">Dernier client enregistré :</p>
      <?php
      $lastClient = $connect_bdd->query("SELECT * FROM annuaire ORDER BY id_annuaire DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
      if ($lastClient): ?>
        <ul>
          <li>Nom: <?php echo htmlspecialchars($lastClient['nom']); ?></li>
          <li>Prénom: <?php echo htmlspecialchars($lastClient['prenom']); ?></li>
          <li>Téléphone: <?php echo htmlspecialchars($lastClient['telephone']); ?></li>
          <li>Profession: <?php echo htmlspecialchars($lastClient['profession']); ?></li>
          <li>Ville: <?php echo htmlspecialchars($lastClient['ville']); ?></li>
          <li>Code Postal: <?php echo htmlspecialchars($lastClient['codepostal']); ?></li>
          <li>Adresse: <?php echo htmlspecialchars($lastClient['adresse']); ?></li>
          <li>Date de Naissance: <?php echo htmlspecialchars($lastClient['date_de_naissance']); ?></li>
          <li>Sexe: <?php echo htmlspecialchars($lastClient['sexe']); ?></li>
          <li>Description: <?php echo htmlspecialchars($lastClient['description']); ?></li>
        </ul>
      <?php else: ?>
        <p>Aucun client enregistré récemment.</p>
      <?php endif; ?>
    </div>


    <h1 class="text-center p-lg-5 my-3 w-100">ANNUAIRE DES CLIENTS ENREGISTRES</h1>


    <div class="alert alert-success m-5 w-100" role="alert">
      <p class="text-white text-center text-bg-dark">Statistiques sexe :
      </p>

      <div class="text-center ">
        <p>Nombre d'hommes : <span style="color: red; font-weight: bold;'"><?php echo $countClientM; ?> </span></p>
        <p>Nombre de femmes : <span style="color: red; font-weight: bold;'"><?php echo $countClientF; ?> </span></p>
      </div>

    </div>

    <div class="alert alert-primary m-5 w-100" role="alert">
      <p class="text-white text-center text-bg-dark" style="font-weight: bold; font-size: 1.5rem;">TOTAL CLIENTS DANS LA BASE : <span style="color: red;"><?php echo $countClient; ?></span></p>

      <table class="table table-striped table-bordered w-100">

        <thead class="thead-dark text-center text-danger">
          <tr>
            <th scope="col">N°=</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Profession</th>
            <th scope="col">Ville</th>
            <th scope="col">Code Postal</th>
            <th scope="col">Adresse</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Sexe</th>
            <th scope="col">Description</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($arrayAnnuaire as $index => $arrayClient):
          ?>

            <tr>
              <th scope="row"><?php echo $arrayClient["id_annuaire"]; ?></th>
              <td><?php echo htmlspecialchars($arrayClient['nom']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['prenom']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['telephone']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['profession']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['ville']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['codepostal']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['adresse']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['date_de_naissance']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['sexe']); ?></td>
              <td><?php echo htmlspecialchars($arrayClient['description']); ?></td>


              <td>
                <a href="?action=delete&id=<?php echo $arrayClient['id_annuaire']; ?>" class="p-1 btn btn-danger btn-sm w-100">Supprimer</a>
                <a href="update_annuaire.php?action=update&id=<?php echo $arrayClient['id_annuaire']; ?>" class="p-1 btn btn-warning btn-sm w-100 mt-2">Modifier</a>
              </td>

            </tr>


          <?php endforeach; ?>
        </tbody>
      </table>




    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>