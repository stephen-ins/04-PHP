<?php

class Perso
{
  protected function deplacement()
  {
    return "je suis rapide";
  }

  public function jump()
  {
    return "je saute très haut";
  }
}

class User1 extends Perso
{
  public function infosUser()
  {
    return "Je suis Mario et " . $this->deplacement() . " et " . $this->jump() . '<br>';
  }
}


class User2 extends Perso
{
  public function infosUser()
  {
    return "Je suis Luigi<br>";
  }

  // redéfinition de la méthode à ce moment là du code
  public function jump()
  {
    return "Je saute moins haut que Mario<br>";
  }
}

echo '<br>';
echo '<br>';

$user1 = new User1();
echo $user1->infosUser();

echo '<br>';
echo '<br>';

$user2 = new User2();
echo $user2->infosUser();

echo '<br>';
echo '<br>';

echo $user2->jump(); // affiche "Je saute moins haut que Mario" et non "Je saute très haut" car la méthode a été redéfinie dans la classe User2, l'interpreteur cherche d'abord dans la classe mère, la classe User2, et seulement si la méthode n'est pas trouvé, il cherche dans les clases héritières

// L'héritage permet de disposer des méthodes et propriétés d'une classe dans une autre. Cela évite la redondance, si nous avons des méthodes récurrantes, plutôt que de les redefinir, on hérite de la clase via le mot clé "extends".
// Il n'ai pas possible d'hériter de plusieurs classe en même temps.
// class User extends Product, Order --> /!\ erreur !!!
