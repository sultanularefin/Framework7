-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 03:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework7`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookings_id` int(11) NOT NULL,
  `destination` int(150) NOT NULL,
  `carNumber` int(60) NOT NULL,
  `bookingTime` datetime NOT NULL,
  `returnTime` datetime NOT NULL,
  `pickupFrom` int(150) NOT NULL,
  `passengers` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `edited_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookings_id`, `destination`, `carNumber`, `bookingTime`, `returnTime`, `pickupFrom`, `passengers`, `userid`, `edited_time`) VALUES
(24, 2, 3, '2018-02-08 00:00:00', '2017-04-30 00:00:00', 2, 44, 1, '0000-00-00'),
(31, 3, 3, '2017-04-30 00:00:00', '2017-04-21 00:00:00', 4, 9, 1, '2018-02-09'),
(33, 2, 1, '2018-02-09 00:00:00', '2014-11-25 00:00:00', 4, 11, 1, NULL),
(34, 5, 5, '2018-02-09 00:00:00', '2017-04-30 00:00:00', 1, 33, 1, NULL),
(35, 2, 1, '2017-04-30 00:00:00', '2014-04-30 00:00:00', 1, 77, 1, '2018-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `availability` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `name`, `availability`) VALUES
(1, 'Fiat-421 886', b'1'),
(2, 'Rolls Royce -7345 4123', b'1'),
(3, 'Crystler 3123 4123', b'1'),
(4, 'Hino 4123 5123', b'0'),
(5, 'Scania 412 5123 1234', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `value` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `value`) VALUES
(1, 'Gabtoli Bus Stand Dhaka, Bangladesh'),
(2, 'Saydabad Bus Stand Dhaka, Bangladesh'),
(3, 'BRTC Counter Dinajpur, Bangladesh'),
(4, 'Itagacha Shatkhira Sadar, Shatkhira.'),
(5, 'Board Bazar, Gazipur, Dhaka.');

-- --------------------------------------------------------

--
-- Table structure for table `pickuplocation`
--

CREATE TABLE `pickuplocation` (
  `loc_id` int(11) NOT NULL,
  `pickUpLoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pickuplocation`
--

INSERT INTO `pickuplocation` (`loc_id`, `pickUpLoc`) VALUES
(1, 'Mirpur-2'),
(2, 'Gabtoli Bus Stand Dhaka.'),
(3, 'Saydabad Bus Stand, Dhaka'),
(4, 'Cox\'s Bazar, Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `username`) VALUES
(1, 'arefin@mail.com', '12345', 'arefin'),
(2, 'sultan@mail.com', '123456', 'sultan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookings_id`),
  ADD KEY `carNumber` (`carNumber`),
  ADD KEY `destination` (`destination`),
  ADD KEY `pickupFrom` (`pickupFrom`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `pickuplocation`
--
ALTER TABLE `pickuplocation`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pickuplocation`
--
ALTER TABLE `pickuplocation`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`carNumber`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`destination`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`pickupFrom`) REFERENCES `pickuplocation` (`loc_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
