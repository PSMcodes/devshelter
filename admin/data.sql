-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 04:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

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
  `status` enum('available','booked','maintenance') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `google_map_link` varchar(255) DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `location_id`, `type_id`, `price`, `status`, `image`, `google_map_link`, `max_capacity`) VALUES
(13, '101', 4, 7, 2500.00, 'available', 'uploads/', 'https://www.google.com', 2),
(14, '102', 4, 8, 2500.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(15, '103-A', 4, 9, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(16, '103-B', 4, 9, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(17, '104-A', 4, 10, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(18, '104-B', 4, 10, 3000.00, 'available', 'uploads/', 'https://www.google.com', 2),
(19, '104-C', 4, 10, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(56, 'Kalpataru 01', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(57, 'Kalpataru 02', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(58, 'Kalpataru 03', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(59, 'Kalpataru 04', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(60, 'Kalpataru 05', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(61, 'Kalpataru 06', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(62, 'Kalpataru 07', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(63, 'Kalpataru 08', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(64, 'Kalpataru 09', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(75, 'devShelter Malad 01', 4, 12, 3000.00, 'booked', 'uploads/', 'https://www.google.com', 2),
(76, 'devShelter Malad 02', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(77, 'devShelter Malad 03', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(78, 'devShelter Malad 04', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(79, 'devShelter Malad 05', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(80, 'devShelter Malad 06', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(81, 'devShelter Malad 07', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(82, 'devShelter Malad 08', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(83, 'devShelter Malad 09', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(84, 'devShelter Malad 10', 4, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(95, 'devShelter Goregoan 01', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(96, 'devShelter Goregoan 02', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(97, 'devShelter Goregoan 03', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(98, 'devShelter Goregoan 04', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(99, 'devShelter Goregoan 05', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(100, 'devShelter Goregoan 06', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(101, 'devShelter Goregoan 07', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(102, 'devShelter Goregoan 08', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(103, 'devShelter Goregoan 09', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(104, 'devShelter Goregoan 10', 5, 11, 3500.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(110, 'DevShelter Goregoan 01 B', 5, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(111, 'DevShelter Goregoan 02 B', 5, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(112, 'DevShelter Goregoan 03 B', 5, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(113, 'DevShelter Goregoan 04 B', 5, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2),
(114, 'DevShelter Goregoan 05 B', 5, 12, 3000.00, 'booked', 'uploads/IMG_2078.JPG', 'https://www.google.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

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
