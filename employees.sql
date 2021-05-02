-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 06:48 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
(5, 'fff'),
(7, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `dept_emp`
--

CREATE TABLE `dept_emp` (
  `id` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `dept_no` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_emp`
--

INSERT INTO `dept_emp` (`id`, `emp_no`, `dept_no`, `from_date`, `to_date`) VALUES
(13, 11, 2, '2020-12-22', '2021-01-09'),
(14, 11, 3, '2021-01-10', '2021-03-13'),
(15, 12, 1, '2020-12-22', '2021-01-08'),
(16, 13, 1, '2020-12-17', '2020-12-23'),
(17, 13, 2, '2020-12-24', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `dept_manager`
--

CREATE TABLE `dept_manager` (
  `id` int(11) NOT NULL,
  `dept_nos` varchar(5) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_manager`
--

INSERT INTO `dept_manager` (`id`, `dept_nos`, `emp_no`, `from_date`, `to_date`) VALUES
(10, '4', 11, '2020-12-16', '2020-12-31'),
(11, '5', 11, '2021-01-05', '2021-01-28'),
(12, '1', 12, '2020-12-23', '2020-12-31'),
(13, '1', 13, '2020-12-22', '2020-12-30'),
(14, '3', 13, '2020-12-31', '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_no` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `hire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_no`, `birth_date`, `first_name`, `last_name`, `gender`, `hire_date`) VALUES
(11, '2021-01-01', 'testing', 'testing', 'Male', '2020-12-01'),
(12, '2020-12-27', 'SD', 'leading', 'Male', '2020-12-15'),
(13, '2021-01-01', 'SD', 'leading', 'Male', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salaries`
--

CREATE TABLE `emp_salaries` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_salaries`
--

INSERT INTO `emp_salaries` (`id`, `emp_id`, `salary`, `from_date`, `to_date`) VALUES
(9, 11, '45555', '2020-12-16', '2020-12-31'),
(10, 12, '3400', '2020-12-29', '2020-12-31'),
(11, 13, '3444', '2020-12-16', '2020-12-23'),
(12, 13, '5555', '2020-12-31', '2021-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `emp_titles`
--

CREATE TABLE `emp_titles` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_titles`
--

INSERT INTO `emp_titles` (`id`, `emp_id`, `title`, `from_date`, `to_date`) VALUES
(16, 11, 'Srdeveloper', '2020-12-31', '2021-01-31'),
(17, 11, 'jrdeveloper', '2021-02-02', '2021-03-01'),
(18, 11, 'Srdeveloper', '2021-04-16', '2021-05-27'),
(19, 12, 'jrdeveloper', '2020-12-16', '2020-12-24'),
(20, 12, 'Srdeveloper', '2021-01-03', '2021-02-26'),
(21, 12, 'TeamLead', '2021-03-03', '2021-07-16'),
(22, 12, 'ProjectManger', '2021-08-18', '2021-08-19'),
(23, 11, 'jrdeveloper', '2021-05-28', '2021-08-19'),
(24, 13, 'jrdeveloper', '2020-12-16', '2020-12-31'),
(25, 13, 'Srdeveloper', '2021-01-04', '2021-01-12'),
(26, 13, 'ProjectManger', '2021-02-25', '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `project_costing`
--

CREATE TABLE `project_costing` (
  `id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `extra_hours` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_costing`
--

INSERT INTO `project_costing` (`id`, `project_name`, `start_time`, `end_time`, `extra_hours`, `total_hours`, `amount`) VALUES
(1, '1', '2020-12-18', '2020-12-21', 76, 100, 10000),
(2, '3', '2020-12-15', '2020-12-19', 24, 56, 28000),
(3, '2', '2020-12-15', '2020-12-19', 24, 56, 16800),
(4, '2', '2020-12-14', '2020-12-17', 6, 30, 9000),
(5, '3', '2020-12-14', '2020-12-17', 6, 30, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `project_test`
--

CREATE TABLE `project_test` (
  `id` int(11) NOT NULL,
  `project_name` varchar(120) NOT NULL,
  `cost_per_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_test`
--

INSERT INTO `project_test` (`id`, `project_name`, `cost_per_hours`) VALUES
(1, 'test1', 100),
(2, 'test2', 300),
(3, 'test3', 500),
(4, 'test4', 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_no`);

--
-- Indexes for table `dept_emp`
--
ALTER TABLE `dept_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_manager`
--
ALTER TABLE `dept_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `emp_salaries`
--
ALTER TABLE `emp_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_titles`
--
ALTER TABLE `emp_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_costing`
--
ALTER TABLE `project_costing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_test`
--
ALTER TABLE `project_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dept_emp`
--
ALTER TABLE `dept_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dept_manager`
--
ALTER TABLE `dept_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emp_salaries`
--
ALTER TABLE `emp_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emp_titles`
--
ALTER TABLE `emp_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_costing`
--
ALTER TABLE `project_costing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_test`
--
ALTER TABLE `project_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
