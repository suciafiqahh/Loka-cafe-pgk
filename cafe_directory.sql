-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Des 2025 pada 11.58
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `cafe_directory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@gmail.com|::1', 'i:1;', 1763991241),
('laravel-cache-admin@gmail.com|::1:timer', 'i:1763991241;', 1763991241),
('laravel-cache-admin@gmail.com|127.0.0.1', 'i:2;', 1764137346),
('laravel-cache-admin@gmail.com|127.0.0.1:timer', 'i:1764137346;', 1764137346),
('laravel-cache-user@cafe.com|::1', 'i:1;', 1763991417),
('laravel-cache-user@cafe.com|::1:timer', 'i:1763991417;', 1763991417);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cafes`
--

CREATE TABLE `cafes` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_cafe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `maps_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fasilitas` json DEFAULT NULL,
  `foto_utama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cafes`
--

INSERT INTO `cafes` (`id`, `nama_cafe`, `alamat`, `jam_buka`, `deskripsi`, `maps_link`, `fasilitas`, `foto_utama`, `created_at`, `updated_at`) VALUES
(1, 'Feel Coffee', 'Jl. H, Jl. Abdullah Addari Jl. Linggarjati No.1, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33121', '08:00 - 00:00', 'We Serve You Mood To Feelin Goods', 'https://maps.app.goo.gl/pRVd3eoNKhAtSqFR8', NULL, 'cafes/sEkM27i1KdZerXdLVtbcw8H8J5hhxZoDdwZHX4uD.webp', '2025-11-22 09:54:13', '2025-11-25 23:30:35'),
(15, 'Marvelous Cafe & Resto', 'Jl. Ahmad Yani atas No. 74 ( Depan Masjid H. Abdur Roqiem, Batin Tikal, Kec. Taman Sari, Kepulauan Bangka Belitung', 'Senin-Kamis: 11:00-23.00 Jum\'at-Minggu: 11.00-24:00', 'Menyediakan Coffe, Milk Base, Mocktail, Snack, and Food', 'https://maps.app.goo.gl/yWJt4LzUmN9pV4S59', NULL, 'cafes/mIvwVyCCVmXZOjdx1UPQQ92iQ3e2OjWAPzDd7y1a.jpg', '2025-11-25 07:51:42', '2025-11-25 23:27:25'),
(16, 'Bians Coffe and Eatery', 'Jl. KH Hasan Basri Jl. Kapten Sulaiman Arief No.13, Gedung Nasional, Kec. Taman Sari, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684', '10.00-00.00', 'Every moment has its flavor', 'https://maps.app.goo.gl/HQqp5BHejsiEcB838', NULL, 'cafes/BMtmDtFqfcY9desKUS25K9COrGX2ArNFsn26FGBG.jpg', '2025-11-25 19:25:45', '2025-11-25 23:21:45'),
(17, 'Caveela BakeHouse Coffee Tea Cake', 'Simpang 4 Nasdem, Jl. Delima I, Kelurahan Taman Bunga, Kecamatan Gerunggang, Kota, Jl. Stania Jl. Bukit Baru, Taman Bunga, Kec. Gerunggang, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33123', '08:00-22:00', 'So tasty in every served', 'https://maps.app.goo.gl/sNkkbc36bMMV5UBb9', NULL, 'cafes/oaXPMnpzFJe07rloIAtuCacuVH8kitP07xAWiB3D.jpg', '2025-11-25 23:39:00', '2025-11-25 23:39:00'),
(19, 'Serasee Coffee', 'Jl. Merdeka, Batin Tikal, Kec. Taman Sari, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684', '07.00-24.00', 'Pastry, Food, Coffe, Music', 'https://maps.app.goo.gl/R2tVBY61SXJaneR18', NULL, 'cafes/N3mx0PulzFZVOXPk7jMxCh5q21tBxFcU4UgmGPVT.jpg', '2025-12-05 04:38:56', '2025-12-05 04:39:31'),
(20, 'D.VAL CAFE', 'Jl. Ahmad Yani No.56, Batin Tikal, Kec. Taman Sari, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684', '07.00-23.00', 'Socialize & Thrive', 'https://maps.app.goo.gl/5tkvu69zJvXbbBgY8', NULL, 'cafes/tPxsS6O6xzAXApjgq6NIMse9HbjLyK0Jal8yRmKU.jpg', '2025-12-05 04:49:01', '2025-12-05 04:49:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_22_151006_create_cafes_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O5xxzioPE0ogS82sW4HyBKwLvJUeogHeXcY1RB2Y', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieGJLbVJJSk5qdHhXeTR2VXIzcVZyeGo1amF0RWJDN2hnM2gzVjI0ZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2thLWNhZmUtcGdrLnRlc3QvYWRtaW4vY2FmZXMvMS9lZGl0IjtzOjU6InJvdXRlIjtzOjEwOiJjYWZlcy5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764935810);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@cafe.com', NULL, '$2y$12$/Zvndy10WvC0GVb7Si/w/e1VbBKvqhxCJMrXTs/zrLKfp9sKantF2', 'admin', '3tIJQJYrEoxaHiWuHSXCmQ2889Ilz30oJR0XgYHA0QmiElgrvScxNLM16k83', '2025-11-22 05:22:59', '2025-11-22 05:22:59'),
(2, 'Pengguna Biasa', 'user@gmail.com', NULL, '$2y$12$1AKsZeqMW.WjHYjw8SkNC.FSy3EnJrnMZEYUepvo/Nlc83aBKsCKC', 'user', 'hoJpCwcYUfYZbdZWglqQdVzT9j69FaojD1a5Wl6MwKgsHCDOLUez9SsoF4wo', '2025-11-22 05:22:59', '2025-11-22 05:22:59');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cafes`
--
ALTER TABLE `cafes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
