-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2024 at 06:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrAttendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `yr_sec` int(11) NOT NULL,
  `group_no` int(11) NOT NULL,
  `status` text NOT NULL,
  `attendatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `path` text NOT NULL,
  `name` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `user_id`, `path`, `name`, `datetime`) VALUES
(1, '668d462217bee', 'avatar/student/9488f04b62741d606815dd802e838848/', 'firstupdate.png', '2024-07-09 10:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_inventory_logs`
--

CREATE TABLE `faculty_inventory_logs` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_no`
--

CREATE TABLE `group_no` (
  `id` int(11) NOT NULL,
  `group_number` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_no`
--

INSERT INTO `group_no` (`id`, `group_number`) VALUES
(1, 'G1'),
(2, 'G2');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_id`, `path`, `name`, `datetime`) VALUES
(1, '6690f2d1880e2', 'avatar/faculty/items/d43b3125170dcefe0547aa9d6e9f8329/', 'wuwa.jpg', '2024-07-12 05:09:37'),
(2, '66924a205a638', 'avatar/faculty/items/92c670914742d837a0ee04d84d062741/', 'emailfixed.png', '2024-07-13 05:34:24'),
(3, '66924b15dc543', 'avatar/faculty/items/c66643c37af1ae409871528d289f22ec/', 'emailfixed.png', '2024-07-13 05:38:29'),
(4, '66924b36c8fa3', 'avatar/faculty/items/d74d94897d45f301f4843f5ba7f6f0b7/', 'emailfixed.png', '2024-07-13 05:39:02'),
(5, '66924bb5afb22', 'avatar/faculty/items/9f74d29ad937e7decae1903746bd2681/', 'emailfixed.png', '2024-07-13 05:41:09'),
(6, '66924bcfcffd6', 'avatar/faculty/items/00740f3c0578f278b554e792aff7e284/', 'emailfixed.png', '2024-07-13 05:41:35'),
(7, '66924cadf000c', 'avatar/faculty/items/c209dd24b6fce8b036aa670bd83b6d85/', 'isulogo_1.png', '2024-07-13 05:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_id`, `faculty_id`, `item_name`, `quantity`, `datetime`, `modified`) VALUES
(15, '66924cadf000c', 2, 'Macbook Pro ', 2, '2024-07-13 05:45:17', '2024-07-13 05:45:17'),
(16, '6692747338d0c', 3, 'Poster Lang ', 1, '2024-07-13 08:34:59', '2024-07-13 08:34:59'),
(17, '6692890380cd2', 7, 'Flashlights ', 1, '2024-07-13 10:02:43', '2024-07-13 10:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_code`
--

INSERT INTO `qr_code` (`id`, `item_id`, `path`, `name`, `datetime`) VALUES
(1, '66924bcfcffd6', 'avatar/faculty/qrs/66924bcfcffd6/', 'Macbook Pro', '2024-07-13 05:41:35'),
(2, '66924cadf000c', 'avatar/faculty/qrs/66924cadf000c/', 'Macbook Pro.png', '2024-07-13 05:45:17'),
(3, '6692747338d0c', 'avatar/faculty/qrs/6692747338d0c/', 'Poster Lang.png', '2024-07-13 08:34:59'),
(4, '6692890380cd2', 'avatar/faculty/qrs/6692890380cd2/', 'Flashlights.png', '2024-07-13 10:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_number` bigint(20) NOT NULL,
  `yr_sec` int(11) NOT NULL,
  `group_no` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `name`, `email`, `student_number`, `yr_sec`, `group_no`, `faculty_id`, `datetime`, `modified`) VALUES
(1, '668d462217bee', 'Jasper  Pogi  ', 'jazzper.04@gmail.com', 123123123123, 1, 1, 1, '2024-07-09 10:16:02', '0000-00-00 00:00:00'),
(2, '668f41090d917', 'John Paul  Cruz  ', 'jazzper.04@gmail.com', 12312412421422, 1, 1, 1, '2024-07-11 10:18:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_acount`
--

CREATE TABLE `user_acount` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` text NOT NULL,
  `datetime` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acount`
--

INSERT INTO `user_acount` (`id`, `userid`, `name`, `email`, `password`, `admin`, `datetime`, `modified`) VALUES
(2, '0987654321', 'Jasper John Paul Cruz', 'admin@gmail.com', 'asd', 'Y', '2024-01-01 01:10:00', '0000-00-00 00:00:00'),
(3, '668f51ebcdcf0', 'Jasper Pogi ', 'jazzper.04@gmail.com', '$2y$10$CacvTcZf5ssVVYVHxrH7AutG6hB8hSMtlsmxXPXmWh8I5Slq77A62', 'N', '2024-07-11 11:30:51', '0000-00-00 00:00:00'),
(4, '668f539253a82', 'Paul Navarro ', 'jasperjohnpaul.cruz.s@bulsu.edu.php', '$2y$10$FJCtLLqR6XT6hxl7IvwjBuIwGuEQHOI625HHs0g/KbPoSYVDVD69C', 'N', '2024-07-11 11:37:54', '0000-00-00 00:00:00'),
(7, '668f56071d562', 'Sarah Pulumbie ', 'jasperjohnpaul.cruz.s@bulsu.edu.ph', '$2y$10$TAzLlWGRbBxrQ6do/bZk3ONG2DaFU2imi4CyV4Vw2lT0QsVq28m2q', 'Y', '2024-07-11 11:48:23', '0000-00-00 00:00:00'),
(8, '668f60cc502a4', 'Jasper Pogi ', 'admasdin@gmail.com', '$2y$10$5l7v/DAOcped010jvqAEyOrDau74yk6s8Nis2Lm2wqrAXxt66lftu', 'N', '2024-07-11 12:34:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `yr_sec`
--

CREATE TABLE `yr_sec` (
  `id` int(11) NOT NULL,
  `year_and_sec` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yr_sec`
--

INSERT INTO `yr_sec` (`id`, `year_and_sec`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C'),
(4, '2A'),
(5, '2B'),
(6, '2C'),
(7, '3A'),
(8, '3B'),
(9, '3C'),
(10, '4A'),
(11, '4B'),
(12, '4C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `faculty_inventory_logs`
--
ALTER TABLE `faculty_inventory_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_id` (`faculty_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `group_no`
--
ALTER TABLE `group_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_acount`
--
ALTER TABLE `user_acount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `yr_sec`
--
ALTER TABLE `yr_sec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_inventory_logs`
--
ALTER TABLE `faculty_inventory_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_no`
--
ALTER TABLE `group_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qr_code`
--
ALTER TABLE `qr_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_acount`
--
ALTER TABLE `user_acount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `yr_sec`
--
ALTER TABLE `yr_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
