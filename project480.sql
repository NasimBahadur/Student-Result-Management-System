-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 06:53 PM
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
-- Database: `project480`
--

-- --------------------------------------------------------

--
-- Table structure for table `gradepoint`
--

CREATE TABLE `gradepoint` (
  `studentId` varchar(13) NOT NULL,
  `semester` int(11) NOT NULL,
  `cgpa` float DEFAULT NULL,
  `gpa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradepoint`
--

INSERT INTO `gradepoint` (`studentId`, `semester`, `cgpa`, `gpa`) VALUES
('2018-1-60-066', 1, 3.75, 3.75),
('2018-1-60-066', 2, 3.61, 3.59),
('2018-1-60-073', 2, 3.61, 3.75),
('2018-1-60-073', 1, 3.81, 3.81);

-- --------------------------------------------------------

--
-- Table structure for table `gradesheet`
--

CREATE TABLE `gradesheet` (
  `studentId` varchar(13) NOT NULL,
  `semester` int(11) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  `credit` float DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradesheet`
--

INSERT INTO `gradesheet` (`studentId`, `semester`, `courseId`, `credit`, `grade`) VALUES
('2018-1-60-066', 1, 'CSE251', 4, 'A-'),
('2018-1-60-066', 2, 'CSE245', 4, 'A'),
('2018-1-60-066', 1, 'CSE360', 3, 'A-'),
('2018-1-60-066', 2, 'PHY209', 3, 'B-'),
('2018-1-60-066', 2, 'CSE365', 4, 'A+'),
('2018-1-60-066', 1, 'CSE350', 3, 'A-'),
('2018-1-60-073', 2, 'CSE345', 4, 'A'),
('2018-1-60-073', 2, 'CSE360', 3, 'A-'),
('2018-1-60-073', 1, 'CSE251', 4, 'B-'),
('2018-1-60-073', 1, 'CSE245', 4, 'B+'),
('2018-1-60-073', 2, 'CSE365', 4, 'A'),
('2018-1-60-073', 2, 'CSE350', 3, 'A-'),
('2018-1-60-073', 1, 'ECO102', 3, 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `studentId` varchar(13) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  `attendance` float DEFAULT NULL,
  `assignment` float DEFAULT NULL,
  `project` float DEFAULT NULL,
  `lab` float DEFAULT NULL,
  `quiz` float DEFAULT NULL,
  `mid1` float DEFAULT NULL,
  `mid2` float DEFAULT NULL,
  `final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`studentId`, `courseId`, `attendance`, `assignment`, `project`, `lab`, `quiz`, `mid1`, `mid2`, `final`) VALUES
('2018-1-60-066', 'CSE365', 5, 0, 10, 10, 15, 20, 20, 20),
('2018-1-60-066', 'CSE360', 5, 0, 10, 10, 15, 20, 20, 20),
('2018-1-60-066', 'CSE350', 5, 5, 5, 10, 15, 20, 20, 20),
('2018-1-60-073', 'CSE365', 5, 0, 10, 10, 15, 20, 20, 20),
('2018-1-60-073', 'CSE360', 5, 0, 10, 10, 15, 20, 20, 20),
('2018-1-60-073', 'CSE350', 5, 5, 5, 10, 15, 20, 20, 20),
('2018-1-60-073', 'CSE345', 5, 0, 10, 10, 15, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `studentId` varchar(13) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`studentId`, `firstName`, `lastName`, `email`, `phone`, `birthdate`, `gender`, `password`) VALUES
('2018-1-60-066', 'Abdullah Abdur', 'Rahman', '2018-1-60-066@std.ewubd.edu', '01811110000', '1997-02-10', 'male', '23456'),
('2018-1-60-073', 'Nasim', 'Bahadur', '2018-1-60-073@std.ewubd.edu', '01800001111', '1998-04-12', 'male', '12345'),
('Admin1', 'Abdur', 'Rahman', 'admin1@ewubd.edu', '01711110000', '1987-12-11', 'male', '3456'),
('Admin2', 'Sakirul', 'Islam', 'admin2@ewubd.edu', '01700001111', '0000-00-00', 'male', '4567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`studentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
