<?php

// --- CONNEXION BDD

$connect_db = new PDO('mysql:host=localhost;dbname=shop', 'root', '', [ // connexion à la BDD
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // affichage des erreurs SQL
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // définition du jeu de caractères des échanges avec la BDD
]);

// echo '<pre>';
// print_r($connect_db);
// echo '</pre>';

// --- SESSSION START DEMARRAGE DE SESSION

session_start();

// --- CHEMIN

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/php/shop/');

// echo '<pre>';
// print_r(RACINE_SITE);
// echo '</pre>';

// Cette constante retourne le chemin physique du dossier shop/ sur le serveur local
// Lors de l'enregistrement d'image/photos, nous aurons besoin du chemin physique complet pour enregistrer la photo dans le bon dossier
// echo RACINE_SITE . 'shop/assets/images/product.jpg';

define('URL', 'http://localhost/php/shop/');
// <img src="http://localhost/php/shop/assets/images/product.jpg" >
// <img src="https://www.famms.fr/assets/images/product.jpg" >
// <img src="URL . assets/images/product.jpg" >
// Cette constante servira à enregistrer l'URL d'une photo dans la BDD, on ne conserve jamais la photo elle-même dans la BDD, mais uniquement son URL

// --- VARIABLES

$content = '';

// --- FAILLES XSS

foreach ($_POST as $key => $value) {
  $_POST[$key] = htmlentities(addslashes(trim($value)));
}
foreach ($_GET as $key => $value) {
  $_GET[$key] = htmlentities(addslashes(trim($value)));
}
// trim(), fonction prédéfinie de PHP, permet de supprimer les espaces en début et fin de chaîne de caractères

// --- INCLUSIONS FUNCTIONS

require_once('functions.php');
