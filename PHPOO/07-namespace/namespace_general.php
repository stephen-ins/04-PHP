<?php

namespace General;

require_once("namespace_commerce.php");

use Commerce1, Commerce2, Commerce3; // Permet de spécifier qu'elle namespace je souhaite importer du fichier namespace_commerce


$connect_db = new \PDO('mysql:host=localhost;dbname=shop', 'root', '', [
  \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
  \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


echo '<br>';
echo '<br>';

/*

Sans l'anti-slash devant la classe PDO, l'interpreteur cherche d'abord la classe PDO dans l'espace de nom General, l'anti-slash permet de revenir dans l'espace global afin que la classe PDO soit bien existante.

*/


echo '<pre>';
var_dump($connect_db);
echo '<pre>';

echo '<br>';
echo '<br>';

$commande = new Commerce1\Commande;

echo '<pre>';
var_dump($commande);
echo '<pre>';

echo '<br>';
echo '<br>';

echo "Nombre de commande du commerce 1 : " . $commande->nbCommande . "<br>";

echo '<br>';
echo '<br>';

$produit = new Commerce2\Produit;

echo "Nombre de produit du commerce 2 : " . $produit->nbProduit . "<br>";

echo '<br>';
echo '<br>';

$panier = new Commerce3\Panier;

echo "Nombre de produit dans le panier du commerce 3 : " . $panier->nbProduit . "<br>";

echo '<br>';
echo '<br>';

$produit = new Commerce3\Produit;

echo "Nombre de produit commmerce 3 : " . $produit->nbProduit . "<br>";
