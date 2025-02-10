<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

// if (isset($_POST['submit'])) {
//   echo "Prénom :   $_POST[firstname]  <br>";
//   echo "Nom :   $_POST[lastname]  <br>";
//   echo "Pseudo :   $_POST[pseudo]  <br>";
//   echo "Adresse :   $_POST[adress]  <br>";
//   echo "Ville :   $_POST[city]  <br>";
//   echo "Code postal :   $_POST[postal_code]  <br>";
//   echo "sexe :   $_POST[sex]  <br>";
//   echo "Description :   $_POST[description]  <br>";
// }


// Version boucle foreach
if (isset($_POST['submit'])) {
  foreach ($_POST as $key => $value) {
    if ($key != 'submit') {
      echo ucfirst($key) . " : " . htmlspecialchars($value) . " <br>";
    }
  }
}


if (isset($_POST)) {
  $border = 'border border-danger';

  // afficher message d'erreur si le champ est vide prenom et nom
  if (empty($_POST['firstname'])) {
    $errorInputFirstName = '<small class = "text-danger">Ce champ est obligatoire</small>';
    $error = true;
  }
  if (empty($_POST['lastname'])) {
    $errorInputLastName = '<small class = "text-danger">Ce champ est obligatoire</small>';
    $error = true;
  }

  // Controler l'input du code postal
  if (iconv_strlen($_POST['postal_code']) != 5 || !is_numeric($_POST['postal_code'])) {
    $errorCodePostale = '<small class = "text-danger" >Le code postal doit contenir 5 chiffres. Ex: 75000 </small>';
    $error = true;
  }

  // Controler la saisie entre 3 et 10 caractères maximum (avec message d'erreur) sur le champs pseudo.
  if (iconv_strlen($_POST['pseudo']) < 3 || iconv_strlen($_POST['pseudo']) > 10) {
    $errorInputPseudo = '<small class = "text-danger" >Saisir un pseudo entre 3 et 10 caractères. </small>';
    $error = true;
  }
}


?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Exercice formulaire POST</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <div class="container col-6 mx-auto">


    <h1 class="text-center mt-xxl-5 mb-xxl-5 ">FORMULAIRE</h1>


    <form method="post" action="">
      <!-- Avec le formulaire de redirection -->
      <!-- <form method="post" action="formulaire_action.php"> -->


      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control <?php if (isset($errorInputLastName)) echo $border ?>" id="firstname" name="firstname" aria-describedby="emailHelp">
        <?php if (isset($errorInputFirstName)) echo $errorInputFirstName; ?>
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" class="form-control <?php if (isset($errorInputLastName)) echo $border ?>  " id="lastname" name="lastname" aria-describedby="emailHelp">
        <?php if (isset($errorInputLastName)) echo $errorInputLastName; ?>
      </div>

      <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control <?php if (isset($errorInputPseudo)) echo $border ?>  " id="pseudo" name="pseudo"
          aria-describedby="emailHelp">
        <?php if (isset($errorInputPseudo)) echo $errorInputPseudo; ?>

      </div>

      <div class="mb-3">
        <label for="adress" class="form-label">Adresse</label>
        <input type="text" class="form-control " id="adress" name="adress" aria-describedby="emailHelp">

      </div>

      <div class="mb-3">
        <label for="city" class="form-label">Ville</label>
        <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="postal_code" class="form-label">Code postal</label>
        <input type="password" class="form-control  <?php if (isset($errorCodePostale)) echo $border ?> " id="postal_code" name="postal_code">
        <?php if (isset($errorCodePostale)) echo $errorCodePostale  ?>
      </div>

      <div class="mb-3">
        <label for="sex" class="form-label">Sexe</label>
        <select type="text" class="form-control" id="sex" name="sex">
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
      </div>


      <div class="mb-5">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
      </div>






      <button type="submit" id="submit" name="submit" class="btn btn-primary">Valider</button>





    </form>



  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>