<?php
require_once('fonction.inc.php');
/* Exercice:
	1- Déclarer un tableau ARRAY avec tout les fruits
	2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	3- Affichez les 2 tableaux (print_r)
	4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.
	5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
	7- Faire un affichage dans une tableau HTML pour une présentation plus sympa.
*/

$arrayFruits = ['cerises', 'bananes', 'pommes', 'peches'];
$arrayPoids = [100, 500, 1000, 1500, 2000, 3000, 5000, 10000];

echo '<pre>'; print_r($arrayFruits); echo '</pre>';
echo '<pre>'; print_r($arrayPoids); echo '</pre>';

echo calcul($arrayFruits[0], $arrayPoids[1]) . '<hr>';

//						100
foreach($arrayPoids as $value){
	// 			  cerises			100
	echo calcul($arrayFruits[0], $value) . '<br>';
}

echo '<hr>';

//						bananes
foreach($arrayFruits as $fruit){
	//						100
	foreach($arrayPoids as $poid){
		// 			cerises, 1500
		echo calcul($fruit, $poid) . '<br>';
	}
	echo '<hr>';
}

echo '<hr>';

echo '<table border="1">';
foreach($arrayFruits as $fruit){
	echo '<tr>';
	foreach($arrayPoids as $poid){
		echo '<td>' . calcul($fruit, $poid) . '</td>';
	}
	echo '</tr>';
}
echo '</table>';



