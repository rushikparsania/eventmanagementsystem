-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 04:42 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_tatvasoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `recurrence_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 - Repeat, 2 - Repeat on the',
  `recurrence_duration` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '0 - Not Deleted, 1 - Deleted',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `recurrence_type`, `recurrence_duration`, `created_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'First', '2021-05-04', '2021-05-05', 1, NULL, '2021-05-04 17:14:39', b'1', '2021-05-04 16:16:46'),
(2, 'second', '2021-05-04', '2021-05-12', 1, NULL, '2021-05-04 17:28:08', b'1', '2021-05-04 16:17:03'),
(3, 'Third', '2021-05-03', '2021-05-06', 1, NULL, '2021-05-04 17:29:40', b'1', '2021-05-04 16:17:05'),
(4, 'Four', '2021-05-06', '2021-05-08', 1, NULL, '2021-05-04 17:32:29', b'1', '2021-05-04 16:17:06'),
(5, 'Five', '2021-05-04', '2021-05-19', 2, 'Third Tuesday of the 4 Months', '2021-05-04 18:48:25', b'1', '2021-05-04 16:38:06'),
(6, 'Six', '2021-05-05', '2021-05-08', 1, 'Every Day', '2021-05-04 18:48:52', b'1', '2021-05-04 16:38:08'),
(7, 'seven', '2021-05-06', '2021-05-26', 1, 'Every Fourth Day', '2021-05-04 19:23:26', b'1', '2021-05-04 16:38:09'),
(8, 'e8', '2021-05-06', '2021-05-26', 1, 'Every Fourth Day', '2021-05-04 19:24:06', b'0', NULL),
(9, 'e9', '2021-05-06', '2021-05-10', 1, 'Every Fourth Day', '2021-05-04 19:28:37', b'0', NULL),
(10, 'e10', '2021-05-06', '2021-05-10', 1, 'Every Fourth Day', '2021-05-04 19:29:20', b'0', NULL),
(11, 'Event 11', '2021-05-05', '2021-06-22', 1, 'Every Other Week', '2021-05-04 20:11:49', b'0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_dates`
--

CREATE TABLE `events_dates` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_dates`
--

INSERT INTO `events_dates` (`id`, `e_id`, `date`, `created_at`) VALUES
(1, 8, '2021-05-06', '2021-05-04 19:24:06'),
(2, 8, '2021-05-10', '2021-05-04 19:24:06'),
(3, 8, '2021-05-14', '2021-05-04 19:24:06'),
(4, 8, '2021-05-18', '2021-05-04 19:24:06'),
(5, 8, '2021-05-22', '2021-05-04 19:24:06'),
(6, 9, '2021-05-06', '2021-05-04 19:28:37'),
(7, 10, '2021-05-06', '2021-05-04 19:29:20'),
(8, 10, '2021-05-10', '2021-05-04 19:29:20'),
(9, 11, '2021-05-05', '2021-05-04 20:11:49'),
(10, 11, '2021-05-19', '2021-05-04 20:11:49'),
(11, 11, '2021-06-02', '2021-05-04 20:11:49'),
(12, 11, '2021-06-16', '2021-05-04 20:11:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_dates`
--
ALTER TABLE `events_dates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events_dates`
--
ALTER TABLE `events_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
