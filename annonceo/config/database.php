<?php

/**
 * Configuration de la base de données pour Annonceo
 */

// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'annonceo');
define('DB_USER', 'root');
define('DB_PASS', '');

// Fonction de connexion à la base de données
function connectDB()
{
  try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
  } catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
  }
}
