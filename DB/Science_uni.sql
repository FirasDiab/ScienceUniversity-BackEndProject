-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2021 at 11:26 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Science_uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `number` varchar(11) NOT NULL,
  `body` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `admin_id`, `media_id`, `number`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 42, '90+', 'Profession-ready degree programs', '2021-06-03 10:57:40', '2021-06-03 10:57:40'),
(3, 1, 43, '#1', 'Our MBA for salary-to-debt ratio', '2021-06-03 11:22:40', '2021-06-03 11:22:40'),
(4, 1, 44, '100,000', 'Sciences University alumni worldwide', '2021-06-05 22:13:19', '2021-06-05 22:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `role` enum('superAdmin','admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` enum('active','not-active') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `activity`) VALUES
(1, 'feras', 'feras@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'superAdmin', '2021-06-01 17:31:34', '2021-06-01 17:31:34', 'active'),
(10, 'firas', 'firas@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'superAdmin', '2021-06-06 03:21:02', '2021-06-06 03:21:02', 'active'),
(11, 'test', 'test@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'admin', '2021-06-07 16:28:00', '2021-06-07 16:28:00', 'active'),
(15, 'hello', 'hello@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'admin', '2021-06-07 19:28:17', '2021-06-07 19:28:17', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `admin_id`, `media_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(8, 1, 38, 'UNDERGRADUATE COURSES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-06-05 21:08:51', '2021-06-05 21:08:51'),
(9, 1, 39, 'GRADUATE COURSES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-06-05 21:10:29', '2021-06-05 21:10:29'),
(10, 1, 40, 'INTERNATIONAL STUDENTS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-06-05 21:11:03', '2021-06-05 21:11:03'),
(11, 1, 41, 'SCHOLARSHIPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-06-05 21:11:19', '2021-06-05 21:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `start_event_time` time NOT NULL,
  `end_event_time` time NOT NULL,
  `date` date NOT NULL,
  `start_day_date` smallint(2) DEFAULT NULL,
  `end_day_date` smallint(2) DEFAULT NULL,
  `month_date` varchar(16) DEFAULT NULL,
  `event_location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `admin_id`, `media_id`, `title`, `body`, `start_event_time`, `end_event_time`, `date`, `start_day_date`, `end_day_date`, `month_date`, `event_location`, `created_at`, `updated_at`) VALUES
(1, 1, 45, 'Postgraduate Drop-in Evening', 'Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current students Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current students Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current students', '14:00:00', '16:00:00', '2021-03-18', NULL, NULL, NULL, 'Ajloun Campus', '2021-06-04 23:35:36', '2021-06-04 23:35:36'),
(2, 1, 46, 'Undergraduate Music Open Day', 'Music open days are aimed at candidates who have made Kingston University one of their university choices Music open days are aimed at candidates who have made Kingston University one of their university choices Music open days are aimed at candidates who have made Kingston University one of their university choices', '14:00:00', '16:00:00', '2021-05-07', NULL, NULL, NULL, 'Irbed Campus', '2021-06-05 22:23:59', '2021-06-05 22:23:59'),
(3, 11, 47, 'Making Natureâ€™ Exhibition At Welcome Collection', 'The question of how humans relate to other animals has captivated, scientists, ethicists and artists for centuries The question of how humans relate to other animals has captivated, scientists, ethicists and artists for centuries The question of how humans relate to other animals has captivated, scientists, ethicists and artists for centuries', '16:00:00', '18:00:00', '2021-08-20', NULL, NULL, NULL, 'Amman Campus', '2021-06-05 22:25:17', '2021-06-05 22:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_submission`
--

CREATE TABLE `form_submission` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_submission`
--

INSERT INTO `form_submission` (`id`, `full_name`, `mobile`, `email`, `message_content`, `created_at`) VALUES
(7, 'Feras diab', '00962778870794', 'firas.diab@gmail.com', 'Hello, I want to register .\r\nContact me, please .', '2021-06-08 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `logo_image` text NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `admin_id`, `logo_image`, `alt_image`, `created_at`, `updated_at`) VALUES
(33, 10, '../images/site_images/group-4@3x.png', 'Science Unievrsity Logo', '2021-06-08 08:06:14', '2021-06-08 08:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `path` text NOT NULL,
  `alt_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uptaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `path`, `alt_image`, `created_at`, `uptaded_at`) VALUES
(1, 'fgdgfdgdfg', 'gdfgfdgfdg', 'fgdfgfdgfdg', '2021-06-01 17:32:23', '2021-06-01 17:32:23'),
(2, 'gdfgfh', '../assets/records1.svg', 'gdfgfd', '2021-06-03 10:55:49', '2021-06-03 10:55:49'),
(3, 'fsdfds', '../assets/records2.svg', 'fsdf', '2021-06-03 10:57:40', '2021-06-03 10:57:40'),
(4, 'fsf', '../assets/records1.svg', 'dfgsd', '2021-06-03 11:14:51', '2021-06-03 11:14:51'),
(5, 'wow', '../assets/records3.svg', 'hello', '2021-06-03 11:22:40', '2021-06-03 11:22:40'),
(6, 'fsdfds', '../assets/records3.svg', 'fsdf', '2021-06-04 19:17:50', '2021-06-04 19:17:50'),
(7, 'work12', '../assets/records1.svg', 'work12', '2021-06-04 19:27:50', '2021-06-04 19:27:50'),
(8, 'hello', 'assets/events2.png', 'hello', '2021-06-04 20:09:35', '2021-06-04 20:09:35'),
(9, 'hello', 'assets/events1.png', 'hello', '2021-06-04 20:10:03', '2021-06-04 20:10:03'),
(10, 'hello', 'assets/events2.png', 'hello', '2021-06-04 20:10:38', '2021-06-04 20:10:38'),
(11, 'fafa', '../assets/events1.png', 'wkwk', '2021-06-04 20:16:07', '2021-06-04 20:16:07'),
(12, 'hello125', '../assets/news2.png', 'hello125', '2021-06-04 20:18:14', '2021-06-04 20:18:14'),
(13, 'fds2', '../assets/news4.png', 'df', '2021-06-04 21:04:35', '2021-06-04 21:04:35'),
(14, 'sdds12', '../assets/hero.png', 'sdd12', '2021-06-04 21:55:54', '2021-06-04 21:55:54'),
(15, 'fd', '../assets/hero.png', 'dfs', '2021-06-04 22:03:51', '2021-06-04 22:03:51'),
(16, 'hero img', '../assets/hero.png', 'hero img', '2021-06-04 22:04:55', '2021-06-04 22:04:55'),
(17, 'fsd', '../assets/img-hero.png', 'sdf', '2021-06-04 22:05:11', '2021-06-04 22:05:11'),
(18, 'sd', '../assets/img-hero.png', 'sd', '2021-06-04 22:08:04', '2021-06-04 22:08:04'),
(19, 'ds', '../assets/news1.png', 'sds', '2021-06-04 22:09:35', '2021-06-04 22:09:35'),
(20, 'sdds', '../assets/news1.png', 'sds', '2021-06-04 22:10:58', '2021-06-04 22:10:58'),
(21, 'ds', '../assets/img-hero.png', 'sd', '2021-06-04 22:11:48', '2021-06-04 22:11:48'),
(22, 'fsd', '../assets/hero.png', 'dfs', '2021-06-04 22:14:07', '2021-06-04 22:14:07'),
(23, 'sdds', '../assets/news2.png', 'sd', '2021-06-04 22:16:21', '2021-06-04 22:16:21'),
(24, 'fsdfds', '../assets/img-hero.png', 'fds', '2021-06-04 22:18:34', '2021-06-04 22:18:34'),
(25, 'fd', '../assets/group-22.png', 'fsdf', '2021-06-04 22:18:48', '2021-06-04 22:18:48'),
(26, 'sdds12', '../assets/news4.png', 'sdd12', '2021-06-04 22:51:00', '2021-06-04 22:51:00'),
(27, 'sdds12', '../assets/img-hero.png', 'sdd12', '2021-06-04 22:58:53', '2021-06-04 22:58:53'),
(28, 'sdds12', '../assets/news2.png', 'sdd12', '2021-06-04 23:02:35', '2021-06-04 23:02:35'),
(29, 'hello125', '../assets/news4.png', 'hello125', '2021-06-04 23:03:28', '2021-06-04 23:03:28'),
(30, 'hello125', '../assets/news1.png', 'hello125', '2021-06-04 23:03:37', '2021-06-04 23:03:37'),
(31, 'work12', '../assets/records2.svg', 'work12', '2021-06-04 23:04:05', '2021-06-04 23:04:05'),
(32, 'work12', '../assets/records3.svg', 'work12', '2021-06-04 23:04:21', '2021-06-04 23:04:21'),
(33, 'Amman Event2', '../assets/events2.png', 'hel', '2021-06-04 23:35:36', '2021-06-04 23:35:36'),
(34, 'sdf', '../assets/events3.png', 'dfs', '2021-06-04 23:42:29', '2021-06-04 23:42:29'),
(35, 'Amman Event2', '../assets/events3.png', 'hel', '2021-06-05 00:33:35', '2021-06-05 00:33:35'),
(36, 'hero img', '../assets/hero.png', 'hero img', '2021-06-05 19:22:04', '2021-06-05 19:22:04'),
(37, 'hero img', '../assets/hero.png', 'hero img', '2021-06-05 19:23:49', '2021-06-05 19:23:49'),
(38, 'UNDERGRADUATE COURSES', '../assets/news1.png', 'UNDERGRADUATE COURSES', '2021-06-05 21:08:51', '2021-06-05 21:08:51'),
(39, 'GRADUATE COURSES', '../assets/news2.png', 'GRADUATE COURSES', '2021-06-05 21:10:29', '2021-06-05 21:10:29'),
(40, 'INTERNATIONAL STUDENTS', '../assets/news3.png', 'INTERNATIONAL STUDENTS', '2021-06-05 21:11:03', '2021-06-05 21:11:03'),
(41, 'SCHOLARSHIPS', '../assets/news4.png', 'SCHOLARSHIPS', '2021-06-05 21:11:19', '2021-06-05 21:11:19'),
(42, 'work', '../assets/records1.svg', 'work', '2021-06-05 22:12:01', '2021-06-05 22:12:01'),
(43, 'Salary', '../assets/records2.svg', 'Salary', '2021-06-05 22:12:48', '2021-06-05 22:12:48'),
(44, 'Grad', '../assets/records3.svg', 'Grad', '2021-06-05 22:13:19', '2021-06-05 22:13:19'),
(45, 'Postgraduate Drop-in Evening', '../assets/events1.png', 'event ajloun', '2021-06-05 22:22:33', '2021-06-05 22:22:33'),
(46, 'Irbed Campus', '../assets/events2.png', 'Irbed Campus', '2021-06-05 22:23:59', '2021-06-05 22:23:59'),
(47, 'Making Natureâ€™ Exhibition At Welcome Collection', '../assets/events3.png', 'Amman Campus', '2021-06-05 22:25:17', '2021-06-05 22:25:17'),
(48, 'werer', '../assets/hero.png', 'fdsfe', '2021-06-06 07:49:13', '2021-06-06 07:49:13'),
(49, 'wef', '../assets/hero.png', 'fedf', '2021-06-06 07:50:17', '2021-06-06 07:50:17'),
(50, 'hero img', '../assets/events3.png', 'hero img', '2021-06-06 08:14:50', '2021-06-06 08:14:50'),
(51, 'hero img', '../assets/hero.png', 'hero img', '2021-06-06 08:23:15', '2021-06-06 08:23:15'),
(52, 'ds', '../assets/hero.png', 'esf', '2021-06-06 08:41:16', '2021-06-06 08:41:16'),
(53, 'fd', '../assets/hero.png', 'fds', '2021-06-06 08:42:39', '2021-06-06 08:42:39'),
(54, 'hello', '../assets/news1.png', 'hello', '2021-06-06 12:35:46', '2021-06-06 12:35:46'),
(55, ';ljf;flkh', '../assets/news4.png', 'hero img', '2021-06-06 12:37:03', '2021-06-06 12:37:03'),
(56, 'd', '../assets/news2.png', 'd', '2021-06-07 19:48:06', '2021-06-07 19:48:06'),
(57, 'sfdsfsds', '../assets/hero.png', 'dfs', '2021-06-07 19:57:24', '2021-06-07 19:57:24'),
(58, 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs', '../assets/events3.png', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs', '2021-06-07 20:26:38', '2021-06-07 20:26:38'),
(59, 'fsdfsdfsdfsd', '../assets/footer-logo.png', 'fsdfds', '2021-06-07 20:28:28', '2021-06-07 20:28:28'),
(60, 'fsd', '../assets/news4.png', 'sdf', '2021-06-07 21:17:28', '2021-06-07 21:17:28'),
(61, 'sdfds', '../assets/hero.png', 'dfsf', '2021-06-07 21:20:44', '2021-06-07 21:20:44'),
(62, 'd', '../assets/news1.png', 'fg', '2021-06-07 21:21:48', '2021-06-07 21:21:48'),
(63, 'sfd', '../assets/hero.png', 'fsd', '2021-06-07 21:25:43', '2021-06-07 21:25:43'),
(64, 'fds', '../assets/hero.png', 'fsd', '2021-06-07 21:27:35', '2021-06-07 21:27:35'),
(65, 'fdfd', '../assets/hero.png', 'fdfd', '2021-06-07 21:42:50', '2021-06-07 21:42:50'),
(66, 'fsdf', '../assets/events3.png', 'fsdf', '2021-06-07 21:50:59', '2021-06-07 21:50:59'),
(67, 'sdfsd', '../assets/news2.png', 'fddsf', '2021-06-07 21:51:25', '2021-06-07 21:51:25'),
(68, 'fdsdf', '../assets/events-date.svg', 'fsdfds', '2021-06-08 07:48:10', '2021-06-08 07:48:10'),
(69, 'fds', '../assets/group-22.png', 'fdsfe', '2021-06-08 07:49:12', '2021-06-08 07:49:12'),
(70, 'sdfd', '../assets/favicon.png', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs', '2021-06-08 07:51:09', '2021-06-08 07:51:09'),
(71, 'sdf', '../assets/events3.png', 'fdsfe', '2021-06-08 07:54:34', '2021-06-08 07:54:34'),
(72, 'dsa', '../assets/news4.png', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs', '2021-06-08 07:56:58', '2021-06-08 07:56:58'),
(73, 'sdasd', '../assets/news2.png', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs', '2021-06-08 07:58:32', '2021-06-08 07:58:32'),
(74, 'fsdf22', '../assets/events3.png', 'sdf', '2021-06-08 08:00:11', '2021-06-08 08:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `menu_link`
--

CREATE TABLE `menu_link` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '1',
  `admin_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `path` text,
  `type` enum('header','footer') DEFAULT NULL,
  `body` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_link`
--

INSERT INTO `menu_link` (`id`, `parent_id`, `admin_id`, `title`, `path`, `type`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'header', '..', 'header', NULL, '2021-06-05 23:29:21', '2021-06-05 23:29:21'),
(2, 2, 1, 'footer', '..', 'footer', NULL, '2021-06-05 23:30:37', '2021-06-05 23:30:37'),
(12, 1, 1, 'About', 'About.php', 'header', NULL, '2021-06-06 00:48:01', '2021-06-06 00:48:01'),
(13, 1, 1, 'Academics', 'Academics.php', 'header', NULL, '2021-06-06 00:48:25', '2021-06-06 00:48:25'),
(14, 1, 1, 'Admissions', 'Admissions.php', 'header', NULL, '2021-06-06 00:48:39', '2021-06-06 00:48:39'),
(15, 1, 1, 'International', 'International.php', 'header', NULL, '2021-06-06 00:48:50', '2021-06-06 00:48:50'),
(16, 1, 1, 'Events', 'Events.php', 'header', NULL, '2021-06-06 00:49:02', '2021-06-06 00:49:02'),
(17, 1, 1, 'Contact us', 'Contact-us.php', 'header', NULL, '2021-06-06 00:49:22', '2021-06-06 00:49:22'),
(18, 2, 1, 'EXPLORE', '', 'footer', NULL, '2021-06-06 00:49:55', '2021-06-06 00:49:55'),
(19, 2, 1, 'QUICK LINKS', '', 'footer', NULL, '2021-06-06 00:50:06', '2021-06-06 00:50:06'),
(20, 2, 1, 'USING OUR SITE', '', 'footer', NULL, '2021-06-06 00:50:16', '2021-06-06 00:50:16'),
(21, 2, 1, 'HOW TO FIND US', '', 'footer', NULL, '2021-06-06 00:50:26', '2021-06-06 00:50:26'),
(22, 18, 1, 'Privacy and Cookies', 'Privacy-and-Cookies.php', 'footer', NULL, '2021-06-06 00:51:13', '2021-06-06 00:51:13'),
(23, 18, 1, 'Legal Information', 'Legal-Information.php', NULL, NULL, '2021-06-06 00:51:46', '2021-06-06 00:51:46'),
(24, 18, 1, 'About the University', 'About-the-University.php', NULL, NULL, '2021-06-06 00:52:07', '2021-06-06 00:52:07'),
(25, 18, 1, 'News and Events', 'News-and-Events.php', NULL, NULL, '2021-06-06 00:52:25', '2021-06-06 00:52:25'),
(26, 18, 1, 'Research', 'Research.php', NULL, NULL, '2021-06-06 00:52:41', '2021-06-06 00:52:41'),
(27, 18, 1, 'Schools and Departments', 'Schools-and-Departments.php', NULL, NULL, '2021-06-06 00:53:38', '2021-06-06 00:53:38'),
(28, 18, 1, 'International', 'International.php', NULL, NULL, '2021-06-06 00:53:52', '2021-06-06 00:53:52'),
(29, 18, 1, 'Job Vacancies', 'Job-Vacancies', NULL, NULL, '2021-06-06 00:54:05', '2021-06-06 00:54:05'),
(30, 19, 1, 'Online Payments', 'Online-Payments.php', NULL, NULL, '2021-06-06 00:54:29', '2021-06-06 00:54:29'),
(31, 19, 1, 'Library', 'Library.php', NULL, NULL, '2021-06-06 00:54:38', '2021-06-06 00:54:38'),
(32, 19, 1, 'Alumni', 'Alumni.php', NULL, NULL, '2021-06-06 00:54:47', '2021-06-06 00:54:47'),
(33, 19, 1, 'Community Information', 'Community-Information.php', NULL, NULL, '2021-06-06 00:55:02', '2021-06-06 00:55:02'),
(34, 20, 1, 'Accessibilty', 'Accessibilty.php', NULL, NULL, '2021-06-06 00:55:14', '2021-06-06 00:55:14'),
(35, 20, 1, 'Freedom of Information', 'Freedom-of-Information.php', NULL, NULL, '2021-06-06 00:55:33', '2021-06-06 00:55:33'),
(36, 21, 1, '+ 1 (408) 703 8738', '', NULL, NULL, '2021-06-06 00:55:58', '2021-06-06 00:55:58'),
(37, 21, 1, '+ 962 6 581 7612', '', NULL, NULL, '2021-06-06 00:56:29', '2021-06-06 00:56:29'),
(38, 21, 1, 'info@SciencesUniversity.edu', '', NULL, NULL, '2021-06-06 00:56:39', '2021-06-06 00:56:39'),
(39, 21, 1, 'Contact Us', 'Contact-us.php', NULL, NULL, '2021-06-06 00:56:56', '2021-06-06 00:56:56'),
(40, 21, 1, 'Find Us', 'About.php', NULL, NULL, '2021-06-06 00:57:11', '2021-06-06 00:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `admin_id`, `title`, `body`, `published`, `created_at`, `updated_at`) VALUES
(4, 1, 'Smart Exhibition Upends Classical Style', 'Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient', '2017-01-06', '2021-06-05 21:40:23', '2021-06-05 21:40:23'),
(5, 1, 'Sciences University To Offer Now Undergraduate Major In Creative Writing', 'The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginning The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginning The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginning The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginning', '2016-12-13', '2021-06-05 21:41:22', '2021-06-05 21:41:22'),
(6, 1, 'New Method Uses Heat Flow To Levitate Variety Of Objects', 'Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient', '2016-11-13', '2021-06-05 21:42:04', '2021-06-05 21:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `config_name` varchar(32) NOT NULL,
  `config_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `admin_id`, `config_name`, `config_value`, `created_at`, `updated_at`) VALUES
(6, 10, 'favicon', '../assets/favicon.png', '2021-06-08 08:09:38', '2021-06-08 08:09:38'),
(7, 1, 'copyright', 'Science University', '2021-06-08 08:10:10', '2021-06-08 08:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `body` varchar(42) NOT NULL,
  `rank` int(10) NOT NULL,
  `activity` enum('active','not-active') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `admin_id`, `media_id`, `body`, `rank`, `activity`, `created_at`, `updated_at`) VALUES
(1, 10, 51, 'One of the top 10 universities in design', 1, 'active', '2021-06-04 21:55:54', '2021-06-04 21:55:54'),
(2, 1, 16, 'One of the top 10 universities in design2', 2, 'active', '2021-06-04 22:04:55', '2021-06-04 22:04:55'),
(3, 1, 37, 'One of the top 10 universities in design3', 3, 'active', '2021-06-05 19:23:49', '2021-06-05 19:23:49'),
(5, 10, 66, 'gddsf', 5, 'active', '2021-06-07 21:50:59', '2021-06-07 21:50:59'),
(7, 10, 73, 'test', 4, 'active', '2021-06-08 07:58:32', '2021-06-08 07:58:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ach_admin` (`admin_id`),
  ADD KEY `ach_meida` (`media_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_admin` (`admin_id`),
  ADD KEY `course_media` (`media_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_admin` (`admin_id`),
  ADD KEY `event_media` (`media_id`);

--
-- Indexes for table `form_submission`
--
ALTER TABLE `form_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logo_admin` (`admin_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_link`
--
ALTER TABLE `menu_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu` (`admin_id`),
  ADD KEY `parent_child` (`parent_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_admin` (`admin_id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_site` (`admin_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_admin` (`admin_id`),
  ADD KEY `slider_media` (`media_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_submission`
--
ALTER TABLE `form_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `menu_link`
--
ALTER TABLE `menu_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `ach_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ach_meida` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_media` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_media` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `logo`
--
ALTER TABLE `logo`
  ADD CONSTRAINT `logo_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `menu_link`
--
ALTER TABLE `menu_link`
  ADD CONSTRAINT `admin_menu` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `parent_child` FOREIGN KEY (`parent_id`) REFERENCES `menu_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD CONSTRAINT `admin_site` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `slider_media` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
