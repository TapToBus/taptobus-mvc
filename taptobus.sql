-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 01:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taptobus`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbus`
--

CREATE TABLE `addbus` (
  `bus_no` varchar(20) NOT NULL,
  `root_no` varchar(20) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `NIC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addbus`
--

INSERT INTO `addbus` (`bus_no`, `root_no`, `owner_name`, `NIC`) VALUES
(' NB-1324', 'A-14', ' Vimukthi', NULL),
(' NB-1344', ' B-58', ' Lahiru', '990010110V'),
('Nb-1230', 'A-11', ' Lahiru', '990010110V'),
('NB-1234', 'A-10', 'Nirodha', NULL),
('NB-124', 'A-10', 'Buddhima', NULL),
('Nb-1241', 'A-11', 'Lahiru', '990010110V'),
('Nb-1245', 'A-10', 'Buddhima', NULL),
('Nb-1246', 'A-10', 'Charith New', NULL),
('Nb-1247', 'A-15', ' New', NULL),
('Nb-1248', 'A-11', 'Wimal', NULL),
('Nb-1249', 'A-12', 'Tharindu', NULL),
('Nb-1250', 'A-12', 'Wimal', NULL),
('Nb-1345', 'A-15', 'Jayakodi', NULL),
('Nb-1545', 'A-11', ' Lahiru', '990010110V'),
('Nb-1934', 'A-10', ' Lahiru', '990010110V'),
('Nb-7854', 'A-104', 'Charith', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_no` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `tele_no` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_no`, `name`, `nic`, `dob`, `Address`, `mobile_no`, `tele_no`, `email`, `password_hash`) VALUES
(1, 'kithsandu', '200001800497', '2000-01-18', 'No11,welegoda,matara', 714755487, 417859648, 'kithsandurathnayake@gmail.com', '$2y$10$8K9t7vB4zwmy/1V9LRFMMu415jSrGNZ4FgMTwPBnUvuVed2DO4EYK'),
(2, 'kithsandu', '123456789876', '2022-11-09', 'welegoda,matara', 34567, 324567, 'ucsc@stu1.com', '$2y$10$8K9t7vB4zwmy/1V9LRFMMu415jSrGNZ4FgMTwPBnUvuVed2DO4EYK'),
(4, 'Janith', '100000000', '2015-12-27', 'welegoda,matara', 701325647, 117418529, 'kithsandurathnayake+1@gmail.com', '$2y$10$CNy4guJuPuT/TEdpJrTIVuBE/T2IN4UXESHG2V5eRKSi1JQQVANLu'),
(5, 'sandun', '837264872V', '2022-12-08', 'dewata,galle', 715655635, 415677678, 'admin@123gmail.com', '$2y$10$my4kprvYszLmgYmbSDBa..QviP5JtRL.j/74/sA5irlerEivxtaXK');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `NIC` varchar(12) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`NIC`, `f_name`, `l_name`, `mobile_no`, `email`, `password_hash`, `type`) VALUES
('990010110V', '  Lahiru', 'Madhushanka', 712357589, 'lahiru@gmail.com', '$2y$10$MQq3ACeFnUO3cSTHkvMEaeh98zuu.MCvpoBAzXaQc9UdCp1V0NARC', 'owner'),
('992700011V', 'Miyuru', 'Prabath', 712357599, 'miyuru@gmail.com', '$2y$10$uIbs.khUaboyUsFMW0Gwz.gP.rgpRifR7WyOv/ycDpUUMNXjys4Sa', 'owner'),
('992711110V', 'Nirodh', 'Buddhim', 765367389, 'nirodha2@gmail.com', '$2y$10$7K40mCn2hGGXCeCF94zWxebbOpx.vXCgx/CgL74fjWb1UP6WsnZ0W', 'owner'),
('992711111V', 'Lasith', 'Madhusanka', 765357589, 'lasith@gmail.com', '$2y$10$8ySpz0KSYxLT8.KWYTYyR.RTjckOtNhHfQfiTBYx61yRLh0HRYinu', 'owner'),
('992718110V', 'Nirodhaq', 'Buddhimaq', 765359589, 'nirodha@gmail.com', '$2y$10$jTSupTEfsDavWxkVLwSAmeteyCsd3xgz/DJyzl87RkdVXJiOyalOO', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pwd_hash` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `otp` int(6) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`nic`, `fname`, `lname`, `email`, `mobile`, `pwd_hash`, `pic`, `otp`, `verified`) VALUES
('992166398V', 'Adheesha', 'Chamod', 'adheesha@gmail.com', '0779293569', '$2y$10$sDc4a24gE7VaPDypY3Gx2OSt/c3thzaS9GZbKLRbcXkCuxoOSSGzG', NULL, NULL, 0),
('992166798V', 'Saman', 'Kumara', 'saman@gmail.com', '0779293569', '$2y$10$0Ne6ikmEgPGDrVm5fDyegOAJjvc4nS5gO2v9AjkH2zma58sTKzK56', NULL, NULL, 0),
('992181321V', 'Rusiru', 'Rathmna', 'rusiru@gmail.com', '0779293566', '$2y$10$mWsfMDdweXIdUeYUKb4Gm./B5wbNo3LUhkboAlLDlyZcu.AF4A.vW', NULL, NULL, 0),
('992345192V', 'Dasuni', 'Dewani', 'dasuni@gmail.com', '0775641298', '$2y$10$TetSwPf4yq1yyIpJ/bLRvORqlGCmocMcCRz.jtH1YAIsSNc8JsXz2', NULL, NULL, 0),
('993865347V', 'Kithsandu', 'Rathnayake', 'kithsandu@gmail.com', '0777188329', '$2y$10$Sz7Oir3rIdD3XPd/b3lDGOfULBUkJIjpWps81cFzIQyCG5Vk1aiLO', NULL, NULL, 0),
('998712345V', 'Nirodha', 'Buddima', 'nirodha@gmail.com', '0761956429', '$2y$10$xyU0T7Ib0j1yVV3PsCu0PuddGZyZGFRd.ejhC0C1ZJUSdPVxW6eL2', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `saved_cards`
--

CREATE TABLE `saved_cards` (
  `card_no` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `holder` varchar(50) NOT NULL,
  `exp_month` varchar(2) NOT NULL,
  `exp_year` varchar(4) NOT NULL,
  `cvn` varchar(3) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_cards`
--

INSERT INTO `saved_cards` (`card_no`, `name`, `holder`, `exp_month`, `exp_year`, `cvn`, `nic`, `pic`) VALUES
('2131331312313156', 'BOC', 'Dasuni', '4', '2024', '231', '992166398V', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `special_notices`
--

CREATE TABLE `special_notices` (
  `notice_id` int(11) NOT NULL,
  `staff_no` varchar(8) NOT NULL COMMENT 'staff001',
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_notices`
--

INSERT INTO `special_notices` (`notice_id`, `staff_no`, `title`, `description`, `time_stamp`, `date_from`, `date_to`) VALUES
(1, 'staff001', 'sample text 1', 'this is the first sample notice\r\n', '2023-02-04 00:39:07', '2023-02-10', '2023-02-19'),
(2, 'staff001', 'sample text 2', 'this is the second sample notice', '2023-02-04 00:49:20', '2023-02-22', '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `staffmember`
--

CREATE TABLE `staffmember` (
  `staff_no` varchar(8) NOT NULL COMMENT 'ex:staff001',
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `tele_no` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`staff_no`, `first_name`, `last_name`, `nic`, `dob`, `mobile_no`, `tele_no`, `email`, `password_hash`) VALUES
('staff001', 'dasuni', 'dewani', '987653425V', '1998-12-08', 762323456, 415346432, 'dasuni@gmail.com', '$2y$10$IM78JxSxBr2gvto2QHzl9OhZltJBo4y4kaMnXl6J2afMiWuyxQOnq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbus`
--
ALTER TABLE `addbus`
  ADD PRIMARY KEY (`bus_no`),
  ADD KEY `NIC` (`NIC`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_no`),
  ADD UNIQUE KEY `admin_no` (`admin_no`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileno` (`mobile_no`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `saved_cards`
--
ALTER TABLE `saved_cards`
  ADD PRIMARY KEY (`card_no`),
  ADD KEY `owns` (`nic`);

--
-- Indexes for table `special_notices`
--
ALTER TABLE `special_notices`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `special_staff_fk` (`staff_no`);

--
-- Indexes for table `staffmember`
--
ALTER TABLE `staffmember`
  ADD PRIMARY KEY (`staff_no`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_notices`
--
ALTER TABLE `special_notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addbus`
--
ALTER TABLE `addbus`
  ADD CONSTRAINT `addbus_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `owner` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved_cards`
--
ALTER TABLE `saved_cards`
  ADD CONSTRAINT `owns` FOREIGN KEY (`nic`) REFERENCES `passenger` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `special_notices`
--
ALTER TABLE `special_notices`
  ADD CONSTRAINT `special_staff_fk` FOREIGN KEY (`staff_no`) REFERENCES `staffmember` (`staff_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
