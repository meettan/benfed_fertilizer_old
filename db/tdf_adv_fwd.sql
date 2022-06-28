-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2022 at 03:18 PM
-- Server version: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tdf_adv_fwd`
--

CREATE TABLE `tdf_adv_fwd` (
  `id` int(10) NOT NULL,
  `trans_dt` date DEFAULT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `detail_receipt_no` varchar(100) NOT NULL,
  `fwd_receipt_no` varchar(100) NOT NULL,
  `branch_id` int(5) NOT NULL,
  `fin_yr` int(4) NOT NULL,
  `fwd_flag` enum('Y','N') DEFAULT 'N',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdf_adv_fwd`
--

INSERT INTO `tdf_adv_fwd` (`id`, `trans_dt`, `receipt_no`, `detail_receipt_no`, `fwd_receipt_no`, `branch_id`, `fin_yr`, `fwd_flag`, `fwd_by`, `fwd_dt`) VALUES
(1, '2022-06-28', 'Adv/BNK/2022-23/101', 'Adv/IFFCO/BNK/42', 'FWD/BNK/2022-23/1', 339, 3, 'N', 'synergic', '2022-06-28 02:34:00'),
(1, '2022-06-28', 'Adv/BNK/2022-23/5', 'Adv/IFFCO/BNK/43', 'FWD/BNK/2022-23/1', 339, 3, 'N', 'synergic', '2022-06-28 02:34:00'),
(1, '2022-06-28', 'Adv/BNK/2022-23/72', 'Adv/IFFCO/BNK/44', 'FWD/BNK/2022-23/1', 339, 3, 'N', 'synergic', '2022-06-28 02:34:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_adv_fwd`
--
ALTER TABLE `tdf_adv_fwd`
  ADD PRIMARY KEY (`id`,`detail_receipt_no`,`fin_yr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
