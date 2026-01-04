-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 04:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minecape`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `capes`
--

CREATE TABLE `capes` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `capes`
--

INSERT INTO `capes` (`id_item`, `nama_item`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
(1, 'Migrator Cape', 'Cape yang didapat setelah migrasi akun MOJANG ke akun MICROSOFT', 50000, 0, '200px-Migrator_Cape.png'),
(2, 'Zombie Horse Cape', 'Cape yang ditambahkan di game drop Mounts of Mayhem di akhir tahun 2025 dan bisa didapat dengan menyelesaikan event di dalam game', 100000, 5, '200px-Zombie_Horse_Cape_JE.png'),
(3, 'Copper Cape', 'Capes ini ditambahkan ke dalam  game pada update copper age', 150000, 9, 'Copper_Cape_JE.png'),
(5, 'Common Cape', 'Cape umum yang hampir dimiiki oleh semua player', 10000, 20, 'Common_Cape_BE.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `kode_redeem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_item`, `tanggal`, `kode_redeem`) VALUES
(1, 5, 1, '2026-01-04 13:37:34', 'MC-AFACDFFC'),
(2, 5, 1, '2026-01-04 13:59:16', 'MC-6CC8971A'),
(3, 6, 3, '2026-01-04 14:35:06', 'MC-7CA37003'),
(4, 7, 1, '2026-01-04 15:59:17', 'MC-60B4223A'),
(5, 7, 1, '2026-01-04 16:06:52', 'MC-9F7D9421'),
(6, 7, 2, '2026-01-04 16:23:33', 'MC-7B4827B9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `saldo`) VALUES
(6, 'Roni Ibrahim', 'IbrahimRoni@gmail.com', '25f9e794323b453885f5181f1b624d0b', 850000),
(7, 'Andi', 'andi@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `capes`
--
ALTER TABLE `capes`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capes`
--
ALTER TABLE `capes`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `capes` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
