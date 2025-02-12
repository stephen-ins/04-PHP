<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$connect_db = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if (isset($_GET['action']) && $_GET['action'] == 'update') {
  // echo 'Mise à jour effectuée via le bouton modification';

  $data = $connect_db->prepare("SELECT * FROM annuaire WHERE id_annuaire = :id");
  $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $data->execute();

  // var_dump($data->rowCount());

  // rowCount() : méthode de la classe PDOStatement, permet de compter le nombre de lignes retournées par la requête SELECT
  // Si rowCount() retourne 1 INT, la condition est retourne true, on entre dans le IF
  // Si rowCount() retourne 1 BOOLEAN false, la condition IF est retourne false, on entre pas dans le IF
  if (!$data->rowCount()) {
    // Si la condition est false, cela veut dire que l'indice 'id' n'existe pas dans la table annuaire alors on redirige vers l'affichage.
    header('location: CORRECTION-affichage_annuaire.php');
  }
  $arrayAnnuaire = $data->fetch(PDO::FETCH_ASSOC);
  echo '<pre>';
  print_r($arrayAnnuaire);
  echo '</pre>';
}

// Si l'indice submit est bien défini dans $_POST, cela veut dire que le formulaire a été envoyé en cliquant sur 'submit'
if (isset($_POST['submit'])) {

  if (isset($_GET['action']) && $_GET['action'] == 'update') {
    // Requête SQL update
    $data = $connect_db->prepare("UPDATE annuaire SET nom = :nom, prenom = :prenom, telephone = :telephone, profession = :profession, ville = :ville, codepostal = :codepostal, adresse = :adresse, date_de_naissance = :date_de_naissance, sexe = :sexe, description = :description WHERE id_annuaire = :id");
  } else {

    // $data : objet de la classe PDOStatement
    $data = $connect_db->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES ( :nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description)");
    $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  }


  $data->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
  $data->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
  $data->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
  $data->bindValue(':profession', $_POST['profession'], PDO::PARAM_STR);
  $data->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
  $data->bindValue(':codepostal', $_POST['codepostal'], PDO::PARAM_STR);
  $data->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
  $data->bindValue(':date_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_STR);
  $data->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
  $data->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
  $data->execute(); // execute() : méthode de la classe PDOStatement, c'est ici que la requête SQL est exécutée


  // echo '<pre>';
  // print_r($data);
  // echo '</pre>';

  // echo '<pre>';
  // echo print_r(get_class_methods($data));
  // echo '</pre>';


  // Faire une redirection après l'envoi du formulaire (exécution de la requête SQL d'insertion)
  header('location: CORRECTION-affichage_annuaire.php?action=validate');
}



?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CORRECTION | REPERTOIRE | FORMULAIRE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="col-6 mx-auto">
    <h1 class="text-center mb-3">Ajouter annuaire</h1>

    <form method="post" action="">
      <div class="mb-3">
        <select class="form-select" name="sexe">
          <option value="m" <?php if (isset($arrayAnnuaire['sexe'])  && $arrayAnnuaire['sexe'] == 'm') echo 'selected' ?>>Homme</option>
          <option value="f" <?php if (isset($arrayAnnuaire['sexe'])  && $arrayAnnuaire['sexe'] == 'f') echo 'selected' ?>>Femme</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Saisir votre nom" id="Nom" value="<?php if (isset($arrayAnnuaire['nom'])) echo $arrayAnnuaire['nom'] ?>">
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control" placeholder="Saisir votre prenom" id="prenom" value="<?php if (isset($arrayAnnuaire['prenom'])) echo $arrayAnnuaire['prenom'] ?>">
      </div>
      <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="text" name="telephone" class="form-control" placeholder="Saisir votre telephone" id="telephone" value="<?php if (isset($arrayAnnuaire['telephone'])) echo $arrayAnnuaire['telephone'] ?>">
      </div>
      <div class="mb-3">
        <label for="profession" class="form-label">Profession</label>
        <input type="text" name="profession" class="form-control" placeholder="Saisir votre profession" id="profession" value="<?php if (isset($arrayAnnuaire['nom'])) echo $arrayAnnuaire['nom'] ?>">
      </div>
      <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" name="ville" class="form-control" placeholder="Saisir votre vile" id="ville" value="<?php if (isset($arrayAnnuaire['ville'])) echo $arrayAnnuaire['ville'] ?>">
      </div>
      <div class="mb-3">
        <label for="codepostal" class="form-label">Code postal</label>
        <input type="text" name="codepostal" class="form-control" placeholder="Saisir votre codepostal" id="codepostal" value="<?php if (isset($arrayAnnuaire['codepostal'])) echo $arrayAnnuaire['codepostal'] ?>">
      </div>
      <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" name="adresse" class="form-control" placeholder="Saisir votre adresse" id="adresse" value="<?php if (isset($arrayAnnuaire['adresse'])) echo $arrayAnnuaire['adresse'] ?>">
      </div>
      <div class="mb-3">
        <label for="date_de_naissance" class="form-label">Date de naissance</label>
        <input type="date" name="date_de_naissance" class="form-control" id="date_de_naissance" value="<?php if (isset($arrayAnnuaire['date_de_naissance'])) echo $arrayAnnuaire['date_de_naissance'] ?>">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="10" class="form-control"><?php if (isset($arrayAnnuaire['description'])) echo $arrayAnnuaire['description'] ?></textarea>

      </div>


      <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>