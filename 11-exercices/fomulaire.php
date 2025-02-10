<?php
// Affichage de la saisie
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


// Récupération des données du formulaire
$msgContent = '';
if (isset($_POST['submit'])) {

  // foreach ($_POST as $key => $value) {
  //   $_POST[$key] = strip_tags(addslashes($value));
  // }

  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $phone = $_POST['phone'];
  $work = $_POST['work'];
  $city = $_POST['city'];
  $zipcode = $_POST['zipcode'];
  $location = $_POST['location'];
  $birthdate = $_POST['birthdate'];
  $sexe = $_POST['sexe'];
  $message = $_POST['message'];

  $msgContent = "Nom : $lastname <br> Prénom : $firstname <br> Téléphone : $phone <br> Profession : $work <br> Ville : $city <br> Code Postal : $zipcode <br> Adresse : $location <br> Date de naissance : $birthdate <br> Sexe : $sexe <br> Description : $message";
}

// Développer le code permettant l'insertion des saisies dans la table "annuaire" de la base de données "repertoire". Chaque enregistrement, validation du formulaire, doit ajouter une ligne d'enregistrement dans la table "annuaire".

// 1. Connexion à la base de données
//                                                BDD cible : repertoire
$connect_bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


// 2. Récupération et affichage des données saisie en PHP (POST)

if (isset($_POST['submit'])) {
  foreach ($_POST as $key => $value) {
    $_POST[$key] = strip_tags(addslashes($value));
  }

  // 3. Requete SQL d'enregistrement (INSERT)
  // Insertion des données dans la table "annuaire" avec la requête SQL INSERT INTO


  $reqInsert = $connect_bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES (:nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description)");

  $reqInsert->bindValue(':nom', $_POST['lastname'], PDO::PARAM_STR);
  $reqInsert->bindValue(':prenom', $_POST['firstname'], PDO::PARAM_STR);
  $reqInsert->bindValue(':telephone',   $_POST['phone'], PDO::PARAM_STR);
  $reqInsert->bindValue(':profession',  $_POST['work'], PDO::PARAM_STR);
  $reqInsert->bindValue(':ville', $_POST['city'], PDO::PARAM_STR);
  $reqInsert->bindValue(':codepostal',  $_POST['zipcode'], PDO::PARAM_STR);
  $reqInsert->bindValue(':adresse', $_POST['location'], PDO::PARAM_STR);
  $reqInsert->bindValue(':date_de_naissance', $_POST['birthdate'], PDO::PARAM_STR);
  $reqInsert->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
  $reqInsert->bindValue(':description', $_POST['message'], PDO::PARAM_STR);
  $reqInsert->execute();
}













// Si la variable $error n'est pas défini !! (isset), alors l'internaute a correctement  rempli le formulaire, il entre dans aucun cas de contrôle ci-dessus, alors on entre dans le IF.
if (!isset($error)) {
  $msgValidation = '<div class="alert alert-success text-center my-3">Félicitation ! Votre formulaire est enregistré !</div>';

  // Requete d'insertion en BDD
  // Redirection de page
}

?>

<!--  -->



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Le repertoire | Informations de contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <div class="col-6 mx-auto p-5 rounded-3 my-5">

    <h1 class="text-center p-lg-5 my-3">INFORMATIONS DE CONTACT</h1>


    <div class="alert alert-primary m-5" role="alert">
      <?php echo '<pre>';
      print_r($_POST);
      echo '</pre>'; ?>
    </div>

    <div class="alert alert-primary m-5" role="alert">
      <?php echo '<pre>';
      var_dump($_POST);
      echo '</pre>'; ?>
    </div>

    <div class="alert alert-danger m-5" role="alert">
      <?php if ($msgContent): ?>
        <div class="alert alert-info">
          <?php echo $msgContent; ?>
        </div>
      <?php endif; ?>
    </div>


    <form method="post" action="">
      <!-- <form method="post" action="affichage_annuaire.php"> -->




      <?php if (isset($msgValidation)) echo $msgValidation; ?>



      <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" name="lastname" class="form-control" placeholder="Saisir votre nom" id="lastname">
      </div>
      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" name="firstname" class="form-control" placeholder="Saisir votre prénom" id="firstname">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="text" name="phone" class="form-control" placeholder="Votre numéro de téléphone" id="phone">
      </div>
      <div class="mb-3">
        <label for="work" class="form-label">Profession</label>
        <input type="text" name="work" class="form-control" placeholder="Votre profession" id="work">
      </div>
      <div class="mb-3">
        <label for="city" class="form-label">Ville</label>
        <input type="text" name="city" class="form-control" placeholder="Votre ville" id="city">
      </div>
      <div class="mb-3">
        <label for="zipcode" class="form-label">Code Postal</label>
        <input type="text" name="zipcode" class="form-control" placeholder="Votre code postal" id="zipcode">
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">Adresse</label>
        <input type="text" name="location" class="form-control" placeholder="Votre adresse" id="location">
      </div>
      <div class="mb-3">
        <label for="birthdate" class="form-label">Date de naissance</label>
        <input type="date" name="birthdate" class="form-control" id="birthdate">
      </div>
      <div class="mb-3">
        <label for="sexe" class="form-label">Sexe</label>
        <select name="sexe" class="form-select" id="sexe">
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Description</label>
        <textarea type="text" name="message" class="form-control" rows="5" placeholder="Votre description" id="message"></textarea>
      </div>
      <button type="submit" name="submit" id="submit" class="btn btn-primary m-1 w-50% ">Enregistrement</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>