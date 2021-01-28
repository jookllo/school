-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 03:51 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `student_id` int(10) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `subid` int(10) NOT NULL,
  `attended` varchar(8) NOT NULL,
  `attend_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student_id`, `student_name`, `subid`, `attended`, `attend_date`) VALUES
(4, 'Oyee Anogwa', 1002, 'Present', '2021-01-28'),
(6, 'Opee Ootgwa', 1002, 'Present', '2021-01-28'),
(7, 'Ope Ootga', 1002, 'Absent', '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(60) NOT NULL,
  `subid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `email`, `dob`, `password`, `subid`) VALUES
(2, 'Oyee Onogwa', 'oyoo@gmail.com', '2002-10-15', 'ac4b69c77a5e8a8367863cfab7cd6848', 1001),
(3, 'Oyee Okiki', 'oyooo@gmail.com', '1988-10-15', 'ac4b69c77a5e8a8367863cfab7cd6848', 1001),
(4, 'Oyee Anogwa', 'oyoo2@gmail.com', '1988-10-14', 'ac4b69c77a5e8a8367863cfab7cd6848', 1002),
(6, 'Opee Ootgwa', 'oyo45o@gmail.com', '1988-10-15', 'ac4b69c77a5e8a8367863cfab7cd6848', 1002),
(7, 'Ope Ootga', 'oyo4o@gmail.com', '1998-10-15', 'ac4b69c77a5e8a8367863cfab7cd6848', 1002),
(8, 'Kwako Okio', 'okio@gmail.com', '1998-03-10', '02ef9d41c1ef25df66783ec50cbed8fc', 1001),
(10, 'John Njau', 'njau@gmail.com', '1998-02-02', '5f4dcc3b5aa765d61d8327deb882cf99', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subid` int(10) NOT NULL,
  `subname` varchar(60) NOT NULL,
  `subtime` time NOT NULL,
  `subday` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subid`, `subname`, `subtime`, `subday`) VALUES
(1, 1001, 'Culinary Arts', '00:00:00', 'Thursday'),
(2, 1002, 'Art', '08:00:00', 'Monday'),
(3, 1003, 'Computer Basics', '13:00:00', 'Tuesday'),
(4, 1004, 'Welding', '14:35:00', 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teach_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(60) NOT NULL,
  `subid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teach_name`, `email`, `dob`, `password`, `subid`) VALUES
(1, 'Kichwa Wewe', 'ricemill@gmail.com', '1984-02-14', 'fc208a6846bd1645b67ca7275cdc3ec0', 1002),
(2, 'John Othis', 'othis@gmail.com', '1988-12-22', '5f4dcc3b5aa765d61d8327deb882cf99', 1002),
(3, 'Kijana Oji', 'oji@gmail.com', '1998-12-01', '5f4dcc3b5aa765d61d8327deb882cf99', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(60) NOT NULL,
  `utype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `dob`, `pass`, `utype`) VALUES
(1, 'Onyango', 'Oyoo', 'oyoo@gmail.com', '1998-06-08', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(2, 'John', 'Ikil', 'ikil@gmail.com', '2001-02-06', 'd41d8cd98f00b204e9800998ecf8427e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subid` (`subid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
