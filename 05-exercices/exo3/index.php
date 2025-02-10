<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h1 class=w-70>Affichage des nombres de 1 à 100</h1>
  <ul class="col-5">
    <?php
    for ($i = 1; $i <= 100; $i++) {
      if ($i == 50) {
        echo "<li style='color:red'>$i</li>";
      } else {
        echo "<li>$i</li>";
      }
    }
    ?>
  </ul>

</body>

</html>