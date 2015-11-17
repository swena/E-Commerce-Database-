-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2013 at 07:01 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseNo` varchar(5) NOT NULL,
  `CourseName` varchar(35) DEFAULT NULL,
  `Credit` decimal(3,1) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseNo`, `CourseName`, `Credit`) VALUES
('CT103', 'Signal and Systems', 4.0),
('CT151', 'Advanced Radio', 4.5),
('CT201', 'System And Signal Theory', 4.5),
('EL103', 'EHD', 4.5),
('EL122', 'VLSI', 3.0),
('EL201', 'VLSI Design', 4.0),
('HM106', 'Approaches to Indian Society', 3.0),
('HM132', 'Organisational behaviour', 3.0),
('HM553', 'Rural Finanace', 3.0),
('IT101', 'Introduction to Algorithims', 4.0),
('IT104', 'Computer Networks', 4.5),
('IT114', 'Database mangement', 4.5),
('IT201', 'Algorithms', 4.0),
('IT210', 'Machine Intelligence', 4.0),
('IT231', 'Advanced Computer Networks', 4.5),
('IT301', 'Database Design And Programming', 4.0),
('IT310', 'COP', 4.5),
('IT314', 'Programing Paradigms', 4.5),
('IT412', 'Algorithms And Datastructures', 4.0),
('IT550', 'Computer Basics', 4.0),
('IT555', 'Information Systems Modelling', 4.0),
('IT557', 'Technical Communication skills', 4.5),
('PC312', 'Communication', 3.0),
('PC623', 'Object Oriented Programming in JAVA', 4.5),
('SC105', 'Calculus and complex variables', 4.0),
('SC116', 'Alegbra', 4.0),
('SC210', 'Essential Mathematics', 4.0),
('SC311', 'Mathematics', 4.0);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `Reciept_No` int(11) NOT NULL DEFAULT '0',
  `StudentID` varchar(9) DEFAULT NULL,
  `Semester` varchar(6) NOT NULL,
  `Tution_Fee` int(11) NOT NULL,
  `Registration_Fee` int(11) DEFAULT NULL,
  `Hostel_Fee` int(11) DEFAULT NULL,
  `Electricity_Fee` int(11) NOT NULL,
  `Late_Fee` int(11) NOT NULL,
  `Total_Fee` int(11) NOT NULL,
  `Insurance` int(11) DEFAULT NULL,
  `Excess_Pay` int(11) DEFAULT NULL,
  `Cash Amount` int(11) NOT NULL,
  `Cheque Amount` int(11) NOT NULL,
  `Cheque_No` int(11) DEFAULT NULL,
  `Cheque_Date` date DEFAULT NULL,
  `Bank` varchar(20) DEFAULT NULL,
  `AcadYear` decimal(4,0) NOT NULL,
  PRIMARY KEY (`Reciept_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`Reciept_No`, `StudentID`, `Semester`, `Tution_Fee`, `Registration_Fee`, `Hostel_Fee`, `Electricity_Fee`, `Late_Fee`, `Total_Fee`, `Insurance`, `Excess_Pay`, `Cash Amount`, `Cheque Amount`, `Cheque_No`, `Cheque_Date`, `Bank`, `AcadYear`) VALUES
(35774, '201001001', 'Winter', 30000, 2500, 7000, 1000, 0, 40500, 0, 0, 0, 40500, NULL, NULL, NULL, 2012),
(234567, '201001001', 'Autumn', 30000, 2500, 7000, 1000, 0, 40500, 0, 0, 0, 40500, NULL, NULL, NULL, 2010),
(5668991, '201001002', 'Autumn', 30000, 2500, 7000, 1000, 0, 40500, 0, 0, 0, 40500, NULL, NULL, NULL, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `InstructorID` varchar(5) NOT NULL,
  `Password` int(10) NOT NULL,
  `InstructorName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`InstructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `Password`, `InstructorName`) VALUES
('102', 123102, 'MEHUL RAVAL'),
('103', 123103, 'M V JOSHI'),
('104', 123104, 'PRABHAT RAJAN'),
('105', 123105, 'MANISH GUPTA'),
('106', 123106, 'ASIM BANERJEE'),
('107', 123107, 'RAHUL MUTHU'),
('108', 123108, 'SRIKRISHNAN DIVAKARAN'),
('109', 123109, 'SANJAY SIRVASTAV'),
('110', 123110, 'RADHA PARIKH'),
('111', 123111, 'V SUNITA'),
('112', 123112, 'VIJAY CHAKKA');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `AcadYear` int(11) NOT NULL DEFAULT '0',
  `Semester` varchar(6) NOT NULL DEFAULT '',
  `CourseNo` varchar(5) NOT NULL DEFAULT '',
  `InstructorID` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`AcadYear`,`Semester`,`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`AcadYear`, `Semester`, `CourseNo`, `InstructorID`) VALUES
(2010, 'Autumn', 'CT151', '112'),
(2010, 'Autumn', 'CT201', '104'),
(2010, 'Autumn', 'EL122', '112'),
(2010, 'Autumn', 'EL201', '107'),
(2010, 'Autumn', 'HM132', '113'),
(2010, 'Autumn', 'HM553', '110'),
(2010, 'Autumn', 'IT114', '101'),
(2010, 'Autumn', 'IT231', '109'),
(2010, 'Autumn', 'IT314', '106'),
(2010, 'Autumn', 'IT557', '112'),
(2010, 'Autumn', 'PC312', '110'),
(2010, 'Autumn', 'SC105', '111'),
(2010, 'Summer', 'IT550', '111'),
(2010, 'Summer', 'PC312', '110'),
(2010, 'Winter', 'CT103', '103'),
(2010, 'Winter', 'EL103', '104'),
(2010, 'Winter', 'HM106', '113'),
(2010, 'Winter', 'IT101', '108'),
(2010, 'Winter', 'IT104', '109'),
(2010, 'Winter', 'IT201', '108'),
(2010, 'Winter', 'IT210', '102'),
(2010, 'Winter', 'IT301', '101'),
(2010, 'Winter', 'IT310', '106'),
(2010, 'Winter', 'IT412', '107'),
(2010, 'Winter', 'IT550', '111'),
(2010, 'Winter', 'IT555', '102'),
(2010, 'Winter', 'PC623', '101'),
(2010, 'Winter', 'SC116', '111'),
(2010, 'Winter', 'SC210', '105'),
(2010, 'Winter', 'SC311', '107'),
(2011, 'Autumn', 'CT151', '112'),
(2011, 'Autumn', 'CT201', '104'),
(2011, 'Autumn', 'EL122', '112'),
(2011, 'Autumn', 'EL201', '107'),
(2011, 'Autumn', 'HM132', '113'),
(2011, 'Autumn', 'HM553', '110'),
(2011, 'Autumn', 'IT114', '101'),
(2011, 'Autumn', 'IT231', '109'),
(2011, 'Autumn', 'IT314', '106'),
(2011, 'Autumn', 'IT557', '112'),
(2011, 'Autumn', 'PC312', '110'),
(2011, 'Autumn', 'SC105', '111'),
(2011, 'Summer', 'IT310', '106'),
(2011, 'Summer', 'IT412', '107'),
(2011, 'Summer', 'IT550', '111'),
(2011, 'Summer', 'IT557', '112'),
(2011, 'Winter', 'CT103', '103'),
(2011, 'Winter', 'EL103', '104'),
(2011, 'Winter', 'HM106', '113'),
(2011, 'Winter', 'IT101', '108'),
(2011, 'Winter', 'IT104', '109'),
(2011, 'Winter', 'IT201', '108'),
(2011, 'Winter', 'IT210', '102'),
(2011, 'Winter', 'IT301', '101'),
(2011, 'Winter', 'IT310', '106'),
(2011, 'Winter', 'IT412', '107'),
(2011, 'Winter', 'IT550', '111'),
(2011, 'Winter', 'IT555', '102'),
(2011, 'Winter', 'PC623', '101'),
(2011, 'Winter', 'SC116', '111'),
(2011, 'Winter', 'SC210', '105'),
(2011, 'Winter', 'SC311', '107'),
(2012, 'Autumn', 'CT151', '112'),
(2012, 'Autumn', 'CT201', '104'),
(2012, 'Autumn', 'EL122', '112'),
(2012, 'Autumn', 'EL201', '107'),
(2012, 'Autumn', 'HM132', '113'),
(2012, 'Autumn', 'HM553', '110'),
(2012, 'Autumn', 'IT114', '101'),
(2012, 'Autumn', 'IT231', '109'),
(2012, 'Autumn', 'IT314', '106'),
(2012, 'Autumn', 'IT557', '112'),
(2012, 'Autumn', 'PC312', '110'),
(2012, 'Autumn', 'SC105', '111'),
(2012, 'Summer', 'HM553', '110'),
(2012, 'Summer', 'IT412', '107'),
(2012, 'Summer', 'IT555', '102'),
(2012, 'Winter', 'CT103', '103'),
(2012, 'Winter', 'EL103', '104'),
(2012, 'Winter', 'HM106', '113'),
(2012, 'Winter', 'IT101', '108'),
(2012, 'Winter', 'IT104', '109'),
(2012, 'Winter', 'IT201', '108'),
(2012, 'Winter', 'IT210', '102'),
(2012, 'Winter', 'IT301', '101'),
(2012, 'Winter', 'IT310', '106'),
(2012, 'Winter', 'IT412', '107'),
(2012, 'Winter', 'IT550', '111'),
(2012, 'Winter', 'IT555', '102'),
(2012, 'Winter', 'PC623', '101'),
(2012, 'Winter', 'SC210', '105'),
(2012, 'Winter', 'SC311', '107');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ProgID` varchar(2) NOT NULL,
  `ProgName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ProgID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgID`, `ProgName`) VALUES
('1', 'B.Tech(ICT)'),
('2', 'M.Tech(ICT)'),
('3', 'M.Sc(IT)'),
('4', 'M.Sc(ICT)'),
('5', 'M.Sc(ICT ARD)'),
('6', 'M.Des');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `StudentID` varchar(9) NOT NULL DEFAULT '',
  `AcadYear` int(11) NOT NULL DEFAULT '0',
  `Semester` varchar(6) NOT NULL DEFAULT '',
  `CourseNo` varchar(5) NOT NULL DEFAULT '',
  `grade` varchar(2) DEFAULT NULL,
  `RegDate` date NOT NULL,
  PRIMARY KEY (`StudentID`,`AcadYear`,`Semester`,`CourseNo`),
  KEY `AcadYear` (`AcadYear`,`Semester`,`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`StudentID`, `AcadYear`, `Semester`, `CourseNo`, `grade`, `RegDate`) VALUES
('201001001', 2010, 'Autumn', 'SC105', '11', '0000-00-00'),
('201001001', 2011, 'Autumn', 'CT151', '11', '2011-07-22'),
('201001001', 2011, 'Autumn', 'EL122', '11', '2013-03-30'),
('201001001', 2011, 'Winter', 'HM106', '11', '2013-03-31'),
('201001001', 2012, 'Winter', 'IT101', '10', '2013-03-31'),
('201001002', 2011, 'Autumn', 'EL122', '11', '2013-03-31'),
('201001002', 2011, 'Winter', 'SC116', '11', '0000-00-00'),
('201001002', 2012, 'Autumn', 'CT151', '11', '0000-00-00'),
('201001002', 2012, 'Winter', 'IT104', '10', '0000-00-00'),
('201001003', 2011, 'Autumn', 'HM132', '11', '0000-00-00'),
('201001003', 2011, 'Winter', 'SC116', '11', '0000-00-00'),
('201001003', 2012, 'Autumn', 'SC105', '11', '0000-00-00'),
('201001003', 2012, 'Winter', 'IT104', '10', '0000-00-00'),
('201001004', 2011, 'Autumn', 'IT114', '10', '0000-00-00'),
('201001004', 2011, 'Winter', 'SC116', '11', '0000-00-00'),
('201001004', 2012, 'Autumn', 'SC105', '11', '0000-00-00'),
('201001004', 2012, 'Winter', 'IT104', '10', '0000-00-00'),
('201001005', 2011, 'Autumn', 'IT114', '10', '0000-00-00'),
('201001005', 2011, 'Winter', 'HM106', '11', '0000-00-00'),
('201001005', 2012, 'Autumn', 'SC105', '11', '0000-00-00'),
('201001005', 2012, 'Winter', 'CT103', '10', '0000-00-00'),
('201101001', 2011, 'Autumn', 'IT114', '10', '0000-00-00'),
('201101001', 2011, 'Winter', 'IT104', '10', '0000-00-00'),
('201101001', 2012, 'Autumn', 'SC105', '11', '0000-00-00'),
('201101001', 2012, 'Winter', 'CT103', '10', '0000-00-00'),
('201101002', 2011, 'Autumn', 'SC105', '11', '0000-00-00'),
('201101002', 2011, 'Winter', 'EL103', '10', '0000-00-00'),
('201101002', 2012, 'Autumn', 'CT151', '11', '0000-00-00'),
('201101002', 2012, 'Winter', 'CT103', '10', '0000-00-00'),
('201101003', 2011, 'Autumn', 'SC105', '11', '0000-00-00'),
('201101003', 2011, 'Winter', 'IT101', '10', '0000-00-00'),
('201101003', 2012, 'Autumn', 'EL122', '11', '0000-00-00'),
('201101003', 2012, 'Winter', 'CT103', '10', '0000-00-00'),
('201101004', 2011, 'Autumn', 'HM132', '11', '0000-00-00'),
('201101004', 2011, 'Winter', 'IT101', '10', '0000-00-00'),
('201101004', 2012, 'Autumn', 'EL122', '11', '0000-00-00'),
('201101004', 2012, 'Winter', 'CT103', '10', '0000-00-00'),
('201101005', 2011, 'Autumn', 'IT114', '10', '0000-00-00'),
('201101005', 2011, 'Winter', 'IT104', '10', '0000-00-00'),
('201101005', 2012, 'Autumn', 'HM132', '11', '0000-00-00'),
('201101005', 2012, 'Winter', 'EL103', '10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `StudentID` varchar(9) NOT NULL DEFAULT '',
  `AcadYear` int(11) NOT NULL DEFAULT '0',
  `Semester` varchar(6) NOT NULL DEFAULT '',
  `Spi` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`StudentID`,`AcadYear`,`Semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `AcadYear` decimal(4,0) NOT NULL,
  `Semester` varchar(30) NOT NULL,
  PRIMARY KEY (`AcadYear`,`Semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`AcadYear`, `Semester`) VALUES
(2010, 'Autumn'),
(2010, 'Summer'),
(2010, 'Winter'),
(2011, 'Autumn'),
(2011, 'Summer'),
(2011, 'Winter'),
(2012, 'Autumn'),
(2012, 'Summer'),
(2012, 'Winter'),
(2013, 'Autumn'),
(2013, 'Summer'),
(2013, 'Winter');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` varchar(9) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `ProgID` varchar(2) DEFAULT NULL,
  `Batch` int(11) DEFAULT NULL,
  `CPI` decimal(5,2) DEFAULT NULL,
  `Blood_Group` varchar(5) DEFAULT NULL,
  `Gender` varchar(4) DEFAULT NULL,
  `Percentage` int(11) DEFAULT NULL,
  `Name_Of_School` varchar(30) DEFAULT NULL,
  `Board` varchar(30) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `IdentificationMark` varchar(30) DEFAULT NULL,
  `Local_Address` varchar(30) DEFAULT NULL,
  `Permanent_Address` varchar(30) DEFAULT NULL,
  `Emergency_Address` varchar(30) DEFAULT NULL,
  `EmailID` varchar(30) NOT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `ProgID` (`ProgID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Password`, `Name`, `date_of_birth`, `ProgID`, `Batch`, `CPI`, `Blood_Group`, `Gender`, `Percentage`, `Name_Of_School`, `Board`, `Year`, `Height`, `IdentificationMark`, `Local_Address`, `Permanent_Address`, `Emergency_Address`, `EmailID`) VALUES
('201001001', '123456', 'anurag singh', '0000-00-00', '1', 2010, 8.00, 'O-ve', '', 82, 'DPS School', 'CBSE', 2008, 6, 'mole', 'Delhi', ' ', ' ', ''),
('201001002', 'sandeep', 'sandeep mertia', '0000-00-00', '1', 2010, 7.00, ' ', ' ', 0, ' ', ' ', 0, 0, ' ', ' ', ' ', ' ', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `registers_ibfk_1` FOREIGN KEY (`AcadYear`, `Semester`, `CourseNo`) REFERENCES `offers` (`AcadYear`, `Semester`, `CourseNo`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ProgID`) REFERENCES `program` (`ProgID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
