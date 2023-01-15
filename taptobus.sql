-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 11:12 AM
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
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`nic`, `fname`, `lname`, `email`, `mobileNo`, `password`) VALUES
('200000000012', 'Kasun', 'Gunawardhana', 'kasun@gmail.com', '0779243568', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC'),
('993136298V', 'Adheesha', 'Chamod', 'adheesha@gmail.com', '0779393562', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti');

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
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
