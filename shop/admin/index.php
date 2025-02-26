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


// Récupérer le produit le plus populaire (le plus vendu)
$mostPopularProductOrder = $connect_db->query("SELECT product_id, SUM(quantity) as total_quantity 
  FROM order_details 
  GROUP BY product_id 
  ORDER BY total_quantity DESC 
  LIMIT 1");
$mostPopularProduct = $mostPopularProductOrder->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($mostPopularProduct);
// echo '</pre>';

// Récupérer les informations du produit le plus populaire (picture et title)
$mostPopularProductInfo = $connect_db->query("SELECT picture, title FROM product WHERE id_product = " . $mostPopularProduct['product_id']);
$mostPopularProductInfo = $mostPopularProductInfo->fetch(PDO::FETCH_ASSOC);

// Récupérer le produit le moins populaire (moins vendu)
$leastPopularProductOrder = $connect_db->query("SELECT product_id, SUM(quantity) as total_quantity 
  FROM order_details 
  GROUP BY product_id 
  ORDER BY total_quantity ASC 
  LIMIT 1");
$leastPopularProduct = $leastPopularProductOrder->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($leastPopularProduct);
// echo '</pre>';

// Récupérer les informations du produit le moins populaire (picture et title)
$leastPopularProductInfo = $connect_db->query("SELECT picture, title FROM product WHERE id_product = " . $leastPopularProduct['product_id']);
$leastPopularProductInfo = $leastPopularProductInfo->fetch(PDO::FETCH_ASSOC);

// Récupérer le nombre total de produits vendus
$totalProductsSoldQuery = $connect_db->query("SELECT SUM(quantity) as total_sold FROM order_details");
$totalProductsSold = $totalProductsSoldQuery->fetch(PDO::FETCH_ASSOC)['total_sold'];
// echo '<pre>';
// print_r($totalProductsSold);
// echo '</pre>';

// Récupérer le nombre total de commandes passées
$totalOrdersQuery = $connect_db->query("SELECT COUNT(*) as total_orders FROM `order`");
$totalOrders = $totalOrdersQuery->fetch(PDO::FETCH_ASSOC)['total_orders'];
// echo '<pre>';
// print_r($totalOrders);
// echo '</pre>';


// if (isset($_GET['action']) && $_GET['action'] == 'update') {
//   if (isset($_POST['stock'], $_POST['id_product'])) {
//     // Préparer la requête avec `prepare()`
//     $data = $connect_db->prepare('UPDATE product SET stock = :stock WHERE id_product = :id_product');

//     // Lier les valeurs
//     $data->bindValue(':stock', (int) $_POST['stock'], PDO::PARAM_INT);
//     $data->bindValue(':id_product', $_POST['id_product'], PDO::PARAM_INT);

//     // Exécuter la requête
//     if ($data->execute()) {
//       header('Location: index.php');
//       exit;
//     }
//   }
// }


// Traitement du formulaire de mise à jour du stock
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['new_stock'])) {
  $product_id = $_POST['product_id'];
  $new_stock = (int) $_POST['new_stock'];

  // Mettre à jour le stock dans la base de données
  $query = $connect_db->prepare("UPDATE product SET stock = :stock WHERE reference = :id");
  $query->bindValue(':stock', $new_stock, PDO::PARAM_INT);
  $query->bindValue(':id', $product_id, PDO::PARAM_STR);
  $query->execute();

  // Récupérer les nouvelles données des produits
  $selectAllProduct = $connect_db->query("SELECT picture, reference, title, category, size, created, stock FROM product");
  $dataProducts = $selectAllProduct->fetchAll(PDO::FETCH_ASSOC);

  // Filtrer les produits dont le stock est inférieur à 20
  $dataProducts = array_filter($dataProducts, function ($product) {
    return $product['stock'] < 15;
  });

  // Changer la date format pour un D M Y et heure
  $dataProducts = array_map(function ($product) {
    $product['created'] = date('d/m/Y H:i:s', strtotime($product['created']));
    return $product;
  }, $dataProducts);
}








// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['new_stock'])) {
//   $updateStock = $connect_db->prepare('UPDATE product SET stock = :stock WHERE reference = :reference');
//   $updateStock->bindValue(':stock', $_POST['new_stock'], PDO::PARAM_INT);
//   $updateStock->bindValue(':reference', $_POST['product_id'], PDO::PARAM_STR);
//   $updateStock->execute();
//   header('Location: index.php');
//   exit;
// }





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
  <div class="card tile is-child" style="width: 100%;  background-color:rgb(219, 219, 219) ;">
    <div class=" card-content">
      <div class="level is-mobile">
        <!-- Affichage du produit le plus vendu -->
        <div class="level-item" style="flex: 1;">
          <div class="is-widget-label" style="text-align: center;">
            <h3 class="subtitle is-spaced" style="text-align: center; margin-bottom: 2cm; text-decoration: underline; color: black;">Best selling product</h3>
            <h2 class="m-5 title">Products sold : <span style="color: green; font-weight: bold;"><?php echo $mostPopularProduct['total_quantity'] ?></span></h2>
            <img src="<?php echo $mostPopularProductInfo['picture'] ?>" alt="" style="max-width: 40%;">
            <h1 class="m-5 title"><?php echo $mostPopularProductInfo['title'] ?></h1>
          </div>
        </div>

        <div class="level-item has-widget-icon" style="flex: 0;">
          <div class="is-widget-icon">
            <span class="icon has-text-success is-large" style="font-size: 64px;"><i class="mdi mdi-arrow-up-bold mdi-192px"></i></span>
          </div>
        </div>

        <!-- Affichage du produit le moins vendu -->
        <div class="level-item" style="flex: 1;">
          <div class="is-widget-label" style="text-align: center;">
            <h3 class="subtitle is-spaced" style="text-align: center; margin-bottom: 2cm; text-decoration: underline; color: black">Least selling product</h3>
            <h2 class="m-5 title">Products sold : <span style="color: red; font-weight: bold;"><?php echo $leastPopularProduct['total_quantity'] ?></span></h2>
            <img src="<?php echo $leastPopularProductInfo['picture'] ?>" alt="" style="max-width: 40%;">
            <h1 class="m-5 title"><?php echo $leastPopularProductInfo['title'] ?></h1>
          </div>
        </div>

        <div class="level-item has-widget-icon" style="flex: 0;">
          <div class="is-widget-icon">
            <span class="icon has-text-danger is-large" style="font-size: 64px;"><i class="mdi mdi-arrow-down-bold mdi-192px"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section is-main-section">
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <div class="card tile is-child" style="background-color:rgb(204, 204, 204);">
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
      <div class="card tile is-child" style=" background-color:rgb(204, 204, 204);">
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
                <span class="icon has-text-info is-large"><i class="mdi mdi-finance mdi-48px"></i></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section is-main-section">
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <div class="card tile is-child" style=" background-color:rgb(204, 204, 204);">
        <div class=" card-content">
          <div class="level is-mobile">
            <div class="level-item">
              <div class="is-widget-label">
                <h3 class="subtitle is-spaced">Number of products sold</h3>
                <h1 class="title"><?php echo $totalProductsSold ?></h1>
              </div>
            </div>
            <div class="level-item has-widget-icon">
              <div class="is-widget-icon">
                <span class="icon has-text-primary is-large"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tile is-parent">
      <div class="card tile is-child" style=" background-color:rgb(204, 204, 204);">
        <div class="card-content">
          <div class="level is-mobile">
            <div class="level-item">
              <div class="is-widget-label">
                <h3 class="subtitle is-spaced">Number of orders placed</h3>
                <h1 class="title"><?php echo $totalOrders ?></h1>
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
                <td data-label="Stock"><strong style="color: red;"><?php echo $product['stock']; ?></strong></td>


                <!-- Mise à jour du current stock via une modale -->

                <td class="is-actions-cell">
                  <div class="buttons is-right">
                    <button
                      type="button"
                      class="button is-small is-primary jb-modal"
                      data-target="sample-modal-<?= $product['reference'] ?>">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- La modale -->
              <div id="sample-modal-<?= $product['reference'] ?>" class="modal">
                <div class="modal-background jb-modal-close"></div>
                <div class="modal-card" style="text-align: center;">
                  <header class="modal-card-head" style="justify-content: center;">
                    <p class="modal-card-title">Mettre à jour le stock</p>
                    <button class="delete jb-modal-close" aria-label="close"></button>
                  </header>
                  <?php if (isset($message)): ?>
                    <div class="notification is-success">
                      <?= htmlspecialchars($message) ?>
                    </div>
                  <?php endif; ?>
                  <section class="modal-card-body">
                    <form action="" method="post">
                      <input type="hidden" name="product_id" value="<?= $product['reference'] ?>">
                      <div class="field">
                        <label class="label">Nouveau stock</label>
                        <div class="control" style="width: 30%; margin: 0 auto;">
                          <input class="input" type="number" name="new_stock" min="0" required>
                        </div>
                      </div>
                      <div class="field is-grouped" style="justify-content: center; margin-top: 2cm;">
                        <div class="control">
                          <button type="submit" class="button is-primary">Mettre à jour</button>
                        </div>
                        <div class="control">
                          <button type="button" class="button jb-modal-close">Annuler</button>
                        </div>
                      </div>
                    </form>

                  </section>
                </div>
                <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
              </div>

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

    </div>
  </div>


  <?php
  require_once('include/footer.php');

  ?>