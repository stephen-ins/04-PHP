<?php
/* Exercice : 
	1. Réaliser un formulaire permettant de selectioner un fruit et saisir un poids
	2. Traitement permettant d'afficher le prix en passant par la fonction déclarée "calcul()".
	3. Faire en sorte de garder le dernier fruit selectioné et le dernier poids saisie dans le formulaire lorsque celui-ci est validé.
*/
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
        <h1 class="text-center mb-3">Calculatrice</h1>

        <?php 
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

		if($_POST){
			echo calcul($_POST['fruit'], $_POST['poids']);
		}
        ?>

        <form method="post" action="">
            <select class="form-select mb-3" name="fruit">
                <option value="cerises">Cerises</option>

				<!-- Si l'indice $_POST['fruit'] est définit et que sa valeur est égale à 'banannes', alors on affiche l'attribut "selected" dans la balise <option> -->
                <option value="bananes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected' ?>>Bananes</option>

                <option value="pommes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected' ?>>Pommes</option>

                <option value="peches" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected' ?>>Pêches</option>
            </select>
            <div class="mb-3">
                <input type="text" name="poids" class="form-control" placeholder="Saisir un poids" id="poids" value="<?php if(isset($_POST['poids'])) echo $_POST['poids']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Calculer</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
