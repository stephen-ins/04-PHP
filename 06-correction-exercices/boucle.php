<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .red{
            color:red;
        }
    </style>
</head>
<body>
    <?php 
    for($i = 1; $i <= 100; $i++){
        echo "$i--";
    }

    echo '<hr>';

    for($i = 1; $i <= 100; $i++){
        if($i == 50)
            echo "<span class='red'>$i</span>--";
        else 
            echo "$i--";
    }

    echo '<hr>';

    //            1998
    for($i = 2000; $i >= 1930; $i--){
        echo "$i--"; // 1998
    }

    echo '<hr>';

    for($i = 1; $i <= 100; $i++){
        echo "<h1>Titre à afficher $i fois</h1>";
    }

    echo '<hr>';

    for($i = 1; $i <= 10; $i++){
        echo "<h1>Je m'affiche pour la $i fois</h1>";
    }

    ?>
</body>
</html>

