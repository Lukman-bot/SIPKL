-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 10:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lukman_website_si_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_siswa`
--

CREATE TABLE `detail_siswa` (
  `id_detail_siswa` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `ttl` text NOT NULL,
  `nama_orang_tua_wali` varchar(250) NOT NULL,
  `alamat_orang_tua_wali` text NOT NULL,
  `telp_orang_tua_wali` varchar(15) NOT NULL,
  `riwayat_kesehatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_siswa`
--

INSERT INTO `detail_siswa` (`id_detail_siswa`, `id_pengguna`, `nis`, `ttl`, `nama_orang_tua_wali`, `alamat_orang_tua_wali`, `telp_orang_tua_wali`, `riwayat_kesehatan`) VALUES
(3, 9, '123321', 'Bekasi', 'Lukman', 'Banjar', '089510396303', 'Sehat');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id_jenis_pengguna` char(2) NOT NULL,
  `jenis_pengguna` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`id_jenis_pengguna`, `jenis_pengguna`, `keterangan`) VALUES
('11', 'admin', 'Ini role Admin'),
('21', 'siswa', 'Ini role siswa');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `kata_kunci` text NOT NULL,
  `gelar_depan` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `gelar_belakang` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `golongan_darah` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `catatan_kesehatan` varchar(255) DEFAULT NULL,
  `foto_profile` text DEFAULT NULL,
  `id_jenis_pengguna` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `kata_kunci`, `gelar_depan`, `nama_lengkap`, `gelar_belakang`, `jenis_kelamin`, `golongan_darah`, `alamat`, `catatan_kesehatan`, `foto_profile`, `id_jenis_pengguna`) VALUES
(1, 'admin', '$2y$12$7N6Ubn7U/cNl08Y2zGkphO/Ik4NtgS72MVaAyBoVZLpAAn2Wgsi2K', NULL, 'admin', NULL, 'laki-laki', NULL, NULL, NULL, NULL, '11'),
(9, '123321', '$2y$12$/.Zl8JyiIAR6xnLfLHkyi.iKh7HwgDRYZw/kDbcjcoksbOuYFSRcq', NULL, 'Lukman', NULL, 'laki-laki', 'A', 'Tasikmalaya', 'Sehat', NULL, '21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD PRIMARY KEY (`id_detail_siswa`),
  ADD KEY `fk_detail_siswa_pengguna` (`id_pengguna`);

--
-- Indexes for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  ADD PRIMARY KEY (`id_jenis_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `fk_pengguna_jenis_pengguna` (`id_jenis_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  MODIFY `id_detail_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD CONSTRAINT `fk_detail_siswa_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_pengguna_jenis_pengguna` FOREIGN KEY (`id_jenis_pengguna`) REFERENCES `jenis_pengguna` (`id_jenis_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
