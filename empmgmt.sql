-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 03:53 PM
-- Server version: 8.0.21
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int NOT NULL,
  `adate` date NOT NULL,
  `progress` varchar(1000) NOT NULL,
  `logtime` decimal(8,2) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dcode` varchar(10) NOT NULL,
  `dname` varchar(50) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `empid` varchar(20) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qual` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `exp` varchar(20) NOT NULL,
  `adhar` char(12) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'0',
  `salary` int DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `empid` varchar(20) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `approved` int NOT NULL,
  `reqdate` date NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `compname` varchar(1000) DEFAULT NULL,
  `frommail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
);

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `compname`, `frommail`, `password`) VALUES
(1, 'EMS BSPTCL', 'employeemgmt01@gmail.com', 'Qwerty9@');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `active` bit(1) NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `uname`, `pwd`, `role`, `id`, `active`) VALUES
('admin', 'Administrator', 'admin', 'Admin', '0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dcode`);

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
