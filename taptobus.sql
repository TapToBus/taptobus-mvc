-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 10:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(8) NOT NULL COMMENT 'ex: admin001',
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `ntcNo` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mbileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `ratings` int(2) NOT NULL DEFAULT 0,
  `rides` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `verified` int(1) NOT NULL DEFAULT 0,
  `owner_nic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `ntcNo` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `licenseNo` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `ratings` int(2) NOT NULL DEFAULT 0,
  `rides` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `verified` int(1) NOT NULL DEFAULT 0,
  `owner_nic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `otp` int(6) NOT NULL DEFAULT 0,
  `verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`nic`, `fname`, `lname`, `email`, `mobileNo`, `password`, `pic`, `otp`, `verified`) VALUES
('200000000012', 'Kasun', 'Gunawardhana', 'kasun@gmail.com', '0779243568', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC', NULL, 0, 0),
('991255394V', 'Saman', 'Kumara', 'saman@gmail.com', '0771883291', '$2y$10$HCiy6j8bgrfKlutXnxH41.8o8sxptr4SaMTpCgak34zQeL50xyn3.', NULL, 0, 0),
('992548398V', 'Hasantha', 'Kariyawasam', 'hasantha@gmail.com', '0772316541', '$2y$10$csB/LQO2U9OE6RwczJ3O/.Q9ugyeMOloMPEtx1hANOXK9HUcsY3w6', NULL, 0, 0),
('993136298V', 'Adheesha', 'Chamod', 'adheesha@gmail.com', '0779393562', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti', NULL, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `password_hash` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`staff_no`, `first_name`, `last_name`, `nic`, `dob`, `mobile_no`, `tele_no`, `email`, `password_hash`, `pic`) VALUES
('staff001', 'Dasuni', 'Dewani', '992389765V', '1998-12-08', 776541297, 916541297, 'dasuni@gmail.com', '$2y$10$gXX3KS3QOOJCnzp.S3z/2ORgyqp/WbingkwD5TjFIavk8sZbxs8w2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_bus`
--

CREATE TABLE `temp_bus` (
  `bus_no` varchar(10) NOT NULL,
  `rating` int(2) NOT NULL,
  `driver_rating` int(2) NOT NULL,
  `conductor_rating` int(2) NOT NULL,
  `arrival` time NOT NULL,
  `departure` time NOT NULL,
  `date` date NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `available_seats` int(2) NOT NULL,
  `ticket_price` decimal(6,2) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_bus`
--

INSERT INTO `temp_bus` (`bus_no`, `rating`, `driver_rating`, `conductor_rating`, `arrival`, `departure`, `date`, `from`, `to`, `available_seats`, `ticket_price`, `pic`) VALUES
('ND - 2319', 4, 4, 5, '12:40:00', '13:00:00', '2023-02-11', 'galle', 'hambantota', 23, '1030.00', ''),
('ND - 2350', 2, 4, 3, '10:20:00', '10:40:00', '2023-02-11', 'galle', 'hambantota', 34, '1030.00', ''),
('ND - 2387', 5, 2, 5, '08:30:00', '08:50:00', '2023-02-12', 'galle', 'hambantota', 45, '930.00', ''),
('ND - 3456', 3, 3, 3, '09:10:00', '09:30:00', '2023-02-11', 'galle', 'hambantota', 13, '1030.00', ''),
('ND - 5602', 4, 2, 5, '10:00:00', '10:20:00', '2023-02-12', 'galle', 'hambantota', 40, '930.00', ''),
('ND - 6710', 5, 3, 4, '13:30:00', '13:50:00', '2023-02-11', 'galle', 'hambantota', 13, '1030.00', ''),
('ND - 7629', 3, 4, 4, '14:20:00', '14:40:00', '2023-02-12', 'galle', 'hambantota', 50, '1030.00', ''),
('ND - 8712', 3, 4, 2, '16:00:00', '16:20:00', '2023-02-11', 'galle', 'hambantota', 27, '1030.00', ''),
('ND - 8973', 3, 4, 4, '12:30:00', '12:50:00', '2023-02-12', 'galle', 'hambantota', 5, '930.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `type`, `password`) VALUES
('adheesha@gmail.com', 'passenger', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti'),
('dasuni@gmail.com', 'staff', '$2y$10$gXX3KS3QOOJCnzp.S3z/2ORgyqp/WbingkwD5TjFIavk8sZbxs8w2'),
('hasantha@gmail.com', 'passenger', '$2y$10$csB/LQO2U9OE6RwczJ3O/.Q9ugyeMOloMPEtx1hANOXK9HUcsY3w6'),
('kasun@gmail.com', 'passenger', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC'),
('saman@gmail.com', 'passenger', '$2y$10$HCiy6j8bgrfKlutXnxH41.8o8sxptr4SaMTpCgak34zQeL50xyn3.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`ntcNo`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mbileNo` (`mbileNo`),
  ADD KEY `conductor_works_under` (`owner_nic`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`ntcNo`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `licenseNo` (`licenseNo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`),
  ADD KEY `driver_works_under` (`owner_nic`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

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
-- Indexes for table `temp_bus`
--
ALTER TABLE `temp_bus`
  ADD PRIMARY KEY (`bus_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `special_notices`
--
ALTER TABLE `special_notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_works_under` FOREIGN KEY (`owner_nic`) REFERENCES `owner` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_works_under` FOREIGN KEY (`owner_nic`) REFERENCES `owner` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `special_notices`
--
ALTER TABLE `special_notices`
  ADD CONSTRAINT `special_staff_fk` FOREIGN KEY (`staff_no`) REFERENCES `staffmember` (`staff_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
