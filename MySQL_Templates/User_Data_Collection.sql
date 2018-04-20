-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2018 at 11:35 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `User_Data_Collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `Equipment_Register`
--

CREATE TABLE `Equipment_Register` (
  `ID` int(11) NOT NULL,
  `Name` text,
  `Manufacturer` text,
  `Manufacturer Model` text,
  `Introduced into Service Date` date DEFAULT NULL,
  `Deleted Date` date DEFAULT NULL,
  `Last Modified Date` date DEFAULT NULL,
  `Last Modified Time` date DEFAULT NULL,
  `Last Modified by User` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Task_Records`
--

CREATE TABLE `Task_Records` (
  `ID` int(11) NOT NULL,
  `Basic Text` text,
  `ComboBox` text,
  `Text Box` text,
  `Deleted Date` date DEFAULT NULL,
  `Last Modified Date` date DEFAULT NULL,
  `Last Modified Time` time DEFAULT NULL,
  `Last Modified by User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `User_Configuration`
--

CREATE TABLE `User_Configuration` (
  `ID` int(11) NOT NULL,
  `Company Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `User_Details`
--

CREATE TABLE `User_Details` (
  `ID` int(11) NOT NULL,
  `User Name` text NOT NULL,
  `Password` text NOT NULL,
  `Deleted Date` date DEFAULT NULL,
  `Last Modified Date` date DEFAULT NULL,
  `Last Modified Time` date DEFAULT NULL,
  `Last Modified by User` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `User_Login_Records`
--

CREATE TABLE `User_Login_Records` (
  `ID` int(11) NOT NULL,
  `User Name` text,
  `Details` text,
  `Deleted Date` date DEFAULT NULL,
  `Last Modified Date` date DEFAULT NULL,
  `Last Modified Time` date DEFAULT NULL,
  `Last Modified by User` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Equipment_Register`
--
ALTER TABLE `Equipment_Register`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `Task_Records`
--
ALTER TABLE `Task_Records`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `User_Configuration`
--
ALTER TABLE `User_Configuration`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `User_Details`
--
ALTER TABLE `User_Details`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `User_Login_Records`
--
ALTER TABLE `User_Login_Records`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Equipment_Register`
--
ALTER TABLE `Equipment_Register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Task_Records`
--
ALTER TABLE `Task_Records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `User_Configuration`
--
ALTER TABLE `User_Configuration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `User_Details`
--
ALTER TABLE `User_Details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `User_Login_Records`
--
ALTER TABLE `User_Login_Records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
