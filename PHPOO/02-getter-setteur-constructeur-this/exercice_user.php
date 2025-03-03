<?php

/*
Créer les getteurs / setteurs pour la classe Product afin de renseigner les propriétés private déclarées.
Faites en sorte d'afficher un message d'erreur si la taille du titre est inférieure à 5 caractères.
*/


class Product
{
  private $title;
  private $reference;
  private $price;
  private $stock;
  private $error;

  public function getError()
  {
    return $this->error;
  }


  public function setTitle($title)
  {
    if (strlen($title) < 5) {
      $this->error = "Minimum 5 caractères<br>";
    } else {
      $this->title = $title;
    }
  }

  public function getTitle()
  {
    return $this->title;
  }

  // ---------------------------------------------------------------

  public function setReference($reference)
  {
    $this->reference = $reference;
  }

  public function getReference()
  {
    return $this->reference;
  }

  // ---------------------------------------------------------------

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getPrice()
  {
    return $this->price;
  }

  // ---------------------------------------------------------------

  public function setStock($stock)
  {
    $this->stock = $stock;
  }

  public function getStock()
  {
    return $this->stock;
  }
}

echo "<br>";
echo "<br>";
echo "<br>";
// -------------------------
$product = new Product();
$product->setTitle("test");
echo $product->getError();

echo "<br>";
echo "<br>";
echo "<br>";
// -------------------------
$product->setTitle("Chapeau");
$product->setReference("REF123YPO");
$product->setPrice(19.99);
$product->setStock(100);

echo "Titre : " . $product->getTitle() . "<br>";
echo "Référence : " . $product->getReference() . "<br>";
echo "Prix : " . $product->getPrice() . "<br>";
echo "Stock : " . $product->getStock() . "<br>";
