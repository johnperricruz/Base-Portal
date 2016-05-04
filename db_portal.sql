-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 05:45 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `LoginID` int(10) NOT NULL,
  `PersonalInfoID` int(10) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Key` varchar(255) NOT NULL,
  `Role` varchar(40) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`LoginID`, `PersonalInfoID`, `Username`, `Password`, `Key`, `Role`, `Status`) VALUES
(1, 1, 'admin', '1234', 'nSsu6582V4j767fpdvP9TFH995W82q2T2x43g62X', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personalinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_personalinfo` (
  `PersonalInfoID` int(10) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `MName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `EmailAddress` varchar(60) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Birthday` date NOT NULL,
  `DateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DisplayPic` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personalinfo`
--

INSERT INTO `tbl_personalinfo` (`PersonalInfoID`, `FName`, `MName`, `LName`, `EmailAddress`, `Gender`, `Birthday`, `DateRegistered`, `DisplayPic`) VALUES
(1, 'John Perri ', 'Atienza', 'Cruz', 'john@primeview.com', 'M', '1994-12-30', '2016-03-01 23:34:26', 'cTSaXt3dhyOfRNZBgzP0JuU6GC1V42MInv8wLqHx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `SettingsID` int(10) NOT NULL,
  `SettingsName` varchar(50) NOT NULL,
  `Value` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`SettingsID`, `SettingsName`, `Value`) VALUES
(1, 'SystemDate', 'M d, Y'),
(2, 'RememberMe', '0'),
(3, 'SystemTime', 'H: i s'),
(4, 'ForgotPassword', '1'),
(5, 'SystemMailer', 'jcruz@optimizex.com'),
(6, 'SystemSender', 'John Perri Cruz'),
(7, 'UnsecuredSiteAddress', 'http://localhost/portal/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `tbl_personalinfo`
--
ALTER TABLE `tbl_personalinfo`
  ADD PRIMARY KEY (`PersonalInfoID`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`SettingsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `LoginID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_personalinfo`
--
ALTER TABLE `tbl_personalinfo`
  MODIFY `PersonalInfoID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `SettingsID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
