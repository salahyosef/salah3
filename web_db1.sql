-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 مارس 2023 الساعة 07:52
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_db1`
--

-- --------------------------------------------------------

--
-- بنية الجدول `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` int(11) NOT NULL,
  `img_src` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `email`, `password`, `address`, `img_src`) VALUES
(26, 'salah', 'slamsmh@gmail.com', 'salah', 2, '55976-‏‏لقطة الشاشة (52).png'),
(27, 'salah66', 'salah.meahm@gmail.com', 'salah', 2, '84491-‏‏لقطة الشاشة (38).png'),
(28, 'mohammed', 'mohameed.msemh@gamil.com', 'salah', 3, '59367-‏‏لقطة الشاشة (60).png'),
(29, 'yosef', 'yosefmsmh@gmail.com', 'salah', 1, '31742-‏‏لقطة الشاشة (40).png'),
(30, 'yhya', 'yhya.meahm@gmail.com', 'salah', 2, '77559-‏‏لقطة الشاشة (37).png'),
(31, 'hassn', 'hassn@gmil.com', 'salah', 3, '48216-‏‏لقطة الشاشة (23).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
