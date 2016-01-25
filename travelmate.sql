-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2016 at 03:15 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ช้อปปิ้ง', '2016-01-14 09:07:01', '2016-01-14 09:07:01'),
(2, 'ธรรมชาติและสัตว์ป่า', '2016-01-14 09:07:54', '2016-01-14 09:07:54'),
(3, 'วิถีชีวิต', '2016-01-14 09:08:27', '2016-01-14 09:08:27'),
(4, 'ศิลปะ วัฒนธรรม และแหล่งมรดก', '2016-01-14 09:09:54', '2016-01-14 09:09:54'),
(5, 'สถานที่ท่องเที่ยวเชิงวิชาการ', '2016-01-14 09:10:48', '2016-01-14 09:10:48'),
(6, 'สันทนาการและบันเทิง', '2016-01-14 09:14:57', '2016-01-14 09:14:57'),
(7, 'โครงการหลวงและโครงการในพระราชดําริ', '2016-01-14 09:16:52', '2016-01-14 09:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_10_095337_create_user_table', 1),
('2016_01_10_133248_create_travel_table', 1),
('2016_01_11_174712_create_travel_table', 2),
('2016_01_11_181652_create_travel_table', 3),
('2016_01_13_081135_create_user_table', 4),
('2016_01_13_081821_create_category_table', 5),
('2016_01_13_110154_create_category_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `daystart` date NOT NULL,
  `dayend` date NOT NULL,
  `kidsage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `name`, `detail`, `daystart`, `dayend`, `kidsage`, `address`, `phone`, `created_at`, `updated_at`, `category`, `location`) VALUES
(1, 'aaa', 'bbb', '2016-01-14', '2016-01-15', '12', '414', '0887590142', '2016-01-14 09:21:21', '2016-01-14 09:21:21', 0, '13.752321, 100.488236'),
(2, 'sss', 'aaa', '2016-01-15', '2016-01-16', '8', '424', '0887590142', '2016-01-14 09:51:19', '2016-01-14 09:51:19', 0, '13.752321, 100.488236'),
(3, 'yyy', 'aaa', '2016-01-18', '2016-01-22', '11', '434', '0887590142', '2016-01-14 11:57:19', '2016-01-14 11:57:19', 0, '13.752321, 100.488236'),
(4, 'hhh', 'aaa', '2016-01-09', '2016-01-16', '10', '232', '0887590142', '2016-01-14 14:12:17', '2016-01-14 14:12:17', 0, '13.752321, 100.488236'),
(5, 'eee', 'qqq', '2016-01-16', '2016-01-16', '13 ขวบขึ้นไป', '434', '0887590142', '2016-01-14 14:13:44', '2016-01-14 14:13:44', 0, '13.752321, 100.488236');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `facebookid` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `facebookid`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'test1@gmail.com', '$2y$10$tFWCPpuLJfUY0jF1EQM9TeaaSHW2l.0jhyRJX0/UoA0BPTqibSRam', '', '', NULL, '2016-01-13 01:14:36', '2016-01-13 01:14:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
