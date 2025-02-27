<?php
// Démarrage de la session
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'annonceo';
$user = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Inclusion des fonctions
require_once 'functions.php';

// Traitement des notifications stockées en session
$notification = null;
if (isset($_SESSION['notification'])) {
  $notification = $_SESSION['notification'];
  unset($_SESSION['notification']);
}

// Constantes de site
define('SITE_TITLE', 'Annonceo');
define('RACINE_SITE', '/php/annonceo/');
