<?php

require_once 'include/init.php';

// Si l'indice 'action' est définit dans l'URL et qu'il a pour valeur 'logout', cela veut dire que l'internaute a cliqué sur le lien 'Déconnexion'
// On supprime donc le tableau Array de données user dans la session
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // On ne supprime pas le fichier de session mais seulement l'indice 'user'
  unset($_SESSION['user']);
  // session_destroy()
}
// Si l'user est connecté, il n'a rien à faire sur la page 'connexion', on le redirige vers la page index.php
if (userConnected()) {
  header('location: index.php');
}


// echo '
// <pre>';
// print_r($_POST);
// echo '</pre>';

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  // On sélectionne tout dans la BDD à condition que la colonne email dans la BDD soit égal à l'email saisi dans le formulaire
  $data = $connect_db->prepare("SELECT * FROM user WHERE email = :email");
  $data->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
  $data->execute();

  // Si la requete de sélection retourne un résultat, cela veut dire que l'email existe dans la BDD
  if ($data->rowCount()) {
    // echo 'email existant';
    // On récupère un Array contenant toutes les données de l'utilisateur qui a saisi le bon email
    $user = $data->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';

    // password_verify() : fonction prédéfinie permettant de comparer un mot de passe en clair avec un mot de passe hashé. On entre dans la condition IF si les mots de passe correspondent.
    if (password_verify($_POST['password'], $user['password'])) {
      // echo 'password valide';

      // On stock dans la session les informations de l'utilisateur connecté et authentifié, ces données sont accessibles sur n'importe quelle page du site (tant qu'on ne les supprime pas)
      //                  id_user
      foreach ($user as $key => $value) {
        // $_SESSION['user']['id_user'] = $user['id'];
        // $_SESSION['user']['firstName;
        $_SESSION['user'][$key] = $value;
      }
      header('location: index.php');
    } else {
      // echo 'password invalide';
      $error = '<div class="background-danger p-3 mb-3 text-white">Email ou mot de passe incorrect.</div>';
    }
  } else {
    // echo 'email inexistant';
    $error = '<div class="background-danger p-3 mb-3 text-white">Email ou mot de passe incorrect.</div>';
  }
}






require_once 'include/header.php';

?>

<!-- inner page section -->
<section class="inner_page_head">
  <div class="container_fuild">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Identifiez-vous</h3>
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


        <?php if (isset($_SESSION['msgRegisterValidate'])) echo $_SESSION['msgRegisterValidate']; ?>
        <?php if (isset($error)) echo $error; ?>



        <div class="full">
          <form method="post" action="">
            <fieldset>
              <input
                type="text"
                placeholder="Entrez votre adresse e-mail"
                name="email"
                class="<?php if (isset($error)) echo 'border-danger' ?>"
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?> " />

              <input
                type="password"
                placeholder="Enter votre mot de passe"
                name="password"
                class="<?php if (isset($error)) echo 'border-danger' ?>" />
              <input type="submit" name="submit" value="Continuer" />
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

<?php require_once 'include/footer.php';

// On détruit la session msgRegisterValidate afin qu'il ne soit pas affiché sur la page d'authentification
unset($_SESSION['msgRegisterValidate']);

?>



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