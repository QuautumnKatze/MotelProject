-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3066
-- Generation Time: Dec 03, 2024 at 11:06 AM
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
-- Database: `phongtrodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Phòng trọ sinh viên', ''),
(2, 'Phòng trọ luxury', ''),
(3, 'Phòng trọ vip', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `description`) VALUES
(1, 'Lê Duẩn', ''),
(2, 'Bạch Mai', '');

-- --------------------------------------------------------

--
-- Table structure for table `motels`
--

CREATE TABLE `motels` (
  `id` int(11) NOT NULL,
  `title` varchar(266) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `count_view` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latlng` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ultilities` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motels`
--

INSERT INTO `motels` (`id`, `title`, `description`, `price`, `area`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `ultilities`, `created_at`, `phone`, `approve`) VALUES
(1, 'Phòng trọ sinh viên giá rẻ', 'Cho thuê phòng trọ giá rẻ', 500000, 1, 0, '16, Lê Duẩn', 'aaaaaa', 'image/motel/Motell1.jpg', 1, 1, 1, '', '2024-12-03 08:40:48', '898393893', 1),
(2, 'Phòng trọ sinh viên giá rẻ', 'Cho thuê phòng trọ giá rẻ', 500000, 1, 0, '16, Lê Duẩn', 'aaaaaa', 'image/motel/Motell2.jpg', 1, 1, 1, '', '2024-12-03 08:43:26', '898393893', 1),
(3, 'Phòng trọ sinh viên giá rẻ', 'Cho thuê phòng trọ giá rẻ', 500000, 1, 0, '16, Lê Duẩn', 'aaaaaa', 'image/motel/Motell3.jpg', 1, 1, 1, '', '2024-12-03 08:43:32', '898393893', 1),
(4, 'Phòng trọ sinh viên giá rẻ', 'Cho thuê phòng trọ giá rẻ', 500000, 1, 0, '16, Lê Duẩn', 'aaaaaa', 'image/motel/Motell4.jpg', 1, 1, 1, '', '2024-12-03 08:43:37', '898393893', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `title` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `phone`, `avatar`) VALUES
(1, 'Manh Phuc', 'admin', 'manhphuc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '090939083', 'image/avatar-default.jpg\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motels`
--
ALTER TABLE `motels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`category_id`,`district_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`title`),
  ADD KEY `user_id` (`user_id`,`created_at`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `motels`
--
ALTER TABLE `motels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `title` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motels`
--
ALTER TABLE `motels`
  ADD CONSTRAINT `motels_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `motels_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `motels_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
