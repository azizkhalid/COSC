-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 07:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cosc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
`id` int(11) NOT NULL,
  `file` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `file`, `date`) VALUES
(1, 'logo1.png', '2017-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` enum('success','error','logout') DEFAULT NULL,
  `time` bigint(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`id` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` bigint(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE IF NOT EXISTS `personaldetails` (
`id` int(11) NOT NULL,
  `u_id` varchar(225) NOT NULL,
  `b_date` date NOT NULL,
  `phone` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `province` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Ontario'),
(2, 'Quebec'),
(3, 'Manitoba'),
(4, 'British Columbia');

-- --------------------------------------------------------

--
-- Table structure for table `province2`
--

CREATE TABLE IF NOT EXISTS `province2` (
`id` int(11) NOT NULL,
  `province` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province2`
--

INSERT INTO `province2` (`id`, `province`, `city`) VALUES
(2, 'Quebec', 'Montreal'),
(3, 'Ontario', 'Sault ste. Marie'),
(4, 'Ontario', 'Sudbury'),
(5, 'Ontario', 'Toronto'),
(6, 'Ontario', 'Ottawa'),
(7, 'Ontario', 'Windsor'),
(8, 'Ontario', 'Waterloo'),
(9, 'Ontario', 'Scarborough'),
(10, 'Ontario', 'Oshawa'),
(11, 'Ontario', 'Niagara Falls'),
(12, 'Ontario', 'Mississauga'),
(13, 'Quebec', 'Quebec City'),
(14, 'Quebec', 'Alma'),
(15, 'Quebec', 'Ancienne Lorette'),
(16, 'Quebec', 'Anjou'),
(17, 'Quebec', 'Baie Comeau'),
(18, 'Quebec', 'Baie-Saint-Paul'),
(19, 'Quebec', 'Beauport'),
(20, 'Quebec', 'Beaupre'),
(21, 'Quebec', 'Becancour'),
(22, 'Manitoba', 'Winnipeg'),
(23, 'Manitoba', 'Churchill'),
(24, 'Manitoba', 'Thompson'),
(25, 'Manitoba', 'Beausejour'),
(26, 'Manitoba', 'Brandon'),
(27, 'Manitoba', 'Dauphin'),
(28, 'Manitoba', 'Gimli'),
(29, 'Manitoba', 'Morden'),
(30, 'Manitoba', 'Morris'),
(31, 'Manitoba', 'Portage La Prairie'),
(32, 'British Columbia', 'Vancouver'),
(33, 'British Columbia', 'Victoria'),
(34, 'British Columbia', 'Burnaby'),
(35, 'British Columbia', 'Campbell River'),
(36, 'British Columbia', 'Chilliwack'),
(37, 'British Columbia', 'Courtenay'),
(38, 'British Columbia', 'Cranbrook'),
(39, 'British Columbia', 'Dawson Creek'),
(40, 'British Columbia', 'Delta'),
(41, 'British Columbia', 'Esquimalt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manager` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `province`
--
ALTER TABLE `province`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province2`
--
ALTER TABLE `province2`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `personaldetails`
--
ALTER TABLE `personaldetails`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `province2`
--
ALTER TABLE `province2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
