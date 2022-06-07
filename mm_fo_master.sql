-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 03:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benfed_fertilizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_fo_master`
--

CREATE TABLE `mm_fo_master` (
  `fi_id` int(11) NOT NULL,
  `fo_number` varchar(11) NOT NULL,
  `fo_name` varchar(100) NOT NULL,
  `fo_virtual_no` varchar(10) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `ctrate_dt` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_fo_master`
--
ALTER TABLE `mm_fo_master`
  ADD PRIMARY KEY (`fi_id`,`fo_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_fo_master`
--
ALTER TABLE `mm_fo_master`
  MODIFY `fi_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
