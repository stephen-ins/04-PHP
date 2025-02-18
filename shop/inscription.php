<?php
require_once 'include/init.php';

// Si l'user est connecté, il n'a rien à faire sur la page 'inscription', on le redirige vers la page index.php
if (userConnected()) {
  header('location: index.php');
}

/*

1- Contrôler que l'on receptionne bien toute les données saisies dans le formulaire en PHP
2- Contrôler la disponibilité de l'email (select + rowCount)
3- Afficher un message d'erreur si le champs email est vide
4- Contrôler la validité de l'email (filter_var)
5- Afficher un message si le champs mot de passe est vide
6- Contrôler que les mots de passe correspondent

*/

// 1- Contrôler que l'on receptionne bien toute les données saisies dans le formulaire en PHP

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// if (isset($_POST['submit'])) {
//   echo 'Firstname : ' . $_POST['firstName'] . '<br>';
//   echo 'Lastname : ' . $_POST['lastName'] . '<br>';
//   echo 'Email : ' . $_POST['email'] . '<br>';
//   echo 'Address : ' . $_POST['address'] . '<br>';
//   echo 'City : ' . $_POST['city'] . '<br>';
//   echo 'Zipcode : ' . $_POST['zipcode'] . '<br>';
//   echo 'Password : ' . $_POST['password'] . '<br>';
//   echo 'Repeat Password : ' . $_POST['repeat_password'] . '<br>';
// }


// Fonction REGEX déclarée
function isValidMDP($mdp)
{
  return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $mdp);
};



if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $border = 'border border-danger';

  if (empty($_POST['firstName'])) {
    $errorFirstName = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }

  if (empty($_POST['lastName'])) {
    $errorLastName = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }

  if (empty($_POST['email'])) {
    // 3- Afficher un message d'erreur si le champs email est vide
    $errorEmail = '<small class="text-danger">Champ requis</small>';
    $error = true;
  } else {
    // 4- Contrôler la validité de l'email (filter_var)
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorEmail = '<small class="text-danger" style="background-color: yellow;"><strong>Votre format d\'email est invalide !</strong></small>';
      $error = true;
    } else {
      // 2- Contrôler la disponibilité de l'email (select + rowCount)
      // On sélectionne tout dans la bdd à condition que l'email soit égal à l'email saisi dans le formulaire
      $emailDisponible = $connect_db->prepare("SELECT * FROM user WHERE email = :email");
      $emailDisponible->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
      $emailDisponible->execute();
      // echo $emailDisponible->rowCount();//vérifie visuellement si l'email existe déjà dans la bdd
      if ($emailDisponible->rowCount() > 0) {
        $errorEmail = '<small class="text-danger" style="background-color: yellow;"><strong>Cet email est déjà utilisé !</strong></small>';
        $error = true;
      }
    }
  }

  if (empty($_POST['address'])) {
    $errorAddress = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }

  if (empty($_POST['city'])) {
    $errorCity = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }

  if (empty($_POST['zipcode'])) {
    $errorZipcode = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }

  if (empty($_POST['password'])) {
    // 5- Afficher un message si le champs mot de passe est vide
    $errorPassword = '<small class="text-danger">Champ requis</small>';
    $error = true;

    // Validate strong password
    // $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
    // echo preg_match($password_regex, 'secret'); // returns 0
    // echo preg_match($password_regex, '-Secr3t.'); // returns 1


    // ou bien "elseif (!preg_match($password_regex, $_POST['password']))" 
  } elseif (!isValidMDP($_POST['password'])) {
    $errorPassword = '<small class="text-danger style="background-color: yellow;"><strong>Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial [#?!@$%^&*-]</strong></small>';
    $error = true;
  }
  if (empty($_POST['repeat_password'])) {
    // 5- Afficher un message si le champs mot de passe est vide
    $errorRepeatPassword = '<small class="text-danger">Champ requis</small>';
    $error = true;
  }
  // 6- Contrôler que les mots de passe correspondent
  if ($_POST['password'] !== $_POST['repeat_password']) {
    $errorRepeatPassword = '<small class="text-danger" style="background-color: yellow;"><strong>LE MOT DE PASSE NE CORRESPOND PAS !</strong></small>';
    $error = true;
  }
  // Exo : Si l'utilisateur a correctement rempli le formulaire, executer la requete d'insertion en BDD (prepare + bindValue + execute), on redirige l'internaute vers la page connexion.php
  // Requete d'insertion

  if (!isset($error)) {
    // Fonction de hashage clé de criptage. Le mot de passe n'est jamais concervé en clair dans la base de donnée.
    // password_hash permet de créer une clé de hashage du mot de passe dans la BDD.
    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $data = $connect_db->prepare("INSERT INTO user (firstName, lastName, email, address, city, zipcode, password) VALUES (:firstName, :lastName, :email, :address, :city, :zipcode, :password)");

    $data->bindValue(':firstName', $_POST['firstName'], PDO::PARAM_STR);
    $data->bindValue(':lastName', $_POST['lastName'], PDO::PARAM_STR);
    $data->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $data->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
    $data->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
    $data->bindValue(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
    // Insersion de la fonction de hashage du password
    $data->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $data->execute();

    // Affichage du message de validation de création de compte -> il sera supprimé via le undset
    // On stock dans le fichier de session de l'utilisateur(user), le fichier de session est stocké côté serveur et accessible sur n'importe quelle page du site, on stocke ici un message (flash) dans le session user.
    $_SESSION['msgRegisterValidate'] = '<div class="p-3 bg-success text-white text-center">Félicitation ! Votre compte est créé. Vous pouvez dès à présent vous connecter.</div> ';

    // Redirection sur la page connexion
    header('location: connexion.php');
  }


  // Si la variable $error n'est pas défini !! (isset), alors l'internaute a correctement  rempli le formulaire, il entre dans aucun cas de contrôle ci-dessus, alors on entre dans le IF.
  if (!isset($error)) {
    $msgValidation = '<div class="alert alert-success text-center mb-3 my-3"><strong>Félicitation ! Votre compte est créé</strong></div>';
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
          <h3>Créer votre compte</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- 9. Afficher un message de validation si l'utisateur a correctement rempli les champs du formulaire -->
<?php if (isset($msgValidation)) echo $msgValidation; ?>
<!-- end inner page section -->
<!-- why section -->
<section class="why_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="full">

          <form method="post" action="">
            <fieldset>
              <?php
              if (isset($errorFirstName))
                echo $errorFirstName
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorFirstName)) echo $border; ?>"
                value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"
                placeholder=" Enter votre prénom"
                name="firstName"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorLastName))
                echo $errorLastName
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorLastName)) echo $border; ?>"
                value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"

                placeholder=" Enter votre nom"
                name="lastName"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorEmail))
                echo $errorEmail
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorEmail)) echo $border; ?>"
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"
                placeholder=" Entrez votre adresse e-mail"
                name="email"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorAddress))
                echo $errorAddress
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorAddress)) echo $border; ?>"
                value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"

                placeholder=" Entrer votre adresse"
                name="address"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorCity))
                echo $errorCity
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorCity)) echo $border; ?>"
                value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>"
                placeholder=" Entrer votre ville"
                name="city"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorZipcode))
                echo $errorZipcode
              ?>
              <input
                type="text"
                class="form-control <?php if (isset($errorZipcode)) echo $border; ?>"
                value="<?php if (isset($_POST['zipcode'])) echo $_POST['zipcode']; ?>"
                placeholder=" Entrer votre code postal"
                name="zipcode"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <?php
              if (isset($errorPassword))
                echo $errorPassword
              ?>
              <input
                type="password"
                class="form-control <?php if (isset($errorPassword)) echo $border; ?>"
                placeholder=" Enter votre mot de passe"
                name="password"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <!-- <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fa fa-eye" id="eyeIcon"></i>
              </button> -->
              <?php
              if (isset($errorRepeatPassword))
                echo $errorRepeatPassword
              ?>
              <input
                type="password"
                class="form-control <?php if (isset($errorRepeatPassword)) echo $border; ?>"
                placeholder=" Répétez votre mot de passe"
                name="repeat_password"
                onfocus="this.style.backgroundColor='#e0f7fa';"
                onblur="this.style.backgroundColor='';" />
              <!-- <button class="btn btn-outline-secondary" type="button" id="toggleRepeatPassword">
                <i class="fa fa-eye" id="eyeIconRepeat"></i>
              </button> -->



              <input type="submit" name="submit" value="Valider" />
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

<!-- <script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  const eyeIcon = document.querySelector('#eyeIcon');

  togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    eyeIcon.classList.toggle('fa-eye-slash');
  });

  const toggleRepeatPassword = document.querySelector('#toggleRepeatPassword');
  const repeatPassword = document.querySelector('#repeat_password');
  const eyeIconRepeat = document.querySelector('#eyeIconRepeat');

  toggleRepeatPassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = repeatPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    repeatPassword.setAttribute('type', type);
    // toggle the eye slash icon
    eyeIconRepeat.classList.toggle('fa-eye-slash');
  });
</script> -->
</body>

</html>



</body>

</html>