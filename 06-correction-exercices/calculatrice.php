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

        $result = 0;
        if($_POST){
            switch($_POST['operator']){
                case 'addition':
                    $result = $_POST['number1'] + $_POST['number2'];
                break;
                case 'soustraction':
                    $result = $_POST['number1'] - $_POST['number2'];
                break;
                case 'multiplication':
                    $result = $_POST['number1'] * $_POST['number2'];
                break;
                case 'division':
                    if($_POST['number2'] != 0)
                        $result = $_POST['number1'] / $_POST['number2'];
                    else 
                        $result = "Il n'est pas possible de diviser par 0";
                break;
            }
        }

        echo $result;
        ?>


        <form method="post" action="">
            <div class="mb-3">
                <input type="text" name="number1" class="form-control" placeholder="Saisir un nombre" id="number1">
            </div>
            <select class="form-select mb-3" name="operator">
                <option value="addition">+</option>
                <option value="soustraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
            </select>
            <div class="mb-3">
                <input type="text" name="number2" class="form-control" placeholder="Saisir un nombre" id="number2">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Calculer</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>