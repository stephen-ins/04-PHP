<?php

// --- FUNCTION UTILISATEUR AUTHENTIFIE

// Fonction qui permet de savoir si l'utilsateur est authentifié sur le site
function userConnected()
{
  // Si l'indice 'user' dans le fichier session n'est pas défini, cela signifie que l'utilisateur n'est pas connecté et n'est pas authentifié
  if (isset($_SESSION['user'])) return true;
  else
    return false; // On retourne TRUE si l'indice 'user' est bien défini dans le fichier session
}

//  --- FUNCTION ADMINISTRATEUR AUTHENTIFIE
// Fonction permettant de savoir si un administrateur est authentifié sur le site, si c'est un user lambda on retourne false
function adminConnected()
{
  // // Si à l'indice 'roles' dans la session, la valeur est différente de 'admin', cela signifie que l'utilisateur n'est pas un administrateur mais un lambda
  // if (isset($_SESSION['user']['roles']) &&  $_SESSION['user']['roles'] != 'admin') return false;
  // return true; // On retourne TRUE si l'indice 'roles' est bien défini dans le fichier session et que sa valeur est égale à 'admin'

  if (userConnected() && $_SESSION['user']['roles'] == 'admin')
    return true;
  else
    return false; // On retourne FALSE si dans la session le roles n'est pas défini dans 'admin'
}


// --- FUNCTION CREATION DU PANIER SESSION

function createCart()
{
  // Si l'indice 'cart' n'est pas définit dans la session de l'utlilisateur, cela veut dire que l'utilisateur n'a ajouté aucun produit dans le panier, alors on crée les différents tableaux dans la session
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['cart']['id_product'] = [];
    $_SESSION['cart']['title'] = [];
    $_SESSION['cart']['picture'] = [];
    $_SESSION['cart']['reference'] = [];
    $_SESSION['cart']['quantity'] = [];
    $_SESSION['cart']['price'] = [];
  }
}

// --- FUNCTION AJOUTER PRODUT DANS PANIER SESSION

function addProductToCart($id_product, $title, $picture, $reference, $quantity, $price)
{

  // les [] permettent d'ajouter une valeur à un tableau (indice numérique pour un array)
  createCart(); // On crée le panier si il n'existe pas dans la session

  // Si l'indice 'id_product' est définit dans le panier, cela signifie que le produit ajouté est déjà présent dans le panier
  $positionProduct = array_search($id_product, $_SESSION['cart']['id_product']);
  var_dump($positionProduct);

  // Si la position du produit est différente de FALSE, cela signifie que le produit est déjà présent dans le panier, alors on incrémente la quantité
  if ($positionProduct !== false) {
    $_SESSION['cart']['quantity'][$positionProduct] += $quantity;
  } else {
    // Sinon on ajoute le produit dans le panier, on ajoute une nouvelle ligne dans le panier
    $_SESSION['cart']['id_product'][] = $id_product;
    $_SESSION['cart']['title'][] = $title;
    $_SESSION['cart']['picture'][] = $picture;
    $_SESSION['cart']['reference'][] = $reference;
    $_SESSION['cart']['quantity'][] = $quantity;
    $_SESSION['cart']['price'][] = $price;
  }
}

// --- FONCTION CALCUL DU MONTANT TOTAL DU PANIER

function totalAmount()
{
  $total = 0;
  for ($i = 0; $i < count($_SESSION['cart']['id_product']); $i++) {
    $total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i];
  }
  return round($total, 2);
}

// --- FONCTION LIEN ACTIFS NAV

//                  /php/shop/panier.php
function activeLink($url)
{
  if ($_SERVER['PHP_SELF'] == $url)
    echo 'active';
}
