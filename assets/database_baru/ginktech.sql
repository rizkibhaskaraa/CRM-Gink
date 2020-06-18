-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 06:07 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
('CS', 'Customer Service'),
('dev', 'developer'),
('fin', 'finance');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id_employ` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_departemen` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id_employ`, `nama`, `id_departemen`, `status`) VALUES
('1111111', 'dwiki martin', 'CS', 'staff'),
('120698', 'muhammad muttaqin', 'fin', 'kepala'),
('121198', 'Aldi Indrawan', 'dev', 'staff'),
('121212', 'Rizki Bhaskara', 'dev', 'kepala'),
('151098', 'shanti puspita sari', 'fin', 'staff'),
('33333', 'messi', 'dev', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `layanan` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `customer`, `layanan`, `status`) VALUES
('111', 'son sony', 'app website', 'aktif'),
('123', 'jaya bakery', 'website', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` varchar(30) NOT NULL,
  `id_pelanggan` varchar(30) DEFAULT NULL,
  `id_employ_tujuan` varchar(30) DEFAULT NULL,
  `nama_dept_tujuan` varchar(30) DEFAULT NULL,
  `id_employ_kirim` varchar(30) DEFAULT NULL,
  `nama_dept_kirim` varchar(30) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori_masalah` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateline` date DEFAULT NULL,
  `berkas` varchar(100) DEFAULT NULL,
  `waktu_selesai` date DEFAULT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `id_pelanggan`, `id_employ_tujuan`, `nama_dept_tujuan`, `id_employ_kirim`, `nama_dept_kirim`, `title`, `deskripsi`, `kategori_masalah`, `date`, `dateline`, `berkas`, `waktu_selesai`, `status`) VALUES
('338', '111', '121212', 'umum', '1111111', 'Customer Service', 'tugas lucu', 'belum update hosting pada pelanggan diatas,mereka sudah membayar tapi hosting belum di update mohon ', 'umum', '2020-06-13', '2020-06-16', '6_7_sesi8a_pengendalian_konkurensi.ppt', '0000-00-00', 'selesai'),
('340', '111', '33333', 'umum', '121212', 'developer', 'belum update', 'belum update hosting pada pelanggan diatas,mereka sudah membayar tapi hosting belum di update mohon ', 'umum', '2020-06-13', '2020-06-16', '6_7_sesi8a_pengendalian_konkurensi.ppt', '0000-00-00', 'selesai'),
('351', NULL, '33333', 'developer', '121198', 'developer', 'fix bug', 'perbaiki bug pada aplikasi ............. dengan pelanggan .............', NULL, '2020-06-13', '2020-06-15', 'RD_ITE_14117145_14117170.pptx', '0000-00-00', 'selesai'),
('353', NULL, '33333', 'developer', '121198', 'developer', 'aplikasi jodoh', 'perbaiki bug pada aplikasi ............. dengan pelanggan .............', NULL, '2020-06-13', '2020-06-15', '', '0000-00-00', 'selesai'),
('454', '111', '33333', 'developer', '1111111', 'Customer Service', 'perbarui hosting', 'perbarui hosting dengan pelanggan ....... dengan durasi 6 bulan dan layanan seperti sebelumnya', NULL, '2020-06-13', '2020-06-15', NULL, '0000-00-00', 'selesai'),
('757', '111', '120698', 'finance', '121198', 'developer', 'data pelanggan', 'butuh data pelanggan dengan nama pelanggan itera dan layanan DIM itera,mhon segera dibuatkan dan dikjajajajjajajabutuh data pelanggan dengan nama pelanggan itera dan layanan DIM itera,mhon segera dibuatkan dan dikjajajajjajajabutuh data pelanggan dengan nama pelanggan itera dan layanan DIM itera,mhon segera dibuatkan dan dikjajajajjajajabutuh data pelanggan dengan nama pelanggan itera dan layanan DIM itera,mhon segera dibuatkan dan dikjajajajjajajabutuh data pelanggan dengan nama pelanggan itera dan layanan DIM itera,mhon segera dibuatkan dan dikjajajajjajaja', NULL, '2020-06-13', '2020-06-14', NULL, '0000-00-00', 'selesai'),
('765', '111', '33333', 'developer', '1111111', 'Customer Service', 'Protes', 'Kenapa websitenya jelek!!!!!!!!!!!!!!!!!!!!!!!!!!! Kenapa websitenya jelek!!!!!!!!!!!!!!!!!!!!!!!!!!!', 'support', '2020-06-18', '2020-06-30', NULL, NULL, 'belum selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `id_employ` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_employ`) VALUES
('aldi12', '123456', '121198'),
('dwiki12', '123456', '1111111'),
('messi', '123456', '33333'),
('muhammad12', '123456', '120698'),
('rizki12', '123456', '121212'),
('shanti12', '123456', '151098');

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
  ADD PRIMARY KEY (`id_employ`,`id_departemen`),
  ADD KEY `id_departemen` (`id_departemen`);

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
  ADD KEY `id_employ_tujuan` (`id_employ_tujuan`),
  ADD KEY `id_employ_kirim` (`id_employ_kirim`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

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
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_employ_tujuan`) REFERENCES `employe` (`id_employ`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_employ_kirim`) REFERENCES `employe` (`id_employ`),
  ADD CONSTRAINT `task_ibfk_5` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_employ`) REFERENCES `employe` (`id_employ`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_employ`) REFERENCES `employe` (`id_employ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
