-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 13.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pengumpulan_tugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) NOT NULL,
  `kodemapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(100) NOT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kodemapel`, `user_id`, `mapel`, `guru`, `kelas_user`, `created_at`, `updated_at`) VALUES
(1, 'TEMA 1', 1020, 'SUB-TEMA 2', 'Yayak Yogi Ginantaka', '2', '2020-11-16 20:34:28', '2020-11-17 00:32:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `mapel_id`, `materi`, `kelas_user`, `created_at`, `updated_at`) VALUES
(53, '1', '1605702150_TUGAS 7.docx', 2, '2020-11-18 05:22:30', '2020-11-18 05:22:30'),
(54, '1', '1605702339_18183207026.pdf', 2, '2020-11-18 05:25:39', '2020-11-18 05:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_19_130754_create_users_table', 2),
(5, '2020_09_20_072208_create_tb_mapel_table', 3),
(6, '2020_09_20_114302_create_materi_table', 4),
(7, '2020_09_20_114318_create_tugas_table', 4),
(8, '2020_09_20_115733_create_tugas_table', 5),
(9, '2020_09_21_124229_create_mapel_table', 6),
(10, '2020_09_21_124443_create_materi_table', 6),
(11, '2020_09_21_124455_create_tugas_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum-dinilai',
  `kelas_user` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `mapel_id`, `namaTugas`, `kelas_user`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 'BHS4', '1602134164_Bentar_bind_kelas4 (copy 1).docx', 4, 1040, '2020-10-07 22:16:04', '2020-10-07 22:16:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `kelas`, `created_at`, `updated_at`) VALUES
(1010, 'Admin', 'admin@gmail.com', NULL, '$2y$10$1bysHgjdIWn9xxeqay/NTeYtEujeW.vTEdaqUTWCFPSkzzxytgNf6', 'Admin', NULL, 0, NULL, '2020-11-18 04:13:16'),
(1020, 'Yayak Yogi', 'yayaktaka@gmail.com', NULL, '$2y$10$Iljly/hVL1KaIxkUln.JTeG2Y9JWMxVqVUC703RIzMZjuPfJny4Zy', 'Guru', NULL, 2, '2020-11-18 04:13:56', '2020-11-18 04:13:56'),
(1070, 'Pranoto', 'pranoto@gmail.com', NULL, '$2y$10$MLXvrtl8reaycfFGfaZY6ejlfy40WK48hpt.pl/0dgMWO7vVse7KK', 'Guru', NULL, 5, '2020-10-03 12:20:12', '2020-11-16 05:52:54'),
(1091, 'Bentar', 'bentar@gmail.com', NULL, '$2y$10$lEC0VvRN5LdqNyn8.AvWM.5qy/rCnimmWUeMZT8jf6s3XfsRcDQTC', 'Guru', NULL, 1, '2020-11-18 06:05:28', '2020-11-18 06:05:28'),
(1093, 'Abel', 'abel@gmail.com', NULL, '$2y$10$KAm0w1ZWX5XraPMNB4i8puHMXl7MCcEtk7hCKyrCFss3NmsJQsV3.', 'Guru', NULL, 4, '2020-11-18 06:06:40', '2020-11-18 06:06:40'),
(1902, 'Taka', 'taka@gmail.com', NULL, '$2y$10$lywvAMCZQkznb2Q7c6kVh.bmgW4O0yzcIb5l.uXYNs/mopCXn3HFi', 'Guru', NULL, 3, '2020-11-18 06:06:06', '2020-11-18 06:06:06'),
(1904, 'Gelish', 'gelish@gmail.com', NULL, '$2y$10$WkiKOFtH/0QWYTJBkCiHL.8ldvWRIfuXA4F49MFwjMShL8pNarjqG', 'Guru', NULL, 6, '2020-11-18 06:07:24', '2020-11-18 06:07:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
