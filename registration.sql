-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 03:32 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insightone`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `s_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `college` varchar(255) NOT NULL,
  `profile_link` varchar(255) NOT NULL,
  `followers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`s_no`, `name`, `email`, `contact_number`, `college`, `profile_link`, `followers`) VALUES
(1, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 300),
(2, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 300),
(3, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 300),
(4, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'afdd', 'https://www.youtube.com/', 255),
(5, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 888),
(6, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 8585),
(7, 'Shashwat Vats', 'shashwatvats10@gmail.com', 2147483647, 'akg', 'https://www.youtube.com/', 85885);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
