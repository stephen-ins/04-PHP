<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location: ' . URL . 'index.php');
}

// Récupérer les données des produits
// picture, reference, title, category, size, created, stock
$selectAllProduct = $connect_db->query("SELECT picture, reference, title, category, size, created, stock FROM product");
// echo '<pre>';
// print_r($selectAllProduct);
// echo '</pre>';
$dataProducts = $selectAllProduct->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dataProducts);
// echo '</pre>';

// Filtrer les produits dont le stock est inférieur à 20
$dataProducts = array_filter($dataProducts, function ($product) {
  return $product['stock'] < 15;
});
// echo '<pre>';
// print_r($dataProducts);
// echo '</pre>';

// echo count($dataProducts);
// echo '<pre>';
// print_r($dataProducts);
// echo '</pre>'; 

// Selection de tout les clients pour les afficher
$selectAllClient = $connect_db->query("SELECT * FROM user");
// echo '<pre>';
// print_r($selectAllClient);
// echo '</pre>';
$dataCountClients = $selectAllClient->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dataCountClients);
// echo '</pre>';
// comptage des clients de la base
// echo count($dataCountClients);

// le calcul du chiffre d'affaire de la boutique en faisant la somme de toutes les commandes via la colonne rising
$selectAllOrders = $connect_db->query("SELECT SUM(rising) AS total_affaire FROM `order`");
$totalChiffreAffaire = $selectAllOrders->fetch(PDO::FETCH_ASSOC)['total_affaire'];
// echo '<pre>';
// print_r($totalChiffreAffaire);
// echo '</pre>';

// Changer la date format pour un D M Y et heure
$dataProducts = array_map(function ($product) {
  $product['created'] = date('d/m/Y H:i:s', strtotime($product['created']));
  return $product;
}, $dataProducts);

// Récupérer le produit le plus vendu du mois
$selectBestProduct = $connect_db->query("SELECT product_id, SUM(quantity) AS total_quantity FROM `order_details` GROUP BY product_id ORDER BY total_quantity DESC LIMIT 1");
// echo '<pre>';
// print_r($selectBestProduct);
// echo '</pre>';
$bestProduct = $selectBestProduct->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($bestProduct);
// echo '</pre>';

// Récupérer les informations du produit le plus vendu( picture et title)
$bestProductInfo = $connect_db->query("SELECT picture, title FROM product");
$bestProductInfo = $bestProductInfo->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($bestProductInfo);
// echo '</pre>';



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
          <li>Dashboard</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="hero is-hero-bar">
  <div class="hero-body">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <h1 class="title">Statistics</h1>
        </div>
      </div>
      <div class="level-right" style="display: none">
        <div class="level-item"></div>
      </div>
    </div>
  </div>
</section>


<div class="tile is-parent is- is-vertical is-align-items-center">
  <div class="card tile is-child" style="width: 100%;">
    <div class="card-content">

      <div class="level is-mobile">
        <!-- Affichage du produit le plus vendu -->

        <div class="level-item">
          <div class="is-widget-label" style="text-align: center; width: 100%;">
            <h3 class="subtitle is-spaced" style="text-align: left;">Best selling product</h3>
            <img src="<?php echo $bestProductInfo['picture'] ?>" alt="" style="max-width: 70%;">
            <h1 class="m-5 title"><?php echo $bestProductInfo['title'] ?></h1>
          </div>

          <div class="level-item has-widget-icon">
            <div class="is-widget-icon">
              <span class="icon has-text-success is-large" style="font-size: 64px;"><i class="mdi mdi-finance mdi-192px"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section is-main-section">
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <div class="card tile is-child">
        <div class="card-content">
          <div class="level is-mobile">
            <div class="level-item">
              <div class="is-widget-label">
                <h3 class="subtitle is-spaced">Account clients</h3>
                <!-- le nombres de clients actuellement dans la base de données -->
                <h1 class="title"><?php echo count($dataCountClients) ?></h1>
              </div>
            </div>
            <div class="level-item has-widget-icon">
              <div class="is-widget-icon">
                <span class="icon has-text-primary is-large"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tile is-parent">
      <div class="card tile is-child">
        <div class="card-content">
          <div class="level is-mobile">
            <div class="level-item">
              <div class="is-widget-label">
                <h3 class="subtitle is-spaced">Shop revenue</h3>

                <!-- Incrémentation du C.A -->

                <h1 class="title"><?php echo $totalChiffreAffaire ?> €</h1>
              </div>
            </div>
            <div class="level-item has-widget-icon">
              <div class="is-widget-icon">
                <span class="icon has-text-info is-large"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






</section>


<div class="card has-table has-mobile-sort-spaced">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-account-multiple"></i></span>

      <!-- ici le nombre d'article avec un stock insuffisant c'est à dire > 20 (stock) -->
      <span>
        <span style="color: red; font-weight: bold;">
          <?= count($dataProducts) ?>
        </span>
        produit<?= count($dataProducts) > 1 ? 's' : '' ?> dont le stock est en dessous de 15 articles
      </span>

    </p>
    <a href="#" class="card-header-icon">
      <span class="icon"><i class="mdi mdi-reload"></i></span>
    </a>
  </header>


  <div class="card-content">
    <div class="b-table has-pagination">
      <div class="table-wrapper has-mobile-cards">
        <table id="table-clients"
          class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
          <thead>
            <tr>
              <th></th>
              <th>Reference</th>
              <th>Title</th>
              <th>Category</th>
              <th>Size</th>
              <th>Date entered</th>
              <th>Current stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- boucle de produit insuffisant -->
            <?php foreach ($dataProducts as $product) : ?>

              <tr>
                <td class="is-image-cell">
                  <div class="image">
                    <img
                      src="<?php echo $product['picture']; ?>"
                      class="" />
                  </div>
                </td>
                <td data-label="Reference"><?php echo $product['reference']; ?></td>
                <td data-label="Title"><?php echo $product['title']; ?></td>
                <td data-label="Category"><?php echo $product['category']; ?></td>
                <td data-label="Size"><?php echo $product['size']; ?></td>
                <td data-label="Date entered"><?php echo $product['created']; ?></td>
                <td data-label="Stock"><?php echo $product['stock']; ?></td>


                <td class="is-actions-cell">
                  <div class="buttons is-right">
                    <button
                      class="button is-small is-primary"
                      type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                  </div>
                </td>

              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>

        <script>
          $(document).ready(function() {
            $("#table-clients").DataTable({
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
              },
              aoColumnDefs: [{
                bSortable: false,
                aTargets: [0, 7],
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


<?php
require_once('include/footer.php');

?>