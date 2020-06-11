-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 11:37 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id_employ` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_departemen` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `layanan` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `deskripsi` varchar(100) DEFAULT NULL,
  `kategori_masalah` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateline` date DEFAULT NULL,
  `berkas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `nama_dept_kirim` (`nama_dept_kirim`),
  ADD KEY `nama_dept_tujuan` (`nama_dept_tujuan`),
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
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`nama_dept_kirim`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`nama_dept_tujuan`) REFERENCES `departemen` (`id_departemen`),
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
