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
// Fonction permettant de savoir si un admoinistrateur est authentifié sur le site, si c'est un user lambda on retourne false
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
