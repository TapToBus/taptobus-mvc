-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 09:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `telNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nic`, `fname`, `lname`, `email`, `mobileNo`, `telNo`, `password`, `pic`) VALUES
('admin001', '200001800597', 'kithsandu', 'rathnayake', 'kithsandurathnayake@gmail.com', '0714977687', '0412367465', '$2a$04$PdgxUIMB1SfZ6D26Isf3V.tjIaEecy0BgC711jdc0uf7Gb8CZaMfm', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_no` varchar(40) NOT NULL,
  `root_no` varchar(20) NOT NULL,
  `owner_name` varchar(40) NOT NULL,
  `pic` blob DEFAULT NULL,
  `nic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_no`, `root_no`, `owner_name`, `pic`, `nic`) VALUES
('NB-1134', 'E-2', 'Nirodha', NULL, '992710110V'),
('Nb-1234', 'E-6', 'Nirodha', NULL, '992710110V'),
('NB-1724', 'E-3', 'Nirodha', NULL, '992710110V'),
('NB-1824', 'E-3', 'Nirodha', NULL, '992710110V');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`ntcNo`, `nic`, `fname`, `lname`, `dob`, `email`, `mbileNo`, `telNo`, `ratings`, `rides`, `password`, `pic`, `status`, `verified`, `owner_nic`) VALUES
(67264, '968485765V', 'Lasantha', 'Rathnayake', '1996-03-17', 'lasantharathnayake@gmail.com', '0764580923', '0417512369', 5, 325, '', NULL, 0, 0, ''),
(672567, '935399765V', 'Siril', 'Jayasekara', '1993-04-12', 'siriljayasekara@gmail,com', '0747586923', '0417844869', 4, 114, '', NULL, 0, 0, ''),
(672678, '942399765V', 'Samantha', 'Kasthuriarachchi', '1994-03-23', 'samanthakasthuriarachchi@gmail.com', '0714586923', '0417844512', 4, 652, '', NULL, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `ntcNo` varchar(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `licenseNo` varchar(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`ntcNo`, `nic`, `licenseNo`, `fname`, `lname`, `dob`, `email`, `mobileNo`, `telNo`, `ratings`, `rides`, `password`, `pic`, `status`, `verified`, `owner_nic`) VALUES
('234142C', '992895765V', '234541245', 'dasith', 'basnayake', '0199-03-24', 'dasithbasnayake@gmail.com', '0775896523', '0417822869', 5, 123, '', NULL, 0, 0, ''),
('234328C', '199703234V', '234542897', 'Sandun', 'Rathnayake', '0000-00-00', 'SandunRathnayake@gmail.com', '0713235430', '0773544785', 4, 576, '', NULL, 0, 0, '20001800497'),
('365142C', '994389165V', '924342897', 'madhawa', 'weerasinghe', '1992-05-23', 'madhawaweerasinghe@gmail.com', '0778406542', '0410014512', 4, 90, '', NULL, 0, 0, '');

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
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`nic`, `fname`, `lname`, `email`, `mobileNo`, `password`, `pic`, `verified`) VALUES
('992710110V', 'Nirodha', 'Buddima', 'nirodha@gmail.com', '0778651237', '$2y$10$CaEHA/pazbIS29GXBKZ0fuTWtkiqc09Q2QGhoaR99XE4tJKUmPYw2', NULL, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`nic`, `fname`, `lname`, `email`, `mobileNo`, `password`, `pic`, `otp`, `verified`) VALUES
('200000000012', 'Kasun', 'Gunawardhana', 'kasun@gmail.com', '0779243568', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC', NULL, 0, 0),
('991255394V', 'Saman', 'Kumara', 'saman@gmail.com', '0771883291', '$2y$10$HCiy6j8bgrfKlutXnxH41.8o8sxptr4SaMTpCgak34zQeL50xyn3.', NULL, 0, 0),
('992128398V', 'Nirodha', 'Buddhima', 'nirodha@gmail.com', '0776531231', '$2y$10$jKtzWLGcr2fM/e77.GSTD.21t/LtX0Vnb04//tetAQCKsA.nCYz/.', NULL, 0, 0),
('992548398V', 'Hasantha', 'Kariyawasam', 'hasantha@gmail.com', '0772316541', '$2y$10$csB/LQO2U9OE6RwczJ3O/.Q9ugyeMOloMPEtx1hANOXK9HUcsY3w6', NULL, 0, 0),
('993136298V', 'Adheesha', 'Chamod', 'adheesha@gmail.com', '0779393562', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti', NULL, 0, 0),
('993711210V', 'Suchith', 'Sandumika', 'suchith@gmail.com', '0778751074', '$2y$10$VELEzo6M6ntzAuNGk5FgmeiIu67T5OhaCkieZ4Rljgd1txfhLyX0S', NULL, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`staff_no`, `first_name`, `last_name`, `nic`, `dob`, `mobile_no`, `tele_no`, `email`, `password_hash`, `pic`) VALUES
('staff001', 'Dasuni', 'Dewani', '992389765V', '1998-12-08', 776541297, 916541297, 'dasuni@gmail.com', '$2y$10$gXX3KS3QOOJCnzp.S3z/2ORgyqp/WbingkwD5TjFIavk8sZbxs8w2', NULL),
('staff002', 'nirodha', 'buddima', '993285965V', '1999-05-23', 712533001, 412213023, 'nirodhabuddima@gmail.com', '', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_bus`
--

INSERT INTO `temp_bus` (`bus_no`, `rating`, `driver_rating`, `conductor_rating`, `arrival`, `departure`, `date`, `from`, `to`, `available_seats`, `ticket_price`, `pic`) VALUES
('ND - 2319', 4, 4, 5, '12:40:00', '13:00:00', '2023-02-11', 'galle', 'hambantota', 23, '1030.00', '/img/bus/bus-img1.jpg'),
('ND - 2350', 2, 4, 3, '10:20:00', '10:40:00', '2023-02-11', 'galle', 'hambantota', 34, '1030.00', '/img/bus/bus-img2.jpeg'),
('ND - 2387', 5, 2, 5, '08:30:00', '08:50:00', '2023-02-12', 'galle', 'hambantota', 45, '930.00', '/img/bus/bus-img3.jpg'),
('ND - 3456', 3, 3, 3, '09:10:00', '09:30:00', '2023-02-11', 'galle', 'hambantota', 13, '1030.00', '/img/bus/bus-img4.jpg'),
('ND - 5602', 4, 2, 5, '10:00:00', '10:20:00', '2023-02-12', 'galle', 'hambantota', 40, '930.00', '/img/bus/bus-img5.jpg'),
('ND - 6710', 5, 3, 4, '13:30:00', '13:50:00', '2023-02-11', 'galle', 'hambantota', 13, '1030.00', '/img/bus/bus-img6.jpg'),
('ND - 7629', 3, 4, 4, '14:20:00', '14:40:00', '2023-02-12', 'galle', 'hambantota', 50, '1030.00', '/img/bus/bus-img1.jpg'),
('ND - 8712', 3, 4, 2, '16:00:00', '16:20:00', '2023-02-11', 'galle', 'hambantota', 27, '1030.00', '/img/bus/bus-img2.jpeg'),
('ND - 8973', 3, 4, 4, '12:30:00', '12:50:00', '2023-02-12', 'galle', 'hambantota', 5, '930.00', '/img/bus/bus-img3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `type`, `password`) VALUES
('adheesha@gmail.com', 'passenger', '$2y$10$9Rhho3cXv6nIE5RjAsVqs.UsrsAPsLMBAQVDVTw2DogOvRa3j9wti'),
('dasuni@gmail.com', 'staff', '$2y$10$gXX3KS3QOOJCnzp.S3z/2ORgyqp/WbingkwD5TjFIavk8sZbxs8w2'),
('kasun@gmail.com', 'passenger', '$2y$10$pwsV0iUxIqX785QcllwCGOklzVY0NgGRKRwerluRNLfWlfKgb.guC'),
('kithsandurathnayake@gmail.com', 'admin', '$2a$04$PdgxUIMB1SfZ6D26Isf3V.tjIaEecy0BgC711jdc0uf7Gb8CZaMfm'),
('nirodha@gmail.com', 'owner', '$2y$10$CaEHA/pazbIS29GXBKZ0fuTWtkiqc09Q2QGhoaR99XE4tJKUmPYw2'),
('suchith@gmail.com', 'passenger', '$2y$10$VELEzo6M6ntzAuNGk5FgmeiIu67T5OhaCkieZ4Rljgd1txfhLyX0S');

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
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_no`),
  ADD UNIQUE KEY `bus_no` (`bus_no`),
  ADD KEY `fk_ownbus` (`nic`);

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
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `fk_ownbus` FOREIGN KEY (`nic`) REFERENCES `owner` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
