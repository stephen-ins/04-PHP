<?php

/* 
 Fichier d'initialisation de l'application Annonceo à insérer dans chaque page du site
 */



// --- CONNEXION À LA BASE DE DONNÉES
// Configuration des paramètres de connexion

$connect_db = new PDO('mysql:host=localhost;dbname=annonceo', 'root', '', [ // connexion à la BDD
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // affichage des erreurs SQL
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // définition du jeu de caractères des échanges avec la BDD
]);

echo '<pre>';
print_r($connect_db);
echo '</pre>';

// --- SESSION START DÉMARRAGE DE LA SESSION
// Permet de conserver des données utilisateur entre les pages

session_start();

// --- CHEMIN
// Cette constante retourne le chemin physique du dossier annonceo/ sur le serveur local

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/php/annonceo/');

echo '<pre>';
print_r(RACINE_SITE);
echo '</pre>';


// Constante retourne le chemin physique du dossier annonceo/ sur le serveur local
define('URL', 'http://localhost/php/annonceo/');












// // Autres constantes utiles
// define('SITE_TITLE', 'Annonceo - Petites annonces gratuites');
// define('UPLOAD_DIR', RACINE_SITE . 'assets/uploads/');
// define('UPLOAD_URL', URL . 'assets/uploads/');

// // --- PROTECTION CONTRE LES FAILLES XSS
// // Nettoie toutes les données reçues via POST et GET pour éviter les injections

// // Traitement des données POST
// foreach ($_POST as $key => $value) {
//   // htmlspecialchars convertit les caractères spéciaux en entités HTML
//   // addslashes ajoute des antislashs devant les caractères qui peuvent poser problème
//   // trim supprime les espaces en début et fin de chaîne
//   $_POST[$key] = htmlspecialchars(addslashes(trim($value)));
// }

// // Traitement des données GET
// foreach ($_GET as $key => $value) {
//   $_GET[$key] = htmlspecialchars(addslashes(trim($value)));
// }

// // --- VARIABLES GLOBALES
// // Variables utilisées dans toutes les pages du site

// // Variable pour stocker les messages à afficher
// $content = '';

// // Système de gestion des notifications
// $notification = null;
// if (isset($_SESSION['notification'])) {
//   $notification = $_SESSION['notification'];
//   unset($_SESSION['notification']); // Supprime la notification après l'avoir récupérée
// }

// // --- INCLUSION DES FONCTIONS
// // Charge le fichier contenant les fonctions utilitaires
// require_once('functions.php');

// /**
//  * Exemple d'utilisation :
//  * 
//  * Pour définir une notification : 
//  * $_SESSION['notification'] = [
//  *     'type' => 'success', // ou 'error', 'warning', 'info'
//  *     'message' => 'Votre action a été effectuée avec succès !'
//  * ];
//  * 
//  * Pour récupérer l'URL d'une image :
//  * $image_url = UPLOAD_URL . $image_nom;
//  */
