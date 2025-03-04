<?php

class A
{
  public function calcul()
  {
    return 10;
  }
}

// -------------------------------

class B extends A
{
  public function calcul()
  {

    // $nb = $this->calcul()
    /*
    surcharge "override". Je n'utilise pas $this->calcul() sinon elle sera recursive et la méthode s'appelera en boucle
    parent:: fonctionne pour appeler une méthode d'une classe parente lors d'une surcharge
    */
    $nb =  parent::calcul(); // On redéfini la méthode

    //   10
    if ($nb <= 100) return "$nb est inférieur ou égal à 100<br>";
    else return "$nb est supérieur à 100<br>";
  }
}

echo '<br>';
echo '<br>';

$objetB = new B();
echo $objetB->calcul();

/*

Une surcharge permet de prendre en compte le comportement de la méthode héritée afin de bénéficier, tout en apportant un traitement complémentaire.
contexte => pour la surcharge, si on ne faisait pas ça avec wordpress, on ne pourrais pa mettre à jour le cms car on modifierais directement les fonctions du coeur.

*/