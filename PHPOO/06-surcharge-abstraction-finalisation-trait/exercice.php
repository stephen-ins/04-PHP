<?php

// ------------------ classe VEHICULE abstraite

abstract class Vehicule
{

  // Méthode commune pour les 2 marques
  final public function demarrer() // final empêche la surcharge
  {
    return "Je démarre";
  }

  // carburant différent par marque
  abstract public function carburant();

  public function nbTestObligatoire()
  {
    return 100;
  }
}

// ------------------ PEUGEOT

class Peugeot extends Vehicule
{

  // Le carburant de la Peugeot doit être essence
  public function carburant()
  {
    return 'essence';
  }

  public function nbTestObligatoire()
  {
    $nbTest = parent::nbTestObligatoire() + 70;
    return $nbTest;
  }
}

// ------------------ RENAULT

class Renault extends Vehicule
{

  // Le carburant de la Renault doit être diesel
  public function carburant()
  {
    return 'diesel';
  }

  public function nbTestObligatoire()
  {
    $nbTest = parent::nbTestObligatoire() + 30;
    return $nbTest;
  }
}

//     1.	Faire en sorte de ne pas avoir d'objet Vehicule. 

// Test exo 1
// $vehicule = new Vehicule();
// echo '<pre>';
// var_dump($vehicule);
// echo '</pre>';

//     2. Obligation pour la Renault et la Peugeot de posséder la même méthode demarrer() qu'un Véhicule de base .

// Test exo 2
// public function demarrer()
// {
//   return "Je démarre au taquet";
// }

//     3.	Obligation pour la Renault de déclarer un carburant diesel et pour la Peugeot de déclarer un carburant essence (exemple: return 'diesel'; -ou- return 'essence';). 

//     4.	La Renault doit effectuer 30 tests de + qu'un véhicule de base. 

//     5.	La Peugeot doit effectuer 70 tests de + qu'un véhicule de base. 

//     6.	Effectuer les affichages nécessaire.



// Créaton des instances
$peugeot = new Peugeot();
$renault = new Renault();

echo '<br>';
echo '<br>';

// Affichage des informations de la Peugeot
echo "<h3>Peugeot</h3>";
echo "Démarrage : " . $peugeot->demarrer() . "<br>";
echo "Carburant : " . $peugeot->carburant() . "<br>";
echo "Tests obligatoires : " . $peugeot->nbTestObligatoire() . "<br>";

echo '<br>';
echo '<br>';

// Affichage des informations de la Renault
echo "<h3>Renault</h3>";
echo "Démarrage : " . $renault->demarrer() . "<br>";
echo "Carburant : " . $renault->carburant() . "<br>";
echo "Tests obligatoires : " . $renault->nbTestObligatoire() . "<br>";
