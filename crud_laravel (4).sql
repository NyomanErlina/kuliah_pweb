-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 12:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makanan', 1, '2020-04-25 00:02:42', '2020-04-25 00:02:42', NULL),
(2, 'Minuman', 1, '2020-04-25 00:02:46', '2020-04-25 00:02:46', NULL),
(3, 'Pakaian Wanita', 1, '2020-04-25 00:02:50', '2020-05-11 03:23:40', NULL),
(4, 'Pakaian Pria', 1, '2020-05-11 03:23:54', '2020-05-11 03:23:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` decimal(12,0) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` decimal(5,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chika', 'Jesika', '89625632', 'chik@gmail.com', 'Jojoran 4', 'Surabaya', 'Indonesia', '10032', 1, '2020-03-22 22:13:05', '2020-04-04 05:17:43', NULL),
(2, 'Dea', 'Amartya', '812183143', 'deo@yahoo.com', 'Sekardangan', 'Sidoarjo', 'Indonesia', '12877', 1, '2020-03-22 22:13:17', '2020-03-22 22:13:17', NULL),
(3, 'Risky', 'Zuliansyah', '812183143', 'ris@gmail.com', 'Mangli', 'Jember', 'Indonesia', '12876', 1, '2020-03-22 22:13:26', '2020-04-04 05:17:43', NULL),
(4, 'Latifa', 'Isnaini', '89765476', 'latifa@yahoo.com', 'mulyorejo 2 nomor 40', 'Surabaya', 'Jawa Timur', '98867', 1, '2020-04-04 16:54:49', '2020-04-25 01:10:16', NULL),
(5, 'Made', 'Devi', '85627675232', 'devi@gmail.com', 'Seruji, patrang nomor 60', 'Jember', 'Indonesia', '12876', 1, '2020-05-11 22:17:43', '2020-05-11 22:17:43', NULL),
(6, 'Putu', 'Cindy', '81227367361', 'cindy@gmail.com', 'Perum Indah Sari Block B2 Nomor 5', 'Bekasi', 'Indonesia', '19892', 1, '2020-05-11 22:19:35', '2020-05-11 22:19:35', NULL),
(7, 'Mario', 'Haryono', '8972631623', 'mario@gmail.com', 'Perum Sekar Indah Block A2 Nomor 10', 'Bekasi', 'Indonesia', '19273', 1, '2020-05-11 22:21:11', '2020-05-11 22:21:11', NULL),
(8, 'Leona', 'Fujiwara', '81773672634', 'leonaimoet@gmail.com', 'Perum Sekar Indah Block B2 Nomor 9', 'Jakarta', 'Indonesia', '10131', 1, '2020-05-11 22:32:51', '2020-05-11 22:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_03_23_001707_create_customers_table', 1),
(3, '2020_03_23_002010_create_users_table', 1),
(4, '2020_03_23_002051_create_categories_table', 1),
(5, '2020_03_23_002111_create_products_table', 1),
(6, '2020_03_23_002127_create_sales_table', 1),
(7, '2020_03_23_002148_create_sales_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` double NOT NULL,
  `explanation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_price`, `product_stock`, `explanation`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Indomie goreng', 4000, 30, NULL, 1, '2020-04-25 00:03:12', '2020-04-25 00:03:12', NULL),
(2, 1, 'Samyang', 22000, 15, NULL, 1, '2020-04-25 00:03:30', '2020-04-25 00:03:30', NULL),
(3, 2, 'Pocari Sweat', 6000, 20, NULL, 1, '2020-04-25 00:03:49', '2020-04-25 00:03:49', NULL),
(4, 2, 'Nu green tea', 5000, 25, NULL, 1, '2020-04-25 00:04:22', '2020-04-25 00:04:22', NULL),
(5, 3, 'Hoodie Peach', 180000, 5, 'Limited Edition', 1, '2020-04-25 00:04:41', '2020-04-25 01:09:49', NULL),
(6, 1, 'Indomie kuah', 4000, 20, NULL, 1, '2020-05-03 21:56:18', '2020-05-03 21:56:18', NULL),
(7, 1, 'Samyang keju manis', 25000, 5, 'New Product', 1, '2020-05-03 21:57:09', '2020-05-03 21:57:09', NULL),
(8, 4, 'Hoodie Blue', 185000, 20, NULL, 1, '2020-05-03 21:58:30', '2020-05-11 03:24:37', NULL),
(9, 1, 'Samyang kuah', 23000, 10, NULL, 1, '2020-05-03 21:59:33', '2020-05-03 21:59:33', NULL),
(10, 2, 'Nu green tea honey', 6000, 25, NULL, 1, '2020-05-03 22:00:15', '2020-05-03 22:00:15', NULL),
(11, 3, 'Dress Polka Navy', 210000, 10, NULL, 1, '2020-05-11 22:24:26', '2020-05-11 22:24:26', NULL),
(12, 3, 'Kaos U Neck', 45000, 30, NULL, 1, '2020-05-11 22:25:37', '2020-05-11 22:25:37', NULL),
(13, 3, 'Cardigan Polos', 150000, 25, NULL, 1, '2020-05-11 22:27:35', '2020-05-11 22:27:35', NULL),
(14, 3, 'Daster Santuy', 30000, 35, NULL, 1, '2020-05-11 22:28:28', '2020-05-11 22:28:28', NULL),
(15, 4, 'Jaket Jeans', 320000, 13, NULL, 1, '2020-05-11 22:29:07', '2020-05-11 22:29:07', NULL),
(16, 4, 'Celana Pendek', 85000, 20, NULL, 1, '2020-05-11 22:29:42', '2020-05-11 22:29:42', NULL),
(17, 4, 'Jaket Kain', 195000, 20, NULL, 1, '2020-05-11 22:30:34', '2020-05-11 22:30:34', NULL),
(18, 4, 'Kaos Santuy', 45000, 40, NULL, 1, '2020-05-11 22:31:18', '2020-05-11 22:31:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `nota_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nota_date` date NOT NULL,
  `total_payment` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`nota_id`, `customer_id`, `user_id`, `nota_date`, `total_payment`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('S042001', 2, 1, '2020-04-27', 25600, 1, '2020-04-26 21:34:03', '2020-04-26 21:34:53', NULL),
('S042002', 1, 1, '2020-04-27', 180000, 1, '2020-04-26 21:35:52', '2020-04-26 21:35:52', NULL),
('S042003', 4, 1, '2020-04-27', 10000, 1, '2020-04-26 21:36:05', '2020-04-26 21:36:05', NULL),
('S052001', 2, 1, '2020-05-04', 10000, 1, '2020-05-03 21:53:51', '2020-05-03 21:53:51', NULL),
('S052002', 3, 1, '2020-05-04', 12000, 1, '2020-05-03 22:16:37', '2020-05-03 22:16:37', NULL),
('S052003', 4, 1, '2020-05-11', 34000, 1, '2020-05-11 00:53:27', '2020-05-11 00:53:27', NULL),
('S052004', 3, 1, '2020-05-11', 740000, 1, '2020-05-11 05:21:38', '2020-05-11 05:21:38', NULL),
('S052005', 5, 1, '2020-01-11', 387000, 1, '2020-05-11 22:34:54', '2020-05-11 22:34:54', NULL),
('S052006', 7, 1, '2020-02-14', 375000, 1, '2020-05-11 22:43:54', '2020-05-11 22:43:54', NULL),
('S052007', 8, 1, '2020-03-27', 240000, 1, '2020-05-11 22:45:49', '2020-05-11 22:45:49', NULL),
('S052008', 6, 1, '2020-04-23', 320000, 1, '2020-05-11 22:48:03', '2020-05-11 22:48:03', NULL),
('S052009', 5, 1, '2020-05-12', 171000, 1, '2020-05-11 22:49:18', '2020-05-11 22:49:18', NULL),
('S052010', 8, 1, '2020-05-12', 10000, 1, '2020-05-12 03:29:16', '2020-05-12 03:29:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `nota_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `selling_price` double NOT NULL,
  `discount` double NOT NULL,
  `total_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`nota_id`, `product_id`, `quantity`, `selling_price`, `discount`, `total_price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('S042001', 1, 2, 4000, 0, 8000, 1, '2020-04-26 21:34:03', '2020-04-26 21:34:53', NULL),
('S042001', 2, 1, 22000, 4400, 17600, 1, '2020-04-26 21:34:03', '2020-04-26 21:34:53', NULL),
('S042002', 5, 1, 180000, 0, 180000, 1, '2020-04-26 21:35:52', '2020-04-26 21:35:52', NULL),
('S042003', 4, 2, 5000, 0, 10000, 1, '2020-04-26 21:36:05', '2020-04-26 21:36:05', NULL),
('S052001', 1, 1, 4000, 0, 4000, 1, '2020-05-03 21:53:51', '2020-05-03 21:53:51', NULL),
('S052001', 3, 2, 6000, 6000, 6000, 1, '2020-05-03 21:53:51', '2020-05-03 21:53:51', NULL),
('S052002', 1, 3, 4000, 6000, 6000, 1, '2020-05-03 22:16:37', '2020-05-03 22:16:37', NULL),
('S052002', 10, 1, 6000, 0, 6000, 1, '2020-05-03 22:16:37', '2020-05-03 22:16:37', NULL),
('S052003', 2, 1, 22000, 0, 22000, 1, '2020-05-11 00:53:27', '2020-05-11 00:53:27', NULL),
('S052003', 10, 2, 6000, 0, 12000, 1, '2020-05-11 00:53:27', '2020-05-11 00:53:27', NULL),
('S052004', 8, 4, 185000, 0, 740000, 1, '2020-05-11 05:21:39', '2020-05-11 05:21:39', NULL),
('S052005', 11, 2, 210000, 168000, 252000, 1, '2020-05-11 22:34:54', '2020-05-11 22:34:54', NULL),
('S052005', 12, 3, 45000, 0, 135000, 1, '2020-05-11 22:34:54', '2020-05-11 22:34:54', NULL),
('S052006', 7, 1, 25000, 0, 25000, 1, '2020-05-11 22:43:54', '2020-05-11 22:43:54', NULL),
('S052006', 14, 1, 30000, 0, 30000, 1, '2020-05-11 22:43:54', '2020-05-11 22:43:54', NULL),
('S052006', 15, 1, 320000, 0, 320000, 1, '2020-05-11 22:43:54', '2020-05-11 22:43:54', NULL),
('S052007', 1, 3, 4000, 0, 12000, 1, '2020-05-11 22:45:49', '2020-05-11 22:45:49', NULL),
('S052007', 2, 3, 22000, 0, 66000, 1, '2020-05-11 22:45:49', '2020-05-11 22:45:49', NULL),
('S052007', 6, 3, 4000, 0, 12000, 1, '2020-05-11 22:45:49', '2020-05-11 22:45:49', NULL),
('S052007', 13, 1, 150000, 0, 150000, 1, '2020-05-11 22:45:49', '2020-05-11 22:45:49', NULL),
('S052008', 1, 5, 4000, 0, 20000, 1, '2020-05-11 22:48:03', '2020-05-11 22:48:03', NULL),
('S052008', 11, 1, 210000, 0, 210000, 1, '2020-05-11 22:48:03', '2020-05-11 22:48:03', NULL),
('S052008', 12, 2, 45000, 0, 90000, 1, '2020-05-11 22:48:03', '2020-05-11 22:48:03', NULL),
('S052009', 3, 1, 6000, 0, 6000, 1, '2020-05-11 22:49:19', '2020-05-11 22:49:19', NULL),
('S052009', 12, 3, 45000, 0, 135000, 1, '2020-05-11 22:49:19', '2020-05-11 22:49:19', NULL),
('S052009', 14, 1, 30000, 0, 30000, 1, '2020-05-11 22:49:18', '2020-05-11 22:49:18', NULL),
('S052010', 4, 2, 5000, 0, 10000, 1, '2020-05-12 03:29:17', '2020-05-12 03:29:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` decimal(12,0) NOT NULL,
  `password` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `job_status`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nyoman', 'Erlina', 'nyom@gmail.com', '812767263', 'nyoman09', 'Administrator', 1, '2020-03-22 22:14:25', '2020-04-05 17:30:21', NULL),
(2, 'Aziz', 'Alhaqi', 'alhaqi@gmail.com', '857253521', 'haqi1234', 'Product Manager', 1, '2020-03-22 22:17:01', '2020-04-05 17:30:21', NULL),
(3, 'Icha', 'Nisya', 'ichaa@gmail.com', '89765646', 'ichaaa89', 'Cashier', 1, '2020-03-24 00:16:47', '2020-04-05 17:30:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`nota_id`,`product_id`),
  ADD KEY `sales_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `sales` (`nota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
