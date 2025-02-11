<?php
$connect_db = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  // echo "Suppression annuaire";
  $data = $connect_db->prepare("DELETE FROM annuaire WHERE id_annuaire = :id");
  $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $data->execute();

  // Redirection pour éviter le renvoi du formulaire
  header('location: CORRECTION-affichage_annuaire.php?delete=valid');
}

// Si l'indice 'action' est définit dans l'URL et qu'il a pour valeur 'validate', cela veut dire que le formulaire a été envoyé et que l'enregistrement en BDD a été effectué
if (isset($_GET['action']) && $_GET['action'] == 'validate') {
  $msgSuccess = '<div class="alert alert-success text-center my-3">Félicitation ! Votre formulaire est enregistré !</div>';
}

// Pour delete id définit dans l'url
if (isset($_GET['delete']) && $_GET['delete'] == 'validate') {
  $msgSuccess = '<div class="alert alert-success text-center my-3">Suppression avec succès !</div>';
}


$data = $connect_db->query("SELECT COUNT (*) AS nbFemmes FROM annuaire WHERE sexe = 'f' ");
$nbFemmes = $data->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($nbFemmes);
// echo '</pre>';

$data = $connect_db->query("SELECT COUNT (*) AS nbHommes FROM annuaire WHERE sexe = 'm' ");
$nbHommes = $data->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($nbHommes);
// echo '</pre>';



// $data : objet issue de la classe PDOStatement
$data = $connect_db->query("SELECT * FROM annuaire");
// echo '<pre>';
// print_r($data);
// echo '</pre>';

$arrayMultiAnnuaire = $data->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($arrayMultiAnnuaire);
// echo '</pre>';






?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CORRECTION | REPERTOIRE | AFFICHAGE_ANNUAIRE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container my-lg-5">
    <h1 class="text-center m-3">Liste annuaire</h1>
    <?php if (isset($msgSuccess)) echo $msgSuccess; ?>

    <?php if (isset($msgSuccess)) echo $msgSuccess; ?>
    <p><span class="badge text-bg-primary"><?= $nbFemmes['nbFemmes'] ?></span> femme(s)</p>
    <p><span class="badge text-bg-success"><?= $nbHommes['nbHommes'] ?></span> homme(s)</p>

    <table class="table table-bordered p-3 ">
      <tr class="table-dark">
        <?php foreach ($arrayMultiAnnuaire[0] as $key => $value) :
          // Récupération des en-têtes de colonnes
          // echo '<pre>';
          // print_r($key);
          // echo '</pre>';
        ?>
          <!-- Affichage des en-têtes -->
          <th><?= $key ?></th>
        <?php endforeach; ?>
        <th>Actions</th>
      </tr>
      <?php foreach ($arrayMultiAnnuaire as $key => $array) :
        // Récupération des en-têtes de colonnes
        // echo '<pre>';
        // print_r($key);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($array);
        // echo '</pre>';
      ?>
        <tr>
          <?php foreach ($array as $value) : ?>
            <td><?= $value ?></td>
          <?php endforeach; ?>
          <td class="d-flex justify-content-between">
            <a href="CORRECTION-index.php?action=update&id=<?= $array['id_annuaire'] ?>" class="btn btn-primary p-2"><i class="fa-solid fa-pen-to-square"></i></a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $array['id_annuaire'] ?>">
              <i class="fa-solid fa-trash">
            </button>
          </td>
        </tr>

        <!-- modale -->
        <div class="modal fade" id="exampleModal-<?= $array['id_annuaire'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">CONFIRMER LA SUPPRESSION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Etes-vous sûr de vouloir supprimer <strong><?= $array['prenom'] ?></strong> <strong><?= $array['nom'] ?></strong> du repertoire ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <a href="?action=delete&id=<?= $array['id_annuaire'] ?>" class="btn btn-danger">Valider</a>
              </div>
            </div>
          </div>
        </div>



      <?php endforeach; ?>





    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>