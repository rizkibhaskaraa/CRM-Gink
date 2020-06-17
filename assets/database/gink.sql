-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 06:56 AM
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
-- Database: `gink`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nama`, `departemen`, `username`, `email`, `password`) VALUES
(1, 'Aldi Indrawan', 'IT', 'aldi12', 'indrawanaldi75@gmail.com', '1998-11-12'),
(2, 'muhammad mutaqin', 'CS', 'taqin', 'mutaqqin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(10) NOT NULL,
  `subject` text NOT NULL,
  `deskripsi` text NOT NULL,
  `date` date NOT NULL,
  `dateline` date NOT NULL,
  `nama_from` varchar(50) NOT NULL,
  `nama_to` varchar(50) NOT NULL,
  `dep_from` varchar(50) NOT NULL,
  `dep_to` varchar(50) NOT NULL,
  `berkas_hasil` varchar(250) NOT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `subject`, `deskripsi`, `date`, `dateline`, `nama_from`, `nama_to`, `dep_from`, `dep_to`, `berkas_hasil`, `status`) VALUES
(1, 'berkas order website ', 'nama :\r\njenis :\r\ndll\r\n\r\ntolong saya butuh informasi diatas', '2020-06-12', '2020-06-13', 'aldi indrawan', 'muhammad mutaqin', 'IT', 'CS', '', 'selesai'),
(2, 'bug website client', 'ada bag website\r\ndata website ..........', '2020-06-12', '2020-06-15', 'muhammad mutaqin', 'aldi indrawan', 'CS', 'IT', '', 'selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_from` (`nama_from`,`nama_to`),
  ADD KEY `nama_from_2` (`nama_from`,`nama_to`),
  ADD KEY `nama_to` (`nama_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
