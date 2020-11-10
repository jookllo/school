-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 12:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `pass`) VALUES
(1, 'qwertyt', 'hokello@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(2, 'admin', 'hokello34@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, 'asdfg', 'jookllo32@gmail.com', '67cb06d870d2fb109c7a04b75242f341'),
(4, 'okello', 'okello@mtaa.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(5, 'admin12', 'qweqw@dd.c', 'a384b6463fc216a5f8ecb6670f86456a'),
(6, 'qwertytq', 'hokello@gmail.comq', '47cc2036221175855d0b2ecf2765ac1c'),
(7, 'ad5', 'hokello@gmail.comui', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(8, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'okelloqwe', 'hookello@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(11, 'okelloqw', 'okelloqw@gmail.com', '2b71936f2753b324d3b08ecc3c9db35f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
