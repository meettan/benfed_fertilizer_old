-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 08:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `tdf_company_payment`
--

CREATE TABLE `tdf_company_payment` (
  `sl_no` int(11) NOT NULL,
  `pay_no` varchar(50) DEFAULT NULL,
  `pay_dt` datetime DEFAULT NULL,
  `district` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `sale_inv_no` varchar(50) NOT NULL,
  `paid_id` varchar(50) DEFAULT NULL,
  `pur_ro` varchar(20) NOT NULL,
  `pur_inv_no` varchar(20) NOT NULL,
  `purchase_rt` decimal(20,2) NOT NULL,
  `bnk_id` int(10) DEFAULT NULL,
  `dr_acCode` varchar(10) DEFAULT NULL,
  `pay_mode` int(5) DEFAULT NULL,
  `paid_amt` decimal(20,2) DEFAULT NULL,
  `rate_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `taxable_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tds_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `net_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `ref_no` varchar(20) DEFAULT NULL,
  `ref_dt` date DEFAULT NULL,
  `bnk_ac_no` varchar(20) DEFAULT NULL,
  `bnk_ac_cd` varchar(20) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `virtual_ac` varchar(20) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `fin_yr` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_company_payment`
--

INSERT INTO `tdf_company_payment` (`sl_no`, `pay_no`, `pay_dt`, `district`, `comp_id`, `prod_id`, `qty`, `sale_inv_no`, `paid_id`, `pur_ro`, `pur_inv_no`, `purchase_rt`, `bnk_id`, `dr_acCode`, `pay_mode`, `paid_amt`, `rate_amt`, `taxable_amt`, `tds_amt`, `net_amt`, `ref_no`, `ref_dt`, `bnk_ac_no`, `bnk_ac_cd`, `ifsc`, `virtual_ac`, `remarks`, `fin_yr`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, NULL, NULL, 339, 1, 9, '11.00', 'INV/BNK/IFFCO/06/22-23/583_4', 'RCPT/BNK/IFFCO/06/2022-23/16', 'EWMD10007147', 'EWMD10005995', '25234.29', NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '', '0000-00-00 00:00:00', NULL, NULL),
(2, NULL, NULL, 339, 1, 9, '11.00', 'INV/BNK/IFFCO/06/22-23/583_3', 'RCPT/BNK/IFFCO/07/2022-23/18', 'EWMD10007147', 'EWMD10005995', '25234.29', NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '', '0000-00-00 00:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  ADD UNIQUE KEY `sl_no` (`sl_no`,`pay_no`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
