<?php


// Permet de créer un fichier de session ou de l'ouvrir si il existe déjà.
// Ce fichier est stocké côté serveur (c://xampp/tmp)
session_start();



if ($_POST) {

  // On crée un indice 'email' dans le fichier de session auquel on stock l'email saisi dans le formulaire.
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['nom'] = $_POST['nom'];
  $_SESSION['prenom'] = $_POST['prenom'];
  $_SESSION['panier'] = 5;


  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';


  // Redirection
  header('Location: profil.php');
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>07 - Session | Accueil </title>
</head>

<body>



  <div class="container col-6 mx-auto">

    <h1 class="text-center mt-xxl-5 mb-xxl-5">Identifiez-vous</h1>


    <form method="post" action="">

      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisir votre prénom" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" placeholder="Saisir votre nom" name="nom" id="nom">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control  " placeholder="Saisir votre email" id="email">

      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control  " placeholder="Saisir votre mot de passe" id="password">
      </div>



      <button type="submit" name="submit" class="btn btn-danger m-xxl-5 ml-auto">VALIDER</button>

    </form>



  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>