<?php

require 'vendor/autoload.php';

use App\Database\ProductDAO;
use App\Models\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($_POST['_method']) {
    case 'POST':
      $product = new Product(null, $_POST['name'], $_POST['price'], $_POST['description'], $_POST['category_id'], null);
      ProductDAO::create($product);
      break;
    case 'PUT':
      $product = new Product($_POST['id'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['category_id'], null);
      ProductDAO::update($product);
      break;
    case 'DELETE':
      ProductDAO::delete($_POST['id']);
      break;
  }
}

header('Location: index.php');
exit;
