<?php

namespace App\Database;

use App\Database\Connection;
use App\Models\Category;
use App\Models\Product;

class ProductDAO extends Connection
{
  public static function all($withCategory = false)
  {
    $sql = $withCategory
      ? 'SELECT products.id id, products.name name, price, description, category_id, categories.name category_name FROM products JOIN categories ON products.category_id = categories.id'
      : 'SELECT * FROM products';
    $products = self::query($sql);

    return array_map(function ($product) use ($withCategory) {
      return new Product(
        $product['id'],
        $product['name'],
        $product['price'],
        $product['description'],
        $product['category_id'],
        $withCategory ? new Category(
          $product['category_id'],
          $product['category_name']
        ) : null
      );
    }, $products);
  }

  public static function get($id)
  {
    $sql = 'SELECT * FROM products WHERE id = ?';
    $params = [$id];
    $products = self::query($sql, $params);

    if (count($products) > 0) {
      $product = $products[0];
      return new Product(
        $product['id'],
        $product['name'],
        $product['price'],
        $product['description'],
        $product['category_id'],
        null
      );
    }

    return null;
  }

  public static function create(Product $product)
  {
    $sql = 'INSERT INTO products (name, price, description, category_id) VALUES (?, ?, ?, ?)';
    $params = [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getCategoryId()];

    return self::query($sql, $params);
  }

  public static function createMany(Product ...$products)
  {
    $sql = 'INSERT INTO products (name, price, description, category_id) VALUES ';

    for ($i = 0; $i < count($products); $i++) {
      $sql .= '(?, ?, ?),';
    }

    $sql = substr_replace($sql, ';', strlen($sql) - 1, 1);

    self::query(
      $sql,
      array_merge(
        ...array_map(
          function ($product) {
            return [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getCategoryId()];
          },
          $products
        )
      )
    );
  }

  public static function update(Product $product)
  {
    $sql = 'UPDATE products SET name = ?, price = ?, description = ?, category_id = ? WHERE id = ?';
    $params = [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getCategoryId(), $product->getId()];

    return self::query($sql, $params);
  }

  public static function delete($id)
  {
    $sql = 'DELETE FROM products WHERE id = ?';
    $params = [$id];

    return self::query($sql, $params);
  }
}
