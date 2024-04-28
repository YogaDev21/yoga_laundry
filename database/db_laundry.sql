-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 12:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_paket` int NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_paket`, `qty`, `keterangan`) VALUES
(14, 2, 7, 2, '2 penutup tempat tidur'),
(15, 2, 8, 1, '1 selimut'),
(16, 2, 9, 5, '5 kaos'),
(17, 2, 10, 10, '10 jaket'),
(19, 2, 11, 7, '7 bantal'),
(20, 3, 7, 2, '2 penutup tempat tidur'),
(21, 3, 8, 1, '1 selimut'),
(22, 3, 9, 9, '9 kaos'),
(23, 4, 11, 10, '10 bantal'),
(24, 6, 10, 5, '5 jaket'),
(25, 6, 8, 2, '2 selimut'),
(26, 13, 9, 3, '3 kaos'),
(27, 13, 10, 5, '5 jaket');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(8, 'Anita Putri', 'Jalan Raya Ubud No. 123, Ubud, Gianyar, Bali, Indonesia', 'P', '0812345678'),
(9, 'Hadi Pratama', 'Jalan Sunset Beach No. 456, Kuta, Badung, Bali, Indonesia', 'L', '0876543218'),
(10, 'Siti Rahayu', 'Jalan Dewi Sri No. 789, Legian, Kuta, Bali, Indonesia', 'P', '08987654321'),
(11, 'Rizky Maulana', 'Jalan Monkey Forest No. 321, Ubud, Gianyar, Bali, Indonesia', 'L', '082345678'),
(12, 'Dewi Kusuma', 'Jalan Uluwatu No. 987, Jimbaran, Badung, Bali, Indonesia', 'P', '311231323');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama`, `alamat`, `tlp`) VALUES
(13, 'yogaLaundry_denpasar', 'Jalan Gatot Subroto No. 45, Denpasar, Bali, Indonesia', '08123456789'),
(14, 'yogaLaundry_ubud', 'Jl. Raya Campuhan, Sayan, Kecamatan Ubud', '08765432198'),
(15, 'yogaLaundry_kuta', 'Jalan Legian No. 123, Kuta, Bali, Indonesia', '08987654321'),
(16, 'yogaLaundry_seminyak', 'Jalan Raya Seminyak No. 123, Seminyak, Bali, Indonesia', '08543210987'),
(17, 'yogaLaundry_uluwatu', 'Jalan Uluwatu No. 123, Uluwatu, Bali, Indonesia', '08876543210');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int NOT NULL,
  `id_outlet` int NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(7, 13, 'bed_cover', 'penutup tempat tidur', 70000),
(8, 14, 'selimut', 'selimut', 20000),
(9, 15, 'kaos', 'kaos', 10000),
(10, 16, 'lain', 'jaket', 25000),
(11, 17, 'lain', 'bantal', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int NOT NULL,
  `id_outlet` int NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(2, 13, 'INV98970', 8, '2024-03-01 07:50:22', '2024-03-01 07:50:22', '2024-03-01 07:50:22', 5000, 0, 0, 'baru', 'belum_dibayar', 21),
(3, 13, 'INV71350', 9, '2024-03-01 07:50:35', '2024-03-01 07:50:35', '2024-03-01 07:50:35', 5000, 0, 0, 'proses', 'dibayar', 21),
(4, 13, 'INV80457', 10, '2024-03-01 07:50:42', '2024-03-01 07:50:42', '2024-03-01 07:50:42', 20000, 0, 0, 'selesai', 'belum_dibayar', 21),
(6, 13, 'INV63515', 12, '2024-03-01 07:51:03', '2024-03-01 07:51:03', '2024-03-01 07:51:03', 20000, 0, 0, 'diambil', 'dibayar', 21),
(13, 13, 'INV94695', 11, '2024-04-18 09:20:49', '2024-04-18 09:20:49', '2024-04-18 09:20:49', 20000, 10, 2000, 'baru', 'dibayar', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`) VALUES
(21, 'admin', 'admin', '$2y$10$Rk5ZCjnobyQIIGZ7Oa83uO2BbzG.VfvcO8OzTQhOLcigQ0aYpzR1S', 13, 'admin'),
(22, 'owner', 'owner', '$2y$10$Y8L1GHItMdTFl1XdleMixeOyg33uAUn8YJuhipTX5ZZp5N/JCZQk.', 17, 'owner'),
(23, 'Budi Santoso', 'Budi', '$2y$10$En1uiwnB/bgUTQsLOnWHf.EM2v5BgUyvfuENa3oaSad2oaPikSvcS', 15, 'kasir'),
(24, 'Ratna Sari', 'Ratna', '$2y$10$ICmX8ygNbPCAqWkXrAxmLu/0atTyp1u7Zd3R73QvZ8KtlPnyVnEWW', 16, 'kasir'),
(26, 'kasir', 'kasir', '$2y$10$DhtuGcTmXU5RMgU7yIrmVOR34SNuloicdR02rJVuBkmBI8hJt3Bz6', 15, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_transaksi_outlet` (`id_outlet`),
  ADD KEY `tb_transaksi_user` (`id_user`),
  ADD KEY `tb_transaksi_member` (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_user_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `id_paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `id_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_member` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_transaksi_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
