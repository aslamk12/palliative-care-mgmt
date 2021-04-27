-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 09:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santhwanam`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_volunteer`
--

CREATE TABLE `assign_volunteer` (
  `assv_id` int(5) NOT NULL,
  `volunteer` int(5) NOT NULL,
  `patient` int(5) NOT NULL,
  `assigned_on` date NOT NULL,
  `ass_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_volunteer`
--

INSERT INTO `assign_volunteer` (`assv_id`, `volunteer`, `patient`, `assigned_on`, `ass_status`) VALUES
(12, 3, 1, '2021-04-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `uname`, `password`, `type`, `status`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin', ''),
(4, '7736918949', 'aslam123', 'volunteer', 'approved'),
(5, '9567105862', 'qwerty', 'volunteer', 'approved'),
(6, '9876543210', 'aslam123', 'patient', 'pending'),
(8, '9865321470', 'anas123', 'patient', 'pending'),
(9, '9871234560', 'althaf123', 'volunteer', 'pending'),
(11, '8136877801', '12345678', 'nurse', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `medical_report`
--

CREATE TABLE `medical_report` (
  `mr_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `medicines` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `report_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `place` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nid`, `name`, `mobile`, `gender`, `dob`, `place`, `address`) VALUES
(1, 'sheela', 8136877801, 'Female', '2002-12-01', 'edapal', 'sheela villa');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(5) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `place` varchar(25) NOT NULL,
  `panchayath` varchar(25) NOT NULL,
  `ward` int(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `mobile`, `dob`, `gender`, `place`, `panchayath`, `ward`, `address`, `pincode`) VALUES
(1, 'aslam', 9876543210, '2000-04-10', 'male', 'qwerty', 'qwerty', 5, 'qwerty', 679579),
(3, 'anas k', 9865321470, '2000-04-01', 'male', 'edapal', 'edapal', 5, 'kallingal', 679576);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `vid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `dob` date NOT NULL,
  `place` varchar(20) NOT NULL,
  `panchayath` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`vid`, `name`, `mobile`, `dob`, `place`, `panchayath`, `address`) VALUES
(3, 'aslam', 7736918949, '1998-07-18', 'edapal', 'edapal', 'kallingal'),
(4, 'qwerty', 9567105862, '2001-04-02', 'qwerty', 'qwerty', 'qwerty'),
(5, 'althaf', 9871234560, '2000-04-01', 'edapal', 'edapal', 'kallingal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_volunteer`
--
ALTER TABLE `assign_volunteer`
  ADD PRIMARY KEY (`assv_id`),
  ADD KEY `volunteer` (`volunteer`),
  ADD KEY `assign_volunteer_ibfk_1` (`patient`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `medical_report`
--
ALTER TABLE `medical_report`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_volunteer`
--
ALTER TABLE `assign_volunteer`
  MODIFY `assv_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `vid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_volunteer`
--
ALTER TABLE `assign_volunteer`
  ADD CONSTRAINT `assign_volunteer_ibfk_1` FOREIGN KEY (`patient`) REFERENCES `patient` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
