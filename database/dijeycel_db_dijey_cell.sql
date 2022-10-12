-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2020 at 08:37 PM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dijeycel_db_dijey_cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `merk_hp` varchar(100) NOT NULL,
  `tipe_hp` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_barang_masuk`, `merk_hp`, `tipe_hp`, `harga_beli`, `keterangan`) VALUES
(7, 0, 'Vivo Y15 4/64', 'Vivo Y15 4/64', 1600, 'Imei: 2898'),
(8, 0, 'Vivo Y83 4/32', 'Vivo Y83 4/32', 1100, 'Imei: 5679\r\nUnit+Carger'),
(12, 0, 'Samsung A01', 'Samsung A01', 1000, 'Imei :5749'),
(13, 0, 'Samsung A11', 'Samsung A11', 1550, 'Imei:6638'),
(19, 0, 'Oppo A5 2020', 'Oppo A5 2020', 1750, 'Om dodi'),
(23, 0, 'Oppi A1k', 'Oppo A1k', 1150, 'Imei:6419'),
(25, 0, 'Samsung A10', 'Samsung A10', 1050, 'Hp+cas'),
(26, 0, 'Vivo Y30 4/128', 'Vivo Y30 4/128', 2075, 'Imei:2037'),
(33, 0, 'Oppo A5s 2/32', 'Oppo A5s 2/32', 1300, 'Imei:3111'),
(34, 0, 'Oppo A3s', 'Oppo A3s', 1100, 'Imei:4255'),
(35, 0, 'Samsung a10', 'Samsung A10', 1000, 'Imei:4864\r\nUnit only'),
(40, 0, 'Oppo K3', 'Oppo K3', 2000, 'fullset'),
(41, 0, 'vivo Y12 3/32', 'vivo Y12 3/32', 1450, 'Imei:5836'),
(42, 0, 'Oppo A9 2020', 'Oppo A9 2020', 2350, 'imei:4810'),
(54, 59, 'Vivo Y12 3/32', 'Vivo Y12 3/32', 1400, 'imei:1852'),
(56, 61, 'Samsung A10s', 'Samsung A10s', 1200, 'imei:7469'),
(57, 62, 'Oppo A3s', 'Oppo A3s', 1050, 'imei: 5992'),
(61, 66, 'Vivo Y12', 'Vivo Y12', 1425, 'imei:1878'),
(64, 69, 'Vivo V15', 'Vivo V15', 2150, 'imei:3031'),
(65, 70, 'Samsung J4', 'Samsung J4', 700, 'imei:3397'),
(67, 72, 'Oppo A1k', 'Oppo A1k', 1100, 'imei8878'),
(68, 73, 'Samsung M20', 'Samsung M20', 1350, 'imei:3014'),
(70, 75, 'Oppo F9', 'Oppo F9', 1550, 'imei:8792'),
(72, 77, 'Samsung M20', 'Samsung M20', 1250, 'imei:5814 casan'),
(73, 78, 'Mi A1', 'Mi A1', 1150, 'imei:3842'),
(74, 79, 'Vivo Y12i', 'Vivo Y12i', 1450, 'imei 9890'),
(75, 80, 'Oppo A5s', 'Oppo a5s', 1300, 'imie 4735'),
(76, 81, 'redmi 5a', 'Redmi 5a', 700, 'imei 5302');

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

--
-- Dumping data for table `barang_backup`
--

INSERT INTO `barang_backup` (`id_backup`, `id_barang_keluar`, `id_barang_masuk`, `id_barang`, `merk_hp`, `tipe_hp`, `harga_beli`, `keterangan`) VALUES
(5, 26, 0, 27, 'Realme C11', 'Realme C11', 1300, 'Imei:7531'),
(6, 27, 0, 43, 'hotwav k2', 'hotwav k2', 500, 'imei:8934'),
(7, 28, 0, 29, 'Oppo a5s', 'Oppo a5s', 1400, 'Imei:7197'),
(8, 29, 0, 17, 'Redmi 8a pro', 'Redmi 8a pro', 1150, 'Imei:6398'),
(9, 30, 0, 28, 'Oppo A5s', 'Opo A5s', 1400, 'Imei:4937'),
(10, 31, 0, 39, 'Realme 3', 'Realme 3', 1350, 'Fullset'),
(11, 32, 64, 59, 'Oppo A1k', 'Oppo A1k', 700, 'Imei:6292'),
(12, 33, 57, 52, 'Oppo A5 2020', 'Oppo A5 2020', 1750, 'imei:8458'),
(13, 34, 65, 60, 'vivo Y93', 'vivo y93', 1200, 'imei:1121'),
(14, 35, 67, 62, 'Realme 5', 'Realme 5', 1550, 'imei: 2274'),
(15, 36, 58, 53, 'Realme C2 3/32', 'Realme C2 3/32', 1200, 'imei: 1016'),
(16, 37, 0, 5, 'Vivo Y93', 'Vivo Y93', 1250, 'Imei : 2179'),
(17, 38, 0, 21, 'Realme C1 2/16', 'Realme C1 2/16', 1000, 'Imei:0356'),
(18, 39, 0, 31, 'Oppo A92', 'Oppo A92', 2800, 'Imei:3214'),
(19, 40, 68, 63, 'Samsung M20', 'Samsung M20', 1350, 'imei:1324'),
(20, 41, 71, 66, 'hotwave', 'hotwave', 600, 'imei: 0980'),
(21, 42, 63, 58, 'Oppo A3s', 'Oppo A3s', 1100, 'imei:2951'),
(22, 43, 74, 69, 'Redmi 9', 'Redmi 9', 1530, 'imei:6007'),
(23, 44, 0, 11, 'Samsung A10s', 'Samsung A10s', 1150, 'Imei:6665\r\nUnit only'),
(24, 45, 76, 71, 'MI A2 Lite', 'MI A2 Lite', 950, 'imei:0097'),
(25, 46, 60, 55, 'Oppo A1k', 'Oppo A1k', 1150, 'imei:6419'),
(26, 47, 10, 4, 'Vivo Y30', 'Vivo Y30 New', 2250, 'Imei : 9838');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `merk_hp` varchar(100) NOT NULL,
  `tipe_hp` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang_masuk`, `tanggal`, `merk_hp`, `tipe_hp`, `harga_beli`, `harga_jual`, `keterangan`) VALUES
(6, 0, '2020-10-19', 'Oppo A37', 'Oppo A37', 650, 700, 'Imei:1176\r\nUnit+Carger'),
(7, 0, '2020-10-19', 'Vivo Y15 4/64', 'Vivo Y15', 1600, 1800, 'Imei: 8059'),
(8, 0, '2020-10-20', 'Realme C15', 'Realme C15', 1800, 1900, 'Imei:3796'),
(9, 0, '2020-10-20', 'Samsung M20', 'Samsung M20', 1350, 1450, 'Imei:3014'),
(10, 0, '2020-10-21', 'Redmi Note 5 pro', 'Redmi note 5 pro', 1100, 1200, 'Imei:5241'),
(11, 0, '2020-10-21', 'Oppo A1k', 'Oppo a1k', 1150, 1150, 'Om Asep'),
(12, 0, '2020-10-21', 'Realme 3', 'Realme 3 3/32', 1350, 1500, 'Imei: 2793'),
(13, 0, '2020-10-21', 'Samsung A10s', 'Samsung A10s', 1300, 1300, 'Imei :8579'),
(14, 0, '2020-10-21', 'Vivo Y91c', 'Vivo Y91c', 1050, 1100, 'Imei:8218\r\nUnit+Carger'),
(15, 0, '2020-10-21', 'Oppo A3s', 'Oppo a3s', 1100, 1150, 'Imei:1295'),
(16, 0, '2020-10-21', 'Vivo Y12 3/54', 'Vivo Y12 3/64', 1350, 1400, 'Imei :9459\r\nUnit+Carger'),
(17, 0, '2020-10-22', 'Oppo A3s', 'Oppo A3s', 1125, 1200, 'imei:6152'),
(18, 0, '2020-10-23', 'Realme C15', 'Realme C15', 1800, 2000, 'imei:3956'),
(19, 0, '2020-10-23', 'Realme C15', 'Realme C15', 1800, 1900, 'imei:0795'),
(20, 0, '2020-10-24', 'Resmi Note 7', 'Redmi Note 7', 1600, 1700, 'Imei:5702'),
(26, 0, '2020-10-24', 'Realme C11', 'Realme C11', 1300, 1350, 'Imei:7531'),
(27, 0, '2020-10-24', 'hotwav k2', 'hotwav k2', 500, 750, 'imei:8934'),
(28, 0, '2020-10-25', 'Oppo a5s', 'Oppo a5s', 1400, 1500, 'Imei:7197'),
(29, 0, '2020-10-25', 'Redmi 8a pro', 'Redmi 8a pro', 1150, 1300, 'Imei:6398'),
(30, 0, '2020-10-25', 'Oppo A5s', 'Opo A5s', 1400, 1450, 'Imei:4937'),
(31, 0, '2020-10-26', 'Realme 3', 'Realme 3', 1350, 1500, 'Fullset'),
(32, 64, '2020-10-26', 'Oppo A1k', 'Oppo A1k', 700, 1150, 'Imei:6292'),
(33, 57, '2020-10-26', 'Oppo A5 2020', 'Oppo A5 2020', 1750, 1850, 'imei:8458'),
(34, 65, '2020-10-27', 'vivo Y93', 'vivo y93', 1200, 1250, 'imei:1121'),
(35, 67, '2020-10-27', 'Realme 5', 'Realme 5', 1550, 1700, 'imei: 2274'),
(36, 58, '2020-10-27', 'Realme C2 3/32', 'Realme C2 3/32', 1200, 1300, 'imei: 1016'),
(37, 0, '2020-10-27', 'Vivo Y93', 'Vivo Y93', 1250, 1350, 'Imei : 2179'),
(38, 0, '2020-10-27', 'Realme C1 2/16', 'Realme C1 2/16', 1000, 1150, 'Imei:0356'),
(39, 0, '2020-10-27', 'Oppo A92', 'Oppo A92', 2800, 2950, 'Imei:3214'),
(40, 68, '2020-10-28', 'Samsung M20', 'Samsung M20', 1350, 1450, 'imei:1324'),
(41, 71, '2020-10-28', 'hotwave', 'hotwave', 600, 700, 'imei: 0980'),
(42, 63, '2020-10-28', 'Oppo A3s', 'Oppo A3s', 1100, 1200, 'imei:2951'),
(43, 74, '2020-10-28', 'Redmi 9', 'Redmi 9', 1530, 1700, 'imei:6007'),
(44, 0, '2020-10-28', 'Samsung A10s', 'Samsung A10s', 1150, 1250, 'Imei:6665\r\nUnit only'),
(45, 76, '2020-10-28', 'MI A2 Lite', 'MI A2 Lite', 950, 1100, 'imei:0097'),
(46, 60, '2020-10-28', 'Oppo A1k', 'Oppo A1k', 1150, 1300, 'imei:6419'),
(47, 10, '2020-10-29', 'Vivo Y30', 'Vivo Y30 New', 2250, 2400, 'Imei : 9838');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `merk_hp` varchar(100) NOT NULL,
  `tipe_hp` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal`, `merk_hp`, `tipe_hp`, `harga_beli`, `keterangan`) VALUES
(10, '2020-10-18', 'Vivo Y30', 'Vivo Y30 New', 2250, 'Imei : 9838'),
(11, '2020-10-18', 'Vivo Y93', 'Vivo Y93', 1250, 'Imei : 2179'),
(12, '2020-10-18', 'Vivo Y15 4/64', 'Vivo Y15', 1600, 'Imei: 8059'),
(13, '2020-10-18', 'Vivo Y15 4/64', 'Vivo Y15 4/64', 1600, 'Imei: 2898'),
(14, '2020-10-18', 'Vivo Y83 4/32', 'Vivo Y83 4/32', 1100, 'Imei: 5679\r\nUnit+Carger'),
(15, '2020-10-18', 'Vivo Y12 3/54', 'Vivo Y12 3/64', 1350, 'Imei :9459\r\nUnit+Carger'),
(16, '2020-10-18', 'Samsung A10s', 'Samsung A10s', 1300, 'Imei :8579'),
(17, '2020-10-18', 'Samsung A10s', 'Samsung A10s', 1150, 'Imei:6665\r\nUnit'),
(18, '2020-10-18', 'Samsung A01', 'Samsung A01', 1000, 'Imei :5749'),
(19, '2020-10-18', 'Samsung A11', 'Samsung A11', 1550, 'Imei:6638'),
(20, '2020-10-18', 'Realme 3', 'Realme 3 3/32', 1350, 'Imei: 2793'),
(21, '2020-10-18', 'Oppo A3s', 'Oppo a3s', 1100, 'Imei:1295'),
(22, '2020-10-18', 'Redmi Note 5 pro', 'Redmi note 5 pro', 1100, 'Imei:5241'),
(23, '2020-10-18', 'Redmi 8a pro', 'Redmi 8a pro', 1150, 'Imei:6398'),
(24, '2020-10-18', 'Oppo A1k', 'Oppo a1k', 1150, 'Om Asep'),
(25, '2020-10-18', 'Oppo A5 2020', 'Oppo A5 2020', 1750, 'Om dodi'),
(26, '2020-10-18', 'Vivo Y91c', 'Vivo Y91c', 1050, 'Imei:8218\r\nUnit+Carger'),
(27, '2020-10-18', 'Realme C1 2/16', 'Realme C1 2/16', 1000, 'Imei:0356'),
(28, '2020-10-18', 'Samsung M20', 'Samsung M20', 1350, 'Imei:3014'),
(29, '2020-10-19', 'Oppi A1k', 'Oppo A1k', 1150, 'Imei:6419'),
(30, '2020-10-19', 'Oppo A37', 'Oppo A37', 650, 'Imei:1176\r\nUnit+Carger'),
(31, '2020-10-20', 'Samsung A10', 'Samsung A10', 1050, 'Hp+cas'),
(32, '2020-10-20', 'Vivo Y30 4/128', 'Vivo Y30 4/128', 2075, 'Imei:2037'),
(33, '2020-10-20', 'Realme C11', 'Realme C11', 1300, 'Imei:7531'),
(34, '2020-10-20', 'Oppo A5s', 'Opo A5s', 1400, 'Imei:4937'),
(35, '2020-10-20', 'Oppo a5s', 'Oppo a5s', 1400, 'Imei:7197'),
(36, '2020-10-20', 'Realme C15', 'Realme C15', 1800, 'Imei:3796'),
(37, '2020-10-20', 'Oppo A92', 'Oppo A92', 2800, 'Imei:3214'),
(38, '2020-10-20', 'Resmi Note 7', 'Redmi Note 7', 1600, 'Imei:5702'),
(39, '2020-10-20', 'Oppo A5s 2/32', 'Oppo A5s 2/32', 1300, 'Imei:3111'),
(40, '2020-10-20', 'Oppo A3s', 'Oppo A3s', 1100, 'Imei:4255'),
(41, '2020-10-20', 'Samsung a10', 'Samsung A10', 1000, 'Imei:4864\r\nUnit only'),
(42, '2020-10-22', 'Oppo A3s', 'Oppo A3s', 1125, 'imei:6152'),
(43, '2020-10-22', 'Realme C15', 'Realme C15', 1800, 'imei:3956'),
(44, '2020-10-22', 'Realme C15', 'Realme C15', 1800, 'imei:0795'),
(45, '2020-10-23', 'Realme 3', 'Realme 3', 1350, 'Fullset'),
(46, '2020-10-23', 'Oppo K3', 'Oppo K3', 2000, 'fullset'),
(47, '2020-10-24', 'vivo Y12 3/32', 'vivo Y12 3/32', 1450, 'Imei:5836'),
(57, '2020-10-25', 'Oppo A5 2020', 'Oppo A5 2020', 1750, 'imei:8458'),
(58, '2020-10-25', 'Realme C2 3/32', 'Realme C2 3/32', 1200, 'imei: 1016'),
(59, '2020-10-25', 'Vivo Y12 3/32', 'Vivo Y12 3/32', 1400, 'imei:1852'),
(60, '2020-10-25', 'Oppo A1k', 'Oppo A1k', 1150, 'imei:6419'),
(61, '2020-10-25', 'Samsung A10s', 'Samsung A10s', 1200, 'imei:7469'),
(62, '2020-10-25', 'Oppo A3s', 'Oppo A3s', 1050, 'imei: 5992'),
(63, '2020-10-25', 'Oppo A3s', 'Oppo A3s', 1100, 'imei:2951'),
(64, '2020-10-26', 'Oppo A1k', 'Oppo A1k', 700, 'Imei:6292'),
(65, '2020-10-26', 'vivo Y93', 'vivo y93', 1200, 'imei:1121'),
(66, '2020-10-26', 'Vivo Y12', 'Vivo Y12', 1425, 'imei:1878'),
(67, '2020-10-27', 'Realme 5', 'Realme 5', 1550, 'imei: 2274'),
(68, '2020-10-27', 'Samsung M20', 'Samsung M20', 1350, 'imei:1324'),
(69, '2020-10-27', 'Vivo V15', 'Vivo V15', 2150, 'imei:3031'),
(70, '2020-10-28', 'Samsung J4', 'Samsung J4', 700, 'imei:3397'),
(71, '2020-10-28', 'hotwave', 'hotwave', 600, 'imei: 0980'),
(72, '2020-10-28', 'Oppo A1k', 'Oppo A1k', 1100, 'imei8878'),
(73, '2020-10-28', 'Samsung M20', 'Samsung M20', 1350, 'imei:3014'),
(74, '2020-10-28', 'Redmi 9', 'Redmi 9', 1530, 'imei:6007'),
(75, '2020-10-28', 'Oppo F9', 'Oppo F9', 1550, 'imei:8792'),
(76, '2020-10-28', 'MI A2 Lite', 'MI A2 Lite', 950, 'imei:0097'),
(77, '2020-10-29', 'Samsung M20', 'Samsung M20', 1250, 'imei:5814 casan'),
(78, '2020-10-29', 'Mi A1', 'Mi A1', 1150, 'imei:3842'),
(79, '2020-10-29', 'Vivo Y12i', 'Vivo Y12i', 1450, 'imei 9890'),
(80, '2020-10-29', 'Oppo A5s', 'Oppo a5s', 1300, 'imie 4735'),
(81, '2020-10-29', 'redmi 5a', 'Redmi 5a', 700, 'imei 5302');

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
(1, 'admin', '$2y$10$8QYN37Waw/GKLYXWEKFnAOtE765ZBrm1yDaovg1ScyyBzk00yVuWm', 'administrator', 'admin@admin.com', '089123123123', 1),
(2, 'RAGA', '$2y$10$WQNANge479mTYaDqde1pE.4KeFya/M5tZcSpJemHUFfzLjExrKHPe', 'Rama', 'rama@gmail.com', '0891231213', 0),
(3, 'pegawai2', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'Fajar', 'fajar@gmail.com', '0891231', 0);

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
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `barang_backup`
--
ALTER TABLE `barang_backup`
  MODIFY `id_backup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
