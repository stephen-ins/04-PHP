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

if (isset($_GET['id_product'])) {
  $id_product = $_GET['id_product'];

  echo '<pre>';
  print_r("ID présent dans l'url actuellement: " . $id_product);
  echo '<pre>';

  // Sélectionner les détail du produit
  $query = $connect_db->prepare("SELECT * FROM product WHERE id_product = $id_product");
  $query->bindValue(':id_product', $_GET['id_product'], PDO::PARAM_STR);
  $query->execute();

  $productDetail = $query->fetch(PDO::FETCH_ASSOC);

  // echo '<pre>';
  // print_r($productDetail);
  // echo '<pre>';
}






require_once 'include/header.php';

?>


<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Product Grid</h3>
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
      <h2>Our <span>products</span></h2>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="box">
          <div class="img-box">
            <img src="assets/images-famma/p1.png" alt="" />
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="detail-box">
          <h5>titre</h5>
          <h6>prix</h6>
          <p>description</p>
        </div>
      </div>
    </div>
    <div class="btn-box">
      <a href=""> View All products </a>
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