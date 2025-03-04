<?php

class Vehicule
{
  private static $marque = 'BMW'; // appartient à la classe
  private $couleur = 'noir'; // appartient à l'objet

  public static function setMarque($marque) // reglage
  {
    self::$marque = $marque;
  }

  public static function getMarque()
  {
    return self::$marque;
  }

  public function setCouleur($couleur)
  {
    $this->couleur = $couleur;
  }

  public function getCouleur()
  {
    return $this->couleur;
  }
}

$vehicule1 = new Vehicule();
//                                     appartient à la classe                         appartient à l'objet
echo "Vehicule1 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule1->getCouleur() . "<br>";

echo '<br>';
echo '<br>';

$vehicule2 = new Vehicule();
echo "Vehicule2 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule2->getCouleur() . "<br>";

echo '<br>';
echo '<br>';

$vehicule3 = new Vehicule();
echo "Vehicule3 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule3->getCouleur() . "<br>";

echo '<br>';
echo '<br>';

$vehicule4 = new Vehicule();
$vehicule4->setMarque('Ferrari');
$vehicule4->setCouleur('rouge');
echo "Vehicule4 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule4->getCouleur() . "<br>";

echo '<br>';
echo '<br>';

$vehicule5 = new Vehicule();
echo "Vehicule5 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule5->getCouleur() . "<br>";

echo '<br>';
echo '<br>';

$vehicule6 = new Vehicule();
echo "Vehicule6 de marque " . Vehicule::getMarque() . " et de couleur "  . $vehicule6->getCouleur() . "<br>";

// getMarque() est une méthode static, donc qui appartient à la classe, on l'appel par la classe et non par l'objet.


/*

Une propriété / méhode static appartient à la classe.
Si on modifie la valeur d'une propriété static, cela modifie la classe elle-même, toutes les autres instances auront les modifications prise en compte.
Une propriété non static appartient à l'objet, si l'on modifie une propriété, on modifie seulement l'objet en cours.
self:: représente la classe à l'intérieur d'elle même.

*/