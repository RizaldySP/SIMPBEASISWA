-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 07:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpbeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(250) NOT NULL,
  `periode` int(11) NOT NULL,
  `persyaratan` longtext NOT NULL,
  `tanggal_dibuka` date NOT NULL,
  `tanggal_ditutup` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `periode`, `persyaratan`, `tanggal_dibuka`, `tanggal_ditutup`, `status`, `st`) VALUES
(1, 'UKT', 20211, 'KTP dan KK', '2021-12-01', '2021-12-10', 'Dibuka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Sains dan Teknologi'),
(2, 'AKBID');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_fakultas`, `id_prodi`, `foto`, `nim`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `username`, `password`, `st`) VALUES
(1, 1, 1, 'Jabat_Tangan-01-012.jpg', 41202, 'Diska', 'Jombang', '2021-12-09', 'diska', 'b7c12cbbe1ca4299cb8ecc529c14612e956af99b', 1),
(2, 2, 2, NULL, 32323, 'dian', 'jombang', '2021-12-09', 'dian', '06dbf79c9eb722f43ab495cd5f6dc7fcea841e5d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(100) NOT NULL,
  `periode` int(11) NOT NULL,
  `berkas` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `st` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_verifikasi` date DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_mahasiswa`, `nama_beasiswa`, `periode`, `berkas`, `status`, `st`, `tanggal_pengajuan`, `tanggal_verifikasi`, `keterangan`) VALUES
(1, 1, 'UKT', 20211, 'Ujian48.pdf', 'Mendapat Beasiswa', 1, '2021-12-09', '2021-12-09', NULL),
(2, 2, 'UKT', 20211, 'Ujian49.pdf', 'Mendapat Beasiswa', 1, '2021-12-09', '2021-12-09', NULL),
(3, 1, 'UKT', 20211, 'Ujian410.pdf', 'Proses', 1, '2021-12-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Sistem Informasi'),
(2, 2, 'Bidan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_level` varchar(100) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `id_fakultas`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(2, 'BAKM', NULL, 'bakm', '2b4c31aa6ca2e4ff193a7d15078229a1fe16f79d', 'BAKM', '2021-12-07 14:32:48'),
(5, 'Diska Amalia', 1, 'diskaamalia', 'b7c12cbbe1ca4299cb8ecc529c14612e956af99b', 'TUFakultas', '2021-12-07 14:32:26'),
(6, 'rizaldy', 2, 'rizaldy', '109e7f7ef99701b7c4185a715edf843736bf12a4', 'TUFakultas', '2021-12-10 13:20:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
