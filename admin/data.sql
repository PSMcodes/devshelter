CREATE TABLE `bookings` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `room_id` int(11) NOT NULL,
 `guest_id` int(11) NOT NULL,
 `check_in` date NOT NULL,
 `check_out` date NOT NULL,
 `status` enum('pending','confirmed','cancelled') NOT NULL,
 PRIMARY KEY (`id`),
 KEY `room_id` (`room_id`),
 KEY `guest_id` (`guest_id`),
 CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
 CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
guests	CREATE TABLE `guests` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `phone` varchar(15) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
locations	CREATE TABLE `locations` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
rooms	CREATE TABLE `rooms` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `room_number` varchar(10) NOT NULL,
 `location_id` int(11) NOT NULL,
 `type_id` int(11) NOT NULL,
 `price` decimal(10,2) NOT NULL,
 `status` enum('available','booked','maintenance') NOT NULL,
 `image` varchar(255) DEFAULT NULL,
 `google_map_link` varchar(255) DEFAULT NULL,
 `max_capacity` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `room_number` (`room_number`),
 KEY `location_id` (`location_id`),
 KEY `type_id` (`type_id`),
 CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
 CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `room_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
room_types	CREATE TABLE `room_types` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `type` varchar(50) NOT NULL,
 `description` text DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
users	CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `password` varchar(255) NOT NULL,
 `role` enum('admin','staff') NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci