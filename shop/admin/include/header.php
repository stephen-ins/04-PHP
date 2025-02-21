<?php


function logout()
{
  session_destroy();
  header('Location: ../index.php');
  exit();
}

// Commande pour logout
if (isset($_GET['logout'])) {
  logout();
}


// Vérifier si l'admin et connecté
// if (!adminConnected()) {
//   header('location: ../index.php');
//   exit();
// }
// Vérifier qui est connecté
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

// Les données de la personne connectée
// echo '<pre>';
// print_r($user);
// echo '</pre>';

// Vérifier le role de l'utilisateur --> si c'est un admin
// echo '<pre>';
// var_dump($_SESSION['user']['roles']);
// echo '</pre>';

// Activation du lien dans le menu je veux que le lien soit actif si je suis sur la page



?>


<!DOCTYPE html>
<html
  lang="en"
  class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script>
    function logout() {
      window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?logout=true";
    }
  </script>
</head>

<!-- Bulma is included -->
<link rel="stylesheet" href="../assets/css/main.min.css" />

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com" />
<link
  href="https://fonts.googleapis.com/css?family=Nunito"
  rel="stylesheet"
  type="text/css" />
</head>

<body>
  <div id="app">
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
        <div class="navbar-end">
          <div
            class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">

            <a class="navbar-link is-arrowless">
              <div class="is-user-avatar">
                <img
                  src="<?php echo ($user['gender'] == 'male') ? '../assets/images-famma/portrait_homme.jpg' : '../assets/images-famma/portrait_femme.jpg'; ?>"
                  alt="Nom Prénom" />
              </div>
              <div class="is-user-name"><span><?php echo strtoupper($user['lastName'] . ', ' . $user['firstName']); ?></span></div>
              <!-- <span class="icon"><i class="mdi mdi-chevron-down"></i></span> -->
            </a>

            <!-- <div class="navbar-dropdown">
                <a href="profile.php" class="navbar-item">
                  <span class="icon"><i class="mdi mdi-account"></i></span>
                  <span>My Profile</span>
          <a href="#" onclick="logout()" title="Log out" class="navbar-item is-desktop-icon-only">
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-settings"></i></span>
                  <span>Settings</span>
                </a>
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-email"></i></span>
                  <span>Messages</span>
                </a>
                <hr class="navbar-divider" />
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-logout"></i></span>
                  <span>Log Out</span>
                </a>
              </div> -->
          </div>
          <a href="" onclick="logout()" title="Déconnexion" class="navbar-item is-desktop-icon-only">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log out</span>
          </a>

          </a>
        </div>
      </div>
    </nav>

    <!-- <?php
          echo '<pre>';
          print_r($_SERVER);
          echo '</pre>';
          ?> -->

    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div class="aside-tools-label">
          <span><b>Boutique</b> Admin</span>
        </div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li class="<?php echo activeLink('/php/shop/admin/index.php'); ?>">
            <a href="index.php" class="has-icon">
              <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
              <span class="menu-item-label">Dashboard</span>
            </a>
          </li>
        </ul>

        <p class="menu-label">MENU</p>

        <ul class="menu-list">
          <li class="<?php echo activeLink('/php/shop/admin/gestion_boutique.php'); ?>">
            <a href="gestion_boutique.php" class="has-icon">
              <span class="icon"><span class="mdi mdi-store"></span></span>
              <span class="menu-item-label">Boutique</span>
            </a>
          </li>
          <li class="<?php echo activeLink('/php/shop/admin/gestion_commande.php'); ?>">
            <a href="gestion_commande.php" class="has-icon">
              <span class="icon"><span class="mdi mdi-sheep"></span> </span>
              <span class="menu-item-label">Commandes</span>
            </a>
          </li>
          <li class="<?php echo activeLink('/php/shop/admin/gestion_user.php'); ?>">
            <a href="gestion_user.php" class="has-icon">
              <span class="icon"><i class="mdi mdi-account-circle"></i></span>
              <span class="menu-item-label">Utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="../index.php" title="Retour en arrière" class="has-icon">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Page d'accueil</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="logout()" title="Déconnexion" class="has-icon">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Se déconnecter</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>