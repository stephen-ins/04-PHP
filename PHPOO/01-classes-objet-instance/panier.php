<?php
class Panier
{
  public $nbProduits; // méthode
  public function addProduct() // méthode
  {
    // Traitement
    return "L'article a bien été ajouté<br>";
  }
  protected function removeProduct()
  {
    return "L'article a bien été retiré<br>";
  }
  private function diplayProduct()
  {
    return "Voici les articles<br>";
  }
}

// class User extends Panier1{
// return removeProduct();
// }


// echo $nbProduits; /!\ erreur !! Variable undefined
$panier1 = new Panier();

echo '<pre>';
var_dump($panier1);
echo '</pre>';

echo '<pre>';
var_dump(get_class_methods($panier1));
echo '</pre>';

$panier1->nbProduits = 5;
echo '<pre>';
var_dump($panier1);
echo '</pre>';

echo "Il y'a " . $panier1->nbProduits . " produits dans le panier<br>";

// echo $panier1->removeProduct(); // /!\ erreur !! Méthode protected

// echo $panier1->displayProduct(); // /!\ erreur !! Méthode private

$panier2 = new Panier();
echo '<pre>';
var_dump($panier2);
echo '</pre>';

$panier2->nbProduits = 3;
echo '<pre>';
var_dump($panier2);
echo '</pre>';

echo "Il y'a " . $panier2->nbProduits . " produits dans le panier<br>";
echo $panier2->addProduct();

/*

Une classe PHP est un modèle qui définit les variables et les méthodes communes à tous les objets de cette classe.
Un plan de construction dans laquelle nous pouvons déclarer des propriétés (variables) et des méthodes (fonctions).
Pour déployer et utiliser les éléments de la classe, nous devons instancier, c'est à dire céer un nouvel exemplaire de la classe grace au mot clé 'new'.
$panier1 est un objet issue de la classe Panier, on se sert de ce qui est déclaré dans la classe à travers l'objet.about_section
- Niveau de visibilité des propriétés et des méthodes
  - public : accessible de partout
  - protected : accessible uniquement dans la classe et les classes héritées
  - private : accessible uniquement dans la classe où cela à été déclaré
Une classe peut produire plusieurs objets.
Nous pouvons donc effctuer plusieurs instanciations 'new'.

*/