<?php
/*
1. Créer un formulaire HTML avec les champs suivants : 
    prenom, nom, mot de passe, email, telephone, adresse, code_postal, ville

*/

// 2. Contrôler en PHP que l'on réceptionne toute les données du formulaire (print_r)
echo '<pre>';
print_r($_POST);
echo '</pre>';

if ($_POST) {
  $border = 'border border-danger';

  // 3. Afficher un message d'erreur si le champ 'nom' est laissé vide
  if (empty($_POST['lastName'])) {
    $errorLastName = '<small class="text-danger">Champ requit</small>';
    $error = true;
  }

  // 4. Afficher un message d'erreur si le champ 'prenom' est inférieur à 3 caractères
  if (iconv_strlen($_POST['firstName']) < 3) {
    $errorFirstName = '<small class="text-danger">Format invalid. Minimum 3 caractères</small>';
    $error = true;
  }

  // 5. Contrôler la validiter de l'email (filter_var)
  // Si l'EMAIL n'est pas du bon format, alors on entre dans le IF
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errorEmail = '<small class="text-danger">Format invalide. Ex: exemple@gmail.com</small>';
    $error = true;
  }

  // 6. Afficher un message d'erreur si le code postal n'est pas au bon format (5 caractères, et valeur numérique is_numeric())
  // Si la taille du CP est différente de 5 ou que le code postal n'est pas !!! de type numéric, alors on entre dans le IF.
  if (iconv_strlen($_POST['zipcode'])  != 5 || !is_numeric($_POST['zipcode'])) {
    $errorZipCode = '<small class = "text-danger">Format invalide. Ex: 44100</small>';
    $error = true;
  }

  // 7. Faire le même contrôle avec le numéro de téléphone
  if (iconv_strlen($_POST['phone'])  != 10 || !is_numeric($_POST['phone'])) {
    $errorPhone = '<small class = "text-danger">Format invalide. Ex: 0612345678</small>';
    $error = true;
  }

  // 8. Afficher un message d'erreur si le champ 'mot de passe' est laissé vide
  if (empty($_POST['password'])) {
    $errorPassword = '<small class="text-danger">Champ requit</small>';
    $error = true;
  }

  // Si la variable $error n'est pas défini !! (isset), alors l'internaute a correctement  rempli le formulaire, il entre dans aucun cas de contrôle ci-dessus, alors on entre dans le IF.
  if (!isset($error)) {
    $msgValidation = '<div class="alert alert-success text-center my-3">Félicitation ! Votre formulaire est envoyé !</div>';

    // Requete d'insertion en BDD
    // Redirection de page
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>03 - POST | Fomulaire 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- ####################################################################################### -->

  <div class="col-6 mx-auto">
    <h1 class="text-center mb-3">Formulaire 2</h1>
    <!-- ####################################################################################### -->
    <!-- ####################################################################################### -->
    <!-- ####################################################################################### -->

    <!-- 9. Afficher un message de validation si l'utisateur a correctement rempli les champs du formulaire -->
    <?php if (isset($msgValidation)) echo $msgValidation; ?>

    <!-- ####################################################################################### -->

    <form method="post" action="">
      <!-- ####################################################################################### -->
      <!-- ####################################################################################### -->
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="firstName" class="form-label">Prénom</label>
        <input type="text" name="firstName" class="form-control <?php if (isset($errorFirstName)) echo $border; ?> " placeholder="Saisir votre prénom" id="firstName">
        <?php if (isset($errorFirstName)) echo $errorFirstName; ?>
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="lastName" class="form-label">Nom</label>
        <input type="text" name="lastName" class="form-control <?php if (isset($errorLastName)) echo $border; ?>" placeholder="Saisir votre nom" id="lastName">
        <?php if (isset($errorLastName)) echo $errorLastName; ?>
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control <?php if (isset($errorEmail)) echo $border; ?> " placeholder="Saisir votre email" id="email">
        <?php if (isset($errorEmail)) echo $errorEmail; ?>
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control <?php if (isset($errorPassword)) echo $border; ?> " placeholder="Saisir votre mot de passe" id="password">
        <?php if (isset($errorPassword)) echo $errorPassword; ?>
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="text" name="phone" class="form-control <?php if (isset($errorPhone)) echo $border; ?> " placeholder="Saisir votre téléphone" id="phone">
        <?php if (isset($errorPhone)) echo $errorPhone; ?>
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="address" class="form-label">Adresse</label>
        <input type="text" name="address" class="form-control" placeholder="Saisir votre adresse" id="address">
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="city" class="form-label">Ville</label>
        <input type="text" name="city" class="form-control" placeholder="Saisir votre ville" id="city">
      </div>
      <!-- ####################################################################################### -->
      <div class="mb-3">
        <label for="zipcode" class="form-label">Code postal</label>
        <input type="text" name="zipcode" class="form-control  <?php if (isset($errorZipCode)) echo $border; ?> " placeholder="Saisir votre code postal" id="zipcode">
        <?php if (isset($errorZipCode)) echo $errorZipCode; ?>
      </div>
      <!-- ####################################################################################### -->

      <button type="submit" name="submit" class="btn btn-primary">Valider</button>
      <!-- ####################################################################################### -->
      <!-- ####################################################################################### -->
      <!-- ####################################################################################### -->

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>