-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 01:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `file` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `file`, `date`) VALUES
(1, 'logo1.png', '2017-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` enum('success','error','logout') DEFAULT NULL,
  `time` bigint(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `username`, `type`, `time`, `date`) VALUES
(14, 'admin', 'success', 1512057627, '2017-11-30'),
(15, 'azizkhalid', 'error', 1512058631, '2017-11-30'),
(16, 'admin', 'success', 1512058638, '2017-11-30'),
(17, 'admin', 'success', 1512060031, '2017-11-30'),
(18, 'nawaf', 'success', 1512060133, '2017-11-30'),
(19, 'admin', 'success', 1512060174, '2017-11-30'),
(20, 'nawaf', 'success', 1512062465, '2017-11-30'),
(21, 'admin', 'success', 1512065664, '2017-11-30'),
(22, 'admin', 'success', 1512067335, '2017-11-30'),
(23, 'admin', 'success', 1512068613, '2017-11-30'),
(24, 'azizkhalid', 'error', 1512070708, '2017-11-30'),
(25, 'admin', 'success', 1512070714, '2017-11-30'),
(26, 'admin', 'success', 1512072084, '2017-11-30'),
(27, 'admin', 'success', 1512072786, '2017-11-30'),
(28, 'admin', 'success', 1512107333, '2017-12-01'),
(29, 'admin', 'success', 1512109465, '2017-12-01'),
(30, 'nawaf', 'success', 1512109761, '2017-12-01'),
(31, 'admin', 'success', 1512109775, '2017-12-01'),
(32, 'admin', 'success', 1512129655, '2017-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` bigint(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `subject`, `description`, `created_date`, `deleted`, `username`) VALUES
(24, 'Englsih', 'it should be done with in one week', 1512060156, 0, 'nawaf'),
(25, 'Mathematics', 'you have home work dude', 2017, 0, 'nawaf'),
(26, 'Social', 'kkkkk', 2017, 0, 'nawaf'),
(27, 'kkk', 'hhh', 1512064445, 0, 'nawaf'),
(28, 'Delivery Date', 'With in one day', 1512129643, 0, 'mike');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `id` int(11) NOT NULL,
  `u_id` varchar(225) NOT NULL,
  `b_date` date NOT NULL,
  `phone` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`id`, `u_id`, `b_date`, `phone`, `fname`, `lname`, `email`) VALUES
(5, 'nawaf', '1998-08-11', '03347222722', 'nawaf', 'Azhar', 'nawafazhar359@gmail.com'),
(6, 'mike', '1997-11-08', '03070688626', 'mike', 'Tech', 'contact@azizkhalidts.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `date`) VALUES
('mike', '555961dab3247ff52cec19727ce844ad', '2017-12-01'),
('nawaf', '555961dab3247ff52cec19727ce844ad', '2017-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `personaldetails`
--
ALTER TABLE `personaldetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
