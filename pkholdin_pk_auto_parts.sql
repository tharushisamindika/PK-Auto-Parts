-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 06:14 PM
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
-- Database: `pkholdin_pk_auto_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Customer_1', '0112345678', 'user1@g.com', 'test', 'cgnhdgh', '2024-10-26 12:09:53'),
(2, 'Customer_1', '0112345678', 'zdf@g.com', 'test', 'test', '2024-10-26 12:50:19'),
(3, 'test ', '0112345678', 'zsdf@g.com', 'Test ', 'testing', '2024-10-27 05:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `feedback_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `rating`, `feedback_text`, `created_at`) VALUES
(6, 21, 5, 'High Quality Product. Thank you PK', '2024-11-12 17:05:40'),
(7, 22, 4, 'good product', '2024-11-12 17:07:57'),
(8, 23, 5, 'Good mount for my vehicle thank you', '2024-11-12 17:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','completed','canceled') DEFAULT 'pending',
  `name` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `order_date`, `status`, `name`, `shipping_address`, `phone_number`) VALUES
(16, 21, 15, 50, 13750.00, '2024-11-12 22:34:42', 'pending', 'SLC DEATH', 'No.73\r\nBulugahathannawatta, yakgahapitiya\r\nGunnepana', '0779981966'),
(17, 21, 17, 100, 16500.00, '2024-11-12 22:34:42', 'pending', 'SLC DEATH', 'No.73\r\nBulugahathannawatta, yakgahapitiya\r\nGunnepana', '0779981966'),
(18, 21, 19, 500, 82500.00, '2024-11-12 22:34:42', 'pending', 'SLC DEATH', 'No.73\r\nBulugahathannawatta, yakgahapitiya\r\nGunnepana', '0779981966'),
(19, 22, 16, 4, 700.00, '2024-11-12 22:37:04', 'pending', 'kaveesha', 'No.73\r\nBulugahathannawatta, yakgahapitiya\r\nGunnepana', '0779981966'),
(20, 23, 25, 10, 1950.00, '2024-11-12 22:39:11', 'pending', 'hansi', '1,devi road,kandy', '0768025951'),
(21, 23, 15, 13, 3575.00, '2024-11-12 22:39:11', 'pending', 'hansi', '1,devi road,kandy', '0768025951');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_description`, `product_price`) VALUES
(15, 'Honda Silencer Mount', '../uploads/IMG_20241112_162249.webp', 'SM 1710', 275.00),
(16, 'Rosa Spring Bush', '../uploads/IMG_20241112_161659.webp', 'RB 1001', 175.00),
(17, 'LH113 Spring Bush', '../uploads/IMG_20241112_161730.webp', 'RB 1005', 165.00),
(19, 'Caravan Spring Bush', '../uploads/IMG_20241112_162104.webp', 'RB 1014', 165.00),
(21, '113 Spring Pad', '../uploads/IMG_20241112_161847.webp', 'SP 2501', 195.00),
(22, 'Alto Rack Mount', '../uploads/IMG_20241112_161755.webp', 'RM 2059', 300.00),
(23, 'Vanate Large Spring Bush', '../uploads/IMG_20241112_161838.webp', 'RB 1015', 225.00),
(24, 'Caravan VRG Spring Bush', '../uploads/IMG_20241112_161722.webp', 'RB 1019', 225.00),
(25, '113 Silencer Mount', '../uploads/IMG_20241112_161908.webp', 'SM 1701', 195.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('customer','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(4, 'admin_1', '$2y$10$qeDss7I50PemXWh8a07Zaud/WseT0u76KT8mNzwoBwz0096FMBBym', 'hh@gm.com', 'admin', '2024-10-26 08:19:40'),
(6, 'admin_2', '$2y$10$s8bBmNc7AhTDl57UXNtNBudShB8HSKFqRvIvnHM/CdxbY8ItheMPq', 'zdf@g.com', 'admin', '2024-10-26 08:24:11'),
(21, 'Ravindu', '$2y$10$e61q.Zil2XU61CGNqyZSy.LQmcNwDjcdIk3XPXRtiOctZmhRCDhgW', 'ravi12@gmail.com', 'customer', '2024-11-12 13:07:47'),
(22, 'kaveesha', '$2y$10$hE2lughXcxFPoV.h4bWEzONVCqkE4EoI8of8HjtDrgUweeSb7RCdO', 'kaveeshabandara846@gmail.com', 'customer', '2024-11-12 17:06:30'),
(23, 'hansi', '$2y$10$40VVxWAoLxUnztQHzPBbW.KXYuoXkbNAemB/pWhlGPlvTRatZYkDy', '123', 'customer', '2024-11-12 17:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
