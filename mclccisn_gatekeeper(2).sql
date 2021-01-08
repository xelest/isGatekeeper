-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 07:26 PM
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
(2, 'You are required to report to the faculty', 'CCIS', 2016180067, '2020-03-27 18:34:20', 'A'),
(3, 'Follow up... please drop by and see us. Cheers!', 'Clinic', 2015102434, '2020-03-28 02:48:58', 'A'),
(4, 'Please report to our office. Thank you.', 'Registrar', 2015102429, '2020-03-28 11:35:34', 'A'),
(5, 'Please drop by our office.', 'MITL', 2015102430, '2020-03-28 13:10:49', 'A');

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
(1, 0, 2016180067, '2021-01-07 06:50:03'),
(2, 0, 2015380013, '2021-01-07 07:02:51'),
(3, 0, 2015102429, '2021-01-07 07:03:34'),
(4, 0, 2015102434, '2021-01-07 06:55:59'),
(5, 0, 2015102433, '2021-01-07 07:00:23'),
(6, 0, 2016180067, '2021-01-07 09:31:11'),
(7, 0, 2015380013, '2021-01-07 09:49:42'),
(8, 0, 2015102429, '2021-01-07 09:47:53'),
(9, 0, 2015102434, '2021-01-07 09:31:26'),
(10, 0, 2015102433, '2021-01-07 09:46:49'),
(11, 0, 2016180067, '2021-01-07 11:46:59'),
(12, 0, 2015380013, '2021-01-07 12:09:35'),
(13, 0, 2015102429, '2021-01-07 11:57:04'),
(14, 0, 2015102434, '2021-01-07 11:41:39'),
(15, 0, 2015102433, '2021-01-07 11:49:25'),
(16, 0, 2016180067, '2021-01-07 15:45:31'),
(17, 0, 2015380013, '2021-01-07 15:49:06'),
(18, 0, 2015102429, '2021-01-07 15:20:44'),
(19, 0, 2015102434, '2021-01-07 15:28:29'),
(20, 0, 2015102433, '2021-01-07 15:53:12'),
(21, 0, 2016180067, '2021-01-07 16:39:58'),
(22, 0, 2015380013, '2021-01-07 16:23:01'),
(23, 0, 2015102429, '2021-01-07 16:45:22'),
(24, 0, 2015102434, '2021-01-07 16:19:34'),
(25, 0, 2015102433, '2021-01-07 16:15:40'),
(26, 0, 2016180067, '2021-01-08 07:19:29'),
(27, 0, 2015380013, '2021-01-08 06:52:02'),
(28, 0, 2015102429, '2021-01-08 06:52:22'),
(29, 0, 2015102434, '2021-01-08 06:50:46'),
(30, 0, 2015102433, '2021-01-08 06:55:02'),
(31, 0, 2016180067, '2021-01-08 09:35:41'),
(32, 0, 2015380013, '2021-01-08 09:47:32'),
(33, 0, 2015102429, '2021-01-08 09:57:50'),
(34, 0, 2015102434, '2021-01-08 09:37:29'),
(35, 0, 2015102433, '2021-01-08 09:32:44'),
(36, 0, 2016180067, '2021-01-08 11:43:40'),
(37, 0, 2015380013, '2021-01-08 11:55:23'),
(38, 0, 2015102429, '2021-01-08 12:23:50'),
(39, 0, 2015102434, '2021-01-08 11:59:45'),
(40, 0, 2015102433, '2021-01-08 13:02:26'),
(41, 0, 2016180067, '2021-01-08 15:20:48'),
(42, 0, 2015380013, '2021-01-08 15:35:25'),
(43, 0, 2015102429, '2021-01-08 15:16:06'),
(44, 0, 2015102434, '2021-01-08 16:11:38'),
(45, 0, 2015102433, '2021-01-08 15:48:16'),
(46, 0, 2016180067, '2021-01-08 16:19:18'),
(47, 0, 2015380013, '2021-01-08 16:33:40'),
(48, 0, 2015102429, '2021-01-08 16:50:53'),
(49, 0, 2015102434, '2021-01-08 16:28:01'),
(50, 0, 2015102433, '2021-01-08 16:21:28'),
(51, 0, 2016180067, '2021-01-06 07:00:18'),
(52, 0, 2015380013, '2021-01-06 06:52:31'),
(53, 0, 2015102429, '2021-01-06 07:10:09'),
(54, 0, 2015102434, '2021-01-06 06:50:01'),
(55, 0, 2015102433, '2021-01-06 06:55:01'),
(56, 0, 2016180067, '2021-01-06 09:33:50'),
(57, 0, 2015380013, '2021-01-06 09:43:18'),
(58, 0, 2015102429, '2021-01-06 09:33:18'),
(59, 0, 2015102434, '2021-01-06 09:45:06'),
(60, 0, 2015102433, '2021-01-06 09:59:54'),
(61, 0, 2016180067, '2021-01-06 13:04:03'),
(62, 0, 2015380013, '2021-01-06 12:44:19'),
(63, 0, 2015102429, '2021-01-06 11:41:27'),
(64, 0, 2015102434, '2021-01-06 11:42:22'),
(65, 0, 2015102433, '2021-01-06 11:42:13'),
(66, 0, 2016180067, '2021-01-06 15:20:05'),
(67, 0, 2015380013, '2021-01-06 15:22:10'),
(68, 0, 2015102429, '2021-01-06 16:02:59'),
(69, 0, 2015102434, '2021-01-06 15:17:47'),
(70, 0, 2015102433, '2021-01-06 15:19:58'),
(71, 0, 2016180067, '2021-01-06 16:23:07'),
(72, 0, 2015380013, '2021-01-06 16:18:50'),
(73, 0, 2015102429, '2021-01-06 16:19:55'),
(74, 0, 2015102434, '2021-01-06 16:36:50'),
(75, 0, 2015102433, '2021-01-06 16:26:08'),
(76, 0, 2016180067, '2021-01-05 06:51:00'),
(77, 0, 2015380013, '2021-01-05 07:00:31'),
(78, 0, 2015102429, '2021-01-05 07:07:24'),
(79, 0, 2015102434, '2021-01-05 06:53:23'),
(80, 0, 2015102433, '2021-01-05 06:58:35'),
(81, 0, 2016180067, '2021-01-05 09:30:11'),
(82, 0, 2015380013, '2021-01-05 09:34:55'),
(83, 0, 2015102429, '2021-01-05 10:07:15'),
(84, 0, 2015102434, '2021-01-05 09:30:58'),
(85, 0, 2015102433, '2021-01-05 09:41:22'),
(86, 0, 2016180067, '2021-01-05 13:08:23'),
(87, 0, 2015380013, '2021-01-05 11:58:24'),
(88, 0, 2015102429, '2021-01-05 12:51:41'),
(89, 0, 2015102434, '2021-01-05 12:33:57'),
(90, 0, 2015102433, '2021-01-05 11:43:00'),
(91, 0, 2016180067, '2021-01-05 16:05:54'),
(92, 0, 2015380013, '2021-01-05 15:28:33'),
(93, 0, 2015102429, '2021-01-05 15:29:22'),
(94, 0, 2015102434, '2021-01-05 16:29:41'),
(95, 0, 2015102433, '2021-01-05 15:24:49'),
(96, 0, 2016180067, '2021-01-05 16:46:33'),
(97, 0, 2015380013, '2021-01-05 16:32:40'),
(98, 0, 2015102429, '2021-01-05 16:41:48'),
(99, 0, 2015102434, '2021-01-05 16:58:22'),
(100, 0, 2015102433, '2021-01-05 16:16:54'),
(101, 0, 2016180067, '2021-01-04 06:56:36'),
(102, 0, 2015380013, '2021-01-04 07:02:52'),
(103, 0, 2015102429, '2021-01-04 06:54:00'),
(104, 0, 2015102434, '2021-01-04 06:57:51'),
(105, 0, 2015102433, '2021-01-04 07:13:57'),
(106, 0, 2016180067, '2021-01-04 09:49:23'),
(107, 0, 2015380013, '2021-01-04 09:44:07'),
(108, 0, 2015102429, '2021-01-04 09:44:04'),
(109, 0, 2015102434, '2021-01-04 09:33:07'),
(110, 0, 2015102433, '2021-01-04 09:37:05'),
(111, 0, 2016180067, '2021-01-04 12:38:45'),
(112, 0, 2015380013, '2021-01-04 13:02:34'),
(113, 0, 2015102429, '2021-01-04 12:09:46'),
(114, 0, 2015102434, '2021-01-04 11:46:49'),
(115, 0, 2015102433, '2021-01-04 12:04:30'),
(116, 0, 2016180067, '2021-01-04 15:21:02'),
(117, 0, 2015380013, '2021-01-04 15:36:18'),
(118, 0, 2015102429, '2021-01-04 15:31:03'),
(119, 0, 2015102434, '2021-01-04 15:40:20'),
(120, 0, 2015102433, '2021-01-04 15:28:13'),
(121, 0, 2016180067, '2021-01-04 16:48:56'),
(122, 0, 2015380013, '2021-01-04 16:33:09'),
(123, 0, 2015102429, '2021-01-04 16:51:55'),
(124, 0, 2015102434, '2021-01-04 16:30:05'),
(125, 0, 2015102433, '2021-01-04 16:44:09'),
(126, 0, 2016180067, '2021-01-11 07:10:14'),
(127, 0, 2015380013, '2021-01-11 06:52:46'),
(128, 0, 2015102429, '2021-01-11 07:09:32'),
(129, 0, 2015102434, '2021-01-11 06:59:52'),
(130, 0, 2015102433, '2021-01-11 06:54:37'),
(131, 0, 2016180067, '2021-01-11 09:48:45'),
(132, 0, 2015380013, '2021-01-11 09:41:07'),
(133, 0, 2015102429, '2021-01-11 09:51:55'),
(134, 0, 2015102434, '2021-01-11 09:39:01'),
(135, 0, 2015102433, '2021-01-11 09:44:59'),
(136, 0, 2016180067, '2021-01-11 12:33:31'),
(137, 0, 2015380013, '2021-01-11 11:40:23'),
(138, 0, 2015102429, '2021-01-11 12:05:51'),
(139, 0, 2015102434, '2021-01-11 12:12:00'),
(140, 0, 2015102433, '2021-01-11 11:51:01'),
(141, 0, 2016180067, '2021-01-11 15:15:10'),
(142, 0, 2015380013, '2021-01-11 15:42:03'),
(143, 0, 2015102429, '2021-01-11 15:22:52'),
(144, 0, 2015102434, '2021-01-11 15:15:33'),
(145, 0, 2015102433, '2021-01-11 15:17:08'),
(146, 0, 2016180067, '2021-01-11 16:34:47'),
(147, 0, 2015380013, '2021-01-11 16:15:19'),
(148, 0, 2015102429, '2021-01-11 16:38:36'),
(149, 0, 2015102434, '2021-01-11 16:46:21'),
(150, 0, 2015102433, '2021-01-11 16:17:39');

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
(1, 0, 2016180067, '2021-01-07 06:53:22'),
(2, 0, 2015380013, '2021-01-07 07:06:02'),
(3, 0, 2015102429, '2021-01-07 07:26:16'),
(4, 0, 2015102434, '2021-01-07 06:58:25'),
(5, 0, 2015102433, '2021-01-07 07:11:07'),
(6, 0, 2016180067, '2021-01-07 09:33:00'),
(7, 0, 2015380013, '2021-01-07 09:52:43'),
(8, 0, 2015102429, '2021-01-07 10:06:06'),
(9, 0, 2015102434, '2021-01-07 09:57:59'),
(10, 0, 2015102433, '2021-01-07 09:53:40'),
(11, 0, 2016180067, '2021-01-07 12:13:06'),
(12, 0, 2015380013, '2021-01-07 12:30:08'),
(13, 0, 2015102429, '2021-01-07 12:06:11'),
(14, 0, 2015102434, '2021-01-07 12:18:36'),
(15, 0, 2015102433, '2021-01-07 13:18:56'),
(16, 0, 2016180067, '2021-01-07 16:20:56'),
(17, 0, 2015380013, '2021-01-07 15:50:37'),
(18, 0, 2015102429, '2021-01-07 15:27:54'),
(19, 0, 2015102434, '2021-01-07 15:34:13'),
(20, 0, 2015102433, '2021-01-07 16:29:46'),
(21, 0, 2016180067, '2021-01-07 16:49:57'),
(22, 0, 2015380013, '2021-01-07 17:01:53'),
(23, 0, 2015102429, '2021-01-07 17:23:06'),
(24, 0, 2015102434, '2021-01-07 16:31:38'),
(25, 0, 2015102433, '2021-01-07 16:16:14'),
(26, 0, 2016180067, '2021-01-08 07:22:08'),
(27, 0, 2015380013, '2021-01-08 07:05:57'),
(28, 0, 2015102429, '2021-01-08 07:23:37'),
(29, 0, 2015102434, '2021-01-08 06:54:23'),
(30, 0, 2015102433, '2021-01-08 07:00:46'),
(31, 0, 2016180067, '2021-01-08 10:08:32'),
(32, 0, 2015380013, '2021-01-08 09:54:42'),
(33, 0, 2015102429, '2021-01-08 10:09:49'),
(34, 0, 2015102434, '2021-01-08 09:38:48'),
(35, 0, 2015102433, '2021-01-08 10:08:16'),
(36, 0, 2016180067, '2021-01-08 11:59:34'),
(37, 0, 2015380013, '2021-01-08 11:58:32'),
(38, 0, 2015102429, '2021-01-08 12:30:10'),
(39, 0, 2015102434, '2021-01-08 12:47:08'),
(40, 0, 2015102433, '2021-01-08 13:29:31'),
(41, 0, 2016180067, '2021-01-08 16:07:58'),
(42, 0, 2015380013, '2021-01-08 15:39:26'),
(43, 0, 2015102429, '2021-01-08 15:17:33'),
(44, 0, 2015102434, '2021-01-08 16:13:41'),
(45, 0, 2015102433, '2021-01-08 15:56:19'),
(46, 0, 2016180067, '2021-01-08 16:29:16'),
(47, 0, 2015380013, '2021-01-08 16:41:21'),
(48, 0, 2015102429, '2021-01-08 16:52:02'),
(49, 0, 2015102434, '2021-01-08 16:52:34'),
(50, 0, 2015102433, '2021-01-08 16:35:33'),
(51, 0, 2016180067, '2021-01-06 07:02:18'),
(52, 0, 2015380013, '2021-01-06 07:00:27'),
(53, 0, 2015102429, '2021-01-06 07:22:27'),
(54, 0, 2015102434, '2021-01-06 06:50:01'),
(55, 0, 2015102433, '2021-01-06 07:09:51'),
(56, 0, 2016180067, '2021-01-06 09:37:21'),
(57, 0, 2015380013, '2021-01-06 09:46:48'),
(58, 0, 2015102429, '2021-01-06 09:43:04'),
(59, 0, 2015102434, '2021-01-06 09:59:02'),
(60, 0, 2015102433, '2021-01-06 10:09:27'),
(61, 0, 2016180067, '2021-01-06 13:05:51'),
(62, 0, 2015380013, '2021-01-06 12:59:42'),
(63, 0, 2015102429, '2021-01-06 12:01:01'),
(64, 0, 2015102434, '2021-01-06 11:44:38'),
(65, 0, 2015102433, '2021-01-06 11:50:12'),
(66, 0, 2016180067, '2021-01-06 15:47:08'),
(67, 0, 2015380013, '2021-01-06 15:41:02'),
(68, 0, 2015102429, '2021-01-06 16:12:50'),
(69, 0, 2015102434, '2021-01-06 16:27:18'),
(70, 0, 2015102433, '2021-01-06 15:22:56'),
(71, 0, 2016180067, '2021-01-06 16:31:14'),
(72, 0, 2015380013, '2021-01-06 16:37:14'),
(73, 0, 2015102429, '2021-01-06 16:23:52'),
(74, 0, 2015102434, '2021-01-06 17:25:35'),
(75, 0, 2015102433, '2021-01-06 16:51:51'),
(76, 0, 2016180067, '2021-01-05 07:03:59'),
(77, 0, 2015380013, '2021-01-05 07:05:41'),
(78, 0, 2015102429, '2021-01-05 07:11:40'),
(79, 0, 2015102434, '2021-01-05 07:08:21'),
(80, 0, 2015102433, '2021-01-05 07:10:41'),
(81, 0, 2016180067, '2021-01-05 09:33:47'),
(82, 0, 2015380013, '2021-01-05 09:47:15'),
(83, 0, 2015102429, '2021-01-05 10:12:38'),
(84, 0, 2015102434, '2021-01-05 09:42:14'),
(85, 0, 2015102433, '2021-01-05 09:41:53'),
(86, 0, 2016180067, '2021-01-05 13:27:26'),
(87, 0, 2015380013, '2021-01-05 13:03:56'),
(88, 0, 2015102429, '2021-01-05 12:53:03'),
(89, 0, 2015102434, '2021-01-05 13:09:23'),
(90, 0, 2015102433, '2021-01-05 13:07:06'),
(91, 0, 2016180067, '2021-01-05 16:18:35'),
(92, 0, 2015380013, '2021-01-05 16:06:46'),
(93, 0, 2015102429, '2021-01-05 15:38:31'),
(94, 0, 2015102434, '2021-01-05 16:29:53'),
(95, 0, 2015102433, '2021-01-05 16:23:01'),
(96, 0, 2016180067, '2021-01-05 17:15:22'),
(97, 0, 2015380013, '2021-01-05 16:53:50'),
(98, 0, 2015102429, '2021-01-05 17:01:46'),
(99, 0, 2015102434, '2021-01-05 17:20:23'),
(100, 0, 2015102433, '2021-01-05 16:17:52'),
(101, 0, 2016180067, '2021-01-04 07:24:22'),
(102, 0, 2015380013, '2021-01-04 07:18:45'),
(103, 0, 2015102429, '2021-01-04 07:04:14'),
(104, 0, 2015102434, '2021-01-04 07:19:05'),
(105, 0, 2015102433, '2021-01-04 07:16:01'),
(106, 0, 2016180067, '2021-01-04 10:10:30'),
(107, 0, 2015380013, '2021-01-04 09:55:05'),
(108, 0, 2015102429, '2021-01-04 10:06:06'),
(109, 0, 2015102434, '2021-01-04 09:54:21'),
(110, 0, 2015102433, '2021-01-04 10:12:12'),
(111, 0, 2016180067, '2021-01-04 13:16:23'),
(112, 0, 2015380013, '2021-01-04 13:06:40'),
(113, 0, 2015102429, '2021-01-04 12:24:01'),
(114, 0, 2015102434, '2021-01-04 12:03:34'),
(115, 0, 2015102433, '2021-01-04 12:25:10'),
(116, 0, 2016180067, '2021-01-04 15:57:52'),
(117, 0, 2015380013, '2021-01-04 15:39:55'),
(118, 0, 2015102429, '2021-01-04 16:27:43'),
(119, 0, 2015102434, '2021-01-04 15:41:46'),
(120, 0, 2015102433, '2021-01-04 16:15:29'),
(121, 0, 2016180067, '2021-01-04 17:11:00'),
(122, 0, 2015380013, '2021-01-04 16:49:42'),
(123, 0, 2015102429, '2021-01-04 16:55:19'),
(124, 0, 2015102434, '2021-01-04 17:29:03'),
(125, 0, 2015102433, '2021-01-04 17:01:06'),
(126, 0, 2016180067, '2021-01-11 07:15:23'),
(127, 0, 2015380013, '2021-01-11 06:58:36'),
(128, 0, 2015102429, '2021-01-11 07:16:12'),
(129, 0, 2015102434, '2021-01-11 07:10:45'),
(130, 0, 2015102433, '2021-01-11 07:18:15'),
(131, 0, 2016180067, '2021-01-11 10:03:45'),
(132, 0, 2015380013, '2021-01-11 09:42:54'),
(133, 0, 2015102429, '2021-01-11 10:00:58'),
(134, 0, 2015102434, '2021-01-11 10:00:19'),
(135, 0, 2015102433, '2021-01-11 10:05:56'),
(136, 0, 2016180067, '2021-01-11 12:37:47'),
(137, 0, 2015380013, '2021-01-11 11:41:02'),
(138, 0, 2015102429, '2021-01-11 12:07:16'),
(139, 0, 2015102434, '2021-01-11 12:50:41'),
(140, 0, 2015102433, '2021-01-11 11:51:59'),
(141, 0, 2016180067, '2021-01-11 15:17:31'),
(142, 0, 2015380013, '2021-01-11 15:53:11'),
(143, 0, 2015102429, '2021-01-11 15:42:35'),
(144, 0, 2015102434, '2021-01-11 15:31:11'),
(145, 0, 2015102433, '2021-01-11 15:56:24'),
(146, 0, 2016180067, '2021-01-11 16:37:24'),
(147, 0, 2015380013, '2021-01-11 16:56:12'),
(148, 0, 2015102429, '2021-01-11 16:59:22'),
(149, 0, 2015102434, '2021-01-11 17:03:34'),
(150, 0, 2015102433, '2021-01-11 17:38:55');

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
('2015102433', '1', 'Nuval', 'Cyrhene', 'TeacheSHS', 'Active'),
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
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tapout_logs`
--
ALTER TABLE `tapout_logs`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
