<?php

class User
{
  public $firstName;
  //                         "Sarah"
  public function __construct($arg)
  {
    // "Classe instanciée, argument envoyé Sarah"
    echo "Classe instanciée, argument envoyé $arg<br>";
    // $this->firstName = "Sarah"
    $this->setFirstName($arg);

    // Connexion à la base de données
    // $this->db = new PDO("mysql:host=localhost;dbname=phpoo", "root", "");
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  public function getFirstName()
  {
    return $this->firstName;
  }
}

$user = new User("Sarah");
echo "Prénom : " . $user->getFirstName() . "<br>";

/*

La méthode magique __construct() s'éxécute automatiquement lors de l'instanciation de la classe, si elle attend un argument, nous devons lui envoyer un argument lors de l'instanciation de la classe.
La classe PDO contient un constructeur qui attend 3 arguments : DSN, username, password.
$pdo = new PDO("mysql:host=localhost")
__construct est l'équivalent du fichier index.php dans le projet shop avec session_start().
connexion BDD etc ...

*/