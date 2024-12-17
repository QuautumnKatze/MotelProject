-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3066
-- Generation Time: Dec 17, 2024 at 08:52 PM
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `created_at`, `email`, `message`) VALUES
(1, '2024-12-18 02:39:23', 'manhphuc2003@gmail.com', 'Đi theo chỉ dẫn nhanh hơn và dễ dàng hơn bằng Google Maps. Hơn 220 quốc gia và vùng lãnh thổ được lập bản đồ cũng như hàng trăm triệu doanh nghiệp và địa điểm đã có mặt trên bản đồ.'),
(2, '2024-12-18 02:42:03', 'manhphuc2003@gmail.com', '\nJapanese	Romaji\n最強ってなんだっけって問い合わせた	saikyou tte nandakke tte toiawaseta\n季節感ずれたっていいって着込んだセーター	kisetsu kanzuretatte iitte kikonda seetaa\n視線なんて範囲外　あとは僕に任せた	shisen nante hanigai ato wa boku ni makaseta\n\n感情論ぶちまけたって良くはないが	kanjouron buchimake tatte yoku wa nai ga\n言葉に出来ないのは世知辛いな	kotoba ni dekinai no wa sechigarai na\n愛さえも伝わらないボキャブラリーつらいな	ai sae mo tsutawaranai bokyaburarii tsurai na\n\nそれだっていいさ　楽観さ	sore datte ii sa rakkan sa\n全ては　勝利の舞さ	subete wa shouri no mai sa\n\nWE　CAN　LOVE　まじないかけたら	WE CAN LOVE majinai kaketara\n何でも出来そうになるベストセラー	nani demo dekisou ni naru besutoseraa\n叶うのなら　世界平和	kanau no nara sekai heiwa\n単純だから　明快なんだ	tanjun dakara meikai nanda\n蹴り飛ばせって高く飛べば	keritobase tte takaku tobeba\n明日の選択肢は独自解釈さ	ashita no sentakushi wa dokuji kaishaku sa\n託したものは でっかいものか？	takushita mono wa dekkai mono ka?\n未来なのか わからないままさ	mirai na no ka wakaranai mama sa\n\nいつだって最善は尽くしたはずさ	itsu datte saizen wa tsukushita hazu sa\nでも行動力の制限管理なら杜撰	demo koudouryoku no seigen kanri nara zusan\n誤魔化したって結局は顕になっちゃうさ	gomakashita tte kekkyoku wa arawa ni nacchau sa\n\n極論に振り分けたって変わんないや	kyokuron ni furiwaketa tte kawannai ya\n０と１の二択で良いんじゃないか	zero to ichi no nitaku de iin ja nai ka\nでも実際複雑に絡まった心の在り処	demo jissai fukuzatsu ni karamatta kokoro no arika\n\nそれだっていいさ　楽観さ	sore datte ii sa rakkan sa\n全ては　勝利の舞さ	subete wa shouri no mai sa\n\nWE　CAN　LOVE　言葉に込めたら	WE CAN LOVE kotoba ni kometara\nなんとか意図がわかるその力	nantoka ito ga wakaru sono chikara\nまさにこれは　世界平和	masani kore wa sekai heiwa\n単純だから　明快なんだ	tanjun dakara meikai nanda\n翼の真似した両手は	tsubasa no mane shita ryoute wa\n丸い地球を抱きかかえるようだ	marui chikyuu o daki kakaeru you da\n見据えたものは でっかいものか？	misueta mono wa dekkai mono ka?\n未来なのか わからないままさ	mirai na no ka wakaranai mama sa\n\nそれだっていいさ　楽観さ	sore datte ii sa rakkan sa\n全ては　勝利の舞さ	subete wa shouri no mai sa\n\nWE　CAN　LOVE　まじなかけたら	WE CAN LOVE majina kaketara\n何でも出来そうになるベストセラー	nani demo dekisou ni naru besutoseraa\n叶うのなら　世界平和	kanau no nara sekai heiwa\n単純だから　明快なんだ	tanjun dakara meikai nanda\n蹴り飛ばせって高く飛べば	keritobase tte takaku tobeba\n明日の選択肢は独自解釈さ	ashita no sentakushi wa dokuji kaishaku sa\n託したものは でっかいものか？	takushita mono wa dekkai mono ka?\n未来なのか わからないままさ	mirai na no ka wakaranai mama sa');

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
(1, 'Phòng trọ sinh viên giá rẻ nhất VN', '<p>Th&ocirc;ng tin m&ocirc; tả Đất khu Big C Go, phường Đ&ocirc;ng Ho&agrave;, TP Dĩ An. Đất 5,8 tỷ TL - 81m&sup2; (4,5x18m). Thổ cư 100%. Sổ hồng ri&ecirc;ng. Hỗ trợ vay ng&acirc;n h&agrave;ng 70%. Vị tr&iacute;: Đất trong khu ngay BigC GO Dĩ An, quy hoạch khu cao cấp, sạch đẹp, mặt tiền đường th&ocirc;ng, rộng 16m c&oacute; vỉa h&egrave;, gi&aacute;p trung t&acirc;m h&agrave;nh ch&iacute;nh Dĩ An v&agrave; Thủ Đức, gần l&agrave;ng đại học quốc gia TPHCM, Vị tr&iacute; trung t&acirc;m, tiện &iacute;ch đầy đủ, đi lại thuận tiện. Đặc điểm bất động sản</p>\r\n', 5030206, 3, 14, '16, Lê Duẩn2', '18.659344, 105.695145', 'image/motel/Motell5.jpg', 1, 1, 1, '', '2024-12-03 08:40:48', '898393893', 1),
(4, 'Phòng trọ sinh viên giá rẻ', 'Thông tin mô tả\nĐất khu Big C Go, phường Đông Hoà, TP Dĩ An.\nĐất 5,8 tỷ TL - 81m² (4,5x18m).\nThổ cư 100%. Sổ hồng riêng.\nHỗ trợ vay ngân hàng 70%.\n\nVị trí: Đất trong khu ngay BigC GO Dĩ An, quy hoạch khu cao cấp, sạch đẹp, mặt tiền đường thông, rộng 16m có vỉa hè, giáp trung tâm hành chính Dĩ An và Thủ Đức, gần làng đại học quốc gia TPHCM, Vị trí trung tâm, tiện ích đầy đủ, đi lại thuận tiện.\nĐặc điểm bất động sản', 500000, 5, 9, '16, Lê Duẩnaaa', '18.659523, 105.694017', 'image/motel/Motell2.jpg', 1, 1, 1, '', '2024-12-03 08:43:37', '898393893', 1),
(5, 'Phòng trọ sang xịn mịn', '<h1>Mua đi mấy con</h1>\r\n', 3331222, 2, 4, '16, Lê Duẩnaaa', '18.688858, 105.669852', 'image/motel/unnamed-3.jpg', 1, 2, 2, '1', '2024-12-15 05:24:24', '09047868933', 1),
(6, 'Nhà trọ cực xấu', '<h1>Tiền n&agrave;o của nấy em nh&eacute;</h1>\r\n', 111111, 2, 5, 'Nghi Xuân - Hà tĩnh', '18.908731, 105.581090', 'image/motel/cho-thue-phong-tro-quan-binh-tan.jpg', 1, 3, 1, '1', '2024-12-15 05:39:10', '09047868934', 1),
(7, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:35:52', '5342345345', 1),
(8, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:02', '5342345345', 1),
(9, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:05', '5342345345', 1),
(10, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:07', '5342345345', 1),
(11, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:09', '5342345345', 1),
(12, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:11', '5342345345', 1),
(13, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:13', '5342345345', 1),
(14, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:15', '5342345345', 1),
(15, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:17', '5342345345', 1),
(16, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:19', '5342345345', 1),
(17, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:21', '5342345345', 1),
(18, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:22', '5342345345', 1),
(19, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:24', '5342345345', 1),
(20, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:26', '5342345345', 1),
(21, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:28', '5342345345', 1),
(22, 'Nhà trọ gần bờ biển', '', 5030206, 3, 0, 'Thị trấn gần biển nào đó', '18.688858, 105.669852', 'image/motel/Motell2.jpg', 1, 3, 1, '', '2024-12-17 18:36:30', '5342345345', 1);

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
(2, 'Manh P', 'admin', 'manhphuc2003@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '23423412122', 'image/login.jpg'),
(3, 'Manh Phucc', 'user777', 'manhphuc200zzz3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '09047868934', 'image/M∀LICE _CODE_ GWC-06.png');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `motels`
--
ALTER TABLE `motels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `title` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
