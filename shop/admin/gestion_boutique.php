<?php
require_once('../include/init.php');
$_SESSION['msg'] = false;

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location: ' . URL . 'index.php');
}

// Suppression du produit

// if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
//   $data = $connect_db->prepare('DELETE FROM product WHERE id_product = :id');
//   $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
//   $data->execute();

//   $_SESSION['msgValidation'] = "Le produit a été supprimé avec succès";
//   $_SESSION['msg'] = true;

//   header('location: gestion_boutique.php');
//   exit();
// }


// Suppression du produit
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $productId = $_GET['id'];

  // Commencez une transaction
  $connect_db->beginTransaction();

  try {
    // Supprimer les enregistrements dans order_details liés au produit
    $deleteOrderDetails = $connect_db->prepare('DELETE FROM order_details WHERE product_id = :id');
    $deleteOrderDetails->bindValue(':id', $productId, PDO::PARAM_INT);
    $deleteOrderDetails->execute();

    // Supprimer le produit
    $deleteProduct = $connect_db->prepare('DELETE FROM product WHERE id_product = :id');
    $deleteProduct->bindValue(':id', $productId, PDO::PARAM_INT);
    $deleteProduct->execute();

    // Validez la transaction
    $connect_db->commit();

    $_SESSION['msgValidation'] = "Le produit a été supprimé avec succès";
  } catch (Exception $e) {
    // Annulez la transaction en cas d'erreur
    $connect_db->rollBack();
    $_SESSION['msgValidation'] = "Erreur lors de la suppression du produit : " . $e->getMessage();
  }

  $_SESSION['msg'] = true;
  header('location: gestion_boutique.php');
  exit();
}



if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

  // echo '<pre>';
  // print_r($_FILES);
  // echo '</pre>';

  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';

  // Url de la photo actuelle
  if (isset($_GET['action']) && $_GET["action"] == 'update') {
    $pictureUrlDb = $_POST['current_picture'];
  }


  // $_FILES est une superglobale qui permet de stocker les données d'un fichier uploadé (nom, extension, taille etc...)
  // Si une image à bien été uploadée
  if (!empty($_FILES['picture']['name'])) {

    // Contrôle de l'extension
    $currentExtension = [1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'webp'];
    $fileUploaded = new SplFileInfo($_FILES['picture']['name']);
    // SplFileInfo est une classe prédéfinie en PHP qui permet de traiter les données d'un fichier uploadé, elle contient ses propres métodes (fonctions)


    // echo '<pre>';
    // print_r($fileUploaded);
    // echo '</pre>';

    // echo '<pre>';
    // print_r(get_class_methods($fileUploaded));
    // echo '</pre>';

    // getExtension() est une méthode de la classe SplFileInfo qui retoune l'extension du fichier uploadé
    $fileUploadedExtension = $fileUploaded->getExtension();
    // echo "Format du fichier chargé :" . $fileUploadedExtension . '<br>';

    // array_search() permet de rechercher une valeur dans un tableau et retourne la position d'un élément (indice) si elle est trouvée
    // Exemple:     position            png              [jpg, jpeg, png, webp]
    $positionExtension = array_search($fileUploadedExtension, $currentExtension);
    // echo "Position de l'extension :" . $positionExtension . '<br>';

    // Si array_search() retourne FALSE, cela signifie que l'extension du fichier uploadé n'est pas dans le tableau Array $currentExtension alors on entre dans le IF
    if ($positionExtension === false) {
      $errorPicture = "<small class= 'has-text-danger'>Extention non valide. Veuillez utiliser .jpg, .jpeg, .png, .webp]</small>";
    } else {

      // On concatène la référence du produit avec le nom de l'image 
      $pictureName = $_POST['reference'] . '-' . $_FILES['picture']['name'];
      // echo $pictureName . '<br>';

      // On définit le chemin de l'image qui sera stockée en BDD
      $pictureUrlDb = URL . "assets/images-produits/$pictureName";
      // echo $pictureUrlDb . '<br>';

      // On définit le chemin physique de l'image qui sera stockée sur le serveur où sera copié l'image
      // /opt/lampp/htdocs/php/shop/assets/images-produits/2545CBT-p7.png
      $pictureFolder = RACINE_SITE . "assets/images-produits/$pictureName";
      // echo $pictureFolder;

      // La fonction prédéfinie copy() permet de copier un fichier depuis un emplacement vers un autre
      // 2 arguments : copy(chemin_source, chemin_destination)
      //               () image accéssible dans $_FILES , dossier de destination sur le serveur)
      copy($_FILES['picture']['tmp_name'], $pictureFolder);
    }
  }


  // Requet SQL d'insertion / modification pour insérer / modifier un produit en BDD
  if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $data = $connect_db->prepare('UPDATE product SET reference = :reference, category = :category, title = :title, color = :color, size = :size, description = :description, price = :price, stock = :stock, picture = :picture, public = :public WHERE id_product = :id');
    $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);







    $_SESSION['msgValidation'] = "Les modifications du produit ont été effectuées avec succès";
  } else {
    $data = $connect_db->prepare('INSERT INTO product (reference, category, title, color, size, description, price, stock, picture, public) VALUES (:reference, :category, :title, :color, :size, :description, :price, :stock, :picture, :public)');

    $_SESSION['msgValidation'] = "L'enregistrement du produit a été effectué avec succès";
  }
  $_SESSION['msg'] = true;

  // Requête SQL d'insertion pour insérer un produit en BDD
  $data->bindValue(':reference', $_POST['reference'], PDO::PARAM_STR);
  $data->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
  $data->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
  $data->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
  $data->bindValue(':size', $_POST['size'], PDO::PARAM_STR);
  $data->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
  $data->bindValue(':price', $_POST['price']);
  $data->bindValue(':stock', $_POST['stock'], PDO::PARAM_INT);
  $data->bindValue(':picture', $pictureUrlDb, PDO::PARAM_STR);
  $data->bindValue(':public', $_POST['public'], PDO::PARAM_STR);
  $data->execute();

  header('location: gestion_boutique.php');
}

$data = $connect_db->query('SELECT * FROM product');
$products = $data->fetchAll(PDO::FETCH_ASSOC);

// Affichage du nombre de produit :
// echo '<pre>';
// print_r($products);
// echo '</pre>';

$nbProducts = $data->rowCount();
if ($nbProducts <= 1)
  $txt = "$nbProducts article";
else
  $txt = "$nbProducts articles";

if (isset($_GET['action']) && $_GET['action'] == 'update') {
  $data = $connect_db->prepare('SELECT * FROM product WHERE id_product = :id');
  $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $data->execute();
  $currentProduct = $data->fetch(PDO::FETCH_ASSOC);

  // echo '<pre>';
  // print_r($currentProduct);
  // echo '</pre>';
}





require_once('include/header.php');
?>



<!-- jQuery (OBLIGATOIRE pour DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Boutique</li>
        </ul>
      </div>
    </div>
    <!-- <div class="level-right">
            <div class="level-item">
              <div class="buttons is-right">
                <a
                  href="https://github.com/vikdiesel/admin-one-bulma-dashboard"
                  target="_blank"
                  class="button is-primary"
                >
                  <span class="icon"
                    ><i class="mdi mdi-github-circle"></i
                  ></span>
                  <span>GitHub</span>
                </a>
              </div>
            </div>
          </div> -->
  </div>
</section>
<section class="section is-main-section">

  <?php if (isset($_SESSION['msgValidation'])): ?>
    <div class="notification is-primary">
      <button class="delete"></button>
      <?= $_SESSION['msgValidation']; ?>
    </div>
  <?php endif; ?>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><span class="mdi mdi-shopping-outline"></span>
        </span>
        <!-- affichage du nombres de produits avec condition produit avec ou sans (s) -->
        <span>Liste des <span style="color: red;"><?= $txt; ?></span> actuellement dans la base de donnée</span>
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <table id="table-clients0"
            class="table is-fullwidth is-striped is-hoverable is-fullwidth">
            <thead>
              <tr>

                <th class="is-checkbox-cell">
                  <!-- <label class="b-checkbox checkbox">
                    <input type="checkbox" value="false" />
                    <span class="check"></span>
                  </label> -->
                </th>


                <!--                  10 -->
                <?php for ($i = 0; $i < $data->columnCount(); $i++):
                  $dataColumn = $data->getColumnMeta($i);
                  if ($dataColumn['name'] != 'id_product'):

                    // echo '<pre>';
                    // print_r($dataColumn);
                    // echo '</pre>';

                ?>
                    <th><?= ucfirst($dataColumn['name']) ?></th>

                <?php endif;
                endfor;
                ?>

                <th>Actions</th>

              </tr>
            </thead>
            <tbody>



              <?php foreach ($products as $arrayProduct): ?>

                <tr>
                  <td class="is-checkbox-cell">
                    <label class="b-checkbox checkbox">
                      <input type="checkbox" value="false" />
                      <span class="check"></span>
                    </label>
                  </td>


                  <?php foreach ($arrayProduct as $key => $value):
                    if ($key != 'id_product'):
                  ?>
                      <td data-label="<?= ucfirst($key) ?>">
                        <?php if ($key == 'picture'): ?>
                          <img src="<?= $value ?>" class="picture__product" alt="<?= $arrayProduct['title'] ?>">
                        <?php elseif ($key == 'price'): ?>
                          <?= $value . ' €' ?>
                        <?php else: ?>
                          <?= $value ?>
                        <?php endif; ?>

                      </td>

                  <?php endif;
                  endforeach; ?>


                  <td class="is-actions-cell">
                    <div class="buttons is-right">
                      <a
                        href="?action=update&id=<?= $arrayProduct['id_product'] ?>"
                        class="button is-small is-primary">

                        <span class="icon"><span class="mdi mdi-pencil"></span></span>

                      </a>

                      <button
                        type="button"
                        class="button is-small is-danger jb-modal"
                        data-target="sample-modal-<?= $arrayProduct['id_product'] ?>">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                      </button>

                    </div>
                  </td>
                </tr>

                <div id="sample-modal-<?= $arrayProduct['id_product'] ?>" class="modal">
                  <div class="modal-background jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Confirmer la suppression</p>
                      <button class="delete jb-modal-close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                      <p>Voulez-vous réellement supprimer ce produit ?</p>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button jb-modal-close">Annuler</button>
                      <a href="?action=delete&id=<?= $arrayProduct['id_product'] ?>"
                        class="button is-danger jb-modal-close">Supprimer</a>
                    </footer>
                  </div>
                  <button
                    class="modal-close is-large jb-modal-close"
                    aria-label="close"></button>
                </div>

              <?php endforeach; ?>

            </tbody>
          </table>

          <script>
            $(document).ready(function() {
              $("#table-clients0").DataTable({
                language: {
                  url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                },
                aoColumnDefs: [{
                  bSortable: false,
                  aTargets: [0, 4, 8, 12],
                }, ],
              });
            });
          </script>

        </div>
        <!-- <div class="notification">
                <div class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <div class="buttons has-addons">
                        <button type="button" class="button is-active">
                          1
                        </button>
                        <button type="button" class="button">2</button>
                        <button type="button" class="button">3</button>
                      </div>
                    </div>
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <small>Page 1 of 3</small>
                    </div>
                  </div>
                </div>
              </div> -->
      </div>
    </div>
  </div>
</section>

<section class="section is-main-section">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><span class="mdi mdi-shopping-outline"></span></span>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
          Modification
        <?php else: ?>
          Ajout
        <?php endif; ?>
        produit
      </p>
    </header>
    <div class="card-content">

      <!-- enctype : mutlipart/formdata : permet de récupérer en php les données d'un fichier uploadé -->
      <form method="post" enctype="multipart/form-data">
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Référence | Catégorie</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="reference" placeholder="Entrer la référence du produit" value="<?php if (isset($currentProduct['reference'])) echo $currentProduct['reference']; ?>" />

            </div>
            <div class="field">
              <input class="input" type="text" name="category" placeholder="Entrer une catégorie de produit" value="<?php if (isset($currentProduct['category'])) echo $currentProduct['category']; ?>" />
            </div>
          </div>
        </div>


        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Titre | Couleur</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="title" placeholder="Entrer le nom du produit" value="<?php if (isset($currentProduct['title'])) echo $currentProduct['title']; ?>" />

            </div>
            <div class="field">
              <input class="input" type="text" name="color" placeholder="Entrer la couleur du produit" value="<?php if (isset($currentProduct['color'])) echo $currentProduct['color']; ?>" />
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Taille | Genre</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">

                  <select name="size">
                    <option value="XS">XS</option>
                    <option value="S" <?php if (isset($currentProduct['size'])  && $currentProduct['size'] == 'S') echo 'selected' ?>>S</option>
                    <option value="M" <?php if (isset($currentProduct['size'])  && $currentProduct['size'] == 'M') echo 'selected' ?>>M</option>
                    <option value="L" <?php if (isset($currentProduct['size'])  && $currentProduct['size'] == 'L') echo 'selected' ?>>L</option>
                    <option value="XL" <?php if (isset($currentProduct['size'])  && $currentProduct['size'] == 'XL') echo 'selected' ?>>XL</option>
                    <option value="XXL" <?php if (isset($currentProduct['size'])  && $currentProduct['size'] == 'XXL') echo 'selected' ?>>XXL</option>
                  </select>

                </div>
              </div>
            </div>

            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">

                  <select name="public">
                    <option value="homme">Homme</option>
                    <option value="femme" <?php if (isset($currentProduct['public'])  && $currentProduct['public'] == 'femme') echo 'selected' ?>>Femme</option>
                    <option value="mixte" <?php if (isset($currentProduct['public'])  && $currentProduct['public'] == 'mixte') echo 'selected' ?>>Mixte</option>
                  </select>

                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Photo produit</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="file has-name">
                <label class="file-label">
                  <input class="file-input" type="file" name="picture" />
                  <span class="file-cta">
                    <!-- <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span> -->
                    <span class="file-label"> Choisir un fichier </span>
                  </span>
                  <span class="file-name"> Parcourir </span>
                </label>
              </div>
              <?php if (isset($errorPicture)) echo $errorPicture; ?>
            </div>
          </div>
        </div>
        <input type="hidden" name="current_picture" value="<?php if (isset($currentProduct['picture'])) echo $currentProduct['picture']; ?>">
        <?php
        if (isset($currentProduct['picture']) && !empty($currentProduct['picture'])):
        ?>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Photo actuelle</label>
            </div>
            <div class="field-body">
              <div class="field">
                <img src="<?= $currentProduct['picture'] ?>" class="picture__product" alt="<?php if (isset($currentProduct['title'])) echo $currentProduct['title']; ?>">
              </div>
            </div>
          </div>

        <?php endif; ?>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Description</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <textarea
                  class="textarea"
                  name="description"
                  placeholder="Entrer une description du produit"><?php if (isset($currentProduct['description'])) echo $currentProduct['description']; ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Prix | Stock</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="price" placeholder="Entrer un prix produit" value="<?php if (isset($currentProduct['price'])) echo $currentProduct['price']; ?>" />
            </div>
            <div class="field">
              <input class="input" type="text" name="stock" placeholder="Entrer un stock produit" value="<?php if (isset($currentProduct['stock'])) echo $currentProduct['stock']; ?>" />
            </div>
          </div>
        </div>



        <!-- LE SWITCH POUR ACTIVER/DESACTIVER LE PRODUIT  -->
        <!-- <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Switch</label>
          </div>
          <div class="field-body">
            <div class="field">
              <label class="switch is-rounded"><input type="checkbox" value="false" />
                <span class="check"></span>
                <span class="control-label">Default</span>
              </label>
            </div>
          </div>
        </div> -->


        <hr />
        <div class="field is-horizontal">
          <div class="field-label">
            <!-- Left empty for spacing -->
          </div>
          <div class="field-body">
            <div class="field">
              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" name="submit" class="button is-primary">
                    <span>Enregistrer</span>
                  </button>
                </div>
                <!-- <div class="control">
                  <button
                    type="button"
                    class="button is-primary is-outlined">
                    <span>Reset</span>
                  </button>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php

require_once('include/footer.php');
if ($_SESSION['msg'] == false) {
  unset($_SESSION['msgValidation']);
}
?>