-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2019 at 06:52 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accountId` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `username`, `password`, `role`, `status`) VALUES
(1, 'leli', '123456', 'Admin', 'Active'),
(2, 'fkr', '123456', 'Doctor', 'Active'),
(10, 'tigi', '12345678', 'Admin', 'Active'),
(11, 'fere', '123456', 'Doctor', 'Active'),
(12, 'nurse', '12345678', 'Nurse', 'Active'),
(13, 'Lemlem', '12345678', 'Reception', 'active'),
(14, 'Fikir', '123456', 'Admin', 'Active'),
(15, 'Lidiya', '12345678', 'Reception', 'Active'),
(16, 'Meseret', '12345678', 'Nurse', 'Active'),
(17, 'lidiya', '12345678', 'Admin', 'Active'),
(19, 'lm', '0923235102', 'Laboratorist', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(10) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(30) DEFAULT NULL,
  `accId` int(10) DEFAULT NULL,
  PRIMARY KEY (`adminId`),
  KEY `accId` (`accId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `accId`) VALUES
(1, 'leli', 1),
(2, 'Tigi', 10),
(3, 'Fikir', 14),
(4, 'lidu', 15);

-- --------------------------------------------------------

--
-- Table structure for table `checkbox`
--

DROP TABLE IF EXISTS `checkbox`;
CREATE TABLE IF NOT EXISTS `checkbox` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `Cvalues` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkbox`
--

INSERT INTO `checkbox` (`Id`, `Cvalues`) VALUES
(1, 'hematology,'),
(2, 'hematology,'),
(3, 'wbc,hgb');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctorid` int(10) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `education` varchar(25) NOT NULL,
  `experience` float(11,1) NOT NULL,
  `consultancy_charge` float(10,2) NOT NULL,
  `accId` int(10) DEFAULT NULL,
  PRIMARY KEY (`doctorid`),
  KEY `accId` (`accId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `doctorname`, `mobileno`, `departmentid`, `education`, `experience`, `consultancy_charge`, `accId`) VALUES
(1, 'Fkr', '0911121415', 1, 'MD', 5.0, 1234.00, 2),
(2, 'Fere', '0942068425', 1, 'Brain Specialist', 2.0, 50000.00, 11);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

DROP TABLE IF EXISTS `laboratorist`;
CREATE TABLE IF NOT EXISTS `laboratorist` (
  `laboratoristid` int(10) NOT NULL AUTO_INCREMENT,
  `laboratoristname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `education` varchar(25) NOT NULL,
  `experience` float(11,1) NOT NULL,
  `accId` int(10) DEFAULT NULL,
  PRIMARY KEY (`laboratoristid`),
  KEY `accId` (`accId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`laboratoristid`, `laboratoristname`, `mobileno`, `departmentid`, `education`, `experience`, `accId`) VALUES
(1, 'lemlem', '0942068425', 1, 'laboratory', 9.0, 13),
(2, 'lm', '09457081056', 2, 'laboratory', 4.0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

DROP TABLE IF EXISTS `lab_test`;
CREATE TABLE IF NOT EXISTS `lab_test` (
  `mrn` int(10) NOT NULL AUTO_INCREMENT,
  `hematology` varchar(50) DEFAULT NULL,
  `urine_analysis` varchar(50) DEFAULT NULL,
  `chemistry` varchar(50) DEFAULT NULL,
  `serology` varchar(50) DEFAULT NULL,
  `hormone_analysis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mrn`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`mrn`, `hematology`, `urine_analysis`, `chemistry`, `serology`, `hormone_analysis`) VALUES
(29, 'wbc,hgb', 'ph,sg', 'Alk.Phos,Bilirubin/T', 'HCV', 'FSH');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
CREATE TABLE IF NOT EXISTS `nurse` (
  `nurseid` int(10) NOT NULL AUTO_INCREMENT,
  `nursename` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `education` varchar(25) NOT NULL,
  `experience` float(11,1) NOT NULL,
  `accId` int(10) DEFAULT NULL,
  PRIMARY KEY (`nurseid`),
  KEY `accId` (`accId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurseid`, `nursename`, `mobileno`, `departmentid`, `education`, `experience`, `accId`) VALUES
(1, 'nurse', '0911121415', 1, 'ED', 5.0, 12),
(2, 'Mesi', '0923235102', 4, 'nursing', 4.0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patientid` int(10) NOT NULL AUTO_INCREMENT,
  `patientname` varchar(50) NOT NULL,
  `admissiondate` date NOT NULL,
  `admissiontime` time NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `city` varchar(25) NOT NULL,
  `mrn` varchar(20) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`patientid`),
  UNIQUE KEY `mrn` (`mrn`),
  KEY `loginid` (`loginid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `patientname`, `admissiondate`, `admissiontime`, `address`, `mobileno`, `city`, `mrn`, `loginid`, `password`, `bloodgroup`, `gender`, `dob`, `status`) VALUES
(1, 'Leli', '2019-08-08', '18:44:27', 'AA', '0942068425', 'AA', '12', 'patient', '123456', 'O+', 'FEMALE', '2019-08-08', 'Active'),
(2, 'abebe', '2019-08-09', '03:38:52', 'aa', '0942068425', 'AA', '13', 'patient', '1234567', 'B+', 'FEMALE', '2019-08-09', 'Active'),
(3, 'abe', '2019-08-09', '06:53:43', 'aa,eth', '0942068425', 'AA', '3', 'patient', '12345678', 'B+', 'FEMALE', '2019-08-09', 'Active'),
(6, 'Fikir', '2019-08-12', '06:53:43', 'waserfgt', '0942068425', 'AA', '23', 'patient', '12345678', 'A-', 'MALE', '2019-08-12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test`
--

DROP TABLE IF EXISTS `patient_test`;
CREATE TABLE IF NOT EXISTS `patient_test` (
  `mrn` int(10) NOT NULL AUTO_INCREMENT,
  `phone` varchar(250) DEFAULT NULL,
  `temprature` float(10,2) DEFAULT NULL,
  `bp` int(30) DEFAULT NULL,
  `pulse_rate` int(30) DEFAULT NULL,
  `respiratory_rate` int(30) DEFAULT NULL,
  `sao2` varchar(250) DEFAULT NULL,
  `spo2` varchar(250) DEFAULT NULL,
  `spo21` varchar(250) DEFAULT NULL,
  `height` float(10,2) DEFAULT NULL,
  `weight` float(10,2) DEFAULT NULL,
  `rbs` varchar(250) DEFAULT NULL,
  `fbs` varchar(250) DEFAULT NULL,
  `ht_li` float(10,2) DEFAULT NULL,
  `muas` float(10,2) DEFAULT NULL,
  `cigarette` varchar(250) DEFAULT NULL,
  `wt_age` float(10,2) DEFAULT NULL,
  `wt_ht` float(10,2) DEFAULT NULL,
  `bmi` float(10,2) DEFAULT NULL,
  `bmi_age` float(10,2) DEFAULT NULL,
  `muas_age` float(10,2) DEFAULT NULL,
  `hc_age` float(10,2) DEFAULT NULL,
  `bp_age_ht` float(10,2) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`mrn`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_test`
--

INSERT INTO `patient_test` (`mrn`, `phone`, `temprature`, `bp`, `pulse_rate`, `respiratory_rate`, `sao2`, `spo2`, `spo21`, `height`, `weight`, `rbs`, `fbs`, `ht_li`, `muas`, `cigarette`, `wt_age`, `wt_ht`, `bmi`, `bmi_age`, `muas_age`, `hc_age`, `bp_age_ht`, `note`) VALUES
(58, '123456', 12.00, 2, 423, 42, '4324', 'sf', 'gvd', 423.00, 423.00, '23', '32', 44.00, 12.00, 'on', 45.00, 25.00, 22.00, 44.00, 44.00, 44.00, 44.00, 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

DROP TABLE IF EXISTS `reception`;
CREATE TABLE IF NOT EXISTS `reception` (
  `receptionid` int(10) NOT NULL AUTO_INCREMENT,
  `receptionname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `education` varchar(25) NOT NULL,
  `experience` float(11,1) NOT NULL,
  `accId` int(10) DEFAULT NULL,
  PRIMARY KEY (`receptionid`),
  KEY `accId` (`accId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`receptionid`, `receptionname`, `mobileno`, `departmentid`, `education`, `experience`, `accId`) VALUES
(3, 'Lemlem', '0923235102', 1, 'IT', 2.0, 13),
(5, 'Lidu', '0942068425', 1, 'IT', 2.7, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
