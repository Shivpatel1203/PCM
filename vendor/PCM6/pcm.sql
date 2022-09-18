-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 03, 2022 at 05:23 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `pc_id` varchar(50) NOT NULL,
  `lab_no` varchar(10) NOT NULL,
  `complaint_type` varchar(20) NOT NULL,
  `complaint_desc` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `user_id`, `pc_id`, `lab_no`, `complaint_type`, `complaint_desc`, `date`, `time`, `status`) VALUES
('0209125952', 'sal123', '12', 'LAB 11', 'Hardware', 'asas', '2002-09-22', '12:59:52', 0),
('0209135150', 'sal123', '123', 'LAB 11', 'Hardware', 'sasfas', '2002-09-22', '13:51:50', 0),
('0209222649', 'sal123', '123', 'LAB 13', 'Software', 'Application not working', '2002-09-22', '22:26:49', 0),
('0309072621', '41', '192.128.0.1', 'LAB 13', 'Hardware', 'Mouse', '2003-09-22', '07:26:21', 1),
('c1', 'sal123', '1', '11', 'Software', 'I am not able to install vs code.', '2022-09-02', '04:54:23', 0),
('c2', 'sal123', '2', '11', 'hardware', 'Mouse not working.', '2022-09-02', '10:57:52', 1),
('c3', 'sal123', '2', '11', 'software', 'window not working.', '2022-08-16', '12:58:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_number` bigint(15) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `name`, `mobile_number`, `role`, `email`) VALUES
('1', '12345', 'a', 12345, 1, 'a@gmail.com'),
('2', '67890', 'b', 67890, 1, 'b@gmail.com'),
('3', '102938', 'x', 102938, 1, 'c@gmail.com'),
('41', '12345', 'a', 12345, 2, 'a@gmail.com'),
('42', '67890', 'b', 67890, 2, 'b@gmail.com'),
('43', '102938', 'x', 102938, 2, 'c@gmail.com'),
('Admin', 'Admin123', 'HOD', 9999999999, 0, 'admin@gmail.com'),
('sal123', 'sal123', 'sal123', 8888888888, 2, 'sal123@gmail.com'),
('xyz', 'xyz123', 'technicial', 1212121212, 1, 'xyz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
