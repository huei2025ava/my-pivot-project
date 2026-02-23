-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-02-23 06:11:57
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `snoopy`
--

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_23_073459_create_ai_artworks_table', 1),
(5, '2026_01_07_071305_create_products_table', 1),
(6, '2026_01_14_061256_create_cloths_table', 1),
(7, '2026_01_28_064925_add_role_to_users_table', 1),
(8, '2026_02_05_011403_create_orders_table', 2),
(9, '2026_02_05_011512_create_order_items_table', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(16, 680.00, 'pending', '2026-02-10 23:46:07', '2026-02-10 23:46:07'),
(17, 1530.00, 'pending', '2026-02-10 23:59:45', '2026-02-10 23:59:45');

-- --------------------------------------------------------

--
-- 資料表結構 `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(32, 16, 1, 1, 290.00, '2026-02-10 23:46:07', '2026-02-10 23:46:07'),
(33, 16, 2, 1, 390.00, '2026-02-10 23:46:07', '2026-02-10 23:46:07'),
(34, 17, 1, 1, 290.00, '2026-02-10 23:59:45', '2026-02-10 23:59:45'),
(35, 17, 2, 1, 390.00, '2026-02-10 23:59:45', '2026-02-10 23:59:45'),
(36, 17, 12, 1, 850.00, '2026-02-10 23:59:45', '2026-02-10 23:59:45');

-- --------------------------------------------------------

--
-- 資料表結構 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `stock`, `created_at`, `updated_at`) VALUES
(1, '奧拉夫達摩藍色零錢包', 290.00, 'oblue.jpg', 8, '2026-02-04 18:07:29', '2026-02-10 23:59:45'),
(2, 'SNOOPY 冰淇淋造型吊飾', 390.00, '1770270772_rK4KK.jpg', 8, '2026-02-04 18:07:29', '2026-02-10 23:59:45'),
(3, 'OLAF 冰淇淋造型吊飾', 390.00, '1770270778_EidqL.jpg', 10, '2026-02-04 18:07:29', '2026-02-10 22:16:46'),
(4, '史努比卡其色斜背小包', 550.00, 'syebag.jpg', 10, '2026-02-04 18:07:29', '2026-02-10 22:07:50'),
(5, '史努比黑色斜背小包', 550.00, 'ssbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(6, '奧拉夫軍綠色斜背小包', 550.00, 'sgrebag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(7, '史努比大頭造型抱枕', 980.00, 'snake.jpg', 10, '2026-02-04 18:07:29', '2026-02-10 22:05:58'),
(8, '史努比粉色手提麻布袋', 420.00, 'sbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(9, 'SNOOPY 經典手提麻布袋', 420.00, 'sbigbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(10, 'OLAF 經典手提麻布袋', 420.00, 'obag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(11, '史努比與奧拉夫條紋提袋', 720.00, 'allbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(12, '史努比黃色保溫杯', 850.00, 'yecup.jpg', 9, '2026-02-04 18:07:29', '2026-02-10 23:59:45'),
(13, '奧拉夫米色保溫杯', 850.00, 'ocup.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(14, '史努比彩色條紋大提袋', 680.00, 'scolorbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-04 18:07:29'),
(15, '奧拉夫彩色條紋大提袋', 680.00, 'ocolorbag.jpg', 10, '2026-02-04 18:07:29', '2026-02-10 22:07:50'),
(16, 'OLAF', 990.00, '1770270803_fpFRf.png', 10, '2026-02-04 21:53:23', '2026-02-10 22:17:23');

-- --------------------------------------------------------

--
-- 資料表結構 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eNdjLA0PyVXLTrCloMKylvUKHEGIXQx7wq1xKd2O', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTFJwUU93bjVQbmhtbXVJVmhNY3duY0E4RWRuTWFjMVk0VGJ5MGtDeCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0IjtzOjU6InJvdXRlIjtzOjEwOiJjYXJ0LmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6Mzp7aToxO2E6NDp7czo0OiJuYW1lIjtzOjMwOiLlpafmi4nlpKvpgZTmkanol43oibLpm7bpjKLljIUiO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6InByaWNlIjtzOjY6IjI5MC4wMCI7czozOiJpbWciO3M6OToib2JsdWUuanBnIjt9aTo1O2E6NDp7czo0OiJuYW1lIjtzOjI3OiLlj7Lliqrmr5Tpu5HoibLmlpzog4zlsI/ljIUiO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6InByaWNlIjtzOjY6IjU1MC4wMCI7czozOiJpbWciO3M6OToic3NiYWcuanBnIjt9aTo2O2E6NDp7czo0OiJuYW1lIjtzOjMwOiLlpafmi4nlpKvou43ntqDoibLmlpzog4zlsI/ljIUiO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6InByaWNlIjtzOjY6IjU1MC4wMCI7czozOiJpbWciO3M6MTE6InNncmViYWcuanBnIjt9fX0=', 1770796807),
('vk3f6VqaNFlOsCF0ZfkCckqKVKCx6qqfz6vTrnEY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnlmWTQyclk1N05ZUkhqVTFIaHppeTFRQlIxY09GZ0NvbkVBVmphdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0IjtzOjU6InJvdXRlIjtzOjEwOiJjYXJ0LmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e2k6ODthOjQ6e3M6NDoibmFtZSI7czozMDoi5Y+y5Yqq5q+U57KJ6Imy5omL5o+Q6bq75biD6KKLIjtzOjg6InF1YW50aXR5IjtpOjE7czo1OiJwcmljZSI7czo2OiI0MjAuMDAiO3M6MzoiaW1nIjtzOjg6InNiYWcuanBnIjt9fX0=', 1770790573);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2026-02-04 18:07:29', '$2y$12$G5vXfBkXWjKpUP4O3FCxi.hYifeQaVZPTkZva1kdUDgIkaUgOL3wq', 'zVYK96iMpkCs20LcdN2cbgUPNr0lmvHWVyGOO5zr3Q6foq51f03gO2BvJNSe', '2026-02-04 18:07:29', '2026-02-04 18:07:29');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- 資料表索引 `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
