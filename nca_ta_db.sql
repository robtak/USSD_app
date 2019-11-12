-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 12:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nca_std_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nca_ta_db`
--

CREATE TABLE `nca_ta_db` (
  `id` int(11) NOT NULL,
  `devbrand` varchar(32) NOT NULL,
  `devtype` varchar(32) NOT NULL,
  `devmodelno` varchar(32) NOT NULL,
  `devmanufacturer` varchar(64) NOT NULL,
  `devtan` varchar(32) NOT NULL,
  `devapprovalyear` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nca_ta_db`
--

INSERT INTO `nca_ta_db` (`id`, `devbrand`, `devtype`, `devmodelno`, `devmanufacturer`, `devtan`, `devapprovalyear`) VALUES
(1, 'Nokia', 'Mobile Phone', 'TA-1115', 'HM Global', 'PQR-1H-7E3-X001', '2019-07-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nca_ta_db`
--
ALTER TABLE `nca_ta_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nca_ta_db`
--
ALTER TABLE `nca_ta_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
