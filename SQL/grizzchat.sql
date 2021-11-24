-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 06:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grizzchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATEGORIES_ID` int(11) NOT NULL,
  `TITLE` tinytext NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CATEGORIES_ID`, `TITLE`, `DESCRIPTION`, `DATE`) VALUES
(1, 'Introduction', 'Introduce yourself.', '2021-11-21 02:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `ATTEMPT` int(11) NOT NULL,
  `TIME` datetime NOT NULL,
  `SUCCESS` tinyint(4) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`ATTEMPT`, `TIME`, `SUCCESS`, `USER_ID`) VALUES
(1, '2021-11-20 17:56:46', 0, 1),
(2, '2021-11-21 20:28:35', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `User_Info_USER_ID` int(11) NOT NULL,
  `Posts_ID` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `POST_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PARENT_THREAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`User_Info_USER_ID`, `Posts_ID`, `CONTENT`, `POST_TIME`, `PARENT_THREAD`) VALUES
(1, 7, '<p>test reply</p>', '2021-11-21 22:24:19', 4),
(2, 8, '<p>reply here</p>', '2021-11-22 01:01:30', 4),
(2, 9, '<p>testing 123 testing</p>', '2021-11-22 01:03:00', 4),
(2, 10, '<p>test link post</p>', '2021-11-22 01:04:32', 4),
(2, 11, '<p>test 123 link</p>', '2021-11-22 01:04:46', 4),
(7, 12, '<p>testing reply here</p>', '2021-11-22 16:47:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `User_Info_USER_ID` int(11) NOT NULL COMMENT 'Connects to USER_ID in user_info table.',
  `Admin` tinyint(1) NOT NULL,
  `Moderator` tinyint(1) NOT NULL,
  `Alumni` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`User_Info_USER_ID`, `Admin`, `Moderator`, `Alumni`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `User_Info_USER_ID` int(11) NOT NULL,
  `Categories_CATEGORIES_ID` int(11) NOT NULL,
  `THREADS_ID` int(11) NOT NULL,
  `THREAD_TITLE` tinytext NOT NULL,
  `THREAD_CONTENT` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT current_timestamp(),
  `Views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores thread information';

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`User_Info_USER_ID`, `Categories_CATEGORIES_ID`, `THREADS_ID`, `THREAD_TITLE`, `THREAD_CONTENT`, `CREATED`, `Views`) VALUES
(1, 1, 4, 'Test title', '<p>test body</p>', '2021-11-21 02:20:59', 1),
(2, 1, 5, 'Test thread testuser', '<p>test body here</p>', '2021-11-22 00:15:10', 1),
(2, 1, 6, 'test thread 12345', '<p>body test</p>', '2021-11-22 01:05:54', 1),
(2, 1, 7, 'Hey Everyone in CSI-4999', '<p>Welcome to our demo. Many features are still in the works but we hope you enjoy our in-development product and are looking forwards to its completion as much as we are.</p>', '2021-11-22 05:36:36', 1),
(7, 1, 8, 'Hello CSI-4999 demo', '<p>this is the thread body.</p>', '2021-11-22 16:46:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `USER_ID` int(11) NOT NULL COMMENT 'Unique User ID.',
  `USER_NAME` tinytext NOT NULL COMMENT 'Username.',
  `PASSWORD` tinytext NOT NULL COMMENT 'Hashed + Salted Password.',
  `FIRST_NAME` tinytext NOT NULL,
  `LAST_NAME` tinytext NOT NULL,
  `EMAIL_ADDRESS` tinytext NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `MAJOR` tinytext NOT NULL,
  `IMAGE` blob NOT NULL,
  `GRADUATION_DATE` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User Account Information';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`USER_ID`, `USER_NAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `CREATED_AT`, `MAJOR`, `IMAGE`, `GRADUATION_DATE`) VALUES
(1, 'ADMIN', 'test_password_not_hashed/salted', 'Adam', 'In', 'admin@grizzchat.com', '2021-11-09 03:54:50', 'Information_Technology', '', '2023'),
(2, 'testuser', '$2y$10$LOB35vH96UAqMqZEFbACZO83RVnjK22n3Sl5q8BJcnDm2feI6i2eG', 'testfirst', 'testlast', 'test@test.com', '2021-11-20 01:36:18', 'Electrical_Engineering', '', 'Alumni'),
(3, 'jsmith', '$2y$10$FzcuV4sTBWgx7tPu9BaRiO0A2P./.j1OkPVuQyEDRblsxgy1JllD6', 'John', 'Smith', 'jsmith@test.com', '2021-11-20 22:19:13', 'Bioengineering', '', '2022'),
(4, 'tester', '$2y$10$Q8dqng7fURzDMNtzNwCPkO2HLLAFQFvyf548BPL3kWMJoeExBbytS', 'firstname', 'lastname', 'tester@test.com', '2021-11-22 00:33:46', 'Bioengineering', '', '2021'),
(5, 'abcdef', '$2y$10$U/43EPUK0AOry7NtSu9TT.o.tG4Bzm5XMoiCnvpALXDTgjh7wVecy', 'abcdef', 'lastname', 'abcdef@lastname.com', '2021-11-22 01:36:34', 'Information_Technology', '', '2023'),
(6, 'ctester', '$2y$10$mAl2Fm0PjRK3D9sGQdOeZeIeK23hzBa7WLDyafRuvCOtwH3crMjPy', 'Cam', 'Jordan', 'cam@cam.com', '2021-11-22 15:25:23', 'Information_Technology', '', ''),
(7, 'camtest', '$2y$10$DtchJwsur2Xncl7TKgKaBe7n9vpDO2/.1j3WQTYHUd0UXkVu3HWkS', 'Testfirst', 'Testlast', 'cam@test.com', '2021-11-22 16:45:09', 'Computer_Engineering', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATEGORIES_ID`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`ATTEMPT`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Posts_ID`),
  ADD KEY `posts-users` (`User_Info_USER_ID`),
  ADD KEY `PARENT_THREAD` (`PARENT_THREAD`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`User_Info_USER_ID`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`THREADS_ID`),
  ADD KEY `threads-categories` (`Categories_CATEGORIES_ID`),
  ADD KEY `threads-user` (`User_Info_USER_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CATEGORIES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `ATTEMPT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Posts_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `THREADS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique User ID.', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts-users` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`),
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`PARENT_THREAD`) REFERENCES `threads` (`THREADS_ID`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads-categories` FOREIGN KEY (`Categories_CATEGORIES_ID`) REFERENCES `categories` (`CATEGORIES_ID`),
  ADD CONSTRAINT `threads-user` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
