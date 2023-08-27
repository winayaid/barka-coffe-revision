-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 26, 2023 at 04:11 PM
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
-- Database: `barka_coffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto`, `role`) VALUES
(17, 'a', 'as@gmail.com', '$2y$10$6VOMkiInacxh9St59ZxPNO0Sl5olsdo4ql2/TN0.fQLKgzeGC3/yK', '338fb4575f51855b31b90ecede1d84e4.png', 'user'),
(18, 'as', 'as@gmail.com', '$2y$10$U8AOd9nDVEshuyWMQhkSke3Fx4wOXWQJSSXBD20dAPf7.uMZj0UCu', '41bfd8d4e41eeb21faffb484d5a0cf96.png', 'user'),
(19, 'a', 'a@gmail.com', '$2y$10$ycxN0mKD/NdnObjHyLixk.xLzvUQ9AyRpWwiX8bAyX.fF4D7sSZM6', '6f4e2bef7c0f642c2df68340aa49277f.png', 'user'),
(22, 'admin', 'admin@gmail.com', '$2y$10$sywGNLKBWq1gTBT40JgyTuy5LCcJa81js6YtatrPVAwg.ly3lXQiG', 'c75955384f6438d34f68b9e0259ed963.png', 'admin'),
(24, 'x', 'x@gmail.com', '$2y$10$8k.5NgKCGcjX.7lYYrk9uecLAS5Nd8KHY/6F2nscb/IOStmszh6yq', '59b6784c379865e0b43ab72b27d30419.png', 'user');

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pengguna`, `id_produk`, `alamat_pengiriman`, `jumlah_beli`, `total_harga`, `bukti_pembayaran`, `tanggal_beli`, `tanggal_selesai`, `status`) VALUES
(1, 22, 1, '', 1, 20000, '', '2023-06-26', '0000-00-00', 'onprocess'),
(2, 22, 1, '', 3, 60000, '41ab8182e1602fa9d84628ea69627415.png', '2023-06-26', '0000-00-00', 'onprocess'),
(3, 24, 1, '', 3, 60000, 'b4952703bf29ed3d806044216af7b754.png', '2023-06-26', '0000-00-00', 'onprocess'),
(4, 24, 2, '', 3, 450000, 'e5fcd84dfeccd9a0e9ca2ab8ae35c311.png', '2023-06-26', '0000-00-00', 'onprocess');

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
(1, 'Kopi 1', 'robusta', 240, 2, 20000, '2023-06-26 13:53:13', 'dc0d4e8e29d1ca8a1e74ca12fef7ef77.jpg', 'Kopi Robusta dengan kenikmatan yang luar biasa'),
(2, 'Kopi 3', 'robusta', 140, 100, 150000, '2023-06-26 13:53:41', '28d5425ee525865234e69cb23a81ad05.jpg', 'Kopi robusta dengan rasa amerika');

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
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
