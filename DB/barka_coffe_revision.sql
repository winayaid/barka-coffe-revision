-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 27, 2023 at 07:03 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barka_coffe_revision`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_wa` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `no_wa`, `password`, `foto`, `role`) VALUES
(29, 'Super Admin', 'adminbarka@gmail.com', '', '$2y$10$zgguPPPKXTZAZCztI1sIMuSrw7yABFWjIKAx1BCPVmRlK/o.2l8qS', 'cdb68fdb3528d3c9219b7a07978799d6.png', 'admin'),
(30, 'syanda', 'syandaftrmn02@gmail.com', '', '$2y$10$Dr7rLmgMfE4GzopE9pzBs.ZiTHT6cjH2gn42puuesl.pDVcbaWZNW', 'cba2a28fc95db26d7f8ee07b9498f656.jpg', 'user'),
(34, 'Muhamad bubung faizal', 'bubung@gmail.com', '', '$2y$10$/MzNGaUpDW.o48DIQorlLOVSyHvIcWeyrwTuGbAJX7BNk3bP9svUS', '8959c6ec152cbdfd51cef59c8aadcf0c.jpeg', 'user'),
(35, 'budi', 'budi@x.com', '+6285722071700', '$2y$10$3.qWDV/nXpJWUaQ.XcBrDuXsulP2q/9Ts.tEs92G1fUEk9gfcICIu', '022d9dd68f8247d7460aab608b09d416.png', 'user'),
(36, 'Budi2', 'budi2@x.com', '', '$2y$10$LuSXGn/zLibwteQQ7yUAfuEZNjkZWM51tVg0wIrJJ45QErhw69ofm', 'eef63a6fb7037a51419e5af90a2d0142.png', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(150) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pengguna`, `id_produk`, `alamat_pengiriman`, `jumlah_beli`, `total_harga`, `bukti_pembayaran`, `tanggal_beli`, `tanggal_selesai`, `ongkir`, `status`) VALUES
(1, 22, 1, '', 1, 20000, '', '2023-06-26', '0000-00-00', 0, 'onprocess'),
(2, 22, 1, '', 3, 60000, '41ab8182e1602fa9d84628ea69627415.png', '2023-06-26', '0000-00-00', 0, 'verified'),
(3, 24, 1, 'Jl. Prabu geusan ulun no 3', 3, 60000, 'b4952703bf29ed3d806044216af7b754.png', '2023-06-26', '0000-00-00', 0, 'rejected'),
(4, 24, 2, '', 3, 450000, 'e5fcd84dfeccd9a0e9ca2ab8ae35c311.png', '2023-06-26', '0000-00-00', 0, 'onprocess'),
(20, 34, 19, '', 1, 150000, '64382167bfe366b6e3fd363723fec27b.jpeg', '2023-08-23', '0000-00-00', 14000, 'onprocess'),
(21, 34, 20, '', 1, 130000, '84f32b0143a9a556f0ebb41e2aebcd08.jpeg', '2023-08-23', '0000-00-00', 0, 'verified'),
(22, 34, 24, '', 1, 45000, '2d204c47bac56702cc3c70b7e309157b.jpeg', '2023-08-23', '0000-00-00', 12500, 'verified'),
(23, 34, 19, '', 1, 150000, '', '2023-08-23', '0000-00-00', 0, 'verified'),
(26, 35, 29, 'Jl. Prabu geusan ulun no 3 kkl', 1, 80000, '', '2023-08-27', '0000-00-00', 12000, 'onprocess'),
(27, 36, 22, '', 3, 39000, '', '2023-08-27', '0000-00-00', 0, 'onprocess');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_perubahan` datetime DEFAULT NULL,
  `foto_produk` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `berat`, `stok`, `harga`, `tanggal_perubahan`, `foto_produk`, `deskripsi`) VALUES
(19, 'Green Beans Wine', 'arabica', 1000, 25, 150000, NULL, '7a4bf9f26b1d9bb99c064d1c32223988.png', 'Kopi Green Beans Wine Margawindu'),
(20, 'Roast Beans Honey', 'arabica', 1000, 22, 130000, '2023-08-23 10:40:41', 'ccad198093c6ee386b739150c8862105.png', 'Kopi Roast Beans Honey Margawindu\r\n\r\n'),
(21, 'Green Beans Honey', 'arabica', 1000, 18, 13000, NULL, '09a10c2f999b2aa0ef8c07e65ca540e7.png', 'Green Beans Honey Margawindu\r\n'),
(22, 'Green Beans Natural', 'arabica', 1000, 16, 13000, NULL, '7585bb5307165b12f99db5b2093c2705.png', 'Green Beans Natural Margawindu\r\n'),
(23, 'Roast Beans Arabika Fullwash', 'arabica', 250, 37, 75000, NULL, '99fbd6d41d1d18ac13f62d8de9d073ea.png', 'Roast Beans Arabica Fullwash Margawindu'),
(24, 'Green Beans Robusta Fullwash', 'robusta', 1000, 18, 45000, NULL, '252ffbeb2230e1695204a0eaa1661d78.png', 'Green Beans Robusta Fullwash Margawindu'),
(25, 'Roast Beans Arabika Wine', 'arabica', 250, 21, 90000, NULL, 'd3f3880a8e377974b44bfe086c7f1d02.png', 'Roast Beans Arabika Wine Margawindu\r\n'),
(26, 'Green Beans Arabika Fullwash', 'arabica', 1000, 29, 90000, '2023-08-23 10:41:15', 'eeb3eabcb37b864813516680cc466f8b.png', 'Roast Beans Arabika Fullwash Margawindu'),
(29, 'Roast Beans Arabika Natural', 'arabica', 250, 17, 80000, NULL, 'ce45525ca59aa6e1181f8780f4955b69.png', 'Roast Beans Arabika Natural Margawindu'),
(30, 'Green Beans Robusta Natural', 'robusta', 1000, 10, 45000, NULL, '0dc2d36b6971a908bf4024c08f052746.png', 'Green Beans Robusta Natural Margawindu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_pengguna`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
