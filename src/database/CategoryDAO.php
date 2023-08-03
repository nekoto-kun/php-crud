<?php

namespace App\Database;

use App\Models\Category;

class CategoryDAO extends Connection
{
  public static function all()
  {
    $categories = self::query("SELECT * FROM categories");

    return array_map(function ($category) {
      return new Category($category['id'], $category['name']);
    }, $categories);
  }

  public static function get($id)
  {
    $sql = "SELECT * FROM categories WHERE id = ?";
    $params = [$id];
    $categories = self::query($sql, $params);

    if (count($categories) > 0) {
      $category = $categories[0];
      return new Category($category['id'], $category['name']);
    } else {
      return null;
    }
  }
}
