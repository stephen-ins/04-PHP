<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';


// La superglobale permet de récupérer toutes les données saisie dans un formulaire (ne pas oublier les attributs 'name' et 'method' dans le formulaire), sous forme de tableau Array. Les indices du tableau correspondent aux valeurs des attributs 'name' du formulaire.
// Au premier chargement de la page, $_POST est vide, donc renvoi FALSE, si nous validons le formulaire, les données son envoyées dans $_POST, elle renvoie TRUE.
// On entre dans cette condition que dans le cas où le formulaire a été soumis et que nous avons sur le bouton de validation SUBMIT

if (isset($_POST['submit'])) {
  // On pioche dans la superglobale $_POST pour afficher le prénom et le nom saisi par l'internaute
  echo 'Prénom : ' . $_POST['prenom'] . '<br>';
  // Synthaxe différente, si nous appelons un Array dans les guillemets "", il faut pas mettre des quotes '' dans les crohets (ne fonctionne pas avec un tableau multidimentionnel)
  // $_POST['nom'] retourne le nom saisi dans le champs formulaire
  echo "Nom :   $_POST[nom]  <br>";

  // Si le champ 'nom' est vide, alors on entre dans la condition IF
  if (empty($_POST['nom'])) {
    // Déclaration du message d'erreur.
    $errorLastName = '<small class="text-danger">Merci de saisir votre nom</small>';
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>03 - POST | Formulaire 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <div class="container col-6 mx-auto">

    <h1 class="text-center mb-3">Formulaire 1</h1>

    <!-- $_POST -->
    <!-- methode : comment vont circuler les données, GET ou POST -->
    <!-- attribut name : correspond aux indices du tableau Array $_POST, si on oublie de le déclarer il ne récupére pas la valeur du champs -->
    <form method="post" action="">

      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisir votre prénom" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" placeholder="Saisir votre nom" name="nom" id="nom">

        <?php

        // La variable $errorLastName n'est définit que lorsque nous avons validé le formulaire et que le champs est vide.
        // Si la varible $errorLastName est définit, je rentre dans la condition IF et j'affiche son contenu.
        if (isset($errorLastName))
          echo $errorLastName
        ?>

      </div>

      <button type="submit" name="submit" class="btn btn-primary">VALIDER</button>

    </form>



  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>