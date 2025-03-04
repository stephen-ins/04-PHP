<?php

final class Application
{
  public function lancementApplication()
  {
    return "L'application est lancée !";
  }
}


// class Extension extends Application {}  /!\ erreur ! il n'est pas possible d'hériter d'une classe finale

// class Extension extends Application {}

// Une classe finale reste instanciable
$app = new Application();
echo $app->lancementApplication();

class Application2
{
  final public function lancementApplication()
  {
    return "L'application est lancée !<br>";
  }
}

class Extension2 extends Application2
{

  // erreur ! Je ne peux pas surcharger ou redéfinir la méthode car elle est final dans la classe mère (Application2)

  // public function lancementApplication()
  // {
  //   return "L'application est lancée !<br>";
  // }
}

/*

L'intérêt de mettre le mot clé 'final' sur une méthode est de vérouiller afin d'empêcher toute sous classe de la redéfinir, quand nous voulons être sur que le comportement d'une méthode est préservé durant l'héritage.

*/