-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3066
-- Generation Time: Dec 15, 2024 at 06:59 AM
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
(1, 'Phòng trọ sinh viên giá rẻ nhất VN', '<p>Th&ocirc;ng tin m&ocirc; tả Đất khu Big C Go, phường Đ&ocirc;ng Ho&agrave;, TP Dĩ An. Đất 5,8 tỷ TL - 81m&sup2; (4,5x18m). Thổ cư 100%. Sổ hồng ri&ecirc;ng. Hỗ trợ vay ng&acirc;n h&agrave;ng 70%. Vị tr&iacute;: Đất trong khu ngay BigC GO Dĩ An, quy hoạch khu cao cấp, sạch đẹp, mặt tiền đường th&ocirc;ng, rộng 16m c&oacute; vỉa h&egrave;, gi&aacute;p trung t&acirc;m h&agrave;nh ch&iacute;nh Dĩ An v&agrave; Thủ Đức, gần l&agrave;ng đại học quốc gia TPHCM, Vị tr&iacute; trung t&acirc;m, tiện &iacute;ch đầy đủ, đi lại thuận tiện. Đặc điểm bất động sản</p>\r\n', 5030206, 3, 0, '16, Lê Duẩn2', 'aaaaaa', 'image/motel/Motell5.jpg', 1, 1, 1, '', '2024-12-03 08:40:48', '898393893', 1),
(4, 'Phòng trọ sinh viên giá rẻ', 'Thông tin mô tả\nĐất khu Big C Go, phường Đông Hoà, TP Dĩ An.\nĐất 5,8 tỷ TL - 81m² (4,5x18m).\nThổ cư 100%. Sổ hồng riêng.\nHỗ trợ vay ngân hàng 70%.\n\nVị trí: Đất trong khu ngay BigC GO Dĩ An, quy hoạch khu cao cấp, sạch đẹp, mặt tiền đường thông, rộng 16m có vỉa hè, giáp trung tâm hành chính Dĩ An và Thủ Đức, gần làng đại học quốc gia TPHCM, Vị trí trung tâm, tiện ích đầy đủ, đi lại thuận tiện.\nĐặc điểm bất động sản', 500000, 5, 0, '16, Lê Duẩnaaa', 'aaaaaa', 'image/motel/Motell2.jpg', 1, 1, 1, '', '2024-12-03 08:43:37', '898393893', 1),
(5, 'Phòng trọ sang xịn mịn', '<h1>Mua đi mấy con</h1>\r\n', 3331222, 2, 0, '16, Lê Duẩnaaa', 'aaaaa', 'image/motel/unnamed-3.jpg', 1, 2, 2, '1', '2024-12-15 05:24:24', '09047868933', 1),
(6, 'Nhà trọ cực xấu', '<h1>Tiền n&agrave;o của nấy em nh&eacute;</h1>\r\n', 111111, 2, 0, 'Nghi Xuân - Hà tĩnh', 'aaaaa', 'image/motel/cho-thue-phong-tro-quan-binh-tan.jpg', 1, 3, 1, '1', '2024-12-15 05:39:10', '09047868934', 1);

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
(1, 'Bui Phuc', 'user', 'manh203phuc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '0909390832', 'image/logo.png'),
(2, 'Manh P', 'admin', 'mp203@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '23423412122', 'image/logo.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `title` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
