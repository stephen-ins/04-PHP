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
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // if($_POST){
        //     foreach($_POST as $key => $value){
        //         echo "$key: $value<br>";
        //     }
        // }
        ?>

        <form method="post" action="validation.php">
            <div class="mb-3">
                <label for="marque" class="form-label">marque</label>
                <input type="text" name="marque" class="form-control" placeholder="Saisir votre marque" id="marque">
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">modele</label>
                <input type="text" name="modele" class="form-control" placeholder="Saisir votre modele" id="modele">
            </div>
            <div class="mb-3">
                <label for="couleur" class="form-label">couleur</label>
                <input type="text" name="couleur" class="form-control" placeholder="Saisir votre couleur" id="couleur">
            </div>
            <div class="mb-3">
                <label for="kill" class="form-label">Kilomètre</label>
                <input type="text" name="kill" class="form-control" placeholder="Saisir votre kilométrage" id="kill">
            </div>
            <div class="mb-3">
                <label for="carburant" class="form-label">carburant</label>
                <input type="text" name="carburant" class="form-control" placeholder="Saisir votre carburant" id="carburant">
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année</label>
                <textarea name="annee" id="annee" class="form-control" rows="7"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>