-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 08:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_info`
--

CREATE TABLE `candidate_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_no` int(11) NOT NULL,
  `sub_department_id` int(11) NOT NULL,
  `candidate_image_path` text,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_info`
--

INSERT INTO `candidate_info` (`id`, `name`, `dept_no`, `sub_department_id`, `candidate_image_path`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'qwerty', 1, 4, '', 0, 1, '2021-04-29 18:17:37', 1, '2021-04-29 23:42:35'),
(4, 'test', 3, 3, 'Screenshot_(27).png', 0, 1, '2021-04-29 18:17:42', 1, '2021-04-29 23:50:08'),
(5, 'test2', 1, 1, 'Screenshot_(23).png', 0, 1, '2021-04-29 18:18:18', NULL, '2021-04-29 18:18:51'),
(6, 'tum', 1, 1, 'Screenshot_(21).png', 0, 1, '2021-04-29 18:21:34', 1, '2021-04-30 16:58:54'),
(7, 'tuskas', 1, 1, 'Screenshot_(16).png', 1, 1, '2021-04-29 18:22:11', 1, '2021-04-30 00:06:09'),
(8, 'No image no', 3, 3, 'Screenshot_(20).png', 1, 1, '2021-04-29 23:51:51', 1, '2021-04-30 00:05:40'),
(9, 'Good', 13, 6, 'Screenshot_(23)1.png', 0, 1, '2021-05-01 17:46:35', 1, '2021-05-01 17:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_no` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_no`, `dept_name`) VALUES
(1, 'Programmer'),
(2, 'Quality'),
(3, 'Tester'),
(4, 'Managment'),
(11, 'Human Resource'),
(12, 'qqq'),
(13, 'Biscuits');

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE `sub_department` (
  `id` int(11) NOT NULL,
  `dept_no` int(11) NOT NULL,
  `sub_department_name` varchar(100) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `dept_no`, `sub_department_name`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'PHP Codeigniter', 0, 1, '2021-04-29 08:33:22', 1, '2021-04-29 11:18:37'),
(2, 2, 'Manual', 1, 1, '2021-04-29 10:53:14', 1, '2021-04-29 11:18:47'),
(3, 3, 'Automation', 0, 1, '2021-04-29 11:22:25', 0, NULL),
(4, 1, 'Laravel', 0, 1, '2021-04-29 11:23:01', 0, NULL),
(5, 4, 'HR', 0, 1, '2021-04-30 00:08:00', 0, NULL),
(6, 13, 'Parle', 0, 1, '2021-05-01 17:45:52', 0, NULL),
(7, 13, 'Good day', 0, 1, '2021-05-01 17:46:05', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Bharat', 'test@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, '2021-04-28 15:58:41', 0, '2021-04-29 11:24:01'),
(2, 'testing', 'qwerty@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-04-30 18:15:40', 0, '0000-00-00 00:00:00'),
(3, 'hello', 'hey', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-04-30 18:19:23', 0, '0000-00-00 00:00:00'),
(4, 'test', 'fff@jj.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-05-01 16:51:21', 0, '2021-05-01 17:44:28'),
(5, 'bhar', 'ff@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-05-01 16:53:42', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_info`
--
ALTER TABLE `candidate_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_no`);

--
-- Indexes for table `sub_department`
--
ALTER TABLE `sub_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_info`
--
ALTER TABLE `candidate_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_department`
--
ALTER TABLE `sub_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
