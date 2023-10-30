-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: db
-- Üretim Zamanı: 30 Eki 2023, 20:53:08
-- Sunucu sürümü: 8.0.34
-- PHP Sürümü: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `productfeeder`
--
CREATE DATABASE IF NOT EXISTS `productfeeder` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `productfeeder`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `api_key` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `api_key`, `created_at`, `updated_at`) VALUES
(1, 'Akakçe', '5fb46291261a90d3c12d8da28abeca74', '2023-10-29 20:00:08', '2023-10-29 20:00:43'),
(2, 'Cimri', '8cc13af7b903ae37ce27fb6bce18ea5a', '2023-10-29 20:00:08', '2023-10-29 20:01:28'),
(3, 'Epey', '204009191fc41c30e0461e5c8852143b', '2023-10-29 20:00:08', '2023-10-29 20:02:01'),
(4, 'Google Alışveriş', 'bdcdcb12ad5d50206822b18440ad0b75', '2023-10-29 20:00:08', '2023-10-29 20:02:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`) VALUES
(1, 'Smartphone', 699.99, 'Electronic'),
(2, 'Laptop', 1199.99, 'Electronic'),
(3, 'Tablet', 349.99, 'Electronic'),
(4, 'Headphones', 129.99, 'Electronic'),
(5, 'Digital Camera', 499.99, 'Electronic'),
(6, 'Portable Speaker', 79.99, 'Electronic'),
(7, 'Smartwatch', 199.99, 'Electronic'),
(8, 'Desktop Computer', 1499.99, 'Electronic'),
(9, 'E-book Reader', 119.99, 'Electronic'),
(10, 'Printer', 299.99, 'Electronic'),
(11, 'Dress', 49.99, 'Fashion'),
(12, 'Jeans', 39.99, 'Fashion'),
(13, 'T-Shirt', 19.99, 'Fashion'),
(14, 'Blouse', 29.99, 'Fashion'),
(15, 'Jacket', 59.99, 'Fashion'),
(16, 'Sunglasses', 29.99, 'Fashion'),
(17, 'Shoes', 79.99, 'Fashion'),
(18, 'Boots', 89.99, 'Fashion'),
(19, 'Hat', 19.99, 'Fashion'),
(20, 'Scarf', 14.99, 'Fashion'),
(21, 'Sofa', 799.99, 'Home Decor'),
(22, 'Coffee Table', 149.99, 'Home Decor'),
(23, 'Bed', 499.99, 'Home Decor'),
(24, 'Bookshelf', 79.99, 'Home Decor'),
(25, 'Lamp', 39.99, 'Home Decor'),
(26, 'Curtains', 29.99, 'Home Decor'),
(27, 'Wall Clock', 19.99, 'Home Decor'),
(28, 'Throw Pillow', 9.99, 'Home Decor'),
(29, 'Vase', 24.99, 'Home Decor'),
(30, 'Rug', 69.99, 'Home Decor'),
(31, 'Outdoor Grill', 199.99, 'Home Decor'),
(32, 'Microwave Oven', 149.99, 'Electronic'),
(33, 'Toaster', 39.99, 'Electronic'),
(34, 'Refrigerator', 699.99, 'Electronic'),
(35, 'Washing Machine', 499.99, 'Electronic'),
(36, 'Blender', 29.99, 'Electronic'),
(37, 'Digital TV', 499.99, 'Electronic'),
(38, 'Gaming Console', 299.99, 'Electronic'),
(39, 'Sunglasses', 34.99, 'Fashion'),
(40, 'Wristwatch', 69.99, 'Fashion'),
(41, 'Backpack', 39.99, 'Fashion'),
(42, 'Winter Coat', 89.99, 'Fashion');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
