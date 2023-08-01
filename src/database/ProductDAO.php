<?php

namespace App\Database;

use App\Database\Connection;
use App\Models\Product;

class ProductDAO extends Connection
{
  public static function all()
  {
    $products = self::query('SELECT * FROM products');

    return array_map(function ($product) {
      return new Product($product['id'], $product['name'], $product['price'], $product['description']);
    }, $products);
  }

  public static function get($id)
  {
    $sql = 'SELECT * FROM products WHERE id = ?';
    $params = [$id];
    $products = self::query($sql, $params);

    if (count($products) > 0) {
      $product = $products[0];
      return new Product($product['id'], $product['name'], $product['price'], $product['description']);
    }

    return null;
  }

  public static function create(Product $product)
  {
    $sql = 'INSERT INTO products (name, price, description) VALUES (?, ?, ?)';
    $params = [$product->getName(), $product->getPrice(), $product->getDescription()];

    return self::query($sql, $params);
  }

  public static function update(Product $product)
  {
    $sql = 'UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?';
    $params = [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getId()];

    return self::query($sql, $params);
  }

  public static function delete($id)
  {
    $sql = 'DELETE FROM products WHERE id = ?';
    $params = [$id];

    return self::query($sql, $params);
  }
}
