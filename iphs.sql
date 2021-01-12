-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2015 at 04:28 PM
-- Server version: 5.5.42
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iphs`
--

-- --------------------------------------------------------

--
-- Table structure for table `faimly`
--

CREATE TABLE IF NOT EXISTS `faimly` (
  `id` int(11) NOT NULL,
  `faimlynum` int(11) NOT NULL,
  `fname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `srno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slips`
--

CREATE TABLE IF NOT EXISTS `slips` (
  `id` int(11) NOT NULL,
  `stnum` int(11) DEFAULT NULL,
  `faimlynum` int(11) NOT NULL,
  `month` text NOT NULL,
  `admission` int(11) DEFAULT NULL,
  `tuition` int(11) DEFAULT NULL,
  `sports` int(11) DEFAULT NULL,
  `building` int(11) DEFAULT NULL,
  `medical` int(11) DEFAULT NULL,
  `recreation` int(11) DEFAULT NULL,
  `examination` int(11) DEFAULT NULL,
  `buscharge` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `name` text,
  `class` text,
  `regnum` int(11) DEFAULT NULL,
  `faimlynum` int(11) DEFAULT NULL,
  `admission` int(11) DEFAULT NULL,
  `tuition` int(11) DEFAULT NULL,
  `sports` int(11) DEFAULT NULL,
  `building` int(11) DEFAULT NULL,
  `medical` int(11) DEFAULT NULL,
  `recreation` int(11) DEFAULT NULL,
  `examination` int(11) DEFAULT NULL,
  `buscharge` int(11) DEFAULT NULL,
  `active` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faimly`
--
ALTER TABLE `faimly`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faimlynum` (`faimlynum`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slips`
--
ALTER TABLE `slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regnum` (`regnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faimly`
--
ALTER TABLE `faimly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slips`
--
ALTER TABLE `slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
