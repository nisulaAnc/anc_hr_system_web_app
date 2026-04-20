-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2026 at 03:01 AM
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
-- Table structure for table `v_hr_staff`
--

CREATE TABLE `v_hr_staff` (
  `eid` int(5) NOT NULL,
  `job_status` varchar(15) DEFAULT NULL,
  `department` varchar(75) DEFAULT NULL,
  `epf` varchar(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `product` varchar(25) DEFAULT NULL,
  `product_type` varchar(25) DEFAULT NULL,
  `branch` varchar(35) DEFAULT NULL,
  `salutation` varchar(25) DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `calling_name` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nic_pp` varchar(25) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `race` varchar(25) DEFAULT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `current_designation` varchar(75) DEFAULT NULL,
  `joined_designation` varchar(75) DEFAULT NULL,
  `category` varchar(75) DEFAULT NULL,
  `internal_designation` varchar(75) DEFAULT NULL,
  `category_type` varchar(75) DEFAULT NULL,
  `sal_grid_designation` varchar(75) DEFAULT NULL,
  `sal_grid_grade` varchar(75) DEFAULT NULL,
  `emp_type` varchar(50) DEFAULT NULL,
  `emp_subtype` varchar(50) DEFAULT NULL,
  `emp_typeduration` varchar(25) DEFAULT NULL,
  `retirement` varchar(25) DEFAULT NULL,
  `confirmation` date DEFAULT NULL,
  `confirm_renewal` date DEFAULT NULL,
  `new_replace` varchar(25) DEFAULT NULL,
  `promotion` varchar(25) DEFAULT NULL,
  `date_promotion` date DEFAULT NULL,
  `resignation` varchar(25) DEFAULT NULL,
  `jd` date DEFAULT NULL,
  `bcard` varchar(5) DEFAULT NULL,
  `address` varchar(125) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `personal_mobile` varchar(10) DEFAULT NULL,
  `home_phone` varchar(10) DEFAULT NULL,
  `personal_email` varchar(100) DEFAULT NULL,
  `office_sim` varchar(25) DEFAULT NULL,
  `office_sim_limit` varchar(25) DEFAULT NULL,
  `office_sim_package` varchar(25) DEFAULT NULL,
  `phone` varchar(5) DEFAULT NULL,
  `cdma` varchar(5) DEFAULT NULL,
  `laptop` varchar(5) DEFAULT NULL,
  `camera` varchar(5) DEFAULT NULL,
  `id_card` varchar(5) DEFAULT NULL,
  `dongle` varchar(5) DEFAULT NULL,
  `nc_clause` varchar(5) DEFAULT NULL,
  `insurance` varchar(35) DEFAULT NULL,
  `sscard` varchar(5) DEFAULT NULL,
  `other` varchar(25) DEFAULT NULL,
  `ext` varchar(25) DEFAULT NULL,
  `annual` decimal(4,2) DEFAULT NULL,
  `casual` decimal(4,2) DEFAULT NULL,
  `sick` decimal(4,2) DEFAULT NULL,
  `basic_after_increment` decimal(10,2) DEFAULT NULL,
  `allowances` decimal(10,2) DEFAULT NULL,
  `prof_fees` decimal(10,2) DEFAULT NULL,
  `academic_qualification` varchar(200) DEFAULT NULL,
  `prof_qualification` varchar(200) DEFAULT NULL,
  `last_promo_year` varchar(15) DEFAULT NULL,
  `2018_april_evaluation` varchar(45) DEFAULT NULL,
  `2018_april_kpi` varchar(45) DEFAULT NULL,
  `2018_april_competency` varchar(15) DEFAULT NULL,
  `2019_overall_kpi` varchar(30) DEFAULT NULL,
  `2019_overall_criteria` varchar(30) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `seating_location` varchar(50) DEFAULT NULL,
  `reporting_to_name` varchar(50) DEFAULT NULL,
  `reporting_epf` int(5) DEFAULT NULL,
  `dir_type` varchar(35) DEFAULT NULL,
  `hod` varchar(35) DEFAULT NULL,
  `hod_status` varchar(15) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_on` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `updated_on` varchar(30) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_hr_staff`
--

INSERT INTO `v_hr_staff` (`eid`, `job_status`, `department`, `epf`, `email`, `product`, `product_type`, `branch`, `salutation`, `full_name`, `calling_name`, `dob`, `nic_pp`, `gender`, `marital_status`, `race`, `religion`, `doj`, `current_designation`, `joined_designation`, `category`, `internal_designation`, `category_type`, `sal_grid_designation`, `sal_grid_grade`, `emp_type`, `emp_subtype`, `emp_typeduration`, `retirement`, `confirmation`, `confirm_renewal`, `new_replace`, `promotion`, `date_promotion`, `resignation`, `jd`, `bcard`, `address`, `mobile`, `personal_mobile`, `home_phone`, `personal_email`, `office_sim`, `office_sim_limit`, `office_sim_package`, `phone`, `cdma`, `laptop`, `camera`, `id_card`, `dongle`, `nc_clause`, `insurance`, `sscard`, `other`, `ext`, `annual`, `casual`, `sick`, `basic_after_increment`, `allowances`, `prof_fees`, `academic_qualification`, `prof_qualification`, `last_promo_year`, `2018_april_evaluation`, `2018_april_kpi`, `2018_april_competency`, `2019_overall_kpi`, `2019_overall_criteria`, `comments`, `location`, `seating_location`, `reporting_to_name`, `reporting_epf`, `dir_type`, `hod`, `hod_status`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_update`) VALUES
(1, 'Inactive', 'Finance Office', '10', NULL, 'C', 'ANC Placement', 'Head Office', 'Mr', 'B T K Nissanka', 'Nissanka', '1972-06-10', '721620522V', 'Male', 'Married', NULL, NULL, '2002-01-11', 'Chief Accountant', '', 'Manager & Above', 'Senior Mgr', 'Non-Sales', ' Senior Manager ', ' Grade - I ', 'Permanent', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14.00, 7.00, 7.00, 0.00, 0.00, 0.00, '', '', '', '', '', '', NULL, NULL, '', '', '', '', 0, '', '', NULL, '', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `v_hr_staff`
--
ALTER TABLE `v_hr_staff`
  ADD PRIMARY KEY (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_hr_staff`
--
ALTER TABLE `v_hr_staff`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `v_hr_staff` 
ADD COLUMN `join_status` VARCHAR(10) DEFAULT 'No' AFTER `doj`;