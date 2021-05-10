-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 12:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `emailid`, `password`) VALUES
(1, 'alfiyaalfii123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(15) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `logo` blob NOT NULL,
  `founded` date NOT NULL,
  `founders` varchar(255) NOT NULL,
  `headq` varchar(100) NOT NULL,
  `ceo` varchar(50) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `num_emp` varchar(20) NOT NULL,
  `products` varchar(255) NOT NULL,
  `web` varchar(100) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `com_name`, `logo`, `founded`, `founders`, `headq`, `ceo`, `stock`, `num_emp`, `products`, `web`, `active`) VALUES
(1, 'Apple Inc.', 0x6c6f676f732f4170706c655f6c6f676f5f626c61636b2e706e67, '1976-04-01', ' Steve Jobs, Steve Wozniak, Ronald Wayne', 'Cupertino, California, United States', 'Tim Cook', '130.21', '1,47,000', 'iPhone, iPad, Apple Watch, Apple TV, Macintosh, iOS', 'www.apple.com', 1),
(2, 'International Business Machines Corporation (IBM)', 0x6c6f676f732f38303070782d49424d5f6c6f676f2e706e67, '1911-06-16', ' Charles Ranlett Flint, Herman Hollerith', 'Armonk, New York, United States', 'Arvind Krishna', '145.46', '3,45,900', 'Aspera, Cognos, Db2, IBM Cloud, IBM Cloud Paks, IBM Sterling, IBM ZRed Hat , OpenShiftSPSS, Watson, WebSphere', 'www.ibm.com', 1),
(3, 'Microsoft Corporation', 0x6c6f676f732f6d6963726f736f66742e706e67, '1975-04-04', 'Bill Gates, Paul Allen', 'Redmond, Washington, United States', 'Satya Nadella', '252.46', '1,66,475', 'Microsoft Edge,  Windows, Microsoft 365, Azure , Dynamics 365, Power BI', 'www.microsoft.com', 1),
(4, 'Google LLC', 0x6c6f676f732f676f6f676c652e706e67, '1998-09-04', 'Larry Page, Sergey Brin', 'Mountain View, California, United States', 'Sundar Pichai', '2,351.93', '139,995', 'Google Search, Google Alerts, Google Flights, YouTube, Google Maps , TensorFlow, Android  OS, Google Cloud Products', 'www.google.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `login_id` int(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `ipaddress` varbinary(16) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`login_id`, `emailid`, `ipaddress`, `browser`, `time`) VALUES
(1, 'alfiyaalfii123@gmail.com', 0x3a3a31, 'Google Chrome', '2021-05-10 08:39:20'),
(2, 'alfiyaalfii123@gmail.com', 0x3a3a31, 'Google Chrome', '2021-05-10 09:27:46'),
(3, 'alfiyaalfii123@gmail.com', 0x3a3a31, 'Google Chrome', '2021-05-10 09:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `login_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
