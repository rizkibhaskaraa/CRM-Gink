-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 04:41 AM
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
  `id_departemen` varchar(10) NOT NULL,
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
  `id_employ` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_departemen` varchar(30) DEFAULT NULL,
  `status_employ` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id_employ`, `nama`, `id_departemen`, `status_employ`) VALUES
('082', 'Rizky Bhaskara', 'mar', 'kepala'),
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
  `id_komentar` varchar(10) NOT NULL,
  `komentar` text DEFAULT NULL,
  `id_task` varchar(10) DEFAULT NULL,
  `nama_kirim_komen` varchar(50) DEFAULT NULL,
  `nama_dept_komen` varchar(50) NOT NULL,
  `tanggal_komen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `id_task`, `nama_kirim_komen`, `nama_dept_komen`, `tanggal_komen`) VALUES
('443', '<p>oke mantap gaskeun</p>\r\n', 'TASK-02', 'Yusuf', 'Developer', '2020-07-01 11:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pelanggan`
--

CREATE TABLE `layanan_pelanggan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `id_pelanggan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_pelanggan`
--

INSERT INTO `layanan_pelanggan` (`id_layanan`, `nama_layanan`, `status`, `id_pelanggan`) VALUES
('LYN-01', 'Website', 'Aktif', 'CUS-01'),
('LYN-03', 'Website Toefl', 'Aktif', 'CUS-02'),
('LYN-04', 'Hosting', 'Aktif', 'CUS-04'),
('LYN-05', 'Website Toko', 'Aktif', 'CUS-03'),
('LYN-06', 'Website Unila', 'Aktif', 'CUS-02');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `customer`) VALUES
('CUS-01', 'Jaya Bakery'),
('CUS-02', 'ITERA'),
('CUS-03', 'Jual Bakery'),
('CUS-04', 'Propera');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` varchar(10) NOT NULL,
  `id_parent` varchar(10) NOT NULL,
  `id_pelanggan` varchar(10) DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `nama_layanan` varchar(50) DEFAULT NULL,
  `id_employ_tujuan` varchar(30) DEFAULT NULL,
  `nama_dept_tujuan` varchar(30) DEFAULT NULL,
  `id_employ_kirim` varchar(30) DEFAULT NULL,
  `nama_dept_kirim` varchar(30) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
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

INSERT INTO `task` (`id_task`, `id_parent`, `id_pelanggan`, `customer`, `nama_layanan`, `id_employ_tujuan`, `nama_dept_tujuan`, `id_employ_kirim`, `nama_dept_kirim`, `title`, `deskripsi`, `kategori_masalah`, `date`, `dateline`, `berkas`, `waktu_selesai`, `status`) VALUES
('TASK-01', '', NULL, NULL, NULL, '138', 'Developer', '082', 'Marketing', 'Bantu Solve Bug', '<b>Tolong dibantu ya</b>', NULL, '2020-07-01 11:48:26', '2020-07-03', 'Branding.png', '2020-07-01 11:52:13', 'Selesai'),
('TASK-02', '', 'CUS-02', 'ITERA', 'Website Toefl', '151', 'Developer', '138', 'Developer', 'Ini Coba', '<p><b>Coba tolong di bantu ya<br></b></p>', 'support', '2020-07-01 11:55:49', '2020-07-12', 'Branding1.png', '2020-07-01 11:56:44', 'Selesai'),
('TASK-03', 'TASK-01', NULL, NULL, NULL, '138', 'Developer', '138', 'Developer', 'Malas ngebantu', '<p><b>asdsa<br></b></p>', NULL, '2020-07-01 11:59:07', '2020-07-03', NULL, '2020-07-01 11:59:38', 'Selesai'),
('TASK-04', 'TASK-01', NULL, NULL, NULL, '138', 'Developer', '138', 'Developer', 'Popup error', '<p><b>dsasa<br></b></p>', NULL, '2020-07-01 11:59:25', '2020-07-11', NULL, '2020-07-01 11:59:40', 'Selesai'),
('TASK-05', '', NULL, NULL, NULL, NULL, 'Marketing', '151', 'Developer', 'WKWK', '<p>WKWK<br></p>', NULL, '2020-07-02 09:28:47', '2020-08-01', NULL, NULL, 'Belum Selesai'),
('TASK-06', '', 'CUS-01', 'Jaya Bakery', 'Website', NULL, 'umum', '138', 'Developer', 'JAYA BAKERY MAU WEBSITE', '<h4>Isi Data Dibawah Ini dengan Lengkap Untuk Membuat Tiket</h4>', 'umum', '2020-07-02 10:42:22', '2020-08-01', NULL, NULL, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `id_employ` varchar(10) DEFAULT NULL
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
