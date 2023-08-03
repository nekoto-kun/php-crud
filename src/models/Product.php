<?php

namespace App\Models;

use App\Database\CategoryDAO;

class Product
{
  private $id, $name, $price, $description, $category_id;
  private $category;

  public function __construct($id, $name, $price, $description, $category_id, $category)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
    $this->category_id = $category_id;
    $this->category = $category;
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

  public function getCategoryId()
  {
    return $this->category_id;
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

  public function setCategoryId($category_id)
  {
    $this->category_id = $category_id;
  }

  public function getCategory()
  {
    // return CategoryDAO::get($this->category_id);
    return $this->category;
  }
}
