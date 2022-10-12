-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 06:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_demo_konter`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_bolu` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_bolu`, `stok`, `harga_beli`, `harga_jual`, `diskon`, `ppn`, `keterangan`) VALUES
(193, 'Charger', 9, 15000, 20000, 0, 0, '-'),
(194, 'Kabel Data Type-C', 4, 20000, 25000, 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `barang_backup`
--

CREATE TABLE `barang_backup` (
  `id_backup` int(11) NOT NULL,
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `merk_hp` varchar(100) NOT NULL,
  `tipe_hp` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal`, `id_barang`, `jumlah`, `keterangan`) VALUES
(22, '2022-10-13', 193, 10, 'test'),
(23, '2022-10-13', 194, 5, '-');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id_cash` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `pemasukan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id_cash`, `tanggal`, `keterangan`, `pemasukan`, `pengeluaran`, `catatan`) VALUES
(33, '2022-10-13', 'Beli Charger sebanyak 10', NULL, 150000, '-'),
(34, '2022-10-13', 'Beli Kabel Data Type-C sebanyak 5', NULL, 100000, '-'),
(35, '2022-10-13', 'Modal Awal', 5000000, NULL, '-'),
(36, '2022-10-13', 'Penjualan || T-221013-1', 45000, NULL, '-');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_total` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `harga_total`, `keterangan`) VALUES
('T-221013-1', '2022-10-13', 45000, 'Rama');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` varchar(10) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_barang`, `jumlah`, `harga_beli`, `harga_jual`, `diskon`, `harga_subtotal`) VALUES
(32, 'T-221013-1', 194, 1, 20000, 25000, 0, 25000),
(33, 'T-221013-1', 193, 1, 15000, 20000, 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `no_hp`, `role`) VALUES
(1, 'admin', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'administrator', 'admin@admin.com', '089123123123', 1),
(2, 'pegawai', '$2y$10$x2dZc/HNrBo.3bQiwi5bU.cUmZeasueW55YYH3vuTMGHcyMwEPoGK', 'TEST', 'test@email.com', '089', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_backup`
--
ALTER TABLE `barang_backup`
  ADD PRIMARY KEY (`id_backup`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id_cash`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `barang_backup`
--
ALTER TABLE `barang_backup`
  MODIFY `id_backup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id_cash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
