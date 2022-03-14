-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `qhospital_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `language` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `f_name` varchar(155) NOT NULL,
  `l_name` varchar(155) NOT NULL,
  `admin_pic` varchar(155) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `del_flag` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_admins`
--

INSERT INTO `qhospital_admins` (`id`, `username`, `password`, `language`, `role`, `f_name`, `l_name`, `admin_pic`, `created_on`, `del_flag`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'admin', 'admin', '', '2021-06-24 02:18:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_pcrtest`
--

CREATE TABLE `qhospital_pcrtest` (
  `id` int(11) NOT NULL,
  `encr_id` text DEFAULT NULL,
  `patient_name` varchar(250) NOT NULL,
  `id_no` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `referral` varchar(250) NOT NULL,
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
  `del_flag` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qhospital_systemid_autoincr`
--

CREATE TABLE `qhospital_systemid_autoincr` (
  `id` int(50) NOT NULL,
  `code` varchar(250) NOT NULL,
  `starting_from` int(50) NOT NULL,
  `edit_flag` int(10) NOT NULL DEFAULT 1,
  `del_flag` int(10) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qhospital_systemid_autoincr`
--

INSERT INTO `qhospital_systemid_autoincr` (`id`, `code`, `starting_from`, `edit_flag`, `del_flag`) VALUES
(1, 'E', 10003, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qhospital_admins`
--
ALTER TABLE `qhospital_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qhospital_pcrtest`
--
ALTER TABLE `qhospital_pcrtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qhospital_systemid_autoincr`
--
ALTER TABLE `qhospital_systemid_autoincr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qhospital_admins`
--
ALTER TABLE `qhospital_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qhospital_pcrtest`
--
ALTER TABLE `qhospital_pcrtest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
