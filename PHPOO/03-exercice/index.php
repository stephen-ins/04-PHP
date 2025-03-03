<?php

/********************
UML:
---------------------
|    Vehicule		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
---------------------

---------------------
|    Pompe   		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
|donnerEssence()	|
---------------------

 ***********************/


// class Vehicule ----------------------------

class Vehicule
{
  private $litresEssence;

  public function setLitresEssence($litres)
  {
    $this->litresEssence = $litres;
  }
  public function getLitresEssence()
  {
    return $this->litresEssence;
  }
}

// class Pompe ----------------------------

class Pompe
{
  private $litresEssence;

  public function setLitresEssence($litres)
  {
    $this->litresEssence = $litres;
  }
  public function getLitresEssence()
  {
    return $this->litresEssence;
  }
  // On exige en argument en objet issu de la classe Vehicule, on type la variable
  public function donnerEssence(Vehicule $v)
  {
    echo '<br>';
    var_dump($v);
    echo '<br>';

    //                                  800           -  (50 - 5) = 755  
    $this->setLitresEssence($this->getLitresEssence() - (50 - $v->getLitresEssence()));

    //                              5                 + 50 - 5 = 50
    $v->setLitresEssence($v->getLitresEssence() + (50 - $v->getLitresEssence()));
  }
}


echo '<br>';

// 1. Création d'un véhicule 1
$vehicule1 = new Vehicule();

// 2. Attribuer un nombre de litres d'essence au vehicule 1 : 5
$vehicule1->setLitresEssence(5);

// 3. Afficher le nombre de litres d'essence du vehicule 1
echo "Le vehicule numéro 1 contient : " . $vehicule1->getLitresEssence() . " litres d'essences dans son réservoir<br>";

echo '<br>';

// 4. Création d'une pompe
$pompe = new Pompe();

// 5. Attribuer un nombre de litres d'essence à la pompe : 800
$pompe->setLitresEssence(800);

echo '<br>';
echo '<br>';

// 6. Afficher le nombre de litres d'essence de la pompe
echo "La pompe à essence contient : " . $pompe->getLitresEssence() . " litres d'essences dans sa cuve<br>";

// 7. la pompe donne de l'essence en faisant le plein (50L) à la voiture1
$pompe->donnerEssence($vehicule1); // On transmet un argument l'objet issu de la classe Vehicule

echo '<br>';
echo '<br>';

// 8. Afficher le nombre de litres d'essence pour la voiture1 après ravitaillement
echo "Après ravitaillement, le vehicule numéro 1 contient : " . $vehicule1->getLitresEssence() . " litres d'essences dans son réservoir<br>";

echo '<br>';
echo '<br>';

// 9. Afficher nombre de litres d'essence restant pour la pompe
echo "Après ravitaillement, la pompe à essence contient : " . $pompe->getLitresEssence() . " litres d'essences dans sa cuve<br>";

echo '<br>';
echo '<br>';

// 10. Faire en sorte que le véhicule ne puisse pas contenir plus de 50L d'essence (limite reservoir).
