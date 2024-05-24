-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:50 AM
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
  `post_category` varchar(50) NOT NULL,
  `post_is_active` tinyint(1) NOT NULL,
  `post_article` text NOT NULL,
  `post_created` varchar(20) NOT NULL,
  `post_datetime` varchar(20) NOT NULL,
  `post_publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_aid`, `post_title`, `post_image`, `post_author`, `post_category`, `post_is_active`, `post_article`, `post_created`, `post_datetime`, `post_publish_date`) VALUES
(2, 'This Is My Favourite Fashion Style', '15.jpg', 'Louren Rubico', 'Fashion', 1, 'bbbbbbbbbbbbb', '2024-05-22 14:34:53', '2024-05-23 10:21:10', 'May 22, 2024'),
(3, 'Great Holiday Enjoy With The Sea', '9.jpg', 'Louren', 'Travel', 1, 'mmmmmmmmmmmmmmmmmm', '2024-05-23 08:08:47', '2024-05-23 10:22:48', 'May 23, 2024'),
(4, 'The Dress Style Wearing Right Now', '14.jpg', 'Louren', 'Lifestyle', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.', '2024-05-23 10:17:37', '2024-05-23 10:17:37', 'May 23, 2024'),
(5, 'Enjoy Work And Do What Ever You Want', '16.jpg', 'meee', 'Lifestyle', 1, 'sddsds', '2024-05-23 10:23:41', '2024-05-23 10:23:41', 'May 23, 2024');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `fashion`
--
ALTER TABLE `fashion`
  MODIFY `fashion_aid` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `post_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
