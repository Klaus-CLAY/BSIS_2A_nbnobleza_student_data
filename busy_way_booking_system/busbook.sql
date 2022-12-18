-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 01:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bus`
--

CREATE TABLE `add_bus` (
  `id` int(25) NOT NULL,
  `buses_name` varchar(100) NOT NULL,
  `drivers_name` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `categroy` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `you_tube_link` varchar(250) NOT NULL,
  `show` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `decription` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_bus`
--

INSERT INTO `add_bus` (`id`, `buses_name`, `drivers_name`, `schedule`, `categroy`, `language`, `you_tube_link`, `show`, `action`, `decription`, `image`, `status`) VALUES
(1, 'BUSY-WAY 1', 'Neil Nobleza', 'December 20, 2022', 'Manila City', 'A/C', '', '21:00', 'AVAILABLE', '                                                            ', 'b1.jpg', 1),
(2, 'BUSY-WAY 2', 'Rumsfeld Navarro', 'December 20, 2022', 'Naga City', 'NONE-A/C', '', '', 'NOT AVAILABLE', '', 'b2.jpg', 1),
(3, 'BUSY-WAY 3', 'Rafael Bea ', 'December 20, 2022', 'Quezon City', 'Sleeper', '', '15:00,18:15', 'AVAILABLE', '', 'b3.jpg', 1),
(4, 'BUSY-WAY 4', 'Julius Lasundin', 'December 20, 2022', 'Makati City', 'NONE-A/C', '', '18:00,15:15', 'AVAILABLE', '', 'b4.jpg', 1),
(5, 'BUSY-WAY 5', 'Elmo Chicogo', 'December 20, 2022', 'Navotas City', 'A/C', '', '21:15', 'AVAILABLE', '', 'b5.jpg', 1),
(6, 'BUSY-WAY 6', 'Cristiano Ronaldo', 'December 20, 2022', 'Taguig City', 'Sleeper', '', '', 'NOT AVAILABLE', '', 'b6.jpg', 1),
(7, 'BUSY-WAY 7', 'Lionel Messi\r\n', 'December 20, 2022', 'Malabon City', 'A/C', '', '', 'NOT AVAILABLE', '', 'b7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(1, 'neil', 'nneila2118@gmail.com', 'nobleza', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `movie` varchar(100) NOT NULL,
  `show_time` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `totalseat` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `ex_date` varchar(100) NOT NULL,
  `cvv` int(5) NOT NULL,
  `custemer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uid`, `movie`, `show_time`, `seat`, `totalseat`, `price`, `payment_date`, `booking_date`, `card_name`, `card_number`, `ex_date`, `cvv`, `custemer_id`) VALUES
(1, 1, 'BUSY-WAY 5', '21:15', 'G9,F2,C1,F7,F8', '5', '4995', 'Sun-12-22 ', 'Mon-12-22 ', 'Raymar Llagas', '1111-2222-3333-4444', '2023-03-03', 52, 176547498);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `massage` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `massage`) VALUES
(60, 'Raymar Llagas', 'raymarllagas@gmail.com', 'Hello World\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `id` int(25) NOT NULL,
  `show` varchar(100) NOT NULL,
  `theater` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`id`, `show`, `theater`) VALUES
(1, '21:00', '1'),
(2, '15:00', '1'),
(3, '18:00', '1'),
(4, '18:15', '2'),
(5, '15:15', '2'),
(6, '21:15', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile`, `city`, `password`, `image`) VALUES
(1, 'Raymar Llagas', 'raymarllagas@gmail.com', 64130785, 'Polangui Albay', 'Raymar123', 'raymarpogi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bus`
--
ALTER TABLE `add_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bus`
--
ALTER TABLE `add_bus`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
