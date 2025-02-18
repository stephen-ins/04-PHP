<?php

require_once 'include/init.php';


// $selectAllProduct = $connect_db->query("SELECT * FROM product");

// echo '<pre>';
// print_r($selectAllProduct);
// echo '</pre>';

// $dataProducts = $selectAllProduct->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($dataProducts);
// echo '<pre>';

// Si l'indice '?id=' est défini dans l'url
if (isset($_GET['id'])) {
  $data = $connect_db->prepare("SELECT * FROM product WHERE id_product = :id");
  $data->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
  $data->execute();

  // Si la requete ne retourne pas de résultat, on redirige l'internaute
  if (!$data->rowCount()) {
    header('location:index.php');
  }

  $product = $data->fetch(PDO::FETCH_ASSOC);


  // echo '<pre>';
  // print_r($product);
  // echo '<pre >';
} else {
  // Sinon on redirige l'internaute
  header('location:index.php');
}




require_once 'include/header.php';

?>


<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Information sur l'article</h3>
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
      <h2>Ne tardez pas, <span>commandez !</span></h2>
    </div>
    <div class="row">

      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="box">
          <div class="img-box">
            <img src="<?= $product['picture'] ?>" alt="<?= $product['picture']  ?>" />
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="detail-box">
          <h5><?= ucfirst($product['title']) ?></h5>
          <h6>Référence : <?= $product['reference'] ?></h6>
          <h6>Catégorie : <?= $product['category'] ?></h6>
          <h6>Taille : <?= $product['size'] ?></h6>
          <h6>Genre : <?= $product['public'] ?></h6>
          <h6>Couleur : <?= $product['color'] ?></h6>
          <h6>Description : <?= $product['description'] ?></h6>
          <h5><?= $product['price'] ?> €</h5>

          <?php if ($product['stock'] > 0): ?>
            <strong class="error-text-color text-success">Ce produit est en stock</strong>

            <form action="panier.php" method="post" class="d-flex align-items-center justify-content-start">
              <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
              <!-- <label for="quantity">Qté</label> -->
              <select name="quantity" id="quantity" class="form-control col-2 mr-2">
                <?php for ($i = 1; $i <= $product['stock'] && $i <= 10; $i++) : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
              </select>
              <input type="submit" name="add_cart" class="m-0" value="Ajouter au panier">
            </form>

          <?php else: ?>
            <strong class="error-text-color text-danger">Ce produit n'est plus en stock</strong>



          <?php endif; ?>

        </div>
      </div>
    </div>
    <div class="btn-box">
      <a href="product.php"> Voir tout les produits </a>
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