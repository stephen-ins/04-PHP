<?php

require_once 'include/init.php';

/*
Exo : Afficher les produits stockées en BDD
1- Sélectionner l'ensemble de la table product
2- Exécuter une méthode (fetch / fetchAll) pour rendre le résultat exploitable sous forme d'ARRAY
3- Traitement pour l'affichage (boucle)
4- Prévoir un lien qui redirige vers la page fiche_produit.php pour chaque produit, avec l'envoi de l'id_product dans l'URL
*/

// Sélection de la table product:
$selectAllProduct = $connect_db->query("SELECT * FROM product");
// ici le nécessaire pour afficher les produits
// $selectAllProduct= $connect_db->query("SELECT id product, title, price, picture FROM product");

// echo '<pre>';
// print_r($selectAllProduct);
// echo '</pre>';

// 2- Exécuter une méthode (fetch / fetchAll) pour rendre le résultat exploitable sous forme d'ARRAY

$dataProducts = $selectAllProduct->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($dataProducts);
// echo '<pre>';

// 3- Traitement affiche par boucle
// 4- Lien de redirection vers la page fiche_product.php pour chaque produit



require_once 'include/header.php'; ?>



<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Grille de produits</h3>
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
      <h2>Nos <span>produits</span></h2>
    </div>

    <!-- DEBUT DE LA DIV POUR INSERER LES ARTICLES -->


    <div class="row">

      <?php foreach ($dataProducts as $products): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <div class="option_container">
              <div class="options">
                <a href="fiche_produit.php?id=<?php echo $products['id_product']; ?>" class="option1">Voir plus</a>
                <a href="fiche_produit.php?id=<?php echo $products['id_product']; ?> " class=" option2">Acheter maintenant</a>
              </div>
            </div>
            <div class="img-box">
              <img src=<?php echo $products['picture']; ?> alt="" />
            </div>
            <div class="detail-box">
              <h5><?php echo $products['title']; ?></h5>
              <h6><?php echo $products['price'] . ' €'; ?></h6>
            </div>
          </div>
        </div>


      <?php endforeach; ?>


    </div>


    <!-- LIMITE D'INSERTION -->



    <div class="btn-box">
      <a href=""> Voir tous les produits </a>
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
<!-- footer section -->
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