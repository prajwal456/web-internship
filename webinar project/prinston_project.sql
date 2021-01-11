-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 12:23 PM
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
-- Database: `prinston project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `PERSONID` varchar(10) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`PERSONID`, `NAME`, `PASSWORD`) VALUES
('a1', 'pavan', '$2y$10$sy6LWw.XLhQSJBGCfYN7uuk4poL88lGbsYkohoKcbzrYU6zcnB06G'),
('a2', 'manoj', '$2y$10$8xxpkDmn2JqGSxu/jv0CneN620QmScqplPUsnVaiVXS2SjO25IW6G');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `COMPANYID` int(10) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMPANYID`, `NAME`, `EMAIL`, `PHONE`) VALUES
(1, 'JIO', 'JIO@GMAIL.COM', 9187654321),
(2, 'BSNL', 'BSNL@GMAIL.COM', 9187654322),
(123, 'tcs', 'tcs2@gmail.com', 9876543211),
(124, 'mi', 'mi@gmail.com', 9187465673);

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `USN` varchar(10) NOT NULL,
  `COMPANYID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`USN`, `COMPANYID`) VALUES
('1ab17cs002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(10) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL,
  `DEPARTMENT` varchar(100) DEFAULT NULL,
  `GRAD` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE`, `DEPARTMENT`, `GRAD`) VALUES
('1ab17cs001', 'sai', 'SAI@gmail.com', '$2y$10$rCpXW9AztXjTurX/fpu1MuCbYXNCxGhocRa1d39iGB4YjBraVMF8m', 9108298772, 'CSE', 2021),
('1ab17cs002', 'raj', 'raj@gmail.com', '$2y$10$YizOZxoY5TtO1GS5z8YZjOZdndAoLyJscFtP4x3AqVNCW.XplNXTS', 9108298773, 'CSE', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `WEBINARID` varchar(10) NOT NULL,
  `COMPANYID` int(10) DEFAULT NULL,
  `DESCRIPTION` varchar(500) DEFAULT NULL,
  `LOCATION` varchar(200) DEFAULT NULL,
  `STARTDATE` date DEFAULT NULL,
  `ENDDATE` date DEFAULT NULL,
  `SKILLS` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`WEBINARID`, `COMPANYID`, `DESCRIPTION`, `LOCATION`, `STARTDATE`, `ENDDATE`, `SKILLS`) VALUES
('WEB1', 1, 'IN THIS WEBINAR WE WILL PROVIDE INORMATION ABOUT THE JIO SERVICES', 'BANGALURU', '2020-10-01', '2020-11-01', 'JAVA PYTHON'),
('WEB2', 2, 'IN THIS WEBINAR WE WILL PROVIDE ALL THE INFORMATION ABOUT THE BSNL', 'BENGALURU', '2020-08-01', '2020-09-01', 'JAVA JAVASCRIPT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`PERSONID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`USN`,`COMPANYID`),
  ADD KEY `fkcid` (`COMPANYID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`WEBINARID`),
  ADD KEY `COMPANYID` (`COMPANYID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `placements`
--
ALTER TABLE `placements`
  ADD CONSTRAINT `fkcid` FOREIGN KEY (`COMPANYID`) REFERENCES `company` (`COMPANYID`),
  ADD CONSTRAINT `fkusn` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE;

--
-- Constraints for table `webinar`
--
ALTER TABLE `webinar`
  ADD CONSTRAINT `webinar_ibfk_1` FOREIGN KEY (`COMPANYID`) REFERENCES `company` (`COMPANYID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
