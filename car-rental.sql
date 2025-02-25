-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 03:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'X-Trail', 'Nissan', '2023', 2022, 'SUV', 3500.00, 1, 'car_images/PdaOBo3nsRnyXnNpOSevjfcpNFy3SJoAV7S1p8FD.webp', '2025-02-17 13:45:38', '2025-02-23 05:45:56', 'ongoing'),
(2, 'Fortuner', 'Toyota', '2024', 2023, 'SUV', 5000.00, 1, 'car_images/e7MZ4gPKohS4aTfDhU0JHtwuvxyruQAnAOmZ7PE1.webp', '2025-02-17 13:47:11', '2025-02-23 05:47:09', NULL),
(3, 'Tucson', 'Hyundai', '2022', 2022, 'SUV', 4000.00, 0, 'car_images/Keq5q6OIe9S5Ckp2aXfHcpxIBEqs58TH2yzr7U18.webp', '2025-02-17 13:56:34', '2025-02-23 05:48:39', NULL),
(5, 'Sportage', 'Kia', '2023', 2023, 'SUV', 4500.00, 1, 'car_images/sQpnUXujsocfFje2YvxuKiA62NSqMKFSDMMeOKUC.jpg', '2025-02-17 14:28:48', '2025-02-25 05:08:38', NULL),
(6, 'Santa Fe', 'Hyundai', '2023', 2023, 'SUV', 4500.00, 1, 'car_images/cc2j6ARi8Rq1s7hTIyGDA8tn95zuyPTGt7ICUfrf.png', '2025-02-17 15:11:19', '2025-02-25 08:11:56', NULL),
(7, 'Corolla Altis', 'Toyota', '2023', 2022, 'Sedan', 3000.00, 0, 'car_images/EBwATr1xdnOAtQ4bcxATZdhqG5oSdS4EFzZbjWMU.jpg', '2025-02-17 15:15:06', '2025-02-23 05:55:42', NULL),
(8, 'Elantra', 'Hyundai', '2024', 2023, 'Sedan', 3200.00, 0, 'car_images/bViicTQxp1FqgwSRLyN2asciAyPso7gUCfGmvFIl.avif', '2025-02-17 15:16:00', '2025-02-23 05:58:41', NULL),
(10, 'Cerato', 'Kia', '2023', 2023, 'Sedan', 3100.00, 0, 'car_images/WOwHdDYsUiqPWnOzF3zXFN1NgYNcoYI8vs8UNkqQ.jpg', '2025-02-17 15:18:21', '2025-02-23 06:01:47', NULL),
(13, 'Camry', 'Toyota', '2023', 2003, 'Sedan', 3500.00, 1, 'car_images/JQ8KxFWwodcWRoI2aqja33NU8RQROx7gzZP1lKHP.avif', '2025-02-17 15:50:43', '2025-02-23 06:06:08', NULL),
(14, 'Yaris', 'Toyota', '2022', 2022, 'Hatchback', 2500.00, 1, 'car_images/YUknxmnQKWGlTBNupQczTFF35RP4sijkGsNHc3Lv.webp', '2025-02-17 15:51:29', '2025-02-23 06:07:20', NULL),
(15, 'i20', 'Hyundai', '2023', 2023, 'Hatchback', 2600.00, 1, 'car_images/blK9Zmg7dAX4sUdcpOJBraCeVM0z8FiqydblQkbF.jpg', '2025-02-17 15:52:16', '2025-02-23 06:08:41', NULL),
(16, 'Micra', 'Nissan', '2022', 2022, 'Hatchback', 2400.00, 1, 'car_images/4oTN3aa4kMx5LDchzlVxcgRyu5tOrkSarIoyLZlr.jpg', '2025-02-17 15:53:02', '2025-02-23 06:10:02', NULL),
(24, 'Rio', 'Kia', '2024', 2023, 'Hatchback', 2700.00, 1, 'car_images/JzKt4oXLGaL85ZOF2XrpJmKqlAXml86SGXiuuwpd.avif', '2025-02-17 15:58:13', '2025-02-23 06:12:06', NULL),
(25, 'Hilux', 'Toyota', '2024', 2023, 'Pickup', 6000.00, 1, 'car_images/0In3uzuaamjPKVcCvISNE0AE7oFNxpoc8xQLqdbv.jpg', '2025-02-17 15:59:29', '2025-02-23 06:14:58', NULL),
(27, 'Frontier', 'Nissan', '2023', 2023, 'Pickup', 5800.00, 1, 'car_images/zQCGfvCm0MyPUsIEb3jesogiHYXmtYypNPJHaEsH.jpg', '2025-02-17 16:08:26', '2025-02-23 06:16:34', NULL),
(28, 'Santa Cruz', 'Hyundai', '2022', 2022, 'Pickup', 5700.00, 0, 'car_images/ljfRMR7UyPtjsLg1SFcIHVlmROo97MCDs2eGQeha.jpg', '2025-02-17 16:18:59', '2025-02-23 06:18:14', NULL),
(29, 'Ranger', 'Ford', '2024', 2023, 'Pickup', 6200.00, 0, 'car_images/dyuN0i715ax99a8xeGOO7looRBUWtbenhXNUuMQW.jpg', '2025-02-17 21:48:05', '2025-02-23 06:20:07', NULL),
(30, 'D-Max', 'Isuzu', '2023', 2023, 'Pickup', 5900.00, 0, 'car_images/c6fJ7QCSpKWDbhp61H6KguqzuiNosZZsvNeRtnFa.avif', '2025-02-17 22:26:17', '2025-02-23 06:21:57', NULL),
(31, 'Seltos', 'Kia', '2023', 2023, 'SUV', 4300.00, 1, 'car_images/PkPaVSCQfgVt2O41RHAfWvK4Vt1LpdEbeLxaZZtf.jpg', '2025-02-17 22:30:58', '2025-02-25 08:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_16_142352_add_role_to_users_table', 1),
(6, '2025_02_17_182312_create_cars_table', 2),
(7, '2025_02_20_160131_create_rentals_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` enum('pendding','ongoing','completed','canceled') NOT NULL DEFAULT 'pendding',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(26, 2, 3, '2025-02-24', '2025-02-28', 16000.00, 'pendding', '2025-02-23 06:50:05', '2025-02-23 06:50:05'),
(28, 2, 5, '2025-02-24', '2025-02-26', 9000.00, 'pendding', '2025-02-23 06:52:37', '2025-02-23 06:52:37'),
(29, 2, 3, '2025-02-24', '2025-02-27', 12000.00, 'pendding', '2025-02-23 07:08:15', '2025-02-23 07:08:15'),
(30, 2, 25, '2025-02-23', '2025-02-28', 30000.00, 'pendding', '2025-02-23 07:08:55', '2025-02-23 07:08:55'),
(31, 3, 15, '2025-02-23', '2025-02-28', 13000.00, 'pendding', '2025-02-23 07:09:38', '2025-02-23 07:09:38'),
(35, 2, 16, '2025-02-24', '2025-02-27', 7200.00, 'pendding', '2025-02-24 05:06:01', '2025-02-24 05:06:01'),
(38, 2, 13, '2025-02-25', '2025-02-27', 7000.00, 'ongoing', '2025-02-24 05:12:42', '2025-02-25 08:19:38'),
(51, 1, 31, '2025-02-25', '2025-02-28', 12900.00, 'completed', '2025-02-25 08:34:31', '2025-02-25 08:36:06'),
(52, 1, 27, '2025-02-25', '2025-03-01', 23200.00, 'ongoing', '2025-02-25 08:34:52', '2025-02-25 08:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phone`, `address`) VALUES
(1, 'Mohammad Didarul Islam', 'didarul1981@gmail.com', NULL, '$2y$10$uDI4BXcRJBQakV6B.C/foeoBqVXOuZKTjBxFoUXBp8yfFS8exKEL6', NULL, '2025-02-16 09:04:58', '2025-02-16 09:04:58', 'customer', NULL, NULL),
(2, 'didarul admin', 'didarul1981admin@gmail.com', NULL, '$2y$10$3gQB/o0qaymxO73zeoE0Z./wgxh7OEn4LCMloIjzeEb7b4yIBOBv6', NULL, '2025-02-17 04:16:55', '2025-02-17 04:16:55', 'admin', NULL, NULL),
(3, 'test1981', 'test1981@mailinator.com', NULL, '$2y$10$E9lS1re2y1m5iTPdeuLCn.KMasSbe1wFRe86BEkARIeOoqRcdMTE.', NULL, '2025-02-19 06:12:42', '2025-02-19 08:55:46', 'customer', '1981', 'ddddd1981'),
(4, 'Veronica Pacheco', 'zukohatoq@mailinator.com', NULL, '$2y$10$l0GswcAB7qIIvt9zm4PesOxjvhs7QIoPWOSbsqLnxhavt16yzEK0K', NULL, '2025-02-19 06:27:22', '2025-02-19 06:27:22', 'customer', '+1 (376) 808-3134', 'Eos sunt iste aut au'),
(11, 'Penelope Gill', 'vadofyj@mailinator.com', NULL, '$2y$10$I.QU6sMAvPDDDMqHaK9fceNeNVt6xY4NxP9mE58WVKkVrpECpjDgG', NULL, '2025-02-24 23:29:30', '2025-02-24 23:29:30', 'customer', NULL, NULL),
(12, 'didarul20000', 'didarul20000@gmail.com', NULL, '$2y$10$URl8bTT7S3fiRS9YgWxpWODeYjs0dGZ92KDSSS3rCJApjQajQSNcW', NULL, '2025-02-24 23:37:12', '2025-02-24 23:37:12', 'customer', NULL, NULL),
(13, 'Simone Avery', 'gefukunyq@mailinator.com', NULL, '$2y$10$fsjcHfnrzePzvVpDsDU9ye79k/alWM/qqRILf1Jb.G3m.b4ch6CEu', NULL, '2025-02-24 23:59:19', '2025-02-24 23:59:19', 'customer', '+1 (349) 327-4466', 'Illo deleniti duis a'),
(14, 'Diana Christian', 'sequtyj@mailinator.com', NULL, '$2y$10$vwIcHYNTQrqpXpnpFJ6qGe/4Ulg79VCpkSY/dGPr/1XHaQflmQEmy', NULL, '2025-02-25 00:03:47', '2025-02-25 00:03:47', 'customer', '+1 (728) 387-3677', 'Corporis dolor asper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
