-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 05:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

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
('ceo', 'Chief Executive Officer '),
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
('806', 'gink technology', 'ceo', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` varchar(30) NOT NULL,
  `komentar` text,
  `id_task` varchar(30) DEFAULT NULL,
  `nama_kirim_komen` varchar(50) DEFAULT NULL,
  `tanggal_komen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `id_task`, `nama_kirim_komen`, `tanggal_komen`) VALUES
('161', '<p>cepet geh</p>\r\n', '411', 'Muttaqin', '2020-06-26 16:42:13'),
('199', '<p>sadasdas</p>\r\n', '768', 'Yusuf', '2020-06-26 14:31:10'),
('586', '<p>APAPA</p>\r\n', '941', 'Muttaqin', '2020-06-26 14:06:40'),
('843', '<p><strong><em>asfdasd</em></strong></p>\r\n', '768', 'Yusuf', '2020-06-26 14:11:17');

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
  `deskripsi` text,
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
('111', '', NULL, NULL, 'Marketing', '806', 'Chief Executive Officer ', 'laporan minggu ini', 'adas', NULL, '2020-06-28 12:59:53', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('123', '', NULL, '151', 'Developer', '199', 'Marketing', 'order video slanik', 'segera', NULL, '2020-06-10 00:00:00', '2020-06-30', NULL, '2020-06-25 14:09:29', 'Belum Selesai'),
('177', '941', NULL, '151', 'Developer', '138', 'Developer', 'develop basing', 'cepet', NULL, '2020-06-26 15:39:17', '2020-06-27', NULL, NULL, 'Belum Selesai'),
('188', '', '003', '151', 'developer', '082', 'Marketing', 'update hosting', 'segera', 'support', '2020-06-26 10:36:11', '2020-06-28', NULL, '2020-06-26 10:43:10', 'Selesai'),
('21', '', NULL, '138', 'developer', '151', 'Developer', 'bantu', 'asd', NULL, '2020-06-28 09:25:06', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('212', '941', NULL, '138', 'Developer', '138', 'Developer', 'develop database', 'design ERD dan develop database', NULL, '2020-06-12 10:55:26', '2020-06-28', 'khs14117055_6.pdf', '2020-06-25 11:38:27', 'Selesai'),
('345', '941', NULL, '151', 'Developer', '138', 'Developer', 'testing dashboard tiket', 'asdasd', NULL, '2020-06-26 16:31:08', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('411', '925', NULL, '151', 'Developer', '138', 'Developer', 'testing dashboard', 'tolong testing', NULL, '2020-06-26 16:10:28', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('417', '925', NULL, '151', 'Developer', '138', 'Developer', 'develop tampilan home', 'kuy', NULL, '2020-06-08 12:27:35', '2020-07-02', NULL, '2020-06-25 13:11:21', 'Selesai'),
('460', '619', NULL, '151', 'Developer', '138', 'Developer', 'perbaiki bug bagian login', 'hari ini', NULL, '2020-06-26 16:23:05', '2020-06-28', NULL, '2020-06-27 10:11:54', 'Selesai'),
('48', '925', NULL, '151', 'Developer', '138', 'Developer', 'develop dashboard', 'design di A\r\n', NULL, '2020-06-17 12:26:35', '2020-07-02', NULL, '2020-06-25 13:48:02', 'Selesai'),
('518', '', NULL, NULL, 'developer', '138', 'Developer', 'order app mobile', 'sd', NULL, '2020-06-27 10:17:02', '2020-07-08', NULL, NULL, 'Belum Selesai'),
('608', '762', NULL, '199', 'Marketing', '082', 'Marketing', 'laporan app website', 'asd', NULL, '2020-06-27 11:22:19', '2020-07-01', NULL, '2020-06-27 11:25:42', 'Selesai'),
('619', '', '001', '138', 'developer', '138', 'Developer', 'ada bug', 'ada bu di aplikasi jaya ballery', 'support', '2020-06-26 09:46:23', '2020-06-28', NULL, NULL, 'Selesai'),
('729', '941', NULL, '151', 'Developer', '138', 'Developer', 'testing', 'testing suf', NULL, '2020-06-19 12:47:12', '2020-07-02', NULL, '2020-06-25 16:58:32', 'Belum Selesai'),
('755', '941', NULL, '138', 'Developer', '138', 'Developer', 'develop tampilan login', 'design di dia', NULL, '2020-06-15 11:42:13', '2020-07-02', NULL, '2020-06-26 13:45:48', 'Selesai'),
('762', '', NULL, '082', 'Marketing', '806', 'Chief Executive Officer ', 'laporan bulan juli', 'segera kirim', NULL, '2020-06-27 11:14:36', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('768', '941', NULL, '151', 'Developer', '138', 'Developer', 'develop tampilan tiket', 'design di dia', NULL, '2020-06-26 11:43:21', '2020-07-02', NULL, '2020-06-25 13:11:16', 'Selesai'),
('822', '941', NULL, '151', 'Developer', '138', 'Developer', 'develope dashboard (frontend)', 'develop frontend dashboard', NULL, '2020-06-22 10:49:03', '2020-07-02', NULL, '2020-06-25 13:11:10', 'Selesai'),
('874', '762', NULL, '199', 'Marketing', '082', 'Marketing', 'laporan keuangan', 'segera\r\n\r\n', NULL, '2020-06-29 09:56:33', '2020-06-30', NULL, NULL, 'Belum Selesai'),
('903', '925', NULL, '138', 'Developer', '138', 'Developer', 'develop tampilan help', 'segera', NULL, '2020-06-26 16:22:18', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('925', '', NULL, '138', 'developer', '199', 'Marketing', 'order website', 'website official bakso tomy', NULL, '2020-06-25 10:14:38', '2020-07-05', NULL, NULL, 'Selesai'),
('941', '', NULL, '138', 'developer', '199', 'Marketing', 'order app website', 'order app website inventory warung adel', NULL, '2020-06-25 10:15:15', '2020-07-31', NULL, NULL, 'Belum Selesai'),
('947', '', NULL, NULL, 'developer', '151', 'Developer', 'butuh data', 'dsfds', NULL, '2020-06-27 10:06:26', '2020-06-28', NULL, NULL, 'Belum Selesai'),
('977', '', NULL, NULL, 'developer', '199', 'Marketing', 'order poster', 'asd', NULL, '2020-06-28 09:25:37', '2020-07-01', NULL, NULL, 'Belum Selesai');

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
('gink12', '123456', '806'),
('Lucy12', '123456', '199'),
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
