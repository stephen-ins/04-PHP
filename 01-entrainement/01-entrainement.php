<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>01 - Entrainement PHP</title>
</head>

<body>
  <!-- Il est possible d'écrire du HTML dans un fichier portant l'extension PHP, l'inverse n'est pas possible -->


  <div class="container">
    <h2 class="title__h2">Ecriture et affichage</h2>

    <?php
    // ouverture de la balise
    // la balise PHP peut être ouverte / fermé autant de fois que souhaité


    // echo est une instruction d'affichage que l'on peut traduire par 'affiche moi'
    echo 'Bonjour';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo 'Bienvenue';
    echo '<br>';
    echo '<br>';
    echo '<br>';


    // fermeture de la balise PHP
    ?>

    <!-- Raccourci pour executer une instruction d'affichage 'echo'-->

    <?= "Allo !!" ?>


    <?php
    // Commentaire sur une ligne
    # Commentaire sur une seule ligne 
    echo '<h2 class="title__h2">Variable : types / déclarations / affectation</h2>';

    // Une variable est un espace nommé permettant de concerver une valeur
    // Toujours le signe $ suivi du nom de la variable que nous définissons
    // Une variable ne peut pas commenter par un chiffre
    // $2a --> erreur | $a2 --> ok

    $a = 127;
    echo gettype($a); // integer
    echo '<br>';
    echo '<br>';
    $b = 1.5;

    echo gettype($b); // double
    echo '<br>';
    echo '<br>';

    $c = "une chaine de caractère";
    echo gettype($c); // string
    echo '<br>';
    echo '<br>';

    $d = "127";
    echo gettype($d); // string
    echo '<br>';
    echo '<br>';

    $e = true; // ou false
    echo gettype($e); // boolean
    echo '<br>';
    echo '<br>';

    // il existe d'autres types de variables : array, object... (prochain chapitre)

    echo '<h2 class="title__h2">Concaténation</h2>';

    $x = 'Bonjour';
    $y = 'tout le monde';
    echo $x . ' ' . $y . "<br>"; // Bonjour tout le monde ! Point de concaténation que l'on peut traduire par 'suivi de'. On peut aussi utiliser la virgule.
    echo "$x $y;  <br>"; // entre quote, les variables ne sont pas évaluées, c'est un string
    echo '$x $y;  <br>'; // entre quote, les variables ne sont pas évaluées, c'est un string

    echo '<h2 class="title__h2">Concaténation lors de l\'affectation</h2>';
    $prenom1 = "Bruno";
    $prenom1 .= " Claire";
    echo $prenom1 . '<br>'; // Affiche "Bruno Claire" cela permet d'ajouter une valeur à une variable déjà existante sans l'écraser

    echo '<h2 class="title__h2">Constante et constante magique</h2>';

    // define('NOM_CONSTANTE', 'valeur de la constante'): fonction prédéfinie permettant de déclarer une constante, par convention elle se déclare toujours en majuscule, sa valeur est constante et ne peut pas être modifiée durant son exécution.
    define('CAPITALE', 'Paris'); // déclaration d'une constante 
    echo CAPITALE . '<br>'; // affiche Paris

    // define('CAPITALE', 'Rome'); // erreur fatale, une constante ne peut pas être modifiée
    echo CAPITALE . '<br>'; // affiche Paris

    echo '<br>';
    echo '<br>';

    // Constantes magiques
    echo __FILE__ . '<br>'; // affiche le chemin complet du fichier

    echo '<br>';
    echo '<br>';

    echo __LINE__ . '<br>'; // affiche le numéro de la ligne

    // Exercice : Afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable, faire en sorte que chaque mot soit de la bonne couleur.
    $vert = '<span class="vert"><B>VERT</B></span>';
    $jaune = '<span class="jaune"><B>JAUNE</B></span>';
    $rouge = '<span class="rouge"><B>ROUGE</B></span>';

    echo '<br>';
    echo '<br>';

    echo $vert . ' - ' . $jaune . ' - ' . $rouge;

    echo '<br>';
    echo '<br>';

    echo "$vert-$jaune-$rouge<br>";


    echo '<br>';
    echo '<br>';

    echo '<h2 class="title__h2">Opérateurs arythmétiques</h2>';

    echo '<br>';
    echo '<br>';

    $a = 10;
    $b = 2;
    $c = 3;

    echo $a + $b . '<br>'; // 12
    echo $a - $b . '<br>'; // 8
    echo $a * $b . '<br>'; // 20
    echo $a / $b . '<br>'; // 5
    echo $a % $b . '<br>'; // 0
    // modulo : reste de la division entière j'ai 10 billes et 3 billes par personnes. Combien de billes me reste-t-il ? 1

    // operation / affectation
    $a += $b; // $a = $a + $b vaut 12
    $a -= $b; // $a = $a - $b vaut 10

    echo '<br>';
    echo '<br>';


    echo '<h2 class="title__h2">Structures conditionnelles (if/else) - opérateurs de comparaisons</h2>';

    echo '<br>';
    echo '<br>';

    // isset() : fonction prédéfinie permettant de vérifier si une variable est définie et empty() : fonction prédéfinie permettant de vérifier si une variable est vide

    // $var1 = 0;
    $var2 = "";

    // empty() : vérifie si une variable est vide, elle renvoie true si la variable est vide, false sinon 
    // Pratique pour controler si le champs d'un formulaire est vide ou non
    // Si il y'a qu'une seule condition dans la structure conditionnelle, il n'est pas nécessaire de mettre les accolades. 
    if (empty($var2)) {
      echo "0, vide ou non définie <br>";
    }

    echo '<br>';
    echo '<br>';

    // isset() : vérifie si une variable est définie, elle renvoie true si la variable est définie, false sinon
    // Pratique pour controler si une variable existe ou non
    if (isset($var2)) {
      echo "var2 existe et est définie par rien<br>";
    }


    echo '<br>';
    echo '<br>';


    /*
              = affectation
              == comparaison de la valeur
              === comparaison de la valeur et du type
              < inférieur
              > supérieur
              <= inférieur ou égal
              >= supérieur ou égal
              ! n'est
              != différent de
              && AND ET
              || OR OU
              XOR OU unique exclusif

    */

    $a = 10;
    $b = 5;
    $c = 2;

    if ($a == 8) {
      echo 'A est égal à 8 <br>';
    } elseif ($b > $c) {
      echo 'B est supérieur à C <br>';
    } else {
      echo 'Tout le monde à faux !!<br>';
    }

    // On entre dans le cas elseif, on sort de la condition, tout les autres cas ne sont pas testés, évalués.

    echo '<br>';
    echo '<br>';

    // Avec XOR il faut que l'une des conditions soit vraies pour rentrer dans le bloc de code accolades.
    if ($a == 10 xor $b == 6) {
      echo 'Ok condition exclusive<br>';
    }

    echo '<br>';
    echo '<br>';

    // Condition ternaire (forme contractée de la condition)
    echo ($a == 10) ? "A est égal à 10 <br>" : "A n'est pas égal à 10 <br>";

    echo '<br>';
    echo '<br>';


    $var1 = isset($vmaVar) ? $vmaVar : "maVar n\'existe pas";
    echo $var1 . '<br>';



    $var2 = $vmaVar ?? "maVAR n\'existe pas";
    // La même chose en plus court avec ?? , soit l'un soit l'autre.
    echo $var2 . '<br>';


    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';



    echo '<h2 class="title__h2">Conditions Switch</h2>';

    // Les case représente les cas possibles, dans lesquels nous pouvons tomber.
    // Le break permet de sortir de la condition
    // Le default est le cas par défaut, si aucun cas n'est vérifié, on tombe dans le default




    $perso = 'Mario';
    switch ($perso) {
      case 'Luigi':
        echo "C'est Luigi le meilleur";
        break;
      case  'Bowser':
        echo "C'est Bowser le meilleur";
        break;
      case 'Toad':
        echo "C'est Toad le meilleur";
        break;
      default:
        echo "Vous êtes fou c'est Mario le meilleur ! <br>";
        break;
    }


    // Exo: Pouvez vous faire la même chose que l'exercice avec les IF/ELSE.


    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';


    $perso = 'Mario';
    if ($perso == 'Luigi') {
      echo "C'est Luigi le meilleur";
    } elseif ($perso == 'Bowser') {
      echo "C'est Bowser le meilleur";
    } elseif ($perso == 'Toad') {
      echo "C'est Toad le meilleur";
    } else {
      echo "Vous êtes fou c'est Mario le meilleur ! <br>";
    }



    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';



    echo '<h2 class="title__h2">Fonctions prédéfinies</h2>';


    // Une fonction prédéfini permet de réaliser un traitement spécifique, voici la documentation : https://www.php.net/manual/fr/indexes.functions.php 

    echo '<br>';
    echo '<br>';

    echo "Date: " . date("d/m/Y") . "<br>";

    // Une fonction se déclare toujours entre parenthèse puisqu'elle peut potentitellement recevoir des arguments, ils ne viennent pas de nulle part, consulter la documentation.


    echo '<br>';
    echo '<br>';


    $email1 = "stephen.ins@afpa.fr";
    echo "@ se trouve à la position : " . strpos($email1, '@') . '<br>';

    // strpos() : string position, permet de trouver la position d'un caractère dans une chaine de caractère, retourne INTERGER si le caractère est trouvé.

    echo '<br>';
    echo '<br>';

    $email2 = "Bonjour";
    echo "@ se trouve à la position : " . strpos($email2, '@') . '<br>';
    // Cette ligne de sort rien pourtant il y'a bien quelque chose à l'intérieur.
    // FALSE


    echo '<br>';
    echo '<br>';

    var_dump(strpos($email2, '@'));
    // On peut visualiser FALSE grace à l'instruction d'affichage amélioré var_dump(), c'est un outil de debug similaire à console.log en JS, il en existe un autre print_r()

    echo '<br>';
    echo '<br>';

    $phrase = "Nous sommes mercredi et il pleut";
    echo "Taille de la chaine de caractère : " . iconv_strlen($phrase);
    ($phrase) . '<br>';

    // iconv_strlen() : fonction prédéfinie permettant de calculer la taille d'une chaine de caractère

    echo '<br>';
    echo '<br>';


    $texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique commodi quaerat, aperiam eos amet voluptatem inventore numquam, possimus cum sunt quis facere soluta modi est, cumque vel consequatur alias nobis? Optio quibusdam in doloremque enim suscipit, eius laborum, ab minus velit unde id quidem quia possimus nemo aut deleniti nostrum fugiat obcaecati, necessitatibus nobis praesentium iste consequatur tenetur voluptatem. Ducimus veniam sunt rem tempora eaque labore totam, similique et accusantium ullam expedita odio, incidunt neque corporis facilis iusto numquam quae eos magnam cum placeat necessitatibus at! Officia voluptatibus voluptas sapiente iure nulla, esse expedita ullam id assumenda ipsa nemo itaque.";

    echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a><br>";
    // substr() : fonction prédéfinie permettant de retourner une partie d'une chaine de caractère, elle prend 3 arguments : la chaine de caractère, la position de départ et la longueur de la chaine de caractère souhaitée.


    echo '<br>';
    echo '<br>';


    echo '<h2 class="title__h2">Fonctions utilisateur</h2>';

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';



    function bonjour($qui = 'Thomas')
    {
      echo "Bonjour $qui <br>";
    }




    bonjour('Stephen');
    // Appel de la fonction bonjour() avec l'argument 'Stephen'

    echo '<br>';
    echo '<br>';
    echo '<br>';

    bonjour();



    // Erreur fatale, il manque un argument à la fonction bonjour()
    // Si la variable de réception $qui contient une valeur par défaut, il n'est pas nécessaire de lui passer un argument lors de l'appel de la fonction.

    echo '<br>';
    echo '<br>';
    echo '<br>';

    $prenom = 'Asmaa';
    bonjour($prenom);


    echo '<br>';
    echo '<br>';
    echo '<br>';

    function appliqueTva($nombre)
    {
      return $nombre * 1.2;
      echo 'Allo !!!'; // cette ligne ne sera jamais exécutée, car on sort de la fonction avec le mot clé RETURN
    }

    echo appliqueTva(200); // Exécute la fonction et affiche le résultat

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Exercice : Pourrions améliorer cette fonction afin que l'on puisse calculer un montant en fonction du taux de notre choix.

    echo '<br>';
    echo '<br>';
    echo '<br>';

    function appliqueMethode2($nombre, $taux = 20)
    {
      return $nombre * (1 + $taux / 100);
    }


    echo appliqueMethode2(500, 19.6) . '<br>';
    echo appliqueMethode2(800) . '<br>';

    echo '<br>';
    echo '<br>';
    echo '<br>';



    function meteo($saison, $temperature)
    {
      echo "Nous sommes en $saison et il fait $temperature degrés <br>";
    }

    meteo('hiver', 6);


    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Exercice : Gérer le 's' à degrés en fonction de la température, attention au terme en hiver et au printemps.






    function meteo2($saison, $temperature)
    {
      $degre = ($temperature == 1 || $temperature < -1 || $temperature == 0) ? 'degré' : 'degrés';
      $article = ($saison == 'hiver' || $saison == 'automne' || $saison == 'été') ? 'en' : 'au';

      echo "Nous sommes $article $saison et il fait $temperature $degre <br>";
    }

    meteo2('automne', 6);
    meteo2('printemps', 1);
    meteo2('été', 25);
    meteo2('hiver', -10);

    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Espace local et global
    function jourSemaine()
    {
      // Espace local
      $jour = 'Mercredi'; // variable local
      return $jour;
    }

    // echo $jour /!\ undefined variable $jour, cette variable n'est accessible qu'à l'intérieur de la fonction jourSemaine()
    echo jourSemaine() . '<br>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // ------------------------------------------------------------------------

    $pays = 'France'; // Variable global
    function affichagePays()
    {
      global $pays; // le mot clé global permet d'importer une variable de l'espace globale (à l'extérieur de la fonction) vers l'espace local (à l'intérieur de la fonction)
      echo $pays;
    }

    affichagePays();

    // 2 espaces en PHP : LOCAL , à l'intérieur d'une fonction et GLOBAL, espace par défaut, à l'extérieur de la fonction.


    echo '<br>';
    echo '<br>';
    echo '<br>';


    echo '<h2 class="title__h2">Structures itératives : boucles</h2>';

    // Les boucles permettent d'automatiser un traitement, une tache, elles sont courantes en PHP.
    // Ex : Si nous avons besoin d'afficher les données de 500 produits de la BDD sur la page WEB, c'est une boucle qui automatisera cette affichage.


    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Boucle WHILE

    $i = 0;
    while ($i < 3) {
      //    0--- etc..............
      echo "$i---";
      $i++; // équivaut à $i = $i + 1
    }

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Exo : Faites en sorte de ne pas avoir les tirets à la fin.

    $j = 0;
    while ($j < 3) {
      echo "$j---";
      $j++;
    }
    if ($j == 3) {
    }
    echo "$j";


    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Boucle FOR
    // Initialisation ; condition d'entrée; incrémentation
    for ($s = 0; $s < 16; $s++) {
      // Instruction pour chaque tout de boucle 
      echo "$s---";
    }


    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Exo : Créer un selecteur contenant 30 options

    echo '<select>';

    for ($z = 1; $z <= 30; $z++) {
      echo "<option>option numéro : $z</option>";
    }

    echo '</select>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    ?>

    <select>

      <?php for ($option = 1; $option <= 30; $option++): ?>
        <option value=""><?= $option ?></option>;
      <?php endfor; ?>

    </select>

    <!-- Autre synthaxe de la boucle for, utiliser en orienté object dans le template de rendu afin de minimiser le code PHP et priviligier le code HTML
        for() : les ';' remplace l'accolade ouvrante
        endfor() : remplace l'aoccolade fermante
        while() : / endwhile
        foreach() : / endforeach; 
        -->

    <?php

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Exo : Faite une boucle qui affiche de 0 à 9 sur la même ligne (soit 10 tours) dans un tableau HTML.

    echo '<table border="50"><tr>';

    for ($i = 0; $i < 10; $i++) {

      echo "<td>$i</td>";
    }
    echo "</tr></table>";


    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Exo : faire la même chose en allant de 0 à 99 sur plusieurs lignes

    $compteur = 0;

    echo '<table border="10">';

    for ($i = 0; $i < 10; $i++) {
      echo "<tr>";
      for ($j = 0; $j < 10; $j++) {
        echo "<td>$compteur</td>";
        $compteur++;
      }
      echo "</tr>";
    }
    echo "</table>";



    echo '<br>';
    echo '<br>';
    echo '<br>';



    echo '<h2 class="title__h2">Tableau de donnés ARRAY</h2>';
    // Un tableau ARRAY est déclaré un peu comme une variable amélioré, car on ne conserve pas qu'une seule valeur mais une ensemble de valeur.
    // Ces tableaux sont souvent utilisés en PHP, par exemple, si nous sélectionnons dans le bas de données de produits, nous les réceptionnons en règle général sous forme de tableau ARRAY.

    $perso = ['Mario', 'Luigi', 'Bowser', 'Peach', 'Toad'];
    echo $perso;
    //  Il n'est pas possible de convertir un tableau ARRAY en chaine de caractère.
    // /!\  --- Warning: Array to string conversion ---

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<pre>';
    print_r($perso);
    echo '</pre>';

    // '<pre>' est une balise HTML permettant de formater le texte et le mettre en forme à la sortie du print_r().

    /*
                Array
                (
                    [0] => Mario
                    [1] => Luigi
                    [2] => Bowser
                    [3] => Peach
                    [4] => Toad
                )
         
  */



    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<pre>';
    var_dump($perso);
    echo '</pre>';

    /*
          array(5) {
            [0]=>
            string(5) "Mario"
            [1]=>
            string(5) "Luigi"
            [2]=>
            string(6) "Bowser"
            [3]=>
            string(5) "Peach"
            [4]=>
            string(4) "Toad"
          }

           */

    echo '<br>';
    echo '<br>';
    echo '<br>';


    // Exo : Tenter d'afficher 'Bowser' sur la page web, en passant par le tableau ARRAY $perso sans faire un 'echo Bowser'

    echo $perso[2];

    echo '<br>';
    echo '<br>';
    echo '<br>';



    echo '<h2 class="title__h2">Tableau de donnés ARRAY - Boucle foreach</h2>';


    echo '<br>';
    echo '<br>';
    echo '<br>';

    $perso = ['Mario', 'Luigi', 'Bowser', 'Peach', 'Toad'];

    foreach ($perso as $value) {

      echo '$value<br>';
    }

    echo '<br>';
    echo '<br>';
    echo '<br>';

    foreach ($perso as $key  => $value) {

      echo "$key : $value<br>";
    }


    /*
La Boucle foreach permet de parcourir les tableaux ARRAY et les objets $key et $value sont des variables de réception que nous définissons, il n'y a pas besoin de les déclarer à l'extérieur de la boucle $key réceptionne un indice du tableau ARRAY par tour de boucle $value réceptionn"e une valeur du tableau ARRAY par tour de boucle. Lorsqu'il n'y a qu'une seule variable de réception, par défaut elle réceptionne les valeurs du tableau ARRAY.
      */


    echo '<br>';
    echo '<br>';
    echo '<br>';



    // count et sizeof sont deux fonctions similaires, pas de différence, elles retournent le nombre d'éléments déclarées dans le tableau ARRAY.
    echo 'Taille du tableau : ' . count($perso) . '<br>';
    echo 'Taille du tableau : ' . sizeof($perso) . '<br>';


    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo implode(" - ", $perso);
    //  implode est une fonction prédéfinie qui rassemble les élément du tableau en une chaine de caractère séparées par des symboles.


    echo '<br>';
    echo '<br>';
    echo '<br>';



    $url = 'assets/image/photographer/Mimi_Keel.jpg';

    $arrayUrl = explode('/', $url);

    echo '<pre>';
    print_r($arrayUrl);
    echo '</pre>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<h2 class="title__h2">Tableau de donnés ARRAY multidimensionnel</h2>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    $arrayMulti = [
      0 => [
        'prenom' => 'Julien',
        'nom' => 'Winter'
      ],
      1 => [
        'prenom' => 'Mac',
        'nom' => 'Douglas'

      ]
    ];

    echo '<pre>';
    print_r($arrayMulti);
    echo '</pre>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Tenter d'afficher 'Mac' en passant par le tableau multidimensionel arrayMulti sans faire un 'echo Mac'.

    echo $arrayMulti[1]['prenom'];

    echo '<br>';
    echo '<br>';
    echo '<br>';

    // Exo : afficher successivement les données du tableau multi à l'aide de boucle foreach (boucle imbriquée, 2 boucles foreach) 

    foreach ($arrayMulti as $samir) {
      foreach ($samir as $key => $sam) {
        echo "$key : $sam<br>";
      }
    }


    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<h2 class="title__h2">Les superglobals</h2>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    //  Les superbloblaes sont des variables prédéfinies dans le langage, de type ARRAY, accéssible n'importe où, permettant de véhiculer certains type de données.
    // Espace globales / locales.

    // $_SERVER =
    // $_GET : véhiculerles données transmises dans l'url (?id=243)
    // $_POST : véhiculer toutes les données saisie dans un formulaire
    // $FILES : récupérer les données d'un fichier uploadé
    // $_COOKIE : préférence du site, derniers articles consultés etc...
    // $_SESSION : véhiculer les données de la session en cours (authentification sur un site)



    echo '<h2 class="title__h2">Classes et objets</h2>';

    /*
Un objet est un autre type de données, Un peu à la manière d'un Array qui permet de regrouper les informations.
Cependant, cela va beaucoup plus loin car on peux y déclarer des variables (appelées propriétés) et des fonctions (appelées méthodes) qui auront un rôle bien précis.
*/

    echo '<br>';
    echo '<br>';
    echo '<br>';

    class Etudiant
    {
      public $prenom = 'Stephen'; // Permet de préciser que l'élément est public(niveau de visibilité), accessible de partout, à l'extérieur de la classe et à l'intérieur de la classe. Il en existe d'autres 'protected' et 'private'.
      public $age = '40';
      public function pays()
      {
        return 'France';
      }
    }

    echo $age; // /!\ erreur ! => Warning: Undefined variable $age in C:\xampp\htdocs\php\01-entrainement.php

    // Le mot clé 'new' permet d'instancier la classe Etudiant et d'en faire un objet, c'est ce qui nous permet de déployer la classe afin de pouvoir l'utiliser, new permet de créer un enfant de la classe, c'est à travers l'objet que l'on peut utiliser ce qui est déclaré dans la classe.

    // Pour piocher dans un objet, on utilise la flèche ->


    echo '<br>';
    echo '<br>';
    echo '<br>';

    $objet = new Etudiant();

    echo '<pre>';
    var_dump($objet);
    echo '</pre>';

    echo '<br>';
    echo '<br>';

    echo "Prénom : " . $objet->prenom . '<br>';
    echo "Age : " . $objet->age . '<br>';
    // Il ne faut pa smettre le '$' à la popriété de l'objet, c'est une erreur.
    echo "Pays : " . $objet->pays() . '<br>';


    echo '<br>';
    echo '<br>';
    echo '<br>';






    ?>



























  </div>
</body>

</html>