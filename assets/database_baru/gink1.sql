-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 09:21 AM
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
-- Database: `gink1`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_customer`
--

CREATE TABLE `crm_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crm_customer`
--

INSERT INTO `crm_customer` (`customer_id`, `customer_name`) VALUES
(1, 'Bank Lampung'),
(2, 'Utomo Bank'),
(3, 'PT. Multi Karya Engineering'),
(4, 'KANWIL DJBC Sumbagbar'),
(5, 'Biro Humas dan Protokol Provinsi Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `hr_department`
--

CREATE TABLE `hr_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_department`
--

INSERT INTO `hr_department` (`department_id`, `department_name`) VALUES
(1, 'C-Level'),
(2, 'Sales And Marketing'),
(3, 'Research And Development'),
(4, 'Support'),
(5, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `hr_designation`
--

CREATE TABLE `hr_designation` (
  `designation_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation_start_date` date DEFAULT NULL,
  `designation_end_date` date DEFAULT NULL,
  `designation_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_designation`
--

INSERT INTO `hr_designation` (`designation_id`, `position_id`, `employee_id`, `designation_start_date`, `designation_end_date`, `designation_status`) VALUES
(1, 1, 1, '2020-01-01', '2022-01-01', 1),
(2, 2, 6, '2020-01-06', '2021-05-14', 1),
(3, 3, 5, '2020-01-01', '2021-02-01', 1),
(4, 4, 9, '2020-03-04', '2021-03-11', 1),
(5, 8, 16, '2020-06-03', '2021-06-25', 1),
(6, 9, 10, '2019-12-04', '2020-09-25', 1),
(7, 11, 7, '2020-03-11', '2020-09-04', 1),
(8, 12, 3, '2020-04-07', '2020-10-09', 1),
(9, 14, 18, '2020-07-01', '2020-07-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE `hr_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(64) NOT NULL,
  `employee_birth_place` varchar(32) DEFAULT NULL,
  `employee_birth_date` date DEFAULT NULL,
  `employee_gender` enum('Male','Female') DEFAULT 'Male'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`employee_id`, `employee_name`, `employee_birth_place`, `employee_birth_date`, `employee_gender`) VALUES
(1, 'Yasser Maulana Lazimar', NULL, NULL, 'Male'),
(2, 'Eka Yuda Guna Wibawa', NULL, NULL, 'Male'),
(3, 'Faisol Mursaid', NULL, NULL, 'Male'),
(4, 'Filuzil Fadli Aditya', NULL, NULL, 'Male'),
(5, 'Yudha Angga Wijaya', 'TALANG PADANG', '1988-08-27', 'Male'),
(6, 'Antoni', NULL, NULL, 'Male'),
(7, 'Saypulung', NULL, NULL, 'Male'),
(8, 'Oky Septiawan', NULL, NULL, 'Male'),
(9, 'Novi Pratiwi', NULL, NULL, 'Female'),
(10, 'M. Arsie Aziz', NULL, NULL, 'Male'),
(11, 'Desiana Putri', NULL, NULL, 'Female'),
(12, 'Mentari Puji Lestari', NULL, NULL, 'Female'),
(13, 'Rizky Febriandy', NULL, NULL, 'Male'),
(14, 'Osy Iliana Sari', NULL, NULL, 'Female'),
(15, 'Ronaldiansah', NULL, NULL, 'Male'),
(16, 'Suiskandar', NULL, NULL, 'Male'),
(17, 'Muhammad Novrizal Faros', NULL, NULL, 'Male'),
(18, 'Zulkipli', NULL, NULL, 'Male'),
(19, 'Fransiscus Budi Santoso', NULL, NULL, 'Male'),
(20, 'Muhammad Arief Hidayat', NULL, NULL, 'Male'),
(21, 'Wixy Prayoga', NULL, NULL, 'Male'),
(22, 'Rexy Julian', NULL, NULL, 'Male'),
(23, 'Ahmad Reza Aidil', NULL, NULL, 'Male'),
(24, 'Willi Chandra', NULL, NULL, 'Male'),
(25, 'Hendri Triwanto', NULL, NULL, 'Male'),
(26, 'Romanda Hidayat', NULL, NULL, 'Male'),
(27, 'Rachmat Fajarudin', NULL, NULL, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position_sort_order` tinyint(2) NOT NULL DEFAULT 1,
  `position_name` varchar(64) NOT NULL,
  `position_abbreviation` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`position_id`, `department_id`, `parent_id`, `position_sort_order`, `position_name`, `position_abbreviation`) VALUES
(1, 1, NULL, 1, 'Chief Executive Officer', 'CEO'),
(2, 1, 1, 3, 'Chief Operating Officer', 'COO'),
(3, 1, 1, 1, 'Chief Technical Officer', 'CTO'),
(4, 1, 1, 2, 'Chief Financial Officer', 'CFO'),
(8, 2, 2, 1, 'Sales and Marketing Manager', ''),
(9, 3, 3, 1, 'Research & Development Manager', NULL),
(11, 3, 9, 1, 'Development Supervisor', NULL),
(12, 3, 9, 2, 'Creative Design Supervisor', NULL),
(14, 2, 8, 2, 'Sales and Marketing Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

CREATE TABLE `master_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_product`
--

INSERT INTO `master_product` (`product_id`, `product_name`, `product_parent`) VALUES
(1, 'Project', NULL),
(2, 'Server & Hosting', NULL),
(3, 'Website', 1),
(4, 'Web Apps', 1),
(5, 'Dedicated Server', 2),
(6, 'Colocation Server', 2),
(7, 'Hosting 10', 2),
(8, 'Hosting 50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_service`
--

CREATE TABLE `master_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(64) NOT NULL,
  `service_status` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_service`
--

INSERT INTO `master_service` (`service_id`, `service_name`, `service_status`, `product_id`, `customer_id`) VALUES
(1, 'Official Website', 'Pending', 3, 1),
(2, 'ATMB and Debut Transaction', 'Pending', 4, 1),
(3, 'Official Website', 'Active', 3, 2),
(4, 'Official Website', 'Active', 3, 4),
(5, 'Aplikasi Whistleblowing System Bank Lampung', 'Active', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_status` varchar(30) DEFAULT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`user_username`, `user_password`, `employee_id`, `user_status`, `position_id`) VALUES
('Antoni12', '123456', 6, 'C-Level', 2),
('Arsie12', '123456', 10, 'Manager', 9),
('Faisol12', '123456', 3, 'Staff', 12),
('Iskandar12', '123456', 16, 'Manager', 8),
('Novi12', '123456', 9, 'C-Level', 4),
('Pulung12', '123456', 7, 'Staff', 11),
('Yasser12', '123456', 1, 'C-Level', 1),
('Yudha12', '123456', 5, 'C-Level', 3),
('zul12', '123456', 18, 'Staff', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tm_comment`
--

CREATE TABLE `tm_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_description` text DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `comment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_comment`
--

INSERT INTO `tm_comment` (`comment_id`, `comment_description`, `task_id`, `employee_id`, `position_id`, `comment_date`) VALUES
(16, '<p>Laksanakan ya</p>\r\n\r\n<p>&nbsp;</p>\r\n', 24, 5, 3, '2020-08-03 10:08:11'),
(17, '<p>Siap Pak</p>\r\n', 24, 10, 9, '2020-08-03 10:08:42'),
(18, '<p>Baik</p>\r\n', 24, 7, 11, '2020-08-03 10:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `tm_task`
--

CREATE TABLE `tm_task` (
  `task_id` int(11) NOT NULL,
  `task_parent` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `employee_destination` int(11) DEFAULT NULL,
  `department_destination` int(11) DEFAULT NULL,
  `employee_sent` int(11) DEFAULT NULL,
  `department_sent` int(11) DEFAULT NULL,
  `task_title` varchar(50) DEFAULT NULL,
  `task_description` longtext DEFAULT NULL,
  `task_date` datetime DEFAULT NULL,
  `task_dateline` date DEFAULT NULL,
  `task_file` varchar(100) DEFAULT NULL,
  `task_finish` datetime DEFAULT NULL,
  `task_status` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_task`
--

INSERT INTO `tm_task` (`task_id`, `task_parent`, `service_id`, `employee_destination`, `department_destination`, `employee_sent`, `department_sent`, `task_title`, `task_description`, `task_date`, `task_dateline`, `task_file`, `task_finish`, `task_status`) VALUES
(24, NULL, 5, 10, 3, 5, 1, 'Website Profile', '', '2020-08-03 09:54:26', '2020-08-29', NULL, NULL, 'Not Finished'),
(25, NULL, NULL, NULL, 2, 5, 1, 'Hosting', '<p>Hosting Website Gink</p>', '2020-08-03 09:55:31', '2020-08-29', NULL, NULL, 'Not Finished'),
(26, 24, 5, 7, 3, 10, 3, 'DATABASE ERROR', '', '2020-08-03 16:06:22', '2020-08-13', NULL, '2020-08-03 16:07:37', 'Finish'),
(27, NULL, NULL, 7, 3, 10, 3, 'COBA LAGI', '', '2020-08-04 11:23:33', '2020-08-08', NULL, NULL, 'Not Finished');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_customer`
--
ALTER TABLE `crm_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `hr_department`
--
ALTER TABLE `hr_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `hr_designation`
--
ALTER TABLE `hr_designation`
  ADD PRIMARY KEY (`designation_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `hr_employee`
--
ALTER TABLE `hr_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `parent_id` (`product_parent`);

--
-- Indexes for table `master_service`
--
ALTER TABLE `master_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`user_username`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `tm_comment`
--
ALTER TABLE `tm_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `tm_comment_ibfk_3` (`position_id`);

--
-- Indexes for table `tm_task`
--
ALTER TABLE `tm_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `employee_sent` (`employee_sent`),
  ADD KEY `employee_destination` (`employee_destination`),
  ADD KEY `department_sent` (`department_sent`),
  ADD KEY `department_destination` (`department_destination`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_customer`
--
ALTER TABLE `crm_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hr_department`
--
ALTER TABLE `hr_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hr_designation`
--
ALTER TABLE `hr_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hr_employee`
--
ALTER TABLE `hr_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hr_position`
--
ALTER TABLE `hr_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_product`
--
ALTER TABLE `master_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_service`
--
ALTER TABLE `master_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_comment`
--
ALTER TABLE `tm_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tm_task`
--
ALTER TABLE `tm_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hr_designation`
--
ALTER TABLE `hr_designation`
  ADD CONSTRAINT `hr_designation_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `hr_position` (`position_id`),
  ADD CONSTRAINT `hr_designation_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`employee_id`);

--
-- Constraints for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD CONSTRAINT `hr_position_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `hr_position_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `hr_position` (`position_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `master_product`
--
ALTER TABLE `master_product`
  ADD CONSTRAINT `master_product_ibfk_1` FOREIGN KEY (`product_parent`) REFERENCES `master_product` (`product_id`);

--
-- Constraints for table `master_service`
--
ALTER TABLE `master_service`
  ADD CONSTRAINT `master_service_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `master_product` (`product_id`),
  ADD CONSTRAINT `master_service_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `crm_customer` (`customer_id`);

--
-- Constraints for table `master_user`
--
ALTER TABLE `master_user`
  ADD CONSTRAINT `master_user_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`employee_id`),
  ADD CONSTRAINT `master_user_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `hr_position` (`position_id`);

--
-- Constraints for table `tm_comment`
--
ALTER TABLE `tm_comment`
  ADD CONSTRAINT `tm_comment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tm_task` (`task_id`),
  ADD CONSTRAINT `tm_comment_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`employee_id`),
  ADD CONSTRAINT `tm_comment_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `hr_position` (`position_id`);

--
-- Constraints for table `tm_task`
--
ALTER TABLE `tm_task`
  ADD CONSTRAINT `tm_task_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `master_service` (`service_id`),
  ADD CONSTRAINT `tm_task_ibfk_2` FOREIGN KEY (`employee_sent`) REFERENCES `hr_employee` (`employee_id`),
  ADD CONSTRAINT `tm_task_ibfk_3` FOREIGN KEY (`employee_destination`) REFERENCES `hr_employee` (`employee_id`),
  ADD CONSTRAINT `tm_task_ibfk_4` FOREIGN KEY (`department_sent`) REFERENCES `hr_department` (`department_id`),
  ADD CONSTRAINT `tm_task_ibfk_5` FOREIGN KEY (`department_destination`) REFERENCES `hr_department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
