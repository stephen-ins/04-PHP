<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<br>';
echo '<br>';
echo '<br>';

if (isset($_POST['sumbmit'])) {

  echo "Prénom :   $_POST[firstname]  <br>";
  echo "Nom :   $_POST[lastname]  <br>";
  echo "Adresse :   $_POST[adress]  <br>";
  echo "Ville :   $_POST[city]  <br>";
  echo "Code postal :   $_POST[postal_code]  <br>";
  echo "Sexe :   $_POST[sex]  <br>";
  echo "Description :   $_POST[description]  <br>";
}

















?>

<!--  -->