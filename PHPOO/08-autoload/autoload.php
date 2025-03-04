<?php

//                                  A
function inclusionAutomatique($nomDeLaClasse)
{
  //                  A
  require_once($nomDeLaClasse . ".class.php");
  echo "on passe dans inclusionAutomatique<br>";
  echo "require_once($nomDeLaClasse.class.php);<br>";
}

spl_autoload_register('inclusionAutomatique');


/*

spl_autoload_register : fonction prédéfinie permettant d'exécuter une fonction lorsque l'interpréteur voit passer le mot clé 'new' dans le code.
Le nom de la classe à droite du 'new' est récupéré et transmit automatiquement à la fonction inclusionAutomatique (un peu à la manière d'une méthode magique)
Il est indispensable de respecter une convention de nommage sur les fichiers pour que l'autoload fonctionne.
Ici le nom de la classe (ex: A) correspond au nom du fichier (A.class.php)

*/