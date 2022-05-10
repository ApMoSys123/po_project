-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 10:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase_order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` varchar(15) DEFAULT NULL COMMENT ' 0 = Inactive, 1 = Active',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `name`, `status`, `date_created`) VALUES
(19, 'Axis Bank', 'Active', '2022-01-21 12:29:39'),
(20, 'Axis Finance', 'Active', '2022-01-21 12:29:48'),
(21, 'Axis Mutual Fund', 'Active', '2022-01-21 12:29:54'),
(22, 'Axis Securities', 'Active', '2022-01-22 12:30:02'),
(23, 'BALIC', 'Active', '2022-01-22 12:30:09'),
(24, 'CEAT', 'Active', '2022-01-21 12:30:15'),
(25, 'Central Bank of India', 'Active', '2022-01-23 12:30:23'),
(26, 'DCB', 'Active', '2022-01-21 12:30:30'),
(27, 'Federal', 'Active', '2022-01-21 12:30:35'),
(28, 'ICICI Bank', 'Active', '2022-01-21 12:30:42'),
(29, 'ICICI Lombard', 'Active', '2022-01-21 12:30:49'),
(30, 'ICICI Mafatlal', 'Active', '2022-01-21 12:31:00'),
(31, 'ICICI PRU AMC', 'Active', '2022-01-21 12:31:10'),
(32, 'ICICI Prudential', 'Active', '2022-01-21 12:31:20'),
(33, 'IDBI Federal', 'Active', '2022-01-24 12:31:30'),
(34, 'IDFC AMC Ltd', 'Active', '2022-01-21 12:31:39'),
(35, 'ITI MF', 'Active', '2022-01-21 12:31:48'),
(36, 'JM Financial Service Pvt Ltd', 'Active', '2022-01-21 12:31:58'),
(37, 'Kotak Securities Ltd', 'Active', '2022-01-21 12:32:14'),
(38, 'Mahindra & Mahindra F LTD', 'Active', '2022-01-21 12:32:24'),
(39, 'MIBC', 'Active', '2022-01-21 12:32:32'),
(40, 'NSDL Payment Bank LTD', 'Active', '2022-01-21 12:32:47'),
(41, 'NSE', 'Active', '2022-01-21 12:32:56'),
(42, 'Reliance Securities Ltd', 'Active', '2022-01-21 12:33:15'),
(43, 'SBM Bank', 'Active', '2022-03-08 12:33:30'),
(44, 'Times of Money', 'Active', '2022-01-21 12:33:41'),
(45, 'UTI', 'Active', '2022-01-21 12:33:48'),
(46, 'Utkarsh Bank', 'Active', '2022-01-21 12:34:01'),
(47, 'Yes Securities', 'Active', '2022-01-21 12:34:10'),
(48, 'HDFC Bank', 'Active', '2022-01-21 12:34:17'),
(50, 'Aditya Birla', 'Active', '2022-03-03 17:40:25'),
(56, 'Demo Client 1', 'Active', '2022-03-16 12:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Business Development'),
(2, 'RMG Team'),
(5, 'Accounts'),
(6, 'APM'),
(9, 'Application Perf. Monitoring'),
(10, 'Automation Testing'),
(11, 'Development'),
(12, 'Functional'),
(13, 'IT'),
(14, 'Performance Testing'),
(15, 'Production Support'),
(16, 'Security Testing'),
(17, 'Admin'),
(18, 'Director'),
(19, 'ApMoSys Core Group'),
(20, 'VP Operations');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `srNo` int(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `mobNo` int(20) NOT NULL,
  `isAdmin` varchar(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `joindate` varchar(20) NOT NULL,
  `isHead` varchar(10) NOT NULL,
  `leave_esculationID` varchar(100) NOT NULL,
  `Manager_id` varchar(10) NOT NULL,
  `isActive` varchar(10) NOT NULL,
  `BirthDate` varchar(20) NOT NULL,
  `lastWorkingDate` varchar(20) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `isSuperUser` varchar(20) DEFAULT NULL,
  `aadhar` int(50) DEFAULT NULL,
  `familyPhNo` int(20) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `primaryAddr` varchar(50) DEFAULT NULL,
  `secondaryAddr` varchar(50) DEFAULT NULL,
  `secondaryPhNo` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`srNo`, `emp_id`, `emp_name`, `role_id`, `mailid`, `mobNo`, `isAdmin`, `dept_id`, `password`, `count`, `joindate`, `isHead`, `leave_esculationID`, `Manager_id`, `isActive`, `BirthDate`, `lastWorkingDate`, `comment`, `projectId`, `isSuperUser`, `aadhar`, `familyPhNo`, `pan`, `primaryAddr`, `secondaryAddr`, `secondaryPhNo`) VALUES
(1, 'A-1', 'ANIMESH', 1, 'animesh.soni1@apmosys.com', 2147483647, 'Y', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '1', 'A-13133', 'Y', '1993-02-10', NULL, NULL, 89, 'Y', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'A-1112', 'KETAN', 2, 'ketan1@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 4, '2020-06-30', 'N', '1', 'A-1', 'Y', '1990-07-10', NULL, '', 89, 'Y', 2147483647, 0, 'ABCED1234T', 'sdf', 'sdf', 2147483647),
(4, 'A-1114', 'MRSJAYESH', 5, 'jaysh1@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 4, '2020-06-30', 'N', '292', 'A-1115', 'Y', '1990-07-10', NULL, '6555555555555', 2, 'N', 2147483647, 0, 'ABCEF1234S', 'dfj', 'df', 0),
(5, 'A-1115', 'GANESH', 2, 'ganesh1@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2020-06-30', 'Y', '1', 'A-1112', 'Y', '1990-07-10', NULL, '', 87, 'Y', 2147483647, 101010101, 'BBCDF2132B', 'plot 5 st 15/B panjab border', 'bsp', 758758758),
(6, 'A-1116', 'VINIT', 2, 'vinit1@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2020-08-18', 'Y', '1', 'A-1113', 'Y', '1996-08-27', NULL, '', 89, 'N', 2147483647, 0, 'AASDF3456H', 'FGHF', 'FHGFG', 2147483647),
(7, 'A-1117', 'RAHUL', 1, 'barshan.palit@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2020-06-16', 'N', '1', 'A-121314', 'Y', '1989-04-05', NULL, '', 2, 'N', 2147483647, 0, 'ABXDE3453C', 'BSP', 'BHILAI', 345345),
(1279, 'A-142313', 'KETAN MAKWANA', 2, 'ket1@apmosys.com', 2147483647, 'N', 6, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2020-11-01', 'N', '1', 'A-1112', 'Y', '2020-11-01', NULL, NULL, 89, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
(1280, 'A-234', 'ANI', 2, 'animeshsoni97@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-18', 'N', '1', 'A-1115', 'Y', '2003-11-11', NULL, NULL, 89, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
(1281, 'A-232', 'ANIIII', 2, 'animeshsoni971@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-10', 'Y', '1', 'A-234', 'Y', '2003-11-11', NULL, NULL, 89, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
(1282, 'A-121314', 'SAKTIA', 2, 'subhasmita.swain@apmosys.com', 2147483647, 'N', 2, 'R+1GrZWEy8qO1eI45sUxsw==', 0, '2021-11-16', 'Y', '291', 'A-234', 'Y', '2003-11-20', NULL, '', 2, 'Y', 2147483647, 2147483647, 'CCKJL1235H', 'ASDADA', 'ASDADADAD', 2147483647),
(1286, 'A-322355', 'GHGFDD', 2, 'ghgg.das@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-09', 'N', '1', 'A-1112', 'Y', '2003-11-20', NULL, NULL, 89, 'N', 2147483647, 0, 'APGHI2343H', 'mumbai', 'mumbai', 2147483647),
(1287, 'A-151414', 'PRAJAKT', 4, 'p.j@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-18', 'N', '278', 'A-1114', 'Y', '2003-11-17', NULL, '', 89, 'N', 2147483647, 0, 'ABCDK1234L', 'nerul', 'Vashi', 1234567891),
(1288, 'A-9999', 'ASD', 5, 'barshan.palillllt@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-07', 'N', '317', 'A-989790', 'Y', '2004-02-09', NULL, 'sdfc', 2, 'N', 2147483647, 0, 'GFHHJ6785H', 'mumbai', 'mumbai', 2147483647),
(1289, 'A-1514', 'DFFEFEF', 2, 'sakti.dasss@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-17', 'N', '1', 'A-121314', 'Y', '2003-11-04', NULL, 'gfbbjbn', 89, 'N', 2147483647, NULL, '7ygy', NULL, NULL, NULL),
(1290, 'A-213', 'NEW', 2, 'anime7@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-24', 'N', '1', 'A-121314', 'Y', '2003-11-05', NULL, 'comm', 2, 'N', 2147483647, 0, 'pasDn', 'pri addr', 'sec addr', 2147483647),
(1291, 'A-5334', 'NEW', 2, 'saktiiiii.dassssss@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-01', 'N', '1', 'A-151414', 'Y', '1993-12-15', NULL, 'jxusvtxycv', 2, 'N', 2147483647, 0, 'ABCDE1234E', 'hcsxyascvucvs', 'vcdscv', 0),
(1292, 'A-5456', 'ANIIIIIIIMESH', 2, 'aniii.mesh@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-19', 'N', '1', 'A-322355', 'Y', '1998-12-23', NULL, 'OKOKOK', 89, 'N', 2147483647, 0, 'ABCDE1243H', 'BBSR', 'fcdxcgf', 2147483647),
(1293, 'A-4343', 'EMP', 2, 'emp.das@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-11-02', 'Y', '255', 'A-121314', 'Y', '1998-12-15', NULL, 'ftytfuyf', 1, 'N', 2147483647, 0, 'AAAAA1234F', ' bhkvvyhvhv', 'vftcytff', 2147483647),
(1299, 'A-99999', 'ASDS', 1, 'anime@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'N', '255', 'A-11100', 'Y', '2004-01-12', NULL, '', 1, 'N', 2147483647, 0, 'ABCDE1234G', 'sdfcd', 'sds', 2147483647),
(1303, 'A-13133', 'KAUSHIK', 8, 'kaushik.todarmal@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'N', '1', 'A-11112', 'Y', '2004-01-19', NULL, '', 2, 'N', 2147483647, 0, 'CCJKJ4444D', 'qsqwdqdqd', 'nerul', 2147483647),
(1304, 'A-181910', 'SAKTITEST', 3, 'sakti.testttt@apmosys.com', 2147483647, 'N', 4, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-10', 'N', '273', 'A-121314', 'Y', '2004-01-14', NULL, 'ffgssergserg', NULL, 'N', 2147483647, 0, 'ABCDE1234F', 'gsgsegsaeg', 'segesgeag', 2147483647),
(1305, 'A-171815', 'raman', 2, 'sakti.tesn@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-10-21', 'N', '279', 'A-121314', 'Y', '1997-08-14', NULL, '', 89, 'N', 2147483647, 0, 'ABCDE1234F', 'iucfiu', 'hjbdhbd', 2147483647),
(1306, 'A-171619', 'raghav', 3, 't.saktii@apmosys.com', 2147483647, 'N', 4, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-10-21', 'N', '273', 'A-98100001', 'Y', '1997-01-14', NULL, '', 89, 'N', 2147483647, 0, 'ACHST1234F', 'jhjfj', 'vmhm', 2147483647),
(1307, 'A-817651', 'TESING', 2, 'saktiii.tng@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-10-19', 'N', '279', 'A-98100001', 'Y', '1995-01-25', NULL, '', 2, 'N', 2147483647, 0, 'ABCKT1234G', 'rwgrwegwg', 'rwgrwgwg', 2147483647),
(1308, 'A-187116', 'SAKTIANII', 2, 'anii.saktiii@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-16', 'N', '279', 'A-131415', 'Y', '2000-01-11', NULL, '', 2, 'N', 2147483647, 0, 'ABCKR1234H', 'sgbssr', 'srgsrgserg', 2147483647),
(1310, 'A-161514', 'SAKTITESTING', 4, 'sakti.testinggggg@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-10-13', 'N', '278', 'A-121314', 'Y', '1997-02-18', NULL, '', 2, 'N', 2147483647, 0, 'ABCDH1234F', 'thrh', 'rsghrsgrs', 2147483647),
(1311, 'A-17615', 'NEWTESTING', 4, 'new.testing@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-22', 'N', '278', 'A-121314', 'Y', '2001-02-13', NULL, '', 87, 'N', 2147483647, 0, 'ABCKD1234H', 'yrjryjry', 'rtjtrj', 2147483647),
(1312, 'A-817652', 'TEJASHREE', 1, 'tejashree.solse@apmosys.com', 2147483647, 'Y', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 1, '2022-02-04', 'N', '255', 'A-234', 'Y', '2004-02-04', NULL, 'NA', 89, 'Y', 2147483647, 0, 'EERPS3423A', 'Dombivli', 'Mumbai', 2147483647),
(1313, 'A-817653', 'TEJU', 4, 'teju@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-05-28', 'N', '286', 'A-234', 'Y', '1993-02-22', NULL, NULL, 89, 'N', 2147483647, 0, 'EERPS3423A', 'Mumbai', 'Mumbai', 2147483647),
(1315, 'A-171615', 'rab', 1, 'final.tes@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-15', 'N', '1', 'A-1114', 'Y', '1997-02-12', NULL, '', 89, 'N', 2147483647, 0, 'ABCKR1234G', 'dvdev', 'vsdvaev', 2147483647),
(1316, 'A-989790', 'RUPALI', 1, 'rupali.maharanya@apmosys.com', 2147483647, 'Y', 1, 'R+1GrZWEy8qO1eI45sUxsw==', 1, '2021-12-23', 'Y', '1', 'A-121314', 'Y', '1998-02-25', NULL, '', 89, 'Y', 2147483647, 0, 'ABCGH1234H', 'dzvgdbg', 'zdgbdb', 2147483647),
(1317, 'A-989891', 'ABCC', 4, 'abc.d@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-02-25', 'Y', '278', 'A-1113', 'Y', '2004-02-03', NULL, NULL, 2, 'N', 2147483647, 0, 'AFGBH5674E', 'dsfhgd', 'dhghd', 2147483647),
(1318, 'A-989892', 'AAAD', 4, 'asg.h@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-02-02', 'Y', '286', 'A-1113', 'Y', '2004-02-03', NULL, 'gh', 87, 'N', 2147483647, 0, 'SSGHH6785D', 'hggh', 'hgdh', 2147483647),
(1319, 'A-989894', 'ABCDEF', 4, 'abcdef.abcdef@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-03', 'N', '278', 'A-1113', 'Y', '2004-02-03', NULL, 'hii', 2, 'N', 2147483647, 0, 'ABCDE3456Z', 'mumbai', 'mumbai', 2147483647),
(1320, 'A-9595', 'VARSHA', 4, 'varsha.dash@apmosys.com', 2147483647, 'Y', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'Y', '292', 'A-21', 'Y', '2000-06-17', NULL, 'HEYYYY', NULL, 'Y', 2147483647, 0, 'ABSDE2345C', 'Ghansoli', 'Odisha', 2147483647),
(1321, 'A-989895', 'VARSHA', 1, 'varsha@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2020-02-05', 'N', '1', 'A-989790', 'Y', '2000-02-02', NULL, '', NULL, 'N', 2147483647, 0, 'EUYPD6928J', 'Mumbai', 'Mumbai', 2147483647),
(1324, 'A-2345', 'ELLA', 10, 'ella.elaa@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '304', 'A-989891', 'Y', '2004-02-01', NULL, 'hiiiiiiiii', 1, 'N', 2147483647, 0, 'APGHS3456D', '12333', '@ryyyyy12345678', 1234567898),
(1325, 'A-989896', 'FG', 10, 'adhjhjr.dh@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '304', 'A-234', 'Y', '2002-02-15', NULL, 'ds', 2, 'N', 2147483647, 2331, 'guyyy6785f', 'ewe', 'ds', 1234567890),
(1326, 'A-989897', 'SUBHASHREE', 10, 'ajaya.sinha@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'Y', '304', 'A-234', 'Y', '2004-02-04', NULL, 'ok', 2, 'N', 2147483647, 0, 'dhgfg5678e', 'ghansoli', 'ghansoli', 2147483647),
(1327, 'A-989898', 'RAJ', 2, 'raj.das@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '291', 'A-234', 'N', '2004-02-03', '2022-02-10', 'ok', 89, 'N', 2147483647, 0, 'ASDFD8907J', 'ghansoli', 'ghansoli', 2147483647),
(1329, 'A-989900', 'SUBHASIS', 1, 'subhasis.s@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-02', 'N', '1', 'A-234', 'Y', '2004-02-06', NULL, 'ok', 87, 'N', 2147483647, 0, 'EGDTS3456G', 'Mumbai', 'Mumbai', 2147483647),
(1330, 'A-989810', 'TEJASHREE', 1, 'tej@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '1', 'A-171615', 'Y', '1990-02-08', NULL, '', 89, 'N', 2147483647, 0, 'EERPS3423A', 'Mumbai', 'Mumbai', 2147483647),
(1331, 'A-9899995', 'VARSHA', 10, 'varsha.bijayani@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'N', '304', 'A-9595', 'Y', '2000-06-17', NULL, 'good', 89, 'N', 2147483647, 0, 'hhghjfghdfgdf', 'odisha', 'cuttack', 2147483647),
(1333, 'A-9899997', 'TEJASHREE', 1, 'plb@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '1', 'A-171615', 'Y', '1998-02-04', NULL, '', 1, 'N', 2147483647, 0, 'EERPS3423A', 'Mumbai', 'Mumbai', 2147483647),
(1334, 'A-171599', 'MANISH', 2, 'manish.gg@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-21', 'N', '291', 'A-121314', 'Y', '1997-02-12', NULL, '', 87, 'N', 2147483647, 0, 'ABCKD1234R', 'nyny', 'hrtdhrth', 2147483647),
(1335, 'A-9899998', 'ASUTOSH', 10, 'asutosh.das@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-09', 'N', '304', 'A-9595', 'Y', '2004-02-03', NULL, 'Good', 89, 'N', 1234566, 0, 'EYUIO', 'cedcfde', 'dfdfe', 0),
(1336, 'A-82762', 'ANIIMANISH', 4, 'manish.anii@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-15', 'Y', '286', 'A-13133', 'Y', '1998-02-19', NULL, '', 87, 'N', 2147483647, 0, 'Abchd1234H', 'dthndtht', 'hrhrh', 2147483647),
(1337, 'A-9899999', 'AJAY', 11, 'ajay.das@apmosys.com', 2147483647, 'N', 5, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-04', 'Y', '305', 'A-13133', 'Y', '2004-02-07', NULL, 'na', 87, 'N', 2147483647, 0, 'ASFDG7865J', 'Mumbai', 'Mumbai', 2147483647),
(1338, 'A-986789', 'APS', 10, 'v.das@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-02', 'Y', '304', 'A-9595', 'Y', '2004-02-03', NULL, 'good', 89, 'N', 2147483647, 0, 'efgrtgrgytrhy', 'grrgt4rtgr5', 'dfdfsdgs', 2147483647),
(1339, 'A-9899910', 'TEJASHREE', 1, 'qpn@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '1', 'A-989896', 'Y', '1993-02-10', NULL, '', 2, 'N', 2147483647, 0, 'EERPS3423A', 'Mumbai', 'Mumbai', 2147483647),
(1340, 'A-18177', 'SAKTIMANISH', 4, 'manish.sakti@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-12', 'N', '286', 'A-121314', 'Y', '1997-02-12', NULL, '', 87, 'N', 2147483647, 0, 'ANCHF1234G', 'dtrdhn', 'rtfbdrt', 2147483647),
(1341, 'A-9899989', 'Adisha', 10, 'adyash.a@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-08', 'Y', '304', 'A-9595', 'Y', '2004-02-09', NULL, 'good', 89, 'N', 123456789, 0, 'fdrt1234', 'hjhfjfhh', 'fdfdtyrejyr', 2147483647),
(1347, 'A-65679', 'manoj mishra', 4, 'manoj.testing@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-13', 'N', '286', 'A-171615', 'Y', '1994-02-16', NULL, '', 87, 'N', 2147483647, 0, 'ACGFD1234G', 'fbhsfrtb', 'dbfthbd', 2147483647),
(1350, 'A-21', 'ANI SONI', 10, 'animesh@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-08', 'Y', '304', 'A-2345', 'Y', '2004-02-10', NULL, '', 87, 'N', 2147483647, 0, 'ABCDE1234F', 'dsfsdfsd', 'dsfsd', 0),
(1351, 'A-9810000', 'FG', 4, 'fg.fg@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-08', 'Y', '286', 'A-9899998', 'Y', '2004-02-02', NULL, '', 87, 'N', 2345678, 0, 'dfghj4567g', 'gh', 'hjfgh', 0),
(1352, 'A-98100000', 'SURESH', 2, 'hjjkkjk@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-08', 'Y', '291', 'A-82762', 'Y', '2004-02-09', NULL, '', 87, 'N', 1234321, 123333, 'djksldksmkld', 'ghj', '123edds12', 0),
(1355, 'A-98100003', 'DASH VARSHA', 10, 'das.varsha@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-11', 'N', '304', 'A-9595', 'Y', '2004-02-11', NULL, 'rgrg24g42g', 89, 'N', 0, 0, 'grgrg4rgt24t4t4', 'frfgrgrgft4', '4rf4rfgt4tf4t', 0),
(1356, 'A-98100007', 'ANKITA', 8, 'ankita.sahu@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-11', 'Y', '1', 'A-121314', 'Y', '2002-02-04', NULL, 'heq', 88, 'N', 0, 0, 'avvvvvvvvvvvvvv', 'mumbai', 'mumbai', 0),
(1357, 'A-98100008', 'BARSHAN', 10, 'abc@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-04', 'Y', '304', 'A-9595', 'Y', '2004-02-05', NULL, 'NA', 87, 'N', 2147483647, 0, 'ASDFG6789O', 'zxcvb', 'zaqwedsc', 2147483647),
(1358, 'A-817171', 'CSFFZSDHG', 2, 'saktiiiiii.swarup@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-18', 'N', '291', 'A-99999', 'Y', '1990-02-28', NULL, 'zrshbdtrh', 89, 'N', 2147483647, 0, 'rdxfyyz7,4m 74z57674', 'bfdbdb', 'gsegegeg', 0),
(1359, 'A-981000009', 'MANISH', 4, 'manish.saha@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-02', 'N', '298', 'A-1', 'Y', '1995-02-14', NULL, '', 90, 'N', 2147483647, 0, 'AASDF5466H', 'auroli', 'auroli', 2147483647),
(1360, 'A-981000010', 'RONALIKA BHOL', 2, 'ronalika.bhol@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '291', 'A-1', 'Y', '1999-02-07', NULL, '', 87, 'N', 2147483647, 0, 'ASDFG2345H', 'Cuttack,Odisha', 'Cuttack,Odisha', 2147483647),
(1361, 'A-981000011', 'ADYASHA', 18, 'a.das@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'N', '286', 'A-9595', 'Y', '2000-06-17', NULL, 'good', 87, 'N', 2147483647, 0, 'AIPPR7750M', 'odisha', 'bhubneswar', 2147483647),
(1362, 'A-981000012', 'ADYASHA', 19, 'a.sahoo@apmosys.in', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-05', 'Y', '286', 'A-817653', 'Y', '2000-06-17', NULL, 'good', 87, 'N', 2147483647, 0, 'EUYPD6928J', 'odisha', 'bhubneswar', 2147483647),
(1363, 'A-981000013', 'NTR', 1, 'ntr.ntr@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-14', 'N', '309', 'A-98100007', 'Y', '2001-02-14', NULL, 'heyyy', 87, 'N', 2147483647, 0, 'ABCDE1234F', 'Mumbai', 'Mumbai', 1234567898),
(1366, 'A-828727', 'Sabji', 19, 'abc.bcd@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-19', 'N', '286', 'A-9899998', 'Y', '1998-02-24', NULL, '', 89, 'N', 2147483647, 0, 'ABCJR1234H', 'srgbsrgbsre', 'rsghrfgrs', 2147483647),
(1367, 'A-71616', 'JAVA', 19, 'haha.gha@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-27', 'N', '286', 'A-986789', 'Y', '1998-02-11', NULL, '', 89, 'N', 2147483647, 0, 'ABCHD1234H', 'bgrfbgvsrbg', 'srgsrgs', 2147483647),
(1368, 'A-726722', 'RAGHU', 19, 'raghu.abc@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-27', 'Y', '286', 'A-9899998', 'Y', '1998-02-19', NULL, '', 90, 'N', 2147483647, 0, 'ABCHF1234H', 'grsgsrgr', 'grgrg', 2147483647),
(1369, 'A-767672', 'RAMA', 19, 'rama.ggg@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-02-10', 'N', '286', 'A-98100008', 'Y', '1997-02-19', NULL, '', 90, 'N', 2147483647, 0, 'ABCHT1234G', 'sgfrsfger', 'gfwrefger', 2147483647),
(1370, 'A-82726', 'SAISWARUP', 19, 'sai.swarup@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-20', 'N', '286', 'A-9899998', 'Y', '1998-02-18', NULL, '', 92, 'N', 2147483647, 0, 'ABCHG1234G', 'dgdsfgdsf', 'sggs', 2147483647),
(1372, 'A-6756', 'JAGA', 19, 'jaga.das@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-20', 'N', '286', 'A-1514', 'Y', '1999-02-24', NULL, '', 87, 'N', 2147483647, 0, 'ABVGF1234F', 'fcgdfgv', 'vcgfhf', 2147483647),
(1373, 'A-981000014', 'RANA', 21, 'rana.das@apmosys.com', 2147483647, 'N', 5, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-14', 'N', '312', 'A-98100007', 'Y', '2001-02-19', NULL, '', 88, 'N', 2147483647, 0, 'FGHJK6789F', 'gf', 'fgh', 2147483647),
(1374, 'A-981000015', 'ADFG', 22, 'shj.s@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'Y', '313', 'A-9899998', 'Y', '2004-02-02', NULL, '', 87, 'N', 2147483647, 0, 'ASDFG2345S', 'ghjk', 'ghjk', 2147483647),
(1375, 'A-981000016', 'RUDRA A', 23, 'rudra.a@apmosys.com', 2147483647, 'N', 6, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '314', 'A-98100007', 'Y', '2004-02-16', NULL, 'ok', 87, 'N', 2147483647, 0, 'ASDFG5678G', 'Rajnagar', 'Rajnagar', 2147483647),
(1376, 'A-981000017', 'RANJIT', 19, 'ranjit.s@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '286', 'A-1', 'Y', '1998-02-19', NULL, '', 92, 'N', 2147483647, 0, 'ASDFH4534K', 'Cuttack', 'Cuttack', 2147483647),
(1377, 'A-187165', 'New rama', 19, 'rama.new@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-23', 'N', '286', 'A-1', 'Y', '1997-02-12', NULL, '', NULL, 'N', 2147483647, 0, 'ABCDE1234G', 'fbdfbd', 'fdbdnd', 2147483647),
(1379, 'A-981000018', 'BABU', 23, 'babu.m@apmosys.com', 2147483647, 'N', 5, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-09', 'Y', '314', 'A-9899999', 'Y', '2004-02-04', NULL, 'NA', 87, 'N', 1234567890, 0, 'ABCDE45678H', 'adsfwf', 'acsfgdced', 2147483647),
(1380, 'A-72625', 'DEMOTESTING', 2, 'demo.testing@apmosys.com', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-01-07', 'N', '291', 'A-986789', 'Y', '1997-02-18', NULL, '', 100, 'N', 0, 0, 'fnfnfnhrfhnrfnj', 'fhrfhrs', 'rhrshrsh', 0),
(1381, 'A-82722', 'DEMOTATAA', 1, 'demo.tata@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2021-12-15', 'N', '1', 'A-1', 'Y', '1995-02-22', NULL, '', 100, 'N', 0, 0, 'rhrhrh', 'fjfcgjfj', 'fjfjfj', 0),
(1382, 'A-981000020', 'GHJ', 15, 'ghj@apmosys.com', 2147483647, 'N', 4, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-16', 'N', '289', 'A-98100007', 'Y', '2004-02-03', NULL, '', 87, 'N', 2147483647, 0, 'ASDFJ7896H', 'hjk', 'hjk', 2147483647),
(1383, 'A-981000019', 'SUNNY', 26, 'sunny.p@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-11', 'N', '286', 'A-1116', 'N', '1980-10-11', '2022-02-22', 'ok', 87, 'N', 2147483647, 0, 'BGZPP8071N', 'LB Nagar', 'R R ', 2147483647),
(1384, 'A-981000021', 'PADAMA', 27, 'padma@apmosys.com', 2147483647, 'N', 7, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-09', 'Y', '318', 'A-9595', 'Y', '1999-02-11', NULL, '', 87, 'N', 2147483647, 0, 'BGZPP8071N', 'LB nagar', 'Hyderabad', 2147483647),
(1385, 'A-981000022', 'SUKH', 19, 'sukh@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-01', 'N', '286', 'A-9999', 'Y', '2004-02-04', NULL, 'hiii', 87, 'N', 2147483647, 0, 'ADFGS1234C', 'mumbai', 'mumbai', 2147483647),
(1386, 'A-981000023', 'RITHU', 19, 'rithu@apmosys.com', 2147483647, 'N', 3, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-11', 'Y', '286', 'A-1116', 'Y', '1988-10-11', NULL, NULL, 89, 'N', 2147483647, 0, 'BGZPP8071N', 'Panama', 'Suryapet', 2147483647),
(1387, 'A-981000024', 'HUKMIKA', 29, 'jkk@apmosys.com', 2147483647, 'N', 5, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-14', 'N', '320', 'A-82762', 'Y', '1994-02-23', NULL, '', 88, 'N', 2147483647, 0, 'HJKLI9087H', 'jjk', 'jkkk', 2147483647),
(1389, 'A-981000025', 'ARUN', 30, 'arun@apmosys.in', 2147483647, 'N', 6, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-23', 'Y', '327', 'A-98100002', 'Y', '2004-02-02', NULL, '', 89, 'N', 2147483647, 11, 'BGZPP8071N', 'Hyderabad', '5-30 panama', 2147483647),
(1390, 'A-981000026', 'SWATHI', 30, 'swathi@apmosys.in', 2147483647, 'N', 6, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-23', 'N', '327', 'A-98100002', 'Y', '2004-02-11', NULL, NULL, 87, 'N', 2147483647, 0, 'BGZPP8071N', 'nlg', 'hyd', 2147483647),
(1391, 'A-981000027', 'USHA', 30, 'usha@apmosys.com', 2147483647, 'N', 6, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-23', 'N', '327', 'A-98100002', 'Y', '2004-02-23', NULL, '', 96, 'N', 2147483647, 0, 'BGZLL8071X', 'srpt', 'hyd', 2147483647),
(1393, 'A-981000028', 'VICKY', 2, 'vicky@apmosys.in', 2147483647, 'N', 2, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-24', 'N', '291', 'A-98100002', 'Y', '2004-02-25', NULL, '', 89, 'N', 2147483647, 0, 'BGZPP6210N', 'NLG', 'Srpt', 2147483647),
(1394, 'A-98100029', 'AISHU', 1, 'aishu@apmosys.com', 2147483647, 'N', 1, 'uPpX/Q2u+ZdbWLbgSxob3g==', 0, '2022-02-25', 'N', '1', 'A-98100002', 'Y', '2004-02-25', NULL, '', 92, 'N', 2147483647, 0, 'BGZPP8071M', 'HYD', 'SRPT', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `id` int(20) NOT NULL,
  `department_id` int(50) NOT NULL,
  `department_head` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`id`, `department_id`, `department_head`) VALUES
(1, 5, 'ANAND KISHORE'),
(2, 6, 'Vicky Sanjay Patil'),
(3, 6, 'Ashish Mahapatro'),
(4, 6, 'Sachin Ramesh Wagh'),
(5, 6, 'Omkar Shekhar Kadam'),
(6, 19, 'Sreekanta Kumar Satapathy'),
(7, 19, 'PRABHAT KUMAR PADHY'),
(8, 19, 'BANSI KRISHNA PRASAD'),
(9, 9, 'Pawan Sudhakar Chaudhari'),
(11, 10, 'Dillip Kumar Swain'),
(12, 10, 'Sumanjay Kumar Deo_old'),
(13, 10, 'Amar Kumar Panda'),
(14, 10, 'Sumanjay Kumar Deo'),
(15, 11, 'Aditya Farde'),
(16, 11, 'Ganesh Mishra'),
(17, 11, 'ANIMESH SONI'),
(18, 18, 'Sangeeta Padhy'),
(19, 12, 'Ashly  Pl'),
(20, 12, 'Suchitra Mishra'),
(21, 12, 'Lipina Padhy'),
(22, 12, 'Vishvprakash Medge'),
(23, 12, 'Nilambari Mahendra Sonawane'),
(24, 12, 'Pratikshya Routray'),
(25, 12, 'Malaya Ranjan Dalai'),
(26, 12, 'Khushboo Kumari'),
(27, 0, 'Gajanan Tukaram Shelke'),
(28, 0, 'Neha Shivaji Dorugade'),
(29, 0, 'SNEHA RAJU BHAPKAR'),
(30, 0, 'PAWAN MURLIDHAR POPTANI'),
(31, 0, 'ANANTNAG DAULATRAO KATKAR'),
(32, 0, 'Lituja Mishra'),
(33, 0, 'Manvi Singh'),
(34, 0, 'Mohammed Shahjahan'),
(35, 0, 'Tapan Kumar Panda'),
(36, 0, 'Sanjeeb Kumar Mohanta'),
(37, 0, 'Ashish Mahadev Ingale'),
(38, 0, 'Kalpesh Vinod Raut'),
(39, 0, 'RAKESH RANA');

-- --------------------------------------------------------

--
-- Table structure for table `milestone_tablefc`
--

CREATE TABLE `milestone_tablefc` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `milestone_no` float NOT NULL,
  `milestone_name` varchar(15) NOT NULL,
  `m_percent` int(5) NOT NULL,
  `m_description` text NOT NULL,
  `m_startdate` date NOT NULL,
  `m_enddate` date NOT NULL,
  `milestone_comments` varchar(20) NOT NULL,
  `billable` varchar(20) NOT NULL,
  `po_value` float NOT NULL,
  `m_status` varchar(15) NOT NULL,
  `tax_percentage` float NOT NULL,
  `tax_amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestone_tablefc`
--

INSERT INTO `milestone_tablefc` (`id`, `po_id`, `milestone_no`, `milestone_name`, `m_percent`, `m_description`, `m_startdate`, `m_enddate`, `milestone_comments`, `billable`, `po_value`, `m_status`, `tax_percentage`, `tax_amount`, `invoice`) VALUES
(219, 126, 1, 'Yes', 50, 'demo', '2022-05-18', '2022-05-26', 'erf', '1000', 4000, '', 0, 0, 'fe'),
(220, 126, 2, 'DEmo', 50, 'demo', '2022-05-17', '2022-05-26', 'demo', '5000', 10000, '', 0, 0, 'ref'),
(224, 124, 101, 'A1', 5, 'TEST', '2022-04-01', '2022-04-30', 'T1', '1000', 2000, '', 0, 0, 'Y'),
(225, 124, 102, 'b2', 6, 'dfds', '2022-05-31', '2022-05-31', 'dsd', '2000', 3000, '', 0, 0, 'dsd'),
(226, 124, 103, 'dfs', 10, 'ewrewr', '2022-05-31', '2022-05-30', 'fdfrrrr', '5000', 6000, '', 0, 0, 'rerer');

-- --------------------------------------------------------

--
-- Table structure for table `po_list`
--

CREATE TABLE `po_list` (
  `id` int(30) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `rm_apmosys` varchar(50) NOT NULL,
  `milestone_name` varchar(50) DEFAULT NULL,
  `m_description` text DEFAULT NULL,
  `m_percent` int(5) DEFAULT NULL,
  `m_startdate` varchar(15) DEFAULT NULL,
  `m_enddate` varchar(15) DEFAULT NULL,
  `m_status` varchar(15) DEFAULT NULL,
  `project_type` varchar(10) DEFAULT NULL,
  `milestone_no` float DEFAULT NULL,
  `po_value` float DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `businesshead_comments` text DEFAULT NULL,
  `accountshead_comments` text DEFAULT NULL,
  `accountsteam_comments` text DEFAULT NULL,
  `director_comments` text DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL COMMENT '0=Active,1=Expired,2=Pending,3=Denied',
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `startdate` varchar(50) DEFAULT NULL,
  `enddate` varchar(50) DEFAULT NULL,
  `businesshead_name` varchar(50) DEFAULT NULL,
  `accountshead_name` varchar(50) DEFAULT NULL,
  `bhead_approval` varchar(15) DEFAULT NULL,
  `ahead_approval` varchar(15) DEFAULT NULL,
  `invoice` varchar(20) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `businessteam_comments` text DEFAULT NULL,
  `milestone_comments` varchar(20) DEFAULT NULL,
  `billable` varchar(20) DEFAULT NULL,
  `consumed` float DEFAULT NULL,
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_list`
--

INSERT INTO `po_list` (`id`, `po_no`, `client_id`, `project_name`, `rm_apmosys`, `milestone_name`, `m_description`, `m_percent`, `m_startdate`, `m_enddate`, `m_status`, `project_type`, `milestone_no`, `po_value`, `tax_percentage`, `tax_amount`, `businesshead_comments`, `accountshead_comments`, `accountsteam_comments`, `director_comments`, `status`, `date_created`, `date_updated`, `startdate`, `enddate`, `businesshead_name`, `accountshead_name`, `bhead_approval`, `ahead_approval`, `invoice`, `payment`, `businessteam_comments`, `milestone_comments`, `billable`, `consumed`, `balance`) VALUES
(124, 'TEMP-33328425794', 'Axis Finance', 'Axis Dem1', 'VINIT', 'advance', 'stage', 50, '2022-03-02', '2022-03-09', NULL, 'FC', 1, 15000, 18, 720, '', '', '', '', 'Active', '2022-03-29 17:02:52', '2022-05-02 12:18:20', '2022-03-22', '2022-05-19', 'Bansi', 'Anand', 'Approved', 'Approved', 'Yes', 'Done', 'Demo', 'done', '5000', 7000, 10000),
(125, 'TEMP-27049614299', 'BALIC', 'Start', 'GANESH', 'Stage 1', 'Demo', 20, '2022-04-02', '2022-04-30', NULL, 'FC', 1, 10000, 18, 1800, 'demo', 'demo', 'demo', 'demo', 'Active', '2022-03-29 20:16:13', '2022-04-19 01:38:42', '2022-03-01', '2022-04-02', 'Ashish', 'Niraj', 'Approved', 'Approved', 'Yes', 'Done', 'demo', 'demo', '5000', 5000, 5000),
(127, 'TEMP-75694306456', 'Axis Finance', 'Axis Dem1', 'VINIT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'Active', '2022-05-01 19:47:32', NULL, '2022-03-22', '', 'Bansi', 'Anand', 'Approved', 'Approved', 'Yes', 'Done', 'Demo', NULL, NULL, NULL, NULL);

--
-- Triggers `po_list`
--
DELIMITER $$
CREATE TRIGGER `delete_fc_po_list` BEFORE DELETE ON `po_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,OLD.id,'FC PO',"DELETE",OLD.po_no,'FC PO LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_fc_po_list` AFTER INSERT ON `po_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,'FC PO',"INSERT",NEW.po_no,'FC PO LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_fc_po_list` AFTER UPDATE ON `po_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,'FC PO',"UPDATE",NEW.PO_no,'FC PO LIST',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rm_client` text NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `pstatus` varchar(25) DEFAULT NULL,
  `rmg_verified` varchar(25) DEFAULT NULL,
  `dept_verified` varchar(25) DEFAULT NULL,
  `pdate_created` datetime DEFAULT current_timestamp(),
  `pstartdate` varchar(50) DEFAULT NULL,
  `penddate` varchar(50) DEFAULT NULL,
  `rmclient_contact` double DEFAULT NULL,
  `rmclient_email` varchar(50) DEFAULT NULL,
  `rmclient_location` varchar(50) DEFAULT NULL,
  `department_head` varchar(50) DEFAULT NULL,
  `bill` varchar(25) DEFAULT NULL,
  `businesshead_comment` text DEFAULT NULL,
  `businessteam_comment` text DEFAULT NULL,
  `rmgteam_comment` text DEFAULT NULL,
  `otteam_comment` text DEFAULT NULL,
  `director_comment` text DEFAULT NULL,
  `resourcecount` varchar(100) DEFAULT NULL,
  `resourcename` varchar(100) DEFAULT NULL,
  `m_otstatus` varchar(30) DEFAULT NULL,
  `m_comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `project_list`
--
DELIMITER $$
CREATE TRIGGER `delete_fc_project_list` BEFORE DELETE ON `project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,OLD.id,OLD.name,"DELETE",OLD.department,'FC PROJECT LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_fc_project_list` AFTER INSERT ON `project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,NEW.name,"INSERT",NEW.department,'FC PROJECT DETAILS',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_fc_project_list` AFTER UPDATE ON `project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,NEW.name,"UPDATE",NEW.department,'FC PROJECT LIST',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `resource_table`
--

CREATE TABLE `resource_table` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `resource_count` varchar(11) NOT NULL,
  `resource_level` varchar(25) NOT NULL,
  `resource_name` varchar(50) NOT NULL,
  `r_startdate` date NOT NULL,
  `r_enddate` date NOT NULL,
  `monthly_billing` float NOT NULL,
  `per_resourcecount` float NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_raised` float NOT NULL,
  `balance` float NOT NULL,
  `billing_cycle` varchar(11) NOT NULL,
  `duration` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_table`
--

INSERT INTO `resource_table` (`id`, `po_id`, `resource_count`, `resource_level`, `resource_name`, `r_startdate`, `r_enddate`, `monthly_billing`, `per_resourcecount`, `invoice_date`, `invoice_raised`, `balance`, `billing_cycle`, `duration`) VALUES
(21, 41, '433', 'dfsdf', 'e4r4', '2022-05-12', '2022-05-18', 343, 343, '0000-00-00', 0, 0, '', ''),
(22, 41, '343', 'raj', 'erer', '2022-05-12', '2022-05-25', 1000, 2000, '0000-00-00', 0, 0, '', ''),
(23, 41, '565', 'rer', 'ere', '2022-05-09', '2022-05-12', 445, 256, '0000-00-00', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', ' ApMoSys TECHNOLOGIES PVT LTD! - PO Portal'),
(6, 'short_name', 'ApMoSys-PO'),
(11, 'logo', 'uploads/1638852780_apmosys logo 1.jpeg'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1638852780_portal.jpg'),
(15, 'company_name', 'APMOSYS TECHNOLOGIES PVT LTD'),
(16, 'company_email', 'info@apmosys.in'),
(17, 'company_address', 'ApMoSys Technologies Pvt Ltd, B 505,506 Greenscape Technocity, Shilphata Mahape road, Next to Country Inn Hotel, Mahape,\r\n Navi Mumbai, Maharashtra - 400710.Phone: +91-22-4122 2250 /51');

-- --------------------------------------------------------

--
-- Table structure for table `tnm_po_list`
--

CREATE TABLE `tnm_po_list` (
  `id` int(30) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `rm_apmosys` varchar(50) NOT NULL,
  `resource_level` varchar(50) DEFAULT NULL,
  `resource_name` varchar(50) DEFAULT NULL,
  `r_startdate` varchar(20) DEFAULT NULL,
  `r_enddate` varchar(20) DEFAULT NULL,
  `r_status` varchar(50) DEFAULT NULL,
  `monthly_billing` float DEFAULT NULL,
  `project_type` varchar(50) DEFAULT NULL,
  `resource_count` varchar(10) DEFAULT NULL,
  `per_resourcecount` float DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `businesshead_comments` text DEFAULT NULL,
  `accountshead_comments` text DEFAULT NULL,
  `accountsteam_comments` text DEFAULT NULL,
  `director_comments` varchar(50) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `startdate` varchar(50) DEFAULT NULL,
  `enddate` varchar(50) DEFAULT NULL,
  `businesshead_name` varchar(50) DEFAULT NULL,
  `accountshead_name` varchar(50) DEFAULT NULL,
  `bhead_approval` varchar(50) DEFAULT NULL,
  `ahead_approval` varchar(50) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `businessteam_comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tnm_po_list`
--

INSERT INTO `tnm_po_list` (`id`, `po_no`, `client_id`, `project_name`, `rm_apmosys`, `resource_level`, `resource_name`, `r_startdate`, `r_enddate`, `r_status`, `monthly_billing`, `project_type`, `resource_count`, `per_resourcecount`, `tax_percentage`, `tax_amount`, `businesshead_comments`, `accountshead_comments`, `accountsteam_comments`, `director_comments`, `status`, `date_created`, `date_updated`, `startdate`, `enddate`, `businesshead_name`, `accountshead_name`, `bhead_approval`, `ahead_approval`, `invoice`, `payment`, `businessteam_comments`) VALUES
(41, 'PO-89528106326', 'BALIC', 'TNM Demo', 'GANESH', 'Developer', 'Asutosh Mahrana', '2022-04-02', '2022-04-16', NULL, 500, 'TNM', '2', 2000, 18, 467.82, 'demo', 'demo', 'demo', 'demo', 'Active', '2022-03-29 17:02:41', '2022-05-09 12:57:33', '2022-03-01', '2022-04-30', 'Sangita', 'Asutosh', 'Approved', 'Approved', 'Yes', 'Done', 'demo'),
(42, 'PO-62343118115', 'DCB', 'DCB Demo', 'KETAN', 'sr engg', 'abd', '2022-03-17', '2022-03-18', NULL, 200, 'TNM', '2', 200, 18, 36, '', '', '', '', 'Active', '2022-03-29 18:43:25', '2022-04-19 00:41:18', '2022-03-15', '2022-04-15', 'Bansi', 'Demo demo b Demo demo', 'Pending', 'Pending', 'Not Selected', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tnm_po_list_old`
--

CREATE TABLE `tnm_po_list_old` (
  `id` int(30) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `rm_apmosys` varchar(50) NOT NULL,
  `project_type` varchar(50) DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `businesshead_comments` text DEFAULT NULL,
  `accountshead_comments` text DEFAULT NULL,
  `accountsteam_comments` text DEFAULT NULL,
  `director_comments` varchar(50) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `startdate` varchar(50) DEFAULT NULL,
  `enddate` varchar(50) DEFAULT NULL,
  `businesshead_name` varchar(50) DEFAULT NULL,
  `accountshead_name` varchar(50) DEFAULT NULL,
  `bhead_approval` varchar(50) DEFAULT NULL,
  `ahead_approval` varchar(50) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `businessteam_comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tnm_po_list_old`
--

INSERT INTO `tnm_po_list_old` (`id`, `po_no`, `client_id`, `project_name`, `rm_apmosys`, `project_type`, `tax_percentage`, `tax_amount`, `businesshead_comments`, `accountshead_comments`, `accountsteam_comments`, `director_comments`, `status`, `date_created`, `date_updated`, `startdate`, `enddate`, `businesshead_name`, `accountshead_name`, `bhead_approval`, `ahead_approval`, `invoice`, `payment`, `businessteam_comments`) VALUES
(41, 'PO-89528106326', 'BALIC', 'TNM Demo', 'GANESH', 'TNM', 18, 720, 'demo', 'demo', 'demo', 'demo', 'Active', '2022-03-29 17:02:41', '2022-04-27 19:39:57', '2022-03-01', '2022-04-30', 'Sangita', 'Asutosh', 'Approved', 'Approved', 'Yes', 'Done', 'demo'),
(42, 'PO-62343118115', 'DCB', 'DCB Demo', 'KETAN', 'TNM', 18, 36, '', '', '', '', 'Active', '2022-03-29 18:43:25', '2022-04-19 00:41:18', '2022-03-15', '2022-04-15', 'Bansi', 'Demo demo b Demo demo', 'Pending', 'Pending', 'Not Selected', 'Pending', '');

--
-- Triggers `tnm_po_list_old`
--
DELIMITER $$
CREATE TRIGGER `delete_tnm_po_list` BEFORE DELETE ON `tnm_po_list_old` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,OLD.id,'TNM PO',"DELETE",OLD.po_no,'TNM PO LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tnm_po_list` AFTER INSERT ON `tnm_po_list_old` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,'TNM PO',"INSERT",NEW.po_no,'TNM PO LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tnm_po_list` AFTER UPDATE ON `tnm_po_list_old` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,'TNM PO',"UPDATE",NEW.PO_no,'TNM PO LIST',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tnm_project_list`
--

CREATE TABLE `tnm_project_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rm_client` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `tp_status` varchar(25) DEFAULT NULL,
  `bill` varchar(25) DEFAULT NULL,
  `rmg_verified` varchar(25) DEFAULT NULL,
  `dept_verified` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `tpdate_created` datetime DEFAULT current_timestamp(),
  `tpstartdate` varchar(50) DEFAULT NULL,
  `tpenddate` varchar(50) DEFAULT NULL,
  `rmclient_contact` double DEFAULT NULL,
  `rmclient_email` varchar(50) DEFAULT NULL,
  `rmclient_location` varchar(50) DEFAULT NULL,
  `teamlead` varchar(50) DEFAULT NULL,
  `department_head` varchar(50) DEFAULT NULL,
  `businesshead_comment` text DEFAULT NULL,
  `businessteam_comment` text DEFAULT NULL,
  `rmgteam_comment` text DEFAULT NULL,
  `otteam_comment` text DEFAULT NULL,
  `director_comment` text DEFAULT NULL,
  `r_comments` text DEFAULT NULL,
  `apmjoiningdate` varchar(50) DEFAULT NULL,
  `empcontact` int(10) DEFAULT NULL,
  `joiningdate` varchar(50) DEFAULT NULL,
  `r_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tnm_project_list`
--

INSERT INTO `tnm_project_list` (`id`, `name`, `rm_client`, `department`, `tp_status`, `bill`, `rmg_verified`, `dept_verified`, `tpdate_created`, `tpstartdate`, `tpenddate`, `rmclient_contact`, `rmclient_email`, `rmclient_location`, `teamlead`, `department_head`, `businesshead_comment`, `businessteam_comment`, `rmgteam_comment`, `otteam_comment`, `director_comment`, `r_comments`, `apmjoiningdate`, `empcontact`, `joiningdate`, `r_status`) VALUES
(22, '42', 'Sagar', 'Admin', 'Started', 'Billable', 'Verified', 'Verified', '2022-03-29 18:46:10', '2022-03-01', '2022-04-27', 9980123456, 'sagar12@gmail.com', 'Airoli', 'Ashutosh', 'Aditya Farde', NULL, ' demo ', 'demo ', 'demo ', 'demo ', 'sfef', NULL, NULL, NULL, 'Approved');

--
-- Triggers `tnm_project_list`
--
DELIMITER $$
CREATE TRIGGER `delete_tnm_project_list` BEFORE DELETE ON `tnm_project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,OLD.id,OLD.name,"DELETE",OLD.department,'TNM PROJECT LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tnm_project_list` AFTER INSERT ON `tnm_project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,NEW.name,"INSERT",NEW.department,'TNM PROJECT LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upadte_tnm_project_list` AFTER UPDATE ON `tnm_project_list` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,NEW.id,NEW.name,"UPDATE",NEW.department,'TNM PROJECT LIST',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `department`, `designation`, `password`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Admin', ' ', 'admin', '', 'Admin', 'D00F5D5217896FB7FD601412CB890830', NULL, '1', '2021-01-20 14:02:37', '2022-03-23 15:45:05'),
(2, 'Director', '', 'Director@apmosys.com', '', 'Director', '60888a6c3efd8d85971b4d4088e4fcb5', '2022-03-04 07:00:09', '1', '2022-03-04 11:31:34', '2022-03-04 11:32:23'),
(27, 'Tanmay', ' Padhi', 'tanmay.padhi@apmosys.com', 'Business Team', 'Business Team', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '2', '2021-12-29 17:10:30', '2022-03-02 14:00:51'),
(34, 'Asutosh', 'Maharana', 'asutosh.maharana@apmosys.com', 'Business Team', 'BT Head', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '3', '2022-03-25 02:19:05', NULL),
(35, 'Priyanka', 'Dubhalkar', 'priyanka.dubhalkar@apmosys.com', 'Accounts', 'Accounts', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '4', '2022-03-25 02:19:35', NULL),
(36, 'Anand', 'Kishore', 'anand.kishore@apmosys.com', 'Accounts', 'Accounts Head', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '5', '2022-03-25 02:20:02', NULL),
(37, 'Priya', 'Shinde', 'priya.shinde@apmosys.com', 'RMG', 'RMG Team', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '7', '2022-03-25 02:20:38', NULL),
(38, 'Vivek', 'Singh', 'vivek.singh@apmosys.com', 'Technical Head', 'Department Head', '60888a6c3efd8d85971b4d4088e4fcb5', NULL, '8', '2022-03-25 02:21:36', NULL);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `delete_log` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO user_logs VALUES(NULL,OLD.id,OLD.department,"DELETE",OLD.firstname,'USER LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_log` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO user_logs VALUES(null,NEW.id,NEW.department,'INSERTE',NEW.firstname,'USER LIST',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO user_logs VALUES(null,NEW.id,NEW.department,"UPDATE",NEW.firstname,'USER LIST',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `department`, `action`, `user_name`, `table_name`, `cdate`) VALUES
(397, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-02 17:49:33'),
(398, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-02 18:02:11'),
(399, 16, 'TNM PO', 'UPDATE', 'axis43215', 'TNM PO LIST', '2022-03-02 18:02:47'),
(400, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-02 18:10:24'),
(401, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-02 18:14:43'),
(402, 73, '80', 'INSERT', 'ApMoSys Core Group', 'FC PROJECT DETAILS', '2022-03-03 11:03:23'),
(403, 73, '80', 'DELETE', 'ApMoSys Core Group', 'FC PROJECT LIST', '2022-03-03 11:03:32'),
(404, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:33'),
(405, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:33'),
(406, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:42'),
(407, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:42'),
(408, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:57'),
(409, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:32:57'),
(410, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:34:13'),
(411, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:34:13'),
(412, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:36:19'),
(413, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:38:49'),
(414, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:40:27'),
(415, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 11:40:42'),
(416, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-03 14:48:29'),
(417, 82, 'FC PO', 'UPDATE', 'axis@1233', 'FC PO LIST', '2022-03-03 15:11:36'),
(418, 25, 'TNM PO', 'UPDATE', 'ICICI@89456', 'TNM PO LIST', '2022-03-03 15:16:17'),
(419, 80, 'FC PO', 'DELETE', 'ITI/15485', 'FC PO LIST', '2022-03-03 15:47:15'),
(420, 82, 'FC PO', 'DELETE', 'axis@1233', 'FC PO LIST', '2022-03-03 15:47:19'),
(421, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-03 15:55:26'),
(422, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 16:03:38'),
(423, 6, '13', 'UPDATE', 'Business Development', 'TNM PROJECT LIST', '2022-03-03 16:08:52'),
(424, 6, '13', 'UPDATE', 'Business Development', 'TNM PROJECT LIST', '2022-03-03 16:09:26'),
(425, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 17:09:22'),
(426, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-03 17:13:26'),
(427, 83, 'FC PO', 'INSERT', 'TEMP-26477765345', 'FC PO LIST', '2022-03-03 17:22:27'),
(428, 74, '83', 'INSERT', '', 'FC PROJECT DETAILS', '2022-03-03 17:23:34'),
(429, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-03 18:03:17'),
(430, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-03 18:04:08'),
(431, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-03 18:15:17'),
(432, 74, '83', 'DELETE', '', 'FC PROJECT LIST', '2022-03-03 18:18:24'),
(433, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-04 10:52:04'),
(434, 84, 'FC PO', 'INSERT', 'TEMP-51375893638', 'FC PO LIST', '2022-03-04 11:12:01'),
(435, 85, 'FC PO', 'INSERT', 'AxisBank/104-Apmosys Technologies/1250', 'FC PO LIST', '2022-03-04 11:14:05'),
(436, 85, 'FC PO', 'DELETE', 'AxisBank/104-Apmosys Technologies/1250', 'FC PO LIST', '2022-03-04 11:14:17'),
(437, 84, 'FC PO', 'DELETE', 'TEMP-51375893638', 'FC PO LIST', '2022-03-04 11:14:28'),
(438, 86, 'FC PO', 'INSERT', 'TEMP-79893562081', 'FC PO LIST', '2022-03-04 11:16:20'),
(439, 86, 'FC PO', 'DELETE', 'TEMP-79893562081', 'FC PO LIST', '2022-03-04 11:16:28'),
(440, 2, '', 'INSERTE', 'Director', 'USER LIST', '2022-03-04 11:31:34'),
(441, 2, '', 'UPDATE', 'Director', 'USER LIST', '2022-03-04 11:32:23'),
(442, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-04 13:17:46'),
(443, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-04 13:18:16'),
(444, 87, 'FC PO', 'INSERT', 'TEMP-00370244840', 'FC PO LIST', '2022-03-04 16:15:16'),
(445, 87, 'FC PO', 'DELETE', 'TEMP-00370244840', 'FC PO LIST', '2022-03-04 16:32:29'),
(446, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-04 20:27:26'),
(447, 16, 'TNM PO', 'UPDATE', 'axis43215', 'TNM PO LIST', '2022-03-04 20:29:42'),
(448, 25, 'TNM PO', 'UPDATE', 'ICICI@89456', 'TNM PO LIST', '2022-03-04 20:30:24'),
(449, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:13:04'),
(450, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:16:36'),
(451, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:19:10'),
(452, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:21:25'),
(453, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:22:35'),
(454, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:22:37'),
(455, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-05 11:24:30'),
(456, 88, 'FC PO', 'INSERT', 'TEMP-01763636138', 'FC PO LIST', '2022-03-05 13:21:37'),
(457, 83, 'FC PO', 'DELETE', 'TEMP-26477765345', 'FC PO LIST', '2022-03-06 22:35:51'),
(458, 88, 'FC PO', 'DELETE', 'TEMP-01763636138', 'FC PO LIST', '2022-03-06 22:51:27'),
(459, 83, 'FC PO', 'DELETE', 'TEMP-26477765345', 'FC PO LIST', '2022-03-06 22:51:31'),
(460, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-06 22:58:31'),
(461, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-06 22:58:31'),
(462, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-07 10:44:45'),
(463, 88, 'FC PO', 'INSERT', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 10:45:36'),
(464, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 10:49:14'),
(465, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 10:53:07'),
(466, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 10:58:39'),
(467, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 11:00:09'),
(468, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 11:01:42'),
(469, 89, 'FC PO', 'INSERT', 'Balic/12450434567', 'FC PO LIST', '2022-03-07 11:05:13'),
(470, 89, 'FC PO', 'DELETE', 'Balic/12450434567', 'FC PO LIST', '2022-03-07 11:07:56'),
(471, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 11:09:09'),
(472, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-07 11:10:45'),
(473, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 11:11:10'),
(474, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-07 12:02:13'),
(475, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-07 13:06:47'),
(476, 68, '66', 'UPDATE', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-07 13:21:07'),
(477, 75, '88', 'INSERT', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-07 13:22:10'),
(478, 75, '88', 'UPDATE', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-07 13:24:16'),
(479, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-07 13:35:24'),
(480, 75, '88', 'UPDATE', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-07 13:51:27'),
(481, 68, '66', 'UPDATE', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-07 13:54:09'),
(482, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-10 15:04:47'),
(483, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-11 11:31:13'),
(484, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-11 13:20:12'),
(485, 89, 'FC PO', 'INSERT', 'TEMP-71472602119', 'FC PO LIST', '2022-03-11 14:40:01'),
(486, 75, '89', 'INSERT', 'Production Support', 'FC PROJECT DETAILS', '2022-03-11 14:41:33'),
(487, 89, 'FC PO', 'UPDATE', 'TEMP-71472602119', 'FC PO LIST', '2022-03-11 14:42:31'),
(488, 75, '89', 'UPDATE', 'Production Support', 'FC PROJECT LIST', '2022-03-11 14:43:48'),
(489, 89, 'FC PO', 'UPDATE', 'TEMP-71472602119', 'FC PO LIST', '2022-03-11 14:48:23'),
(490, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-14 10:32:35'),
(491, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-14 10:48:32'),
(492, 75, '88', 'DELETE', 'Accounts', 'POC PROJECT DETAILS', '2022-03-14 11:37:39'),
(493, 70, '70', 'DELETE', 'Security Testing', 'POC PROJECT DETAILS', '2022-03-14 11:38:09'),
(494, 69, '71', 'DELETE', 'Development', 'POC PROJECT DETAILS', '2022-03-14 11:39:18'),
(495, 83, 'FC PO', 'DELETE', 'TEMP-26477765345', 'POC PO LIST', '2022-03-14 11:44:24'),
(496, 70, 'FC PO', 'DELETE', 'Balic/124504', 'FC PO LIST', '2022-03-14 12:00:35'),
(497, 25, 'TNM PO', 'DELETE', 'ICICI@89456', 'TNM PO LIST', '2022-03-14 12:02:48'),
(498, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-14 12:12:04'),
(499, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-14 12:12:14'),
(500, 70, 'FC PO', 'UPDATE', 'Balic/124504', 'FC PO LIST', '2022-03-14 12:15:06'),
(501, 88, 'FC PO', 'UPDATE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-14 12:15:25'),
(502, 88, 'FC PO', 'DELETE', 'TEMP-60600702963', 'FC PO LIST', '2022-03-14 12:17:45'),
(503, 70, 'FC PO', 'DELETE', 'Balic/124504', 'POC PO LIST', '2022-03-14 12:19:38'),
(504, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'POC PO LIST', '2022-03-14 12:32:46'),
(505, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'POC PO LIST', '2022-03-14 12:34:01'),
(506, 68, '66', 'UPDATE', 'Accounts', 'POC PROJECT DETAILS', '2022-03-14 13:08:40'),
(507, 68, '66', 'UPDATE', 'Accounts', 'POC PROJECT DETAILS', '2022-03-14 13:08:56'),
(508, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'POC PO LIST', '2022-03-14 13:09:28'),
(509, 66, 'FC PO', 'DELETE', 'TEMP-73496307299', 'POC PO LIST', '2022-03-14 13:09:43'),
(510, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-14 13:09:58'),
(511, 68, '66', 'UPDATE', 'Accounts', 'MIXED PROJECT DETAILS', '2022-03-14 13:10:19'),
(512, 88, 'FC PO', 'INSERT', 'TEMP-81175224687', 'POC PO LIST', '2022-03-14 13:11:23'),
(513, 76, '88', 'INSERT', 'Admin', 'POC PROJECT DETAILS', '2022-03-14 13:14:45'),
(514, 88, 'FC PO', 'UPDATE', 'TEMP-81175224687', 'POC PO LIST', '2022-03-14 13:43:11'),
(515, 88, 'FC PO', 'UPDATE', 'TEMP-81175224687', 'POC PO LIST', '2022-03-14 13:49:54'),
(516, 76, '88', 'UPDATE', 'Admin', 'POC PROJECT DETAILS', '2022-03-14 14:14:06'),
(517, 88, 'FC PO', 'UPDATE', 'TEMP-81175224687', 'POC PO LIST', '2022-03-14 14:14:37'),
(518, 76, '88', 'DELETE', 'Admin', 'POC PROJECT DETAILS', '2022-03-14 14:15:11'),
(519, 68, '66', 'DELETE', 'Accounts', 'POC PROJECT DETAILS', '2022-03-14 14:15:17'),
(520, 88, 'FC PO', 'DELETE', 'TEMP-81175224687', 'POC PO LIST', '2022-03-14 14:15:23'),
(521, 89, 'FC PO', 'INSERT', 'CEAT1234', 'POC PO LIST', '2022-03-14 14:16:37'),
(522, 89, 'FC PO', 'UPDATE', 'CEAT1234', 'POC PO LIST', '2022-03-14 14:16:56'),
(523, 77, '89', 'INSERT', 'ApMoSys Core Group', 'POC PROJECT DETAILS', '2022-03-14 14:17:42'),
(524, 77, '89', 'UPDATE', 'ApMoSys Core Group', 'POC PROJECT DETAILS', '2022-03-14 14:20:23'),
(525, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-14 17:07:59'),
(526, 16, 'TNM PO', 'UPDATE', 'axis43215', 'TNM PO LIST', '2022-03-14 17:09:00'),
(527, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-14 17:29:13'),
(528, 16, 'TNM PO', 'UPDATE', 'axis43215', 'TNM PO LIST', '2022-03-14 17:36:06'),
(529, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-14 17:48:21'),
(530, 90, 'FC PO', 'INSERT', 'TEMP-09094159709', 'FC PO LIST', '2022-03-14 18:13:39'),
(531, 76, '90', 'INSERT', 'APM', 'FC PROJECT DETAILS', '2022-03-14 18:16:15'),
(532, 90, 'FC PO', 'DELETE', 'TEMP-09094159709', 'FC PO LIST', '2022-03-14 20:18:37'),
(533, 91, 'FC PO', 'INSERT', 'MIBC1234', 'FC PO LIST', '2022-03-14 20:22:12'),
(534, 77, '91', 'INSERT', 'Automation Testing', 'FC PROJECT DETAILS', '2022-03-14 20:35:51'),
(535, 77, '91', 'UPDATE', 'Automation Testing', 'FC PROJECT LIST', '2022-03-14 20:48:44'),
(536, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-15 11:28:46'),
(537, 29, 'TNM PO', 'INSERT', 'MIBC1234', 'TNM PO LIST', '2022-03-15 11:45:42'),
(538, 29, 'TNM PO', 'UPDATE', 'MIBC1234', 'TNM PO LIST', '2022-03-15 11:53:18'),
(539, 11, '29', 'INSERT', 'Development', 'TNM PROJECT LIST', '2022-03-15 12:09:01'),
(540, 11, '29', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-15 12:33:28'),
(541, 11, '29', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-15 12:37:38'),
(542, 77, '91', 'UPDATE', 'Automation Testing', 'FC PROJECT LIST', '2022-03-15 12:52:20'),
(543, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-15 18:25:38'),
(544, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-15 18:38:53'),
(545, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-16 11:49:07'),
(546, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-16 11:49:39'),
(547, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-16 11:50:01'),
(548, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-16 12:09:50'),
(549, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-16 12:55:32'),
(550, 30, 'TNM PO', 'INSERT', 'MIBC123456', 'TNM PO LIST', '2022-03-16 16:13:36'),
(551, 30, 'TNM PO', 'UPDATE', 'MIBC123456', 'TNM PO LIST', '2022-03-16 16:15:53'),
(552, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-16 21:11:14'),
(553, 77, '91', 'UPDATE', 'Automation Testing', 'FC PROJECT LIST', '2022-03-17 09:07:10'),
(554, 75, '89', 'UPDATE', 'Production Support', 'FC PROJECT LIST', '2022-03-17 09:07:37'),
(555, 75, '89', 'UPDATE', 'Production Support', 'FC PROJECT LIST', '2022-03-17 09:07:54'),
(556, 92, 'FC PO', 'INSERT', 'TEMP-01014536438', 'FC PO LIST', '2022-03-17 14:21:31'),
(557, 78, '92', 'INSERT', '', 'FC PROJECT DETAILS', '2022-03-17 14:22:00'),
(558, 92, 'FC PO', 'UPDATE', 'TEMP-01014536438', 'FC PO LIST', '2022-03-17 14:22:42'),
(559, 78, '92', 'UPDATE', '', 'FC PROJECT LIST', '2022-03-17 14:23:03'),
(560, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-17 15:00:13'),
(561, 92, 'FC PO', 'DELETE', 'TEMP-01014536438', 'FC PO LIST', '2022-03-17 15:42:37'),
(562, 93, 'FC PO', 'INSERT', 'TEMP-40045814423', 'FC PO LIST', '2022-03-17 15:45:13'),
(563, 79, '93', 'INSERT', 'Application Perf. Monitoring', 'FC PROJECT DETAILS', '2022-03-17 15:52:46'),
(564, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-17 16:03:19'),
(565, 94, 'FC PO', 'INSERT', 'AxisBank/104-Apmosys Technologies/1250', 'FC PO LIST', '2022-03-17 17:26:35'),
(566, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-17 22:06:50'),
(567, 95, 'FC PO', 'INSERT', 'TEMP-42767366503', 'FC PO LIST', '2022-03-18 11:36:37'),
(568, 95, 'FC PO', 'DELETE', 'TEMP-42767366503', 'FC PO LIST', '2022-03-18 11:38:57'),
(569, 96, 'FC PO', 'INSERT', 'TEMP-13263971207', 'FC PO LIST', '2022-03-18 11:40:50'),
(570, 94, 'FC PO', 'DELETE', 'AxisBank/104-Apmosys Technologies/1250', 'FC PO LIST', '2022-03-18 11:41:04'),
(571, 80, '96', 'INSERT', 'APM', 'FC PROJECT DETAILS', '2022-03-18 11:49:28'),
(572, 80, '96', 'UPDATE', 'APM', 'FC PROJECT LIST', '2022-03-18 11:49:48'),
(573, 96, 'FC PO', 'UPDATE', 'TEMP-13263971207', 'FC PO LIST', '2022-03-18 11:50:37'),
(574, 96, 'FC PO', 'UPDATE', 'TEMP-13263971207', 'FC PO LIST', '2022-03-19 10:54:46'),
(575, 96, 'FC PO', 'UPDATE', 'TEMP-13263971207', 'FC PO LIST', '2022-03-19 10:56:06'),
(576, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-19 10:58:53'),
(577, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-19 14:08:01'),
(578, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 14:19:21'),
(579, 97, 'FC PO', 'INSERT', 'TEMP-35659326649', 'FC PO LIST', '2022-03-19 15:05:00'),
(580, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 15:14:37'),
(581, 97, 'FC PO', 'DELETE', 'TEMP-35659326649', 'FC PO LIST', '2022-03-19 15:41:53'),
(582, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 15:42:50'),
(583, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 15:42:56'),
(584, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 15:43:45'),
(585, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 15:47:17'),
(586, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:36:07'),
(587, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:36:16'),
(588, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:39:12'),
(589, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:39:25'),
(590, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:40:09'),
(591, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:40:59'),
(592, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-19 16:41:54'),
(593, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-19 17:34:57'),
(594, 98, 'FC PO', 'INSERT', 'TEMP-25058338828', 'FC PO LIST', '2022-03-20 18:38:46'),
(595, 99, 'FC PO', 'INSERT', 'TEMP-89685138260', 'FC PO LIST', '2022-03-20 18:39:04'),
(596, 100, 'FC PO', 'INSERT', 'TEMP-68439537618', 'FC PO LIST', '2022-03-20 18:40:05'),
(597, 101, 'FC PO', 'INSERT', 'TEMP-22052803590', 'FC PO LIST', '2022-03-20 18:40:39'),
(598, 101, 'FC PO', 'DELETE', 'TEMP-22052803590', 'FC PO LIST', '2022-03-21 02:04:26'),
(599, 98, 'FC PO', 'DELETE', 'TEMP-25058338828', 'FC PO LIST', '2022-03-21 02:04:31'),
(600, 100, 'FC PO', 'DELETE', 'TEMP-68439537618', 'FC PO LIST', '2022-03-21 02:04:39'),
(601, 99, 'FC PO', 'DELETE', 'TEMP-89685138260', 'FC PO LIST', '2022-03-21 02:04:46'),
(602, 102, 'FC PO', 'INSERT', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 02:08:53'),
(603, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:02:06'),
(604, 81, '102', 'INSERT', 'Admin', 'FC PROJECT DETAILS', '2022-03-21 10:05:28'),
(605, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:06:20'),
(606, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:08:52'),
(607, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:11:16'),
(608, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:19:26'),
(609, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:20:45'),
(610, 102, 'FC PO', 'UPDATE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:21:09'),
(611, 102, 'FC PO', 'DELETE', 'TEMP-29574294940', 'FC PO LIST', '2022-03-21 10:21:20'),
(612, 96, 'FC PO', 'UPDATE', 'TEMP-13263971207', 'FC PO LIST', '2022-03-21 10:21:29'),
(613, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-21 10:31:41'),
(614, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-21 10:31:47'),
(615, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-21 10:32:02'),
(616, 107, 'FC PO', 'INSERT', 'TEMP-29939260545', 'FC PO LIST', '2022-03-21 11:26:44'),
(617, 108, 'FC PO', 'INSERT', 'TEMP-97235884688', 'FC PO LIST', '2022-03-21 11:27:31'),
(618, 109, 'FC PO', 'INSERT', 'TEMP-72753999629', 'FC PO LIST', '2022-03-21 11:27:55'),
(619, 109, 'FC PO', 'UPDATE', 'TEMP-72753999629', 'FC PO LIST', '2022-03-21 11:39:12'),
(620, 109, 'FC PO', 'UPDATE', 'TEMP-72753999629', 'FC PO LIST', '2022-03-21 11:39:23'),
(621, 109, 'FC PO', 'UPDATE', 'TEMP-72753999629', 'FC PO LIST', '2022-03-21 11:39:36'),
(622, 107, 'FC PO', 'DELETE', 'TEMP-29939260545', 'FC PO LIST', '2022-03-21 11:40:36'),
(623, 108, 'FC PO', 'DELETE', 'TEMP-97235884688', 'FC PO LIST', '2022-03-21 11:40:44'),
(624, 109, 'FC PO', 'DELETE', 'TEMP-72753999629', 'FC PO LIST', '2022-03-21 11:40:51'),
(625, 96, 'FC PO', 'DELETE', 'TEMP-13263971207', 'FC PO LIST', '2022-03-21 11:41:00'),
(626, 110, 'FC PO', 'INSERT', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:43:41'),
(627, 110, 'FC PO', 'UPDATE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:45:29'),
(628, 110, 'FC PO', 'UPDATE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:46:02'),
(629, 110, 'FC PO', 'DELETE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:46:44'),
(630, 111, 'FC PO', 'INSERT', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:48:06'),
(631, 111, 'FC PO', 'DELETE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:50:39'),
(632, 112, 'FC PO', 'INSERT', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:51:36'),
(633, 112, 'FC PO', 'UPDATE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:52:21'),
(634, 112, 'FC PO', 'DELETE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 11:55:02'),
(635, 113, 'FC PO', 'INSERT', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 12:10:28'),
(636, 113, 'FC PO', 'UPDATE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 12:11:21'),
(637, 113, 'FC PO', 'DELETE', 'Asutosh-1234', 'FC PO LIST', '2022-03-21 12:11:27'),
(638, 114, 'FC PO', 'INSERT', 'TEMP-17263392682', 'FC PO LIST', '2022-03-21 12:11:46'),
(639, 114, 'FC PO', 'UPDATE', 'TEMP-17263392682', 'FC PO LIST', '2022-03-21 12:20:05'),
(640, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-21 12:21:32'),
(641, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-21 12:24:04'),
(642, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-21 12:53:12'),
(643, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-21 12:54:08'),
(644, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-21 12:54:26'),
(645, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-21 13:01:34'),
(646, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-21 13:02:40'),
(647, 82, '114', 'INSERT', 'APM', 'FC PROJECT DETAILS', '2022-03-21 13:07:43'),
(648, 69, '71', 'DELETE', 'Development', 'FC PROJECT LIST', '2022-03-21 13:08:58'),
(649, 70, '70', 'DELETE', 'Security Testing', 'FC PROJECT LIST', '2022-03-21 13:09:01'),
(650, 76, '90', 'DELETE', 'APM', 'FC PROJECT LIST', '2022-03-21 13:09:04'),
(651, 78, '92', 'DELETE', '', 'FC PROJECT LIST', '2022-03-21 13:09:07'),
(652, 81, '102', 'DELETE', 'Admin', 'FC PROJECT LIST', '2022-03-21 13:09:55'),
(653, 80, '96', 'DELETE', 'APM', 'FC PROJECT LIST', '2022-03-21 13:09:58'),
(654, 82, '114', 'DELETE', 'APM', 'FC PROJECT LIST', '2022-03-21 13:10:28'),
(655, 83, '114', 'INSERT', 'APM', 'FC PROJECT DETAILS', '2022-03-21 13:10:59'),
(656, 83, '114', 'UPDATE', 'APM', 'FC PROJECT LIST', '2022-03-21 13:11:35'),
(657, 83, '114', 'UPDATE', 'APM', 'FC PROJECT LIST', '2022-03-21 13:11:47'),
(658, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-21 14:08:05'),
(659, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-21 14:10:28'),
(660, 68, '66', 'UPDATE', 'Accounts', 'FC PROJECT LIST', '2022-03-21 14:10:40'),
(661, 30, 'TNM PO', 'DELETE', 'MIBC123456', 'TNM PO LIST', '2022-03-21 14:34:14'),
(662, 16, 'TNM PO', 'UPDATE', 'axis43215', 'TNM PO LIST', '2022-03-21 15:05:58'),
(663, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-21 15:58:36'),
(664, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-21 16:21:25'),
(665, 13, 'TNM PO', 'UPDATE', 'axis1234', 'TNM PO LIST', '2022-03-21 16:23:00'),
(666, 33, 'TNM PO', 'INSERT', 'PO-32124829833', 'TNM PO LIST', '2022-03-21 16:28:44'),
(667, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-21 16:58:30'),
(668, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-22 00:41:55'),
(669, 89, 'FC PO', 'UPDATE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-22 00:44:49'),
(670, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-22 00:53:27'),
(671, 33, 'TNM PO', 'UPDATE', 'PO-32124829833', 'TNM PO LIST', '2022-03-22 12:56:08'),
(672, 33, 'TNM PO', 'UPDATE', 'PO-32124829833', 'TNM PO LIST', '2022-03-22 12:57:22'),
(673, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-22 13:18:10'),
(674, 91, 'FC PO', 'UPDATE', 'MIBC1234', 'FC PO LIST', '2022-03-22 13:24:03'),
(675, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-22 13:28:24'),
(676, 114, 'FC PO', 'DELETE', 'TEMP-17263392682', 'FC PO LIST', '2022-03-22 13:28:32'),
(677, 66, 'FC PO', 'DELETE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-22 13:28:35'),
(678, 89, 'FC PO', 'DELETE', 'TEMP-68018671829', 'FC PO LIST', '2022-03-22 13:28:38'),
(679, 91, 'FC PO', 'DELETE', 'MIBC1234', 'FC PO LIST', '2022-03-22 13:28:41'),
(680, 29, 'TNM PO', 'UPDATE', 'MIBC1234', 'TNM PO LIST', '2022-03-22 13:30:13'),
(681, 29, 'TNM PO', 'UPDATE', 'MIBC1234', 'TNM PO LIST', '2022-03-22 13:30:25'),
(682, 13, 'TNM PO', 'DELETE', 'axis1234', 'TNM PO LIST', '2022-03-22 13:30:43'),
(683, 16, 'TNM PO', 'DELETE', 'axis43215', 'TNM PO LIST', '2022-03-22 13:30:45'),
(684, 29, 'TNM PO', 'DELETE', 'MIBC1234', 'TNM PO LIST', '2022-03-22 13:30:48'),
(685, 70, '70', 'DELETE', 'Security Testing', 'MIXED PROJECT DETAILS', '2022-03-22 13:31:09'),
(686, 70, 'FC PO', 'DELETE', 'Balic/124504', 'FC PO LIST', '2022-03-22 13:31:18'),
(687, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-22 13:55:23'),
(688, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-22 13:56:54'),
(689, 115, 'FC PO', 'INSERT', 'TEMP-11019625141', 'FC PO LIST', '2022-03-22 14:20:28'),
(690, 115, 'FC PO', 'UPDATE', 'TEMP-11019625141', 'FC PO LIST', '2022-03-22 14:21:04'),
(691, 115, 'FC PO', 'DELETE', 'TEMP-11019625141', 'FC PO LIST', '2022-03-23 10:30:30'),
(692, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-23 11:15:34'),
(693, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-23 11:22:22'),
(694, 66, 'FC PO', 'UPDATE', 'TEMP-73496307299', 'FC PO LIST', '2022-03-23 11:40:02'),
(695, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 12:42:11'),
(696, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 12:44:51'),
(697, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 12:48:31'),
(698, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 12:54:44'),
(699, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:29:04'),
(700, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:29:33'),
(701, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:32:33'),
(702, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:33:34'),
(703, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:34:00'),
(704, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:34:17'),
(705, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 13:35:43'),
(706, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:11:43'),
(707, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:12:04'),
(708, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:15:55'),
(709, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:17:09'),
(710, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:20:57'),
(711, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:21:26'),
(712, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:23:04'),
(713, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:23:47'),
(714, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:25:39'),
(715, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 14:26:13'),
(716, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 15:06:53'),
(717, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 15:41:01'),
(718, 93, 'FC PO', 'UPDATE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 15:41:29'),
(719, 93, 'FC PO', 'DELETE', 'TEMP-40045814423', 'FC PO LIST', '2022-03-23 15:41:29'),
(720, 116, 'FC PO', 'INSERT', 'TEMP-10363695155', 'FC PO LIST', '2022-03-23 15:43:28'),
(721, 117, 'FC PO', 'INSERT', 'TEMP-67098134852', 'FC PO LIST', '2022-03-23 15:44:00'),
(722, 1, '', 'UPDATE', 'Admin', 'USER LIST', '2022-03-23 15:45:05'),
(723, 117, 'FC PO', 'DELETE', 'TEMP-67098134852', 'FC PO LIST', '2022-03-23 15:45:24'),
(724, 116, 'FC PO', 'UPDATE', 'TEMP-10363695155', 'FC PO LIST', '2022-03-23 15:46:13'),
(725, 116, 'FC PO', 'UPDATE', 'TEMP-10363695155', 'FC PO LIST', '2022-03-23 15:47:09'),
(726, 116, 'FC PO', 'UPDATE', 'TEMP-10363695155', 'FC PO LIST', '2022-03-23 15:48:22'),
(727, 116, 'FC PO', 'UPDATE', 'TEMP-10363695155', 'FC PO LIST', '2022-03-23 15:49:05'),
(728, 119, 'FC PO', 'INSERT', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:26:33'),
(729, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:29:09'),
(730, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:33:57'),
(731, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:35:34'),
(732, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:39:13'),
(733, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:41:17'),
(734, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 00:57:03'),
(735, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 01:01:46'),
(736, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:41:54'),
(737, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:42:30'),
(738, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:47:38'),
(739, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:49:47'),
(740, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:50:22'),
(741, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 02:50:49'),
(742, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 19:28:41'),
(743, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 19:28:54'),
(744, 116, 'FC PO', 'DELETE', 'TEMP-10363695155', 'FC PO LIST', '2022-03-24 19:29:36'),
(745, 119, 'FC PO', 'UPDATE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 19:29:48'),
(746, 119, 'FC PO', 'DELETE', 'TEMP-92010589344', 'FC PO LIST', '2022-03-24 19:35:18'),
(747, 120, 'FC PO', 'INSERT', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 19:36:33'),
(748, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 19:37:13'),
(749, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 19:58:19'),
(750, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 19:58:30'),
(751, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 20:00:23'),
(752, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 20:02:12'),
(753, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 20:09:27'),
(754, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-24 20:29:08'),
(755, 84, '120', 'INSERT', 'Business Development', 'FC PROJECT DETAILS', '2022-03-24 20:47:23'),
(756, 84, '120', 'UPDATE', 'Business Development', 'FC PROJECT LIST', '2022-03-24 20:50:52'),
(757, 84, '120', 'UPDATE', 'Business Development', 'FC PROJECT LIST', '2022-03-24 20:52:03'),
(758, 84, '120', 'UPDATE', 'Business Development', 'FC PROJECT LIST', '2022-03-24 20:58:13'),
(759, 84, '120', 'UPDATE', 'Business Development', 'FC PROJECT LIST', '2022-03-24 20:59:48'),
(760, 84, '120', 'UPDATE', 'Business Development', 'FC PROJECT LIST', '2022-03-24 21:38:02'),
(761, 68, '66', 'DELETE', 'Accounts', 'FC PROJECT LIST', '2022-03-24 22:15:29'),
(762, 75, '89', 'DELETE', 'Production Support', 'FC PROJECT LIST', '2022-03-24 22:15:29'),
(763, 77, '91', 'DELETE', 'Automation Testing', 'FC PROJECT LIST', '2022-03-24 22:15:29'),
(764, 79, '93', 'DELETE', 'Application Perf. Monitoring', 'FC PROJECT LIST', '2022-03-24 22:15:29'),
(765, 83, '114', 'DELETE', 'APM', 'FC PROJECT LIST', '2022-03-24 22:15:29'),
(766, 6, '13', 'DELETE', 'Business Development', 'TNM PROJECT LIST', '2022-03-24 22:20:48'),
(767, 9, '16', 'DELETE', 'Security Testing', 'TNM PROJECT LIST', '2022-03-24 22:20:48'),
(768, 10, '25', 'DELETE', 'Development', 'TNM PROJECT LIST', '2022-03-24 22:20:48'),
(769, 11, '29', 'DELETE', 'Development', 'TNM PROJECT LIST', '2022-03-24 22:20:48'),
(770, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:41:39'),
(771, 84, '120', 'DELETE', 'Business Development', 'FC PROJECT LIST', '2022-03-25 00:41:48'),
(772, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:42:05'),
(773, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:46:13'),
(774, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:46:21'),
(775, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:46:38'),
(776, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:50:26'),
(777, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:50:58'),
(778, 85, 'Approved', 'INSERT', 'Admin', 'FC PROJECT DETAILS', '2022-03-25 00:53:58'),
(779, 85, 'Approved', 'DELETE', 'Admin', 'FC PROJECT LIST', '2022-03-25 00:55:21'),
(780, 86, '120', 'INSERT', 'ApMoSys Core Group', 'FC PROJECT DETAILS', '2022-03-25 00:55:55'),
(781, 86, '120', 'DELETE', 'ApMoSys Core Group', 'FC PROJECT LIST', '2022-03-25 00:56:32'),
(782, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:56:45'),
(783, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 00:57:04'),
(784, 87, '120', 'INSERT', 'Development', 'FC PROJECT DETAILS', '2022-03-25 00:58:07'),
(785, 87, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 01:07:15'),
(786, 87, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 01:09:20'),
(787, 87, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 01:12:22'),
(788, 120, 'FC PO', 'UPDATE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-25 01:16:53'),
(789, 87, '120', 'DELETE', 'Development', 'FC PROJECT LIST', '2022-03-25 02:14:09'),
(790, 88, '120', 'INSERT', 'Admin', 'FC PROJECT DETAILS', '2022-03-25 02:16:10'),
(791, 88, '120', 'UPDATE', 'Admin', 'FC PROJECT LIST', '2022-03-25 02:16:41'),
(792, 88, '120', 'DELETE', 'Admin', 'FC PROJECT LIST', '2022-03-25 02:16:55'),
(793, 33, 'Manual Testing', 'DELETE', 'abc', 'USER LIST', '2022-03-25 02:17:46'),
(794, 15, 'HR Department', 'DELETE', 'Asutosh', 'USER LIST', '2022-03-25 02:17:50'),
(795, 30, 'Business Head', 'DELETE', 'Bishnu ', 'USER LIST', '2022-03-25 02:17:53'),
(796, 32, 'Technical Head', 'DELETE', 'Bansi ', 'USER LIST', '2022-03-25 02:17:56'),
(797, 9, 'Operation Department', 'DELETE', 'Jaydeep', 'USER LIST', '2022-03-25 02:17:59'),
(798, 11, 'Accounts Department', 'DELETE', 'Khageswar', 'USER LIST', '2022-03-25 02:18:01'),
(799, 31, 'Accounts', 'DELETE', 'Sailesh', 'USER LIST', '2022-03-25 02:18:04'),
(800, 34, 'Business Team', 'INSERTE', 'Asutosh', 'USER LIST', '2022-03-25 02:19:05'),
(801, 35, 'Accounts', 'INSERTE', 'Priyanka', 'USER LIST', '2022-03-25 02:19:35'),
(802, 36, 'Accounts', 'INSERTE', 'Anand', 'USER LIST', '2022-03-25 02:20:02'),
(803, 37, 'RMG', 'INSERTE', 'Priya', 'USER LIST', '2022-03-25 02:20:38'),
(804, 38, 'Technical Head', 'INSERTE', 'Vivek', 'USER LIST', '2022-03-25 02:21:36'),
(805, 90, '120', 'INSERT', NULL, 'FC PROJECT DETAILS', '2022-03-25 02:23:23'),
(806, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 02:24:48'),
(807, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 02:26:11'),
(808, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 02:26:25'),
(809, 33, 'TNM PO', 'DELETE', 'PO-32124829833', 'TNM PO LIST', '2022-03-25 02:27:15'),
(810, 121, 'FC PO', 'INSERT', 'TEMP-67879952538', 'FC PO LIST', '2022-03-25 11:08:39'),
(811, 91, '121', 'INSERT', NULL, 'FC PROJECT DETAILS', '2022-03-25 11:15:13'),
(812, 121, 'FC PO', 'UPDATE', 'TEMP-70213241545', 'FC PO LIST', '2022-03-25 11:23:06'),
(813, 121, 'FC PO', 'UPDATE', 'TEMP-70213241545', 'FC PO LIST', '2022-03-25 12:27:48'),
(814, 121, 'FC PO', 'UPDATE', 'TEMP-36665248042', 'FC PO LIST', '2022-03-25 12:33:46'),
(815, 91, '121', 'DELETE', NULL, 'FC PROJECT LIST', '2022-03-25 12:36:42'),
(816, 121, 'FC PO', 'UPDATE', 'TEMP-36665248042', 'FC PO LIST', '2022-03-25 12:37:39'),
(817, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 12:58:32'),
(818, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 12:59:22'),
(819, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 14:56:27'),
(820, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 14:56:35'),
(821, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-25 14:58:32'),
(822, 35, 'TNM PO', 'DELETE', 'PO-74896511061', 'TNM PO LIST', '2022-03-25 16:32:41'),
(823, 13, '34', 'DELETE', 'Admin', 'TNM PROJECT LIST', '2022-03-25 16:34:34'),
(824, 15, '35', 'DELETE', 'Application Perf. Monitoring', 'TNM PROJECT LIST', '2022-03-25 16:34:34'),
(825, 36, 'TNM PO', 'INSERT', 'PO-20133845904', 'TNM PO LIST', '2022-03-25 16:35:59'),
(826, 36, 'TNM PO', 'UPDATE', 'PO-20133845904', 'TNM PO LIST', '2022-03-25 16:37:20'),
(827, 36, 'TNM PO', 'UPDATE', 'PO-20133845904', 'TNM PO LIST', '2022-03-25 16:37:33'),
(828, 36, 'TNM PO', 'UPDATE', 'PO-20133845904', 'TNM PO LIST', '2022-03-25 16:42:26'),
(829, 16, '36', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-25 16:43:10'),
(830, 16, '36', 'UPDATE', 'APM', 'TNM PROJECT LIST', '2022-03-25 16:48:55'),
(831, 16, '36', 'DELETE', 'APM', 'TNM PROJECT LIST', '2022-03-25 16:55:11'),
(832, 36, 'TNM PO', 'DELETE', 'PO-20133845904', 'TNM PO LIST', '2022-03-25 16:55:24'),
(833, 37, 'TNM PO', 'INSERT', 'PO-01665090909', 'TNM PO LIST', '2022-03-25 17:05:02'),
(834, 17, '37', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-25 17:19:59'),
(835, 17, '37', 'UPDATE', NULL, 'TNM PROJECT LIST', '2022-03-25 18:09:31'),
(836, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-25 18:40:47'),
(837, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 11:24:28'),
(838, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 11:25:11'),
(839, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 11:28:52'),
(840, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 11:32:47'),
(841, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 11:43:34'),
(842, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 12:05:32'),
(843, 17, '37', 'UPDATE', 'Accounts', 'TNM PROJECT LIST', '2022-03-28 13:26:28'),
(844, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 13:46:00'),
(845, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 13:47:09'),
(846, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 13:55:22'),
(847, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 15:17:55'),
(848, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 15:19:18'),
(849, 17, '37', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-28 15:23:10'),
(850, 37, 'TNM PO', 'DELETE', 'PO-01665090909', 'TNM PO LIST', '2022-03-28 15:39:43'),
(851, 17, '37', 'DELETE', 'Development', 'TNM PROJECT LIST', '2022-03-28 15:40:32'),
(852, 38, 'TNM PO', 'INSERT', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 15:43:55'),
(853, 38, 'TNM PO', 'UPDATE', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 15:45:32'),
(854, 38, 'TNM PO', 'UPDATE', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 15:46:11'),
(855, 18, '38', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-28 15:47:09'),
(856, 38, 'TNM PO', 'UPDATE', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 15:50:33'),
(857, 38, 'TNM PO', 'UPDATE', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 15:51:41'),
(858, 18, '38', 'UPDATE', 'Application Perf. Monitoring', 'TNM PROJECT LIST', '2022-03-28 15:54:00'),
(859, 18, '38', 'UPDATE', 'Application Perf. Monitoring', 'TNM PROJECT LIST', '2022-03-28 15:54:30'),
(860, 18, '38', 'UPDATE', 'Application Perf. Monitoring', 'TNM PROJECT LIST', '2022-03-28 15:55:23'),
(861, 121, 'FC PO', 'DELETE', 'TEMP-36665248042', 'FC PO LIST', '2022-03-28 15:57:36'),
(862, 90, '120', 'UPDATE', 'Development', 'FC PROJECT LIST', '2022-03-28 16:25:16'),
(863, 120, 'FC PO', 'DELETE', 'TEMP-40961651071', 'FC PO LIST', '2022-03-28 17:26:55'),
(864, 90, '120', 'DELETE', 'Development', 'FC PROJECT LIST', '2022-03-28 17:27:18'),
(865, 38, 'TNM PO', 'DELETE', 'PO-93680461525', 'TNM PO LIST', '2022-03-28 17:27:24'),
(866, 18, '38', 'DELETE', 'Application Perf. Monitoring', 'TNM PROJECT LIST', '2022-03-28 17:27:29'),
(867, 122, 'FC PO', 'INSERT', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:34:18'),
(868, 122, 'FC PO', 'UPDATE', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:36:32'),
(869, 122, 'FC PO', 'UPDATE', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:36:55'),
(870, 122, 'FC PO', 'UPDATE', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:43:48'),
(871, 122, 'FC PO', 'UPDATE', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:44:05'),
(872, 122, 'FC PO', 'UPDATE', 'TEMP-26777276704', 'FC PO LIST', '2022-03-28 17:44:53'),
(873, 92, '122', 'INSERT', NULL, 'FC PROJECT DETAILS', '2022-03-28 17:45:22'),
(874, 122, 'FC PO', 'UPDATE', 'TEMP-29494487406', 'FC PO LIST', '2022-03-28 17:47:32'),
(875, 122, 'FC PO', 'UPDATE', 'TEMP-13328125910', 'FC PO LIST', '2022-03-28 17:47:56'),
(876, 92, '122', 'UPDATE', 'Admin', 'FC PROJECT LIST', '2022-03-28 17:49:52'),
(877, 92, '122', 'UPDATE', 'Admin', 'FC PROJECT LIST', '2022-03-28 17:51:16'),
(878, 122, 'FC PO', 'UPDATE', 'TEMP-13328125910', 'FC PO LIST', '2022-03-28 18:07:14'),
(879, 39, 'TNM PO', 'INSERT', 'PO-92236684940', 'TNM PO LIST', '2022-03-29 10:40:31'),
(880, 19, '39', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-29 11:49:29'),
(881, 19, '39', 'DELETE', NULL, 'TNM PROJECT LIST', '2022-03-29 11:49:46'),
(882, 20, '39', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-29 11:56:14'),
(883, 123, 'FC PO', 'INSERT', 'TEMP-65525134132', 'FC PO LIST', '2022-03-29 12:01:25'),
(884, 93, '123', 'INSERT', NULL, 'FC PROJECT DETAILS', '2022-03-29 12:02:52'),
(885, 40, 'TNM PO', 'INSERT', 'PO-02819004750', 'TNM PO LIST', '2022-03-29 12:57:59'),
(886, 40, 'TNM PO', 'UPDATE', 'PO-02819004750', 'TNM PO LIST', '2022-03-29 12:58:38'),
(887, 20, '39', 'UPDATE', 'APM', 'TNM PROJECT LIST', '2022-03-29 13:25:34'),
(888, 122, 'FC PO', 'DELETE', 'TEMP-13328125910', 'FC PO LIST', '2022-03-29 14:25:00'),
(889, 123, 'FC PO', 'DELETE', 'TEMP-65525134132', 'FC PO LIST', '2022-03-29 14:25:04'),
(890, 92, '122', 'DELETE', 'Admin', 'FC PROJECT LIST', '2022-03-29 14:25:36'),
(891, 93, '123', 'DELETE', NULL, 'FC PROJECT LIST', '2022-03-29 14:25:36'),
(892, 20, '39', 'DELETE', 'APM', 'TNM PROJECT LIST', '2022-03-29 14:25:48'),
(893, 40, 'TNM PO', 'DELETE', 'PO-02819004750', 'TNM PO LIST', '2022-03-29 14:26:03'),
(894, 39, 'TNM PO', 'DELETE', 'PO-92236684940', 'TNM PO LIST', '2022-03-29 14:26:06'),
(895, 41, 'TNM PO', 'INSERT', 'PO-89528106326', 'TNM PO LIST', '2022-03-29 17:02:41'),
(896, 124, 'FC PO', 'INSERT', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 17:02:52'),
(897, 94, '124', 'INSERT', NULL, 'FC PROJECT DETAILS', '2022-03-29 17:04:52'),
(898, 21, '41', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-29 17:25:09'),
(899, 21, '41', 'UPDATE', 'Development', 'TNM PROJECT LIST', '2022-03-29 17:47:48'),
(900, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 18:08:31'),
(901, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 18:09:14'),
(902, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 18:33:20'),
(903, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 18:33:52'),
(904, 42, 'TNM PO', 'INSERT', 'PO-62343118115', 'TNM PO LIST', '2022-03-29 18:43:25'),
(905, 22, '42', 'INSERT', NULL, 'TNM PROJECT LIST', '2022-03-29 18:46:10'),
(906, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 19:21:04'),
(907, 94, '124', 'DELETE', NULL, 'FC PROJECT LIST', '2022-03-29 20:14:53'),
(908, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-29 20:15:13'),
(909, 125, 'FC PO', 'INSERT', 'TEMP-27049614299', 'FC PO LIST', '2022-03-29 20:16:13'),
(910, 21, '41', 'DELETE', 'Development', 'TNM PROJECT LIST', '2022-03-29 20:18:41'),
(911, 42, 'TNM PO', 'UPDATE', 'PO-62343118115', 'TNM PO LIST', '2022-03-29 20:19:54'),
(912, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-31 15:41:54'),
(913, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-31 15:43:54'),
(914, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-31 15:51:59'),
(915, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-03-31 15:53:04'),
(916, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 00:18:21'),
(917, 22, '42', 'UPDATE', 'Admin', 'TNM PROJECT LIST', '2022-04-19 00:19:33'),
(918, 125, 'FC PO', 'UPDATE', 'TEMP-27049614299', 'FC PO LIST', '2022-04-19 00:34:38'),
(919, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 00:39:48'),
(920, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 00:40:15'),
(921, 42, 'TNM PO', 'UPDATE', 'PO-62343118115', 'TNM PO LIST', '2022-04-19 00:41:02'),
(922, 42, 'TNM PO', 'UPDATE', 'PO-62343118115', 'TNM PO LIST', '2022-04-19 00:41:18'),
(923, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 00:41:42'),
(924, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 00:47:27'),
(925, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 01:02:51'),
(926, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 01:03:11'),
(927, 125, 'FC PO', 'UPDATE', 'TEMP-27049614299', 'FC PO LIST', '2022-04-19 01:38:42'),
(928, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:00:10'),
(929, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:02:18'),
(930, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:03:07'),
(931, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:03:57'),
(932, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:05:32'),
(933, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:08:54'),
(934, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-19 02:09:18'),
(935, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 10:10:50'),
(936, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 10:11:20'),
(937, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 10:13:11'),
(938, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 10:13:46'),
(939, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 11:05:19'),
(940, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 11:06:58'),
(941, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-19 11:09:00'),
(942, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-25 12:20:28'),
(943, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-25 12:24:28'),
(944, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-25 12:27:45'),
(945, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-25 12:28:51'),
(946, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-27 11:55:41'),
(947, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-27 17:53:48'),
(948, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-27 17:55:11'),
(949, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-27 17:55:27'),
(950, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-27 17:55:48'),
(951, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-27 18:00:27'),
(952, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-27 19:36:55'),
(953, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-27 19:39:57'),
(954, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-04-27 20:18:29'),
(955, 126, 'FC PO', 'INSERT', '101', 'FC PO LIST', '2022-04-27 23:11:41'),
(956, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-28 11:43:44'),
(957, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-28 11:46:13'),
(958, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-29 11:52:32'),
(959, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-29 11:52:53'),
(960, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:54:11'),
(961, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:55:25'),
(962, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:55:45'),
(963, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:56:01'),
(964, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:58:07'),
(965, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 11:59:10'),
(966, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:04:00'),
(967, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:05:03'),
(968, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:07:50'),
(969, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:13:41'),
(970, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:14:18'),
(971, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 12:17:08'),
(972, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:17:47'),
(973, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:19:54'),
(974, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:23:40'),
(975, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:27:49'),
(976, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:28:07'),
(977, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 15:48:08'),
(978, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 16:12:46'),
(979, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 16:32:56'),
(980, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 16:33:32'),
(981, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:29:33'),
(982, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:34:50'),
(983, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:37:55'),
(984, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:38:16'),
(985, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:39:06'),
(986, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:50:08'),
(987, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:50:51'),
(988, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:50:58'),
(989, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 17:59:04');
INSERT INTO `user_logs` (`id`, `user_id`, `department`, `action`, `user_name`, `table_name`, `cdate`) VALUES
(990, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 18:01:56'),
(991, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 18:55:33'),
(992, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 18:56:45'),
(993, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:11:17'),
(994, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:11:55'),
(995, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:15:22'),
(996, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:15:53'),
(997, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:18:13'),
(998, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 19:20:53'),
(999, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 20:47:33'),
(1000, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 20:48:38'),
(1001, 124, 'FC PO', 'UPDATE', 'TEMP-48275364475', 'FC PO LIST', '2022-04-30 21:30:56'),
(1002, 127, 'FC PO', 'INSERT', 'TEMP-75694306456', 'FC PO LIST', '2022-05-01 19:47:32'),
(1003, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 19:52:11'),
(1004, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 19:55:21'),
(1005, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:01:45'),
(1006, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:02:43'),
(1007, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:02:47'),
(1008, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:03:31'),
(1009, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:04:19'),
(1010, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:05:06'),
(1011, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:07:38'),
(1012, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:09:52'),
(1013, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:10:33'),
(1014, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:11:57'),
(1015, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 20:13:09'),
(1016, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 23:08:12'),
(1017, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-01 23:09:12'),
(1018, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 11:10:04'),
(1019, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 11:10:43'),
(1020, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 11:14:34'),
(1021, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 11:15:26'),
(1022, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 11:16:03'),
(1023, 126, 'FC PO', 'UPDATE', '101', 'FC PO LIST', '2022-05-02 11:43:10'),
(1024, 126, 'FC PO', 'UPDATE', '101', 'FC PO LIST', '2022-05-02 11:48:16'),
(1025, 126, 'FC PO', 'UPDATE', '101', 'FC PO LIST', '2022-05-02 11:49:17'),
(1026, 126, 'FC PO', 'DELETE', '101', 'FC PO LIST', '2022-05-02 12:13:32'),
(1027, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 12:18:20'),
(1028, 124, 'FC PO', 'UPDATE', 'TEMP-33328425794', 'FC PO LIST', '2022-05-02 13:52:56'),
(1029, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 14:25:24'),
(1030, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 15:45:28'),
(1031, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 16:18:56'),
(1032, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 16:19:35'),
(1033, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 17:09:12'),
(1034, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 17:09:45'),
(1035, 41, 'TNM PO', 'UPDATE', 'PO-89528106326', 'TNM PO LIST', '2022-05-05 17:10:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`srNo`);

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone_tablefc`
--
ALTER TABLE `milestone_tablefc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `milestone_no` (`milestone_no`);

--
-- Indexes for table `po_list`
--
ALTER TABLE `po_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_table`
--
ALTER TABLE `resource_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tnm_po_list_old`
--
ALTER TABLE `tnm_po_list_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tnm_project_list`
--
ALTER TABLE `tnm_project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `srNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1395;

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `milestone_tablefc`
--
ALTER TABLE `milestone_tablefc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `po_list`
--
ALTER TABLE `po_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `resource_table`
--
ALTER TABLE `resource_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tnm_po_list_old`
--
ALTER TABLE `tnm_po_list_old`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tnm_project_list`
--
ALTER TABLE `tnm_project_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
