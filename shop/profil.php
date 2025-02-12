<?php
require_once 'include/init.php';

// Récupération des informations de connexion du compte de l'utilisateur

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Déclaration de la fonction pour récupérer la session active et l'intégrer dans le DOM
$user = $_SESSION['user'];
// echo '<pre>';
// print_r($user);
// echo '</pre>';

//  Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!userConnected()) {
  header('location: index.php');
}



require_once 'include/header.php'; ?>



<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Mes informations personnelles</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end inner page section -->
<!-- why section -->
<section class="why_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="full">

          <?php
          if (adminConnected()):
          ?>
            <div class="detail-box d-flex align-items-center justify-content-between text-danger mb-lg-4">
              <h5>Vous êtes ADMINISTRATEUR</h5>
            </div>
          <?php endif ?>

          <div class="row">
            <div class="col-md-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Prénom :</li>
                <li class="list-group-item">Nom :</li>
                <li class="list-group-item">Adresse email :</li>
                <li class="list-group-item">Adresse postale :</li>
                <li class="list-group-item">Code postale :</li>
                <li class="list-group-item">Ville :</li>
              </ul>
            </div>
            <div class="col-md-8">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['firstName']); ?></strong></li>
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['lastName']); ?></strong></li>
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['email']); ?></strong></li>
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['address']); ?></strong></li>
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['zipcode']); ?></strong></li>
                <li class="list-group-item"><strong><?php echo htmlspecialchars($user['city']); ?></strong></li>
              </ul>
            </div>
          </div>





        </div>
      </div>
    </div>
  </div>
</section>
<!-- end why section -->
<!-- arrival section -->
<!-- end arrival section -->

<?php require_once 'include/footer.php'; ?>


<div class="cpy_">
  <p>
    © 2025 Tous droits réservés par Grégory LACROIX
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