<?php


echo '<br>';
echo '<br>';

echo '<pre>';
print_r($_GET);
echo '</pre>';

echo '<br>';
echo '<br>';

// Affichage des données de l'url des pays en passant par la superglobale $_GET
if ($_GET) {
  if (!isset($_GET['pays']) || !isset($_GET['id'])) {
    // On redirige l'internaute vers la page d'accueil du site
    // header() : fonction prédéfinie permettant l'exécution d'une redirection http, on doit lui fournir l'url de destination (pas d'espace entre location et les ':')
    // header('Location: lien.php');
  }

  if (isset($_GET['pays']) &&  !empty($_GET['pays'])) {
    echo "ID du pays : $_GET[id]  <br>";
    echo "Pays : $_GET[pays]  <br>";

    // Affichage message "Vous êtes: français, italien, espagnol, anglais, laotien, thailandais, cambodgien, vietnamien" en fonction du pays choisi.

    if ($_GET['pays'] == 'france') {
      $messagePays = "Vous êtes français";
    } elseif ($_GET['pays'] == 'italie') {
      $messagePays = "Vous êtes italien";
    } elseif ($_GET['pays'] == 'espagne') {
      $messagePays = "Vous êtes espagnol";
    } elseif ($_GET['pays'] == 'angleterre') {
      $messagePays = "Vous êtes anglais";
    } elseif ($_GET['pays'] == 'laos') {
      $messagePays = "Vous êtes laotien";
    } elseif ($_GET['pays'] == 'thailande') {
      $messagePays = "Vous êtes thailandais";
    } elseif ($_GET['pays'] == 'cambodge') {
      $messagePays = "Vous êtes cambodgien";
    } elseif ($_GET['pays'] == 'vietnam') {
      $messagePays = "Vous êtes vietnamien";
    }

    // if (isset($_GET['pays'])) {
    //   $messagePays = '<small class="text-danger"></small>';
    // }
  }
}


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <h1 class="  text-center  mt-xxl-5 mb-5">LES LIENS</h1>


  <div class="container d-flex justify-content-center align-items-center col-4 m-lg-5-auto h-auto m-4xxl">




    <div class="list-group m-5 col-6">
      <a href="lien.php?id=101&pays=france" class="list-group-item list-group-item-action p-3">
        France
      </a>
      <a href="lien.php?id=102&pays=italie" class="list-group-item list-group-item-action p-3">Italie</a>
      <a href="lien.php?id=103&pays=espagne" class="list-group-item list-group-item-action p-3">Espagne</a>
      <a href="lien.php?id=104&pays=angleterre" class="list-group-item list-group-item-action p-3">Angleterre</a>
    </div>

    <div class="list-group m-5 col-6">
      <a href="lien.php?id=105&pays=laos" class="list-group-item list-group-item-action p-3">
        Laos
      </a>
      <a href="lien.php?id=106&pays=thailande" class="list-group-item list-group-item-action p-3">Thailande</a>
      <a href="lien.php?id=107&pays=cambodge" class="list-group-item list-group-item-action p-3">Cambodge</a>
      <a href="lien.php?id=108&pays=vietnam" class="list-group-item list-group-item-action p-3">Vietnam</a>
    </div>



  </div>


  <div class="alert alert-info col-5 align-items-sm-center mx-auto justify-content-center text-align-center m-1 text-bg-success text-center mb-xl-4 text-alert fs-1 fw-bolder" role="alert">
    <?php if ($messagePays): ?>
      <?php echo $messagePays; ?>
  </div>

<?php endif; ?>

</p>




</div>


</body>

</html>