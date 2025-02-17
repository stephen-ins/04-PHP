<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="assets/images-famma/favicon.png" type="" />
  <title>Famms - Fashion HTML Template</title>
  <!-- bootstrap core css -->
  <link
    rel="stylesheet"
    type="text/css"
    href="assets/css-famma/bootstrap.css" />
  <!-- font awesome style -->
  <link href="assets/css-famma/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="assets/css-famma/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/css-famma/responsive.css" rel="stylesheet" />
</head>

<body>
  <!-- <?php
        echo '<pre>';
        print_r($_SERVER);
        echo '</pre>';
        ?> -->
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php"><img width="250" src="assets/images-famma/logo.png" alt="#" /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item <?php activeLink('/php/shop/index.php') ?>">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?php activeLink('/php/shop/product.php') ?>">
                <a class="nav-link" href="product.php">Boutique</a>
              </li>
              <li class="nav-item <?php activeLink('/php/shop/contact.php') ?>">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>

              <?php if (!userConnected()): // ON entre dans le IF dans le cas où l'indice 'user' n'est pas définit dans la session, donc l'user n'est pas authentifié 
              ?>
                <li class="nav-item <?php activeLink('/php/shop/connexion.php') ?>">
                  <a class="nav-link" href="connexion.php">Identifiez-vous</a>
                </li>
                <li class="nav-item <?php activeLink('/php/shop/inscription.php') ?>">
                  <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
              <?php endif; ?>


              <?php if (userConnected()): // ON entre dans le IF dans le cas où l'indice 'user' n'est pas définit dans la session, donc l'user est authentifié 
              ?>
                <li class="nav-item <?php activeLink('/php/shop/profil.php') ?>">
                  <a class="nav-link" href="profil.php">Mon compte</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="connexion.php?action=logout">Déconnexion</a>
                </li>
              <?php endif; ?>




              <?php if (adminConnected()):
              ?>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="true">
                    <span class="nav-label">BackOffice</span><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="admin/gestion_boutique.php">Boutique</a></li>
                    <li><a href="admin/gestion_commande.php">Commandes</a></li>
                    <li><a href="admin/gestion_user.php">Utilisateurs</a></li>
                  </ul>
                </li>
              <?php endif; ?>






              <li class="nav-item d-flex align-items-start <?php activeLink('/php/shop/panier.php') ?>">
                <a class="nav-link" href="panier.php">
                  <svg
                    version="1.1"
                    id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    viewBox="0 0 456.029 456.029"
                    style="enable-background: new 0 0 456.029 456.029"
                    xml:space="preserve">
                    <g>
                      <g>
                        <path
                          d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path
                          d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path
                          d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                  </svg>
                </a>

                <!-- Exo : Faire la somme de produit dans le panier de la session -->
                <?php $nbProduct = 0;
                if (isset($_SESSION['cart'])):
                  $nbProduct = array_sum($_SESSION['cart']['quantity']);
                ?>

                  <!-- array_sum() : fonction prédéfinie qui calcul la somme des éléments d'un tableau Array -->
                  <span class="badge bg-success text-white mt-1"><?= $nbProduct ?></span>

                <?php endif; ?>

              </li>
              <!-- <form class="form-inline">
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> -->
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->