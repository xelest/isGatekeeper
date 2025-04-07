-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 06:22 PM
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
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `attendance_id` int(11) NOT NULL,
  `handled_id` int(11) NOT NULL,
  `date_record` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`attendance_id`, `handled_id`, `date_record`) VALUES
(2, 1, '2020-02-23'),
(3, 2, '2020-02-23'),
(4, 4, '2020-01-23'),
(5, 4, '2020-01-22'),
(6, 4, '2020-02-21'),
(7, 4, '2020-02-20'),
(8, 3, '2020-02-23'),
(9, 5, '2020-02-23'),
(10, 0, '2020-03-04'),
(11, 0, '2020-03-05'),
(12, 0, '2020-03-25'),
(13, 0, '2020-01-23'),
(14, 0, '2020-02-27'),
(15, 0, '2020-03-18'),
(16, 0, NULL),
(17, 0, '2020-02-25'),
(18, 0, '2020-02-14'),
(19, 0, '2020-01-22'),
(20, 0, '2020-01-15'),
(21, 0, '2020-03-12'),
(22, 0, '2020-03-18'),
(23, 0, '2020-02-12'),
(24, 0, '2020-03-05'),
(25, 0, '2020-01-23'),
(26, 0, '2020-01-22'),
(27, 0, '2020-01-09'),
(28, 0, '2020-02-27'),
(29, 0, '2020-02-05'),
(30, 0, '2020-03-25'),
(31, 0, '2020-02-20'),
(32, 0, '2020-01-07'),
(33, 0, '2020-02-12'),
(34, 0, '2020-02-06'),
(35, 0, '2020-02-27'),
(36, 0, '2020-03-18'),
(37, 0, '2020-02-20'),
(38, 0, '2020-03-18'),
(39, 0, '2020-03-03'),
(40, 0, '2020-01-07'),
(41, 0, '2020-01-28'),
(44, 3, '2020-02-27'),
(45, 4, '2020-02-27'),
(50, 2, '2020-02-28'),
(51, 5, '2020-02-28'),
(52, 3, '2020-02-28'),
(53, 1, '2020-02-28'),
(54, 4, '2020-02-28'),
(56, 2, '2020-03-12'),
(59, 1, '2020-03-12'),
(61, 6, '2020-03-12'),
(62, 3, '2020-03-12'),
(63, 4, '2020-03-12'),
(65, 1, '2020-03-21'),
(69, 6, '2020-03-21'),
(73, 4, '2020-03-21'),
(74, 2, '2020-03-21'),
(75, 3, '2020-03-21'),
(79, 4, '2020-03-22'),
(80, 1, '2020-03-25'),
(81, 2, '2020-03-25'),
(82, 6, '2020-03-25'),
(88, 2, '2020-03-31'),
(89, 3, '2020-03-28'),
(91, 4, '2020-03-28'),
(92, 4, '2020-03-29'),
(93, 6, '2020-03-28'),
(94, 1, '2020-03-28'),
(96, 1, '2020-03-29'),
(97, 2, '2020-05-07'),
(98, 6, '2020-05-10'),
(99, 6, '2020-05-07'),
(100, 1, '2020-05-20'),
(101, 1, '2020-05-23'),
(102, 1, '2020-06-05'),
(104, 2, '2020-06-05'),
(105, 1, '2020-06-12'),
(107, 1, '2020-06-08'),
(108, 1, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `attnmessage`
--

CREATE TABLE `attnmessage` (
  `imsg_no` int(11) NOT NULL,
  `imsg_details` text NOT NULL,
  `imsg_sender` text NOT NULL,
  `id_no` int(11) NOT NULL,
  `imsg_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `imsg_Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attnmessage`
--

INSERT INTO `attnmessage` (`imsg_no`, `imsg_details`, `imsg_sender`, `id_no`, `imsg_Date`, `imsg_Status`) VALUES
(1, 'Please report ', 'CCIS Faculty', 2015380013, '2021-01-15 08:08:28', 'Active'),
(2, 'Please get your results', 'Clinic', 2015102434, '2021-01-15 08:07:42', 'Active'),
(3, 'Please report for presentation', 'MITL Faculty', 2015102433, '2021-01-14 23:59:17', 'Active'),
(4, 'Requirements Submission', 'Admission\'s Office', 2016180067, '2021-01-15 17:42:52', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `authorized_devices`
--

CREATE TABLE `authorized_devices` (
  `device_physical_address` varchar(17) NOT NULL,
  `device_hostname` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `day_no` int(50) NOT NULL,
  `calendar_dates` date NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`day_no`, `calendar_dates`, `remarks`) VALUES
(1, '2021-01-04', ''),
(2, '2021-01-05', ''),
(3, '2021-01-06', ''),
(4, '2021-01-07', ''),
(5, '2021-01-08', ''),
(6, '2021-01-09', ''),
(7, '2021-01-11', ''),
(8, '2021-01-12', ''),
(9, '2021-01-13', ''),
(10, '2021-01-14', ''),
(11, '2021-01-15', ''),
(12, '2021-01-16', ''),
(13, '2021-01-18', ''),
(14, '2021-01-19', ''),
(15, '2021-01-20', ''),
(16, '2021-01-21', ''),
(17, '2021-01-22', ''),
(18, '2021-01-23', ''),
(19, '2021-01-25', ''),
(20, '2021-01-26', ''),
(21, '2021-01-27', ''),
(22, '2021-01-28', ''),
(23, '2021-01-29', ''),
(24, '2021-01-30', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `count in`
-- (See below for the actual view)
--
CREATE TABLE `count in` (
`log_no` int(11)
,`rf_id` int(11)
,`id_no` int(11)
,`inDate` datetime
,`COUNT(``inDate``)` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `count out`
-- (See below for the actual view)
--
CREATE TABLE `count out` (
`log_no` int(11)
,`rf_id` int(11)
,`id_no` int(11)
,`outDate` datetime
,`COUNT(``outDate``)` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `course_record`
--

CREATE TABLE `course_record` (
  `course_code` varchar(30) NOT NULL,
  `course_desc` varchar(50) NOT NULL,
  `dept` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_record`
--

INSERT INTO `course_record` (`course_code`, `course_desc`, `dept`) VALUES
('ENG001', 'Reading and Writing', 'SHS'),
('ENG002', 'Research', 'SHS'),
('ENG003', 'Public Speaking', 'SHS'),
('IT100P', 'Flowcharts', 'College'),
('IT110P', 'C++', 'College'),
('IT111P', 'C#', 'College'),
('IT180P', 'Mobile and Web Project', 'College'),
('MATH001', 'Advance Algebra', 'SHS'),
('PE01', 'Physical Fitness', 'SHS'),
('VE014', 'Values Education', 'College');

-- --------------------------------------------------------

--
-- Table structure for table `guardianinfo`
--

CREATE TABLE `guardianinfo` (
  `guardian_no` text NOT NULL,
  `Gname` text NOT NULL,
  `id_no` int(11) NOT NULL,
  `email` text NOT NULL,
  `pword` text NOT NULL,
  `mobile_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `handled_course`
--

CREATE TABLE `handled_course` (
  `handled_id` int(11) NOT NULL,
  `course_code` varchar(30) DEFAULT NULL,
  `id_no` varchar(30) DEFAULT NULL,
  `class_sec` varchar(10) NOT NULL,
  `start_class` time NOT NULL,
  `end_class` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `handled_course`
--

INSERT INTO `handled_course` (`handled_id`, `course_code`, `id_no`, `class_sec`, `start_class`, `end_class`) VALUES
(1, 'IT180P', '2015102424', 'A54', '08:30:00', '10:00:00'),
(2, 'IT111P', '2015102424', 'A54', '07:00:00', '08:30:00'),
(3, 'IT180P', '2015102433', 'A45', '07:00:00', '08:30:00'),
(4, 'VE014', '2015102433', 'A54', '14:30:00', '16:00:00'),
(5, 'VE014', '2015102434', 'A46', '07:00:00', '08:30:00'),
(6, 'IT180P', '2015102424', 'A55', '13:00:00', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `mcl_departments`
--

CREATE TABLE `mcl_departments` (
  `dept_code` tinytext NOT NULL,
  `dept_name` text NOT NULL,
  `dept_head` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcl_departments`
--

INSERT INTO `mcl_departments` (`dept_code`, `dept_name`, `dept_head`) VALUES
('CCIS', 'College of Computer and Information Science', 'Kikuchi, Khristian'),
('ETYCB', 'ET Yuchengco College of Business', 'Austria, Maria Rhodora'),
('CAS', 'College of Arts and Science', 'Hofilena, Joy'),
('MITL', 'Mapúa Institute of Technology at Laguna', ''),
('CMET', 'Mapúa-PTC College of Maritime Education and Training', 'Geguiento, Edgardo'),
('MITL', 'Mapúa Institute of Technology at Laguna', 'Medrano, Anthony Hilmer');

-- --------------------------------------------------------

--
-- Table structure for table `mmobileusers`
--

CREATE TABLE `mmobileusers` (
  `muid` text NOT NULL,
  `mmobileuser` text NOT NULL,
  `mmobilepword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mmobile_msgs`
--

CREATE TABLE `mmobile_msgs` (
  `msg_no` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `guardian_no` int(11) NOT NULL,
  `msg` text NOT NULL,
  `msgDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `reports_admin`
--

CREATE TABLE `reports_admin` (
  `id_no` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `TimeIn` varchar(10) NOT NULL,
  `TimeOut` varchar(10) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports_admin`
--

INSERT INTO `reports_admin` (`id_no`, `Firstname`, `Lastname`, `Date`, `TimeIn`, `TimeOut`, `Duration`, `Remarks`) VALUES
(2015102429, 'Angelo', 'Fidel', '2021-01-15', '07:09:01', '16:42:33', '09 hours and 00 minutes |', 'LATE'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-04', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-05', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-06', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-07', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-08', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-09', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-11', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-12', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-13', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-14', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-15', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-16', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-18', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-19', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-20', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-21', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-22', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-23', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-25', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-26', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-27', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-28', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-29', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-30', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-04', '06:53:37', '16:33:28', '09 hours and 00 minutes |', 'ONTIME'),
(2015102429, 'Angelo', 'Fidel', '2021-01-05', '07:04:15', '16:43:47', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-06', '07:11:21', '16:41:40', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-07', '07:12:32', '17:39:24', '10 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-08', '07:02:52', '16:47:37', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-09', '07:11:38', '16:58:28', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-11', '06:54:07', '17:32:43', '10 hours and 00 minutes |', 'ONTIME'),
(2015102429, 'Angelo', 'Fidel', '2021-01-12', '06:55:10', '16:44:14', '09 hours and 00 minutes |', 'ONTIME'),
(2015102429, 'Angelo', 'Fidel', '2021-01-13', '07:06:10', '16:38:43', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-14', '06:57:09', '16:40:57', '09 hours and 00 minutes |', 'ONTIME'),
(2015102429, 'Angelo', 'Fidel', '2021-01-15', '07:09:01', '16:42:33', '09 hours and 00 minutes |', 'LATE'),
(2015102429, 'Angelo', 'Fidel', '2021-01-16', '00:16:19', 'ND', 'cannot compute', 'ONTIME'),
(2015102429, 'Angelo', 'Fidel', '2021-01-18', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-19', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-20', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-21', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-22', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-23', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-25', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-26', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-27', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-28', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-29', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102429, 'Angelo', 'Fidel', '2021-01-30', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-04', '06:55:20', '17:13:54', '10 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-05', '06:50:44', '16:38:36', '09 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-06', '06:59:25', '17:14:48', '10 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-07', '06:51:12', '17:06:13', 'cannot compute', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-08', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-09', '07:11:03', '17:37:26', '10 hours and 00 minutes |', 'LATE'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-11', '06:52:28', '17:14:28', '10 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-12', '07:00:39', '16:50:42', '09 hours and 00 minutes |', 'LATE'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-13', '06:55:18', '16:30:16', '09 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-14', '07:05:54', '16:33:07', '09 hours and 00 minutes |', 'LATE'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-15', '06:56:08', '17:07:09', '10 hours and 00 minutes |', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-16', '06:54:50', 'ND', 'cannot compute', 'ONTIME'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-18', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-19', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-20', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-21', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-22', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-23', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-25', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-26', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-27', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-28', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-29', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102434, 'Ivan', 'Magbanua', '2021-01-30', 'ND', 'ND', 'ND', 'ABSENT'),
(2015102011, 'Jan Edward', 'Chua', '2021-01-04', 'ND', 'ND', 'ND', 'ABSENT');

-- --------------------------------------------------------

--
-- Table structure for table `rfaccounts`
--

CREATE TABLE `rfaccounts` (
  `rf_id` varchar(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `passkey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rfaccounts`
--

INSERT INTO `rfaccounts` (`rf_id`, `id_no`, `passkey`) VALUES
('1707F060', 0, ''),
('8726F75F', 2016180067, ''),
('879E1861', 2015102434, ''),
('979C0460', 2015102429, ''),
('993226BA', 0, ''),
('C79CFC5F', 2015380013, ''),
('E94775B3', 2015102433, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `handled_id` int(11) NOT NULL,
  `student_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`handled_id`, `student_id`) VALUES
(3, '2015102429'),
(3, '2015102430'),
(3, '2015102431'),
(3, '2015102432'),
(4, '2015102425'),
(4, '2015102426'),
(4, '2015102427'),
(4, '2015102428'),
(4, '2015102429'),
(4, '2014380025'),
(1, '2015102425'),
(1, '2015102426'),
(2, '2015102425'),
(2, '2015102426'),
(2, '2015102427'),
(2, '2015102428'),
(2, '2015102429'),
(5, '2015102429'),
(5, '2015102430'),
(5, '2015102431'),
(5, '2015102432'),
(6, '2015102427'),
(6, '2015102428');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `attendance_id` int(11) NOT NULL,
  `id_no` varchar(30) NOT NULL,
  `attendance_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`attendance_id`, `id_no`, `attendance_status`) VALUES
(2, '2015102425', 'Absent'),
(2, '2015102426', 'Present'),
(3, '2015102425', 'Absent'),
(3, '2015102426', 'Absent'),
(3, '2015102427', 'Absent'),
(3, '2015102428', 'Absent'),
(3, '2015102429', 'Absent'),
(4, '2015102425', 'Late'),
(4, '2015102426', 'Absent'),
(4, '2015102427', 'Late'),
(4, '2015102428', 'Absent'),
(4, '2015102429', 'Late'),
(5, '2015102425', 'Present'),
(5, '2015102426', 'Absent'),
(5, '2015102427', 'Present'),
(5, '2015102428', 'Absent'),
(5, '2015102429', 'Present'),
(6, '2015102425', 'Present'),
(6, '2015102426', 'Present'),
(6, '2015102427', 'Present'),
(6, '2015102428', 'Present'),
(6, '2015102429', 'Present'),
(7, '2015102425', 'Present'),
(7, '2015102426', 'Present'),
(7, '2015102427', 'Present'),
(7, '2015102428', 'Present'),
(7, '2015102429', 'Present'),
(8, '2015102429', 'Late'),
(8, '2015102430', 'Absent'),
(8, '2015102431', 'Present'),
(8, '2015102432', 'Present'),
(9, '2015102429', 'Absent'),
(9, '2015102430', 'Absent'),
(9, '2015102431', 'Absent'),
(9, '2015102432', 'Absent'),
(10, '2015380013', 'Absent'),
(11, '2015130013', 'Absent'),
(13, '2016180067', 'Late'),
(14, '2016180067', 'Present'),
(14, '2015380017', 'Absent'),
(15, '2015380017', 'Late'),
(7, '2014380025', 'Present'),
(17, '2017000001', 'Present'),
(18, '2017000001', 'Absent'),
(19, '2017000002', 'Late'),
(20, '2017000001', 'Present'),
(21, '2017000001', 'Present'),
(22, '2017000002', 'Late'),
(23, '2017000002', 'Late'),
(24, '2017000002', 'Late'),
(25, '2017000002', 'Late'),
(26, '2017000002', 'Late'),
(27, '2017000003', 'Absent'),
(28, '2017000003', 'Absent'),
(29, '2017000003', 'Absent'),
(30, '2017000003', 'Absent'),
(31, '2017000003', 'Absent'),
(32, '2017000004', 'Present'),
(33, '2017000004', 'Present'),
(34, '2017000004', 'Present'),
(35, '2017000004', 'Present'),
(36, '2017000004', 'Present'),
(37, '2017000005', 'Present'),
(38, '2017000005', 'Present'),
(39, '2017000005', 'Present'),
(41, '2017000005', 'Present'),
(40, '2017000005', 'Present'),
(44, '2015102429', 'Late'),
(44, '2015102430', 'Late'),
(44, '2015102431', 'Late'),
(44, '2015102432', 'Late'),
(45, '2015102425', 'Absent'),
(45, '2015102426', 'Absent'),
(45, '2015102427', 'Absent'),
(45, '2015102428', 'Absent'),
(45, '2015102429', 'Absent'),
(50, '2015102425', 'Present'),
(50, '2015102426', 'Present'),
(50, '2015102427', 'Absent'),
(50, '2015102428', 'Absent'),
(50, '2015102429', 'Absent'),
(51, '2015102429', 'Absent'),
(51, '2015102430', 'Absent'),
(51, '2015102431', 'Absent'),
(51, '2015102432', 'Absent'),
(52, '2015102429', 'Absent'),
(52, '2015102430', 'Absent'),
(52, '2015102431', 'Absent'),
(52, '2015102432', 'Absent'),
(53, '2015102425', 'Present'),
(53, '2015102426', 'Present'),
(54, '2015102425', 'Absent'),
(54, '2015102426', 'Present'),
(54, '2015102427', 'Present'),
(54, '2015102428', 'Absent'),
(54, '2015102429', 'Absent'),
(54, '2014380025', 'Absent'),
(56, '2015102425', 'Absent'),
(56, '2015102426', 'Absent'),
(56, '2015102427', 'Absent'),
(56, '2015102428', 'Absent'),
(56, '2015102429', 'Absent'),
(59, '2015102425', 'Absent'),
(59, '2015102426', 'Absent'),
(61, '2015102427', 'Absent'),
(61, '2015102428', 'Absent'),
(62, '2015102429', 'Absent'),
(62, '2015102430', 'Absent'),
(62, '2015102431', 'Absent'),
(62, '2015102432', 'Absent'),
(63, '2015102425', 'Absent'),
(63, '2015102426', 'Absent'),
(63, '2015102427', 'Absent'),
(63, '2015102428', 'Absent'),
(63, '2015102429', 'Absent'),
(63, '2014380025', 'Absent'),
(65, '2015102425', 'Absent'),
(65, '2015102426', 'Absent'),
(69, '2015102427', 'Absent'),
(69, '2015102428', 'Absent'),
(73, '2015102425', 'Absent'),
(73, '2015102426', 'Absent'),
(73, '2015102427', 'Absent'),
(73, '2015102428', 'Absent'),
(73, '2015102429', 'Absent'),
(73, '2014380025', 'Absent'),
(74, '2015102425', 'Absent'),
(74, '2015102426', 'Absent'),
(74, '2015102427', 'Absent'),
(74, '2015102428', 'Absent'),
(74, '2015102429', 'Absent'),
(75, '2015102429', 'Absent'),
(75, '2015102430', 'Absent'),
(75, '2015102431', 'Absent'),
(75, '2015102432', 'Absent'),
(79, '2015102425', 'Absent'),
(79, '2015102426', 'Absent'),
(79, '2015102427', 'Absent'),
(79, '2015102428', 'Absent'),
(79, '2015102429', 'Absent'),
(79, '2014380025', 'Absent'),
(80, '2015102425', 'Absent'),
(80, '2015102426', 'Absent'),
(81, '2015102425', 'Absent'),
(81, '2015102426', 'Absent'),
(81, '2015102427', 'Absent'),
(81, '2015102428', 'Absent'),
(81, '2015102429', 'Absent'),
(82, '2015102427', 'Absent'),
(82, '2015102428', 'Absent'),
(88, '2015102425', 'Absent'),
(88, '2015102426', 'Absent'),
(88, '2015102427', 'Absent'),
(88, '2015102428', 'Absent'),
(88, '2015102429', 'Absent'),
(89, '2015102429', 'Absent'),
(89, '2015102430', 'Absent'),
(89, '2015102431', 'Absent'),
(89, '2015102432', 'Absent'),
(91, '2015102425', 'Absent'),
(91, '2015102426', 'Absent'),
(91, '2015102427', 'Absent'),
(91, '2015102428', 'Absent'),
(91, '2015102429', 'Absent'),
(91, '2014380025', 'Absent'),
(92, '2015102425', 'Absent'),
(92, '2015102426', 'Absent'),
(92, '2015102427', 'Absent'),
(92, '2015102428', 'Absent'),
(92, '2015102429', 'Absent'),
(92, '2014380025', 'Absent'),
(93, '2015102427', 'Absent'),
(93, '2015102428', 'Absent'),
(94, '2015102425', 'Absent'),
(94, '2015102426', 'Absent'),
(96, '2015102425', 'Absent'),
(96, '2015102426', 'Absent'),
(97, '2015102425', 'N/R'),
(97, '2015102426', 'N/R'),
(97, '2015102427', 'N/R'),
(97, '2015102428', 'N/R'),
(97, '2015102429', 'N/R'),
(98, '2015102427', 'N/R'),
(98, '2015102428', 'N/R'),
(99, '2015102427', 'N/R'),
(99, '2015102428', 'N/R'),
(100, '2015102425', 'N/R'),
(100, '2015102426', 'N/R'),
(101, '2015102425', 'N/R'),
(101, '2015102426', 'N/R'),
(102, '2015102425', 'Present'),
(102, '2015102426', 'Late'),
(104, '2015102425', 'Present'),
(104, '2015102426', 'Present'),
(104, '2015102427', 'Present'),
(104, '2015102428', 'Present'),
(104, '2015102429', 'Late'),
(105, '2015102425', 'N/R'),
(105, '2015102426', 'N/R'),
(107, '2015102425', 'N/R'),
(107, '2015102426', 'N/R'),
(108, '2015102425', 'N/R'),
(108, '2015102426', 'N/R');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `log_no` int(11) NOT NULL,
  `action` text NOT NULL,
  `log_date` datetime NOT NULL DEFAULT current_timestamp(),
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `systemusers`
--

CREATE TABLE `systemusers` (
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `pword` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `urole` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemusers`
--

INSERT INTO `systemusers` (`uid`, `uname`, `pword`, `status`, `urole`) VALUES
(1, 'admin', 'a147c25f4b18563249aa0291b780cf08', 'A', 'SystemAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `tapin_logs`
--

CREATE TABLE `tapin_logs` (
  `log_no` int(11) NOT NULL,
  `rf_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `inDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapin_logs`
--

INSERT INTO `tapin_logs` (`log_no`, `rf_id`, `id_no`, `inDate`) VALUES
(1, 0, 2016180067, '2021-01-04 07:09:16'),
(2, 0, 2015380013, '2021-01-04 06:53:19'),
(3, 0, 2015102429, '2021-01-04 06:53:37'),
(4, 0, 2015102434, '2021-01-04 06:55:20'),
(5, 0, 2015102433, '2021-01-04 07:03:05'),
(6, 0, 2015180061, '2021-01-04 06:59:35'),
(7, 0, 2013380018, '2021-01-04 07:07:19'),
(8, 0, 2017102425, '2021-01-04 06:54:46'),
(9, 0, 2018102686, '2021-01-04 06:52:17'),
(10, 0, 2018102417, '2021-01-04 06:56:39'),
(11, 0, 2012180162, '2021-01-04 07:13:24'),
(12, 0, 2016180067, '2021-01-04 09:55:14'),
(13, 0, 2015380013, '2021-01-04 09:40:31'),
(14, 0, 2015102429, '2021-01-04 09:48:45'),
(15, 0, 2015102434, '2021-01-04 09:49:26'),
(16, 0, 2015102433, '2021-01-04 09:54:15'),
(17, 0, 2015180061, '2021-01-04 09:59:27'),
(18, 0, 2013380018, '2021-01-04 09:42:13'),
(19, 0, 2017102425, '2021-01-04 09:44:32'),
(20, 0, 2018102686, '2021-01-04 09:35:15'),
(21, 0, 2018102417, '2021-01-04 09:49:29'),
(22, 0, 2012180162, '2021-01-04 09:38:05'),
(23, 0, 2016180067, '2021-01-04 12:24:07'),
(24, 0, 2015380013, '2021-01-04 12:14:37'),
(25, 0, 2015102429, '2021-01-04 12:21:37'),
(26, 0, 2015102434, '2021-01-04 12:15:12'),
(27, 0, 2015102433, '2021-01-04 12:04:18'),
(28, 0, 2015180061, '2021-01-04 12:16:46'),
(29, 0, 2013380018, '2021-01-04 12:37:42'),
(30, 0, 2017102425, '2021-01-04 12:15:43'),
(31, 0, 2018102686, '2021-01-04 12:00:36'),
(32, 0, 2018102417, '2021-01-04 12:22:29'),
(33, 0, 2012180162, '2021-01-04 12:15:17'),
(34, 0, 2016180067, '2021-01-04 15:35:15'),
(35, 0, 2015380013, '2021-01-04 15:55:17'),
(36, 0, 2015102429, '2021-01-04 15:54:25'),
(37, 0, 2015102434, '2021-01-04 15:38:05'),
(38, 0, 2015102433, '2021-01-04 15:49:16'),
(39, 0, 2015180061, '2021-01-04 15:54:10'),
(40, 0, 2013380018, '2021-01-04 15:45:47'),
(41, 0, 2017102425, '2021-01-04 15:40:14'),
(42, 0, 2018102686, '2021-01-04 15:48:22'),
(43, 0, 2018102417, '2021-01-04 15:17:32'),
(44, 0, 2012180162, '2021-01-04 15:55:15'),
(45, 0, 2016180067, '2021-01-04 16:41:07'),
(46, 0, 2015380013, '2021-01-04 16:00:12'),
(47, 0, 2015102429, '2021-01-04 16:21:10'),
(48, 0, 2015102434, '2021-01-04 16:49:27'),
(49, 0, 2015102433, '2021-01-04 16:17:22'),
(50, 0, 2015180061, '2021-01-04 16:35:40'),
(51, 0, 2013380018, '2021-01-04 16:19:07'),
(52, 0, 2017102425, '2021-01-04 16:35:25'),
(53, 0, 2018102686, '2021-01-04 16:22:34'),
(54, 0, 2018102417, '2021-01-04 16:33:03'),
(55, 0, 2012180162, '2021-01-04 16:14:54'),
(56, 0, 2016180067, '2021-01-05 06:57:33'),
(57, 0, 2015380013, '2021-01-05 07:12:03'),
(58, 0, 2015102429, '2021-01-05 07:04:15'),
(59, 0, 2015102434, '2021-01-05 06:50:44'),
(60, 0, 2015102433, '2021-01-05 07:06:46'),
(61, 0, 2015180061, '2021-01-05 07:03:30'),
(62, 0, 2013380018, '2021-01-05 07:00:26'),
(63, 0, 2017102425, '2021-01-05 06:57:55'),
(64, 0, 2018102686, '2021-01-05 07:13:23'),
(65, 0, 2018102417, '2021-01-05 07:13:44'),
(66, 0, 2012180162, '2021-01-05 06:53:12'),
(67, 0, 2016180067, '2021-01-05 09:48:59'),
(68, 0, 2015380013, '2021-01-05 09:58:18'),
(69, 0, 2015102429, '2021-01-05 09:49:45'),
(70, 0, 2015102434, '2021-01-05 09:47:19'),
(71, 0, 2015102433, '2021-01-05 09:59:44'),
(72, 0, 2015180061, '2021-01-05 09:54:26'),
(73, 0, 2013380018, '2021-01-05 09:31:01'),
(74, 0, 2017102425, '2021-01-05 09:43:09'),
(75, 0, 2018102686, '2021-01-05 09:38:57'),
(76, 0, 2018102417, '2021-01-05 09:46:18'),
(77, 0, 2012180162, '2021-01-05 09:37:59'),
(78, 0, 2016180067, '2021-01-05 12:01:54'),
(79, 0, 2015380013, '2021-01-05 11:55:59'),
(80, 0, 2015102429, '2021-01-05 12:08:53'),
(81, 0, 2015102434, '2021-01-05 12:21:10'),
(82, 0, 2015102433, '2021-01-05 12:17:42'),
(83, 0, 2015180061, '2021-01-05 12:04:04'),
(84, 0, 2013380018, '2021-01-05 12:16:33'),
(85, 0, 2017102425, '2021-01-05 12:13:43'),
(86, 0, 2018102686, '2021-01-05 11:50:25'),
(87, 0, 2018102417, '2021-01-05 12:24:26'),
(88, 0, 2012180162, '2021-01-05 12:18:04'),
(89, 0, 2016180067, '2021-01-05 15:41:02'),
(90, 0, 2015380013, '2021-01-05 15:49:11'),
(91, 0, 2015102429, '2021-01-05 15:33:01'),
(92, 0, 2015102434, '2021-01-05 15:26:54'),
(93, 0, 2015102433, '2021-01-05 15:44:05'),
(94, 0, 2015180061, '2021-01-05 15:38:09'),
(95, 0, 2013380018, '2021-01-05 15:42:11'),
(96, 0, 2017102425, '2021-01-05 15:35:50'),
(97, 0, 2018102686, '2021-01-05 15:23:14'),
(98, 0, 2018102417, '2021-01-05 15:35:42'),
(99, 0, 2012180162, '2021-01-05 15:51:40'),
(100, 0, 2016180067, '2021-01-05 16:27:23'),
(101, 0, 2015380013, '2021-01-05 16:09:43'),
(102, 0, 2015102429, '2021-01-05 16:18:44'),
(103, 0, 2015102434, '2021-01-05 16:16:11'),
(104, 0, 2015102433, '2021-01-05 16:39:47'),
(105, 0, 2015180061, '2021-01-05 16:19:40'),
(106, 0, 2013380018, '2021-01-05 16:23:28'),
(107, 0, 2017102425, '2021-01-05 16:22:05'),
(108, 0, 2018102686, '2021-01-05 16:04:32'),
(109, 0, 2018102417, '2021-01-05 16:47:21'),
(110, 0, 2012180162, '2021-01-05 17:02:13'),
(111, 0, 2016180067, '2021-01-06 07:11:59'),
(112, 0, 2015380013, '2021-01-06 06:50:14'),
(113, 0, 2015102429, '2021-01-06 07:11:21'),
(114, 0, 2015102434, '2021-01-06 06:59:25'),
(115, 0, 2015102433, '2021-01-06 07:11:18'),
(116, 0, 2015180061, '2021-01-06 07:02:37'),
(117, 0, 2013380018, '2021-01-06 06:50:18'),
(118, 0, 2017102425, '2021-01-06 07:09:01'),
(119, 0, 2018102686, '2021-01-06 07:11:22'),
(120, 0, 2018102417, '2021-01-06 07:06:03'),
(121, 0, 2012180162, '2021-01-06 07:12:32'),
(122, 0, 2016180067, '2021-01-06 09:55:27'),
(123, 0, 2015380013, '2021-01-06 09:55:53'),
(124, 0, 2015102429, '2021-01-06 09:37:54'),
(125, 0, 2015102434, '2021-01-06 09:31:30'),
(126, 0, 2015102433, '2021-01-06 09:59:09'),
(127, 0, 2015180061, '2021-01-06 09:43:37'),
(128, 0, 2013380018, '2021-01-06 09:42:01'),
(129, 0, 2017102425, '2021-01-06 09:53:19'),
(130, 0, 2018102686, '2021-01-06 09:45:15'),
(131, 0, 2018102417, '2021-01-06 09:31:55'),
(132, 0, 2012180162, '2021-01-06 09:32:28'),
(133, 0, 2016180067, '2021-01-06 12:15:01'),
(134, 0, 2015380013, '2021-01-06 11:42:03'),
(135, 0, 2015102429, '2021-01-06 12:19:19'),
(136, 0, 2015102434, '2021-01-06 12:39:18'),
(137, 0, 2015102433, '2021-01-06 11:57:37'),
(138, 0, 2015180061, '2021-01-06 12:15:17'),
(139, 0, 2013380018, '2021-01-06 12:16:18'),
(140, 0, 2017102425, '2021-01-06 12:03:24'),
(141, 0, 2018102686, '2021-01-06 11:59:35'),
(142, 0, 2018102417, '2021-01-06 12:15:24'),
(143, 0, 2012180162, '2021-01-06 11:48:01'),
(144, 0, 2016180067, '2021-01-06 15:30:26'),
(145, 0, 2015380013, '2021-01-06 15:25:29'),
(146, 0, 2015102429, '2021-01-06 15:46:00'),
(147, 0, 2015102434, '2021-01-06 15:48:05'),
(148, 0, 2015102433, '2021-01-06 15:39:12'),
(149, 0, 2015180061, '2021-01-06 15:20:52'),
(150, 0, 2013380018, '2021-01-06 15:37:36'),
(151, 0, 2017102425, '2021-01-06 15:51:56'),
(152, 0, 2018102686, '2021-01-06 15:48:39'),
(153, 0, 2018102417, '2021-01-06 15:21:08'),
(154, 0, 2012180162, '2021-01-06 15:27:24'),
(155, 0, 2016180067, '2021-01-06 16:16:48'),
(156, 0, 2015380013, '2021-01-06 16:26:51'),
(157, 0, 2015102429, '2021-01-06 16:10:40'),
(158, 0, 2015102434, '2021-01-06 16:25:06'),
(159, 0, 2015102433, '2021-01-06 16:35:41'),
(160, 0, 2015180061, '2021-01-06 16:36:41'),
(161, 0, 2013380018, '2021-01-06 16:45:06'),
(162, 0, 2017102425, '2021-01-06 16:08:17'),
(163, 0, 2018102686, '2021-01-06 16:51:46'),
(164, 0, 2018102417, '2021-01-06 16:05:10'),
(165, 0, 2012180162, '2021-01-06 16:48:38'),
(166, 0, 2016180067, '2021-01-07 07:10:40'),
(167, 0, 2015380013, '2021-01-07 07:07:43'),
(168, 0, 2015102429, '2021-01-07 07:12:32'),
(169, 0, 2015102434, '2021-01-07 06:51:12'),
(170, 0, 2015102433, '2021-01-07 07:08:53'),
(171, 0, 2015180061, '2021-01-07 06:54:23'),
(172, 0, 2013380018, '2021-01-07 06:59:24'),
(173, 0, 2017102425, '2021-01-07 07:05:39'),
(174, 0, 2018102686, '2021-01-07 06:55:21'),
(175, 0, 2018102417, '2021-01-07 07:01:15'),
(176, 0, 2012180162, '2021-01-07 06:59:39'),
(177, 0, 2016180067, '2021-01-07 09:37:40'),
(178, 0, 2015380013, '2021-01-07 09:53:04'),
(179, 0, 2015102429, '2021-01-07 09:53:54'),
(180, 0, 2015102434, '2021-01-07 09:58:07'),
(181, 0, 2015102433, '2021-01-07 09:50:05'),
(182, 0, 2015180061, '2021-01-07 09:30:21'),
(183, 0, 2013380018, '2021-01-07 09:43:28'),
(184, 0, 2017102425, '2021-01-07 09:30:35'),
(185, 0, 2018102686, '2021-01-07 09:34:38'),
(186, 0, 2018102417, '2021-01-07 09:52:23'),
(187, 0, 2012180162, '2021-01-07 09:38:38'),
(188, 0, 2016180067, '2021-01-07 12:19:18'),
(189, 0, 2015380013, '2021-01-07 12:16:06'),
(190, 0, 2015102429, '2021-01-07 11:57:30'),
(191, 0, 2015102434, '2021-01-07 12:18:15'),
(192, 0, 2015102433, '2021-01-07 12:28:17'),
(193, 0, 2015180061, '2021-01-07 11:47:37'),
(194, 0, 2013380018, '2021-01-07 11:54:46'),
(195, 0, 2017102425, '2021-01-07 12:17:51'),
(196, 0, 2018102686, '2021-01-07 11:49:27'),
(197, 0, 2018102417, '2021-01-07 12:01:09'),
(198, 0, 2012180162, '2021-01-07 12:35:39'),
(199, 0, 2016180067, '2021-01-07 15:28:59'),
(200, 0, 2015380013, '2021-01-07 15:28:00'),
(201, 0, 2015102429, '2021-01-07 15:47:20'),
(202, 0, 2015102434, '2021-01-07 15:50:27'),
(203, 0, 2015102433, '2021-01-07 15:52:07'),
(204, 0, 2015180061, '2021-01-07 15:44:17'),
(205, 0, 2013380018, '2021-01-07 15:30:09'),
(206, 0, 2017102425, '2021-01-07 15:20:39'),
(207, 0, 2018102686, '2021-01-07 15:27:05'),
(208, 0, 2018102417, '2021-01-07 15:52:36'),
(209, 0, 2012180162, '2021-01-07 15:15:01'),
(210, 0, 2016180067, '2021-01-07 16:20:58'),
(211, 0, 2015380013, '2021-01-07 16:22:44'),
(212, 0, 2015102429, '2021-01-07 16:27:36'),
(213, 0, 2015102434, '2021-01-07 17:03:38'),
(214, 0, 2015102433, '2021-01-07 16:44:02'),
(215, 0, 2015180061, '2021-01-07 16:23:11'),
(216, 0, 2013380018, '2021-01-07 16:02:38'),
(217, 0, 2017102425, '2021-01-07 16:49:43'),
(218, 0, 2018102686, '2021-01-07 17:27:02'),
(219, 0, 2018102417, '2021-01-07 17:00:17'),
(220, 0, 2012180162, '2021-01-07 16:20:30'),
(221, 0, 2016180067, '2021-01-08 06:58:10'),
(222, 0, 2015380013, '2021-01-08 07:12:52'),
(223, 0, 2015102429, '2021-01-08 07:02:52'),
(225, 0, 2015102433, '2021-01-08 07:13:13'),
(226, 0, 2015180061, '2021-01-08 07:07:57'),
(227, 0, 2013380018, '2021-01-08 07:04:39'),
(228, 0, 2017102425, '2021-01-08 07:14:27'),
(229, 0, 2018102686, '2021-01-08 07:06:40'),
(230, 0, 2018102417, '2021-01-08 06:58:29'),
(231, 0, 2012180162, '2021-01-08 06:57:23'),
(232, 0, 2016180067, '2021-01-08 09:45:06'),
(233, 0, 2015380013, '2021-01-08 09:45:32'),
(234, 0, 2015102429, '2021-01-08 09:45:45'),
(236, 0, 2015102433, '2021-01-08 09:47:03'),
(237, 0, 2015180061, '2021-01-08 09:57:02'),
(238, 0, 2013380018, '2021-01-08 09:45:31'),
(239, 0, 2017102425, '2021-01-08 09:45:35'),
(240, 0, 2018102686, '2021-01-08 09:50:33'),
(241, 0, 2018102417, '2021-01-08 09:48:54'),
(242, 0, 2012180162, '2021-01-08 09:37:55'),
(243, 0, 2016180067, '2021-01-08 11:51:07'),
(244, 0, 2015380013, '2021-01-08 12:18:57'),
(245, 0, 2015102429, '2021-01-08 12:30:26'),
(247, 0, 2015102433, '2021-01-08 12:22:59'),
(248, 0, 2015180061, '2021-01-08 12:10:42'),
(249, 0, 2013380018, '2021-01-08 12:15:32'),
(250, 0, 2017102425, '2021-01-08 12:29:40'),
(251, 0, 2018102686, '2021-01-08 12:33:04'),
(252, 0, 2018102417, '2021-01-08 11:54:35'),
(253, 0, 2012180162, '2021-01-08 11:41:36'),
(254, 0, 2016180067, '2021-01-08 15:48:19'),
(255, 0, 2015380013, '2021-01-08 15:54:23'),
(256, 0, 2015102429, '2021-01-08 15:45:25'),
(258, 0, 2015102433, '2021-01-08 15:39:41'),
(259, 0, 2015180061, '2021-01-08 15:57:15'),
(260, 0, 2013380018, '2021-01-08 15:35:09'),
(261, 0, 2017102425, '2021-01-08 15:53:14'),
(262, 0, 2018102686, '2021-01-08 15:26:18'),
(263, 0, 2018102417, '2021-01-08 15:55:11'),
(264, 0, 2012180162, '2021-01-08 15:49:26'),
(265, 0, 2016180067, '2021-01-08 16:08:07'),
(266, 0, 2015380013, '2021-01-08 16:34:11'),
(267, 0, 2015102429, '2021-01-08 16:45:49'),
(269, 0, 2015102433, '2021-01-08 16:32:02'),
(270, 0, 2015180061, '2021-01-08 16:24:01'),
(271, 0, 2013380018, '2021-01-08 16:01:42'),
(272, 0, 2017102425, '2021-01-08 16:08:02'),
(273, 0, 2018102686, '2021-01-08 16:06:55'),
(274, 0, 2018102417, '2021-01-08 17:28:45'),
(275, 0, 2012180162, '2021-01-08 16:49:18'),
(276, 0, 2016180067, '2021-01-09 06:57:13'),
(277, 0, 2015380013, '2021-01-09 07:11:08'),
(278, 0, 2015102429, '2021-01-09 07:11:38'),
(279, 0, 2015102434, '2021-01-09 07:11:03'),
(280, 0, 2015102433, '2021-01-09 07:03:06'),
(281, 0, 2015180061, '2021-01-09 06:54:21'),
(282, 0, 2013380018, '2021-01-09 07:05:17'),
(283, 0, 2017102425, '2021-01-09 06:55:03'),
(284, 0, 2018102686, '2021-01-09 06:50:14'),
(285, 0, 2018102417, '2021-01-09 07:05:25'),
(286, 0, 2012180162, '2021-01-09 07:12:08'),
(287, 0, 2016180067, '2021-01-09 09:50:26'),
(288, 0, 2015380013, '2021-01-09 09:59:49'),
(289, 0, 2015102429, '2021-01-09 09:49:49'),
(290, 0, 2015102434, '2021-01-09 09:57:13'),
(291, 0, 2015102433, '2021-01-09 09:45:01'),
(292, 0, 2015180061, '2021-01-09 09:51:40'),
(293, 0, 2013380018, '2021-01-09 09:44:01'),
(294, 0, 2017102425, '2021-01-09 09:35:55'),
(295, 0, 2018102686, '2021-01-09 09:51:25'),
(296, 0, 2018102417, '2021-01-09 09:41:25'),
(297, 0, 2012180162, '2021-01-09 09:45:05'),
(298, 0, 2016180067, '2021-01-09 12:16:41'),
(299, 0, 2015380013, '2021-01-09 12:18:20'),
(300, 0, 2015102429, '2021-01-09 12:15:50'),
(301, 0, 2015102434, '2021-01-09 12:17:22'),
(302, 0, 2015102433, '2021-01-09 12:38:10'),
(303, 0, 2015180061, '2021-01-09 12:16:10'),
(304, 0, 2013380018, '2021-01-09 12:12:54'),
(305, 0, 2017102425, '2021-01-09 12:26:40'),
(306, 0, 2018102686, '2021-01-09 12:22:25'),
(307, 0, 2018102417, '2021-01-09 12:17:01'),
(308, 0, 2012180162, '2021-01-09 12:38:29'),
(309, 0, 2016180067, '2021-01-09 15:15:00'),
(310, 0, 2015380013, '2021-01-09 15:28:27'),
(311, 0, 2015102429, '2021-01-09 15:59:37'),
(312, 0, 2015102434, '2021-01-09 15:49:04'),
(313, 0, 2015102433, '2021-01-09 15:28:46'),
(314, 0, 2015180061, '2021-01-09 15:25:04'),
(315, 0, 2013380018, '2021-01-09 15:54:42'),
(316, 0, 2017102425, '2021-01-09 15:45:33'),
(317, 0, 2018102686, '2021-01-09 15:47:19'),
(318, 0, 2018102417, '2021-01-09 15:37:51'),
(319, 0, 2012180162, '2021-01-09 15:46:59'),
(320, 0, 2016180067, '2021-01-09 16:08:45'),
(321, 0, 2015380013, '2021-01-09 16:31:10'),
(322, 0, 2015102429, '2021-01-09 16:35:01'),
(323, 0, 2015102434, '2021-01-09 16:31:28'),
(324, 0, 2015102433, '2021-01-09 16:00:50'),
(325, 0, 2015180061, '2021-01-09 16:02:13'),
(326, 0, 2013380018, '2021-01-09 16:10:47'),
(327, 0, 2017102425, '2021-01-09 16:07:35'),
(328, 0, 2018102686, '2021-01-09 16:28:26'),
(329, 0, 2018102417, '2021-01-09 16:32:41'),
(330, 0, 2012180162, '2021-01-09 16:28:04'),
(331, 0, 2016180067, '2021-01-10 07:01:09'),
(332, 0, 2015380013, '2021-01-10 06:56:13'),
(333, 0, 2015102429, '2021-01-10 07:00:56'),
(334, 0, 2015102434, '2021-01-10 06:54:31'),
(335, 0, 2015102433, '2021-01-10 07:11:45'),
(336, 0, 2015180061, '2021-01-10 06:52:21'),
(337, 0, 2013380018, '2021-01-10 07:01:44'),
(338, 0, 2017102425, '2021-01-10 06:56:47'),
(339, 0, 2018102686, '2021-01-10 06:52:41'),
(340, 0, 2018102417, '2021-01-10 06:50:29'),
(341, 0, 2012180162, '2021-01-10 06:55:18'),
(342, 0, 2016180067, '2021-01-10 09:46:29'),
(343, 0, 2015380013, '2021-01-10 09:34:50'),
(344, 0, 2015102429, '2021-01-10 09:49:25'),
(345, 0, 2015102434, '2021-01-10 09:31:56'),
(346, 0, 2015102433, '2021-01-10 09:53:03'),
(347, 0, 2015180061, '2021-01-10 09:46:20'),
(348, 0, 2013380018, '2021-01-10 09:52:49'),
(349, 0, 2017102425, '2021-01-10 09:31:43'),
(350, 0, 2018102686, '2021-01-10 09:47:23'),
(351, 0, 2018102417, '2021-01-10 09:36:03'),
(352, 0, 2012180162, '2021-01-10 09:39:32'),
(353, 0, 2016180067, '2021-01-10 11:48:44'),
(354, 0, 2015380013, '2021-01-10 11:53:21'),
(355, 0, 2015102429, '2021-01-10 12:00:17'),
(356, 0, 2015102434, '2021-01-10 11:53:14'),
(357, 0, 2015102433, '2021-01-10 12:14:41'),
(358, 0, 2015180061, '2021-01-10 12:10:45'),
(359, 0, 2013380018, '2021-01-10 11:48:48'),
(360, 0, 2017102425, '2021-01-10 12:05:09'),
(361, 0, 2018102686, '2021-01-10 12:19:38'),
(362, 0, 2018102417, '2021-01-10 12:22:15'),
(363, 0, 2012180162, '2021-01-10 12:25:30'),
(364, 0, 2016180067, '2021-01-10 15:47:17'),
(365, 0, 2015380013, '2021-01-10 15:38:30'),
(366, 0, 2015102429, '2021-01-10 15:21:47'),
(367, 0, 2015102434, '2021-01-10 15:56:49'),
(368, 0, 2015102433, '2021-01-10 15:55:11'),
(369, 0, 2015180061, '2021-01-10 15:33:12'),
(370, 0, 2013380018, '2021-01-10 15:22:57'),
(371, 0, 2017102425, '2021-01-10 15:48:07'),
(372, 0, 2018102686, '2021-01-10 15:31:56'),
(373, 0, 2018102417, '2021-01-10 15:17:45'),
(374, 0, 2012180162, '2021-01-10 15:44:11'),
(375, 0, 2016180067, '2021-01-10 16:24:40'),
(376, 0, 2015380013, '2021-01-10 16:42:25'),
(377, 0, 2015102429, '2021-01-10 16:08:32'),
(378, 0, 2015102434, '2021-01-10 16:24:47'),
(379, 0, 2015102433, '2021-01-10 16:20:31'),
(380, 0, 2015180061, '2021-01-10 16:29:24'),
(381, 0, 2013380018, '2021-01-10 16:22:11'),
(382, 0, 2017102425, '2021-01-10 16:49:13'),
(383, 0, 2018102686, '2021-01-10 16:05:57'),
(384, 0, 2018102417, '2021-01-10 16:20:29'),
(385, 0, 2012180162, '2021-01-10 16:29:17'),
(386, 0, 2016180067, '2021-01-11 07:06:43'),
(387, 0, 2015380013, '2021-01-11 06:57:43'),
(388, 0, 2015102429, '2021-01-11 06:54:07'),
(389, 0, 2015102434, '2021-01-11 06:52:28'),
(390, 0, 2015102433, '2021-01-11 07:04:40'),
(391, 0, 2015180061, '2021-01-11 07:00:04'),
(392, 0, 2013380018, '2021-01-11 06:56:41'),
(393, 0, 2017102425, '2021-01-11 07:12:55'),
(394, 0, 2018102686, '2021-01-11 06:55:59'),
(395, 0, 2018102417, '2021-01-11 07:01:28'),
(396, 0, 2012180162, '2021-01-11 06:57:01'),
(397, 0, 2016180067, '2021-01-11 09:36:02'),
(398, 0, 2015380013, '2021-01-11 09:41:12'),
(399, 0, 2015102429, '2021-01-11 09:40:46'),
(400, 0, 2015102434, '2021-01-11 09:52:49'),
(401, 0, 2015102433, '2021-01-11 09:35:08'),
(402, 0, 2015180061, '2021-01-11 09:43:18'),
(403, 0, 2013380018, '2021-01-11 09:59:12'),
(404, 0, 2017102425, '2021-01-11 09:47:54'),
(405, 0, 2018102686, '2021-01-11 09:32:56'),
(406, 0, 2018102417, '2021-01-11 09:39:14'),
(407, 0, 2012180162, '2021-01-11 09:30:50'),
(408, 0, 2016180067, '2021-01-11 12:39:35'),
(409, 0, 2015380013, '2021-01-11 12:21:22'),
(410, 0, 2015102429, '2021-01-11 12:12:30'),
(411, 0, 2015102434, '2021-01-11 12:21:09'),
(412, 0, 2015102433, '2021-01-11 12:12:00'),
(413, 0, 2015180061, '2021-01-11 12:23:26'),
(414, 0, 2013380018, '2021-01-11 11:54:05'),
(415, 0, 2017102425, '2021-01-11 12:41:04'),
(416, 0, 2018102686, '2021-01-11 12:08:08'),
(417, 0, 2018102417, '2021-01-11 11:53:28'),
(418, 0, 2012180162, '2021-01-11 12:05:29'),
(419, 0, 2016180067, '2021-01-11 15:25:54'),
(420, 0, 2015380013, '2021-01-11 15:35:01'),
(421, 0, 2015102429, '2021-01-11 15:31:42'),
(422, 0, 2015102434, '2021-01-11 15:29:18'),
(423, 0, 2015102433, '2021-01-11 15:58:19'),
(424, 0, 2015180061, '2021-01-11 15:36:15'),
(425, 0, 2013380018, '2021-01-11 15:40:36'),
(426, 0, 2017102425, '2021-01-11 15:25:24'),
(427, 0, 2018102686, '2021-01-11 15:52:02'),
(428, 0, 2018102417, '2021-01-11 15:20:49'),
(429, 0, 2012180162, '2021-01-11 15:56:14'),
(430, 0, 2016180067, '2021-01-11 16:00:53'),
(431, 0, 2015380013, '2021-01-11 16:10:20'),
(432, 0, 2015102429, '2021-01-11 16:49:11'),
(433, 0, 2015102434, '2021-01-11 16:25:13'),
(434, 0, 2015102433, '2021-01-11 16:42:52'),
(435, 0, 2015180061, '2021-01-11 16:00:05'),
(436, 0, 2013380018, '2021-01-11 16:28:20'),
(437, 0, 2017102425, '2021-01-11 16:30:44'),
(438, 0, 2018102686, '2021-01-11 16:25:28'),
(439, 0, 2018102417, '2021-01-11 16:17:00'),
(440, 0, 2012180162, '2021-01-11 16:01:24'),
(441, 0, 2016180067, '2021-01-12 06:57:52'),
(442, 0, 2015380013, '2021-01-12 07:04:45'),
(443, 0, 2015102429, '2021-01-12 06:55:10'),
(444, 0, 2015102434, '2021-01-12 07:00:39'),
(445, 0, 2015102433, '2021-01-12 07:09:24'),
(446, 0, 2015180061, '2021-01-12 07:09:28'),
(447, 0, 2013380018, '2021-01-12 07:11:10'),
(448, 0, 2017102425, '2021-01-12 07:01:03'),
(449, 0, 2018102686, '2021-01-12 06:56:59'),
(450, 0, 2018102417, '2021-01-12 06:52:13'),
(451, 0, 2012180162, '2021-01-12 06:50:24'),
(452, 0, 2016180067, '2021-01-12 09:52:20'),
(453, 0, 2015380013, '2021-01-12 09:50:26'),
(454, 0, 2015102429, '2021-01-12 09:50:59'),
(455, 0, 2015102434, '2021-01-12 09:53:45'),
(456, 0, 2015102433, '2021-01-12 09:52:59'),
(457, 0, 2015180061, '2021-01-12 09:39:41'),
(458, 0, 2013380018, '2021-01-12 09:32:11'),
(459, 0, 2017102425, '2021-01-12 09:36:37'),
(460, 0, 2018102686, '2021-01-12 09:58:55'),
(461, 0, 2018102417, '2021-01-12 09:31:59'),
(462, 0, 2012180162, '2021-01-12 09:31:52'),
(463, 0, 2016180067, '2021-01-12 12:16:06'),
(464, 0, 2015380013, '2021-01-12 12:17:28'),
(465, 0, 2015102429, '2021-01-12 12:23:02'),
(466, 0, 2015102434, '2021-01-12 12:24:43'),
(467, 0, 2015102433, '2021-01-12 11:41:56'),
(468, 0, 2015180061, '2021-01-12 12:19:55'),
(469, 0, 2013380018, '2021-01-12 12:20:37'),
(470, 0, 2017102425, '2021-01-12 11:46:47'),
(471, 0, 2018102686, '2021-01-12 12:22:18'),
(472, 0, 2018102417, '2021-01-12 12:27:18'),
(473, 0, 2012180162, '2021-01-12 12:16:49'),
(474, 0, 2016180067, '2021-01-12 15:16:13'),
(475, 0, 2015380013, '2021-01-12 15:40:33'),
(476, 0, 2015102429, '2021-01-12 15:44:17'),
(477, 0, 2015102434, '2021-01-12 15:17:52'),
(478, 0, 2015102433, '2021-01-12 15:20:58'),
(479, 0, 2015180061, '2021-01-12 15:58:53'),
(480, 0, 2013380018, '2021-01-12 15:46:31'),
(481, 0, 2017102425, '2021-01-12 15:46:48'),
(482, 0, 2018102686, '2021-01-12 15:22:04'),
(483, 0, 2018102417, '2021-01-12 15:43:10'),
(484, 0, 2012180162, '2021-01-12 15:36:35'),
(485, 0, 2016180067, '2021-01-12 16:13:02'),
(486, 0, 2015380013, '2021-01-12 16:13:09'),
(487, 0, 2015102429, '2021-01-12 16:25:57'),
(488, 0, 2015102434, '2021-01-12 16:23:13'),
(489, 0, 2015102433, '2021-01-12 16:12:36'),
(490, 0, 2015180061, '2021-01-12 16:16:55'),
(491, 0, 2013380018, '2021-01-12 16:59:12'),
(492, 0, 2017102425, '2021-01-12 16:07:40'),
(493, 0, 2018102686, '2021-01-12 16:07:45'),
(494, 0, 2018102417, '2021-01-12 16:15:30'),
(495, 0, 2012180162, '2021-01-12 16:26:02'),
(496, 0, 2016180067, '2021-01-13 07:13:05'),
(497, 0, 2015380013, '2021-01-13 06:54:07'),
(498, 0, 2015102429, '2021-01-13 07:06:10'),
(499, 0, 2015102434, '2021-01-13 06:55:18'),
(500, 0, 2015102433, '2021-01-13 07:14:38'),
(501, 0, 2015180061, '2021-01-13 07:11:31'),
(502, 0, 2013380018, '2021-01-13 06:53:26'),
(503, 0, 2017102425, '2021-01-13 06:54:26'),
(504, 0, 2018102686, '2021-01-13 06:51:23'),
(505, 0, 2018102417, '2021-01-13 07:01:58'),
(506, 0, 2012180162, '2021-01-13 07:06:22'),
(507, 0, 2016180067, '2021-01-13 09:35:50'),
(508, 0, 2015380013, '2021-01-13 09:56:11'),
(509, 0, 2015102429, '2021-01-13 09:33:29'),
(510, 0, 2015102434, '2021-01-13 09:38:37'),
(511, 0, 2015102433, '2021-01-13 09:38:06'),
(512, 0, 2015180061, '2021-01-13 09:50:58'),
(513, 0, 2013380018, '2021-01-13 09:55:51'),
(514, 0, 2017102425, '2021-01-13 09:39:11'),
(515, 0, 2018102686, '2021-01-13 09:35:40'),
(516, 0, 2018102417, '2021-01-13 09:43:34'),
(517, 0, 2012180162, '2021-01-13 09:45:31'),
(518, 0, 2016180067, '2021-01-13 12:11:11'),
(519, 0, 2015380013, '2021-01-13 12:20:40'),
(520, 0, 2015102429, '2021-01-13 12:04:29'),
(521, 0, 2015102434, '2021-01-13 12:33:27'),
(522, 0, 2015102433, '2021-01-13 12:21:41'),
(523, 0, 2015180061, '2021-01-13 12:17:02'),
(524, 0, 2013380018, '2021-01-13 12:18:41'),
(525, 0, 2017102425, '2021-01-13 12:15:43'),
(526, 0, 2018102686, '2021-01-13 12:24:02'),
(527, 0, 2018102417, '2021-01-13 12:27:41'),
(528, 0, 2012180162, '2021-01-13 12:31:59'),
(529, 0, 2016180067, '2021-01-13 15:41:00'),
(530, 0, 2015380013, '2021-01-13 15:39:24'),
(531, 0, 2015102429, '2021-01-13 15:53:19'),
(532, 0, 2015102434, '2021-01-13 15:24:26'),
(533, 0, 2015102433, '2021-01-13 15:42:11'),
(534, 0, 2015180061, '2021-01-13 15:20:43'),
(535, 0, 2013380018, '2021-01-13 15:21:43'),
(536, 0, 2017102425, '2021-01-13 15:34:42'),
(537, 0, 2018102686, '2021-01-13 15:46:07'),
(538, 0, 2018102417, '2021-01-13 15:55:42'),
(539, 0, 2012180162, '2021-01-13 15:30:32'),
(540, 0, 2016180067, '2021-01-13 16:17:59'),
(541, 0, 2015380013, '2021-01-13 16:39:29'),
(542, 0, 2015102429, '2021-01-13 16:08:27'),
(543, 0, 2015102434, '2021-01-13 16:08:55'),
(544, 0, 2015102433, '2021-01-13 16:10:11'),
(545, 0, 2015180061, '2021-01-13 16:00:04'),
(546, 0, 2013380018, '2021-01-13 16:20:49'),
(547, 0, 2017102425, '2021-01-13 16:10:35'),
(548, 0, 2018102686, '2021-01-13 16:45:29'),
(549, 0, 2018102417, '2021-01-13 16:14:04'),
(550, 0, 2012180162, '2021-01-13 16:44:25'),
(551, 0, 2016180067, '2021-01-14 07:05:26'),
(552, 0, 2015380013, '2021-01-14 06:56:11'),
(553, 0, 2015102429, '2021-01-14 06:57:09'),
(554, 0, 2015102434, '2021-01-14 07:05:54'),
(555, 0, 2015102433, '2021-01-14 06:57:54'),
(556, 0, 2015180061, '2021-01-14 06:57:29'),
(557, 0, 2013380018, '2021-01-14 06:55:53'),
(558, 0, 2017102425, '2021-01-14 07:04:57'),
(559, 0, 2018102686, '2021-01-14 07:02:02'),
(560, 0, 2018102417, '2021-01-14 07:14:32'),
(561, 0, 2012180162, '2021-01-14 07:14:30'),
(562, 0, 2016180067, '2021-01-14 09:35:13'),
(563, 0, 2015380013, '2021-01-14 09:30:47'),
(564, 0, 2015102429, '2021-01-14 09:47:28'),
(565, 0, 2015102434, '2021-01-14 09:53:21'),
(566, 0, 2015102433, '2021-01-14 09:32:32'),
(567, 0, 2015180061, '2021-01-14 09:47:16'),
(568, 0, 2013380018, '2021-01-14 09:43:19'),
(569, 0, 2017102425, '2021-01-14 09:57:59'),
(570, 0, 2018102686, '2021-01-14 09:47:14'),
(571, 0, 2018102417, '2021-01-14 09:35:33'),
(572, 0, 2012180162, '2021-01-14 09:47:28'),
(573, 0, 2016180067, '2021-01-14 12:24:30'),
(574, 0, 2015380013, '2021-01-14 12:21:38'),
(575, 0, 2015102429, '2021-01-14 12:15:45'),
(576, 0, 2015102434, '2021-01-14 11:45:23'),
(577, 0, 2015102433, '2021-01-14 12:15:15'),
(578, 0, 2015180061, '2021-01-14 12:31:19'),
(579, 0, 2013380018, '2021-01-14 11:48:35'),
(580, 0, 2017102425, '2021-01-14 12:22:49'),
(581, 0, 2018102686, '2021-01-14 12:37:47'),
(582, 0, 2018102417, '2021-01-14 12:03:14'),
(583, 0, 2012180162, '2021-01-14 12:36:10'),
(584, 0, 2016180067, '2021-01-14 15:46:41'),
(585, 0, 2015380013, '2021-01-14 15:25:20'),
(586, 0, 2015102429, '2021-01-14 15:47:12'),
(587, 0, 2015102434, '2021-01-14 15:47:58'),
(588, 0, 2015102433, '2021-01-14 15:58:06'),
(589, 0, 2015180061, '2021-01-14 15:40:01'),
(590, 0, 2013380018, '2021-01-14 15:22:33'),
(591, 0, 2017102425, '2021-01-14 15:15:19'),
(592, 0, 2018102686, '2021-01-14 15:26:16'),
(593, 0, 2018102417, '2021-01-14 15:58:24'),
(594, 0, 2012180162, '2021-01-14 15:42:06'),
(595, 0, 2016180067, '2021-01-14 16:04:07'),
(596, 0, 2015380013, '2021-01-14 16:37:14'),
(597, 0, 2015102429, '2021-01-14 16:39:49'),
(598, 0, 2015102434, '2021-01-14 16:03:13'),
(599, 0, 2015102433, '2021-01-14 16:17:20'),
(600, 0, 2015180061, '2021-01-14 17:00:27'),
(601, 0, 2013380018, '2021-01-14 16:28:25'),
(602, 0, 2017102425, '2021-01-14 16:46:08'),
(603, 0, 2018102686, '2021-01-14 16:00:52'),
(604, 0, 2018102417, '2021-01-14 16:58:09'),
(605, 0, 2012180162, '2021-01-14 17:17:52'),
(606, 0, 2016180067, '2021-01-15 07:08:35'),
(607, 0, 2015380013, '2021-01-15 07:14:03'),
(608, 0, 2015102429, '2021-01-15 07:09:01'),
(609, 0, 2015102434, '2021-01-15 06:56:08'),
(610, 0, 2015102433, '2021-01-15 06:54:05'),
(611, 0, 2015180061, '2021-01-15 07:07:50'),
(612, 0, 2013380018, '2021-01-15 06:53:37'),
(613, 0, 2017102425, '2021-01-15 07:13:42'),
(614, 0, 2018102686, '2021-01-15 07:04:11'),
(615, 0, 2018102417, '2021-01-15 07:05:57'),
(616, 0, 2012180162, '2021-01-15 07:08:20'),
(617, 0, 2016180067, '2021-01-15 09:33:08'),
(618, 0, 2015380013, '2021-01-15 09:41:25'),
(619, 0, 2015102429, '2021-01-15 09:45:25'),
(620, 0, 2015102434, '2021-01-15 09:35:57'),
(621, 0, 2015102433, '2021-01-15 09:33:12'),
(622, 0, 2015180061, '2021-01-15 09:37:30'),
(623, 0, 2013380018, '2021-01-15 09:55:16'),
(624, 0, 2017102425, '2021-01-15 09:57:45'),
(625, 0, 2018102686, '2021-01-15 09:59:28'),
(626, 0, 2018102417, '2021-01-15 09:46:19'),
(627, 0, 2012180162, '2021-01-15 09:46:31'),
(628, 0, 2016180067, '2021-01-15 12:14:15'),
(629, 0, 2015380013, '2021-01-15 11:51:23'),
(630, 0, 2015102429, '2021-01-15 12:17:23'),
(631, 0, 2015102434, '2021-01-15 11:51:45'),
(632, 0, 2015102433, '2021-01-15 12:15:04'),
(633, 0, 2015180061, '2021-01-15 11:59:41'),
(634, 0, 2013380018, '2021-01-15 11:43:26'),
(635, 0, 2017102425, '2021-01-15 12:22:43'),
(636, 0, 2018102686, '2021-01-15 12:20:40'),
(637, 0, 2018102417, '2021-01-15 12:17:33'),
(638, 0, 2012180162, '2021-01-15 12:18:52'),
(639, 0, 2016180067, '2021-01-15 15:36:05'),
(640, 0, 2015380013, '2021-01-15 15:28:57'),
(641, 0, 2015102429, '2021-01-15 15:29:25'),
(642, 0, 2015102434, '2021-01-15 15:24:12'),
(643, 0, 2015102433, '2021-01-15 15:28:01'),
(644, 0, 2015180061, '2021-01-15 15:51:49'),
(645, 0, 2013380018, '2021-01-15 15:19:36'),
(646, 0, 2017102425, '2021-01-15 15:46:38'),
(647, 0, 2018102686, '2021-01-15 15:39:50'),
(648, 0, 2018102417, '2021-01-15 15:57:55'),
(649, 0, 2012180162, '2021-01-15 15:59:40'),
(650, 0, 2016180067, '2021-01-15 16:43:17'),
(651, 0, 2015380013, '2021-01-15 16:06:55'),
(652, 0, 2015102429, '2021-01-15 16:31:33'),
(653, 0, 2015102434, '2021-01-15 16:57:52'),
(654, 0, 2015102433, '2021-01-15 16:24:32'),
(655, 0, 2015180061, '2021-01-15 16:24:34'),
(656, 0, 2013380018, '2021-01-15 16:49:10'),
(657, 0, 2017102425, '2021-01-15 16:15:59'),
(658, 0, 2018102686, '2021-01-15 16:29:47'),
(659, 0, 2018102417, '2021-01-15 16:24:04'),
(660, 0, 2012180162, '2021-01-15 16:04:35'),
(661, 0, 2016180067, '2021-01-16 07:13:08'),
(662, 0, 2015380013, '2021-01-16 06:52:04'),
(663, 0, 2015102429, '2021-01-16 07:12:24'),
(664, 0, 2015102434, '2021-01-16 06:54:50'),
(665, 0, 2015102433, '2021-01-16 07:13:39'),
(666, 0, 2015180061, '2021-01-16 07:06:46'),
(667, 0, 2013380018, '2021-01-16 07:07:24'),
(668, 0, 2017102425, '2021-01-16 07:13:23'),
(669, 0, 2018102686, '2021-01-16 07:00:00'),
(670, 0, 2018102417, '2021-01-16 07:12:27'),
(671, 0, 2012180162, '2021-01-16 07:03:12'),
(672, 0, 2016180067, '2021-01-16 09:52:33'),
(673, 0, 2015380013, '2021-01-16 09:51:37'),
(674, 0, 2015102429, '2021-01-16 09:39:30'),
(675, 0, 2015102434, '2021-01-16 09:44:03'),
(676, 0, 2015102433, '2021-01-16 09:59:38'),
(677, 0, 2015180061, '2021-01-16 09:45:01'),
(678, 0, 2013380018, '2021-01-16 09:47:02'),
(679, 0, 2017102425, '2021-01-16 09:36:49'),
(680, 0, 2018102686, '2021-01-16 09:59:42'),
(681, 0, 2018102417, '2021-01-16 09:54:03'),
(682, 0, 2012180162, '2021-01-16 09:53:10'),
(683, 0, 2016180067, '2021-01-16 12:17:18'),
(684, 0, 2015380013, '2021-01-16 12:21:31'),
(685, 0, 2015102429, '2021-01-16 12:11:22'),
(686, 0, 2015102434, '2021-01-16 12:23:07'),
(687, 0, 2015102433, '2021-01-16 12:16:06'),
(688, 0, 2015180061, '2021-01-16 11:40:30'),
(689, 0, 2013380018, '2021-01-16 11:52:04'),
(690, 0, 2017102425, '2021-01-16 12:19:16'),
(691, 0, 2018102686, '2021-01-16 11:54:15'),
(692, 0, 2018102417, '2021-01-16 11:46:14'),
(693, 0, 2012180162, '2021-01-16 12:16:03'),
(694, 0, 2016180067, '2021-01-16 15:45:59'),
(695, 0, 2015380013, '2021-01-16 15:51:44'),
(696, 0, 2015102429, '2021-01-16 15:32:52'),
(697, 0, 2015102434, '2021-01-16 15:19:47'),
(698, 0, 2015102433, '2021-01-16 15:38:07'),
(699, 0, 2015180061, '2021-01-16 15:22:31'),
(700, 0, 2013380018, '2021-01-16 15:39:46'),
(701, 0, 2017102425, '2021-01-16 15:18:15'),
(702, 0, 2018102686, '2021-01-16 15:56:02'),
(703, 0, 2018102417, '2021-01-16 15:36:35'),
(704, 0, 2012180162, '2021-01-16 15:41:46'),
(705, 0, 2016180067, '2021-01-16 16:01:28'),
(706, 0, 2015380013, '2021-01-16 16:14:08'),
(707, 0, 2015102429, '2021-01-16 16:29:00'),
(708, 0, 2015102434, '2021-01-16 16:52:07'),
(709, 0, 2015102433, '2021-01-16 16:15:28'),
(710, 0, 2015180061, '2021-01-16 16:22:13'),
(711, 0, 2013380018, '2021-01-16 16:07:36'),
(712, 0, 2017102425, '2021-01-16 16:07:08'),
(713, 0, 2018102686, '2021-01-16 16:10:25'),
(714, 0, 2018102417, '2021-01-16 16:57:33'),
(715, 0, 2012180162, '2021-01-16 16:03:33'),
(716, 0, 2017380981, '2021-01-11 06:57:12'),
(717, 0, 2013104449, '2021-01-11 06:58:24'),
(718, 0, 2017102556, '2021-01-11 07:09:19'),
(719, 0, 2019102433, '2021-01-11 07:08:01'),
(720, 0, 2019180967, '2021-01-11 07:13:10'),
(721, 0, 2017580058, '2021-01-11 07:06:55'),
(722, 0, 2017105453, '2021-01-11 06:54:26'),
(723, 0, 2014102346, '2021-01-11 06:54:10'),
(724, 0, 2016106141, '2021-01-11 07:03:50'),
(725, 0, 2017380981, '2021-01-11 09:44:36'),
(726, 0, 2013104449, '2021-01-11 09:37:23'),
(727, 0, 2017102556, '2021-01-11 09:33:09'),
(728, 0, 2019102433, '2021-01-11 09:59:43'),
(729, 0, 2019180967, '2021-01-11 09:54:40'),
(730, 0, 2017580058, '2021-01-11 09:31:15'),
(731, 0, 2017105453, '2021-01-11 09:51:22'),
(732, 0, 2014102346, '2021-01-11 09:34:50'),
(733, 0, 2016106141, '2021-01-11 09:57:27'),
(734, 0, 2017380981, '2021-01-11 12:17:15'),
(735, 0, 2013104449, '2021-01-11 12:02:58'),
(736, 0, 2017102556, '2021-01-11 12:18:24'),
(737, 0, 2019102433, '2021-01-11 12:17:58'),
(738, 0, 2019180967, '2021-01-11 12:07:09'),
(739, 0, 2017580058, '2021-01-11 12:21:43'),
(740, 0, 2017105453, '2021-01-11 11:55:15'),
(741, 0, 2014102346, '2021-01-11 12:29:58'),
(742, 0, 2016106141, '2021-01-11 11:46:12'),
(743, 0, 2017380981, '2021-01-11 15:44:46'),
(744, 0, 2013104449, '2021-01-11 15:16:36'),
(745, 0, 2017102556, '2021-01-11 15:52:54'),
(746, 0, 2019102433, '2021-01-11 15:59:50'),
(747, 0, 2019180967, '2021-01-11 15:39:31'),
(748, 0, 2017580058, '2021-01-11 15:23:35'),
(749, 0, 2017105453, '2021-01-11 15:53:51'),
(750, 0, 2014102346, '2021-01-11 15:25:57'),
(751, 0, 2016106141, '2021-01-11 15:40:38'),
(752, 0, 2017380981, '2021-01-11 16:59:13'),
(753, 0, 2013104449, '2021-01-11 16:20:31'),
(754, 0, 2017102556, '2021-01-11 16:03:00'),
(755, 0, 2019102433, '2021-01-11 16:00:27'),
(756, 0, 2019180967, '2021-01-11 16:33:32'),
(757, 0, 2017580058, '2021-01-11 16:54:45'),
(758, 0, 2017105453, '2021-01-11 17:22:58'),
(759, 0, 2014102346, '2021-01-11 16:17:42'),
(760, 0, 2016106141, '2021-01-11 16:33:50'),
(761, 0, 2017380981, '2021-01-12 07:10:59'),
(762, 0, 2013104449, '2021-01-12 07:06:42'),
(763, 0, 2017102556, '2021-01-12 07:10:24'),
(764, 0, 2019102433, '2021-01-12 07:11:28'),
(765, 0, 2019180967, '2021-01-12 06:55:35'),
(766, 0, 2017580058, '2021-01-12 06:54:04'),
(767, 0, 2017105453, '2021-01-12 07:05:43'),
(768, 0, 2014102346, '2021-01-12 07:14:57'),
(769, 0, 2016106141, '2021-01-12 06:50:46'),
(770, 0, 2017380981, '2021-01-12 09:54:25'),
(771, 0, 2013104449, '2021-01-12 09:51:08'),
(772, 0, 2017102556, '2021-01-12 09:35:10'),
(773, 0, 2019102433, '2021-01-12 09:51:20'),
(774, 0, 2019180967, '2021-01-12 09:40:27'),
(775, 0, 2017580058, '2021-01-12 09:57:38'),
(776, 0, 2017105453, '2021-01-12 09:46:19'),
(777, 0, 2014102346, '2021-01-12 09:49:58'),
(778, 0, 2016106141, '2021-01-12 09:34:33'),
(779, 0, 2017380981, '2021-01-12 12:20:42'),
(780, 0, 2013104449, '2021-01-12 12:41:25'),
(781, 0, 2017102556, '2021-01-12 12:20:49'),
(782, 0, 2019102433, '2021-01-12 11:52:52'),
(783, 0, 2019180967, '2021-01-12 12:32:10'),
(784, 0, 2017580058, '2021-01-12 12:01:59'),
(785, 0, 2017105453, '2021-01-12 12:11:08'),
(786, 0, 2014102346, '2021-01-12 11:47:37'),
(787, 0, 2016106141, '2021-01-12 12:21:50'),
(788, 0, 2017380981, '2021-01-12 15:28:25'),
(789, 0, 2013104449, '2021-01-12 15:23:00'),
(790, 0, 2017102556, '2021-01-12 15:48:33'),
(791, 0, 2019102433, '2021-01-12 15:17:14'),
(792, 0, 2019180967, '2021-01-12 15:21:08'),
(793, 0, 2017580058, '2021-01-12 15:25:35'),
(794, 0, 2017105453, '2021-01-12 15:26:51'),
(795, 0, 2014102346, '2021-01-12 15:31:54'),
(796, 0, 2016106141, '2021-01-12 15:25:42'),
(797, 0, 2017380981, '2021-01-12 16:58:40'),
(798, 0, 2013104449, '2021-01-12 17:15:40'),
(799, 0, 2017102556, '2021-01-12 16:03:45'),
(800, 0, 2019102433, '2021-01-12 16:06:13'),
(801, 0, 2019180967, '2021-01-12 16:36:40'),
(802, 0, 2017580058, '2021-01-12 16:22:52'),
(803, 0, 2017105453, '2021-01-12 16:47:30'),
(804, 0, 2014102346, '2021-01-12 17:03:03'),
(805, 0, 2016106141, '2021-01-12 16:43:48'),
(806, 0, 2017380981, '2021-01-13 07:04:19'),
(807, 0, 2013104449, '2021-01-13 06:59:42'),
(808, 0, 2017102556, '2021-01-13 07:13:22'),
(809, 0, 2019102433, '2021-01-13 06:58:00'),
(810, 0, 2019180967, '2021-01-13 07:12:33'),
(811, 0, 2017580058, '2021-01-13 07:10:35'),
(812, 0, 2017105453, '2021-01-13 07:01:40'),
(813, 0, 2014102346, '2021-01-13 07:10:27'),
(814, 0, 2016106141, '2021-01-13 07:00:59'),
(815, 0, 2017380981, '2021-01-13 09:30:00'),
(816, 0, 2013104449, '2021-01-13 09:37:17'),
(817, 0, 2017102556, '2021-01-13 09:32:07'),
(818, 0, 2019102433, '2021-01-13 09:44:21'),
(819, 0, 2019180967, '2021-01-13 09:45:35'),
(820, 0, 2017580058, '2021-01-13 09:59:45'),
(821, 0, 2017105453, '2021-01-13 09:39:35'),
(822, 0, 2014102346, '2021-01-13 09:44:11'),
(823, 0, 2016106141, '2021-01-13 09:53:13'),
(824, 0, 2017380981, '2021-01-13 12:25:13'),
(825, 0, 2013104449, '2021-01-13 12:19:06'),
(826, 0, 2017102556, '2021-01-13 12:21:55'),
(827, 0, 2019102433, '2021-01-13 12:19:13'),
(828, 0, 2019180967, '2021-01-13 12:30:54'),
(829, 0, 2017580058, '2021-01-13 11:49:49'),
(830, 0, 2017105453, '2021-01-13 12:24:31'),
(831, 0, 2014102346, '2021-01-13 12:04:37'),
(832, 0, 2016106141, '2021-01-13 12:16:16'),
(833, 0, 2017380981, '2021-01-13 15:57:10'),
(834, 0, 2013104449, '2021-01-13 15:40:16'),
(835, 0, 2017102556, '2021-01-13 15:55:03'),
(836, 0, 2019102433, '2021-01-13 15:28:19'),
(837, 0, 2019180967, '2021-01-13 15:25:37'),
(838, 0, 2017580058, '2021-01-13 15:49:48'),
(839, 0, 2017105453, '2021-01-13 15:45:58'),
(840, 0, 2014102346, '2021-01-13 15:50:06'),
(841, 0, 2016106141, '2021-01-13 15:18:09'),
(842, 0, 2017380981, '2021-01-13 16:39:30'),
(843, 0, 2013104449, '2021-01-13 16:49:29'),
(844, 0, 2017102556, '2021-01-13 16:35:46'),
(845, 0, 2019102433, '2021-01-13 16:09:00'),
(846, 0, 2019180967, '2021-01-13 17:00:24'),
(847, 0, 2017580058, '2021-01-13 17:00:49'),
(848, 0, 2017105453, '2021-01-13 16:23:47'),
(849, 0, 2014102346, '2021-01-13 16:30:09'),
(850, 0, 2016106141, '2021-01-13 16:15:10'),
(851, 0, 2017380981, '2021-01-14 07:01:45'),
(852, 0, 2013104449, '2021-01-14 07:00:16'),
(853, 0, 2017102556, '2021-01-14 07:14:20'),
(854, 0, 2019102433, '2021-01-14 06:59:35'),
(855, 0, 2019180967, '2021-01-14 07:04:32'),
(856, 0, 2017580058, '2021-01-14 06:54:33'),
(857, 0, 2017105453, '2021-01-14 06:51:07'),
(858, 0, 2014102346, '2021-01-14 07:00:23'),
(859, 0, 2016106141, '2021-01-14 06:52:48'),
(860, 0, 2017380981, '2021-01-14 09:30:23'),
(861, 0, 2013104449, '2021-01-14 09:52:09'),
(862, 0, 2017102556, '2021-01-14 09:33:30'),
(863, 0, 2019102433, '2021-01-14 09:32:41'),
(864, 0, 2019180967, '2021-01-14 09:55:33'),
(865, 0, 2017580058, '2021-01-14 09:51:37'),
(866, 0, 2017105453, '2021-01-14 09:46:21'),
(867, 0, 2014102346, '2021-01-14 09:59:00'),
(868, 0, 2016106141, '2021-01-14 09:32:42'),
(869, 0, 2017380981, '2021-01-14 12:23:10'),
(870, 0, 2013104449, '2021-01-14 12:21:27'),
(871, 0, 2017102556, '2021-01-14 12:24:18'),
(872, 0, 2019102433, '2021-01-14 12:00:33'),
(873, 0, 2019180967, '2021-01-14 12:07:05'),
(874, 0, 2017580058, '2021-01-14 12:04:42'),
(875, 0, 2017105453, '2021-01-14 12:08:48'),
(876, 0, 2014102346, '2021-01-14 12:20:50'),
(877, 0, 2016106141, '2021-01-14 12:15:29'),
(878, 0, 2017380981, '2021-01-14 15:52:56'),
(879, 0, 2013104449, '2021-01-14 15:22:23'),
(880, 0, 2017102556, '2021-01-14 15:39:13'),
(881, 0, 2019102433, '2021-01-14 15:20:51'),
(882, 0, 2019180967, '2021-01-14 15:58:05'),
(883, 0, 2017580058, '2021-01-14 15:16:08'),
(884, 0, 2017105453, '2021-01-14 15:55:55'),
(885, 0, 2014102346, '2021-01-14 15:21:44'),
(886, 0, 2016106141, '2021-01-14 15:26:59'),
(887, 0, 2017380981, '2021-01-14 16:25:26'),
(888, 0, 2013104449, '2021-01-14 16:02:43'),
(889, 0, 2017102556, '2021-01-14 16:33:02'),
(890, 0, 2019102433, '2021-01-14 16:59:27'),
(891, 0, 2019180967, '2021-01-14 16:40:32'),
(892, 0, 2017580058, '2021-01-14 17:14:51'),
(893, 0, 2017105453, '2021-01-14 16:45:44'),
(894, 0, 2014102346, '2021-01-14 16:08:46'),
(895, 0, 2016106141, '2021-01-14 16:41:49'),
(896, 0, 2017380981, '2021-01-15 06:54:06'),
(897, 0, 2013104449, '2021-01-15 07:08:16'),
(898, 0, 2017102556, '2021-01-15 07:01:21'),
(899, 0, 2019102433, '2021-01-15 06:53:25'),
(900, 0, 2019180967, '2021-01-15 06:58:49'),
(901, 0, 2017580058, '2021-01-15 07:07:27'),
(902, 0, 2017105453, '2021-01-15 07:14:07'),
(903, 0, 2014102346, '2021-01-15 07:06:36'),
(904, 0, 2016106141, '2021-01-15 07:00:47'),
(905, 0, 2017380981, '2021-01-15 09:58:40'),
(906, 0, 2013104449, '2021-01-15 09:36:26'),
(907, 0, 2017102556, '2021-01-15 09:53:28'),
(908, 0, 2019102433, '2021-01-15 09:40:18'),
(909, 0, 2019180967, '2021-01-15 09:33:48'),
(910, 0, 2017580058, '2021-01-15 09:44:41'),
(911, 0, 2017105453, '2021-01-15 09:49:55'),
(912, 0, 2014102346, '2021-01-15 09:58:45'),
(913, 0, 2016106141, '2021-01-15 09:40:43'),
(914, 0, 2017380981, '2021-01-15 12:15:51'),
(915, 0, 2013104449, '2021-01-15 12:17:58'),
(916, 0, 2017102556, '2021-01-15 12:16:38'),
(917, 0, 2019102433, '2021-01-15 12:22:52'),
(918, 0, 2019180967, '2021-01-15 11:50:43'),
(919, 0, 2017580058, '2021-01-15 12:22:08'),
(920, 0, 2017105453, '2021-01-15 12:21:51'),
(921, 0, 2014102346, '2021-01-15 12:26:45'),
(922, 0, 2016106141, '2021-01-15 12:18:50'),
(923, 0, 2017380981, '2021-01-15 15:24:35'),
(924, 0, 2013104449, '2021-01-15 15:57:26'),
(925, 0, 2017102556, '2021-01-15 15:21:34'),
(926, 0, 2019102433, '2021-01-15 15:54:04'),
(927, 0, 2019180967, '2021-01-15 15:19:50'),
(928, 0, 2017580058, '2021-01-15 15:35:54'),
(929, 0, 2017105453, '2021-01-15 15:41:46'),
(930, 0, 2014102346, '2021-01-15 15:53:35'),
(931, 0, 2016106141, '2021-01-15 15:53:23'),
(932, 0, 2017380981, '2021-01-15 16:11:23'),
(933, 0, 2013104449, '2021-01-15 16:26:32'),
(934, 0, 2017102556, '2021-01-15 16:09:11'),
(935, 0, 2019102433, '2021-01-15 16:18:10'),
(936, 0, 2019180967, '2021-01-15 16:34:38'),
(937, 0, 2017580058, '2021-01-15 17:26:46'),
(938, 0, 2017105453, '2021-01-15 16:11:37'),
(939, 0, 2014102346, '2021-01-15 16:09:52'),
(940, 0, 2016106141, '2021-01-15 16:50:58'),
(941, 0, 2017380981, '2021-01-16 07:03:48'),
(942, 0, 2013104449, '2021-01-16 07:08:22'),
(943, 0, 2017102556, '2021-01-16 07:04:47'),
(944, 0, 2019102433, '2021-01-16 07:09:15'),
(945, 0, 2019180967, '2021-01-16 07:02:33'),
(946, 0, 2017580058, '2021-01-16 06:51:44'),
(947, 0, 2017105453, '2021-01-16 07:12:51'),
(948, 0, 2014102346, '2021-01-16 06:54:11'),
(949, 0, 2016106141, '2021-01-16 06:51:36'),
(950, 0, 2017380981, '2021-01-16 09:34:22'),
(951, 0, 2013104449, '2021-01-16 09:32:27'),
(952, 0, 2017102556, '2021-01-16 09:41:13'),
(953, 0, 2019102433, '2021-01-16 09:47:41'),
(954, 0, 2019180967, '2021-01-16 09:31:30'),
(955, 0, 2017580058, '2021-01-16 09:55:53'),
(956, 0, 2017105453, '2021-01-16 09:41:29'),
(957, 0, 2014102346, '2021-01-16 09:48:01'),
(958, 0, 2016106141, '2021-01-16 09:35:56'),
(959, 0, 2017380981, '2021-01-16 12:27:14'),
(960, 0, 2013104449, '2021-01-16 12:16:20'),
(961, 0, 2017102556, '2021-01-16 12:27:43'),
(962, 0, 2019102433, '2021-01-16 11:59:48'),
(963, 0, 2019180967, '2021-01-16 12:21:46'),
(964, 0, 2017580058, '2021-01-16 12:37:52'),
(965, 0, 2017105453, '2021-01-16 12:13:20'),
(966, 0, 2014102346, '2021-01-16 12:22:12'),
(967, 0, 2016106141, '2021-01-16 12:15:04'),
(968, 0, 2017380981, '2021-01-16 15:29:00'),
(969, 0, 2013104449, '2021-01-16 15:19:52'),
(970, 0, 2017102556, '2021-01-16 15:55:30'),
(971, 0, 2019102433, '2021-01-16 15:58:09'),
(972, 0, 2019180967, '2021-01-16 15:54:34'),
(973, 0, 2017580058, '2021-01-16 15:21:00'),
(974, 0, 2017105453, '2021-01-16 15:29:08'),
(975, 0, 2014102346, '2021-01-16 15:24:08'),
(976, 0, 2016106141, '2021-01-16 15:52:39'),
(977, 0, 2017380981, '2021-01-16 16:18:34'),
(978, 0, 2013104449, '2021-01-16 16:22:30'),
(979, 0, 2017102556, '2021-01-16 16:20:40'),
(980, 0, 2019102433, '2021-01-16 16:45:44'),
(981, 0, 2019180967, '2021-01-16 17:15:29'),
(982, 0, 2017580058, '2021-01-16 16:07:20'),
(983, 0, 2017105453, '2021-01-16 16:05:48'),
(984, 0, 2014102346, '2021-01-16 16:25:21'),
(985, 0, 2016106141, '2021-01-16 16:29:15'),
(986, 0, 2015380013, '2021-01-15 14:30:09'),
(987, 0, 2015380013, '2021-01-15 14:30:22'),
(988, 0, 2015102434, '2021-01-15 14:30:27'),
(989, 0, 2015102429, '2021-01-15 14:30:42'),
(990, 0, 2015102429, '2021-01-15 14:31:44'),
(991, 0, 2015102429, '2021-01-15 14:34:22'),
(992, 0, 2015102434, '2021-01-15 14:36:03'),
(993, 0, 2015102433, '2021-01-16 00:15:53'),
(994, 0, 2016180067, '2021-01-16 00:15:57'),
(995, 0, 2015380013, '2021-01-16 00:15:59'),
(996, 0, 2015102429, '2021-01-16 00:16:19'),
(997, 0, 2015102429, '2021-01-16 00:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `tapout_logs`
--

CREATE TABLE `tapout_logs` (
  `log_no` int(11) NOT NULL,
  `rf_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `outDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapout_logs`
--

INSERT INTO `tapout_logs` (`log_no`, `rf_id`, `id_no`, `outDate`) VALUES
(1, 0, 2016180067, '2021-01-04 08:05:19'),
(2, 0, 2015380013, '2021-01-04 08:01:36'),
(3, 0, 2015102429, '2021-01-04 08:03:25'),
(4, 0, 2015102434, '2021-01-04 08:01:34'),
(5, 0, 2015102433, '2021-01-04 08:08:20'),
(6, 0, 2015180061, '2021-01-04 08:03:13'),
(7, 0, 2013380018, '2021-01-04 08:09:55'),
(8, 0, 2017102425, '2021-01-04 08:03:33'),
(9, 0, 2018102686, '2021-01-04 08:05:06'),
(10, 0, 2018102417, '2021-01-04 08:03:04'),
(11, 0, 2012180162, '2021-01-04 08:02:47'),
(12, 0, 2016180067, '2021-01-04 10:12:46'),
(13, 0, 2015380013, '2021-01-04 10:17:31'),
(14, 0, 2015102429, '2021-01-04 10:01:02'),
(15, 0, 2015102434, '2021-01-04 10:11:21'),
(16, 0, 2015102433, '2021-01-04 10:18:18'),
(17, 0, 2015180061, '2021-01-04 10:09:43'),
(18, 0, 2013380018, '2021-01-04 10:01:32'),
(19, 0, 2017102425, '2021-01-04 10:07:52'),
(20, 0, 2018102686, '2021-01-04 10:05:10'),
(21, 0, 2018102417, '2021-01-04 10:04:12'),
(22, 0, 2012180162, '2021-01-04 10:07:54'),
(23, 0, 2016180067, '2021-01-04 12:42:50'),
(24, 0, 2015380013, '2021-01-04 12:25:03'),
(25, 0, 2015102429, '2021-01-04 12:35:54'),
(26, 0, 2015102434, '2021-01-04 12:15:49'),
(27, 0, 2015102433, '2021-01-04 12:31:49'),
(28, 0, 2015180061, '2021-01-04 12:29:48'),
(29, 0, 2013380018, '2021-01-04 12:38:08'),
(30, 0, 2017102425, '2021-01-04 12:26:58'),
(31, 0, 2018102686, '2021-01-04 12:26:28'),
(32, 0, 2018102417, '2021-01-04 12:27:54'),
(33, 0, 2012180162, '2021-01-04 12:15:27'),
(34, 0, 2016180067, '2021-01-04 16:33:05'),
(35, 0, 2015380013, '2021-01-04 16:36:59'),
(36, 0, 2015102429, '2021-01-04 16:33:28'),
(37, 0, 2015102434, '2021-01-04 16:36:46'),
(38, 0, 2015102433, '2021-01-04 16:33:43'),
(39, 0, 2015180061, '2021-01-04 16:32:13'),
(40, 0, 2013380018, '2021-01-04 16:32:24'),
(41, 0, 2017102425, '2021-01-04 16:44:31'),
(42, 0, 2018102686, '2021-01-04 16:38:49'),
(43, 0, 2018102417, '2021-01-04 16:36:29'),
(44, 0, 2012180162, '2021-01-04 16:41:57'),
(45, 0, 2016180067, '2021-01-04 17:34:23'),
(46, 0, 2015380013, '2021-01-04 16:41:21'),
(47, 0, 2015102429, '2021-01-04 16:31:32'),
(48, 0, 2015102434, '2021-01-04 17:13:54'),
(49, 0, 2015102433, '2021-01-04 16:36:38'),
(50, 0, 2015180061, '2021-01-04 16:39:10'),
(51, 0, 2013380018, '2021-01-04 17:01:47'),
(52, 0, 2017102425, '2021-01-04 17:23:55'),
(53, 0, 2018102686, '2021-01-04 16:39:42'),
(54, 0, 2018102417, '2021-01-04 17:19:35'),
(55, 0, 2012180162, '2021-01-04 17:24:51'),
(56, 0, 2016180067, '2021-01-05 08:13:43'),
(57, 0, 2015380013, '2021-01-05 08:14:43'),
(58, 0, 2015102429, '2021-01-05 08:08:35'),
(59, 0, 2015102434, '2021-01-05 08:12:40'),
(60, 0, 2015102433, '2021-01-05 08:12:02'),
(61, 0, 2015180061, '2021-01-05 08:05:30'),
(62, 0, 2013380018, '2021-01-05 08:10:08'),
(63, 0, 2017102425, '2021-01-05 08:09:06'),
(64, 0, 2018102686, '2021-01-05 08:01:52'),
(65, 0, 2018102417, '2021-01-05 08:02:17'),
(66, 0, 2012180162, '2021-01-05 08:11:30'),
(67, 0, 2016180067, '2021-01-05 10:10:37'),
(68, 0, 2015380013, '2021-01-05 10:10:46'),
(69, 0, 2015102429, '2021-01-05 10:10:39'),
(70, 0, 2015102434, '2021-01-05 10:16:52'),
(71, 0, 2015102433, '2021-01-05 10:05:49'),
(72, 0, 2015180061, '2021-01-05 10:03:09'),
(73, 0, 2013380018, '2021-01-05 10:04:25'),
(74, 0, 2017102425, '2021-01-05 10:14:15'),
(75, 0, 2018102686, '2021-01-05 10:10:33'),
(76, 0, 2018102417, '2021-01-05 10:11:42'),
(77, 0, 2012180162, '2021-01-05 10:03:23'),
(78, 0, 2016180067, '2021-01-05 12:44:08'),
(79, 0, 2015380013, '2021-01-05 12:23:24'),
(80, 0, 2015102429, '2021-01-05 12:37:15'),
(81, 0, 2015102434, '2021-01-05 12:27:49'),
(82, 0, 2015102433, '2021-01-05 12:17:53'),
(83, 0, 2015180061, '2021-01-05 12:44:16'),
(84, 0, 2013380018, '2021-01-05 12:27:24'),
(85, 0, 2017102425, '2021-01-05 12:39:01'),
(86, 0, 2018102686, '2021-01-05 12:18:03'),
(87, 0, 2018102417, '2021-01-05 12:27:32'),
(88, 0, 2012180162, '2021-01-05 12:18:42'),
(89, 0, 2016180067, '2021-01-05 16:33:28'),
(90, 0, 2015380013, '2021-01-05 16:34:47'),
(91, 0, 2015102429, '2021-01-05 16:43:47'),
(92, 0, 2015102434, '2021-01-05 16:38:36'),
(93, 0, 2015102433, '2021-01-05 16:42:16'),
(94, 0, 2015180061, '2021-01-05 16:33:23'),
(95, 0, 2013380018, '2021-01-05 16:31:23'),
(96, 0, 2017102425, '2021-01-05 16:38:48'),
(97, 0, 2018102686, '2021-01-05 16:34:48'),
(98, 0, 2018102417, '2021-01-05 16:31:55'),
(99, 0, 2012180162, '2021-01-05 16:42:18'),
(100, 0, 2016180067, '2021-01-05 16:38:21'),
(101, 0, 2015380013, '2021-01-05 17:00:45'),
(102, 0, 2015102429, '2021-01-05 16:18:52'),
(103, 0, 2015102434, '2021-01-05 16:35:36'),
(104, 0, 2015102433, '2021-01-05 17:37:55'),
(105, 0, 2015180061, '2021-01-05 16:33:55'),
(106, 0, 2013380018, '2021-01-05 16:37:46'),
(107, 0, 2017102425, '2021-01-05 17:17:24'),
(108, 0, 2018102686, '2021-01-05 16:13:10'),
(109, 0, 2018102417, '2021-01-05 16:51:32'),
(110, 0, 2012180162, '2021-01-05 17:06:21'),
(111, 0, 2016180067, '2021-01-06 08:00:14'),
(112, 0, 2015380013, '2021-01-06 08:11:21'),
(113, 0, 2015102429, '2021-01-06 08:06:49'),
(114, 0, 2015102434, '2021-01-06 08:14:06'),
(115, 0, 2015102433, '2021-01-06 08:12:44'),
(116, 0, 2015180061, '2021-01-06 08:08:00'),
(117, 0, 2013380018, '2021-01-06 08:08:11'),
(118, 0, 2017102425, '2021-01-06 08:02:38'),
(119, 0, 2018102686, '2021-01-06 08:12:37'),
(120, 0, 2018102417, '2021-01-06 08:03:22'),
(121, 0, 2012180162, '2021-01-06 08:13:51'),
(122, 0, 2016180067, '2021-01-06 10:13:23'),
(123, 0, 2015380013, '2021-01-06 10:09:53'),
(124, 0, 2015102429, '2021-01-06 10:05:10'),
(125, 0, 2015102434, '2021-01-06 10:13:45'),
(126, 0, 2015102433, '2021-01-06 10:14:14'),
(127, 0, 2015180061, '2021-01-06 10:13:59'),
(128, 0, 2013380018, '2021-01-06 10:08:46'),
(129, 0, 2017102425, '2021-01-06 10:19:32'),
(130, 0, 2018102686, '2021-01-06 10:15:20'),
(131, 0, 2018102417, '2021-01-06 10:13:53'),
(132, 0, 2012180162, '2021-01-06 10:06:17'),
(133, 0, 2016180067, '2021-01-06 12:39:02'),
(134, 0, 2015380013, '2021-01-06 12:24:58'),
(135, 0, 2015102429, '2021-01-06 12:24:20'),
(136, 0, 2015102434, '2021-01-06 12:42:51'),
(137, 0, 2015102433, '2021-01-06 12:40:49'),
(138, 0, 2015180061, '2021-01-06 12:15:50'),
(139, 0, 2013380018, '2021-01-06 12:17:05'),
(140, 0, 2017102425, '2021-01-06 12:27:59'),
(141, 0, 2018102686, '2021-01-06 12:15:35'),
(142, 0, 2018102417, '2021-01-06 12:22:19'),
(143, 0, 2012180162, '2021-01-06 12:16:40'),
(144, 0, 2016180067, '2021-01-06 16:32:48'),
(145, 0, 2015380013, '2021-01-06 16:31:04'),
(146, 0, 2015102429, '2021-01-06 16:41:40'),
(147, 0, 2015102434, '2021-01-06 16:40:19'),
(148, 0, 2015102433, '2021-01-06 16:43:48'),
(149, 0, 2015180061, '2021-01-06 16:35:00'),
(150, 0, 2013380018, '2021-01-06 16:39:10'),
(151, 0, 2017102425, '2021-01-06 16:36:58'),
(152, 0, 2018102686, '2021-01-06 16:35:30'),
(153, 0, 2018102417, '2021-01-06 16:43:43'),
(154, 0, 2012180162, '2021-01-06 16:36:08'),
(155, 0, 2016180067, '2021-01-06 16:23:49'),
(156, 0, 2015380013, '2021-01-06 16:41:34'),
(157, 0, 2015102429, '2021-01-06 16:20:31'),
(158, 0, 2015102434, '2021-01-06 17:14:48'),
(159, 0, 2015102433, '2021-01-06 16:42:25'),
(160, 0, 2015180061, '2021-01-06 16:55:38'),
(161, 0, 2013380018, '2021-01-06 17:20:04'),
(162, 0, 2017102425, '2021-01-06 16:08:53'),
(163, 0, 2018102686, '2021-01-06 17:27:34'),
(164, 0, 2018102417, '2021-01-06 16:13:36'),
(165, 0, 2012180162, '2021-01-06 17:31:40'),
(166, 0, 2016180067, '2021-01-07 08:12:34'),
(167, 0, 2015380013, '2021-01-07 08:06:14'),
(168, 0, 2015102429, '2021-01-07 08:01:35'),
(169, 0, 2015102434, '2021-01-07 08:00:49'),
(170, 0, 2015102433, '2021-01-07 08:11:27'),
(171, 0, 2015180061, '2021-01-07 08:09:10'),
(172, 0, 2013380018, '2021-01-07 08:04:24'),
(173, 0, 2017102425, '2021-01-07 08:06:11'),
(174, 0, 2018102686, '2021-01-07 08:10:31'),
(175, 0, 2018102417, '2021-01-07 08:03:38'),
(176, 0, 2012180162, '2021-01-07 08:06:49'),
(177, 0, 2016180067, '2021-01-07 10:00:52'),
(178, 0, 2015380013, '2021-01-07 10:05:56'),
(179, 0, 2015102429, '2021-01-07 10:11:51'),
(180, 0, 2015102434, '2021-01-07 10:02:14'),
(181, 0, 2015102433, '2021-01-07 10:17:33'),
(182, 0, 2015180061, '2021-01-07 10:06:40'),
(183, 0, 2013380018, '2021-01-07 10:06:32'),
(184, 0, 2017102425, '2021-01-07 10:13:43'),
(185, 0, 2018102686, '2021-01-07 10:08:05'),
(186, 0, 2018102417, '2021-01-07 10:00:09'),
(187, 0, 2012180162, '2021-01-07 10:09:33'),
(188, 0, 2016180067, '2021-01-07 12:22:59'),
(189, 0, 2015380013, '2021-01-07 12:34:29'),
(190, 0, 2015102429, '2021-01-07 12:24:40'),
(191, 0, 2015102434, '2021-01-07 12:42:22'),
(192, 0, 2015102433, '2021-01-07 12:28:42'),
(193, 0, 2015180061, '2021-01-07 12:42:01'),
(194, 0, 2013380018, '2021-01-07 12:22:05'),
(195, 0, 2017102425, '2021-01-07 12:25:37'),
(196, 0, 2018102686, '2021-01-07 12:22:43'),
(197, 0, 2018102417, '2021-01-07 12:41:44'),
(198, 0, 2012180162, '2021-01-07 12:36:27'),
(199, 0, 2016180067, '2021-01-07 16:32:44'),
(200, 0, 2015380013, '2021-01-07 16:30:36'),
(201, 0, 2015102429, '2021-01-07 16:35:54'),
(202, 0, 2015102434, '2021-01-07 16:42:08'),
(203, 0, 2015102433, '2021-01-07 16:33:03'),
(204, 0, 2015180061, '2021-01-07 16:33:32'),
(205, 0, 2013380018, '2021-01-07 16:43:13'),
(206, 0, 2017102425, '2021-01-07 16:43:09'),
(207, 0, 2018102686, '2021-01-07 16:36:07'),
(208, 0, 2018102417, '2021-01-07 16:42:28'),
(209, 0, 2012180162, '2021-01-07 16:34:30'),
(210, 0, 2016180067, '2021-01-07 16:31:36'),
(211, 0, 2015380013, '2021-01-07 16:59:10'),
(212, 0, 2015102429, '2021-01-07 17:39:24'),
(213, 0, 2015102434, '2021-01-07 17:39:12'),
(214, 0, 2015102433, '2021-01-07 17:02:26'),
(215, 0, 2015180061, '2021-01-07 16:39:52'),
(216, 0, 2013380018, '2021-01-07 16:10:29'),
(217, 0, 2017102425, '2021-01-07 17:02:29'),
(218, 0, 2018102686, '2021-01-07 17:32:39'),
(219, 0, 2018102417, '2021-01-07 17:02:58'),
(220, 0, 2012180162, '2021-01-07 16:26:03'),
(221, 0, 2016180067, '2021-01-08 08:07:25'),
(222, 0, 2015380013, '2021-01-08 08:04:28'),
(223, 0, 2015102429, '2021-01-08 08:00:27'),
(224, 0, 2015102434, '2021-01-08 08:02:20'),
(225, 0, 2015102433, '2021-01-08 08:13:53'),
(226, 0, 2015180061, '2021-01-08 08:02:37'),
(227, 0, 2013380018, '2021-01-08 08:01:15'),
(228, 0, 2017102425, '2021-01-08 08:09:18'),
(229, 0, 2018102686, '2021-01-08 08:13:52'),
(230, 0, 2018102417, '2021-01-08 08:07:06'),
(231, 0, 2012180162, '2021-01-08 08:12:35'),
(232, 0, 2016180067, '2021-01-08 10:18:23'),
(233, 0, 2015380013, '2021-01-08 10:07:57'),
(234, 0, 2015102429, '2021-01-08 10:06:13'),
(235, 0, 2015102434, '2021-01-08 10:02:44'),
(236, 0, 2015102433, '2021-01-08 10:15:46'),
(237, 0, 2015180061, '2021-01-08 10:17:18'),
(238, 0, 2013380018, '2021-01-08 10:14:56'),
(239, 0, 2017102425, '2021-01-08 10:07:48'),
(240, 0, 2018102686, '2021-01-08 10:14:38'),
(241, 0, 2018102417, '2021-01-08 10:10:20'),
(242, 0, 2012180162, '2021-01-08 10:17:16'),
(243, 0, 2016180067, '2021-01-08 12:40:15'),
(244, 0, 2015380013, '2021-01-08 12:22:46'),
(245, 0, 2015102429, '2021-01-08 12:41:40'),
(246, 0, 2015102434, '2021-01-08 12:19:40'),
(247, 0, 2015102433, '2021-01-08 12:30:59'),
(248, 0, 2015180061, '2021-01-08 12:35:22'),
(249, 0, 2013380018, '2021-01-08 12:15:56'),
(250, 0, 2017102425, '2021-01-08 12:44:56'),
(251, 0, 2018102686, '2021-01-08 12:34:06'),
(252, 0, 2018102417, '2021-01-08 12:27:14'),
(253, 0, 2012180162, '2021-01-08 12:17:53'),
(254, 0, 2016180067, '2021-01-08 16:33:14'),
(255, 0, 2015380013, '2021-01-08 16:38:42'),
(256, 0, 2015102429, '2021-01-08 16:41:53'),
(257, 0, 2015102434, '2021-01-08 16:43:55'),
(258, 0, 2015102433, '2021-01-08 16:39:07'),
(259, 0, 2015180061, '2021-01-08 16:42:32'),
(260, 0, 2013380018, '2021-01-08 16:31:46'),
(261, 0, 2017102425, '2021-01-08 16:32:38'),
(262, 0, 2018102686, '2021-01-08 16:31:22'),
(263, 0, 2018102417, '2021-01-08 16:41:26'),
(264, 0, 2012180162, '2021-01-08 16:35:13'),
(265, 0, 2016180067, '2021-01-08 16:15:59'),
(266, 0, 2015380013, '2021-01-08 17:27:47'),
(267, 0, 2015102429, '2021-01-08 16:47:37'),
(268, 0, 2015102434, '2021-01-08 17:06:13'),
(269, 0, 2015102433, '2021-01-08 17:21:40'),
(270, 0, 2015180061, '2021-01-08 16:30:34'),
(271, 0, 2013380018, '2021-01-08 16:10:49'),
(272, 0, 2017102425, '2021-01-08 16:10:59'),
(273, 0, 2018102686, '2021-01-08 16:26:36'),
(274, 0, 2018102417, '2021-01-08 17:33:44'),
(275, 0, 2012180162, '2021-01-08 16:56:05'),
(276, 0, 2016180067, '2021-01-09 08:07:17'),
(277, 0, 2015380013, '2021-01-09 08:11:39'),
(278, 0, 2015102429, '2021-01-09 08:09:47'),
(279, 0, 2015102434, '2021-01-09 08:03:16'),
(280, 0, 2015102433, '2021-01-09 08:01:02'),
(281, 0, 2015180061, '2021-01-09 08:14:10'),
(282, 0, 2013380018, '2021-01-09 08:01:05'),
(283, 0, 2017102425, '2021-01-09 08:09:34'),
(284, 0, 2018102686, '2021-01-09 08:07:03'),
(285, 0, 2018102417, '2021-01-09 08:04:11'),
(286, 0, 2012180162, '2021-01-09 08:08:53'),
(287, 0, 2016180067, '2021-01-09 10:11:05'),
(288, 0, 2015380013, '2021-01-09 10:12:27'),
(289, 0, 2015102429, '2021-01-09 10:14:18'),
(290, 0, 2015102434, '2021-01-09 10:16:07'),
(291, 0, 2015102433, '2021-01-09 10:14:22'),
(292, 0, 2015180061, '2021-01-09 10:04:30'),
(293, 0, 2013380018, '2021-01-09 10:13:02'),
(294, 0, 2017102425, '2021-01-09 10:19:28'),
(295, 0, 2018102686, '2021-01-09 10:12:10'),
(296, 0, 2018102417, '2021-01-09 10:13:40'),
(297, 0, 2012180162, '2021-01-09 10:03:31'),
(298, 0, 2016180067, '2021-01-09 12:17:27'),
(299, 0, 2015380013, '2021-01-09 12:22:10'),
(300, 0, 2015102429, '2021-01-09 12:16:32'),
(301, 0, 2015102434, '2021-01-09 12:17:45'),
(302, 0, 2015102433, '2021-01-09 12:38:44'),
(303, 0, 2015180061, '2021-01-09 12:20:31'),
(304, 0, 2013380018, '2021-01-09 12:17:04'),
(305, 0, 2017102425, '2021-01-09 12:44:51'),
(306, 0, 2018102686, '2021-01-09 12:37:18'),
(307, 0, 2018102417, '2021-01-09 12:18:56'),
(308, 0, 2012180162, '2021-01-09 12:42:24'),
(309, 0, 2016180067, '2021-01-09 16:31:05'),
(310, 0, 2015380013, '2021-01-09 16:39:53'),
(311, 0, 2015102429, '2021-01-09 16:36:08'),
(312, 0, 2015102434, '2021-01-09 16:42:18'),
(313, 0, 2015102433, '2021-01-09 16:36:08'),
(314, 0, 2015180061, '2021-01-09 16:44:10'),
(315, 0, 2013380018, '2021-01-09 16:40:14'),
(316, 0, 2017102425, '2021-01-09 16:34:57'),
(317, 0, 2018102686, '2021-01-09 16:32:41'),
(318, 0, 2018102417, '2021-01-09 16:30:30'),
(319, 0, 2012180162, '2021-01-09 16:36:02'),
(320, 0, 2016180067, '2021-01-09 16:12:34'),
(321, 0, 2015380013, '2021-01-09 16:40:29'),
(322, 0, 2015102429, '2021-01-09 16:58:28'),
(323, 0, 2015102434, '2021-01-09 17:37:26'),
(324, 0, 2015102433, '2021-01-09 16:03:17'),
(325, 0, 2015180061, '2021-01-09 16:02:54'),
(326, 0, 2013380018, '2021-01-09 16:14:37'),
(327, 0, 2017102425, '2021-01-09 16:07:50'),
(328, 0, 2018102686, '2021-01-09 16:42:04'),
(329, 0, 2018102417, '2021-01-09 17:03:18'),
(330, 0, 2012180162, '2021-01-09 16:55:27'),
(331, 0, 2016180067, '2021-01-10 08:08:10'),
(332, 0, 2015380013, '2021-01-10 08:07:12'),
(333, 0, 2015102429, '2021-01-10 08:04:43'),
(334, 0, 2015102434, '2021-01-10 08:13:43'),
(335, 0, 2015102433, '2021-01-10 08:03:30'),
(336, 0, 2015180061, '2021-01-10 08:02:45'),
(337, 0, 2013380018, '2021-01-10 08:14:21'),
(338, 0, 2017102425, '2021-01-10 08:11:03'),
(339, 0, 2018102686, '2021-01-10 08:06:38'),
(340, 0, 2018102417, '2021-01-10 08:03:02'),
(341, 0, 2012180162, '2021-01-10 08:01:27'),
(342, 0, 2016180067, '2021-01-10 10:18:00'),
(343, 0, 2015380013, '2021-01-10 10:04:08'),
(344, 0, 2015102429, '2021-01-10 10:01:21'),
(345, 0, 2015102434, '2021-01-10 10:06:22'),
(346, 0, 2015102433, '2021-01-10 10:08:28'),
(347, 0, 2015180061, '2021-01-10 10:04:12'),
(348, 0, 2013380018, '2021-01-10 10:08:31'),
(349, 0, 2017102425, '2021-01-10 10:10:40'),
(350, 0, 2018102686, '2021-01-10 10:00:35'),
(351, 0, 2018102417, '2021-01-10 10:14:16'),
(352, 0, 2012180162, '2021-01-10 10:06:26'),
(353, 0, 2016180067, '2021-01-10 12:43:26'),
(354, 0, 2015380013, '2021-01-10 12:21:59'),
(355, 0, 2015102429, '2021-01-10 12:37:49'),
(356, 0, 2015102434, '2021-01-10 12:32:22'),
(357, 0, 2015102433, '2021-01-10 12:18:24'),
(358, 0, 2015180061, '2021-01-10 12:23:37'),
(359, 0, 2013380018, '2021-01-10 12:44:38'),
(360, 0, 2017102425, '2021-01-10 12:16:40'),
(361, 0, 2018102686, '2021-01-10 12:20:29'),
(362, 0, 2018102417, '2021-01-10 12:35:51'),
(363, 0, 2012180162, '2021-01-10 12:27:22'),
(364, 0, 2016180067, '2021-01-10 16:42:35'),
(365, 0, 2015380013, '2021-01-10 16:40:31'),
(366, 0, 2015102429, '2021-01-10 16:39:05'),
(367, 0, 2015102434, '2021-01-10 16:38:26'),
(368, 0, 2015102433, '2021-01-10 16:31:28'),
(369, 0, 2015180061, '2021-01-10 16:41:32'),
(370, 0, 2013380018, '2021-01-10 16:44:26'),
(371, 0, 2017102425, '2021-01-10 16:40:28'),
(372, 0, 2018102686, '2021-01-10 16:31:44'),
(373, 0, 2018102417, '2021-01-10 16:41:33'),
(374, 0, 2012180162, '2021-01-10 16:42:17'),
(375, 0, 2016180067, '2021-01-10 16:25:47'),
(376, 0, 2015380013, '2021-01-10 16:54:52'),
(377, 0, 2015102429, '2021-01-10 16:26:29'),
(378, 0, 2015102434, '2021-01-10 16:50:26'),
(379, 0, 2015102433, '2021-01-10 16:56:30'),
(380, 0, 2015180061, '2021-01-10 17:39:47'),
(381, 0, 2013380018, '2021-01-10 17:38:27'),
(382, 0, 2017102425, '2021-01-10 16:56:51'),
(383, 0, 2018102686, '2021-01-10 16:40:32'),
(384, 0, 2018102417, '2021-01-10 17:05:50'),
(385, 0, 2012180162, '2021-01-10 16:51:14'),
(386, 0, 2016180067, '2021-01-11 08:05:47'),
(387, 0, 2015380013, '2021-01-11 08:07:04'),
(388, 0, 2015102429, '2021-01-11 08:04:15'),
(389, 0, 2015102434, '2021-01-11 08:13:43'),
(390, 0, 2015102433, '2021-01-11 08:08:56'),
(391, 0, 2015180061, '2021-01-11 08:12:51'),
(392, 0, 2013380018, '2021-01-11 08:07:18'),
(393, 0, 2017102425, '2021-01-11 08:04:14'),
(394, 0, 2018102686, '2021-01-11 08:13:07'),
(395, 0, 2018102417, '2021-01-11 08:05:30'),
(396, 0, 2012180162, '2021-01-11 08:04:37'),
(397, 0, 2016180067, '2021-01-11 10:12:25'),
(398, 0, 2015380013, '2021-01-11 10:05:32'),
(399, 0, 2015102429, '2021-01-11 10:09:13'),
(400, 0, 2015102434, '2021-01-11 10:17:37'),
(401, 0, 2015102433, '2021-01-11 10:12:47'),
(402, 0, 2015180061, '2021-01-11 10:04:56'),
(403, 0, 2013380018, '2021-01-11 10:12:53'),
(404, 0, 2017102425, '2021-01-11 10:00:06'),
(405, 0, 2018102686, '2021-01-11 10:18:13'),
(406, 0, 2018102417, '2021-01-11 10:19:46'),
(407, 0, 2012180162, '2021-01-11 10:07:53'),
(408, 0, 2016180067, '2021-01-11 12:42:25'),
(409, 0, 2015380013, '2021-01-11 12:28:09'),
(410, 0, 2015102429, '2021-01-11 12:34:25'),
(411, 0, 2015102434, '2021-01-11 12:23:34'),
(412, 0, 2015102433, '2021-01-11 12:38:48'),
(413, 0, 2015180061, '2021-01-11 12:29:56'),
(414, 0, 2013380018, '2021-01-11 12:32:12'),
(415, 0, 2017102425, '2021-01-11 12:43:13'),
(416, 0, 2018102686, '2021-01-11 12:25:40'),
(417, 0, 2018102417, '2021-01-11 12:37:43'),
(418, 0, 2012180162, '2021-01-11 12:26:37'),
(419, 0, 2016180067, '2021-01-11 16:35:04'),
(420, 0, 2015380013, '2021-01-11 16:40:50'),
(421, 0, 2015102429, '2021-01-11 16:43:40'),
(422, 0, 2015102434, '2021-01-11 16:35:12'),
(423, 0, 2015102433, '2021-01-11 16:34:41'),
(424, 0, 2015180061, '2021-01-11 16:37:52'),
(425, 0, 2013380018, '2021-01-11 16:33:46'),
(426, 0, 2017102425, '2021-01-11 16:38:31'),
(427, 0, 2018102686, '2021-01-11 16:36:47'),
(428, 0, 2018102417, '2021-01-11 16:44:47'),
(429, 0, 2012180162, '2021-01-11 16:40:52'),
(430, 0, 2016180067, '2021-01-11 16:01:40'),
(431, 0, 2015380013, '2021-01-11 16:43:45'),
(432, 0, 2015102429, '2021-01-11 17:32:43'),
(433, 0, 2015102434, '2021-01-11 17:14:28'),
(434, 0, 2015102433, '2021-01-11 16:46:41'),
(435, 0, 2015180061, '2021-01-11 16:14:05'),
(436, 0, 2013380018, '2021-01-11 17:30:57'),
(437, 0, 2017102425, '2021-01-11 16:52:57'),
(438, 0, 2018102686, '2021-01-11 17:02:55'),
(439, 0, 2018102417, '2021-01-11 16:20:01'),
(440, 0, 2012180162, '2021-01-11 16:01:55'),
(441, 0, 2016180067, '2021-01-12 08:10:04'),
(442, 0, 2015380013, '2021-01-12 08:08:46'),
(443, 0, 2015102429, '2021-01-12 08:01:09'),
(444, 0, 2015102434, '2021-01-12 08:11:51'),
(445, 0, 2015102433, '2021-01-12 08:04:35'),
(446, 0, 2015180061, '2021-01-12 08:05:26'),
(447, 0, 2013380018, '2021-01-12 08:07:17'),
(448, 0, 2017102425, '2021-01-12 08:07:59'),
(449, 0, 2018102686, '2021-01-12 08:13:21'),
(450, 0, 2018102417, '2021-01-12 08:02:34'),
(451, 0, 2012180162, '2021-01-12 08:08:05'),
(452, 0, 2016180067, '2021-01-12 10:06:44'),
(453, 0, 2015380013, '2021-01-12 10:16:10'),
(454, 0, 2015102429, '2021-01-12 10:13:11'),
(455, 0, 2015102434, '2021-01-12 10:06:22'),
(456, 0, 2015102433, '2021-01-12 10:02:22'),
(457, 0, 2015180061, '2021-01-12 10:17:24'),
(458, 0, 2013380018, '2021-01-12 10:03:51'),
(459, 0, 2017102425, '2021-01-12 10:18:32'),
(460, 0, 2018102686, '2021-01-12 10:12:30'),
(461, 0, 2018102417, '2021-01-12 10:18:11'),
(462, 0, 2012180162, '2021-01-12 10:16:11'),
(463, 0, 2016180067, '2021-01-12 12:29:00'),
(464, 0, 2015380013, '2021-01-12 12:19:42'),
(465, 0, 2015102429, '2021-01-12 12:25:34'),
(466, 0, 2015102434, '2021-01-12 12:34:47'),
(467, 0, 2015102433, '2021-01-12 12:15:58'),
(468, 0, 2015180061, '2021-01-12 12:34:20'),
(469, 0, 2013380018, '2021-01-12 12:21:18'),
(470, 0, 2017102425, '2021-01-12 12:18:44'),
(471, 0, 2018102686, '2021-01-12 12:28:28'),
(472, 0, 2018102417, '2021-01-12 12:27:54'),
(473, 0, 2012180162, '2021-01-12 12:17:32'),
(474, 0, 2016180067, '2021-01-12 16:39:10'),
(475, 0, 2015380013, '2021-01-12 16:30:16'),
(476, 0, 2015102429, '2021-01-12 16:44:14'),
(477, 0, 2015102434, '2021-01-12 16:37:58'),
(478, 0, 2015102433, '2021-01-12 16:44:52'),
(479, 0, 2015180061, '2021-01-12 16:42:38'),
(480, 0, 2013380018, '2021-01-12 16:41:52'),
(481, 0, 2017102425, '2021-01-12 16:44:04'),
(482, 0, 2018102686, '2021-01-12 16:36:10'),
(483, 0, 2018102417, '2021-01-12 16:42:49'),
(484, 0, 2012180162, '2021-01-12 16:31:34'),
(485, 0, 2016180067, '2021-01-12 16:28:05'),
(486, 0, 2015380013, '2021-01-12 16:28:51'),
(487, 0, 2015102429, '2021-01-12 16:36:17'),
(488, 0, 2015102434, '2021-01-12 16:50:42'),
(489, 0, 2015102433, '2021-01-12 16:18:32'),
(490, 0, 2015180061, '2021-01-12 16:42:55'),
(491, 0, 2013380018, '2021-01-12 17:30:07'),
(492, 0, 2017102425, '2021-01-12 16:08:04'),
(493, 0, 2018102686, '2021-01-12 16:08:20'),
(494, 0, 2018102417, '2021-01-12 16:16:41'),
(495, 0, 2012180162, '2021-01-12 16:50:50'),
(496, 0, 2016180067, '2021-01-13 08:14:20'),
(497, 0, 2015380013, '2021-01-13 08:08:56'),
(498, 0, 2015102429, '2021-01-13 08:09:14'),
(499, 0, 2015102434, '2021-01-13 08:01:13'),
(500, 0, 2015102433, '2021-01-13 08:10:46'),
(501, 0, 2015180061, '2021-01-13 08:06:19'),
(502, 0, 2013380018, '2021-01-13 08:05:54'),
(503, 0, 2017102425, '2021-01-13 08:06:56'),
(504, 0, 2018102686, '2021-01-13 08:14:24'),
(505, 0, 2018102417, '2021-01-13 08:08:48'),
(506, 0, 2012180162, '2021-01-13 08:02:20'),
(507, 0, 2016180067, '2021-01-13 10:07:25'),
(508, 0, 2015380013, '2021-01-13 10:06:46'),
(509, 0, 2015102429, '2021-01-13 10:00:06'),
(510, 0, 2015102434, '2021-01-13 10:12:08'),
(511, 0, 2015102433, '2021-01-13 10:02:48'),
(512, 0, 2015180061, '2021-01-13 10:18:10'),
(513, 0, 2013380018, '2021-01-13 10:18:15'),
(514, 0, 2017102425, '2021-01-13 10:14:32'),
(515, 0, 2018102686, '2021-01-13 10:09:38'),
(516, 0, 2018102417, '2021-01-13 10:08:10'),
(517, 0, 2012180162, '2021-01-13 10:03:33'),
(518, 0, 2016180067, '2021-01-13 12:22:06'),
(519, 0, 2015380013, '2021-01-13 12:38:27'),
(520, 0, 2015102429, '2021-01-13 12:21:01'),
(521, 0, 2015102434, '2021-01-13 12:35:15'),
(522, 0, 2015102433, '2021-01-13 12:24:19'),
(523, 0, 2015180061, '2021-01-13 12:23:49'),
(524, 0, 2013380018, '2021-01-13 12:29:33'),
(525, 0, 2017102425, '2021-01-13 12:29:57'),
(526, 0, 2018102686, '2021-01-13 12:26:11'),
(527, 0, 2018102417, '2021-01-13 12:35:07'),
(528, 0, 2012180162, '2021-01-13 12:36:19'),
(529, 0, 2016180067, '2021-01-13 16:31:38'),
(530, 0, 2015380013, '2021-01-13 16:33:38'),
(531, 0, 2015102429, '2021-01-13 16:38:43'),
(532, 0, 2015102434, '2021-01-13 16:30:16'),
(533, 0, 2015102433, '2021-01-13 16:39:16'),
(534, 0, 2015180061, '2021-01-13 16:40:33'),
(535, 0, 2013380018, '2021-01-13 16:33:30'),
(536, 0, 2017102425, '2021-01-13 16:36:57'),
(537, 0, 2018102686, '2021-01-13 16:41:19'),
(538, 0, 2018102417, '2021-01-13 16:34:32'),
(539, 0, 2012180162, '2021-01-13 16:35:54'),
(540, 0, 2016180067, '2021-01-13 17:04:56'),
(541, 0, 2015380013, '2021-01-13 17:08:46'),
(542, 0, 2015102429, '2021-01-13 16:26:15'),
(543, 0, 2015102434, '2021-01-13 16:09:51'),
(544, 0, 2015102433, '2021-01-13 16:15:35'),
(545, 0, 2015180061, '2021-01-13 16:00:10'),
(546, 0, 2013380018, '2021-01-13 17:11:49'),
(547, 0, 2017102425, '2021-01-13 16:12:58'),
(548, 0, 2018102686, '2021-01-13 17:19:00'),
(549, 0, 2018102417, '2021-01-13 16:31:20'),
(550, 0, 2012180162, '2021-01-13 16:59:30'),
(551, 0, 2016180067, '2021-01-14 08:06:11'),
(552, 0, 2015380013, '2021-01-14 08:08:20'),
(553, 0, 2015102429, '2021-01-14 08:14:03'),
(554, 0, 2015102434, '2021-01-14 08:04:10'),
(555, 0, 2015102433, '2021-01-14 08:05:28'),
(556, 0, 2015180061, '2021-01-14 08:13:32'),
(557, 0, 2013380018, '2021-01-14 08:05:51'),
(558, 0, 2017102425, '2021-01-14 08:11:28'),
(559, 0, 2018102686, '2021-01-14 08:10:36'),
(560, 0, 2018102417, '2021-01-14 08:09:07'),
(561, 0, 2012180162, '2021-01-14 08:07:01'),
(562, 0, 2016180067, '2021-01-14 10:00:38'),
(563, 0, 2015380013, '2021-01-14 10:11:49'),
(564, 0, 2015102429, '2021-01-14 10:11:39'),
(565, 0, 2015102434, '2021-01-14 10:13:38'),
(566, 0, 2015102433, '2021-01-14 10:17:34'),
(567, 0, 2015180061, '2021-01-14 10:01:59'),
(568, 0, 2013380018, '2021-01-14 10:10:24'),
(569, 0, 2017102425, '2021-01-14 10:09:53'),
(570, 0, 2018102686, '2021-01-14 10:08:32'),
(571, 0, 2018102417, '2021-01-14 10:14:41'),
(572, 0, 2012180162, '2021-01-14 10:08:08'),
(573, 0, 2016180067, '2021-01-14 12:36:15'),
(574, 0, 2015380013, '2021-01-14 12:24:08'),
(575, 0, 2015102429, '2021-01-14 12:16:17'),
(576, 0, 2015102434, '2021-01-14 12:23:04'),
(577, 0, 2015102433, '2021-01-14 12:21:05'),
(578, 0, 2015180061, '2021-01-14 12:38:14'),
(579, 0, 2013380018, '2021-01-14 12:18:04'),
(580, 0, 2017102425, '2021-01-14 12:23:48'),
(581, 0, 2018102686, '2021-01-14 12:42:32'),
(582, 0, 2018102417, '2021-01-14 12:16:41'),
(583, 0, 2012180162, '2021-01-14 12:41:32'),
(584, 0, 2016180067, '2021-01-14 16:42:07'),
(585, 0, 2015380013, '2021-01-14 16:42:38'),
(586, 0, 2015102429, '2021-01-14 16:37:39'),
(587, 0, 2015102434, '2021-01-14 16:33:07'),
(588, 0, 2015102433, '2021-01-14 16:32:22'),
(589, 0, 2015180061, '2021-01-14 16:30:41'),
(590, 0, 2013380018, '2021-01-14 16:33:53'),
(591, 0, 2017102425, '2021-01-14 16:38:39'),
(592, 0, 2018102686, '2021-01-14 16:31:35'),
(593, 0, 2018102417, '2021-01-14 16:35:52'),
(594, 0, 2012180162, '2021-01-14 16:34:23'),
(595, 0, 2016180067, '2021-01-14 17:02:24'),
(596, 0, 2015380013, '2021-01-14 16:47:31'),
(597, 0, 2015102429, '2021-01-14 16:40:57'),
(598, 0, 2015102434, '2021-01-14 16:03:24'),
(599, 0, 2015102433, '2021-01-14 16:55:57'),
(600, 0, 2015180061, '2021-01-14 17:03:40'),
(601, 0, 2013380018, '2021-01-14 17:09:09'),
(602, 0, 2017102425, '2021-01-14 17:31:29'),
(603, 0, 2018102686, '2021-01-14 16:13:29'),
(604, 0, 2018102417, '2021-01-14 17:04:59'),
(605, 0, 2012180162, '2021-01-14 17:18:34'),
(606, 0, 2016180067, '2021-01-15 08:06:36'),
(607, 0, 2015380013, '2021-01-15 08:14:24'),
(608, 0, 2015102429, '2021-01-15 08:00:01'),
(609, 0, 2015102434, '2021-01-15 08:06:37'),
(610, 0, 2015102433, '2021-01-15 08:00:20'),
(611, 0, 2015180061, '2021-01-15 08:01:35'),
(612, 0, 2013380018, '2021-01-15 08:06:58'),
(613, 0, 2017102425, '2021-01-15 08:08:05'),
(614, 0, 2018102686, '2021-01-15 08:14:08'),
(615, 0, 2018102417, '2021-01-15 08:00:02'),
(616, 0, 2012180162, '2021-01-15 08:13:43'),
(617, 0, 2016180067, '2021-01-15 10:03:19'),
(618, 0, 2015380013, '2021-01-15 10:09:04'),
(619, 0, 2015102429, '2021-01-15 10:14:46'),
(620, 0, 2015102434, '2021-01-15 10:16:41'),
(621, 0, 2015102433, '2021-01-15 10:14:55'),
(622, 0, 2015180061, '2021-01-15 10:06:51'),
(623, 0, 2013380018, '2021-01-15 10:16:17'),
(624, 0, 2017102425, '2021-01-15 10:11:03'),
(625, 0, 2018102686, '2021-01-15 10:14:34'),
(626, 0, 2018102417, '2021-01-15 10:13:17'),
(627, 0, 2012180162, '2021-01-15 10:05:52'),
(628, 0, 2016180067, '2021-01-15 12:37:25'),
(629, 0, 2015380013, '2021-01-15 12:27:14'),
(630, 0, 2015102429, '2021-01-15 12:22:26'),
(631, 0, 2015102434, '2021-01-15 12:21:41'),
(632, 0, 2015102433, '2021-01-15 12:15:06'),
(633, 0, 2015180061, '2021-01-15 12:31:20'),
(634, 0, 2013380018, '2021-01-15 12:18:47'),
(635, 0, 2017102425, '2021-01-15 12:25:36'),
(636, 0, 2018102686, '2021-01-15 12:43:20'),
(637, 0, 2018102417, '2021-01-15 12:26:41'),
(638, 0, 2012180162, '2021-01-15 12:22:52'),
(639, 0, 2016180067, '2021-01-15 16:38:39'),
(640, 0, 2015380013, '2021-01-15 16:44:31'),
(641, 0, 2015102429, '2021-01-15 16:42:33'),
(642, 0, 2015102434, '2021-01-15 16:44:38'),
(643, 0, 2015102433, '2021-01-15 16:33:33'),
(644, 0, 2015180061, '2021-01-15 16:40:18'),
(645, 0, 2013380018, '2021-01-15 16:41:45'),
(646, 0, 2017102425, '2021-01-15 16:33:09'),
(647, 0, 2018102686, '2021-01-15 16:34:43'),
(648, 0, 2018102417, '2021-01-15 16:31:37'),
(649, 0, 2012180162, '2021-01-15 16:43:09'),
(650, 0, 2016180067, '2021-01-15 17:08:08'),
(651, 0, 2015380013, '2021-01-15 16:24:44'),
(652, 0, 2015102429, '2021-01-15 16:36:02'),
(653, 0, 2015102434, '2021-01-15 17:07:09'),
(654, 0, 2015102433, '2021-01-15 17:34:20'),
(655, 0, 2015180061, '2021-01-15 16:46:48'),
(656, 0, 2013380018, '2021-01-15 17:00:30'),
(657, 0, 2017102425, '2021-01-15 16:43:00'),
(658, 0, 2018102686, '2021-01-15 16:47:19'),
(659, 0, 2018102417, '2021-01-15 17:21:53'),
(660, 0, 2012180162, '2021-01-15 16:30:47'),
(661, 0, 2016180067, '2021-01-16 08:00:03'),
(662, 0, 2015380013, '2021-01-16 08:00:30'),
(663, 0, 2015102429, '2021-01-16 08:14:25'),
(664, 0, 2015102434, '2021-01-16 08:10:13'),
(665, 0, 2015102433, '2021-01-16 08:10:39'),
(666, 0, 2015180061, '2021-01-16 08:01:21'),
(667, 0, 2013380018, '2021-01-16 08:01:11'),
(668, 0, 2017102425, '2021-01-16 08:10:33'),
(669, 0, 2018102686, '2021-01-16 08:13:03'),
(670, 0, 2018102417, '2021-01-16 08:01:48'),
(671, 0, 2012180162, '2021-01-16 08:12:27'),
(672, 0, 2016180067, '2021-01-16 10:07:39'),
(673, 0, 2015380013, '2021-01-16 10:02:08'),
(674, 0, 2015102429, '2021-01-16 10:09:34'),
(675, 0, 2015102434, '2021-01-16 10:16:35'),
(676, 0, 2015102433, '2021-01-16 10:11:03'),
(677, 0, 2015180061, '2021-01-16 10:04:57'),
(678, 0, 2013380018, '2021-01-16 10:04:04'),
(679, 0, 2017102425, '2021-01-16 10:06:50'),
(680, 0, 2018102686, '2021-01-16 10:16:24'),
(681, 0, 2018102417, '2021-01-16 10:16:45'),
(682, 0, 2012180162, '2021-01-16 10:12:06'),
(683, 0, 2016180067, '2021-01-16 12:27:29'),
(684, 0, 2015380013, '2021-01-16 12:28:46'),
(685, 0, 2015102429, '2021-01-16 12:38:07'),
(686, 0, 2015102434, '2021-01-16 12:33:19'),
(687, 0, 2015102433, '2021-01-16 12:19:53'),
(688, 0, 2015180061, '2021-01-16 12:22:35'),
(689, 0, 2013380018, '2021-01-16 12:42:51'),
(690, 0, 2017102425, '2021-01-16 12:43:59'),
(691, 0, 2018102686, '2021-01-16 12:33:02'),
(692, 0, 2018102417, '2021-01-16 12:26:16'),
(693, 0, 2012180162, '2021-01-16 12:34:55'),
(694, 0, 2016180067, '2021-01-16 16:39:05'),
(695, 0, 2015380013, '2021-01-16 16:33:39'),
(696, 0, 2015102429, '2021-01-16 16:40:51'),
(697, 0, 2015102434, '2021-01-16 16:32:30'),
(698, 0, 2015102433, '2021-01-16 16:32:19'),
(699, 0, 2015180061, '2021-01-16 16:31:51'),
(700, 0, 2013380018, '2021-01-16 16:33:02'),
(701, 0, 2017102425, '2021-01-16 16:33:28'),
(702, 0, 2018102686, '2021-01-16 16:35:26'),
(703, 0, 2018102417, '2021-01-16 16:37:36'),
(704, 0, 2012180162, '2021-01-16 16:30:41'),
(705, 0, 2016180067, '2021-01-16 16:01:48'),
(706, 0, 2015380013, '2021-01-16 16:43:38'),
(707, 0, 2015102429, '2021-01-16 16:55:38'),
(708, 0, 2015102434, '2021-01-16 17:27:07'),
(709, 0, 2015102433, '2021-01-16 17:38:18'),
(710, 0, 2015180061, '2021-01-16 16:43:02'),
(711, 0, 2013380018, '2021-01-16 17:20:00'),
(712, 0, 2017102425, '2021-01-16 17:06:38'),
(713, 0, 2018102686, '2021-01-16 17:10:33'),
(714, 0, 2018102417, '2021-01-16 17:08:36'),
(715, 0, 2012180162, '2021-01-16 16:30:28'),
(716, 0, 2017380981, '2021-01-11 08:12:03'),
(717, 0, 2013104449, '2021-01-11 08:03:05'),
(718, 0, 2017102556, '2021-01-11 08:06:03'),
(719, 0, 2019102433, '2021-01-11 08:05:33'),
(720, 0, 2019180967, '2021-01-11 08:02:25'),
(721, 0, 2017580058, '2021-01-11 08:01:02'),
(722, 0, 2017105453, '2021-01-11 08:06:58'),
(723, 0, 2014102346, '2021-01-11 08:06:09'),
(724, 0, 2016106141, '2021-01-11 08:10:12'),
(725, 0, 2017380981, '2021-01-11 10:18:36'),
(726, 0, 2013104449, '2021-01-11 10:02:18'),
(727, 0, 2017102556, '2021-01-11 10:16:26'),
(728, 0, 2019102433, '2021-01-11 10:15:34'),
(729, 0, 2019180967, '2021-01-11 10:02:55'),
(730, 0, 2017580058, '2021-01-11 10:14:30'),
(731, 0, 2017105453, '2021-01-11 10:18:18'),
(732, 0, 2014102346, '2021-01-11 10:00:43'),
(733, 0, 2016106141, '2021-01-11 10:06:10'),
(734, 0, 2017380981, '2021-01-11 12:26:28'),
(735, 0, 2013104449, '2021-01-11 12:23:26'),
(736, 0, 2017102556, '2021-01-11 12:19:06'),
(737, 0, 2019102433, '2021-01-11 12:39:25'),
(738, 0, 2019180967, '2021-01-11 12:30:14'),
(739, 0, 2017580058, '2021-01-11 12:30:16'),
(740, 0, 2017105453, '2021-01-11 12:15:12'),
(741, 0, 2014102346, '2021-01-11 12:44:19'),
(742, 0, 2016106141, '2021-01-11 12:27:57'),
(743, 0, 2017380981, '2021-01-11 16:44:56'),
(744, 0, 2013104449, '2021-01-11 16:44:35'),
(745, 0, 2017102556, '2021-01-11 16:41:36'),
(746, 0, 2019102433, '2021-01-11 16:44:00'),
(747, 0, 2019180967, '2021-01-11 16:44:10'),
(748, 0, 2017580058, '2021-01-11 16:30:43'),
(749, 0, 2017105453, '2021-01-11 16:38:13'),
(750, 0, 2014102346, '2021-01-11 16:33:20'),
(751, 0, 2016106141, '2021-01-11 16:44:29'),
(752, 0, 2017380981, '2021-01-11 16:59:32'),
(753, 0, 2013104449, '2021-01-11 16:27:17'),
(754, 0, 2017102556, '2021-01-11 16:55:44'),
(755, 0, 2019102433, '2021-01-11 16:03:27'),
(756, 0, 2019180967, '2021-01-11 16:36:02'),
(757, 0, 2017580058, '2021-01-11 17:23:48'),
(758, 0, 2017105453, '2021-01-11 17:29:59'),
(759, 0, 2014102346, '2021-01-11 16:32:35'),
(760, 0, 2016106141, '2021-01-11 16:40:08'),
(761, 0, 2017380981, '2021-01-12 08:05:55'),
(762, 0, 2013104449, '2021-01-12 08:14:53'),
(763, 0, 2017102556, '2021-01-12 08:08:22'),
(764, 0, 2019102433, '2021-01-12 08:05:06'),
(765, 0, 2019180967, '2021-01-12 08:14:50'),
(766, 0, 2017580058, '2021-01-12 08:01:19'),
(767, 0, 2017105453, '2021-01-12 08:11:42'),
(768, 0, 2014102346, '2021-01-12 08:02:29'),
(769, 0, 2016106141, '2021-01-12 08:09:15'),
(770, 0, 2017380981, '2021-01-12 10:13:50'),
(771, 0, 2013104449, '2021-01-12 10:00:36'),
(772, 0, 2017102556, '2021-01-12 10:16:34'),
(773, 0, 2019102433, '2021-01-12 10:14:02'),
(774, 0, 2019180967, '2021-01-12 10:09:45'),
(775, 0, 2017580058, '2021-01-12 10:04:26'),
(776, 0, 2017105453, '2021-01-12 10:16:33'),
(777, 0, 2014102346, '2021-01-12 10:12:26'),
(778, 0, 2016106141, '2021-01-12 10:08:52'),
(779, 0, 2017380981, '2021-01-12 12:44:37'),
(780, 0, 2013104449, '2021-01-12 12:44:13'),
(781, 0, 2017102556, '2021-01-12 12:25:15'),
(782, 0, 2019102433, '2021-01-12 12:17:14'),
(783, 0, 2019180967, '2021-01-12 12:32:39'),
(784, 0, 2017580058, '2021-01-12 12:26:31'),
(785, 0, 2017105453, '2021-01-12 12:41:23'),
(786, 0, 2014102346, '2021-01-12 12:19:20'),
(787, 0, 2016106141, '2021-01-12 12:29:49'),
(788, 0, 2017380981, '2021-01-12 16:31:37'),
(789, 0, 2013104449, '2021-01-12 16:35:31'),
(790, 0, 2017102556, '2021-01-12 16:44:12'),
(791, 0, 2019102433, '2021-01-12 16:44:20'),
(792, 0, 2019180967, '2021-01-12 16:38:08'),
(793, 0, 2017580058, '2021-01-12 16:31:45'),
(794, 0, 2017105453, '2021-01-12 16:38:26'),
(795, 0, 2014102346, '2021-01-12 16:34:13'),
(796, 0, 2016106141, '2021-01-12 16:31:26'),
(797, 0, 2017380981, '2021-01-12 17:23:37'),
(798, 0, 2013104449, '2021-01-12 17:29:31'),
(799, 0, 2017102556, '2021-01-12 16:29:28'),
(800, 0, 2019102433, '2021-01-12 16:20:09'),
(801, 0, 2019180967, '2021-01-12 17:10:25'),
(802, 0, 2017580058, '2021-01-12 16:33:23'),
(803, 0, 2017105453, '2021-01-12 17:13:44'),
(804, 0, 2014102346, '2021-01-12 17:03:51'),
(805, 0, 2016106141, '2021-01-12 17:28:37'),
(806, 0, 2017380981, '2021-01-13 08:13:55'),
(807, 0, 2013104449, '2021-01-13 08:11:57'),
(808, 0, 2017102556, '2021-01-13 08:08:45'),
(809, 0, 2019102433, '2021-01-13 08:12:07'),
(810, 0, 2019180967, '2021-01-13 08:12:15'),
(811, 0, 2017580058, '2021-01-13 08:02:18'),
(812, 0, 2017105453, '2021-01-13 08:09:32'),
(813, 0, 2014102346, '2021-01-13 08:08:22'),
(814, 0, 2016106141, '2021-01-13 08:05:35'),
(815, 0, 2017380981, '2021-01-13 10:13:06'),
(816, 0, 2013104449, '2021-01-13 10:09:21'),
(817, 0, 2017102556, '2021-01-13 10:09:24'),
(818, 0, 2019102433, '2021-01-13 10:14:27'),
(819, 0, 2019180967, '2021-01-13 10:01:54'),
(820, 0, 2017580058, '2021-01-13 10:05:08'),
(821, 0, 2017105453, '2021-01-13 10:07:02'),
(822, 0, 2014102346, '2021-01-13 10:05:44'),
(823, 0, 2016106141, '2021-01-13 10:05:06'),
(824, 0, 2017380981, '2021-01-13 12:37:04'),
(825, 0, 2013104449, '2021-01-13 12:24:21'),
(826, 0, 2017102556, '2021-01-13 12:30:31'),
(827, 0, 2019102433, '2021-01-13 12:21:06'),
(828, 0, 2019180967, '2021-01-13 12:36:03'),
(829, 0, 2017580058, '2021-01-13 12:37:42'),
(830, 0, 2017105453, '2021-01-13 12:24:38'),
(831, 0, 2014102346, '2021-01-13 12:16:44'),
(832, 0, 2016106141, '2021-01-13 12:38:06'),
(833, 0, 2017380981, '2021-01-13 16:37:48'),
(834, 0, 2013104449, '2021-01-13 16:43:03'),
(835, 0, 2017102556, '2021-01-13 16:38:13'),
(836, 0, 2019102433, '2021-01-13 16:31:06'),
(837, 0, 2019180967, '2021-01-13 16:39:19'),
(838, 0, 2017580058, '2021-01-13 16:36:23'),
(839, 0, 2017105453, '2021-01-13 16:35:03'),
(840, 0, 2014102346, '2021-01-13 16:33:28'),
(841, 0, 2016106141, '2021-01-13 16:39:52'),
(842, 0, 2017380981, '2021-01-13 16:46:50'),
(843, 0, 2013104449, '2021-01-13 16:59:56'),
(844, 0, 2017102556, '2021-01-13 17:24:51'),
(845, 0, 2019102433, '2021-01-13 16:39:12'),
(846, 0, 2019180967, '2021-01-13 17:26:33'),
(847, 0, 2017580058, '2021-01-13 17:15:33'),
(848, 0, 2017105453, '2021-01-13 16:51:22'),
(849, 0, 2014102346, '2021-01-13 16:35:08'),
(850, 0, 2016106141, '2021-01-13 16:41:55'),
(851, 0, 2017380981, '2021-01-14 08:07:33'),
(852, 0, 2013104449, '2021-01-14 08:05:23'),
(853, 0, 2017102556, '2021-01-14 08:10:21'),
(854, 0, 2019102433, '2021-01-14 08:13:11'),
(855, 0, 2019180967, '2021-01-14 08:13:37'),
(856, 0, 2017580058, '2021-01-14 08:00:52'),
(857, 0, 2017105453, '2021-01-14 08:04:07'),
(858, 0, 2014102346, '2021-01-14 08:09:38'),
(859, 0, 2016106141, '2021-01-14 08:11:03'),
(860, 0, 2017380981, '2021-01-14 10:00:57'),
(861, 0, 2013104449, '2021-01-14 10:05:28'),
(862, 0, 2017102556, '2021-01-14 10:02:10'),
(863, 0, 2019102433, '2021-01-14 10:18:50'),
(864, 0, 2019180967, '2021-01-14 10:01:00'),
(865, 0, 2017580058, '2021-01-14 10:04:42'),
(866, 0, 2017105453, '2021-01-14 10:06:21'),
(867, 0, 2014102346, '2021-01-14 10:02:11'),
(868, 0, 2016106141, '2021-01-14 10:01:58'),
(869, 0, 2017380981, '2021-01-14 12:23:51'),
(870, 0, 2013104449, '2021-01-14 12:30:29'),
(871, 0, 2017102556, '2021-01-14 12:35:55'),
(872, 0, 2019102433, '2021-01-14 12:44:21'),
(873, 0, 2019180967, '2021-01-14 12:27:37'),
(874, 0, 2017580058, '2021-01-14 12:17:31'),
(875, 0, 2017105453, '2021-01-14 12:19:14'),
(876, 0, 2014102346, '2021-01-14 12:23:36'),
(877, 0, 2016106141, '2021-01-14 12:25:07'),
(878, 0, 2017380981, '2021-01-14 16:35:37'),
(879, 0, 2013104449, '2021-01-14 16:43:01'),
(880, 0, 2017102556, '2021-01-14 16:40:18'),
(881, 0, 2019102433, '2021-01-14 16:43:33'),
(882, 0, 2019180967, '2021-01-14 16:41:11'),
(883, 0, 2017580058, '2021-01-14 16:43:05'),
(884, 0, 2017105453, '2021-01-14 16:36:29'),
(885, 0, 2014102346, '2021-01-14 16:33:45'),
(886, 0, 2016106141, '2021-01-14 16:36:37'),
(887, 0, 2017380981, '2021-01-14 16:35:06'),
(888, 0, 2013104449, '2021-01-14 16:14:46'),
(889, 0, 2017102556, '2021-01-14 17:14:34'),
(890, 0, 2019102433, '2021-01-14 17:21:23'),
(891, 0, 2019180967, '2021-01-14 17:21:24'),
(892, 0, 2017580058, '2021-01-14 17:39:02'),
(893, 0, 2017105453, '2021-01-14 16:56:40'),
(894, 0, 2014102346, '2021-01-14 17:23:15'),
(895, 0, 2016106141, '2021-01-14 16:44:17'),
(896, 0, 2017380981, '2021-01-15 08:03:28'),
(897, 0, 2013104449, '2021-01-15 08:08:47'),
(898, 0, 2017102556, '2021-01-15 08:08:57'),
(899, 0, 2019102433, '2021-01-15 08:13:46'),
(900, 0, 2019180967, '2021-01-15 08:10:37'),
(901, 0, 2017580058, '2021-01-15 08:08:00'),
(902, 0, 2017105453, '2021-01-15 08:04:15'),
(903, 0, 2014102346, '2021-01-15 08:09:50'),
(904, 0, 2016106141, '2021-01-15 08:03:52'),
(905, 0, 2017380981, '2021-01-15 10:10:06'),
(906, 0, 2013104449, '2021-01-15 10:02:47'),
(907, 0, 2017102556, '2021-01-15 10:14:59'),
(908, 0, 2019102433, '2021-01-15 10:10:13'),
(909, 0, 2019180967, '2021-01-15 10:04:42'),
(910, 0, 2017580058, '2021-01-15 10:06:18'),
(911, 0, 2017105453, '2021-01-15 10:08:48'),
(912, 0, 2014102346, '2021-01-15 10:12:09'),
(913, 0, 2016106141, '2021-01-15 10:18:00'),
(914, 0, 2017380981, '2021-01-15 12:22:53'),
(915, 0, 2013104449, '2021-01-15 12:27:59'),
(916, 0, 2017102556, '2021-01-15 12:19:32'),
(917, 0, 2019102433, '2021-01-15 12:39:23'),
(918, 0, 2019180967, '2021-01-15 12:23:29'),
(919, 0, 2017580058, '2021-01-15 12:25:21'),
(920, 0, 2017105453, '2021-01-15 12:30:35'),
(921, 0, 2014102346, '2021-01-15 12:28:31'),
(922, 0, 2016106141, '2021-01-15 12:20:33'),
(923, 0, 2017380981, '2021-01-15 16:43:32'),
(924, 0, 2013104449, '2021-01-15 16:43:21'),
(925, 0, 2017102556, '2021-01-15 16:31:04'),
(926, 0, 2019102433, '2021-01-15 16:37:26'),
(927, 0, 2019180967, '2021-01-15 16:34:46'),
(928, 0, 2017580058, '2021-01-15 16:31:52'),
(929, 0, 2017105453, '2021-01-15 16:35:28'),
(930, 0, 2014102346, '2021-01-15 16:30:38'),
(931, 0, 2016106141, '2021-01-15 16:38:32'),
(932, 0, 2017380981, '2021-01-15 17:27:12'),
(933, 0, 2013104449, '2021-01-15 17:07:44'),
(934, 0, 2017102556, '2021-01-15 16:18:16'),
(935, 0, 2019102433, '2021-01-15 16:28:33'),
(936, 0, 2019180967, '2021-01-15 16:56:02'),
(937, 0, 2017580058, '2021-01-15 17:36:19'),
(938, 0, 2017105453, '2021-01-15 16:28:12'),
(939, 0, 2014102346, '2021-01-15 16:37:32'),
(940, 0, 2016106141, '2021-01-15 17:20:29'),
(941, 0, 2017380981, '2021-01-16 08:07:57'),
(942, 0, 2013104449, '2021-01-16 08:12:26'),
(943, 0, 2017102556, '2021-01-16 08:13:44'),
(944, 0, 2019102433, '2021-01-16 08:09:34'),
(945, 0, 2019180967, '2021-01-16 08:10:32'),
(946, 0, 2017580058, '2021-01-16 08:10:28'),
(947, 0, 2017105453, '2021-01-16 08:10:54'),
(948, 0, 2014102346, '2021-01-16 08:10:28'),
(949, 0, 2016106141, '2021-01-16 08:01:25'),
(950, 0, 2017380981, '2021-01-16 10:08:51'),
(951, 0, 2013104449, '2021-01-16 10:05:14'),
(952, 0, 2017102556, '2021-01-16 10:05:26'),
(953, 0, 2019102433, '2021-01-16 10:08:16'),
(954, 0, 2019180967, '2021-01-16 10:05:04'),
(955, 0, 2017580058, '2021-01-16 10:10:56'),
(956, 0, 2017105453, '2021-01-16 10:07:03'),
(957, 0, 2014102346, '2021-01-16 10:13:36'),
(958, 0, 2016106141, '2021-01-16 10:10:06'),
(959, 0, 2017380981, '2021-01-16 12:29:55'),
(960, 0, 2013104449, '2021-01-16 12:22:51'),
(961, 0, 2017102556, '2021-01-16 12:29:54'),
(962, 0, 2019102433, '2021-01-16 12:30:47'),
(963, 0, 2019180967, '2021-01-16 12:29:59'),
(964, 0, 2017580058, '2021-01-16 12:41:22'),
(965, 0, 2017105453, '2021-01-16 12:34:02'),
(966, 0, 2014102346, '2021-01-16 12:24:28'),
(967, 0, 2016106141, '2021-01-16 12:16:40'),
(968, 0, 2017380981, '2021-01-16 16:40:33'),
(969, 0, 2013104449, '2021-01-16 16:32:30'),
(970, 0, 2017102556, '2021-01-16 16:41:06'),
(971, 0, 2019102433, '2021-01-16 16:30:56'),
(972, 0, 2019180967, '2021-01-16 16:43:35'),
(973, 0, 2017580058, '2021-01-16 16:33:56'),
(974, 0, 2017105453, '2021-01-16 16:44:51'),
(975, 0, 2014102346, '2021-01-16 16:36:20'),
(976, 0, 2016106141, '2021-01-16 16:40:49'),
(977, 0, 2017380981, '2021-01-16 16:44:26'),
(978, 0, 2013104449, '2021-01-16 16:38:12'),
(979, 0, 2017102556, '2021-01-16 17:15:53'),
(980, 0, 2019102433, '2021-01-16 17:29:31'),
(981, 0, 2019180967, '2021-01-16 17:39:03'),
(982, 0, 2017580058, '2021-01-16 16:26:04'),
(983, 0, 2017105453, '2021-01-16 16:09:21'),
(984, 0, 2014102346, '2021-01-16 16:27:56'),
(985, 0, 2016106141, '2021-01-16 17:00:28'),
(986, 0, 2015102429, '2021-01-16 00:35:39'),
(987, 0, 2015102429, '2021-01-16 01:03:11');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id_no` int(11) NOT NULL,
  `pass_word` tinytext NOT NULL,
  `acc_status` tinytext NOT NULL,
  `user_role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id_no` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `user_dept` text NOT NULL,
  `user_status` tinytext NOT NULL,
  `user_position` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id_no`, `user_fname`, `user_lname`, `user_dept`, `user_status`, `user_position`) VALUES
(2012123456, 'Andrew', 'Valdez', 'SHS', 'A', 'S'),
(2012123457, 'Ivan', 'Turing', 'CAS', 'D', 'F'),
(2014380025, 'Tommy', 'Beredo', 'CMET', 'D', 'S'),
(2015102424, 'Cedric', 'Flores', 'CCIS', 'A', 'F'),
(2015102425, 'Zeke', 'Soliven', 'CCIS', 'A', 'S'),
(2015102426, 'Broan', 'Tamisin', 'CAS', 'A', 'S'),
(2015102427, 'John', 'Rondilla', 'CCIS', 'A', 'S'),
(2015102428, 'Patrick', 'Paz', 'CAS', 'D', 'S'),
(2015102429, 'Angelo', 'Fidel', 'CAS', 'D', 'S'),
(2015102430, 'Joseph', 'Lazaga', 'MITL', 'A', 'S'),
(2015102431, 'James', 'Monserrate', 'CAS', 'A', 'S'),
(2015102434, 'Ivan', 'Magbanua', 'CCIS', 'A', 'S'),
(2015130013, 'Justine', 'Gonzaga', 'SHS', 'A', 'F'),
(2015380017, 'Joviel', 'Guinto', 'CAS', 'A', 'A'),
(2016180067, 'Mark Anthony', 'Hernandez', 'CCIS', 'A', 'S'),
(2016190009, 'Mark Angelo ', 'Co', 'SHS', 'A', 'S');

-- --------------------------------------------------------

--
-- Structure for view `count in`
--
DROP TABLE IF EXISTS `count in`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count in`  AS SELECT `tapin_logs`.`log_no` AS `log_no`, `tapin_logs`.`rf_id` AS `rf_id`, `tapin_logs`.`id_no` AS `id_no`, `tapin_logs`.`inDate` AS `inDate`, count(`tapin_logs`.`inDate`) AS `COUNT(``inDate``)` FROM `tapin_logs` GROUP BY hour(`tapin_logs`.`inDate`) ;

-- --------------------------------------------------------

--
-- Structure for view `count out`
--
DROP TABLE IF EXISTS `count out`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count out`  AS SELECT `tapout_logs`.`log_no` AS `log_no`, `tapout_logs`.`rf_id` AS `rf_id`, `tapout_logs`.`id_no` AS `id_no`, `tapout_logs`.`outDate` AS `outDate`, count(`tapout_logs`.`outDate`) AS `COUNT(``outDate``)` FROM `tapout_logs` GROUP BY hour(`tapout_logs`.`outDate`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attnmessage`
--
ALTER TABLE `attnmessage`
  ADD PRIMARY KEY (`imsg_no`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `authorized_devices`
--
ALTER TABLE `authorized_devices`
  ADD PRIMARY KEY (`device_physical_address`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`day_no`);

--
-- Indexes for table `course_record`
--
ALTER TABLE `course_record`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `guardianinfo`
--
ALTER TABLE `guardianinfo`
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `handled_course`
--
ALTER TABLE `handled_course`
  ADD PRIMARY KEY (`handled_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `user_name` (`id_no`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `rfaccounts`
--
ALTER TABLE `rfaccounts`
  ADD PRIMARY KEY (`rf_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD KEY `attendance_id` (`attendance_id`),
  ADD KEY `user_name` (`id_no`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`log_no`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `systemusers`
--
ALTER TABLE `systemusers`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `tapin_logs`
--
ALTER TABLE `tapin_logs`
  ADD PRIMARY KEY (`log_no`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `tapout_logs`
--
ALTER TABLE `tapout_logs`
  ADD PRIMARY KEY (`log_no`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attnmessage`
--
ALTER TABLE `attnmessage`
  MODIFY `imsg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `day_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemusers`
--
ALTER TABLE `systemusers`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tapin_logs`
--
ALTER TABLE `tapin_logs`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `tapout_logs`
--
ALTER TABLE `tapout_logs`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=988;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
