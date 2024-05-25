-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 09:11 AM
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
-- Database: `event_management_uiu`
--

-- --------------------------------------------------------

--
-- Table structure for table `abl_venue`
--

CREATE TABLE `abl_venue` (
  `id` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `free_slot` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `venue_Type` varchar(255) NOT NULL,
  `additional` varchar(255) DEFAULT NULL,
  `unique_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `abl_venue`
--

INSERT INTO `abl_venue` (`id`, `venue`, `capacity`, `free_slot`, `date`, `venue_Type`, `additional`, `unique_id`) VALUES
(1, 'Room 123', 40, '12:00 PM - 1:00 PM', '2023-05-10', 'Classroom', 'Random text', '0'),
(2, 'Room 456', 40, '2:00 PM - 3:00 PM', '2023-05-12', 'Lab', 'Random text', '0'),
(3, 'Room 789', 40, '2:00 PM - 3:00 PM', '2023-05-14', 'Classroom', 'Random text', '0'),
(4, 'Room 101', 40, '2:00 PM - 3:00 PM', '2023-05-16', 'Lab', 'Random text', '0'),
(5, 'Room 202', 40, '2:00 PM - 3:00 PM', '2023-05-18', 'Classroom', 'Random text', '0'),
(6, 'Room 303', 40, '10:00 PM - 3:00 PM', '2023-05-20', 'Lab', 'Random text', '0'),
(7, 'Room 404', 40, '08:30 PM - 4:00 PM', '2023-05-26', 'Classroom', 'Random text', '0'),
(8, 'Room 505', 40, '10:00 PM - 11:00 PM', '2023-05-28', 'Lab', 'Random text', '1'),
(9, 'Auditorium ', 300, '2:00 PM - 4:00 PM', '2023-05-22', 'Auditorium', 'Random text', '1'),
(10, 'Multipurpose Hall ', 120, '1:00 PM - 4:00 PM', '2023-05-24', 'Multipurpose Hall', 'Random text', '0');

-- --------------------------------------------------------

--
-- Table structure for table `booked_venue`
--

CREATE TABLE `booked_venue` (
  `id` int(11) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `additional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booked_venue`
--

INSERT INTO `booked_venue` (`id`, `venue`, `capacity`, `date`, `time`, `booked_by`, `additional`) VALUES
(1, 'Room 123', 50, '2023-05-01', '14:00:00', 'Computer Club', NULL),
(2, 'Room 101', 2020, '2023-06-15', '09:00:00', 'Bob Johnson', NULL),
(3, 'Room 101', 2020, '2023-06-15', '09:00:00', 'Bob Johnson', NULL),
(8, 'Room 123', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(9, 'Room 123', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(10, 'Room 505', 101, '2023-05-01', '14:00:00', 'Jane Smith', NULL),
(11, 'Room 505', 101, '2023-05-01', '14:00:00', 'Jane Smith', NULL),
(12, 'Room 404', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(13, 'Room 404', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(14, 'Room 505', 101, '2023-04-19', '14:00:00', 'Jane Smith', NULL),
(15, 'Room 505', 101, '2023-04-19', '14:00:00', 'Jane Smith', NULL),
(16, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(17, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(20, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(21, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(32, 'Room 202', 1000, '2023-04-04', '00:00:11', 'CyberSecurity', NULL),
(33, 'Room 202', 1000, '2023-04-04', '00:00:11', 'CyberSecurity', NULL),
(36, '3', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(37, '3', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(38, '2', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(39, '2', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(40, '9', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(41, '9', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(44, 'Room 456', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(45, 'Room 456', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(46, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(47, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(49, 'Auditorium ', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(50, 'Auditorium ', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(51, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(52, 'Room 505', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(53, 'Room 456', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(54, 'Room 456', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(55, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(56, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(57, 'Room 404', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(58, 'Room 404', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(59, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(60, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(61, 'Room 505', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(62, 'Room 505', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(63, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(64, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(65, 'Room 101', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(66, 'Room 101', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(67, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(68, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(69, 'Room 303', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(70, 'Room 303', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(71, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(72, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(73, 'Room 123', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(74, 'Room 123', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(75, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(76, '', 100, '2023-04-26', '00:00:10', 'Cyber Security on TOp', NULL),
(77, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(78, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(79, '2', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(80, '2', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(85, '3', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(86, '3', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(87, 'Room 789', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(88, 'Room 789', 100, '2023-04-27', '00:00:10', 'Cyber Security on TOp', NULL),
(89, 'Room 404', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(90, 'Room 404', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(91, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(92, '', 342, '2023-04-20', '00:00:10', 'Cyber Security', NULL),
(93, '', 1000, '2023-04-04', '00:00:11', 'CyberSecurity', NULL),
(94, '', 1000, '2023-04-04', '00:00:11', 'CyberSecurity', NULL),
(95, '', 2020, '2023-04-26', '09:00:00', 'Bob Johnson', NULL),
(96, '', 2020, '2023-04-26', '09:00:00', 'Bob Johnson', NULL),
(97, 'Room 456', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL),
(98, 'Room 456', 101, '2023-04-26', '14:00:00', 'Jane Smith', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `participants` int(11) NOT NULL,
  `date` date NOT NULL,
  `venue_type` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `additional_details` text DEFAULT NULL,
  `support_num` varchar(255) DEFAULT NULL,
  `support_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `booking_id` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `full_name`, `org_name`, `contact_num`, `email`, `event_type`, `participants`, `date`, `venue_type`, `time`, `additional_details`, `support_num`, `support_name`, `status`, `comment`, `booking_id`, `created_on`) VALUES
(1, 'John Doe', 'exampl', '123-456-7890', 'johndoe@eample.com', 'Auditorium', 50, '2023-04-27', 'Room 101', '01:33:00', 'Need projector and microphones', NULL, NULL, 'Pending', NULL, 'ABC123', '2023-04-27 08:51:03'),
(2, 'Jane Smith', 'UIU Photography Club', '555-555-1212', 'rizhayasvoloch@btcmod.com', 'Auditorium', 101, '2023-04-26', 'Room 505', '14:00:00', 'Catering required', NULL, NULL, 'Approved', '', 'XYZ456', '2023-04-27 08:51:03'),
(3, 'Hasirama', 'New Club', '999-123-4567', 'rizhayasvoloch@btcmod.com', 'Training Session', 2020, '2023-04-26', 'Room 103', '09:00:00', NULL, NULL, NULL, 'Cancelled', 'Date is not empty', '123XYZ', '2023-04-27 08:51:03'),
(4, 'Cyber Security', 'Computer Club	', '342', 'rizhayasvoloch@btcmod.com', 'wedding', 342, '2023-04-20', 'Auditorium', '00:00:10', 'nbjvhjgcfxds', '10', 'asdf', 'Approved', 'No slot empty', '64291b4ec99c4', '2023-04-27 08:51:03'),
(5, 'Cyber Security on TOp', 'Computer Club', '018326594', 'rizhayasvoloch@btcmod.com', 'Workshop', 100, '2023-04-27', 'Room 123', '00:00:10', 'asdf', '0125698', 'adsf', 'Pending', 'No slot empty', '6429215eba27a', '2023-04-27 08:51:03'),
(7, 'CyberSecurity', 'UIU Photography Club', '7205478570', 'rizhayasvoloch@btcmod.com', 'Events', 1000, '2023-04-04', 'Room 505', '00:00:11', 'gcmsrdrhdtc', '0125948753', 'Asif', 'Pending', NULL, '6446c7b949d61', '2023-04-27 08:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `todays_event`
--

CREATE TABLE `todays_event` (
  `id` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `booked_by` varchar(255) NOT NULL,
  `additional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abl_venue`
--
ALTER TABLE `abl_venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_venue`
--
ALTER TABLE `booked_venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todays_event`
--
ALTER TABLE `todays_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abl_venue`
--
ALTER TABLE `abl_venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booked_venue`
--
ALTER TABLE `booked_venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `todays_event`
--
ALTER TABLE `todays_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
