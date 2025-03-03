<?php

class User
{
  private $firstName; // "Sarah"
  private $lastName; // "CONNOR"
  //                             "Sarah"
  public function setFirstName($formFirstName)
  {
    //     $user->firstName = "Sarah"
    if (is_string($formFirstName)) {
      $this->firstName = $formFirstName;
    } else {
      // fonction permettant de générer une erreur utilisateur
      trigger_error("Ce n'est pas un string", E_USER_WARNING);
    }
  }

  public function getFirstName()
  {
    // $user->firstName
    return $this->firstName;
  }

  // ---------------------------------------------------------------

  //                            "CONNOR"      
  public function setLastName($formLastName)
  {
    //    $user->lastName = "CONNOR"
    if (is_string($formLastName)) {
      $this->lastName = $formLastName;
      // variable local, accessible uniquement dans la méthode
      // $lastName = $formLastName;
    } else {
      trigger_error("Ce n'est pas un string", E_USER_WARNING);
    }
  }
  public function getLastName()
  {
    return $this->lastName;
  }
}

$user = new User();
echo '<pre>';
var_dump($user);
echo '</pre>';

// $user->firstName = "John"; /!\ erreur !! Variable private

$user->setFirstName(12345);

echo '<br>';
echo '<br>';

$user->setFirstName("Sarah");

echo '<br>';
echo '<br>';

$user->setLastName("CONNOR");

echo "Prénom : " . $user->getFirstName() . "<br>";
echo "Nom : " . $user->getLastName() . "<br>";

echo '<br>';
echo '<br>';

$user2 = new User();
echo "Prénom2 : " . $user2->getFirstName() . "<br>"; // Cette ligne affiche "Prénom : " car la variable $firstName est private --> nouvelle instance de la classe user


$user2->setLastName("RAMBO");
echo "Nom2 : " . $user2->getLastName() . "<br>";

/*

PHP est un langage de programmation assez permissif, il faut donc prévoir autant de setteur que de propriétés afin de contrôler les donnfées entrantes, l'intégralité des données et ne pas se retrouver avec n'importe quelle valeur à l'intérieur. 
Si nous avons 25 propriétés, nous devons avoir 25 setteurs / getteurs.
$this représente l'objet en cours d'utilisation à l'intérieur des classes.
Mettre les propriétés en private permet d'éviter qu'ils ne soient modifiés directement dans le code (il s'agit d'une bonne contrainte).
Ainsi il faut passer jpar un setteur qui peut contenir des contrôles, cela permet un vérification avant d'accepter d'affecter la valeur.
Le getteur permet de retourner la donnée finale (pas d'argument dans la fonction).

*/