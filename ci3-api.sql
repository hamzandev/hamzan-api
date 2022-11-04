-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 10:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3-api`
--
CREATE DATABASE IF NOT EXISTS `ci3-api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci3-api`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi_barang` varchar(20) NOT NULL,
  `lokasi_barang` varchar(100) NOT NULL,
  `kondisi_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `spesifikasi_barang`, `lokasi_barang`, `kondisi_barang`, `jumlah_barang`, `sumber_dana`, `jenis_barang`, `keterangan`) VALUES
('BRG001', 'Buku Paket', 'Terpopuler', 'Perpustakaan', 'Baru', 100, 'APBD', 'Buku', 'Buku pembelajaran siswa'),
('brg002', 'Barang Baruuu', 'Baik', 'Rumah', 'Setangah Baru', 200, 'APBN', 'Unknown', '-'),
('BRG004', 'Spidol Snowman Hitam', 'Spidol papan putih', 'Ruang TU', 'Baru', 100, 'APBN', 'Alat Tulis Guru', 'Setiap guru berhak mendapatkan maksimal 3 spidol dalam 1 bulan.'),
('BRGPGPS01281', 'Penghapus papan', '1 buah', 'Ruang Kelas', 'Lama', 1, 'Sekolah', 'Alat Sekolah', 'Setiap ruang kelas hanya berhak mendapatkan 1 penghapus papan dalam kurun waktu tertentu.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(5) NOT NULL,
  `kepanjangan_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`, `kepanjangan_jurusan`) VALUES
(3, 'RPL', 'Rekayasa Perangkat Lunak'),
(4, 'TKPI', 'Teknik Kapal Penagkap Ikan'),
(5, 'NKPI', 'Nautika Kapal Penangkap Ikan'),
(6, 'DPIB', 'Desain Pemodelan dan Infastruktur Bangunan'),
(7, 'ATPH', 'Agribisnis Tanaman Pangan dan Horikultura'),
(8, 'APHP', 'Agribisnis Pengolahan Hasil Pertanian'),
(9, 'ATR', 'Agribisnis Ternak Ruminansia'),
(10, 'ATU', 'Agribisnis Ternak Unggas'),
(11, 'TITL', 'Teknik Instalasi Tenaga Listrik'),
(12, 'TGP', 'Teknik Geologi dan Pertambangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nisn`, `nama`, `id_kelas`, `id_jurusan`) VALUES
(7, 8126369, 'fikro najiah', 3, 3),
(10, 5682018, 'fanya rahmadiah syarif', 2, 12),
(12, 7891527, 'hamzan wahyudi', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
