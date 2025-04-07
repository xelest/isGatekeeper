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
('2014380025', '1', 'Beredo', 'Tommy', 'College', 'Active'),
('2015102011', '1', 'Chua', 'Jan Edward', 'Admin', 'Active'),
('2015102424', '1', 'Flores', 'Cedric', 'Teacher', 'Active'),
('2015102425', '1', 'Soliven', 'Zeke', 'College', 'Active'),
('2015102426', '1', 'Tamisin', 'Broan', 'College', 'Active'),
('2015102427', '1', 'Rondilla', 'John', 'College', 'Active'),
('2015102428', '1', 'Paz', 'Patrick', 'College', 'Active'),
('2015102429', '1', 'Fidel', 'Angelo', 'Admin', 'Active'),
('2015102431', '1', 'Monserrate', 'James', 'College', 'Active'),
('2015102432', '1', 'Sobrevinas', 'Lester', 'College', 'Active'),
('2015102433', '1', 'Nuval', 'Cyrhene', 'SHS', 'Active'),
('2015102434', '1', 'Magbanua', 'Ivan', 'Admin', 'Active'),
('2015130013', '1', 'Gonzaga', 'Justine', 'College', 'Active'),
('2015380013', '1', 'Lazaga', 'Joseph', 'Teacher', 'Active'),
('2015380017', '1', 'Quinto', 'Joviel', 'College', 'Active'),
('2016180067', '1', 'Hernandez', 'Mark', 'College', 'Active'),
('2017000001', '1', 'Arganda', 'James', 'SHS', 'Active'),
('2017000002', '1', 'Laus', 'Clarisse', 'SHS', 'Active'),
('2017000003', '1', 'Gonzales', 'Adrian', 'SHS', 'Active'),
('2017000004', '1', 'Gilos', 'Mia', 'SHS', 'Active'),
('2017000005', '1', 'Beredo', 'Anton', 'SHS', 'Active'),
('2020180001', '1', 'testuser1', 'testuser1', 'College', 'Active'),
('2020180002', '1', 'testuser2', 'testuser2', 'Teacher', 'Active');

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
