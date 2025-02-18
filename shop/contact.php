<?php

require_once 'include/init.php';





require_once 'include/header.php'; ?>



<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Contactez-nous</h3>
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
          <form action="index.php">
            <fieldset>
              <input
                type="text"
                placeholder="Entrez votre nom complet"
                name="name"
                required />
              <input
                type="email"
                placeholder="Entrez votre adresse e-mail"
                name="email"
                required />
              <input
                type="text"
                placeholder="Entrez le sujet"
                name="subject"
                required />
              <textarea
                placeholder="Entrez votre message"
                required></textarea>
              <input type="submit" value="Envoyer" />
            </fieldset>
          </form>
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