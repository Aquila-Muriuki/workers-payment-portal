-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 07:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keyame`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `phoneNumber` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `customerID` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`firstName`, `lastName`, `phoneNumber`, `date`, `customerID`) VALUES
('James', 'Keymani', 96396453, '2023-11-29', 'KYM-2023'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-49-27-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-51-23-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-52-08-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-53-06-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-54-58-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-55-24-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-55-44-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-2023-11-29-12-56-38-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-20231129010159-AQUILA'),
('AQUILA', 'MUTUGI', 96396453, '2023-11-29', 'KYM-20231129013835-AQUILA');

-- --------------------------------------------------------

--
-- Table structure for table `clientservices`
--

CREATE TABLE `clientservices` (
  `serviceID` varchar(30) NOT NULL,
  `customerID` varchar(35) NOT NULL,
  `serviceType` varchar(30) NOT NULL,
  `serviceQuantity` int(10) NOT NULL,
  `servedBy` varchar(30) NOT NULL,
  `totalCost` int(10) NOT NULL,
  `cashPay` int(10) DEFAULT 0,
  `MpesaPay` int(10) DEFAULT 0,
  `status` varchar(30) DEFAULT NULL,
  `balance` int(10) DEFAULT 0,
  `day` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientservices`
--

INSERT INTO `clientservices` (`serviceID`, `customerID`, `serviceType`, `serviceQuantity`, `servedBy`, `totalCost`, `cashPay`, `MpesaPay`, `status`, `balance`, `day`) VALUES
('KYM-20231129013835-AQUILA-0138', 'KYM-20231129013835-AQUILA', 'Passport Photo', 10, 'sniper', 1500, 0, 0, NULL, 1500, '2023-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `mpesatransactions`
--

CREATE TABLE `mpesatransactions` (
  `ID` int(11) NOT NULL,
  `serviceID` varchar(30) NOT NULL,
  `mpesaCode` varchar(30) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceName` varchar(30) NOT NULL,
  `serviceCost` int(10) NOT NULL,
  `serviceCode` int(10) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceName`, `serviceCost`, `serviceCode`, `addedOn`) VALUES
('Passport Photo', 150, 1, '2023-11-29 02:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `names` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(55) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `IDNumber` int(8) NOT NULL,
  `role` varchar(30) NOT NULL,
  `joinDate` date NOT NULL DEFAULT current_timestamp(),
  `exitDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`names`, `username`, `password`, `phoneNumber`, `IDNumber`, `role`, `joinDate`, `exitDate`) VALUES
('willy sniper', 'sniper', '81dc9bdb52d04dc20036dbd8313ed055', 790052730, 32908232, 'developer', '2023-11-29', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `clientservices`
--
ALTER TABLE `clientservices`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `mpesatransactions`
--
ALTER TABLE `mpesatransactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceCode`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `IDNumber` (`IDNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpesatransactions`
--
ALTER TABLE `mpesatransactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceCode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
