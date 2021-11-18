-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 10:51 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_komik_manhwa_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'Nabila', 'billa', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_komik`
--

CREATE TABLE `detail_pembelian_komik` (
  `id_detail_pembelian_komik` int(11) NOT NULL,
  `id_pembelian_komik` int(11) NOT NULL,
  `id_komik` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id_komik` int(11) NOT NULL,
  `nama_komik` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(100) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id_komik`, `nama_komik`, `deskripsi`, `harga`, `foto`) VALUES
(14, 'Closing To Tyrant Dads', 'Menceritakan tentang anak perempuan yang harus memilih ayah dari 5 calonnya.', 100000, 'http://localhost/toko_komik_manhwa_online/admin/assets/images/1636426214.jpg'),
(15, 'I Think Her Name Is Levitia', '\"Aku terlahir kembali?\" seorang perempuan bernama Levitia menatap dirinya yang kembali ke masa lalunya.', 100000, 'http://localhost/toko_komik_manhwa_online/admin/assets/images/1636427036.jpg'),
(16, 'Adopted Daugther In Law', 'Seorang anak perempuan yang di adopsi untuk menjadi menantu di keluarga duke.', 100000, 'http://localhost/toko_komik_manhwa_online/admin/assets/images/1636427531.jpg'),
(18, 'Corropted The Male Lead', 'Aku bereinkarnasi sebagai tokoh novel dan berakhir bersama dengan male lead?', 100000, 'http://localhost/toko_komik_manhwa_online/admin/assets/images/1636427870.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_komik`
--

CREATE TABLE `pembayaran_komik` (
  `id_pembayaran_komik` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `id_pembelian_komik` int(11) NOT NULL,
  `status` enum('belum bayar','sudah bayar','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_komik`
--

CREATE TABLE `pembelian_komik` (
  `id_pembelian_komik` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_komik` int(11) NOT NULL,
  `qty` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pembelian_komik`
--
ALTER TABLE `detail_pembelian_komik`
  ADD PRIMARY KEY (`id_detail_pembelian_komik`),
  ADD KEY `id_pembelian_komik` (`id_pembelian_komik`,`id_komik`,`qty`),
  ADD KEY `id_komik` (`id_komik`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id_komik`);

--
-- Indexes for table `pembayaran_komik`
--
ALTER TABLE `pembayaran_komik`
  ADD PRIMARY KEY (`id_pembayaran_komik`);

--
-- Indexes for table `pembelian_komik`
--
ALTER TABLE `pembelian_komik`
  ADD PRIMARY KEY (`id_pembelian_komik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pembelian_komik`
--
ALTER TABLE `detail_pembelian_komik`
  MODIFY `id_detail_pembelian_komik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id_komik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran_komik`
--
ALTER TABLE `pembayaran_komik`
  MODIFY `id_pembayaran_komik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_komik`
--
ALTER TABLE `pembelian_komik`
  MODIFY `id_pembelian_komik` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian_komik`
--
ALTER TABLE `detail_pembelian_komik`
  ADD CONSTRAINT `detail_pembelian_komik_ibfk_1` FOREIGN KEY (`id_pembelian_komik`) REFERENCES `pembelian_komik` (`id_pembelian_komik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_komik_ibfk_2` FOREIGN KEY (`id_komik`) REFERENCES `komik` (`id_komik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
