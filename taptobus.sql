-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 05:42 PM
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
('993136298V', 'Adheesha', 'Chamod', 'adheesha@gmail.com', '0779393562', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` varchar(8) NOT NULL COMMENT 'ex: staff001',
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('kasun@gmail.com', 'passenger', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC');

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
