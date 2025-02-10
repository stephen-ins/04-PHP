<!-- 
	Exercice :
		1. Effectuer 4 liens HTML pointant sur la même page avec le nom des fruits.
		2. Faire en sorte d'envoyer "cerises" dans l'url si l'on clic sur le lien "cerises".
		3. Tenter d'afficher "cerises" sur la page web si l'on a cliqué dessus (si "cerises" est passé dans l'url par conséquent).
		4. Envoyer l'information à la fonction déclarée "calcul()" afin d'affichez le prix pour 1kg de "cerises" (par exemple).
		5. Ca fonctionne...ok, mais avez-vous tenter de provoquez des bugs ? Avez-vous gérré les erreurs unedifine ?
-->

<?php 
require_once('fonction.inc.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP - 1 | Exercice 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-6 mx-auto">
        <h1 class="text-center mb-3">Exercice 2.1</h1>

		<?php 
        // echo '<pre>';
        // print_r($_GET);
        // echo '</pre>';

        if($_GET){
			echo "Vous avez choisi les $_GET[fruit]<br>";
			echo calcul($_GET['fruit'], 1000) . '<hr>';
        }
        ?>

        <a href="?fruit=cerises" class="btn btn-primary">Cerises</a>
        <a href="?fruit=bananes" class="btn btn-success">Bananes</a>
        <a href="?fruit=pommes" class="btn btn-secondary">Pommes</a>
        <a href="?fruit=peches" class="btn btn-warning">Pêches</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>