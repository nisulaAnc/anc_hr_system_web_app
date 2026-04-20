-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2026 at 03:09 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ancmoodl_ccm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `eid` int(5) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `active_status` varchar(15) DEFAULT NULL,
  `user_level` varchar(10) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `dir_type` varchar(5) DEFAULT NULL,
  `branch` varchar(75) DEFAULT NULL,
  `department` varchar(75) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `program_type` varchar(50) DEFAULT NULL,
  `category` varchar(25) NOT NULL,
  `sa` varchar(10) NOT NULL,
  `mini_crm` varchar(15) DEFAULT NULL,
  `user_code` varchar(15) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_on` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `updated_on` varchar(30) DEFAULT NULL,
  `access_level` varchar(25) DEFAULT NULL,
  `is_counsellor` tinyint(1) NOT NULL DEFAULT '0',
  `record_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_role` varchar(20) NOT NULL DEFAULT 'normal',
  `multi_branch` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `eid`, `firstname`, `lastname`, `username`, `password`, `active_status`, `user_level`, `email`, `dir_type`, `branch`, `department`, `division`, `program_type`, `category`, `sa`, `mini_crm`, `user_code`, `created_by`, `created_on`, `updated_by`, `updated_on`, `access_level`, `is_counsellor`, `record_status`, `user_role`, `multi_branch`) VALUES
(1, 98, 'Manura', 'Fernando', 'Man', '6261aba9f207c9519c56789c2c74dcc3', 'Inactive', 'admin', 'manura@ancedu.com', 'COO', 'Head Office', 'IT', 'IT', 'UG', '', 'all', 'other', 'btad$2021', '', '', 'Manura', '2021-02-01 08:59:19', '', 0, 1, 'normal', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
