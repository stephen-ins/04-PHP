<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location:' . URL . 'index.php');
}




// Associer les commandes aux clients via une requete inner join
$selectAllOrders = $connect_db->query("SELECT * FROM `order` INNER JOIN user ON `order`.user_id = user.id_user WHERE state IN ('treatment', 'sent', 'delivered', 'cancelled')");
$selectAllOrders = $selectAllOrders->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($selectAllOrders);
// echo '</pre>';


// Afficher les clients qui ont passé des commandes via une requete inner join. Il y aura une relation entre les tables order, order_details, user et product :
// Si je supprime un client, je dois supprimer toutes les commandes associées à ce client.
// Si je supprime une commande, je dois supprimer les détails de la commande associée.
// Si je supprime un produit, je dois supprimer les produits qui seront dans les détails de la commande associée.


$selectAllOrdersDetails = $connect_db->query("
    SELECT user.id_user, user.firstName, user.lastName, user.email, order.id_order, order.date, order.rising, order.state, order.user_id, order_details.order_id, product.id_product, order_details.product_id, user.phone
    FROM `order`
    INNER JOIN user ON user.id_user = `order`.user_id
    INNER JOIN order_details ON `order`.id_order = order_details.order_id
    INNER JOIN product ON order_details.product_id = product.id_product
");

$selectAllOrdersDetails = $selectAllOrdersDetails->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($selectAllOrdersDetails);
// echo '</pre>';


// J'ai maintenant les 11 commandes (actuelles) associé au client que j'aimerais afficher dans le tableau par tour de boucle
// Afficher les colonnes dans l'ordre suivant: id_order, id_user, created, rising, state, firstname, lastname, email, phone
// Ce qui done 9 colonnes à afficher : 
// Numéro de clients: Customer number
// Numéro de commande: Order number
// Date de commande: Order date
// Montant: Amount
// État de la commande: Order status
// Prénom: First name
// Nom: Last name
// Email: Email
// Téléphone: Phone





// Afficher le nombre de commande en cours de traitement
$countOrders = $connect_db->query("SELECT COUNT(*) AS total_orders FROM `order` WHERE state IN ('treatment', 'sent', 'delivered', 'cancelled')");
$countOrders = $countOrders->fetch(PDO::FETCH_ASSOC)['total_orders'];
// echo '<pre>';
// print_r($countOrders);
// echo '</pre>';

// Requete de mise à jour BDD au changement d'etat de la commande
if (!empty($_POST)) {
  // mise à jour de l'etat de la commande, on utilise une requete préparée, car on a des données provenant de l'utilisateur
  $updateState = $connect_db->prepare("UPDATE `order` SET state = :state WHERE id_order = :id_order");
  $updateState->bindValue(':state', $_POST['state'], PDO::PARAM_STR);
  $updateState->bindValue(':id_order', $_POST['id_order'], PDO::PARAM_INT);
  $updateState->execute();

  // header('location: gestion_commande.php');
}

// code pour afficher un stock actuel pour chaque produit
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


require_once('include/header.php');

?>

<!-- Bulma is included -->
<link rel="stylesheet" href="../assets/css/main.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com" />
<link
  href="https://fonts.googleapis.com/css?family=Nunito"
  rel="stylesheet"
  type="text/css" />

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
          <li>Commandes</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section is-main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><span class="mdi mdi-cart-outline"></span></span>
        <span>
          <?php echo "<span style='color: red;'>$countOrders</span> commande" . ($countOrders > 1 ? "s" : ""); ?> en cours de traitement
        </span>
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>

    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">

          <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
              <tr>
                <th></th>
                <th>Customer Number</th>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($selectAllOrders as $client) : ?>
                <tr>
                  <td class="is-checkbox-cell">
                    <label class="b-checkbox checkbox">
                      <input type="checkbox" value="false" />
                      <span class="check"></span>
                    </label>
                  </td>

                  <td data-label="Customer number" style="text-align: center;">CUSTOMER<?php echo  $client['user_id'] ?></td>
                  <td data-label="Order number" style="text-align: center;"> <span style="font-weight: bold; color: blue;"> FAMMS<?php echo $client['id_order'] ?></span></td>
                  <td data-label="Order date"><?php echo date('d/m/Y H:i', strtotime($client['date'])) ?></td>
                  <td data-label="Amount" style="text-align: right;"><span style="font-weight: bold; color: red;"><?php echo $client['rising'] ?></span> €</td>

                  <td data-label="Order status" style="text-align: center;">
                    <form action="" method="post" style="display: flex; align-items: center;">
                      <input type="hidden" name="id_order" value="<?php echo $client['id_order'] ?>">
                      <div class="select" style="margin-right: 10px;">
                        <select class="small-select" style="height: 40px;" name="state">
                          <option value="treatment" <?php echo $client['state'] == 'treatment' ? 'selected' : '' ?>>Treatment</option>
                          <option value="sent" <?php echo $client['state'] == 'sent' ? 'selected' : '' ?>>Sent</option>
                          <option value="delivered" <?php echo $client['state'] == 'delivered' ? 'selected' : '' ?>>Delivered</option>
                          <option value="cancelled" <?php echo $client['state'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                      </div>
                      <button type="submit" class="button is-success is-small" title="Valider">
                        <i class="fa-solid fa-circle-check"></i>
                      </button>
                    </form>
                  </td>

                  <td data-label="Firstname"><?php echo $client['firstName'] ?></td>
                  <td data-label="Lastname"><?php echo strtoupper($client['lastName']) ?></td>
                  <td data-label="Email"><?php echo $client['email'] ?></td>
                  <td data-label="Phone"><?php echo $client['phone'] ?></td>

                  <td class="is-actions-cell">
                    <div class="buttons is-right">
                      <!-- Lien vers la modale de chaque commande -->
                      <a href="#" class="button is-small is-primary jb-modal-trigger" data-target="modal-<?php echo $client['id_order'] ?>">
                        <span class="icon"><span class="mdi mdi-eye"></span></span>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <!-- Modales après le tableau -->
          <?php foreach ($selectAllOrders as $client) : ?>
            <div id="modal-<?php echo $client['id_order']; ?>" class="modal">
              <div class="modal-background jb-modal-close"></div>
              <div class="modal-card">
                <header class="modal-card-head">
                  <p class="modal-card-title">
                    <strong>Détail de la commande n°= <span style="color: red;"><?php echo $client['id_order']; ?></span> de <span style="color: blue;"><?php echo $client['firstName'] . ' ' . strtoupper($client['lastName']); ?></span></strong>
                  </p>
                  <p class="modal-card-title">
                    <strong> Montant total : <span style="color:red;"><?php echo $client['rising']; ?></span> €</strong>
                  </p>
                  <button class="delete jb-modal-close" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                  <?php
                  $orderDetails = $connect_db->query(
                    "
          SELECT product.picture, product.reference, product.price, order_details.quantity, (product.price * order_details.quantity) as total
          FROM order_details
          INNER JOIN product ON order_details.product_id = product.id_product
          WHERE order_details.order_id = " . $client['id_order']
                  );
                  $orderDetails = $orderDetails->fetchAll(PDO::FETCH_ASSOC); ?>
                  <table class="table is-fullwidth is-striped is-hoverable">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Reference</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Current stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($orderDetails as $detail) : ?>
                        <tr>
                          <td><img src="<?php echo $detail['picture']; ?>" alt="Product Photo" style="width: 50px; height: 50px;"></td>
                          <td><?php echo $detail['reference']; ?></td>
                          <td><?php echo $detail['price']; ?> €</td>
                          <td><?php echo $detail['quantity']; ?></td>
                          <td><?php echo $detail['total']; ?> €</td>
                          <!-- Afficher un stock actuel avec $dataProducts -->
                          <?php foreach ($dataProducts as $currentStock) : ?>
                            <?php if ($detail['reference'] == $currentStock['reference']) : ?>
                              <td><span style="font-weight: bold; color: red;"><?php echo $currentStock['stock']; ?></span></td>
                            <?php endif; ?>
                          <?php endforeach; ?>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </section>
                <footer class="modal-card-foot">
                  <button class="button jb-modal-close">Quitter</button>
                </footer>
              </div>
            </div>
          <?php endforeach; ?>

          <!-- Script JavaScript pour gérer l'ouverture et la fermeture des modales -->
          <script>
            document.addEventListener('DOMContentLoaded', () => {
              const modalTriggers = document.querySelectorAll('.jb-modal-trigger');
              const modals = document.querySelectorAll('.modal');

              modalTriggers.forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                  e.preventDefault();
                  const modalId = this.getAttribute('data-target');
                  const modal = document.getElementById(modalId);
                  modal.classList.add('is-active');
                });
              });

              modals.forEach(modal => {
                modal.querySelector('.jb-modal-close').addEventListener('click', () => {
                  modal.classList.remove('is-active');
                });
              });
            });
          </script>





          <?php
          require_once('include/footer.php');
          ?>