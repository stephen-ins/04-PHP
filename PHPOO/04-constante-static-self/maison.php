<?php

class Maison
{
  private static $nbPiece = 7; // appartient à la classe
  public static $espaceTerrain = '500m²'; // appartient à la classe
  public $couleur = 'blanc'; // appartient à l'objet
  const HAUTEUR = '10m'; // appartient à la classe
  private $nbPorte = 10; // appartient à l'objet

  // appartient à la classe
  public static function getNbPiece()
  {
    return self::$nbPiece;
  }

  // appartient à l'objet
  public function getNbPorte()
  {
    return $this->nbPorte;
  }
}


/*

1- Afficher le nombre de pièces
2- Afficher l'espace terrain
3- Afficher la hauteur
4- Afficher la couleur
5- Affichage du nombre de porte

*/


echo '<br>';
echo '<br>';

$maison = new Maison();

// classe
echo "La maison contient " . Maison::getNbPiece() . " nombres de pièces. <br>";

echo '<br>';
echo '<br>';

// classe
echo "L'espace de terrain est de " . Maison::$espaceTerrain . '<br>';

echo '<br>';
echo '<br>';

// classe
echo "La hauteur de la maison est de " . Maison::HAUTEUR . '<br>';

echo '<br>';
echo '<br>';

// objet
echo "La maison est de couleur " . $maison->couleur . '<br>';

echo '<br>';
echo '<br>';

// objet
echo "La maison possède " . $maison->getNbPorte() . " portes. <br>";
