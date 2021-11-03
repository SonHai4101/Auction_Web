-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 06:00 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `auction`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbo_admin`
--

CREATE TABLE `dbo_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dbo_admin`
--

INSERT INTO `dbo_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'MongSonHai', 'admin', 'admin'),
(4, 'NguyenDuyDuy', 'Duy', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbo_categories`
--

CREATE TABLE `dbo_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dbo_categories`
--

INSERT INTO `dbo_categories` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(7, 'Jewelry', 'Category_114.jpg', 'Yes', 'Yes'),
(8, 'Artwork', 'Category_996.jpg', 'Yes', 'Yes'),
(9, 'Watches', 'Category_579.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbo_checkout`
--

CREATE TABLE `dbo_checkout` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(150) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cardname` varchar(100) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `expmonth` varchar(100) NOT NULL,
  `expyear` varchar(100) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbo_items`
--

CREATE TABLE `dbo_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `closing_date` datetime NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dbo_items`
--

INSERT INTO `dbo_items` (`id`, `title`, `description`, `price`, `image_name`, `categories_id`, `closing_date`, `featured`, `active`) VALUES
(1, 'Obsidian Shield Ring', 'Step into your sacred feminine power with a shield that transforms any negative vibrations within and disperses the thoughts that arise against yourself. Obsidian awakens clarity and opens up a direct connection to a sacred space, delivering you divine guidance to manifest.', '2500000.00', 'Item-Name-3248.jpg', 7, '2021-10-05 13:24:01', 'Yes', 'Yes'),
(3, 'ALI BAYOUMI (EGYPTIAN D. 2019)', 'Dr. Mohamed Said Farsi (1934-2019) was one of the world’s great patrons of Egyptian art. In 1956 he was one of only 35 students from the Kingdom of Saudi Arabia sent abroad for further education. Having obtained a BA in Architecture and Town Planning from the University of Alexandria in Egypt, he returned to Saudi Arabia and in 1972 became the Mayor of Jeddah. During his lifetime, he assembled the most important private collection of Modern Egyptian art.', '3000000.00', 'Item-Name-3797.jpg', 8, '2021-11-05 13:24:47', 'Yes', 'Yes'),
(4, 'NECKLACE', ' The most thoughtful gift you could ever give in any season is this gorgeously stunning necklace, with secret inscriptions written through nano micro-carving', '1000000.00', 'Item-Name-2190.jpg', 7, '2021-11-06 13:25:13', 'Yes', 'Yes'),
(5, 'Frederique-Constan', 'Swiss Made\r\nMovement: Automatic\r\nCase Width: 40 mm\r\nWater Resistance: 30 m (100 feet)\r\nFeatures: Date', '2000000.00', 'Item-Name-7319.jpg', 9, '2021-11-05 18:25:26', 'Yes', 'Yes'),
(6, 'GLYCINE-Watch', 'Swiss Made\r\nMovement: Automatic\r\nCase Width: 46 mm\r\nWater Resistance: 300 m (990 feet)\r\nFeatures: Date, GMT', '2500000.00', 'Item-Name-8036.jpg', 9, '2021-11-04 18:25:45', 'Yes', 'Yes'),
(7, 'PHILIP STEIN-Watch', 'Movement: Quartz\r\nCase Width: 45 mm\r\nWater Resistance: 50 m (165 feet)', '1750000.00', 'Item-Name-9893.jpg', 9, '2021-11-07 09:26:06', 'Yes', 'Yes'),
(8, 'LUXURIOUS STERLING SILVER RING', 'It has a specially fashioned triple-band bedecked with striking accent stones. The stunning center stone is mounted with a large simulated diamond and its gallery rail adorned with multiple charming crystals.', '4500000.00', 'Item-Name-2357.jpg', 7, '2021-11-04 12:26:20', 'Yes', 'Yes'),
(9, 'Textured Oil Painting Abstract Canvas Wall Art Cuadros', 'Type: 100% Handmade oil painting\r\nMedium: Acrylics on linen canvas\r\nSize: 80x80cm or customized\r\nService: Graphic Design, Drop Shipping, Buy Label, Custom Log', '3500000.00', 'Item-Name-8131.jpg', 8, '2021-11-05 13:26:40', 'Yes', 'Yes'),
(10, 'Canvas Painting Animal Wall Art', 'Name: Art Decorative Painting\r\nTechnology: High definition art spray painting\r\nSize: 40*60, 50*70, 60*90, 75*100\r\nFrame Methods: A variety of frame options, Please ask customer service', '4000000.00', 'Item-Name-2557.jpg', 8, '2021-10-31 15:26:51', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbo_users`
--

CREATE TABLE `dbo_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dbo_users`
--

INSERT INTO `dbo_users` (`id`, `username`, `useremail`, `userpassword`) VALUES
(1, 'hhai', 'hhai@gmail.com', '$2y$10$GA1Fm65a3tnPfKzVjUyNDOreCTgLPBCO5OLueZh7Q.KhAyw9t6ja2'),
(3, 'hhai1', 'hhai1@gmail.com', '$2y$10$k03ttIUK3JyryaNI3sWsnu37MzjKKaO0W/4/BjYCn9/w5q6bjG1A6');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dbo_admin`
--
ALTER TABLE `dbo_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbo_categories`
--
ALTER TABLE `dbo_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbo_checkout`
--
ALTER TABLE `dbo_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbo_items`
--
ALTER TABLE `dbo_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbo_users`
--
ALTER TABLE `dbo_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dbo_admin`
--
ALTER TABLE `dbo_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `dbo_categories`
--
ALTER TABLE `dbo_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dbo_checkout`
--
ALTER TABLE `dbo_checkout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dbo_items`
--
ALTER TABLE `dbo_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `dbo_users`
--
ALTER TABLE `dbo_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
