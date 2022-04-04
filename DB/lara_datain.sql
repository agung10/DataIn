-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2022 at 03:53 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.33-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_datain`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_information`
--

CREATE TABLE `area_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `postal_code` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_information`
--

INSERT INTO `area_information` (`id`, `name`, `address_details`, `phone`, `picture`, `postal_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rukun Warga 001', 'Jalan HM Sabar RT003 RW001, Kelurahan Rambutan, Kecamatan Ciracas, Jakarta Timur', '(021) 8091773', NULL, 13830, 'Aplikasi Pendataan Warga RW 001', '2022-04-04 08:37:13', '2022-04-04 08:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_c_statuses`
--

CREATE TABLE `family_c_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relationship` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_c_statuses`
--

INSERT INTO `family_c_statuses` (`id`, `relationship`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Keluarga', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(2, 'Istri', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(3, 'Anak', '2022-04-04 08:37:13', '2022-04-04 08:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `family_statuses`
--

CREATE TABLE `family_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_statuses`
--

INSERT INTO `family_statuses` (`id`, `f_status`, `created_at`, `updated_at`) VALUES
(1, 'Kakek', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(2, 'Nenek', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(3, 'Ayah', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(4, 'Ibu', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(5, 'Kakak', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(6, 'Adik', '2022-04-04 08:37:12', '2022-04-04 08:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `w_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `w_status`, `created_at`, `updated_at`) VALUES
(1, 'Belum Kawin', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(2, 'Kawin', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(3, 'Cerai Hidup', '2022-04-04 08:37:12', '2022-04-04 08:37:12'),
(4, 'Cerai Mati', '2022-04-04 08:37:12', '2022-04-04 08:37:12');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000001_create_marital_statuses_table', 1),
(3, '2014_10_12_000002_create_family_statuses_table', 1),
(4, '2014_10_12_000003_create_family_c_statuses_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2022_03_28_103620_create_r_t_s_table', 1),
(8, '2022_03_30_162802_create_area_information_table', 1);

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
-- Table structure for table `r_t_s`
--

CREATE TABLE `r_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_t_s`
--

INSERT INTO `r_t_s` (`id`, `number`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(2, '2', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(3, '3', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(4, '4', '2022-04-04 08:37:13', '2022-04-04 08:37:13'),
(5, '5', '2022-04-04 08:37:13', '2022-04-04 08:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marital_id` bigint(20) UNSIGNED DEFAULT NULL,
  `family_id` bigint(20) UNSIGNED DEFAULT NULL,
  `family_c_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kk` bigint(20) DEFAULT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_address` text COLLATE utf8mb4_unicode_ci,
  `house_type` enum('Milik Pribadi','Bukan Milik Pribadi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabilitas` enum('Iya','Tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Administrator','RT','User') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_complete` tinyint(4) NOT NULL DEFAULT '0',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `marital_id`, `family_id`, `family_c_id`, `rt_id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `no_kk`, `nik`, `fullname`, `phone_number`, `place_of_birth`, `date_of_birth`, `gender`, `religion`, `education`, `detail_address`, `house_type`, `disabilitas`, `profession`, `level`, `is_complete`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$.v4vPkDY2A7iZVNC8HbaFuUTtvU5BBw3rv8wAZdoQSAmchnsYH4MS', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Administrator', 0, NULL, NULL, '2022-04-04 08:37:12', '2022-04-04 01:44:48'),
(2, 1, 5, 3, 3, 'Agung', 'agung@gmail.com', NULL, '$2y$10$tFIozaXPI4/dwWixLX4FveLtz.9GXVcw3cZI9cxQJIxiT96lpva0S', NULL, 1111111111111111, 1111111111111111, 'Agung Mubarok', '083192753654', 'Kuningan', '2001-05-08', 'Laki - Laki', 'Islam', 'SMK/MAK', 'Jalan HM Sabar RT003/01, Kel Rambutan, Kec Ciracas, Jakarta Timur', 'Bukan Milik Pribadi', 'Tidak', 'Mahasiswa', 'RT', 1, NULL, NULL, '2022-04-04 01:45:24', '2022-04-04 01:52:45'),
(3, 1, 6, 3, 2, 'Mubarok', 'mubarok@gmail.com', NULL, '$2y$10$nJn7tiYocAp/r3pUpnfjq./Mbf.zdWV4XObEoQ0ur/DDwKr9tZRgS', NULL, 3424211111111111, 3424211111111111, 'Mubarok', '083192753645', 'Jakarta', '2004-04-14', 'Laki - Laki', 'Islam', 'Tidak Sekolah', 'Jalan HM Sabar', 'Bukan Milik Pribadi', 'Tidak', 'Mahasiswa', 'User', 1, NULL, NULL, '2022-04-04 01:49:52', '2022-04-04 01:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_information`
--
ALTER TABLE `area_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_c_statuses`
--
ALTER TABLE `family_c_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_statuses`
--
ALTER TABLE `family_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `r_t_s`
--
ALTER TABLE `r_t_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_t_s_number_unique` (`number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_information`
--
ALTER TABLE `area_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_c_statuses`
--
ALTER TABLE `family_c_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `family_statuses`
--
ALTER TABLE `family_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `r_t_s`
--
ALTER TABLE `r_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
