-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `euniel`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Autokey` int(11) NOT NULL,
  `EmpNo` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Birthday` varchar(255) DEFAULT NULL,
  `MonthlySalary` varchar(255) DEFAULT NULL,
  `Userkey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Autokey`, `EmpNo`, `FirstName`, `LastName`, `Gender`, `Birthday`, `MonthlySalary`, `Userkey`) VALUES
(3, 1236, 'Victoria', 'Edulan', 'Female', '1985-01-26', '16450', NULL),
(4, 1238, 'Veljoseph', 'Edulan', 'Male', '1998-02-05', '100022', NULL),
(5, 12456, 'Euniel', 'Edulan', 'Male', '1998-01-15', '12355', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Autokey` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Autokey`, `UserName`, `Password`) VALUES
(1, 'Euniel', '$2y$10$dJQRbkSQNdhbDcgC113/feDdC0IlQMq/C0isiDFQPn62TCvXABQsG'),
(2, 'sdfsdf', '$2y$10$gfrb3ohgVO/.ChOgOCN4auXkjiXhrNcxrifMAhAsfR1eZgNT6NAbC'),
(4, 'qweqwe', '$2y$10$ei5BIqaMvnvAOembUzjk8.MLPGB15GG4hiRh/j9lCd.UwSed1HDgO'),
(7, 'sdf', '$2y$10$gy8SSI.9IZKJJShocIWt/unMVmY.a0kxY3owktBZ6PZwBK/H68nda'),
(8, 'hello', '$2y$10$mDLaBQTTPxDkB9ZbSIpBPuGA1NX.nPd.4Pcn8MWmYdmrR7cOPW0jO'),
(9, 'asdf', '$2y$10$sxIzlCbUxJtllxWEaeqo7u1bm0FrtFRO3q6DbHZzrGzh.5ABiOMoi'),
(10, 'Veljo', '$2y$10$NhJ/eTQsn1Z7U6wyi1PriuXADrmEzsLv28dJtzHqYBmmN0k6XSJZe'),
(11, 'VeljosephEdulan', '$2y$10$TZexFW4l6/LZPlvkd0nPLesgpdqEJk2FBs0iWRjVev84cCslnB61K'),
(12, 'EuGie', '$2y$10$XUHTe/tPMayHRDefzppOmeo8gJGjV/FXL31vw6RkMK/nfZ5mX3q/u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Autokey`),
  ADD UNIQUE KEY `EmpNo` (`EmpNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Autokey`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Autokey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Autokey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
