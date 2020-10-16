-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 03:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab 2- group 13`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_a`
--

CREATE TABLE `table_a` (
  `tableA_Id` bigint(20) NOT NULL,
  `iso` text NOT NULL,
  `Country_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_a`
--

INSERT INTO `table_a` (`tableA_Id`, `iso`, `Country_Name`) VALUES
(1, 'CA', 'Canada'),
(2, 'IN', 'India'),
(3, 'USA', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `table_b`
--

CREATE TABLE `table_b` (
  `tableB_Id` bigint(20) NOT NULL,
  `Province_Name` text NOT NULL,
  `Description_Value` varchar(30) NOT NULL,
  `tableA_Id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_b`
--

INSERT INTO `table_b` (`tableB_Id`, `Province_Name`, `Description_Value`, `tableA_Id`) VALUES
(1, 'Ontario', 'Province', 1),
(2, 'Alberta', 'Province', 1),
(3, 'Maharashtra', 'State', 2),
(4, 'Tamil Nadu', 'State', 2),
(5, 'California', 'State', 3),
(6, 'New York', 'State', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_a`
--
ALTER TABLE `table_a`
  ADD PRIMARY KEY (`tableA_Id`),
  ADD UNIQUE KEY `iso` (`iso`) USING HASH;

--
-- Indexes for table `table_b`
--
ALTER TABLE `table_b`
  ADD PRIMARY KEY (`tableB_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_a`
--
ALTER TABLE `table_a`
  MODIFY `tableA_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_b`
--
ALTER TABLE `table_b`
  MODIFY `tableB_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
