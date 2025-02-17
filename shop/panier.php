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
    <div class="heading_container heading_center">
      <h2>Valider vos <span>achats !</span></h2>
    </div>
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
                <td><?= ucfirst($_SESSION['cart']['reference'][$i]); ?></td>
                <td><?= ucfirst($_SESSION['cart']['quantity'][$i]); ?></td>
                <td><?= ucfirst($_SESSION['cart']['price'][$i]); ?>€</td>
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
            <input type="submit" name="payForCart" class="btn btn-success" value="Procéder au paiement">
          </form>
        <?php else: ?>
          <p>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">identifier</a> pour valider le paiement</p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="btn-box">
      <a href="product.php"> Voir tout les produits </a>
    </div>
  </div>
</section>
<!-- end product section -->

<?php require_once 'include/footer.php'; ?>

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