-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2026 pada 14.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spektracone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-al@gmail.com|127.0.0.1', 'i:1;', 1777448042),
('laravel-cache-al@gmail.com|127.0.0.1:timer', 'i:1777448042;', 1777448042),
('laravel-cache-ca@gmail.com|127.0.0.1', 'i:1;', 1777448633),
('laravel-cache-ca@gmail.com|127.0.0.1:timer', 'i:1777448633;', 1777448633),
('laravel-cache-panpania@gmail.com|127.0.0.1', 'i:2;', 1777447923),
('laravel-cache-panpania@gmail.com|127.0.0.1:timer', 'i:1777447923;', 1777447923);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyas`
--

CREATE TABLE `karyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `alasan_tolak` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyas`
--

INSERT INTO `karyas` (`id`, `user_id`, `judul`, `kategori`, `deskripsi`, `foto`, `status`, `alasan_tolak`, `created_at`, `updated_at`) VALUES
(16, 9, 'Poster', 'Karya', 'Poster (Kecerdasan Buatan) menampilkan estetika futuristik yang bersih dan canggih, didominasi oleh perpaduan warna biru elektrik, ungu neon, dan putih untuk menciptakan kesan teknologi tinggi dan inovasi tanpa batas. Elemen visual utamanya sering kali berupa simbol-simbol modern seperti jalinan sirkuit digital yang berpendar, ilustrasi otak robot, figur cybernetic, atau visualisasi aliran data masif yang abstrak. Poster ini dirancang untuk membangkitkan rasa ingin tahu dan kekaguman terhadap potensi masa depan teknologi yang cerdas, cepat, dan efisien.', 'karya/D9h4rV0UJd193B2Gh3Z0xNjakF8znCwDsvGg7I1z.png', 'approved', NULL, '2026-04-29 05:36:54', '2026-04-29 05:43:07'),
(17, 10, 'Poster A-K-S-A-R-A', 'Karya', 'Poster Aksara menonjolkan sisi artistik dan filosofis melalui keindahan bentuk huruf tradisional yang dipadukan dengan desain peachy atau palet warna yang ceria untuk menciptakan kesan warisan budaya yang elegan.', 'karya/6Mjqdn0Xzc4bS1PB4Kw6ZXTXp5ftao7DD3QwGbA3.png', 'approved', NULL, '2026-04-29 05:38:58', '2026-04-29 05:43:04'),
(18, 11, 'Bulan Suci Ramadhan', 'Karya', 'Poster Ramadhan berfokus pada atmosfer spiritual yang hangat dengan menggunakan simbol-simbol ikonik seperti bulan sabit, lentera, dan siluet masjid yang biasanya dibalut warna biru malam atau emas untuk menyampaikan pesan kedamaian serta kegembiraan dalam beribadah.', 'karya/ZhIP37jDqbnproKbhi91GzANA36sxURTDxXbAj3p.png', 'approved', NULL, '2026-04-29 05:40:37', '2026-04-29 05:43:02'),
(19, 11, 'SMKN 1 Cimahi Raih Juara Umum FLS3N 2026 Tingkat Kota Cimahi', 'Prestasi', 'SMK Negeri 1 Cimahi kembali menorehkan prestasi membanggakan dalam ajang Festival Lomba Seni dan Sastra Siswa Nasional (FLS3N) Tingkat Kota Cimahi Tahun 2026. Kegiatan ini dilaksanakan pada Kamis, 23 April 2026 bertempat di SMK Negeri 3 Cimahi.\r\n\r\nDalam ajang bergengsi tersebut, tim FLS3N SMKN 1 Cimahi berhasil meraih Juara Umum, dengan perolehan prestasi yang sangat membanggakan di berbagai cabang lomba seni dan sastra.', 'karya/hxgerMv3EjYjsXsg4BxnfZlDDcfnXd7vn6PfDvj5.jpg', 'approved', NULL, '2026-04-29 05:41:42', '2026-04-29 05:42:59'),
(20, 11, 'Siswa SMK Negeri 1 Cimahi Raih Prestasi di ITECH Competition Session 9 AI Playground: Battle of Creators', 'Prestasi', 'Prestasi membanggakan kembali ditorehkan oleh peserta didik SMK Negeri 1 Cimahi. Tim siswa dari jurusan Rekayasa Perangkat Lunak (RPL) berhasil meraih Juara 3 dalam ajang ITECH Competition Session 9: AI Playground – Battle of Creators yang diselenggarakan oleh STMIK LIKMI Bandung, pada Sabtu, 11 April 2026.\r\n\r\nTim SMK Negeri 1 Cimahi yang mewakili sekolah dalam kompetisi tersebut terdiri atas:\r\n\r\nZakii Maulana Maalik – XI RPL C\r\nChagi Rizki Satia – XI RPL C\r\nAlrizky Filardhi Budiman – XI RPL C\r\nKompetisi ini merupakan ajang bergengsi yang mempertemukan para pelajar kreatif dan inovatif untuk menunjukkan kemampuan mereka dalam bidang teknologi kecerdasan buatan (Artificial Intelligence/AI). Melalui tema “AI Playground: Battle of Creators”, para peserta ditantang untuk menciptakan ide, solusi, dan karya inovatif berbasis AI yang relevan dengan perkembangan teknologi masa kini.', 'karya/rAJ5sINmHJCK4RVCU7vfrOS6T2HA9T8xVDtG3UXc.jpg', 'approved', NULL, '2026-04-29 05:42:32', '2026-04-29 05:42:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita', '2026-04-29 04:44:24', '2026-04-29 04:44:24'),
(2, 'Prestasi', '2026-04-29 04:44:24', '2026-04-29 04:44:24'),
(3, 'Karya', '2026-04-29 04:44:24', '2026-04-29 04:44:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_22_062706_create_karyas_table', 1),
(5, '2026_04_27_124027_create_kategoris_table', 1),
(6, '2026_04_28_134905_add_alasan_tolak_to_karyas_table', 2),
(7, '2026_04_28_140455_create_pesans_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `sub_info` varchar(255) DEFAULT NULL,
  `isi_pesan` text NOT NULL,
  `status` enum('unread','read','resolved') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Guru','Siswa') NOT NULL DEFAULT 'Siswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Guru', 'guru@gmail.com', NULL, '$2y$12$/P2yZzaJ6/M5NglGMfCbTeeApdKWvDSJin99aseU.gSIi9qe2eo2G', 'Guru', NULL, '2026-04-29 05:32:09', '2026-04-29 05:32:09'),
(9, 'Laut', 'laut@gmail.com', NULL, '$2y$12$hiZxh4Bs0X4uw1RX80M1r.JZv1Q9f69/gWjQV9yQeIQYp.hltnlM2', 'Siswa', NULL, '2026-04-29 05:33:52', '2026-04-29 05:33:52'),
(10, 'Cahaya', 'cahaya@gmail.com', NULL, '$2y$12$CU/YA3vaNRsv9QeQq2Gpu.arA3AODdXikNR7VXtS4oPz5qjwcCGa.', 'Siswa', NULL, '2026-04-29 05:37:24', '2026-04-29 05:37:24'),
(11, 'Siswa', 'siswa@gmail.com', NULL, '$2y$12$HMaIJa27wFRZOcYFOHF4hu6zmAD3k..Do3LSv2z2l.9J7RRle3mje', 'Siswa', NULL, '2026-04-29 05:39:27', '2026-04-29 05:39:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indeks untuk tabel `karyas`
--
ALTER TABLE `karyas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
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
-- Indeks untuk tabel `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyas`
--
ALTER TABLE `karyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyas`
--
ALTER TABLE `karyas`
  ADD CONSTRAINT `karyas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
