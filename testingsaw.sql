-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2023 at 07:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testingsaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint UNSIGNED NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `id_supplier`, `created_at`, `updated_at`) VALUES
(9, 1, '2023-06-03 08:03:53', '2023-06-03 08:03:53'),
(10, 2, '2023-06-03 08:04:08', '2023-06-03 08:04:08'),
(12, 3, '2023-06-03 08:04:45', '2023-06-03 08:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `alternativescores`
--

CREATE TABLE `alternativescores` (
  `id` bigint UNSIGNED NOT NULL,
  `alternative_id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `rating_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternativescores`
--

INSERT INTO `alternativescores` (`id`, `alternative_id`, `criteria_id`, `rating_id`, `created_at`, `updated_at`) VALUES
(33, 9, 2, 4, '2023-06-03 08:03:53', '2023-06-03 08:03:53'),
(34, 9, 3, 9, '2023-06-03 08:03:53', '2023-06-03 08:03:53'),
(35, 9, 4, 12, '2023-06-03 08:03:53', '2023-06-03 08:03:53'),
(36, 9, 5, 15, '2023-06-03 08:03:53', '2023-06-03 08:03:53'),
(37, 10, 2, 3, '2023-06-03 08:04:08', '2023-06-03 08:04:08'),
(38, 10, 3, 10, '2023-06-03 08:04:08', '2023-06-03 08:04:08'),
(39, 10, 4, 13, '2023-06-03 08:04:08', '2023-06-03 08:04:08'),
(40, 10, 5, 15, '2023-06-03 08:04:08', '2023-06-03 08:04:08'),
(45, 12, 2, 5, '2023-06-03 08:04:45', '2023-06-03 08:04:45'),
(46, 12, 3, 9, '2023-06-03 08:04:45', '2023-06-03 08:04:45'),
(47, 12, 4, 12, '2023-06-03 08:04:45', '2023-06-03 08:04:45'),
(48, 12, 5, 15, '2023-06-03 08:04:45', '2023-06-03 08:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `satuan`, `deskripsi`, `tanggal_produksi`, `tanggal_kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 'minyak', 'liter', 'minyak gorang', '2022-12-02', '2023-12-02', '2023-05-24 09:23:32', '2023-05-24 09:23:32'),
(2, 'Beras', 'kg', 'Beras dengan 5 jenis', '2023-06-03', '2023-06-03', '2023-06-02 19:37:13', '2023-06-02 19:37:13'),
(7, 'tepung', 'kg', 'tepung beras', '1212-12-12', '2002-12-12', '2023-06-03 07:54:34', '2023-06-03 07:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `criteriaratings`
--

CREATE TABLE `criteriaratings` (
  `id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteriaratings`
--

INSERT INTO `criteriaratings` (`id`, `criteria_id`, `rating`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, 0.50, 'KW', '2023-06-03 07:59:38', '2023-06-03 07:59:38'),
(3, 2, 1.00, 'murah', '2023-06-03 07:59:59', '2023-06-03 07:59:59'),
(4, 2, 0.75, 'cukup murah', '2023-06-03 08:00:14', '2023-06-03 08:00:14'),
(5, 2, 0.50, 'mahal', '2023-06-03 08:00:27', '2023-06-03 08:00:27'),
(6, 2, 0.25, 'Sangat Mahal', '2023-06-03 08:00:41', '2023-06-03 08:00:41'),
(7, 3, 1.00, 'Sangat Cepat', '2023-06-03 08:00:59', '2023-06-03 08:00:59'),
(8, 3, 0.75, 'Cepat', '2023-06-03 08:01:09', '2023-06-03 08:01:09'),
(9, 3, 0.50, 'Cukup Cepat', '2023-06-03 08:01:25', '2023-06-03 08:01:25'),
(10, 3, 0.25, 'Lambat', '2023-06-03 08:01:33', '2023-06-03 08:01:33'),
(11, 4, 1.00, 'Sangat Baik', '2023-06-03 08:01:45', '2023-06-03 08:01:45'),
(12, 4, 0.75, 'Cukup Baik', '2023-06-03 08:01:57', '2023-06-03 08:01:57'),
(13, 4, 0.50, 'Baik', '2023-06-03 08:02:38', '2023-06-03 08:02:38'),
(14, 4, 0.25, 'Cukup Baik', '2023-06-03 08:02:54', '2023-06-03 08:02:54'),
(15, 5, 1.00, 'Original', '2023-06-03 08:03:30', '2023-06-03 08:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `criteriaweights`
--

CREATE TABLE `criteriaweights` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('benefit','cost') COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteriaweights`
--

INSERT INTO `criteriaweights` (`id`, `name`, `type`, `weight`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Harga', 'cost', 0.30, 'Penting', '2023-06-03 07:57:48', '2023-06-03 07:57:48'),
(3, 'Kecepatan Pengiriman', 'benefit', 0.20, 'Cukup Penting', '2023-06-03 07:58:04', '2023-06-03 07:58:04'),
(4, 'pelayanan', 'benefit', 0.10, 'Tidak Terlalu Penting', '2023-06-03 07:58:21', '2023-06-03 07:58:21'),
(5, 'Kualitas', 'benefit', 0.40, 'Sangat Penting', '2023-06-03 07:59:02', '2023-06-03 07:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ridhopapua14@gmail.com', 'EEEEEE CRUD ELIT, SAW SULIT begete', '2023-05-24 09:24:43', '2023-06-02 08:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_30_045911_create_barang_table', 1),
(7, '2023_04_30_050200_create_supplier_table', 1),
(8, '2023_05_02_034911_create_riwayat_pembelian_table', 1),
(9, '2023_05_03_074041_create_alternatives_table', 1),
(10, '2023_05_03_074138_create_criteriaweights_table', 1),
(11, '2023_05_03_074223_create_criteriaratings_table', 1),
(12, '2023_05_03_074332_create_alternativescores_table', 1),
(13, '2023_05_20_095337_create_testimoni_table', 1),
(14, '2023_05_23_075551_create_feedback_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('it@gmail.com', '$2y$10$TQdnYhKkBu1tteSGKnDR5us2yPgRKqKwQdGnjRnAwtZkokLgzoF0W', '2023-06-02 08:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pembelian`
--

CREATE TABLE `riwayat_pembelian` (
  `id` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_barang` int NOT NULL,
  `harga_satuan` decimal(12,2) NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Supplier A', 'jl.yaaa', '123', '2023-05-24 08:14:59', '2023-05-24 08:14:59'),
(2, 'Supplier B', 'jl.ajadulu', '456', '2023-05-24 08:15:06', '2023-05-24 08:15:06'),
(3, 'Supplier C', 'jl.kemana gitu', '789', '2023-05-24 08:15:13', '2023-05-24 08:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_barang`, `id_supplier`, `rating`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'BAGUS BANGET CUY', '2023-05-24 09:24:11', '2023-05-24 09:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'it', 'it@gmail.com', NULL, 0, '$2y$10$lVGvcx5yfMGeAMAbS4XCIeiVob46DkYNIP1wMfC7nXXhejkeG9U..', NULL, '2023-06-03 07:53:32', '2023-06-03 07:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `alternativescores`
--
ALTER TABLE `alternativescores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternativescores_alternative_id_foreign` (`alternative_id`),
  ADD KEY `alternativescores_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternativescores_rating_id_foreign` (`rating_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteriaratings_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `criteriaweights`
--
ALTER TABLE `criteriaweights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
-- Indexes for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pembelian_id_barang_foreign` (`id_barang`),
  ADD KEY `riwayat_pembelian_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimoni_id_barang_foreign` (`id_barang`),
  ADD KEY `testimoni_id_supplier_foreign` (`id_supplier`);

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
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alternativescores`
--
ALTER TABLE `alternativescores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `criteriaweights`
--
ALTER TABLE `criteriaweights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `alternativescores`
--
ALTER TABLE `alternativescores`
  ADD CONSTRAINT `alternativescores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`),
  ADD CONSTRAINT `alternativescores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteriaweights` (`id`),
  ADD CONSTRAINT `alternativescores_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `criteriaratings` (`id`);

--
-- Constraints for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  ADD CONSTRAINT `criteriaratings_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteriaweights` (`id`);

--
-- Constraints for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD CONSTRAINT `riwayat_pembelian_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `riwayat_pembelian_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `testimoni_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
