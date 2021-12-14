-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2021 at 09:17 AM
-- Server version: 8.0.26
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_uki`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftargajis`
--

CREATE TABLE `daftargajis` (
  `id` bigint UNSIGNED NOT NULL,
  `pegawais_id` bigint UNSIGNED NOT NULL,
  `jabatan_lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_baru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` bigint NOT NULL,
  `tunjangan_jabatan` bigint NOT NULL,
  `tunjangan_kesejahteraan_keluarga` bigint NOT NULL,
  `total_gaji` bigint NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berkala_gaji` date NOT NULL,
  `disetujui` enum('belum','sudah','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `diteruskan` enum('sudah','belum') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `jumlah_hari_kerja` int NOT NULL,
  `jumlah_presensi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftargajis`
--
ALTER TABLE `daftargajis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftargajis`
--
ALTER TABLE `daftargajis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
