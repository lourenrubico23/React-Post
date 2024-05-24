-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 09:43 AM
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
-- Database: `db_react_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_aid` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `category_is_active` tinyint(1) NOT NULL,
  `category_datetime` varchar(20) NOT NULL,
  `category_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_aid`, `category_title`, `category_is_active`, `category_datetime`, `category_created`) VALUES
(1, 'Trending', 1, '2024-05-24 14:33:18', '2024-05-24 14:33:18'),
(2, 'Featured', 1, '2024-05-24 14:33:29', '2024-05-24 14:33:29'),
(3, 'Lifestyle', 1, '2024-05-24 14:41:39', '2024-05-24 14:41:39'),
(4, 'Food', 1, '2024-05-24 14:41:46', '2024-05-24 14:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `fashion`
--

CREATE TABLE `fashion` (
  `fashion_aid` int(11) NOT NULL,
  `fashion_title` varchar(100) NOT NULL,
  `fashion_image` varchar(50) NOT NULL,
  `fashion_author` varchar(50) NOT NULL,
  `fashion_category` varchar(50) NOT NULL,
  `fashion_is_active` tinyint(1) NOT NULL,
  `fashion_article` text NOT NULL,
  `fashion_created` varchar(20) NOT NULL,
  `fashion_datetime` varchar(20) NOT NULL,
  `fashion_publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fashion`
--

INSERT INTO `fashion` (`fashion_aid`, `fashion_title`, `fashion_image`, `fashion_author`, `fashion_category`, `fashion_is_active`, `fashion_article`, `fashion_created`, `fashion_datetime`, `fashion_publish_date`) VALUES
(1, 'Fashion Style now', '2.jpg', 'louren', 'Fashion', 1, 'gjjfhf', '2024-05-24 15:20:45', '2024-05-24 15:20:45', 'yhtfg');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `feature_aid` int(11) NOT NULL,
  `feature_title` varchar(100) NOT NULL,
  `feature_image` varchar(50) NOT NULL,
  `feature_author` varchar(50) NOT NULL,
  `feature_category` varchar(50) NOT NULL,
  `feature_is_active` tinyint(1) NOT NULL,
  `feature_article` text NOT NULL,
  `feature_created` varchar(20) NOT NULL,
  `feature_datetime` varchar(20) NOT NULL,
  `feature_publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_aid`, `feature_title`, `feature_image`, `feature_author`, `feature_category`, `feature_is_active`, `feature_article`, `feature_created`, `feature_datetime`, `feature_publish_date`) VALUES
(1, 'Clinic', '2.jpg', 'Me', 'Design', 1, 'bbbbbbbbbbbbbbbbbbbbbbbbbbtttgghyjhyjhhhhhhhhhhhhhhhhhjhjhjhjhjhjhhhhhhhhhhhhhhhhhhhhhhhhjhhhhhhhhhhhhhhhhjhjhjhj', '2024-05-23 09:20:13', '2024-05-23 10:42:25', 'May 23, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `popular_aid` int(11) NOT NULL,
  `popular_title` varchar(100) NOT NULL,
  `popular_image` varchar(50) NOT NULL,
  `popular_author` varchar(50) NOT NULL,
  `popular_category` varchar(50) NOT NULL,
  `popular_is_active` tinyint(1) NOT NULL,
  `popular_article` text NOT NULL,
  `popular_created` varchar(20) NOT NULL,
  `popular_datetime` varchar(20) NOT NULL,
  `popular_publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`popular_aid`, `popular_title`, `popular_image`, `popular_author`, `popular_category`, `popular_is_active`, `popular_article`, `popular_created`, `popular_datetime`, `popular_publish_date`) VALUES
(1, 'Beauty', '13.jpg', 'sds', 'Lifestyle', 1, 'sdsd', '2024-05-23 10:30:25', '2024-05-23 10:30:25', 'May 23, 2024'),
(2, 'Fashion & Style', '14.jpg', 'sads', 'Fashion', 1, 'sdsd', '2024-05-23 10:30:56', '2024-05-23 10:30:56', 'sds'),
(3, 'Lifestyle', '15.jpg', 'asda', 'Lifestyle', 1, 'sds', '2024-05-23 10:31:20', '2024-05-23 10:31:20', 'sd'),
(4, 'Food & Wellness', '16.jpg', 'asa', 'Food', 1, 'asas', '2024-05-23 10:31:48', '2024-05-23 10:31:48', 'asa');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_aid` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_image` varchar(50) NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_is_active` tinyint(1) NOT NULL,
  `post_article` text NOT NULL,
  `post_created` varchar(20) NOT NULL,
  `post_datetime` varchar(20) NOT NULL,
  `post_publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_aid`, `post_title`, `post_image`, `post_author`, `post_category_id`, `post_is_active`, `post_article`, `post_created`, `post_datetime`, `post_publish_date`) VALUES
(2, 'This Is My Favourite Fashion Style', '15.jpg', 'Louren Rubico', 3, 1, 'bbbbbbbbbbbbb', '2024-05-22 14:34:53', '2024-05-24 14:42:03', 'May 22, 2024'),
(3, 'Great Holiday Enjoy With The Sea', '9.jpg', 'Louren', 0, 1, 'mmmmmmmmmmmmmmmmmm', '2024-05-23 08:08:47', '2024-05-24 14:55:11', '2024-05-24'),
(4, 'The Dress Style Wearing Right Now', '14.jpg', 'Louren', 4, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'Content here, content here\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.', '2024-05-23 10:17:37', '2024-05-24 15:09:24', '2024-05-01'),
(5, 'Enjoy Work And Do What Ever You Want', '16.jpg', 'meee', 2, 1, 'sddsds', '2024-05-23 10:23:41', '2024-05-24 15:09:29', 'May 23, 2024'),
(6, 'Foodsssss', '12.jpg', 'likhiouh', 1, 1, 'gyiiiiiiiiiiiiiiiiiiiiiiiiigbyfhvhuy', '2024-05-24 15:05:06', '2024-05-24 15:09:42', '2024-05-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_aid`);

--
-- Indexes for table `fashion`
--
ALTER TABLE `fashion`
  ADD PRIMARY KEY (`fashion_aid`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_aid`);

--
-- Indexes for table `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`popular_aid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fashion`
--
ALTER TABLE `fashion`
  MODIFY `fashion_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `popular`
--
ALTER TABLE `popular`
  MODIFY `popular_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
