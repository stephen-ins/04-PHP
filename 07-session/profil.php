<?php

session_start();

echo 'LES DONNEES DU FORMULAIRE : <br>';


echo '<pre>';
print_r($_SESSION);
echo '</pre>';



// Permet de supprimer les données d'un indice dans la session, exemple, si nous supprimons tous les produits du panier.
// Exemple 1
unset($_SESSION['panier']);
// Exemple 2
// unset($_SESSION['prenom']);


// suppression de la session => Vérifier dans les fichiers temporaire de xamp/tmp
session_destroy();



/*
Les informations de la session sont enregistrées côté serveur, elle contiennent des informations sensible comme l'email, les données du panier, elles sont stockées et accessible via la superglobale $_SESSION, qui est un tableau de données Array (identique à $GET et $_POST), la session permet d'avoir accès à des données sur n'importe quelle page de l'application, il a un fichier de session utilisateur, la session a une durée de vie illimitée, si on ne la supprime pas, elle perdure. Elle permet d'être authentifiées sur une application, sans elle nous serions déconnecté à chaque changement de page.
*/