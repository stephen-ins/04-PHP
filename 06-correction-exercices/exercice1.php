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
        <h1 class="text-center mb-3">Exercice 1</h1>

        <?php 
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        if($_POST){
            foreach($_POST as $key => $value){
                echo "$key: $value<br>";
            }
        }
        ?>


        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Saisir votre nom" id="nom">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Saisir votre prénom" id="prenom">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" name="adresse" class="form-control" placeholder="Saisir votre adresse" id="adresse">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" placeholder="Saisir votre ville" id="ville">
            </div>
            <select class="form-select" name="sexe">
                <label for="ville" class="form-label">Sexe</label>
                <option value="masculin">Homme</option>
                <option value="féminin">Femme</option>
            </select>
            <div class="mb-3">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" name="code_postal" class="form-control" placeholder="Saisir votre code postal" id="code_postal">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="7"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>