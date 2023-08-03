<?php

namespace App\Database;

use PDO;
use PDOException;

class Connection
{
  public static function connect($hostname = 'localhost', $database = 'php_crud', $username = 'root', $password = '')
  {
    try {
      $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connection;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function query($sql, $params = [])
  {
    try {
      $statement = self::connect()->prepare($sql);
      $statement->execute($params);

      $data = $statement->fetchAll(PDO::FETCH_ASSOC);
      $statement->closeCursor();
      return $data;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
