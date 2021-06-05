-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 10:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminfiles`
--

CREATE TABLE `adminfiles` (
  `id` int(11) NOT NULL,
  `key_num` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `files_group_name` varchar(255) NOT NULL,
  `json_files` varchar(255) NOT NULL,
  `allowed_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminfiles`
--

INSERT INTO `adminfiles` (`id`, `key_num`, `admin_name`, `files_group_name`, `json_files`, `allowed_user`) VALUES
(24, '9', 'Mukul Sharma', 'prakash group', 'daily-sales-data-1.json', 'Prakash Sharma'),
(25, '9', 'Mukul Sharma', 'prakash group', 'daily-sales-data-2.json', 'Prakash Sharma'),
(26, '9', 'Mukul Sharma', 'prakash group', 'daily-sales-data-3.json', 'Prakash Sharma'),
(28, '9', 'Mukul Sharma', 'prakash group', 'daily-sales-data-5.json', 'Prakash Sharma'),
(51, '9', 'Admin Name', 'John group', 'daily-sales-data-1.json', 'John Doe'),
(52, '9', 'Admin Name', 'John group', 'daily-sales-data-2.json', 'John Doe'),
(53, '9', 'Admin Name', 'John group', 'daily-sales-data-3.json', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_role` varchar(255) NOT NULL DEFAULT 'Public'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contactno`, `posting_date`, `user_role`) VALUES
(9, 'Admin Name', 'admin@gmail.com', 'admin@123', '9876543210', '2020-04-15 18:30:00', 'Admin'),
(26, 'Prakash Sharma', 'prakash@gmail.com', 'Prakash@123', '4477885544', '2021-05-22 11:25:03', 'Public'),
(34, 'John Doe', 'john@gmail.com', 'John@123', '9988774477', '2021-06-05 08:11:31', 'Public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminfiles`
--
ALTER TABLE `adminfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminfiles`
--
ALTER TABLE `adminfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
