<!-- 

1- Créer un fomulaire HTML avec les champs correspondant aux colonnes de la table 'employes' (prenom, nom, sexe, service, date_embauche, salaire)
2- Contrôler en PHP que l'on réceptionne bien toute les données saisie dans le formulaire (print_r)
3- Créer le script permettant d'insérer un employé dans la BDD à la validation du formulaire.

-->


<?php


$connect_bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

if ($_POST) {
  // On injecte directement dans la requete les données saisies dans le formulaire en passant par la supergloblae $_POST
  $result = $connect_bdd->exec("INSERT INTO employes VALUES (NULL, '$_POST[prenom]', '$_POST[nom]',   '$_POST[sexe]',   '$_POST[service]'  ,'$_POST[embauche]' , '$_POST[salaire]')");

  echo "Nombre d'enregistrement <span class = 'badge badge-success'>$result</span>";
}


echo '<br>';
echo '<br>';
echo '<br>';









?>





<!--  -->



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1 class="mx-auto text-center m-xxl-5">FORMULAIRE EMPLOYES</h1>

  <div class="container col-6 mx-auto ">
    <form method="post" action="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="emailHelp">
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sexe</label>
        <input type="text" class="form-control" id="sexe" name="sexe">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Service</label>
        <input type="text" class="form-control" id="service" name="service">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Date d'embauche</label>
        <input type="date" class="form-control" id="embauche" name="embauche">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Salaire</label>
        <input type="text" class="form-control" id="salaire" name="salaire">
      </div>





      <button type="submit" name="submit" id="submit" class="btn btn-primary">Valider</button>
    </form>



  </div>














  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>