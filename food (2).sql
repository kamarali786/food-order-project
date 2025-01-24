-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2024 at 12:41 PM
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
  `bann_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `bann_image`, `banner_label`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(28, 'uploads/banner/113516.jpg', 'Fresh & Organic: Nature\'s Best for You', '1', 0, '2024-11-20 06:05:09', '2024-12-01 20:51:57'),
(29, 'uploads/banner/110622.jpg', 'Discover the Power of Organic Living', '1', 0, '2024-11-20 06:50:15', '2024-12-02 06:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `selected_quantity` int NOT NULL,
  `price` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `product_id`, `user_id`, `selected_quantity`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(59, 3, 7, 10, 100, 1000, '0000-00-00 00:00:00', '2024-12-16 11:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `cate_image`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', 'uploads/category/154240.jpg', 1, 0, '2024-12-02 22:10:45', '2024-12-02 22:12:40'),
(2, 'Vegetables', 'uploads/category/154104.jpg', 1, 0, '2024-12-02 22:11:04', NULL),
(3, ' Grains', 'uploads/category/154142.png', 1, 0, '2024-12-02 22:11:42', NULL),
(4, 'Dairy Products', 'uploads/category/154203.png', 1, 0, '2024-12-02 22:12:03', NULL),
(5, ' Sauces & Condiments', 'uploads/category/154227.jpg', 1, 0, '2024-12-02 22:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_number` varchar(25) NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_data` json NOT NULL,
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` timestamp NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_number`, `order_date`, `order_status`, `billing_data`, `total_amount`, `payment_method`, `payment_status`, `shipping_address`, `delivery_date`, `transaction_id`, `created_at`, `updated_at`) VALUES
(18, 7, 'ORD-66362', '2024-12-14 06:34:57', 'pending', '{\"city\": \"palanpur\", \"email\": \"maknojiyaali123@gmail.com\", \"phone\": \"9558696170\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Kamar ali\"}', '13400', 'cash_on_delivery', 'unpaid', 'B/h :old shia masjid , chadotar', '2024-12-20 06:34:57', 'TXN1734158097345806', '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(17, 7, 'ORD-78358', '2024-12-14 06:31:14', 'pending', '{\"city\": \"palanpur\", \"email\": \"maknojiyaali123@gmail.com\", \"phone\": \"9558696170\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Kamar ali\"}', '13400', 'cash_on_delivery', 'unpaid', 'B/h :old shia masjid , chadotar', '2024-12-20 06:31:14', 'TXN1734157874151662', '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(16, 7, 'ORD-78358', '2024-12-14 06:31:14', 'pending', '{\"city\": \"palanpur\", \"email\": \"maknojiyaali123@gmail.com\", \"phone\": \"9558696170\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Kamar ali\"}', '13400', 'cash_on_delivery', 'unpaid', 'B/h :old shia masjid , chadotar', '2024-12-20 06:31:14', 'TXN1734157874151662', '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(19, 7, 'ORD-66362', '2024-12-14 06:34:57', 'pending', '{\"city\": \"palanpur\", \"email\": \"maknojiyaali123@gmail.com\", \"phone\": \"9558696170\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Kamar ali\"}', '13400', 'cash_on_delivery', 'unpaid', 'B/h :old shia masjid , chadotar', '2024-12-20 06:34:57', 'TXN1734158097345806', '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(20, 7, 'ORD-58744', '2024-12-14 06:58:04', 'pending', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '89650', 'cash_on_delivery', 'unpaid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 06:58:04', 'TXN1734159484308502', '2024-12-14 06:58:04', '0000-00-00 00:00:00'),
(21, 7, 'ORD-15513', '2024-12-14 07:00:29', 'pending', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '6200', 'upi', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:00:29', 'TXN1734159629946403', '2024-12-14 07:00:29', '0000-00-00 00:00:00'),
(22, 7, 'ORD-18270', '2024-12-14 07:04:25', 'pending', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"789654\", \"fullName\": \"Maknojiya Asif Ali\"}', '1800', 'paypal', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:04:25', 'TXN1734159865888195', '2024-12-14 07:04:25', '0000-00-00 00:00:00'),
(23, 7, 'ORD-48381', '2024-12-14 07:07:06', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '7880', 'credit_card', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:07:06', 'TXN1734160026105452', '2024-12-14 07:07:06', '0000-00-00 00:00:00'),
(24, 7, 'ORD-20654', '2024-12-14 07:11:12', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '788', 'upi', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:11:12', 'TXN1734160272963503', '2024-12-14 07:11:12', '0000-00-00 00:00:00'),
(25, 7, 'ORD-61879', '2024-12-14 07:15:53', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '9660', 'cash_on_delivery', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:15:53', 'TXN1734160553759060', '2024-12-14 07:15:53', '0000-00-00 00:00:00'),
(26, 7, 'ORD-96428', '2024-12-14 07:17:18', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '169075', 'credit_card', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:17:18', 'TXN1734160638786283', '2024-12-14 07:17:18', '0000-00-00 00:00:00'),
(27, 7, 'ORD-73891', '2024-12-14 07:20:01', 'Processing', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '6000', 'credit_card', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 07:20:01', 'TXN1734160801601227', '2024-12-14 07:20:01', '0000-00-00 00:00:00'),
(28, 7, 'ORD-64724', '2024-12-14 09:01:45', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '6200', 'paypal', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-20 09:01:45', 'TXN1734166905544234', '2024-12-14 09:01:45', '0000-00-00 00:00:00'),
(29, 7, 'ORD-25548', '2024-12-16 04:58:53', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '26895', 'paypal', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-22 04:58:53', 'TXN1734325133409572', '2024-12-16 04:58:53', '0000-00-00 00:00:00'),
(30, 7, 'ORD-34945', '2024-12-16 05:05:14', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '6200', 'cash_on_delivery', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-22 05:05:14', 'TXN1734325514262367', '2024-12-16 05:05:14', '0000-00-00 00:00:00'),
(31, 7, 'ORD-68443', '2024-12-16 05:22:45', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '9326', 'net_banking', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-22 05:22:45', 'TXN1734326565452407', '2024-12-16 05:22:45', '0000-00-00 00:00:00'),
(32, 7, 'ORD-22195', '2024-12-16 10:23:02', 'Completed', '{\"city\": \"palanpur\", \"email\": \"test@gmail.com\", \"phone\": \"0955869617\", \"state\": \"Gujarat\", \"country\": \"India\", \"zipCode\": \"385001\", \"fullName\": \"Maknojiya Asif Ali\"}', '100', 'paypal', 'Paid', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', '2024-12-22 10:23:02', 'TXN1734344582814632', '2024-12-16 10:23:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `order_products_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `total_price` int NOT NULL,
  `selected_quantity` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`order_products_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_products_id`, `order_id`, `user_id`, `product_id`, `price`, `total_price`, `selected_quantity`, `created_at`, `updated_at`) VALUES
(66, 31, 7, 3, 100, 400, 4, '2024-12-16 05:22:45', '0000-00-00 00:00:00'),
(65, 31, 7, 5, 788, 7880, 10, '2024-12-16 05:22:45', '0000-00-00 00:00:00'),
(64, 31, 7, 9, 523, 1046, 2, '2024-12-16 05:22:45', '0000-00-00 00:00:00'),
(63, 30, 7, 1, 620, 6200, 10, '2024-12-16 05:05:14', '0000-00-00 00:00:00'),
(62, 29, 7, 11, 8965, 26895, 3, '2024-12-16 04:58:53', '0000-00-00 00:00:00'),
(61, 28, 7, 1, 620, 6200, 10, '2024-12-14 09:01:45', '0000-00-00 00:00:00'),
(60, 27, 7, 8, 600, 6000, 10, '2024-12-14 07:20:01', '0000-00-00 00:00:00'),
(59, 26, 7, 3, 100, 1000, 10, '2024-12-14 07:17:18', '0000-00-00 00:00:00'),
(58, 26, 7, 11, 8965, 134475, 15, '2024-12-14 07:17:18', '0000-00-00 00:00:00'),
(57, 26, 7, 8, 600, 33600, 56, '2024-12-14 07:17:18', '0000-00-00 00:00:00'),
(56, 25, 7, 7, 966, 9660, 10, '2024-12-14 07:15:53', '0000-00-00 00:00:00'),
(55, 24, 7, 5, 788, 788, 1, '2024-12-14 07:11:12', '0000-00-00 00:00:00'),
(54, 23, 7, 4, 788, 7880, 10, '2024-12-14 07:07:06', '0000-00-00 00:00:00'),
(53, 22, 7, 15, 150, 1800, 12, '2024-12-14 07:04:25', '0000-00-00 00:00:00'),
(52, 21, 7, 1, 620, 6200, 10, '2024-12-14 07:00:29', '0000-00-00 00:00:00'),
(51, 20, 7, 11, 8965, 89650, 10, '2024-12-14 06:58:04', '0000-00-00 00:00:00'),
(50, 19, 7, 1, 620, 6200, 10, '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(49, 19, 7, 8, 600, 7200, 12, '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(48, 18, 7, 1, 620, 6200, 10, '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(47, 18, 7, 8, 600, 7200, 12, '2024-12-14 06:34:57', '0000-00-00 00:00:00'),
(46, 17, 7, 1, 620, 6200, 10, '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(45, 17, 7, 8, 600, 7200, 12, '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(44, 16, 7, 1, 620, 6200, 10, '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(43, 16, 7, 8, 600, 7200, 12, '2024-12-14 06:31:14', '0000-00-00 00:00:00'),
(67, 32, 7, 3, 100, 100, 1, '2024-12-16 10:23:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategory_id` int NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `subCategory_id`, `category_id`, `price`, `stock`, `product_image`, `quantity`, `mrp`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Orange', 'Juicy and refreshing citrus fruit, packed with Vitamin C and perfect for juicing or snacking.', 1, 1, 620, 0, 'uploads/product/163812.jpg', '25kg', 533, 1, 0, '2024-12-02 22:27:00', '2024-12-02 23:08:12'),
(2, 'Strawberry', 'Sweet and tangy berries, ideal for desserts, smoothies, or eating fresh.', 2, 1, 896, 56, 'uploads/product/20241203155927.jpg', '65kg', 988, 0, 0, '2024-12-02 22:29:27', '2024-12-07 05:41:12'),
(3, 'Mango ', 'A luscious tropical fruit with a rich, sweet flavor, great for summer treats.', 3, 1, 100, 73, 'uploads/product/163733.jpg', '2kg', 125, 1, 0, '2024-12-02 22:36:27', '2024-12-02 23:07:33'),
(11, 'Cheddar Cheese', 'A rich and tangy cheese, perfect for sandwiches, pasta, or snacking.', 10, 4, 8965, 98, 'uploads/product/20241203164044.jpg', '5kg', 10000, 1, 0, '2024-12-02 23:10:44', '0000-00-00 00:00:00'),
(4, 'Spinach', 'A nutrient-rich leafy green, perfect for salads, soups, or sautéed dishes.', 4, 2, 788, 65, 'uploads/product/163330.jpg', '56kg', 966, 1, 0, '2024-12-02 22:41:56', '2024-12-02 23:03:30'),
(5, 'Carrot', 'Crunchy and sweet root vegetable, ideal for snacking, cooking, or juicing.', 5, 2, 788, 44, 'uploads/product/162804.jpg', '54kg', 954, 1, 0, '2024-12-02 22:42:46', '2024-12-02 22:58:04'),
(6, 'Broccoli', 'A versatile cruciferous vegetable, great for roasting, steaming, or adding to stir-fries.', 6, 2, 78596, 85, 'uploads/product/20241203161803.jpg', '45kg', 100000, 1, 0, '2024-12-02 22:48:03', '2024-12-02 22:48:12'),
(7, 'Basmati Rice', 'Long-grain rice with a fragrant aroma, perfect for biryanis and pilafs.', 7, 3, 966, 97, 'uploads/product/20241203161937.jpg', '10kg', 1050, 1, 0, '2024-12-02 22:49:37', '0000-00-00 00:00:00'),
(8, 'Whole Wheat Flour', 'High-fiber flour for healthier bread, roti, and baked goods.', 8, 3, 600, 65, 'uploads/product/20241203162227.jpg', '50kg', 800, 1, 0, '2024-12-02 22:52:27', '0000-00-00 00:00:00'),
(9, 'White Quinoa ', 'A protein-packed grain substitute, perfect for salads, soups, or bowls.', 7, 3, 523, 50, 'uploads/product/162509.jpg', '12kg', 699, 1, 0, '2024-12-02 22:54:13', '2024-12-02 22:55:09'),
(10, 'Full Cream Milk', 'Creamy and nutritious milk, ideal for drinking or adding to beverages and recipes.\r\n', 10, 4, 650, 0, 'uploads/product/20241203162657.jpg', '11kg', 799, 1, 0, '2024-12-02 22:56:57', '2024-12-03 22:37:08'),
(12, 'Greek Yogurt', 'Thick and creamy yogurt, available plain or flavored, great for breakfast or dips.', 10, 4, 966, 85, 'uploads/product/20241203164338.jpg', '5kg', 1080, 1, 0, '2024-12-02 23:13:38', '0000-00-00 00:00:00'),
(13, 'Tomato Ketchup', 'A sweet and tangy condiment, ideal for fries, burgers, and snacks.', 13, 5, 199, 85, 'uploads/product/20241203164604.jpg', '1kg', 250, 1, 0, '2024-12-02 23:16:04', '0000-00-00 00:00:00'),
(14, 'Ranch Dressing', 'Creamy and herby dressing, perfect for salads, veggies, and dips.', 14, 5, 7865, 78, 'uploads/product/20241203165121.jpg', '58kg', 8010, 1, 0, '2024-12-02 23:21:21', '0000-00-00 00:00:00'),
(15, 'Italian Seasoning ', 'A flavorful blend of herbs and spices to enhance pasta, pizza, or roasted dishes.', 15, 5, 150, 87, 'uploads/product/20241203165320.jpg', '500mg', 199, 1, 0, '2024-12-02 23:23:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(155, 'x_url', 'https://twitter.com', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(156, 'insta_url', 'https://www.instagram.com', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(157, 'yt_url', 'https://www.youtube.com', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(159, 'fav_icon', 'uploads/setting/favicon/20241202114056_favicon.png', '2024-11-25 10:03:26', '2024-12-02 06:10:56'),
(158, 'logo', 'uploads/setting/logo/20241202113500_logo.png', '2024-11-25 09:57:29', '2024-12-02 06:05:00'),
(154, 'fb_url', 'https://www.facebook.com', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(153, 'address', 'B/h :old shia masjid ,chadotar ,Palanpur', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(152, 'about', '\"Welcome to our Food website, your go-to destination for delicious recipes, food tips, and culinary inspiration. Whether you\'re looking for quick meal ideas, gourmet recipes, or healthy eating options, we’ve got something to satisfy every craving. Explore our diverse range of cuisines, discover new flavors, and take your cooking skills to the next level with easy-to-follow guides and expert advice.\"', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(151, 'phone_number', '9558696170', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(150, 'email', 'maknojiyaali123@gmail.com', '2024-11-24 21:29:20', '2024-12-03 09:00:16'),
(149, 'site_name', 'Food-website', '2024-11-24 21:29:20', '2024-12-03 09:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subCategory_id` int NOT NULL AUTO_INCREMENT,
  `subCategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcate_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `category_id` int NOT NULL,
  `is_delete` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subCategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subCategory_id`, `subCategory_name`, `description`, `subcate_image`, `status`, `category_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Citrus Fruits', 'Juicy and tangy fruits rich in Vitamin C, including oranges, lemons, and grapefruits.', 'uploads/subCategory/20241203154352.jpg', 1, 1, 0, '2024-12-02 22:13:52', NULL),
(2, 'Berries', 'Small, sweet, or tart fruits packed with antioxidants, such as strawberries, blueberries, and raspberries.', 'uploads/subCategory/20241203154419.jpg', 1, 1, 0, '2024-12-02 22:14:19', '2024-12-02 22:15:46'),
(3, 'Tropical Fruits', 'Exotic and sweet fruits from tropical regions, like mangoes, pineapples, and papayas.', 'uploads/subCategory/20241203154536.jpg', 1, 1, 0, '2024-12-02 22:15:36', NULL),
(4, 'Leafy Greens', 'Nutritious, dark green leaves that are perfect for salads, stir-fries, or smoothies, such as spinach and kale.', 'uploads/subCategory/154840.jpg', 1, 2, 0, '2024-12-02 22:16:30', '2024-12-02 22:18:40'),
(5, 'Root Vegetables', 'Edible roots packed with fiber and vitamins, like carrots, beets, and radishes.', 'uploads/subCategory/154823.jpg', 1, 2, 0, '2024-12-02 22:16:58', '2024-12-02 22:18:23'),
(6, 'Cruciferous Vegetables', 'A family of nutrient-dense vegetables known for their unique taste and health benefits, including broccoli, cauliflower, and cabbage.', 'uploads/subCategory/154814.jpg', 1, 2, 0, '2024-12-02 22:17:28', '2024-12-02 22:18:14'),
(7, 'Rice', 'A versatile staple food, available in various types such as basmati, jasmine, and brown rice.', 'uploads/subCategory/154858.png', 1, 3, 0, '2024-12-02 22:18:04', '2024-12-02 22:18:58'),
(8, 'Wheat', 'Whole grains and flour products used for bread, pasta, and baked goods.', 'uploads/subCategory/20241203154922.png', 1, 3, 0, '2024-12-02 22:19:22', NULL),
(9, 'Quinoa', ' A protein-rich grain alternative that is gluten-free and packed with nutrients.', 'uploads/subCategory/20241203154953.png', 1, 3, 0, '2024-12-02 22:19:53', '2024-12-02 22:28:38'),
(10, 'Milk & Cream', 'Essential dairy products used for drinking, cooking, and making desserts, including full cream and skimmed milk.', 'uploads/subCategory/20241203155044.png', 1, 4, 0, '2024-12-02 22:20:44', NULL),
(11, 'Cheese', 'Varieties of soft, hard, or processed cheese, such as cheddar, mozzarella, and brie.', 'uploads/subCategory/20241203155113.png', 1, 4, 0, '2024-12-02 22:21:13', NULL),
(12, 'Yogurt', 'Fermented dairy products, available plain or flavored, such as Greek yogurt or fruit-flavored options.', 'uploads/subCategory/20241203155152.png', 1, 4, 0, '2024-12-02 22:21:52', NULL),
(13, 'Ketchup & Sauces', ' Tangy and sweet sauces used for dipping or flavoring dishes, like tomato ketchup or chili sauce.', 'uploads/subCategory/20241203155226.png', 1, 5, 0, '2024-12-02 22:22:26', NULL),
(14, 'Salad Dressings', 'Creamy or vinaigrette-style dressings for salads, such as ranch and Caesar dressing.', 'uploads/subCategory/20241203155254.png', 1, 5, 0, '2024-12-02 22:22:54', NULL),
(15, 'Spices & Seasonings', 'Dried herbs and spice blends to enhance flavors, like oregano, cumin, or Italian seasoning.', 'uploads/subCategory/20241203155325.png', 1, 5, 0, '2024-12-02 22:23:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `created_at`, `updated_at`, `address`, `city`, `phone`, `state`, `country`, `image`, `type`, `status`, `is_delete`) VALUES
(1, 'Maknojiya', 'Kamar ali', 'admin@gmail.com', '12345678', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '1', 0),
(4, 'Maknojiya', 'Kamar ali', 'maknojiyaali123@gmail.com', '$2y$10$TW6vcpVl0rW1YegFekNvz.5P0TZh2SSaHXVaqIGCA4oWckIhx/xQa', '2024-12-08 22:13:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '1', 1),
(5, 'Maknojiya', 'Kamar ali', 'maknojiyaali12@gmail.com', '$2y$10$Ow8KQQiEJzJxZDwR3.8klOntb2WfZBdUWAMiE9GDuR5NibUmTlTkO', '2024-12-08 23:00:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '1', 0),
(7, 'Maknojiya', 'Asif Ali', 'test@gmail.com', '$2y$10$luMB7ZW7OG8R6STh9cfCqu2cKyvNIImXin4M1CRO/S1c9HjH2XxTi', '2024-12-08 23:59:04', '2024-12-10 01:36:33', 'At po :- chadotar , Ta:- palanpur, dist :- banaskantha', 'palanpur', '0955869617', 'Gujarat', 'India', 'uploads/user/20241210190614.jpg', 'user', '1', 0),
(8, 'Maknojiya', 'Kamar ali', 'maknojiyatestting123@gmail.com', '$2y$10$t1Wdac.7qBpa2zyXjcjgzO.rrPXZhJU7W5X57GamHCFmeGmoZ0E2.', '2024-12-10 05:14:47', '2024-12-11 00:48:08', '123 Main Street, Apt 4B, Springfield, IL 62701, USA\r\n', 'palanpur', '0955869617', 'Gujarat', 'India', 'uploads/user/20241210184155.jpg', 'user', '1', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
