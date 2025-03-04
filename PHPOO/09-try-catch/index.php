<?php

function search($tab, $elem)
{
  if (!is_array($tab)) {
    throw new Exception('Vous devez envoyer un ARRAY');
  }
  if (sizeof($tab) <= 0) {
    throw new Exception('Vous devez envoyer un ARRAY avec du contenu');
  }
  $position = array_search($elem, $tab);
  return $position;
}

$perso = ['Mario', 'Luigi', 'Toad', 'Bowser', 'Peach'];

try {

  // bloc d'essai
  echo "Luigi se trouve à la position : <strong>" . search($perso, "Luigi") . "</strong><br>";
  echo "Toad se trouve à la position : <strong>" . search($perso, "Toad") . "</strong><br>";
  echo "Peach se trouve à la position : <strong>" . search('dslmfjqdksljqfkd', "Toad") . "</strong><br>";
  echo "Traitements ..."; // Cette ligne ne s'affichera pas car une erreur est levée, les prochains traitements ne seront pas exécutés
} catch (Exception $e) {

  // bloc de capture, on va attraper les exceptions

  // echo '<pre>';
  // print_r($e);
  // echo '<pre>';

  // echo '<pre>';
  // print_r(get_class_methods($e));
  // echo '<pre>';

  echo "<div style='background: lightred; padding: 10px; color: white; width: 400px; margin: 0 auto; border-radius: 5px;'>";
  echo '<p>Fichier : ' . $e->getFile() . '</p>';
  echo '<p>Ligne : ' . $e->getLine() . '</p>';
  echo '<p>Message : ' . $e->getMessage() . '</p>';
  echo '</div>';
}

// -----------------------------------------------------------

echo '<hr>';


try {

  $connect_db = new PDO('mysql:host=localhost;dbname=sqfdsqfdsqfd', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
  ]);
  echo "Connexion réussie";
} catch (PDOException $e) {

  // echo '<pre>';
  // print_r($e);
  // echo '<pre>';

  // echo '<pre>';
  // print_r(get_class_methods($e));
  // echo '<pre>';


  echo "<div style='background: lightred; padding: 10px; color: white; width: 400px; margin: 0 auto; border-radius: 5px;'>";
  echo '<p>Fichier : ' . $e->getFile() . '</p>';
  echo '<p>Ligne : ' . $e->getLine() . '</p>';
  echo '<p>Message : ' . $e->getMessage() . '</p>';
  echo '</div>';
}
