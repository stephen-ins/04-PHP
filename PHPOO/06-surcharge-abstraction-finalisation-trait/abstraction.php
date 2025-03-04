<?php

// $joueur = new Joueur; /!\ : Une classe abstraite ne peut pas être instanciée.
abstract class Joueur
{
  public function logIn()
  {
    return $this->etreMajeur();
  }

  // Les méthodes abstraite n'ont pas de corps / de contenu
  // Pour déclarer les méthodes abstraites, il faut que la classe soit abstraite
  abstract public function etreMajeur();
  abstract public function devise();
}

class JoueurFr extends Joueur
{
  public function etreMajeur()
  {
    return 18;
  }
  public function devise()
  {
    return '€';
  }
}

class JoueurUs extends Joueur
{
  public function etreMajeur()
  {
    return 21;
  }
  public function devise()
  {
    return '$';
  }
}



echo '<br>';
echo '<br>';

$joueurFr = new JoueurFr();
echo "Joueur français d'au moins " . $joueurFr->etreMajeur() . " ans et la devise est en " . $joueurFr->devise() . '<br>';

echo '<br>';
echo '<br>';

$joueurUs = new JoueurUs();
echo "Joueur américain d'au moins " . $joueurUs->etreMajeur() . " ans et la devise est en " . $joueurUs->devise() . '<br>';

/*

Lorsque l'on hérite de méthodes abstraites, nous sommes obligé de les redéfinir, c'est imposer une bonne contrainte si les méthodes sont essentielles dans la classe.
Une classe abstraite n'est pas instanciable.
Une classe abstraite n'est pas composé uniquement de méthodes abstraites

*/