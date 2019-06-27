-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 03:05 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `body` text,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `body`, `posted`) VALUES
(26, 'Anonymous', 'testing for timestamp', '0000-00-00 00:00:00'),
(27, 'Anonymous', 'timestamp check', '0000-00-00 00:00:00'),
(33, 'Anonymous', 'test', '2018-10-30 23:05:24'),
(34, 'Anonymous', 'I think this is a great idea!', '2018-11-28 22:03:36'),
(35, 'Anonymous', 'Can I post', '2019-03-23 10:01:54'),
(49, 'Anonymous', '', '2019-03-23 13:28:23'),
(52, 'user_id', 'testing', '2019-03-23 21:08:53'),
(53, 'user_id', 'testing', '2019-03-23 21:08:53'),
(55, 'user_id', 'hello', '2019-03-24 22:43:56'),
(56, 'user_id', 'hello', '2019-03-24 22:43:56'),
(57, '', 'This is a test', '2019-04-28 21:15:32'),
(58, '', 'This is a test\r\n', '2019-05-12 21:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(120) NOT NULL,
  `Last_Name` varchar(120) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Last_Name`, `Email`) VALUES
('Paul', 'TestLastName', 'Test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `text`) VALUES
(1, 'This is the first post'),
(2, 'This is the second piece of text'),
(3, 'This is the third post'),
(4, 'This is the fourth piece of text');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `body` text,
  `reply_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first` varchar(255) COLLATE utf8_bin NOT NULL,
  `last` varchar(255) COLLATE utf8_bin NOT NULL,
  `uidUser` int(32) NOT NULL,
  `emailUser` varchar(255) COLLATE utf8_bin NOT NULL,
  `pwdUser` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first`, `last`, `uidUser`, `emailUser`, `pwdUser`) VALUES
('', '', 1, '', ''),
('', '', 2, '', ''),
('Amaya', 'Lopez', 3, 'amalo@gmail.com', ''),
('Michelle', 'Nunez', 4, 'nun@gmail.com', ''),
('Anita', 'Redondo', 5, 'anitared@gmail.com', 'password123'),
('', '', 6, '', ''),
('', '', 7, '', ''),
('Nancy', 'Pollard', 8, 'nancylo@gmail.com', 'password023'),
('Fernando', 'Blue', 9, 'fernando@hotmail.com', 'ferblue123'),
('Daniel', 'Fuentes', 10, 'daniel@aol.com', 'karma'),
('', '', 11, '', ''),
('', '', 12, '', ''),
('', '', 13, '', ''),
('', '', 14, '', ''),
('', '', 15, '', ''),
('', '', 16, '', ''),
('Paola', 'test', 17, 'aol@aol.com', 'pat'),
('fam', 'fmale', 18, 'ma@hotmail.com', 'pat'),
('Gabriel', 'Alpizar', 19, 'al03@aol.com', 'password'),
('', '', 20, '', ''),
('', '', 21, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `Unique` (`Email`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uidUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uidUser` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
