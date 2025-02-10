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

        <a href="?pays=france" class="btn btn-primary">France</a>
        <a href="?pays=italie" class="btn btn-success">Italie</a>
        <a href="?pays=espagne" class="btn btn-secondary">Espagne</a>
        <a href="?pays=angleterre" class="btn btn-warning">Angleterre</a>

        <?php 
        // echo '<pre>';
        // print_r($_GET);
        // echo '</pre>';

        if($_GET){
            switch($_GET['pays']){
                case 'france':
                    echo "Vous êtes français ?";
                break;
                case 'italie':
                    echo "Vous êtes italien ?";
                break;
                case 'espagne':
                    echo "Vous êtes espagnol ?";
                break;
                case 'angleterre':
                    echo "Vous êtes anglais ?";
                break;
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>