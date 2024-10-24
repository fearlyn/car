-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_kembali` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` decimal(10,0) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_kembali`, `tgl_bayar`, `total_bayar`, `status`) VALUES
(1, 14, '2024-10-23', '1000000', 'belum lunas'),
(2, 14, '2024-10-23', '100000', 'lunas'),
(3, 9, '2024-10-23', '6575300', 'lunas'),
(4, 12, '2024-10-23', '100', 'lunas'),
(5, 2, '2024-10-22', '100', 'lunas'),
(6, 12, '2024-10-24', '100', 'lunas'),
(7, 4, '2024-10-24', '100', 'lunas'),
(8, 17, '2024-10-24', '100', 'lunas'),
(9, 18, '2024-10-25', '400', 'lunas'),
(10, 20, '2024-10-27', '400', 'lunas'),
(11, 21, '2024-10-25', '300', 'lunas'),
(12, 22, '2024-10-25', '600', 'lunas'),
(13, 19, '2024-10-25', '600', 'lunas'),
(14, 9, '2024-10-25', '400', 'lunas'),
(15, 23, '2024-10-25', '800', 'lunas'),
(16, 26, '2024-10-24', '700', 'lunas'),
(17, 26, '2024-10-24', '600', 'lunas'),
(18, 26, '2024-10-24', '700', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi_mobil` text NOT NULL,
  `denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_transaksi`, `tgl_kembali`, `kondisi_mobil`, `denda`) VALUES
(1, 13, '2024-10-22', 'oke', '10000'),
(2, 13, '2024-10-23', 'ljhnuhjk', '100000'),
(3, 3, '2024-10-23', 'oke', '10000000'),
(4, 3, '2024-10-23', 'oke', '0'),
(5, 9, '2024-10-25', 'oke', '400'),
(6, 23, '2024-10-24', 'oke', '200');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `nik` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`nik`, `nama`, `jk`, `telp`, `alamat`, `user`, `pass`) VALUES
(0, 'oo', 'P', '0000', 'ooo', 'oo', '$2y$10$y7ss6SOaqcHAVZYRmgx3HegP3Ic5Z.v6PxaBen6OO2Tp7arYzeJL.'),
(22, 'member', 'L', 'p', 'p', 'member', '$2y$10$TUEXdSNBPo6UNJwYdkdUL.Uxs6Vc/dnnJYotPj8rC3rdG4CmAyUKK'),
(66, 'rrrrr', 'L', '756754', 'ehgjgh', 'rr', '$2y$10$PZ4EZiOFTJ9MJFRa3aQ46.eA3tqXoH17lXnBO6WOheu6tBUm0F9qm'),
(333, 'user', 'P', '1', '1', 'user', '$2y$10$FoKb64Go9UzKhXvtB1V/jeqyM1j7s/CAnd9YBAPh4SMTDnJqifijG'),
(555, 'early cc', 'P', '0423847238', 'yg', 'early', '$2y$10$6sNEbejPT8x6R6kzhO6YXu5s43nDGGX7u709qb8k6a3fvZ888wHwq'),
(999, 'vv', 'P', '665467457', 'yy', 'yy', '$2y$10$eIGTpd46q7.yFweJtrhypuKdK51Xkat9fkqHl1rgt8PQ1LFrI986C'),
(1212, 'rr', 'P', '75675474574', 'gggggg', 'rr', '$2y$10$fEH8BEgkxqyrj/Z631J0n.chuJlIZ.F6mNcUpjxk4ybMPLfMD.fX2'),
(11111, 'user', 'L', '2', '1', 'user', '$2y$10$6PUa1iVIULItwFpWg9ctIuG0VodHAxHOeXQp.r8pOBezln5thBFXC'),
(87654321, 'brl', 'P', '6546356', 'rrrr', 'brl', '$2y$10$YOckqBfIPXWyzHgVRNUTU.jjNZjngNIjyHbHmLxx7.hhde5ZOQ9OO'),
(2147483647, 'dddd', 'L', '65463623', 'f fb', 'dd', '$2y$10$QNLhltIRoRTq3K0jIEhjquH3.H8cSR7riSX4dOghteE31BN.1oy4.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `nopol` varchar(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tahun` text NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('tersedia','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`nopol`, `brand`, `type`, `tahun`, `harga`, `foto`, `status`) VALUES
('B 74238 ET', 'BMW', 'R4', '2019', '500', 'BMW 4.jpg', 'tersedia'),
('B 9857 KJ', 'FORTUNER', 'G254', '2013', '300', 'fortuner.jpg', 'tersedia'),
('B 3849 FH', 'MERCEDES', 'AMG GT63s', '2024', '800', 'Mercedes -AMG GT63s.jpg', 'tersedia'),
('B 7673 KL', 'MASEHATI', 'MC 20', '2021', '500', 'Maserati MC 20.jpg', 'tersedia'),
('aa 7384 gs', 'TOYATA ', 'RAIZE', '2018', '400', 'toyata raize.jpg', 'tersedia'),
('B 5489 JD', 'BMW', 'R3', '2021', '700', 'BMW R3.jpg', 'tersedia'),
('AA 7353 MB', 'xpander ', 'D34', '2020', '100', 'xpander.jpg', 'tersedia'),
('H  7756 UJ', 'AUDI', 'R8', '2011', '500', 'audi r8.jpg', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nopol` varchar(225) NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `supir` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `downpayment` decimal(10,0) NOT NULL,
  `kekurangan` decimal(10,0) NOT NULL,
  `status` enum('booking','approve','ambil','kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nik`, `nopol`, `tgl_booking`, `tgl_ambil`, `tgl_kembali`, `supir`, `total`, `downpayment`, `kekurangan`, `status`) VALUES
(11, 54321, 'AA 4353 ar', '2024-10-23', '2024-10-24', '2024-10-26', 0, 100, '50', '50', 'approve'),
(18, 7890, 'AA 4353 ar', '2024-10-24', '2024-10-25', '2024-10-26', 0, 300, '150', '150', 'kembali'),
(20, 123, 'B 5475 DA', '2024-10-24', '2024-10-24', '2024-10-26', 0, 300, '200', '100', 'kembali'),
(25, 111, 'aa 7384 gs', '2024-10-24', '2024-10-25', '2024-10-27', 0, 800, '500', '300', 'ambil'),
(26, 900, 'B 74238 ET', '2024-10-24', '2024-10-24', '2024-10-24', 0, 700, '500', '200', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `level` enum('admin','petugas','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user`, `pass`, `level`) VALUES
(1, 'admin', '$2y$10$Typ5q3bARsSYlNSGzpxd2Ovb51mhC4Eu6bdBE62vZkkTOKf78cnGa', 'admin'),
(2, 'petugas', '$2y$10$Typ5q3bARsSYlNSGzpxd2Ovb51mhC4Eu6bdBE62vZkkTOKf78cnGa', 'petugas'),
(3, 'admin', '$2y$10$9Mg.f.uGVv2J1zj7caRaS.IWgvlo5OVYUOxuRGlglCyWWdVowx7g2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
