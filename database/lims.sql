-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 02:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `support`
--

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `agent_id` varchar(50) NOT NULL,
  `agent_password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `agent` (`agent_id`, `agent_password`, `name`, `phone`) VALUES
('akhil', 'akhil', 'Akhil P','01598745682'),
('admin', 'admin', 'Super User', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_no` varchar(200) NOT NULL,
  `plugin` varchar(50) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `developer` varchar(50) NOT NULL,
  `count` varchar(20) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `agent_id` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--


-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE IF NOT EXISTS `developer` (
  `developer_id` varchar(200) NOT NULL,
  `ticket_no` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--


--
-- Table structure for table `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `p_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plugin`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `support`
 ADD PRIMARY KEY (`agent_id`), ADD UNIQUE KEY `agent_id` (`agent_id`);

--
-- Indexes for table `client`
--
-- ALTER TABLE `ticket`
--  ADD PRIMARY KEY (`ticket_no`), ADD UNIQUE KEY `ticket_no` (`ticket_no`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
 ADD PRIMARY KEY (`developer_id`);

--
-- Indexes for table `plugin`
--
ALTER TABLE `plugin`
 ADD PRIMARY KEY (`p_id`), ADD UNIQUE KEY `p_id` (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
