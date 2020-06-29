-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 07:49 AM
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
('612', '<p><strong><cite>cepet dikit lahhhh</cite></strong></p>\r\n', '941', 'Muttaqin', '2020-06-29 10:22:44'),
('7', '<p>baik pak</p>\r\n', '177', 'Yusuf', '2020-06-29 10:23:08'),
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
('909', '', NULL, NULL, 'Developer', '138', 'Developer', 'bantu aldi', '<p><img style=\"width: 480px;\" src=\"data:image/jpeg;base64,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AooooAK77T/+QZa/9cU/kK4Gu+0//kGWv/XFP5CpkNFmiiioGFFFFAGbr3/IFuP+A/8AoQriq7XXv+QLcf8AAf8A0IVxVXHYTCiiiqEFFFFABRRRQAUUUUAFFFFABRRRQAUyn0UAGTxnoOa4j4h21sNNhuiiibeE8wdcEHg125x36d65jx9YSX/g29SP/WxqkwGOpQg4/EcUpLQabTueQycDPfp9aru6hvn4p9pci5hywxKp2vz948fN+OcUSwrMpAIVgeQawRvdNXQm1du9XAI75xVDVNSknC24lPlryehBNVrqV4nMZOc+hqoM5INO2tzOU3sA46cU4dRTW60hqiESt1NN3EUnamGgZKGOOpp+446moE61IOlAEuT1pCeKZRQA7NIcY56U09KUUAIQM8CjbTj0poPagA201hhjTycU0nKn6UAJ6U8NjvTB0H0py9aADdzk05m4NB6U09aAFEjDoTUwuJBjDH86rMxprZPfFAF43kmOeaT7W/0qiI2cbQcgd/SnmBUwZXJHoKLAWTP5nU00Fc4HU+9RIY15WHPuanS4IIzDHzxytT1EehfCiLdrd3JtJjWEjdjoa9hHb145rxLwH4pstCkmFzFGIbg/OVHKgd69qD71LA7tx6k9ccZrRASUUg6+9LViCiiigAooooAK77T/APkGWv8A1xT+Qrga77T/APkGWv8A1xT+QqZDRZoooqBn/9k=\" data-filename=\"22300266_B.jpg\"></p><p><br></p><p>ini <u><b>make gambar boy</b></u><br></p>', NULL, '2020-06-29 12:49:24', '0000-00-00', NULL, NULL, 'Belum Selesai'),
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
