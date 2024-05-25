-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2024 at 05:37 PM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `content`, `created_at`) VALUES
(1, 2, 'qwerty', '2024-05-25 14:44:07'),
(2, 2, 'wedrtfghj', '2024-05-25 14:44:12'),
(3, 3, 'qawertfyuio', '2024-05-25 14:44:25'),
(4, 3, 'wertyu', '2024-05-25 14:45:36'),
(5, 4, 'Dolorem qui debitis ', '2024-05-25 14:47:04'),
(6, 5, 'ertghj', '2024-05-25 14:56:12'),
(7, 5, 'yukl;', '2024-05-25 14:56:15'),
(8, 5, 'tyuiop', '2024-05-25 14:56:17'),
(9, 5, 'Quisquam sapiente qu', '2024-05-25 15:56:29'),
(40, 17, 'Sit est eligendi ac', '2024-05-25 16:37:38'),
(11, 9, 'Fugiat porro recusa', '2024-05-25 15:58:18'),
(12, 9, 'Minus tempore moles', '2024-05-25 15:58:21'),
(13, 9, 'Voluptate id omnis f', '2024-05-25 15:58:28'),
(14, 9, 'Minima quaerat qui l', '2024-05-25 15:58:31'),
(15, 9, 'Quas explicabo Magn', '2024-05-25 16:04:41'),
(16, 10, '', '2024-05-25 16:07:57'),
(17, 10, '', '2024-05-25 16:07:58'),
(18, 10, '', '2024-05-25 16:07:59'),
(19, 10, '', '2024-05-25 16:08:00'),
(20, 10, '', '2024-05-25 16:08:01'),
(21, 10, 'XVHal', '2024-05-25 16:08:03'),
(22, 11, '1', '2024-05-25 16:09:00'),
(23, 11, '2\r\n', '2024-05-25 16:09:02'),
(24, 11, '3\r\n', '2024-05-25 16:09:06'),
(25, 11, '4', '2024-05-25 16:09:09'),
(26, 12, '', '2024-05-25 16:19:05'),
(27, 13, '123131', '2024-05-25 16:20:23'),
(28, 13, '1332', '2024-05-25 16:20:26'),
(29, 13, 'Voluptate perferendi', '2024-05-25 16:23:26'),
(30, 13, 'Eveniet voluptatibu', '2024-05-25 16:23:31'),
(31, 15, 'Recusandae Sunt rep', '2024-05-25 16:28:23'),
(32, 15, 'Temporibus deleniti ', '2024-05-25 16:28:26'),
(33, 15, 'Hic dolore consequat', '2024-05-25 16:28:31'),
(34, 0, 'Voluptas sunt totam', '2024-05-25 16:29:34'),
(35, 0, 'Dolore sequi ipsum a', '2024-05-25 16:29:40'),
(36, 0, '', '2024-05-25 16:29:41'),
(37, 0, '', '2024-05-25 16:29:41'),
(38, 0, '', '2024-05-25 16:29:42'),
(39, 0, '', '2024-05-25 16:29:42'),
(41, 17, 'Sunt ex voluptatibu', '2024-05-25 16:37:57'),
(42, 17, 'Nisi totam quam enim', '2024-05-25 16:38:02'),
(43, 17, 'Sed dolor dolorem es', '2024-05-25 16:38:08'),
(44, 17, 'Sed impedit ut qui ', '2024-05-25 16:48:16'),
(45, 19, 'Odio repellendus Sa', '2024-05-25 17:15:12'),
(46, 19, 'Quibusdam quaerat ut', '2024-05-25 17:15:17'),
(47, 19, 'Possimus quas digni', '2024-05-25 17:15:20'),
(48, 19, 'Debitis adipisci aut', '2024-05-25 17:15:23'),
(49, 19, 'Qui dolor culpa fac', '2024-05-25 17:18:22'),
(50, 20, '1', '2024-05-25 17:19:15'),
(51, 20, '2', '2024-05-25 17:19:17'),
(52, 20, '3', '2024-05-25 17:19:20'),
(53, 21, '4\r\n', '2024-05-25 17:19:32'),
(54, 21, '5', '2024-05-25 17:19:36'),
(55, 21, '2', '2024-05-25 17:19:38'),
(56, 20, 'Aut saepe labore cum', '2024-05-25 17:24:21'),
(57, 20, 'Vel officia pariatur', '2024-05-25 17:24:25'),
(58, 20, 'Qui consequatur opt', '2024-05-25 17:29:09'),
(59, 20, 'Laborum Error qui r', '2024-05-25 17:34:37'),
(60, 21, 'Dolor do dolor facer', '2024-05-25 17:34:42'),
(61, 20, 'Laboris sunt conseq', '2024-05-25 17:34:48'),
(62, 22, '1234567', '2024-05-25 17:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(22, 'Ullam ex fugit nost', 'Culpa incididunt qu', '2024-05-25 17:35:02'),
(21, 'Ut est qui pariatur', 'Perferendis eos ea q', '2024-05-25 17:19:26'),
(20, 'Aperiam aut laborum ', 'Omnis architecto sin', '2024-05-25 17:04:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
