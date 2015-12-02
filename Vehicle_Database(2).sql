-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2015 at 06:38 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Vehicle_Database`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `cars`
--
CREATE TABLE IF NOT EXISTS `cars` (
`CName` varchar(15)
);
-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `Name` varchar(20) NOT NULL,
  `CustomerId` int(10) NOT NULL AUTO_INCREMENT,
  `RegistrationNo` int(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Phoneno` int(10) NOT NULL,
  `PANno` int(20) DEFAULT NULL,
  PRIMARY KEY (`CustomerId`),
  UNIQUE KEY `Registration No` (`RegistrationNo`),
  KEY `Registration No_2` (`RegistrationNo`),
  KEY `Registration No_3` (`RegistrationNo`),
  KEY `Registration No_4` (`RegistrationNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Database to store Customer Information' AUTO_INCREMENT=2015025 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Name`, `CustomerId`, `RegistrationNo`, `Address`, `Phoneno`, `PANno`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE IF NOT EXISTS `Service` (
  `Service Id` int(7) NOT NULL AUTO_INCREMENT,
  `RegistrationNo` int(20) NOT NULL,
  `ServiceDate` date NOT NULL,
  `CustomerId` int(10) NOT NULL,
  `ServiceNumber` int(2) NOT NULL DEFAULT '1',
  `ServiceType` varchar(10) NOT NULL DEFAULT 'Normal',
  `Cost` int(5) DEFAULT NULL,
  PRIMARY KEY (`Service Id`),
  UNIQUE KEY `Registration No` (`RegistrationNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`Service Id`, `RegistrationNo`, `ServiceDate`, `CustomerId`, `ServiceNumber`, `ServiceType`, `Cost`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `Showroom`
--

CREATE TABLE IF NOT EXISTS `Showroom` (
  `Name` varchar(15) NOT NULL,
  `ShowroomId` int(6) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Phone no` int(10) NOT NULL,
  UNIQUE KEY `ShowroomId` (`ShowroomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Showroom`
--

INSERT INTO `Showroom` (`Name`, `ShowroomId`, `Address`, `Phone no`) VALUES
('Aereos Worli', 10220, 'Anne Beasant Road,Wo', 222526454);

-- --------------------------------------------------------

--
-- Table structure for table `TransactionBill`
--

CREATE TABLE IF NOT EXISTS `TransactionBill` (
  `BillId` int(5) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(10) NOT NULL,
  `RegistrationNo` int(20) NOT NULL,
  `VAT` decimal(3,0) NOT NULL DEFAULT '3',
  `Taxes` float NOT NULL DEFAULT '12.36',
  `Registration_amount` int(7) NOT NULL,
  `Total` int(7) NOT NULL,
  PRIMARY KEY (`BillId`),
  UNIQUE KEY `CustomerId` (`CustomerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `TransactionBill`
--

INSERT INTO `TransactionBill` (`BillId`, `CustomerId`, `RegistrationNo`, `VAT`, `Taxes`, `Registration_amount`, `Total`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `Vehicles`
--

CREATE TABLE IF NOT EXISTS `Vehicles` (
  `CName` varchar(15) NOT NULL,
  `RegistrationNo` int(20) NOT NULL,
  `ShowroomId` int(11) NOT NULL,
  `YearofMan` year(4) NOT NULL,
  `Warranty` int(2) NOT NULL,
  `Type` varchar(15) NOT NULL DEFAULT 'Petrol',
  PRIMARY KEY (`RegistrationNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Database for storing vehicle information';

--
-- Dumping data for table `Vehicles`
--

INSERT INTO `Vehicles` (`CName`, `RegistrationNo`, `ShowroomId`, `YearofMan`, `Warranty`, `Type`) VALUES

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewcar`
--
CREATE TABLE IF NOT EXISTS `viewcar` (
`Cname` varchar(15)
);
-- --------------------------------------------------------

--
-- Table structure for table `WebsiteUsers`
--

CREATE TABLE IF NOT EXISTS `WebsiteUsers` (
  `userID` int(9) NOT NULL AUTO_INCREMENT,
  `userName` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `WebsiteUsers`
--

INSERT INTO `WebsiteUsers` (`userID`, `userName`, `pass`) VALUES
(2, 'AereosDBA', 'password');

-- --------------------------------------------------------

--
-- Structure for view `cars`
--
DROP TABLE IF EXISTS `cars`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cars` AS select `Vehicles`.`CName` AS `CName` from `Vehicles` where ((`Vehicles`.`CName` = 'BlueMotion 4WD') and 'Acura 4x');

-- --------------------------------------------------------

--
-- Structure for view `viewcar`
--
DROP TABLE IF EXISTS `viewcar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcar` AS select `Vehicles`.`CName` AS `Cname` from `Vehicles` where ((`Vehicles`.`CName` = 'Bluemotion 4WD') and (`Vehicles`.`CName` = 'Acura 4x'));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
