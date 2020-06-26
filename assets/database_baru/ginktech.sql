-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 05:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ginktech`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` varchar(30) NOT NULL,
  `nama_departemen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
('dev', 'Developer'),
('mar', 'Marketing'),
('sup', 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id_employ` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_departemen` varchar(30) DEFAULT NULL,
  `status_employ` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id_employ`, `nama`, `id_departemen`, `status_employ`) VALUES
('082', 'Rizky', 'mar', 'kepala'),
('100', 'Pika', 'sup', 'staff'),
('138', 'Muttaqin', 'dev', 'kepala'),
('151', 'Yusuf', 'dev', 'staff'),
('161', 'Yopan', 'sup', 'kepala'),
('199', 'Lucy', 'mar', 'staff'),
('200', 'Messi', 'dev', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` varchar(30) NOT NULL,
  `komentar` text DEFAULT NULL,
  `id_task` varchar(30) DEFAULT NULL,
  `nama_kirim_komen` varchar(50) DEFAULT NULL,
  `tanggal_komen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `id_task`, `nama_kirim_komen`, `tanggal_komen`) VALUES
('1', 'Benerin', '941', 'Muttaqin', '2020-06-25 00:00:00'),
('2', 'Komentar 2', '941', 'Muttaqin', '2020-06-29 00:00:00'),
('3', 'Kemntar lagi', '822', 'Yusuf', '2020-06-30 00:00:00'),
('4', 'Komentar Messi', '815', 'Messi', '2020-06-29 00:00:00'),
('5', 'Kemntar tambahan', '925', 'Muttaqin', '2020-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pelanggan`
--

CREATE TABLE `layanan_pelanggan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) DEFAULT NULL,
  `id_pelanggan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_pelanggan`
--

INSERT INTO `layanan_pelanggan` (`id_layanan`, `nama_layanan`, `id_pelanggan`) VALUES
('LYN-01', 'Website', '001'),
('LYN-02', 'Hosting', '001'),
('LYN-03', 'Website Toefl', '002');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `customer`, `status`) VALUES
('001', 'Jaya Bakery', 'Aktif'),
('002', 'ITERA', 'Aktif'),
('003', 'Jual Bakery', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` varchar(30) NOT NULL,
  `id_parent` varchar(30) NOT NULL,
  `id_pelanggan` varchar(30) DEFAULT NULL,
  `id_employ_tujuan` varchar(30) DEFAULT NULL,
  `nama_dept_tujuan` varchar(30) DEFAULT NULL,
  `id_employ_kirim` varchar(30) DEFAULT NULL,
  `nama_dept_kirim` varchar(30) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori_masalah` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `dateline` date DEFAULT NULL,
  `berkas` varchar(100) DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `status` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `id_parent`, `id_pelanggan`, `id_employ_tujuan`, `nama_dept_tujuan`, `id_employ_kirim`, `nama_dept_kirim`, `title`, `deskripsi`, `kategori_masalah`, `date`, `dateline`, `berkas`, `waktu_selesai`, `status`) VALUES
('212', '941', NULL, '138', 'Developer', '138', 'Developer', 'develop database', 'design ERD dan develop database', NULL, '2020-06-25 10:55:26', '2020-06-28', 'khs14117055_6.pdf', '2020-06-25 11:38:27', 'Selesai'),
('417', '925', NULL, '151', 'Developer', '138', 'Developer', 'develop tampilan home', 'kuy', NULL, '2020-06-25 12:27:35', '2020-07-02', NULL, '2020-06-25 13:11:21', 'Selesai'),
('48', '925', NULL, '151', 'Developer', '138', 'Developer', 'develop dashboard', 'design di A\r\n', NULL, '2020-06-25 12:26:35', '2020-07-02', NULL, NULL, 'Belum Selesai'),
('729', '941', NULL, '151', 'Developer', '138', 'Developer', 'testing', 'testing suf', NULL, '2020-06-25 12:47:12', '2020-07-02', NULL, NULL, 'Belum Selesai'),
('755', '941', NULL, '138', 'Developer', '138', 'Developer', 'develop tampilan login', 'design di dia', NULL, '2020-06-25 11:42:13', '2020-07-02', NULL, '2020-06-25 13:21:15', 'Selesai'),
('768', '941', NULL, '151', 'Developer', '138', 'Developer', 'develop tampilan tiket', 'design di dia', NULL, '2020-06-25 11:43:21', '2020-07-02', NULL, '2020-06-25 13:11:16', 'Selesai'),
('815', '941', NULL, '200', 'Developer', '138', 'Developer', 'Buat Messi', 'Tugas Messi', NULL, '2020-06-26 09:49:35', '2020-06-30', NULL, NULL, 'Belum Selesai'),
('822', '941', NULL, '151', 'Developer', '138', 'Developer', 'develope dashboard (frontend)', 'develop frontend dashboard', NULL, '2020-06-25 10:49:03', '2020-07-02', NULL, '2020-06-25 13:11:10', 'Selesai'),
('925', '', NULL, '138', 'developer', '199', 'Marketing', 'order website', 'website official bakso tomy', NULL, '2020-06-25 10:14:38', '2020-07-05', NULL, NULL, 'Belum Selesai'),
('941', '', NULL, '138', 'developer', '199', 'Marketing', 'order app website', 'order app website inventory warung adel', NULL, '2020-06-25 10:15:15', '2020-07-31', NULL, NULL, 'Belum Selesai'),
('962', '941', NULL, '200', 'Developer', '138', 'Developer', 'Tugas sub baru', 'Tugas tambahan', NULL, '2020-06-26 09:54:38', '2020-06-28', NULL, NULL, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `id_employ` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_employ`) VALUES
('Lucy12', '123456', '199'),
('Messi', '123456', '200'),
('Muttaqin12', '123456', '138'),
('Pika12', '123456', '100'),
('Rizky12', '123456', '082'),
('Yopan12', '123456', '161'),
('Yusuf12', '123456', '151');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id_employ`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_task` (`id_task`);

--
-- Indexes for table `layanan_pelanggan`
--
ALTER TABLE `layanan_pelanggan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_employ_tujuan` (`id_employ_tujuan`),
  ADD KEY `id_employ_kirim` (`id_employ_kirim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_employ` (`id_employ`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id_task`);

--
-- Constraints for table `layanan_pelanggan`
--
ALTER TABLE `layanan_pelanggan`
  ADD CONSTRAINT `layanan_pelanggan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_employ_tujuan`) REFERENCES `employe` (`id_employ`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`id_employ_kirim`) REFERENCES `employe` (`id_employ`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_employ`) REFERENCES `employe` (`id_employ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
