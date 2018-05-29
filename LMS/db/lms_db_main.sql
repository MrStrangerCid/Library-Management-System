-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 10:01 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(15) NOT NULL,
  `isbn` int(20) NOT NULL,
  `title` char(30) NOT NULL,
  `author` char(30) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `copyright_year` int(5) NOT NULL,
  `copy` int(5) NOT NULL,
  `status` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will be the database of books in the system';

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `isbn`, `title`, `author`, `publisher`, `copyright_year`, `copy`, `status`) VALUES
(1, 213, 'Introduction to PHP', '3131', '2313123', 0, 0, 'New'),
(2, 213, '23131', '3131', '2313123', 1900, 0, 'New'),
(3, 213, '23131', '3131', '2313123', 1900, 0, 'New'),
(4, 213, '23131', '3131', '2313123', 1900, 0, 'New'),
(5, 2147483647, 'Light Up my Way', 'Juan Luna', 'Maharlika Publishing Corp', 1919, 0, 'Old'),
(6, 111111, 'Introduction to PHP', 'Emman Trinidad', 'Maharlika Publishing Corp', 1918, 0, 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `borrowbooks`
--

CREATE TABLE `borrowbooks` (
  `isbn` smallint(15) NOT NULL,
  `title` text NOT NULL,
  `dateborrow` date NOT NULL,
  `datereturn` date NOT NULL,
  `remarks` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will be the database of borrowed books in the system';

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` smallint(15) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `gender` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `position` tinytext NOT NULL,
  `contact` smallint(11) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will be the database of members in the system';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` char(20) NOT NULL,
  `lname` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will be the database of users who signup for the system';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `lname`) VALUES
('admin', 'admin', 'CJ', 'Pastor'),
('cjcjcj', 'hahaha', 'CJ', 'Pastor'),
('emman', 'admin', 'Emmanuel', 'Trinidad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` smallint(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
