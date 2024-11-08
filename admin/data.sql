-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2024 at 07:39 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u912243786_devshelter`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL,
  `totalRooms` int(11) DEFAULT NULL,
  `totalGuest` int(11) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `guest_id`, `check_in`, `check_out`, `status`, `totalRooms`, `totalGuest`, `timestamp`, `Price`) VALUES
(2632, 13, 2, '2024-08-10', '2024-08-11', 'pending', 2, 4, '2024-08-10 17:07:11', 5712.5),
(2633, 14, 2, '2024-08-10', '2024-08-11', 'pending', 2, 4, '2024-08-10 17:07:11', 5712.5),
(2634, 56, 3, '2024-08-17', '2024-08-18', 'pending', 1, 1, '2024-08-16 13:44:29', 3427.5);

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `email`, `phone`) VALUES
(1, 'prasad', 'prasadkalvikatti@gmial.com', '9022428111'),
(2, 'prasad', 'prasadkalviaktti@gmail.com', '9022428112'),
(3, 'Shivajeet pandey', 'rajpandey5335@gmail.com', '7704995335');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(4, 'Malad'),
(5, 'Goregoan');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `is_always_active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('available','booked','maintenance','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `location_id`, `type_id`, `price`, `status`) VALUES
(13, '101', 4, 7, 2500.00, 'pending'),
(14, '102', 4, 8, 2500.00, 'pending'),
(15, '103', 4, 9, 3000.00, 'available'),
(16, '103-B', 4, 9, 3000.00, 'available'),
(17, '104', 4, 10, 3000.00, 'available'),
(18, '104-B', 4, 10, 3000.00, 'available'),
(19, '104-C', 4, 10, 3000.00, 'available'),
(56, 'Kalpataru 01', 4, 12, 3000.00, 'pending'),
(57, 'Kalpataru 02', 4, 12, 3000.00, 'available'),
(58, 'Kalpataru 03', 4, 12, 3000.00, 'available'),
(59, 'Kalpataru 04', 4, 12, 3000.00, 'available'),
(60, 'Kalpataru 05', 4, 12, 3000.00, 'available'),
(61, 'Kalpataru 06', 4, 12, 3000.00, 'available'),
(62, 'Kalpataru 07', 4, 12, 3000.00, 'available'),
(63, 'Kalpataru 08', 4, 12, 3000.00, 'available'),
(64, 'Kalpataru 09', 4, 12, 3000.00, 'available'),
(75, '0', 4, 12, 3000.00, 'available'),
(76, 'devShelter Malad 02', 4, 12, 3000.00, 'available'),
(77, 'devShelter Malad 03', 4, 12, 3000.00, 'available'),
(78, 'devShelter Malad 04', 4, 12, 3000.00, 'available'),
(79, 'devShelter Malad 05', 4, 12, 3000.00, 'available'),
(80, 'devShelter Malad 06', 4, 12, 3000.00, 'available'),
(81, 'devShelter Malad 07', 4, 12, 3000.00, 'available'),
(82, 'devShelter Malad 08', 4, 12, 3000.00, 'available'),
(83, 'devShelter Malad 09', 4, 12, 3000.00, 'available'),
(84, 'devShelter Malad 10', 4, 12, 3000.00, 'available'),
(95, 'devShelter Goregoan 01', 5, 11, 3500.00, 'available'),
(96, 'devShelter Goregoan 02', 5, 11, 3500.00, 'available'),
(97, 'devShelter Goregoan 03', 5, 11, 3500.00, 'available'),
(98, 'devShelter Goregoan 04', 5, 11, 3500.00, 'available'),
(99, 'devShelter Goregoan 05', 5, 11, 3500.00, 'available'),
(100, 'devShelter Goregoan 06', 5, 11, 3500.00, 'available'),
(101, 'devShelter Goregoan 07', 5, 11, 3500.00, 'available'),
(102, 'devShelter Goregoan 08', 5, 11, 3500.00, 'available'),
(103, 'devShelter Goregoan 09', 5, 11, 3500.00, 'available'),
(104, 'devShelter Goregoan 10', 5, 11, 3500.00, 'available'),
(110, 'DevShelter Goregoan 01 B', 5, 12, 3000.00, 'available'),
(111, 'DevShelter Goregoan 02 B', 5, 12, 3000.00, 'available'),
(112, 'DevShelter Goregoan 03 B', 5, 12, 3000.00, 'available'),
(113, 'DevShelter Goregoan 04 B', 5, 12, 3000.00, 'available'),
(114, 'DevShelter Goregoan 05 B', 5, 12, 3000.00, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `primarytype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `type`, `primarytype`) VALUES
(7, '3BHK Semi Deluxe Room', 'service'),
(8, '4 BHKS Semi Deluxe Room', 'service'),
(9, '3BHK Deluxe Room', 'service'),
(10, '4 BHKS Deluxe Room', 'service'),
(11, 'Executive Deluxe', 'apart'),
(12, 'Deluxe Room', 'apart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$cXdYkPN/DtQUCcY3xCrTOefr2a7GdbOeFtFt0NdsdK52yFYTLHOQW', 'admin'),
(2, 'shubham', '$2y$10$7tVG2aSRQZLjBqGkjlzN/eEw9jRrWNGAnfLvuTONU509bOzFbZ24.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2635;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2457;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
