-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 10:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arct`
--

-- --------------------------------------------------------

--
-- Table structure for table `c40h`
--

CREATE TABLE `c40h` (
  `date` varchar(50) NOT NULL,
  `151-15-5022` varchar(50) NOT NULL,
  `151-15-5206` varchar(50) NOT NULL,
  `151-15-5335` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c40h`
--

INSERT INTO `c40h` (`date`, `151-15-5022`, `151-15-5206`, `151-15-5335`) VALUES
('2018-10-27', '1', '1', '1'),
('2018-10-28', '1', '1', '0'),
('2018-10-29', '0', '1', '1'),
('2018-11-24', '1', '1', '0'),
('2018-12-07', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `e41e`
--

CREATE TABLE `e41e` (
  `date` varchar(50) NOT NULL,
  `151-15-4743` varchar(50) NOT NULL,
  `151-15-4849` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e41e`
--

INSERT INTO `e41e` (`date`, `151-15-4743`, `151-15-4849`) VALUES
('2018-10-26', '1', '1'),
('2018-10-27', '0', '1'),
('2018-10-28', '1', '1'),
('2018-11-24', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `pass`) VALUES
(1, 'admin', 1234),
(2, 'fk', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c40h`
--
ALTER TABLE `c40h`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `e41e`
--
ALTER TABLE `e41e`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
