<?php

require_once 'include/init.php';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if (isset($_POST['add_cart'])) {
  $data = $connect_db->prepare("SELECT * FROM product WHERE id_product = :id");
  $data->bindValue(':id', $_POST['id_product'], PDO::PARAM_INT);
  $data->execute();

  $product = $data->fetch(PDO::FETCH_ASSOC);

  // echo '<pre>';
  // print_r($product);
  // echo '</pre>';

  addProductToCart($product['id_product'], $product['title'], $product['picture'], $product['reference'], $_POST['quantity'], $product['price']);
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';

  header('location:panier.php');
}

if (isset($_POST['payForCart'])) {

  $error = '';
  // echo 'Procédure de paiement';

  // Boucle pour insérer les commandes dans la table order
  for ($i = 0; $i < count($_SESSION['cart']['id_product']); $i++) {
    $data = $connect_db->query("SELECT * FROM product WHERE id_product = " . $_SESSION['cart']['id_product'][$i]);
    $product = $data->fetch(PDO::FETCH_ASSOC);

    // Si la quantité en stock est inférieur à la quantité demandée
    if ($product['stock'] < $_SESSION['cart']['quantity'][$i]) {
      $error .= '<div class="alert alert-danger text-center">Stock restant du produit : ' . $_SESSION['cart']['title'][$i] .  ' : <strong>' . $product['stock'] . '</strong></div>';
      $error .= '<div class="alert alert-warning text-center mt-2">Quantité commandée du produit : ' . $_SESSION['cart']['title'][$i] . ' : <strong>' . $_SESSION['cart']['quantity'][$i] . '</strong></div>';

      if ($product['stock'] > 0) {

        // Le stock est inférieur à la quantité demandée
        // On modifie la quantité du produit dans le panier de la session par la quantité restante en stock dans la BDD
        $_SESSION['cart']['quantity'][$i] = $product['stock'];
        $error .= '<div class="alert alert-success text-center mt-2">La quantité du produit : ' . $_SESSION['cart']['title'][$i] . ' a été réduite car notre stock est insufisant.</div>';
      } else {

        // Le stock est épuisé et à 0, rupture de stock, on supprime le produit du panier de la session
        $error .= '<div class="alert alert-success text-center mt-2">Le produit ' . $_SESSION['cart']['title'][$i] . ' a été supprimée car nous sommes en rupture de stock.</div>';

        removeProductToCart($_SESSION['cart']['id_product'][$i]);
        $i--; // On décrémente la variable $i pour ne pas sauter un produit dans la session, car on a supprimé un produit, je dois revenir à l'indice précédent pour ne pas sauter un produit permettant de na pas oublier de controler un article qui aurait changé d'indice dans la session
      }
    }
  }

  // Requête d'insertion commande en BDD
  if (empty($error)) {
    $data = $connect_db->exec("INSERT INTO `order` (user_id, rising, date, state) VALUES (" . $_SESSION['user']['id_user'] . ", " . totalAmount() . ", NOW(), 'treatment')");

    // Récupération de l'id de la commande généré en BDD pour l'insérer dans la table order_detail, pour lier les produits à la commande
    $idOrder = $connect_db->lastInsertId();
    // print_r($idOrder);

    for ($i = 0; $i < count($_SESSION['cart']['id_product']); $i++) {
      $data =  $connect_db->exec("INSERT INTO `order_details` (order_id, product_id, quantity, price) VALUES ($idOrder, " . $_SESSION['cart']['id_product'][$i] . ", " . $_SESSION['cart']['quantity'][$i] . ", " . $_SESSION['cart']['price'][$i] . ")");

      $data = $connect_db->exec("UPDATE product SET stock = stock - " . $_SESSION['cart']['quantity'][$i] . " WHERE id_product = " . $_SESSION['cart']['id_product'][$i]);
    }

    unset($_SESSION['cart']);
    $_SESSION['msgValidateOrder'] = '<div class="alert alert-success text-center">Merci pour votre achat. Votre commande a bien été validée. Numéro de commande n°= ' . '<strong>FAMMS' . "$idOrder" . '</strong></div>';
  }
}









// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';



require_once 'include/header.php';

?>


<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Votre panier</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end inner page section -->
<!-- product section -->
<section class="product_section layout_padding">
  <div class="container">

    <!-- Remplacer ce message par un autre message quand je clique sur l'icone voir mon panier d'achat -->

    <div class="heading_container heading_center">
      <h2>Valider vos <span>achats !</span></h2>
    </div>

    <!-- message error pour quantité restant à commander -->
    <?php
    if (isset($error))
      echo $error;
    if (isset($_SESSION['msgValidateOrder'])) echo $_SESSION['msgValidateOrder'];
    unset($_SESSION['msgValidateOrder']);
    ?>
    <div class="row">

      <!-- ici s'affiche le produit du panier -->


      <table class="table table-border-4">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Image</th>
            <th>Référence</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Prix Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php if (empty($_SESSION['cart']['id_product'])): ?>

            <tr>
              <td colspan="6" class="text-center">Aucun article dans le panier</td>
            </tr>

            <!-- td vide pour faite de l'espace -->
            <td></td>
            <td></td>

            <?php else :

            for ($i = 0; $i < count($_SESSION['cart']['id_product']); $i++): ?>
              <tr>
                <td><?= ucfirst($_SESSION['cart']['title'][$i]); ?></td>
                <td><img src="<?= $_SESSION['cart']['picture'][$i] ?>" class="picture__product" alt="<?= $_SESSION['cart']['reference'][$i] ?>"></td>
                <td><?= $_SESSION['cart']['reference'][$i]; ?></td>
                <td><?= $_SESSION['cart']['quantity'][$i]; ?></td>
                <td><?= $_SESSION['cart']['price'][$i]; ?>€</td>
                <td><strong><?= $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i] ?> </strong>€</td>

                <td><a href="" class="btn btn-danger p-1"><i class="fa-solid fa-trash"></i></a></td>

              </tr>
            <?php endfor; ?>


            <tr>
              <td colspan="5" class="text-right
            "><strong>MONTANT TOTAL</strong></td>
              <td class="text-danger"><strong><?= totalAmount(); ?> €</strong></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if (!empty($_SESSION['cart']['id_product'])): ?>

      <div class="btn-box">
        <?php if (userConnected()): ?>
          <form action="" method="post">
            <button type="submit" name="payForCart" class="btn btn-success">
              <i class="fa-solid fa-credit-card fa-xl text-white"></i><span><strong> Paiement par carte bancaire</strong></span>
            </button>
          </form>
        <?php else: ?>
          <p>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">identifier</a> pour valider le paiement</p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="btn-box">
      <a href="product.php"> Retour à la boutique </a>
    </div>
  </div>
</section>
<!-- end product section -->

<?php require_once 'include/footer.php'; ?>

<div class="cpy_">
  <p>
    © 2025 - Stephen Ins - Tous droits réservés
  </p>
</div>

<!-- jQery -->
<script src="assets/js-famma/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="assets/js-famma/popper.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js-famma/bootstrap.js"></script>
<!-- custom js -->
<!-- <script src="assets/js-famma/custom.js"></script> -->
</body>

</html>