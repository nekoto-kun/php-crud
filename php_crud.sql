-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.33 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET NAMES utf8 */
;

/*!50503 SET NAMES utf8mb4 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

-- Dumping database structure for php_crud
CREATE DATABASE IF NOT EXISTS `php_crud`
/*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */
/*!80016 DEFAULT ENCRYPTION='N' */
;

USE `php_crud`;

-- Dumping structure for table php_crud.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Dumping data for table php_crud.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */
;

REPLACE INTO `categories` (`id`, `name`)
VALUES
  (1, 'Makanan'),
  (2, 'Minuman'),
  (3, 'Snack');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */
;

-- Dumping structure for table php_crud.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int unsigned NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories` (`category_id`),
  CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Dumping data for table php_crud.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */
;

REPLACE INTO `products` (
  `id`,
  `name`,
  `price`,
  `description`,
  `category_id`
)
VALUES
  (1, 'Taro Mini', 1000, 'Taro mini', 3),
  (2, 'Taro', 3000, 'Taro reguler', 3),
  (3, 'TARO JUMBO', 5000, 'Taro mahal', 3),
  (4, 'Coca-Cola', 7000, 'Coca-cola', 2),
  (
    5,
    'Pecel lele',
    11000,
    '1 porsi pecel lele + lalapan + sambal',
    1
  );

/*!40000 ALTER TABLE `products` ENABLE KEYS */
;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */
;

/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;