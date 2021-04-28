-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 01:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `party` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `lid` int(3) NOT NULL,
  `votecount` int(5) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `name`, `party`, `gender`, `dob`, `lid`, `votecount`, `status`) VALUES
(3, 'candidate', 'test', 'male', '2021-03-01', 19, 1, '1'),
(4, 'candidate2', 'BJP', 'female', '1999-11-25', 20, 1, '1'),
(5, 'Vijayan', 'LDF', 'male', '1968-02-15', 21, 2, '1'),
(7, 'Danish', 'Nota', 'male', '2021-03-07', 26, 0, '1'),
(8, 'surendran', 'BJP', 'male', '2021-04-11', 27, 0, '0'),
(9, 'ajmal', 'AAP', 'male', '2021-04-25', 28, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(15) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `username`, `password`, `rank`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 3),
(18, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'voter', 1),
(19, 'candidate', '827ccb0eea8a706c4c34a16891f84e7b', 'candidate', 2),
(20, 'candidate2', '827ccb0eea8a706c4c34a16891f84e7b', 'candidate', 2),
(21, 'vijayan', '827ccb0eea8a706c4c34a16891f84e7b', 'candidate', 2),
(22, 'rahul', '827ccb0eea8a706c4c34a16891f84e7b', 'candidate', 0),
(23, 'ram', '827ccb0eea8a706c4c34a16891f84e7b', 'voter', 1),
(24, 'diya', '827ccb0eea8a706c4c34a16891f84e7b', 'voter', 1),
(25, 'unni', '827ccb0eea8a706c4c34a16891f84e7b', 'voter', 1),
(26, 'danish', '827ccb0eea8a706c4c34a16891f84e7b', 'candidate', 2),
(27, 'sura', 'd41d8cd98f00b204e9800998ecf8427e', 'candidate', 0),
(28, 'ajmal', 'd41d8cd98f00b204e9800998ecf8427e', 'candidate', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `vid` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `voterid` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `lid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`vid`, `name`, `voterid`, `gender`, `dob`, `status`, `lid`) VALUES
(5, 'user', 'test', 'male', '2021-03-01', '1', 18),
(6, 'ram', '124578', 'male', '2010-03-08', '1', 23),
(7, 'Diya', '456789', 'female', '2021-03-13', '1', 24),
(8, 'unni', '562147', 'male', '2021-03-07', '1', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `voterid` (`voterid`(20));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `vid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
