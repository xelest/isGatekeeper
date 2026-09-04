-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 08:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mclccisn_gatekeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id_no` varchar(30) NOT NULL,
  `pass_word` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `acc_type` varchar(30) NOT NULL,
  `acc_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id_no`, `pass_word`, `lastname`, `firstname`, `acc_type`, `acc_status`) VALUES
('2000000007', '1', 'Cabrera', 'Zoe', 'College', 'Active'),
('2000000008', '1', 'Delgado', 'Lanie', 'Admin', 'Active'),
('2000000009', '1', 'Fajardo', 'Faye', 'Teacher', 'Active'),
('2000000010', '1', 'Bacani', 'Bennett', 'College', 'Active'),
('2000000011', '1', 'Carpio', 'Elias', 'College', 'Active'),
('2000000012', '1', 'Zamora', 'Marco', 'College', 'Active'),
('2000000013', '1', 'Ubaldo', 'Yuri', 'College', 'Active'),
('2000000014', '1', 'Espino', 'Bianca', 'Admin', 'Active'),
('2000000016', '1', 'Sarmiento', 'Kurt', 'College', 'Active'),
('2000000017', '1', 'Alcantara', 'Timo', 'College', 'Active'),
('2000000018', '1', 'Tolentino', 'Hazel', 'SHS', 'Active'),
('2000000019', '1', 'Quiambao', 'Jenna', 'Admin', 'Active'),
('2000000020', '1', 'Ibarra', 'Rico', 'College', 'Active'),
('2000000022', '1', 'Padilla', 'Nadine', 'Teacher', 'Active'),
('2000000023', '1', 'Ventura', 'Oliver', 'College', 'Active'),
('2000000025', '1', 'Lacson', 'Wesley', 'College', 'Active'),
('2000000027', '1', 'Andrada', 'Kurt', 'SHS', 'Active'),
('2000000028', '1', 'Ortega', 'Gabriel', 'SHS', 'Active'),
('2000000029', '1', 'Jimenez', 'Aaron', 'SHS', 'Active'),
('2000000030', '1', 'Herrera', 'Ximena', 'SHS', 'Active'),
('2000000031', '1', 'Cabrera', 'Divina', 'SHS', 'Active'),
('2000000041', '1', 'testuser1', 'testuser1', 'College', 'Active'),
('2000000042', '1', 'testuser2', 'testuser2', 'Teacher', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
