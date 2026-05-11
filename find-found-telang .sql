-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Bulan Mei 2026 pada 11.55
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `find-found-telang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'Dokumen & Dompet'),
(3, 'Aksesoris & Perhiasan'),
(4, 'Pakaian'),
(5, 'Hewan Peliharaan'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_postingan`
--

CREATE TABLE `laporan_postingan` (
  `id` int NOT NULL,
  `postingan_id` int NOT NULL,
  `pelapor_id` int NOT NULL,
  `alasan` enum('penipuan','spam','lainnya') COLLATE utf8mb4_general_ci NOT NULL,
  `status_laporan` enum('menunggu','ditinjau','ditolak','disetujui') COLLATE utf8mb4_general_ci DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_postingan`
--

INSERT INTO `laporan_postingan` (`id`, `postingan_id`, `pelapor_id`, `alasan`, `status_laporan`, `created_at`) VALUES
(1, 1, 2, 'spam', 'ditinjau', '2026-05-09 16:43:54'),
(2, 3, 1, 'lainnya', 'menunggu', '2026-05-09 16:43:54'),
(3, 4, 5, 'penipuan', 'ditolak', '2026-05-09 16:43:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `kode_postingan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_laporan` enum('hilang','temuan') COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `lokasi_spesifik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('aktif','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id`, `user_id`, `kategori_id`, `kode_postingan`, `jenis_laporan`, `judul`, `deskripsi`, `tanggal_kejadian`, `lokasi_spesifik`, `file_path`, `status`, `created_at`) VALUES
(1, 1, 1, 'PST001', 'hilang', 'Laptop Asus Hilang', 'Laptop Asus Vivobook warna silver hilang di area kampus.', '2026-05-01', 'Kampus Telang Bangkalan', 'laptop.jpg', 'selesai', '2026-05-09 16:43:39'),
(2, 2, 2, 'PST002', 'temuan', 'Dompet Ditemukan', 'Ditemukan dompet hitam berisi KTP dan ATM.', '2026-05-03', 'Parkiran Kampus', 'dompet.jpg', 'aktif', '2026-05-09 16:43:39'),
(3, 3, 5, 'PST003', 'hilang', 'Kucing Persia Hilang', 'Kucing Persia warna putih hilang sejak malam.', '2026-05-04', 'Perumahan Telang Indah', 'kucing.jpg', 'selesai', '2026-05-09 16:43:39'),
(4, 4, 4, 'PST004', 'temuan', 'Jaket Hitam Ditemukan', 'Menemukan jaket hitam di kantin.', '2026-05-05', 'Kantin Kampus', 'jaket.jpg', 'aktif', '2026-05-09 16:43:39'),
(5, 5, 3, 'PST005', 'hilang', 'Gelang Perak Hilang', 'Gelang perak hilang saat acara seminar.', '2026-05-06', 'Aula Kampus', 'gelang.jpg', 'selesai', '2026-05-09 16:43:39'),
(7, 1, 6, NULL, 'hilang', 'saya', 'saya hilang', '2026-05-12', 'bangkalan', '6a0099a1e5666.png', 'selesai', '2026-05-10 14:43:45'),
(8, 1, 5, NULL, 'temuan', 'Sepeda Justin Bieber', 'Tiba tiba nemu', '2026-05-08', 'jauh', '6a009a454ca9b.png', 'aktif', '2026-05-10 14:46:29'),
(9, 1, 5, NULL, 'temuan', 'Anjing Kamu', 'Kamu Anjing nya Anjing', '2026-05-11', 'Timur Telang', '6a0194f339be2.jpg', 'aktif', '2026-05-11 08:36:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_pilihan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `whatsapp`, `password`, `lokasi_pilihan`, `foto_profil`, `created_at`) VALUES
(1, 'M. Fatihul Umam', 'fatihulumam1617@gmail.com', '085645304501', '$2y$10$lRDKZmKzcMx.bNXh14qH/udxkNHyVfZv/nX3yWFhCpsEIItz0bMQC', 'bangkalan', '69feff8dec544.png', '2026-05-09 06:41:13'),
(2, 'Umam', 'umam@gmail.com', '777', '$2y$10$1yTfVIzBzP7at5llFLHfz.fFiExApJ98xaGGAAxaYB17Th4.h6YnG', NULL, NULL, '2026-05-09 06:53:49'),
(3, 'udin', 'udin123@gmail.com', '000111222333', '$2y$10$4qx9KULGhzOOw2.ItmkTFehjONaKFuiRuKhNmb/UROIqwoM2bLV8e', NULL, NULL, '2026-05-09 08:53:22'),
(4, 'Aziz Huzaini', 'aziz123@gmail.com', '0009998887777', '$2y$10$M2aXEstK0PP8hfp5W7So.u17U9FaeZ4XUbJAxFOnHjykPQduaRh7m', NULL, NULL, '2026-05-09 08:54:57'),
(5, 'yanto bayu', 'yanto123@gmail.com', '000111999222', '$2y$10$u9J/yz.oqA4zTbpfB24OXepy1mby/bwYXSt/Suzsiai.9Y7gn.fTW', NULL, NULL, '2026-05-09 08:56:00'),
(6, 'byan noval', 'byan123@gmail.com', '0009991118888', '$2y$10$0NrNlfeLHFmt9RLRmCDWxuRfRJxTHsk87iZibJCSooGop/yUMkxSa', NULL, NULL, '2026-05-09 08:57:00'),
(7, 'Evan', 'evan123@gmail.com', '000999222888', '$2y$10$Lq/QWJYVnCIT87fe7jxpqu7a68x2awgNhGYUOWIs6/FS74pzryb8i', NULL, NULL, '2026-05-09 08:58:34');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_postingan`
--
ALTER TABLE `laporan_postingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postingan_id` (`postingan_id`),
  ADD KEY `pelapor_id` (`pelapor_id`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laporan_postingan`
--
ALTER TABLE `laporan_postingan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_postingan`
--
ALTER TABLE `laporan_postingan`
  ADD CONSTRAINT `laporan_postingan_ibfk_1` FOREIGN KEY (`postingan_id`) REFERENCES `postingan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_postingan_ibfk_2` FOREIGN KEY (`pelapor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `postingan_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
