-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2024 at 09:37 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `banner_id` int NOT NULL AUTO_INCREMENT,
  `bann_image` varchar(255) NOT NULL,
  `banner_label` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `bann_image`, `banner_label`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(28, 'uploads/banner/113516.jpg', 'Fresh & Organic: Nature\'s Best for You', '1', 0, '2024-11-20 06:05:09', '2024-11-20 07:01:35'),
(29, 'uploads/banner/142742.jpg', 'Discover the Power of Organic Living', '1', 0, '2024-11-20 06:50:15', '2024-11-19 20:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cate_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `cate_image`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(10, 'Fruits', 'uploads/category/183336.jpg', 1, 0, '2024-11-18 01:03:36', NULL),
(11, 'Grain ', 'uploads/category/183420.jpg', 1, 0, '2024-11-18 01:04:20', '2024-11-20 07:15:53'),
(12, 'Sauces & Condiments', 'uploads/category/115536.jpg', 0, 1, '2024-11-19 06:25:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subCategory_id` int NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL,
  `mrp` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `subCategory_id`, `price`, `stock`, `product_image`, `quantity`, `mrp`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'pineapple ', 'maknojiya kamar ali \r\n', 1, 36, 89, 'uploads/product/110252.jpg', 69, 52, 1, 0, '2024-11-18 21:31:44', '2024-11-20 05:32:52'),
(2, 'Strawberry ', 'Strawberry is a best Fruits', 2, 35, 89, 'uploads/product/113320.jpg', 65, 899, 1, 0, '2024-11-18 22:05:59', '2024-11-20 06:03:20'),
(3, 'Strawberry ', 'Strawberry is a best Fruits', 2, 35, 89, 'uploads/product/20241119191220.jpg', 65, 899, 1, 1, '2024-11-19 01:42:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subCategory_id` int NOT NULL AUTO_INCREMENT,
  `subCategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subcate_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint NOT NULL,
  `category_id` int NOT NULL,
  `is_delete` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subCategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subCategory_id`, `subCategory_name`, `description`, `subcate_image`, `status`, `category_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Citrus Fruits', 'all Fruits available', 'uploads/subCategory/20241119183705.jpg', 1, 10, 0, '2024-11-19 01:07:05', NULL),
(2, 'Whole Grains', 'all  grains are available', 'uploads/subCategory/20241119183737.jpg', 1, 11, 0, '2024-11-19 01:07:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_delete` tinyint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `type`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '12345678', 'admin', '1', 0, '0000-00-00 00:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
