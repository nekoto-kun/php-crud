<?php

namespace App\Models;

class Product
{
  private $id, $name, $price, $description;

  public function __construct($id, $name, $price, $description)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }
}
