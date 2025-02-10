<?php

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



echo '<pre>';
print_r($_GET);
echo '</pre>';
// Les données transmises dans l'URL sont automatiquement stockées en PHP dans la supergloblale $_GET, sous forme de tableau Array.


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';


// <!-- Afficher les données du produit en passant par la superglobale $_GET -->


if (!isset($_GET['prix']) || !isset($_GET['article']) || !isset($_GET['couleur']) || !isset($_GET['id'])) {
  // On redirige l'internaute vers la page d'accueil de la boutique
  // header() : fonction prédéfinie permettant l'exécution d'une redirection http, on doit lui fournir l'url de destination (pas d'espace entre location et les ':')
  header('Location: index.php');
}

echo "ID du produit : $_GET[id]  <br>";
echo "Article : $_GET[article]  <br>";
echo "Couleur :   $_GET[couleur]  <br>";
echo "Prix :  $_GET[prix]€ <br>";


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



// Exo : Afficher successivement les données de l'url en passant par $_GET d'une boucle foreach, faite en sorte de ne pas avoir l'id d'affiché.

foreach ($_GET as $key => $value) {

  // si la valeur de $key est différente de 'id', alors on affiche les données de l'URL.

  if ($key != 'id') {
    // ucfirst() pour mettre une majuscule à $key
    echo ucfirst($key) . " : $value <br>";
  }
}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';





?>

<!--  -->