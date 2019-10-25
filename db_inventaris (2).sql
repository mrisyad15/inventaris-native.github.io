-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 11:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `barang_code` varchar(8) NOT NULL,
  `barang_name` varchar(35) NOT NULL,
  `barang_location` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `category_id`, `barang_code`, `barang_name`, `barang_location`) VALUES
(15, 4, 'B001', 'Viar', 'Lapangan'),
(16, 3, 'B002', 'Sapu Lidi', 'Gudang'),
(17, 6, 'B003', 'Pulpen Snowman', 'Kantor'),
(18, 5, 'B004', 'Papan Tulis', 'Masing masing kelas');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `barang_masuk_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `barang_masuk_code` varchar(12) NOT NULL,
  `barang_masuk_condition` enum('Baik','Rusak') NOT NULL DEFAULT 'Baik',
  `barang_masuk_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`barang_masuk_id`, `barang_id`, `supplier_id`, `barang_masuk_code`, `barang_masuk_condition`, `barang_masuk_date`) VALUES
(27, 15, 4, 'B001-1', 'Baik', '2018-10-11'),
(28, 16, 1, 'B002-1', 'Baik', '2018-10-11'),
(29, 16, 1, 'B002-2', 'Baik', '2018-10-11'),
(30, 16, 1, 'B002-3', 'Baik', '2018-10-11'),
(31, 16, 1, 'B002-4', 'Baik', '2018-10-11'),
(32, 16, 1, 'B002-5', 'Baik', '2018-10-11'),
(33, 18, 1, 'B004-1', 'Baik', '2018-10-11'),
(34, 18, 1, 'B004-2', 'Baik', '2018-10-11'),
(35, 18, 4, 'B004-3', 'Baik', '2018-10-11'),
(36, 15, 1, 'B001-2', 'Baik', '2018-10-11'),
(37, 15, 1, 'B001-3', 'Baik', '2018-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Elektronik'),
(3, 'Alat Kebersihan'),
(4, 'Kendaraan'),
(5, 'Mabel'),
(6, 'ATK'),
(7, 'tes'),
(8, 'tes2');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `stok_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jml_barang_masuk` varchar(10) NOT NULL,
  `total_brg` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(35) NOT NULL,
  `supplier_address` varchar(50) NOT NULL,
  `supplier_telp` varchar(15) NOT NULL,
  `supplier_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_telp`, `supplier_country`) VALUES
(1, 'Ucup', 'Jalan Buntu', '089622879287', 'Jakarta Selatan'),
(4, 'Akbar Maulana', 'jalanin', '08551238018', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('User','Admin') NOT NULL DEFAULT 'User',
  `avatar` varchar(20) DEFAULT NULL,
  `active` enum('Y','T') NOT NULL DEFAULT 'T',
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `level`, `avatar`, `active`, `code`) VALUES
(8, 'Nunik Zain', 'nunik.suroya@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', NULL, 'Y', '0f69b23574d8892d5adc1ca7948ea35a'),
(9, 'Hamba Allah', 'nunik.smkiu@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 'User', NULL, 'T', '0f69b23574d8892d5adc1ca7948ea35a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`barang_masuk_id`),
  ADD KEY `barang_id` (`barang_id`,`supplier_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`stok_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `barang_masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
