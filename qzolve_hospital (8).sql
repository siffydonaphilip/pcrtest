-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2022 at 07:41 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qzolve_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_admins`
--

DROP TABLE IF EXISTS `qhospital_admins`;
CREATE TABLE IF NOT EXISTS `qhospital_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `language` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `f_name` varchar(155) NOT NULL,
  `l_name` varchar(155) NOT NULL,
  `admin_pic` varchar(155) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `del_flag` tinyint(4) NOT NULL DEFAULT 1,
  `dash` int(10) NOT NULL DEFAULT 1,
  `pcr_test` int(10) NOT NULL DEFAULT 1,
  `ipc` int(10) NOT NULL DEFAULT 1,
  `lab` int(10) NOT NULL DEFAULT 1,
  `test_result` int(10) NOT NULL DEFAULT 1,
  `user` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_admins`
--

INSERT INTO `qhospital_admins` (`id`, `username`, `password`, `language`, `role`, `f_name`, `l_name`, `admin_pic`, `created_on`, `del_flag`, `dash`, `pcr_test`, `ipc`, `lab`, `test_result`, `user`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'admin', 'admin', '', '2021-06-23 13:48:08', 1, 1, 1, 1, 1, 1, 1),
(2, 'nahas@qzolve.com', '2db39ee4c6d900cc62dba464e2a5eeea', 1, 1, 'nahas', 'nahas', '', '2021-06-30 06:06:01', 0, 1, 1, 1, 0, 1, 1),
(3, 'nahas', '2db39ee4c6d900cc62dba464e2a5eeea', 1, 1, 'nahas', 'Lab', '', '2021-06-30 08:40:41', 0, 1, 1, 0, 1, 0, 0),
(4, 'mohammad.harrass', '69ed5d6899c4c6282350ecaf261146c6', 1, 1, 'Dr. Mohammad Al Harrass', 'Lab Director', '', '2021-06-30 15:52:40', 1, 1, 1, 1, 1, 1, 0),
(5, 'lab.tech', '6fcae4ce6a9d63605d3b736ffb131adf', 1, 1, 'Lab Technician ', '', '', '2021-06-30 15:53:43', 1, 0, 1, 1, 1, 1, 0),
(6, 'admin@qzolve.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'admin', 'admin', '', '2021-06-23 13:48:08', 1, 1, 1, 1, 1, 1, 1),
(7, 'siffy@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'siffy', '1', '', '2021-07-03 08:14:04', 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_nationality`
--

DROP TABLE IF EXISTS `qhospital_nationality`;
CREATE TABLE IF NOT EXISTS `qhospital_nationality` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nt_name` varchar(200) NOT NULL,
  `edit_flag` int(10) NOT NULL DEFAULT 1,
  `del_flag` int(10) NOT NULL DEFAULT 1,
  `ar_eng_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_nationality`
--

INSERT INTO `qhospital_nationality` (`id`, `nt_name`, `edit_flag`, `del_flag`, `ar_eng_flag`) VALUES
(-1, 'OTHERS', 1, 1, 0),
(1, 'INDIAN', 1, 1, 0),
(2, 'ARABIAN', 1, 1, 0),
(3, 'AMERICAN', 1, 1, 0),
(4, 'RUSSIAN', 1, 1, 0),
(5, 'SRI LANKAN', 1, 1, 0),
(6, 'PAKISTANI', 1, 1, 0),
(7, 'BANGLADESHI', 1, 1, 0),
(8, 'SUDAN', 1, 1, 1),
(9, 'EGYPTIAN', 1, 1, 1),
(10, 'TAIWANESE', 1, 1, 0),
(11, 'CHINESE', 1, 1, 0),
(12, 'FILIPINO', 1, 1, 0),
(13, 'MALAYSIAN', 1, 1, 0),
(14, 'AFGHAN', 1, 1, 0),
(15, 'IRAQI', 1, 1, 1),
(16, 'KUWAIT', 1, 1, 1),
(17, 'BEHRAIN', 1, 1, 1),
(18, 'UNITED ARAB EMIRATES', 1, 1, 1),
(19, 'OMAN', 1, 1, 1),
(20, 'YEMEN', 1, 1, 1),
(21, 'PALESTINE', 1, 1, 0),
(22, 'LIBYAN', 1, 1, 0),
(23, 'SOMALIA', 1, 1, 0),
(24, 'NIGERIA', 1, 1, 0),
(25, 'SAUDI', 1, 1, 1),
(26, 'BRAZIL', 1, 1, 0),
(27, 'ARGENTENA', 1, 1, 0),
(28, 'NEWZEALAND', 1, 1, 0),
(29, 'AUSTRALIA', 1, 1, 0),
(30, 'AUSTERIA', 1, 1, 0),
(31, 'SWISS', 1, 1, 0),
(32, 'PORTUGAL', 1, 1, 0),
(33, 'NETHERLAND', 1, 1, 0),
(34, 'ITALY', 1, 1, 0),
(35, 'GREEC', 1, 1, 0),
(36, 'IRISH', 1, 1, 0),
(37, 'SPANISH', 1, 1, 0),
(38, 'ARMENEA', 1, 1, 0),
(39, 'FRENCH', 1, 1, 0),
(40, 'ENGLAND', 1, 1, 0),
(41, 'IRAN', 1, 1, 0),
(42, 'LEBANEN', 1, 1, 0),
(43, 'JORDANIAN', 1, 1, 1),
(44, 'SYRIAN', 1, 1, 1),
(45, 'JAPANISH', 1, 1, 0),
(46, 'GERMANY', 1, 1, 0),
(47, 'FINLAND', 1, 1, 0),
(48, 'DENMARK', 1, 1, 0),
(49, 'SWEDAN', 1, 1, 0),
(50, 'MOROCCAN', 1, 1, 0),
(51, 'MALAYSIA', 1, 1, 0),
(52, 'ALGERIA', 1, 1, 0),
(53, 'HANGERIA', 1, 1, 0),
(54, 'TURKI', 1, 1, 0),
(55, 'INDONESIA', 1, 1, 0),
(56, 'QATARI', 1, 1, 1),
(57, 'INDIONISA', 1, 1, 0),
(58, 'CANADA', 1, 1, 0),
(59, 'ERITREAN', 1, 1, 0),
(60, 'KENYA', 1, 1, 0),
(61, 'AFRICAN', 1, 1, 0),
(62, 'GUINEENNE', 1, 1, 0),
(65, 'CHAD', 1, 1, 0),
(66, 'ETHIOPIA', 1, 1, 0),
(67, 'ROMANIA', 1, 1, 0),
(68, 'TANZANIA', 1, 1, 0),
(69, 'ALBANIAN', 1, 1, 0),
(70, 'ALNIGER', 1, 1, 0),
(71, 'ANDORRAN', 1, 1, 0),
(72, 'ANGOLAN', 1, 1, 0),
(73, 'ALASKAN', 1, 1, 0),
(74, 'BAHAMIAN', 1, 1, 0),
(75, 'BARBADOS', 1, 1, 0),
(76, 'BENIN', 1, 1, 0),
(77, 'BULGARIAN', 1, 1, 0),
(78, 'BELGIUN', 1, 1, 0),
(79, 'BILAROUZIA', 1, 1, 0),
(80, 'BOLIVIAN', 1, 1, 0),
(81, 'BURMESE', 1, 1, 0),
(82, 'BERMUDA', 1, 1, 0),
(83, 'BOSNIA', 1, 1, 0),
(84, 'BURKINAFASO', 1, 1, 0),
(85, 'BRUNEI', 1, 1, 0),
(86, 'BURANDIAN', 1, 1, 0),
(87, 'BOTSWANIAN', 1, 1, 0),
(88, 'CUBAN', 1, 1, 0),
(89, 'CARRIBEAN', 1, 1, 0),
(90, 'CHECHNIYA', 1, 1, 0),
(91, 'CHILEAN', 1, 1, 0),
(92, 'COLUMBIAN', 1, 1, 0),
(93, 'CAMERROONIAN', 1, 1, 0),
(94, 'COMORIAN', 1, 1, 0),
(95, 'CONGOLESE', 1, 1, 0),
(96, 'COSTA RICAN', 1, 1, 0),
(97, 'CYPRIOT', 1, 1, 0),
(98, 'CZECHOSLOVAKIAN', 1, 1, 0),
(99, 'DAGHISTANI', 1, 1, 0),
(100, 'DJIBOUTIAN', 1, 1, 0),
(101, 'DANISH', 1, 1, 0),
(102, 'DOMINICAN', 1, 1, 0),
(103, 'EQUADORIAN', 1, 1, 0),
(104, 'FIJIAN', 1, 1, 0),
(105, 'GABONESE', 1, 1, 0),
(106, 'GHANAIAN', 1, 1, 0),
(107, 'GAMBIAN', 1, 1, 0),
(108, 'GUATEMALAN', 1, 1, 0),
(109, 'HAITIAN', 1, 1, 0),
(110, 'HONG KONG', 1, 1, 0),
(111, 'DUTCH', 1, 1, 0),
(112, 'ICELANDIC', 1, 1, 0),
(113, 'IVORY COAST', 1, 1, 0),
(114, 'JAMAICAN', 1, 1, 0),
(115, 'NORTH KOREAN', 1, 1, 0),
(116, 'SOUTH KOREAN', 1, 1, 0),
(117, 'LAOTIAN', 1, 1, 0),
(118, 'LIBERIAN', 1, 1, 0),
(119, 'MAURACIUS', 1, 1, 0),
(120, 'MAURITIAN', 1, 1, 0),
(121, 'MADAGASCAN', 1, 1, 0),
(122, 'MONGOLIAN', 1, 1, 0),
(123, 'MALDIVIAN', 1, 1, 0),
(124, 'MALI', 1, 1, 0),
(125, 'MALTAN', 1, 1, 0),
(126, 'MALAWIAN', 1, 1, 0),
(127, 'MONACCAN', 1, 1, 0),
(128, 'MAURITANIAN', 1, 1, 0),
(129, 'MEXICAN', 1, 1, 0),
(130, 'MOZAMBIQUAN', 1, 1, 0),
(131, 'NECARAGUAN', 1, 1, 0),
(132, 'NEPALESE', 1, 1, 0),
(133, 'NORWEGIAN', 1, 1, 0),
(134, 'PANAMIAN', 1, 1, 0),
(135, 'POLISH', 1, 1, 0),
(136, 'PORKINAFASO', 1, 1, 0),
(137, 'PERUVIAN', 1, 1, 0),
(138, 'SOUTH AFRICAN', 1, 1, 0),
(139, 'SAMOA', 1, 1, 0),
(140, 'SCOTTISH', 1, 1, 0),
(141, 'SENEGAL', 1, 1, 0),
(142, 'SINGAPOREAN', 1, 1, 0),
(143, 'SEYCHELLES', 1, 1, 0),
(144, 'TOBAGONIAN', 1, 1, 0),
(145, 'TOGOLESE', 1, 1, 0),
(146, 'THAI', 1, 1, 0),
(147, 'TUNISIAN', 1, 1, 0),
(148, 'UGANDAN', 1, 1, 0),
(149, 'UKRAIN', 1, 1, 0),
(150, 'URUGUAYAN', 1, 1, 0),
(151, 'UZBEKISTAN', 1, 1, 0),
(152, 'VENENZUELAN', 1, 1, 0),
(153, 'VIETNAMESE', 1, 1, 0),
(154, 'WEST INDIAN', 1, 1, 0),
(155, 'YUGOSLAVIAN', 1, 1, 0),
(156, 'ZAMBIAN', 1, 1, 0),
(157, 'ZIMBABWEAN', 1, 1, 0),
(158, 'ZAIRE', 1, 1, 0),
(159, 'OTHER', 1, 1, 0),
(160, 'BRITISH', 1, 1, 0),
(161, 'PALESTINIAN', 1, 1, 0),
(162, 'KOREAN', 1, 1, 0),
(163, 'AZERBAIJAN', 1, 1, 0),
(164, 'TURKISTANI', 1, 1, 0),
(165, 'TURKMENISTAN', 1, 1, 0),
(166, 'SIERRA LEONE', 1, 1, 0),
(167, 'KOSOVO', 1, 1, 0),
(168, 'KAZAKHSTAN', 1, 1, 0),
(169, 'CZECH', 1, 1, 0),
(170, 'ESTONIA', 1, 1, 0),
(171, 'IRELAND', 1, 1, 0),
(172, 'Grenada', 1, 1, 0),
(173, 'TAJIKISTAN', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_pcrtest`
--

DROP TABLE IF EXISTS `qhospital_pcrtest`;
CREATE TABLE IF NOT EXISTS `qhospital_pcrtest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encr_id` text DEFAULT NULL,
  `patient_name` varchar(250) NOT NULL,
  `id_no` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `passport_number` varchar(250) NOT NULL,
  `nationality_id` int(11) NOT NULL DEFAULT 0,
  `lang_flag` int(11) NOT NULL DEFAULT 0,
  `hesn_id` varchar(250) NOT NULL,
  `sample_id` varchar(250) NOT NULL,
  `remarks` text NOT NULL,
  `system_id` varchar(250) NOT NULL,
  `user_id` int(50) NOT NULL COMMENT 'PCR Submit done by this user id',
  `ipcupdate_userid` int(50) NOT NULL COMMENT 'IPC Update done by this user id',
  `labackwldg_userid` int(50) NOT NULL COMMENT 'Lab Acknowledgement done by this userid',
  `resultentry_userid` int(50) NOT NULL COMMENT 'PCR Result Entry Update done by this user id',
  `ip` varchar(250) NOT NULL COMMENT 'PCR Submit done by this Ip_address',
  `ipcupdate_ip` varchar(250) NOT NULL COMMENT 'IPC Update  done by this Ip_address',
  `labackwldg_ip` varchar(250) NOT NULL COMMENT 'Lab Acknowledgement done by this ip_address',
  `resultentry_ip` varchar(250) NOT NULL COMMENT 'PCR Result Entry Update done by this ip_address',
  `collection_time` timestamp NULL DEFAULT NULL COMMENT 'timestamp when PCR is submitted',
  `ipcupdate_time` timestamp NULL DEFAULT NULL COMMENT 'timestamp when IPC Update is submitted',
  `labackwldg_time` timestamp NULL DEFAULT NULL COMMENT 'timestaamp when Lab Acknowledgement = Yes',
  `reporting_time` timestamp NULL DEFAULT NULL COMMENT 'timestamp when PCR Result Entry Update is submitted',
  `ipc_flag` int(11) NOT NULL DEFAULT 0 COMMENT '0=ipc update is pending,1=ipc update completed',
  `acknowledge_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `resultentry_flag` int(11) NOT NULL DEFAULT 0 COMMENT '1=PCR Result Entry Updated',
  `result_status` int(11) NOT NULL COMMENT '1=Positive, 2=Negative, 3=Sample Rejected',
  `content` text DEFAULT NULL COMMENT 'QR Content',
  `file` text DEFAULT NULL COMMENT 'QR File Path',
  `del_flag` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_pcrtest`
--

INSERT INTO `qhospital_pcrtest` (`id`, `encr_id`, `patient_name`, `id_no`, `dob`, `gender`, `phone_no`, `passport_number`, `nationality_id`, `lang_flag`, `hesn_id`, `sample_id`, `remarks`, `system_id`, `user_id`, `ipcupdate_userid`, `labackwldg_userid`, `resultentry_userid`, `ip`, `ipcupdate_ip`, `labackwldg_ip`, `resultentry_ip`, `collection_time`, `ipcupdate_time`, `labackwldg_time`, `reporting_time`, `ipc_flag`, `acknowledge_status`, `resultentry_flag`, `result_status`, `content`, `file`, `del_flag`) VALUES
(1, '10002', 'Xavior Jacob', '99383883298', '1994-09-12', 'Male', '83783738738', '', 1, 0, '9989', '9898', '', '10002', 1, 1, 1, 1, '::1', '::1', '::1', '::1', '2022-03-14 19:28:00', '2022-03-14 17:01:56', '2022-03-14 17:02:08', '2022-03-14 17:03:26', 1, 1, 1, 3, 'http://localhost/qzolve_pcrtest/assets/uploads/10002.pdf', 'http://localhost/qzolve_pcrtest/assets/media/qrcode/10002.png', 1),
(2, '10003', 'Mini Kurian', '982828292', '1989-01-23', 'Female', '928928982939', '', 1, 0, '2822', '377387', '', '10003', 1, 1, 1, 1, '::1', '::1', '::1', '::1', '2022-03-14 19:29:00', '2022-03-14 17:01:45', '2022-03-14 17:02:11', '2022-03-14 17:02:57', 1, 1, 1, 2, 'http://localhost/qzolve_pcrtest/assets/uploads/10003.pdf', 'http://localhost/qzolve_pcrtest/assets/media/qrcode/10003.png', 1),
(3, '10004', 'Karthik Raj', '9893339', '1995-04-04', 'Male', '8773774782', '', 1, 0, '2928329', '2298', '', '10004', 1, 1, 1, 1, '::1', '::1', '::1', '::1', '2022-03-14 19:30:00', '2022-03-14 17:01:34', '2022-03-14 17:02:04', '2022-03-14 17:02:26', 1, 1, 1, 1, 'http://localhost/qzolve_pcrtest/assets/uploads/10004.pdf', 'http://localhost/qzolve_pcrtest/assets/media/qrcode/10004.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_systemid_autoincr`
--

DROP TABLE IF EXISTS `qhospital_systemid_autoincr`;
CREATE TABLE IF NOT EXISTS `qhospital_systemid_autoincr` (
  `id` int(50) NOT NULL,
  `code` varchar(250) NOT NULL,
  `starting_from` int(50) NOT NULL,
  `edit_flag` int(10) NOT NULL DEFAULT 1,
  `del_flag` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_systemid_autoincr`
--

INSERT INTO `qhospital_systemid_autoincr` (`id`, `code`, `starting_from`, `edit_flag`, `del_flag`) VALUES
(1, 'E', 10004, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
