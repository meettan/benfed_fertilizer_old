-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2020 at 10:03 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sssproje_benfed`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_category`
--

CREATE TABLE `mm_category` (
  `sl_no` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `cate_desc` varchar(255) NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(55) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm_category`
--

INSERT INTO `mm_category` (`sl_no`, `comp_id`, `cate_desc`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 1, 'Buffered Society(Cash)', 'synergic', '2020-07-31 11:03:25', '', '0000-00-00 00:00:00'),
(2, 1, 'Buffered Society(Credit)', 'synergic', '2020-07-31 11:03:37', '', '0000-00-00 00:00:00'),
(3, 1, 'Non Buffered Society(Credit)', 'synergic', '2020-07-31 11:03:48', '', '0000-00-00 00:00:00'),
(4, 1, 'Non Buffered Society(Cash)', 'synergic', '2020-07-31 11:04:07', '', '0000-00-00 00:00:00'),
(5, 2, 'Cash', 'synergic', '2020-07-31 11:07:26', '', '0000-00-00 00:00:00'),
(6, 2, 'Credit', 'synergic', '2020-07-31 11:07:34', '', '0000-00-00 00:00:00'),
(7, 3, 'EX- Rail', 'synergic', '2020-07-31 11:09:39', '', '0000-00-00 00:00:00'),
(8, 3, 'EX Godown', 'synergic', '2020-07-31 11:10:11', '', '0000-00-00 00:00:00'),
(9, 3, 'FOL Delivery', 'synergic', '2020-07-31 11:10:31', '', '0000-00-00 00:00:00'),
(10, 3, 'SOUTH BENGAL FOL DELIVERY', 'synergic', '2020-07-31 11:11:50', '', '0000-00-00 00:00:00'),
(11, 3, 'NORTH BENGAL FOL DELIVERY', 'synergic', '2020-07-31 11:12:19', '', '0000-00-00 00:00:00'),
(12, 6, 'Ex-factory', 'synergic', '2020-07-31 11:14:50', 'synergic', '2020-07-31 11:15:25'),
(13, 6, 'FOL', 'synergic', '2020-07-31 11:15:12', '', '0000-00-00 00:00:00'),
(14, 7, 'FOL Delivery', 'synergic', '2020-07-31 11:16:28', '', '0000-00-00 00:00:00'),
(15, 4, 'Ex-Godown & Rail', 'synergic', '2020-07-31 11:19:18', '', '0000-00-00 00:00:00'),
(16, 4, 'Ex-Godown', 'synergic', '2020-07-31 11:19:36', '', '0000-00-00 00:00:00'),
(17, 4, 'Ex-Rail', 'synergic', '2020-07-31 11:19:55', '', '0000-00-00 00:00:00'),
(18, 4, 'Ex-Godown Old Stock', 'synergic', '2020-07-31 11:20:21', '', '0000-00-00 00:00:00'),
(19, 4, 'Ex-Rail & Godown', 'synergic', '2020-07-31 11:21:04', '', '0000-00-00 00:00:00'),
(20, 3, 'EX RAIL/EX GODOWN/ EX FACTORY', 'samik', '2020-09-15 03:43:42', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mm_company_dtls`
--

CREATE TABLE `mm_company_dtls` (
  `COMP_ID` int(10) NOT NULL,
  `COMP_NAME` varchar(100) NOT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `COMP_PN_NO` varchar(30) DEFAULT NULL,
  `COMP_EMAIL_ID` varchar(50) DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DT` datetime DEFAULT NULL,
  `MODIFIED_BY` varchar(50) DEFAULT NULL,
  `MODIFIED_DT` datetime DEFAULT NULL,
  `COMP_ADD` text,
  `PAN_NO` varchar(20) NOT NULL,
  `GST_NO` varchar(20) NOT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `MFMS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_company_dtls`
--

INSERT INTO `mm_company_dtls` (`COMP_ID`, `COMP_NAME`, `short_name`, `COMP_PN_NO`, `COMP_EMAIL_ID`, `CREATED_BY`, `CREATED_DT`, `MODIFIED_BY`, `MODIFIED_DT`, `COMP_ADD`, `PAN_NO`, `GST_NO`, `CIN`, `MFMS`) VALUES
(1, 'INDIAN FARMERS FERTILIZER COOPERATIVE LTD.', 'IFFCO', '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 10:45:29', '8 A.J.C. BOSE ROAD, CIRCULAR ROAD (1ST Floor), KOLKATA 700017, WEST BENGAL\r\n    \r\n    \r\n   ', 'AAAI0050M', '19AAAAI0050M1ZS', '', '100006'),
(2, 'KRISHAK BHARATI COOPERATIVE LIMITED', 'KRIBHCO', '033-25214157', 'KRIBHCOWB06@GMAIL.COM', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 10:48:36', '14B,LAKE TOWN BLOCK- A, KOLKATA-700089', 'AAAAK0203G', '19AAAAK0203G1Z8', '', ''),
(3, 'INDIAN POTASH LIMITED', 'IPL', '033-22882006', 'plcal@potindia.com', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 10:46:35', 'EVEREST HOUSE, 11TH FLOOR, 46-C, JAWAHARLAL NEHRU ROAD,KOLKATA 700071,WEST BENGAL\r\n    \r\n   ', 'AAAC10888H', '19AAAC10888H1ZD', 'U14219TN1955PLC000961', ''),
(4, 'COROMANDEL INTERNATIONAL LTD.', 'CIL', '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 11:13:27', 'COSSIMBAZAR DAMAN DAFTARI LANE, NEAR COSSIMBAZAR; WEST BENGAL-742102', 'AAACC7852K', '19AAACC7852K1ZA', 'L24120TG1961PLC000892', ''),
(5, 'KHAITAN CHEMICALS AND FERTILIZERS LTD.', 'KCFL', '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 11:14:27', '46, C RAFI AHMEND KIDWAI ROAD, KOLKATA\r\n   ', 'AAACK2342Q', '19AAACK2342Q1Z7', 'L24219MP1982PLC004937', ''),
(6, 'THE JAYASREE CHEMICALS & FERTIL', 'JCF', '033-2282-7531;9827;9436 ', 'JCF@JAYSHREETEA.COM', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 10:47:32', 'INDUSTRY , 15TH FLOOR, 10 CAMAC STREET, KOLKATA-700017   ', 'AAACJ7788D', '19AAACJ7788D1Z7', 'L15491WB1945PLCO12771', ''),
(7, 'MOSAIC INDIA PRIVATE LTD.', '', '', '', 'synergic', '2020-03-04 00:00:00', 'synergic', '2020-09-08 11:12:39', '11TH FLOOR,DLF CYBER CITY-II ; GURGAON, HARYANA-122002', 'AACCC4033C', '19AACCC4033C1Z6', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mm_cr_note_category`
--

CREATE TABLE `mm_cr_note_category` (
  `sl_no` int(5) NOT NULL,
  `cat_desc` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mm_feri_bank`
--

CREATE TABLE `mm_feri_bank` (
  `sl_no` int(11) NOT NULL,
  `dist_cd` int(10) NOT NULL,
  `acc_code` varchar(10) CHARACTER SET latin1 NOT NULL,
  `bank_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `branch_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ac_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ifsc` varchar(25) NOT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mm_ferti_soc`
--

CREATE TABLE `mm_ferti_soc` (
  `soc_id` int(5) NOT NULL,
  `soc_name` varchar(100) NOT NULL,
  `soc_add` text NOT NULL,
  `district` varchar(20) NOT NULL,
  `ph_no` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pan` varchar(15) DEFAULT NULL,
  `gstin` varchar(20) DEFAULT NULL,
  `mfms` varchar(20) DEFAULT NULL,
  `status` enum('N','O','R') DEFAULT 'N',
  `stock_point_flag` enum('Y','N') NOT NULL DEFAULT 'N',
  `buffer_flag` enum('N','B','I') NOT NULL DEFAULT 'N',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_ferti_soc`
--

INSERT INTO `mm_ferti_soc` (`soc_id`, `soc_name`, `soc_add`, `district`, `ph_no`, `email`, `pan`, `gstin`, `mfms`, `status`, `stock_point_flag`, `buffer_flag`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'DHARMAPUR SKUS LTD', 'DHARMAPUR, P.O- DHARMAPUR', '337', NULL, NULL, NULL, '19AABAD6387P3ZW', '772292', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(2, 'KADPUR SKUS LTD', 'Kadpur, P.O-Arkhali Amdanga', '337', NULL, NULL, NULL, '19AABTK6017G1ZO', '797662', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(3, 'KOLSUR BAGJOLA L.S CMS LTD', 'BAGJOLA BAZAR P.O KOLSUR', '337', NULL, NULL, NULL, '19AAAAK5956C1ZM', '379306', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(4, 'KULINGRAM O BELER DHANYAKURIA SKUS LTD', 'JOYPUE KALIBARI P.O-SIKIRA KULINGRAM', '337', NULL, NULL, NULL, '19AAAAK6390G1ZG', '289627', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(5, 'RAMCHANDRAPUR UNION LS PACS LTD', 'D.Chatra, P.O- RAMCHANDRAPUR', '337', NULL, NULL, NULL, '19AABAR0180J1ZH', '876166', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(6, 'Uttar 24 Pgs Krishi Samabay Himghar Ltd', 'Bagna, P.O-Gaighata', '337', NULL, NULL, NULL, '19AAAAU6112E2ZP', '289640', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(7, 'Swarup Nagar CoOp. Agrl. MKTG.Socy.', 'Swarupnagar, North 24 Parganas', '337', NULL, NULL, NULL, '19AAABS3093D1ZI', '289638', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(8, 'Madhusudakati S.K.U.S Ltd', 'East Bishnupur, Gaighata', '337', NULL, NULL, NULL, '19AAAAM7591F1ZB', '289628', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(9, 'Deganga C.A.D.P F.S.C.S Ltd', 'Debalaya, North 24 Parganas', '337', NULL, NULL, NULL, '19AAAAD9763A1ZS', '985860', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(10, 'Bagdah Block MKT CO-OP SOCY LTD', 'Helencha colony North 24 Parganas', '337', NULL, NULL, NULL, '19AADAB7061Q1Z7', '289622', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(11, 'Kharki SKUS Ltd', '24 pgs', '337', NULL, NULL, NULL, '19AAALK1316M1Z0', '189340', 'N', 'N', 'N', NULL, NULL, NULL, NULL),
(12, 'Hatthuba SKUS Ltd', 'Hatthuba North 24 Parganas', '337', NULL, NULL, NULL, '19AAAH0428E1Z4', '289626', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(13, 'Gaighata Thana Agril. Pry. Mktg. Coop. Socy. Ltd', 'Chandpara Bazer, North 24 Parganas', '337', NULL, NULL, NULL, '19AAAJG0977C1ZC', '289625', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(14, 'WBSSC Ltd', 'Barasat North 24 Parganas', '337', NULL, NULL, NULL, '19AAACW2364A1ZM', '497239', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(15, 'Amdanga L/S Thana L/S PCAMS  Ltd.', 'Vill Amdanga, North 24 Parganas', '337', NULL, NULL, NULL, '19AACAA1194Q1ZB', '373442', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(16, 'Bergoom Payragachi SKUS Ltd.', '24 pgs', '337', NULL, NULL, NULL, '19AAAJB0725D1ZT', '226554', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(17, 'Jowdanga S.K.U.S Ltd', 'Jowdanga Gaighata', '337', NULL, NULL, NULL, 'not availale', '226729', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(18, 'Gopalpur Naigachi S.K.U,S Ltd', 'Gopalpur Gaighata', '337', NULL, NULL, NULL, '19AABAG8780H1ZB', '387972', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(19, 'Hasnabad  CMS Ltd', 'na', '337', '', '', 'na', 'na', 'na', 'R', 'Y', 'B', 'synergic', '2020-09-16 07:06:18', NULL, NULL),
(20, 'BENFED Mirhati', 'na', '337', 'na', '', 'nil', 'na', 'na', 'O', 'Y', 'B', 'synergic', '2020-09-16 07:07:13', NULL, NULL),
(21, 'ADABARI SKUS LTD.', 'HARIBOLA HAT SITAI', '329', NULL, NULL, NULL, '19AAFAA3335A1ZA', '419894', 'N', 'N', 'N', NULL, NULL, NULL, NULL),
(22, 'BALAPUKURI SKUS LTD.', 'NAGARGIRIDARI SITAI', '329', NULL, NULL, NULL, '19AAEAB0113G1ZC', '419890', 'N', 'N', 'N', NULL, NULL, NULL, NULL),
(23, 'BHANUKUMARI SKUS LTD', 'BOXIRHAT TUFANGANJ', '329', NULL, NULL, NULL, '19AACAB6946M1Z8', '252963', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(24, 'BHATIBARI SKUS LTD', 'BHATIBARI ALIPURDUAR', '329', NULL, NULL, NULL, '19AAAAB7961N1Z7', '287605', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(25, 'CHILAKHANA SKUS LTD.', 'CHILAKHANA, TUFANGANJ', '329', NULL, NULL, NULL, '19AACAC7021L1ZP', '228601', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(26, 'DAKSHIN COOCHBEHAR LS CAMS LTD.', 'DEOANHAT COOCH BEHAR', '329', NULL, NULL, NULL, '19AACAD2591E1ZU', '1057479', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(27, 'DAWAGURI JHINAIDANGA SKUS LTD.', 'DAWAGURI COOCH BEHAR', '329', NULL, NULL, NULL, '19AABAD8906C1ZW', '228608', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(28, 'DEOCHARI SKUS LTD.', 'DEOCHARAI TUFANGANJ', '329', NULL, NULL, NULL, '19AABAD1061G1Z4', '228612', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(29, 'GURIARPAR SKUS LTD.', 'CHHATRAMPUR TUFANJGANJ', '329', NULL, NULL, NULL, '19AADAG2325A1ZA', '228636', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(30, 'JAMALDAHA SKUS LTD.', 'JAMALDAHA, MEKHLIGANJ', '329', NULL, NULL, NULL, '19AAAAJ7231M1ZE', '256933', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(31, 'KAMAT PANISHALA SKUS LTD.', 'CHOWRANGEE, MEKHLIGANJ', '329', NULL, NULL, NULL, '19AADAK5208J1ZJ', '913777', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(32, 'KANIBIL KANKANGURI SKUS LTD.', 'SATMILE COOCH BEHAR', '329', NULL, NULL, NULL, '19AADAK0976D1ZN', '649141', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(33, 'KHAGRABARI SKUS LTD.', 'KHAGRABARI COOCH BEHAR', '329', NULL, NULL, NULL, 'NIL', '270266', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(34, 'KHARIJA NALDHANDHARA SKUS LTD.', 'DEURHAT, COOCH BEHAR', '329', NULL, NULL, NULL, '19AABAK3695D1ZJ', '419900', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(35, 'KHARKHARIA SKUS LTD.', 'PUTIMARI DINHATA', '329', NULL, NULL, NULL, '19AACAK3669E1ZI', '419902', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(36, 'KHOLTA SKUS LTD.', 'KHOLTA, COOCH BEHAR', '329', NULL, NULL, NULL, 'NIL', '419906', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(37, 'KISAMAT DASGRAM J.K. SKUS LTD.', 'KISHAMAT DASGRAM DINHATA', '329', NULL, NULL, NULL, '19AADAK7891D1ZB', '982896', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(38, 'MADHUPUR SKUS LTD.', 'MADHUPUR COOCH BEHAR', '329', NULL, NULL, NULL, '19AACAM2877J2Z4', '271206', 'N', 'N', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL),
(339, 'MADHYANARARTHALI SKUS LTD.', 'KHOARDANGA ALIPURDUAR', '329', NULL, NULL, NULL, 'NIL', 'nil', 'N', 'Y', 'N', NULL, '2020-09-16 00:00:00', NULL, NULL);

--
-- Triggers `mm_ferti_soc`
--
DELIMITER $$
CREATE TRIGGER `ai_mm_ferti_soc` AFTER INSERT ON `mm_ferti_soc` FOR EACH ROW If new.stock_point_flag='Y' then 

Insert into tdf_stock_point_log(trans_dt,dist,soc_id,status)
values(new.created_dt,new.district,new.soc_id,new.stock_point_flag);

End If
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `au_mm_ferti_soc` AFTER UPDATE ON `mm_ferti_soc` FOR EACH ROW If old.stock_point_flag='Y'  and new.stock_point_flag='N' then 

Insert into tdf_stock_point_log(trans_dt,dist,soc_id,status)
values(new.created_dt,new.district,new.soc_id,new.stock_point_flag);

End If
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mm_product`
--

CREATE TABLE `mm_product` (
  `PROD_ID` int(10) NOT NULL,
  `PROD_DESC` varchar(100) DEFAULT NULL,
  `COMPANY` varchar(30) DEFAULT NULL,
  `PROD_TYPE` varchar(30) DEFAULT NULL,
  `CREATED_BY` varchar(30) DEFAULT NULL,
  `CREATED_DT` datetime DEFAULT NULL,
  `MODIFIED_BY` varchar(30) DEFAULT NULL,
  `MODIFIED_DT` datetime DEFAULT NULL,
  `COMMODITY_ID` varchar(30) DEFAULT NULL,
  `GST_RT` decimal(10,2) DEFAULT NULL,
  `HSN_CODE` int(20) DEFAULT NULL,
  `QTY_PER_BAG` int(10) DEFAULT NULL,
  `unit` int(5) NOT NULL,
  `storage` enum('B','T','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm_product`
--

INSERT INTO `mm_product` (`PROD_ID`, `PROD_DESC`, `COMPANY`, `PROD_TYPE`, `CREATED_BY`, `CREATED_DT`, `MODIFIED_BY`, `MODIFIED_DT`, `COMMODITY_ID`, `GST_RT`, `HSN_CODE`, `QTY_PER_BAG`, `unit`, `storage`) VALUES
(1, 'Ammonium Sulphate-50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:03:56', '1', 8.00, 3102, 50, 2, 'B'),
(2, 'BORON-14.6-20Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:04:04', '1', 18.00, 3102, 20, 2, 'B'),
(3, 'Calcium Nitrate-10Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:04:12', '1', 5.00, 3102, 10, 2, 'B'),
(4, 'Calcium Nitrate-1Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:04:20', '1', 5.00, 3101, 1, 2, 'B'),
(6, 'City Compost-KRIBHCO-50 Kg', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:04:37', '1', 5.00, 3101, 50, 2, 'B'),
(8, 'D A P (Zn)50 Kg', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:05:07', '1', 5.00, 31053000, 50, 2, 'B'),
(9, 'D. A. P. (Paradeep)50  Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:05:18', '1', 5.00, 3105, 50, 2, 'B'),
(10, 'DAP(KRIBHCO)', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:06:26', '1', 5.00, 3105, 1, 2, 'B'),
(11, 'DAP(IPL)', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:06:37', '1', 5.00, 31053000, 1000, 2, 'B'),
(12, 'DAP (Imported)50 Kg', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:06:51', '1', 5.00, 31053000, 50, 2, 'B'),
(13, 'DAP (Manufactured)50 Kg', '4', '3', NULL, NULL, 'synergic', '2020-09-16 06:06:58', '1', 5.00, 31053000, 50, 1, 'B'),
(14, 'DAP50 Kg', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:07:12', '1', 5.00, 31053000, 1, 2, 'B'),
(15, 'KARBON+50 Kg', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:07:24', '1', 5.00, 31010099, 50, 2, 'B'),
(16, 'Liquid Consortia-100ml', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:07:40', '1', 5.00, 3101, 4, 5, 'B'),
(17, 'Liquid Consortia-1lit.', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:07:53', '1', 5.00, 3101, 3, 3, 'B'),
(18, 'Liquid Consortia-250ml', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:08:07', '1', 5.00, 3101, 4, 5, 'B'),
(19, 'Liquid Consortia-500ml', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:08:22', '1', 5.00, 3101, 4, 5, 'B'),
(20, 'M.O.P.(IPL)-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:09:49', '1', 5.00, 31042000, 50, 2, 'B'),
(21, 'Magnesium Sulphate-1Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:10:00', '1', 12.00, 2833, 1, 2, 'B'),
(22, 'Magnesium Sulphate-25Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:10:13', '1', 12.00, 2833, 25, 2, 'B'),
(23, 'Magnesium Sulphate-2Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:10:32', '1', 12.00, 2833, 2, 2, 'B'),
(24, 'Magnesium Sulphate-50Kg.', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:10:45', '1', 12.00, 2833, 50, 2, 'B'),
(25, 'MOP(MOSAIC)50 Kg', '7', '1', NULL, NULL, 'synergic', '2020-09-16 06:10:59', '1', 5.00, 31042000, 50, 2, 'B'),
(26, 'NPK 18.18.18', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:11:16', '1', 5.00, 3105, 1, 2, 'B'),
(27, 'N P K (Zn)-10-26-26(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:11:29', '1', 5.00, 31052000, 50, 2, 'B'),
(28, 'N P K -10-26-26-IFFCO (50 Kg)', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:11:45', '1', 5.00, 3105, 50, 2, 'B'),
(29, 'N P K -10-26-26-COROMONDAL (50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:11:56', '1', 0.00, 31052000, 50, 2, 'B'),
(30, 'N P K -10-26-26-KRIBCO (50 Kg)', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:12:14', '1', 0.00, 3105, 50, 2, 'B'),
(31, 'N P K -12.32.16(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:12:25', '1', 5.00, 31052000, 50, 2, 'B'),
(32, 'N P K -14-35-14(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:12:37', '1', 5.00, 31052000, 50, 2, 'B'),
(33, 'N P K -20.20.0.13(50 )', '3', '3', NULL, NULL, NULL, NULL, '1', 5.00, 31052000, 50, 0, 'B'),
(34, 'N P K -24.24.0.8(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:12:57', '1', 5.00, 31052000, 50, 2, 'B'),
(35, 'N P K -28-28-0(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:13:10', '1', 5.00, 31052000, 50, 2, 'B'),
(36, 'N P K S-15:15:15:09(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:13:24', '1', 5.00, 31052000, 50, 2, 'B'),
(37, 'N P K S-16:20:0:13(50 Kg)', '4', '3', NULL, NULL, NULL, NULL, '1', 5.00, 31052000, 50, 0, 'B'),
(38, 'N P K S-20:20:0:13(50 Kg)', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:13:46', '1', 5.00, 31052000, 50, 2, 'B'),
(39, 'N P K-17.17.17( 50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:13:58', '1', 5.00, 31052000, 50, 2, 'B'),
(40, 'N.P.K.-20.20.0(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:14:10', '1', 5.00, 3105, 50, 2, 'B'),
(41, 'N:P:K:S(IMP) 20.20.0-50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:14:25', '1', 5.00, 3105, 50, 2, 'B'),
(42, 'NPK I-10.26.26( 50 Kg)', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:14:38', '1', 5.00, 3105, 50, 2, 'B'),
(43, 'NPK-16.16.16(50 Kg)', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:14:50', '1', 5.00, 31052000, 50, 2, 'B'),
(44, 'NPK-II-12:32:16 -50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:15:06', '1', 5.00, 3105, 50, 2, 'B'),
(45, 'NPKS-13.33.0.06(50kg)', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:15:20', '1', 5.00, 3105, 50, 2, 'B'),
(46, 'NPKS-20.20.0.13(50 Kg)', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:15:37', '1', 5.00, 31052000, 50, 2, 'B'),
(47, 'Phospho Zypsum-10 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:15:49', '1', 5.00, 3824, 10, 2, 'B'),
(48, 'Phospho Zypsum-1kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:16:06', '1', 5.00, 3824, 1, 2, 'B'),
(49, 'Phospho Zypsum-25 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:16:24', '1', 5.00, 3824, 25, 2, 'B'),
(50, 'Phospho Zypsum-5Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:16:41', '1', 5.00, 3824, 5, 2, 'B'),
(51, 'PSB Bio Fert.-1kg', '1', '3', NULL, NULL, 'synergic', '2020-09-16 06:17:56', '1', 5.00, 3101, 1, 2, 'B'),
(52, 'PSB Bio Fert.-500gm', '1', '3', NULL, NULL, 'synergic', '2020-09-16 06:18:17', '1', 5.00, 3101, 1, 6, 'B'),
(53, 'PSB Bio Fert-250gm', '1', '3', NULL, NULL, 'synergic', '2020-09-16 06:18:31', '1', 5.00, 3101, 1, 6, 'B'),
(54, 'S S P (G) SAI-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:18:50', '1', 5.00, 31031000, 50, 2, 'B'),
(55, 'S S P (P) SAI-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:19:04', '1', 5.00, 31031000, 50, 2, 'B'),
(56, 'S S P- G(Mangalam)-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:19:21', '1', 5.00, 31031000, 50, 2, 'B'),
(57, 'S S P -P (Mangalam)-50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:22:00', '1', 5.00, 31031000, 50, 2, 'B'),
(58, 'S.S.P (G)-IPL -50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:21:44', '1', 5.00, 31031000, 50, 2, 'B'),
(59, 'S.S.P.(G)-KHAITAN 50 Kg', '5', '1', NULL, NULL, 'synergic', '2020-09-16 06:21:31', '1', 5.00, 31031000, 50, 2, 'B'),
(60, 'S.S.P.(P)-IPL 50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:21:19', '1', 5.00, 31031000, 50, 2, 'B'),
(61, 'S.S.P.(P)-KHAITAN 50 Kg', '5', '1', NULL, NULL, 'synergic', '2020-09-16 06:22:23', '1', 5.00, 31031000, 50, 2, 'B'),
(62, 'SAGARIKA (Granular)-1 Kg', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:22:50', '1', 5.00, 31031000, 1, 2, 'B'),
(63, 'SAGARIKA (Granular)-10 Kg', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:23:06', '1', 5.00, 3101, 10, 2, 'B'),
(64, 'SAGARIKA (Granular)-25 Kg', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:23:17', '1', 5.00, 3101, 1, 2, 'B'),
(65, 'SAGARIKA (Liquid)-100ml', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:23:30', '1', 5.00, 3101, 4, 5, 'B'),
(66, 'SAGARIKA (Liquid)-1Lit', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:23:46', '1', 5.00, 3101, 1, 3, 'B'),
(67, 'SAGARIKA (Liquid)-250ml', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:24:01', '1', 5.00, 3101, 3, 5, 'B'),
(68, 'SAGARIKA (Liquid)-5 lit', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:25:01', '1', 5.00, 3101, 5, 3, 'B'),
(69, 'SAGARIKA (Liquid)-500 ml', '1', '2', NULL, NULL, 'synergic', '2020-09-16 06:25:16', '1', 5.00, 3101, 4, 5, 'B'),
(70, 'SSP (P)(JAYASREE) 50 Kg', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:25:31', '1', 5.00, 31031000, 50, 2, 'B'),
(71, 'Sulpher Bentonite-1 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:25:46', '1', 5.00, 25030090, 1, 2, 'B'),
(72, 'Sulpher Bentonite-10Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:25:58', '1', 5.00, 25030090, 10, 2, 'B'),
(73, 'Sulpher Bentonite-25 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:26:10', '1', 5.00, 25030090, 25, 2, 'B'),
(74, 'Sulpher Bentonite-5 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:26:31', '1', 5.00, 25030090, 5, 2, 'B'),
(75, 'UREA  (Ph-I)45 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:26:50', '1', 5.00, 3102, 45, 2, 'B'),
(76, 'UREA  (Ph-I)50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:27:06', '1', 5.00, 3102, 50, 2, 'B'),
(77, 'UREA ( NEEM) IPL -50 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:27:21', '1', 5.00, 31021000, 50, 2, 'B'),
(78, 'Urea (Imported)-45 Kg', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:27:31', '1', 5.00, 3102, 45, 2, 'B'),
(79, 'Urea (KFL)-45 Kg', '2', '1', NULL, NULL, 'synergic', '2020-09-16 06:27:45', '1', 5.00, 3102, 45, 2, 'B'),
(80, 'UREA (Neem)-IFFCO 45 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:27:57', '1', 5.00, 3102, 45, 2, 'B'),
(81, 'UREA (Neem)-IFFCO  50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:32:01', '1', 5.00, 3102, 50, 2, 'B'),
(82, 'UREA (NEEM)-COROMONDAL 50 Kg', '4', '1', NULL, NULL, 'synergic', '2020-09-16 06:28:10', '1', 5.00, 31021000, 50, 2, 'B'),
(83, 'UREA (Om)45 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:32:24', '1', 5.00, 3102, 45, 2, 'B'),
(84, 'UREA (Om)50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:32:36', '1', 5.00, 3102, 50, 2, 'B'),
(85, 'UREA (Ph-II)45Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:32:46', '1', 5.00, 3102, 45, 2, 'B'),
(86, 'UREA (Ph-II)50 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:32:57', '1', 5.00, 3102, 50, 2, 'B'),
(87, 'Urea Phos-10Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:33:54', '1', 5.00, 3102, 10, 2, 'B'),
(88, 'Urea Phos-2 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:34:09', '1', 5.00, 3102, 2, 2, 'B'),
(89, 'Urea Phos-25 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:34:21', '1', 5.00, 3102, 25, 2, 'B'),
(90, 'Urea Phos-5 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:34:36', '1', 5.00, 3102, 5, 2, 'B'),
(91, 'Urea-IPL 45 Kg', '3', '1', NULL, NULL, 'synergic', '2020-09-16 06:34:50', '1', 5.00, 31021000, 45, 2, 'B'),
(92, 'WSF SOP-10 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:35:26', '1', 5.00, 3105, 10, 2, 'B'),
(93, 'WSF SOP-1kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:35:51', '1', 5.00, 3105, 1, 2, 'B'),
(94, 'WSF SOP-25 Kg.', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:36:05', '1', 5.00, 3105, 25, 2, 'B'),
(95, 'WSF SOP-5Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:36:17', '1', 5.00, 3105, 5, 2, 'B'),
(96, 'WSF-0.0.50- 1 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:36:31', '1', 5.00, 3105, 1, 2, 'B'),
(97, 'WSF-0.0.50 - 10Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:36:47', '1', 5.00, 3105, 10, 2, 'B'),
(98, 'WSF-0.0.50-  25 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:37:00', '1', 5.00, 3105, 25, 2, 'B'),
(99, 'WSF-0.0.50 - 5 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-14 12:02:27', '1', 5.00, 3105, 5, 1, 'B'),
(100, 'Zinc Sulphate Mono. (33%)10 Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:37:19', '1', 18.00, 28332990, 10, 2, 'B'),
(101, 'Zinc Sulphate Mono. (33%)1kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:37:30', '1', 18.00, 28332990, 1, 2, 'B'),
(102, 'Zinc Sulphate Mono. (33%)5Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:37:40', '1', 18.00, 28332990, 5, 2, 'B'),
(103, 'Zinc Sulphate-10 Kg.', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:37:52', '1', 5.00, 3102, 10, 2, 'B'),
(104, 'Zinc Sulphate-1kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:38:07', '1', 5.00, 3102, 1, 2, 'B'),
(105, 'Zinc Sulphate-5Kg', '1', '1', NULL, NULL, 'synergic', '2020-09-16 06:38:19', '1', 5.00, 3102, 5, 2, 'B'),
(106, 'SSP(p) 50 KG', '6', '1', 'synergic', '2020-03-20 00:00:00', 'synergic', '2020-09-16 06:38:30', NULL, 0.00, 0, 50, 2, 'B'),
(107, 'City Compost-KRIBHCO-50 Kg', NULL, NULL, NULL, '2020-07-15 00:00:00', NULL, NULL, NULL, NULL, NULL, 50, 0, 'B'),
(108, 'City Compost-KRIBHCO-50 Kg', NULL, NULL, 'synergic', '2020-07-15 00:00:00', NULL, NULL, NULL, NULL, NULL, 50, 0, 'B'),
(115, 'N:P:K:S 20:20:0:13 ', '1', '1', 'synergic', '2020-08-21 10:16:44', 'synergic', '2020-09-16 06:39:01', NULL, 18.00, 88999, 50, 2, 'B'),
(116, 'Urea(IMP) ', '1', '1', 'synergic', '2020-08-21 10:17:29', 'synergic', '2020-09-16 06:39:35', NULL, 5.00, 8899666, 50, 2, 'B'),
(117, 'WSF 18:18:18 ', '1', '1', 'synergic', '2020-08-21 10:18:01', 'synergic', '2020-09-16 06:39:45', NULL, 5.50, 9666, 50, 2, 'B'),
(118, 'WSF 19:19:19 ', '1', '1', 'synergic', '2020-08-21 10:18:29', 'synergic', '2020-09-16 06:39:57', NULL, 5.50, 3333, 50, 2, 'B'),
(119, 'ZINC Sulphate-21% ', '2', '1', 'synergic', '2020-08-21 10:24:11', 'synergic', '2020-09-16 06:40:07', NULL, 5.50, 52555, 50, 2, 'B'),
(120, 'Urea neem OM', '1', '1', 'synergic', '2020-09-16 06:52:13', NULL, NULL, NULL, 0.00, 111, 50, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `mm_sale_rate`
--

CREATE TABLE `mm_sale_rate` (
  `bulk_id` int(10) NOT NULL DEFAULT '0',
  `fin_id` int(10) NOT NULL,
  `district` int(10) NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `comp_id` int(10) NOT NULL,
  `catg_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `sp_mt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sp_bag` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sp_govt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_sale_rate`
--

INSERT INTO `mm_sale_rate` (`bulk_id`, `fin_id`, `district`, `frm_dt`, `to_dt`, `comp_id`, `catg_id`, `prod_id`, `sp_mt`, `sp_bag`, `sp_govt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(23, 1, 327, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 327, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 327, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 327, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 327, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 327, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 327, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 327, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 327, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 327, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 327, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 327, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 327, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 327, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 328, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 328, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 328, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 328, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 328, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 328, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 328, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 328, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 328, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 328, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 328, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 328, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 328, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 328, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 329, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 329, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 329, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 329, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 329, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 329, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 329, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 329, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 329, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 329, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 329, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 329, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 329, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 329, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 330, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 330, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 330, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 330, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 330, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 330, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 330, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 330, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 330, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 330, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 330, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 330, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 330, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 330, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 331, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 331, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 331, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 331, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 331, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 331, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 331, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 331, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 331, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 331, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 331, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 331, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 331, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 331, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 332, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 332, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 332, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 332, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 332, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 332, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 332, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 332, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 332, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 332, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 332, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 332, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 332, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 332, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 333, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 333, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 333, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 333, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 333, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 333, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 333, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 333, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 333, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 333, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 333, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 333, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 333, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 333, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 333, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 333, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 333, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 333, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 334, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 334, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 334, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 334, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 334, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 334, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 334, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 334, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 334, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 334, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 334, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 334, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 334, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 334, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 334, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 334, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 334, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 334, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 335, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 335, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 335, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 335, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(42, 1, 335, '2020-05-01', '2020-05-30', 3, 8, 11, 22052.14, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(41, 1, 335, '2020-05-01', '2020-05-31', 0, 8, 11, 22052.14, 22.00, 0.00, 'samik', '2020-09-15', 'samik', '2020-09-15'),
(40, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 11, 21904.76, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(43, 1, 335, '2020-05-01', '2020-05-31', 3, 9, 11, 22477.14, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(37, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 20, 16761.90, 335.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(38, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 20, 16857.14, 337.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(39, 1, 335, '2020-05-01', '2020-05-31', 3, 9, 20, 17295.24, 346.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(32, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 33, 17041.43, 341.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(31, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 33, 17241.43, 345.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(33, 1, 335, '2020-05-01', '2020-05-31', 3, 9, 33, 17691.43, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(34, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 43, 17636.67, 353.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(35, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 43, 17836.67, 357.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(36, 1, 335, '2020-05-01', '2020-05-31', 3, 9, 43, 18286.67, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 335, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 335, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(44, 1, 335, '2020-05-01', '2020-05-31', 3, 7, 91, 5061.21, 112.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(45, 1, 335, '2020-05-01', '2020-05-31', 3, 8, 91, 5111.21, 114.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 335, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(4, 1, 335, '2020-06-01', '2020-06-30', 3, 7, 33, 17041.43, 341.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(6, 1, 335, '2020-06-01', '2020-06-30', 3, 7, 43, 17636.67, 353.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 335, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(2, 1, 335, '2020-08-01', '2020-08-31', 3, 7, 11, 21523.80, 21524.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(1, 1, 335, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 335, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 335, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 335, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 335, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 335, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 336, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 336, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 336, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 336, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 336, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 336, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 336, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 336, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 336, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 336, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 336, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 336, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 336, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 336, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 336, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 336, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 336, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 336, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 337, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 337, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 337, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 337, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 337, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 337, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 337, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 337, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 337, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 337, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 337, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 337, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 337, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 337, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 337, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 337, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 337, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(7, 1, 337, '2020-09-01', '2020-09-30', 6, 12, 106, 7077.38, 142.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 337, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 338, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 338, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 338, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 338, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 338, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 338, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 338, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 338, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 338, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 338, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 338, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 338, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 338, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 338, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 338, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 338, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 338, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 338, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 339, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 339, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 339, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 339, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 339, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 339, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 339, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 339, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 339, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 339, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 339, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 339, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 339, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 339, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 339, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 339, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 339, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 339, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 340, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 340, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 340, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 340, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 340, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 340, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 340, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 340, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 340, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 340, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 340, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 340, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 340, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 340, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 340, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 340, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 340, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 340, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 341, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 341, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 341, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 341, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 341, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 341, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 341, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 341, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 341, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 341, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 341, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 341, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 341, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 341, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 341, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 341, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 341, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 341, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 343, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 343, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 343, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 343, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 343, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 343, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 343, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 343, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 343, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 343, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 343, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 343, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 343, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 343, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 343, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 343, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 343, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 343, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 344, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 344, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 344, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 344, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 344, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 344, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 344, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 344, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 344, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 344, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 344, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 344, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 344, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 344, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 344, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 344, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 344, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 344, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 345, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 345, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 345, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 345, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 345, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 345, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 345, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 345, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 345, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 345, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 345, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 345, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 345, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 345, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 345, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 345, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 345, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 345, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 346, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 346, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 346, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 346, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 346, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 346, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 346, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 346, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 346, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 346, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 346, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 346, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 346, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(9, 1, 346, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 347, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 347, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 347, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 347, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(42, 1, 347, '2020-05-01', '2020-05-30', 3, 8, 11, 22052.14, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(41, 1, 347, '2020-05-01', '2020-05-31', 0, 8, 11, 22052.14, 22.00, 0.00, 'samik', '2020-09-15', 'samik', '2020-09-15'),
(40, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 11, 21904.76, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(43, 1, 347, '2020-05-01', '2020-05-31', 3, 9, 11, 22477.14, 22.00, 0.00, 'samik', '2020-09-15', NULL, NULL);
INSERT INTO `mm_sale_rate` (`bulk_id`, `fin_id`, `district`, `frm_dt`, `to_dt`, `comp_id`, `catg_id`, `prod_id`, `sp_mt`, `sp_bag`, `sp_govt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(37, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 20, 16761.90, 335.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(38, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 20, 16857.14, 337.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(39, 1, 347, '2020-05-01', '2020-05-31', 3, 9, 20, 17295.24, 346.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(32, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 33, 17041.43, 341.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(31, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 33, 17241.43, 345.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(33, 1, 347, '2020-05-01', '2020-05-31', 3, 9, 33, 17691.43, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(34, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 43, 17636.67, 353.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(35, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 43, 17836.67, 357.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(36, 1, 347, '2020-05-01', '2020-05-31', 3, 9, 43, 18286.67, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 347, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 347, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(44, 1, 347, '2020-05-01', '2020-05-31', 3, 7, 91, 5061.21, 112.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(45, 1, 347, '2020-05-01', '2020-05-31', 3, 8, 91, 5111.21, 114.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 347, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(4, 1, 347, '2020-06-01', '2020-06-30', 3, 7, 33, 17041.43, 341.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(6, 1, 347, '2020-06-01', '2020-06-30', 3, 7, 43, 17636.67, 353.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 347, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(2, 1, 347, '2020-08-01', '2020-08-31', 3, 7, 11, 21523.80, 21524.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(1, 1, 347, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 347, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 347, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 347, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 347, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 347, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(21, 1, 348, '2020-04-01', '2020-04-30', 3, 10, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(23, 1, 348, '2020-04-01', '2020-04-30', 3, 20, 54, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(20, 1, 348, '2020-04-01', '2020-04-30', 3, 10, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(22, 1, 348, '2020-04-01', '2020-04-30', 3, 20, 55, 6691.43, 134.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(27, 1, 348, '2020-05-01', '2020-05-31', 3, 7, 54, 7453.33, 149.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(29, 1, 348, '2020-05-01', '2020-05-31', 3, 8, 54, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(25, 1, 348, '2020-05-01', '2020-05-31', 3, 10, 54, 8024.76, 160.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(26, 1, 348, '2020-05-01', '2020-05-31', 3, 7, 55, 6977.14, 140.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(28, 1, 348, '2020-05-01', '2020-05-31', 3, 8, 55, 7072.38, 141.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(24, 1, 348, '2020-05-01', '2020-05-31', 3, 10, 55, 7548.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(3, 1, 348, '2020-05-16', '2020-05-31', 3, 7, 20, 15636.67, 313.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(5, 1, 348, '2020-06-01', '2020-06-30', 3, 8, 60, 6591.43, 132.00, 0.00, 'samik', '2020-09-10', NULL, NULL),
(1, 1, 348, '2020-08-01', '2020-08-31', 4, 15, 27, 22285.71, 446.00, 0.00, 'synergic', '2020-09-09', NULL, NULL),
(17, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 8, 23047.62, 461.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(19, 1, 348, '2020-09-01', '2020-09-30', 4, 17, 12, 21904.76, 438.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(18, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 13, 22476.19, 450.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(11, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 27, 22571.43, 451.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(10, 1, 348, '2020-09-01', '2020-09-30', 4, 17, 29, 21619.05, 432.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(12, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 32, 23238.10, 465.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(14, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 35, 23809.52, 476.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(16, 1, 348, '2020-09-01', '2020-09-30', 4, 17, 36, 18285.71, 366.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(15, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 37, 16952.38, 339.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(13, 1, 348, '2020-09-01', '2020-09-30', 4, 15, 46, 17714.29, 354.00, 0.00, 'samik', '2020-09-15', NULL, NULL),
(8, 1, 348, '2020-09-01', '2020-09-30', 6, 13, 106, 7553.57, 151.00, 0.00, 'samik', '2020-09-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mm_unit`
--

CREATE TABLE `mm_unit` (
  `id` int(5) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_unit`
--

INSERT INTO `mm_unit` (`id`, `unit_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'MT', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-06 00:00:00'),
(2, 'Kg', 'synergic', '2020-03-06 00:00:00', '', '2020-03-06 00:00:00'),
(3, 'Litre', 'synergic', '2020-03-06 00:00:00', 'synergic', '2020-03-18 00:00:00'),
(4, 'Quintal', 'synergic', '2020-03-18 00:00:00', '', '2020-03-06 00:00:00'),
(5, 'ML', 'synergic', '2020-09-09 10:20:49', NULL, NULL),
(6, 'Gm', 'synergic', '2020-09-09 10:21:58', 'synergic', '2020-09-09 10:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `tdf_advance`
--

CREATE TABLE `tdf_advance` (
  `trans_dt` date NOT NULL,
  `sl_no` int(5) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `trans_type` enum('I','O') NOT NULL,
  `adv_amt` decimal(10,0) NOT NULL DEFAULT '0',
  `inv_no` varchar(50) DEFAULT NULL,
  `ro_no` varchar(30) DEFAULT NULL,
  `remarks` text,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modifed_by` varchar(50) DEFAULT NULL,
  `modifed_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdf_company_advance`
--

CREATE TABLE `tdf_company_advance` (
  `trans_dt` date NOT NULL,
  `sl_no` int(5) NOT NULL,
  `receipt_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `trans_type` enum('I','O') CHARACTER SET latin1 NOT NULL,
  `adv_amt` decimal(10,0) NOT NULL DEFAULT '0',
  `inv_no` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ro_no` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `created_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modifed_by` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `modifed_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tdf_company_payment`
--

CREATE TABLE `tdf_company_payment` (
  `sl_no` int(11) NOT NULL,
  `pay_no` varchar(50) NOT NULL,
  `pay_dt` datetime NOT NULL,
  `district` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `sale_inv_no` varchar(50) NOT NULL,
  `pur_ro` varchar(20) NOT NULL,
  `pur_inv_no` varchar(20) NOT NULL,
  `purchase_rt` decimal(20,2) NOT NULL,
  `bnk_id` int(10) NOT NULL,
  `pay_mode` int(5) NOT NULL,
  `paid_amt` decimal(20,2) NOT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `ref_dt` date DEFAULT NULL,
  `bnk_ac_no` varchar(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `virtual_ac` varchar(20) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `fin_yr` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tdf_dr_cr_note`
--

CREATE TABLE `tdf_dr_cr_note` (
  `trans_dt` date NOT NULL,
  `trans_no` int(10) NOT NULL,
  `recpt_no` varchar(50) NOT NULL,
  `soc_id` int(10) NOT NULL DEFAULT '0',
  `comp_id` int(10) NOT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `ro` varchar(30) DEFAULT NULL,
  `catg` int(5) DEFAULT NULL,
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `trans_flag` enum('R','A') NOT NULL,
  `note_type` enum('D','C') NOT NULL,
  `branch_id` int(5) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tdf_payment_recv`
--

CREATE TABLE `tdf_payment_recv` (
  `sl_no` int(10) NOT NULL,
  `paid_id` varchar(50) NOT NULL,
  `paid_dt` date NOT NULL,
  `soc_id` int(10) NOT NULL,
  `sale_invoice_no` varchar(50) NOT NULL,
  `sale_invoice_dt` datetime NOT NULL,
  `ro_no` varchar(20) NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `ref_dt` date NOT NULL,
  `bnk_id` int(5) NOT NULL,
  `tot_recvble_amt` decimal(10,2) NOT NULL,
  `adj_dr_note_amt` decimal(10,2) NOT NULL,
  `adj_adv_amt` decimal(10,2) NOT NULL,
  `net_recvble_amt` decimal(10,2) NOT NULL,
  `paid_amt` decimal(10,2) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL,
  `branch_id` int(10) NOT NULL,
  `fin_yr` int(10) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `approval_status` enum('U','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tdf_payment_recv`
--
DELIMITER $$
CREATE TRIGGER `ad_tdf_py_recv` AFTER DELETE ON `tdf_payment_recv` FOR EACH ROW update td_sale
set paid_amt=paid_amt - old.paid_amt
where trans_do=old.sale_invoice_no
and sale_ro=old.ro_no
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ai_td_tdf_py_recv` AFTER INSERT ON `tdf_payment_recv` FOR EACH ROW BEGIN
update td_sale
set paid_amt=paid_amt + new.paid_amt
where trans_do=new.sale_invoice_no
and sale_ro=new.ro_no;

/*SET @district=(SELECT br_cd
FROM td_sale 
WHERE trans_do=new.sale_invoice_no
AND SALE_RO=new.ro_no);
           
SET @qty= (SELECT sum(QTY)
FROM td_sale 
WHERE trans_do=new.sale_invoice_no
AND SALE_RO=new.ro_no);

set @rate=(SELECT rate
FROM td_purchase
WHERE ro_no=new.ro_no);

    
set @prod_id=(SELECT prod_id
FROM td_purchase
WHERE ro_no=new.ro_no);
           
set @comp_id=(SELECT comp_id
FROM td_purchase
WHERE ro_no=new.ro_no);
           
set @invoice_no=(SELECT invoice_no
FROM td_purchase
WHERE ro_no=new.ro_no);
           INSERT INTO tdf_company_payment
(comp_id,district,prod_id,qty,sale_inv_no,pur_inv_no,pur_ro,purchase_rt)
values(@comp_id,@district,@prod_id,@qty,new.sale_invoice_no,@invoice_no,new.ro_no,@rate);
*/

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tdf_stock_point_log`
--

CREATE TABLE `tdf_stock_point_log` (
  `sl_no` int(10) NOT NULL,
  `trans_dt` date NOT NULL,
  `dist` int(10) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdf_stock_point_log`
--

INSERT INTO `tdf_stock_point_log` (`sl_no`, `trans_dt`, `dist`, `soc_id`, `status`) VALUES
(1, '2020-09-16', 337, 1, 'Y'),
(2, '2020-09-16', 337, 2, 'Y'),
(3, '2020-09-16', 337, 3, 'Y'),
(4, '2020-09-16', 337, 4, 'Y'),
(5, '2020-09-16', 337, 5, 'Y'),
(6, '2020-09-16', 337, 6, 'Y'),
(7, '2020-09-16', 337, 7, 'Y'),
(8, '2020-09-16', 337, 8, 'Y'),
(9, '2020-09-16', 337, 9, 'Y'),
(10, '2020-09-16', 337, 10, 'Y'),
(11, '2020-09-16', 337, 12, 'Y'),
(12, '2020-09-16', 337, 13, 'Y'),
(13, '2020-09-16', 337, 19, 'Y'),
(14, '2020-09-16', 337, 20, 'Y'),
(15, '2020-09-16', 329, 23, 'Y'),
(16, '2020-09-16', 329, 24, 'Y'),
(17, '2020-09-16', 329, 27, 'Y'),
(18, '2020-09-16', 329, 29, 'Y'),
(19, '2020-09-16', 329, 30, 'Y'),
(20, '2020-09-16', 329, 33, 'Y'),
(21, '2020-09-16', 329, 339, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tdf_stock_point_trans`
--

CREATE TABLE `tdf_stock_point_trans` (
  `trans_dt` date NOT NULL,
  `ro_inv_no` varchar(30) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `fin_yr` int(5) NOT NULL,
  `point_id` int(10) NOT NULL,
  `trans_type` enum('I','O','R') NOT NULL,
  `unit` int(5) NOT NULL,
  `quantity` decimal(10,0) NOT NULL DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase`
--

CREATE TABLE `td_purchase` (
  `trans_cd` int(10) NOT NULL,
  `trans_dt` date NOT NULL,
  `trans_flag` enum('1','2') DEFAULT NULL,
  `comp_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `ro_no` varchar(30) NOT NULL,
  `ro_dt` date DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `invoice_dt` date DEFAULT NULL,
  `due_dt` date DEFAULT NULL,
  `qty` decimal(20,3) NOT NULL DEFAULT '0.000',
  `unit` int(10) NOT NULL,
  `stock_qty` decimal(10,3) NOT NULL DEFAULT '0.000',
  `no_of_bags` int(10) NOT NULL DEFAULT '0',
  `delivery_mode` enum('1','2','3') NOT NULL,
  `reck_pt_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reck_pt_n_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `govt_sale_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `iffco_buf_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `iffco_n_buff_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `challan_flag` varchar(5) NOT NULL DEFAULT 'N',
  `rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `retlr_margin` decimal(10,2) NOT NULL DEFAULT '0.00',
  `spl_rebt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rbt_add` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rbt_less` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rnd_of_add` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rnd_of_less` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `net_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `add_adj_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `less_adj_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL,
  `br` int(11) DEFAULT NULL,
  `fin_yr` varchar(20) DEFAULT NULL,
  `stock_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_purchase`
--

INSERT INTO `td_purchase` (`trans_cd`, `trans_dt`, `trans_flag`, `comp_id`, `prod_id`, `ro_no`, `ro_dt`, `invoice_no`, `invoice_dt`, `due_dt`, `qty`, `unit`, `stock_qty`, `no_of_bags`, `delivery_mode`, `reck_pt_rt`, `reck_pt_n_rt`, `govt_sale_rt`, `iffco_buf_rt`, `iffco_n_buff_rt`, `challan_flag`, `rate`, `base_price`, `cgst`, `sgst`, `retlr_margin`, `spl_rebt`, `rbt_add`, `rbt_less`, `rnd_of_add`, `rnd_of_less`, `tot_amt`, `net_amt`, `add_adj_amt`, `less_adj_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `br`, `fin_yr`, `stock_point`) VALUES
(49, '2020-04-01', '2', 2, 119, '191103827', '2015-03-20', NULL, NULL, NULL, 2.050, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 20),
(50, '2020-04-01', '2', 1, 86, '220094 ', '2000-09-14', NULL, NULL, NULL, 20.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 19),
(44, '2020-04-01', '2', 1, 116, '240019', '2030-04-15', NULL, NULL, NULL, 45.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 19),
(46, '2020-04-01', '2', 1, 118, '251002', '2008-09-11', NULL, NULL, NULL, 0.080, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 20),
(45, '2020-04-01', '2', 1, 117, '253002', '2029-10-13', NULL, NULL, NULL, 0.399, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 20),
(34, '2020-04-01', '2', 1, 86, '260012', '2015-05-25', NULL, NULL, NULL, 45.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 3),
(33, '2020-04-01', '2', 1, 86, '260014', '2029-05-15', NULL, NULL, NULL, 30.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 12),
(36, '2020-04-01', '2', 1, 115, '260060', '2030-07-16', NULL, NULL, NULL, 50.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(41, '2020-04-01', '2', 1, 115, '260063', '2030-07-16', NULL, NULL, NULL, 100.000, 1, 100.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(34, '2020-04-01', '2', 1, 86, '260072', '2030-07-16', NULL, NULL, NULL, 110.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 8),
(38, '2020-04-01', '2', 1, 115, '260109', '2016-08-31', NULL, NULL, NULL, 30.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(37, '2020-04-01', '2', 1, 115, '260114', '2016-08-31', NULL, NULL, NULL, 15.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(39, '2020-04-01', '2', 1, 115, '260192', '2030-09-16', NULL, NULL, NULL, 55.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(35, '2020-04-01', '2', 1, 86, '260261', '2030-11-16', NULL, NULL, NULL, 75.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 8),
(40, '2020-04-01', '2', 1, 115, '260267', '2030-11-16', NULL, NULL, NULL, 30.000, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(42, '2020-04-01', '2', 1, 115, '260318', '2030-12-16', NULL, NULL, NULL, 120.000, 1, 120.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(31, '2020-04-01', '2', 1, 120, '260443', '2031-01-17', NULL, NULL, NULL, 0.100, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(29, '2020-04-01', '2', 1, 120, '260548', '2031-03-17', NULL, NULL, NULL, 95.400, 1, 0.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(43, '2020-04-01', '2', 1, 115, '260550', '2031-03-17', NULL, NULL, NULL, 35.000, 1, 35.000, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 6),
(48, '2020-04-01', '2', 3, 43, '46802', '2031-03-12', NULL, NULL, NULL, 46.500, 1, 46.500, 0, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, 337, '1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `td_sale`
--

CREATE TABLE `td_sale` (
  `trans_do` varchar(50) NOT NULL,
  `trans_no` int(10) NOT NULL,
  `do_dt` date NOT NULL,
  `sale_due_dt` date DEFAULT NULL,
  `trans_type` varchar(15) NOT NULL,
  `soc_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `sale_ro` varchar(15) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `stock_point` varchar(50) NOT NULL,
  `gov_sale_rt` enum('Y','N') NOT NULL,
  `qty` decimal(10,3) NOT NULL DEFAULT '0.000',
  `sale_rt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxable_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sgst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dis` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tot_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_amt` decimal(20,2) NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` date DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL,
  `br_cd` int(10) DEFAULT NULL,
  `fin_yr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_category`
--
ALTER TABLE `mm_category`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `mm_company_dtls`
--
ALTER TABLE `mm_company_dtls`
  ADD PRIMARY KEY (`COMP_ID`);

--
-- Indexes for table `mm_cr_note_category`
--
ALTER TABLE `mm_cr_note_category`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `mm_feri_bank`
--
ALTER TABLE `mm_feri_bank`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `mm_ferti_soc`
--
ALTER TABLE `mm_ferti_soc`
  ADD PRIMARY KEY (`soc_id`);

--
-- Indexes for table `mm_product`
--
ALTER TABLE `mm_product`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- Indexes for table `mm_sale_rate`
--
ALTER TABLE `mm_sale_rate`
  ADD PRIMARY KEY (`district`,`frm_dt`,`to_dt`,`comp_id`,`prod_id`,`catg_id`) USING BTREE;

--
-- Indexes for table `mm_unit`
--
ALTER TABLE `mm_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdf_advance`
--
ALTER TABLE `tdf_advance`
  ADD PRIMARY KEY (`trans_dt`,`sl_no`) USING BTREE;

--
-- Indexes for table `tdf_company_advance`
--
ALTER TABLE `tdf_company_advance`
  ADD PRIMARY KEY (`trans_dt`,`receipt_no`);

--
-- Indexes for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `tdf_dr_cr_note`
--
ALTER TABLE `tdf_dr_cr_note`
  ADD PRIMARY KEY (`trans_dt`,`trans_no`) USING BTREE;

--
-- Indexes for table `tdf_payment_recv`
--
ALTER TABLE `tdf_payment_recv`
  ADD PRIMARY KEY (`paid_id`,`paid_dt`,`soc_id`,`pay_type`,`paid_amt`);

--
-- Indexes for table `tdf_stock_point_log`
--
ALTER TABLE `tdf_stock_point_log`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `tdf_stock_point_trans`
--
ALTER TABLE `tdf_stock_point_trans`
  ADD PRIMARY KEY (`trans_dt`,`ro_inv_no`);

--
-- Indexes for table `td_purchase`
--
ALTER TABLE `td_purchase`
  ADD PRIMARY KEY (`ro_no`,`comp_id`),
  ADD KEY `trans_cd` (`trans_cd`);

--
-- Indexes for table `td_sale`
--
ALTER TABLE `td_sale`
  ADD PRIMARY KEY (`trans_do`,`do_dt`,`sale_ro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_category`
--
ALTER TABLE `mm_category`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mm_cr_note_category`
--
ALTER TABLE `mm_cr_note_category`
  MODIFY `sl_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mm_feri_bank`
--
ALTER TABLE `mm_feri_bank`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mm_product`
--
ALTER TABLE `mm_product`
  MODIFY `PROD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `mm_unit`
--
ALTER TABLE `mm_unit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tdf_company_payment`
--
ALTER TABLE `tdf_company_payment`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tdf_stock_point_log`
--
ALTER TABLE `tdf_stock_point_log`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `td_purchase`
--
ALTER TABLE `td_purchase`
  MODIFY `trans_cd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
