-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 06:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` double NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `foto_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `satuan`, `deskripsi`, `foto_barang`) VALUES
(22, 'Pisang', 3000, 11, 'kilogram', 'Pisang dengan rasa yang mantap', '285662787_pisang.jpg'),
(23, 'Sabun Mandi', 3000, 40, 'bijian', 'sabun mandi', '954402587_sabunmandi.jpg'),
(24, 'Sabun Cuci', 6000, 59, 'bungkus', 'sabun cuci', '81434871_sabuncuci.jpg'),
(25, 'Gula', 11000, 14, 'kilogram', 'gula pasir', '683797947_gula.jpg'),
(26, 'Garam', 3000, 25, 'bungkus', 'garam kasar', '38898845_garam.jpg'),
(27, 'Kopi', 5000, 4, 'bungkus', 'Kopi hitam', '2081246036_kopi.jpg'),
(28, 'Teh', 3000, 50, 'bungkusan', 'teh hijau', '1734627286_teh.jpg'),
(29, 'Susu', 2500, 19, 'liter', 'susu', '406814438_susu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fotouser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `username`, `password`, `fotouser`) VALUES
(12, 'aron.co.id', 'Aron', 'aron', 'caf1a3dfb505ffed0d024130f58c5cfa', '700964351_anime.jpg'),
(13, 'budy@gmail.com', 'Budi', 'budiganteng', '123', '377835871_user2.jpg'),
(14, 'joko.co.id', 'Joko', 'joko', '202cb962ac59075b964b07152d234b70', '2018702124_user2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
