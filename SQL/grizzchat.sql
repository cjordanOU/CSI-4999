-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 10:38 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `User_Info_USER_ID` int(11) NOT NULL,
  `Posts_ID` int(11) NOT NULL,
  `TITLE` tinytext NOT NULL,
  `CONTENT` text NOT NULL,
  `POST_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`User_Info_USER_ID`, `Posts_ID`, `TITLE`, `CONTENT`, `POST_TIME`) VALUES
(1, 1, 'Test Post #1', 'This is the first test post on the GrizzChat website.', '2021-11-09 03:57:20'),
(1, 2, 'Test Post Numero Dos', 'Esta es la segunda publicacion de prueba en el sitio web.', '2021-11-09 03:58:25'),
(1, 3, 'Large Test Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut elit urna. Vestibulum at pellentesque nisl. Curabitur posuere lorem quis arcu venenatis condimentum. In eget nisl sed erat dictum iaculis ut ac dolor. Aliquam rutrum, dolor sit amet ullamcorper accumsan, justo justo lacinia justo, eget dapibus orci sapien vel turpis. Etiam posuere magna quis quam tristique, et interdum velit fermentum. Duis rutrum interdum fermentum.\r\n\r\nUt eu cursus nisl, sed luctus est. Morbi lorem felis, imperdiet ac ultricies vitae, aliquet vitae risus. Aliquam eget commodo nisi. Proin pharetra quam sed molestie fringilla. Sed eu placerat quam, vel laoreet ante. Donec tempor, velit vel aliquet ultrices, nulla mi auctor ante, sed ullamcorper odio lacus et mauris. Nam imperdiet metus sit amet feugiat dignissim. Sed semper quam id erat ullamcorper feugiat. Nullam imperdiet dui in scelerisque fringilla. Nulla efficitur iaculis lacus at vehicula. In quis eleifend orci. Cras ac nibh placerat, venenatis dui at, iaculis enim. Aenean hendrerit risus ut turpis accumsan, vitae faucibus tortor tincidunt. Cras dignissim lorem libero, sed convallis turpis blandit a.', '2021-11-09 04:14:38'),
(1, 4, 'Testing auto incrementing Posts_ID', 'testing123\r\ntesting123\r\ntesting123testing123\r\ntesting123\r\ntesting123', '2021-11-09 04:44:03'),
(1, 5, 'CHANGE REQUEST: IMPORTANT!', 'WHY IS THERE NOT AN OPTION TO HAVE THE WEBSITE BE VIEWABLE IN COMIC SANS??', '2021-11-09 04:44:50'),
(1, 6, 'Test post thru post.php', '<p>test test test test test</p>', '2021-11-12 01:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `User_Info_USER_ID` int(11) NOT NULL COMMENT 'Connects to USER_ID in user_info table.',
  `Admin` tinyint(1) NOT NULL,
  `Moderator` tinyint(1) NOT NULL,
  `User` tinyint(1) NOT NULL,
  `Alumni` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`User_Info_USER_ID`, `Admin`, `Moderator`, `User`, `Alumni`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `User_Info_USER_ID` int(11) NOT NULL,
  `Posts_Posts_ID` int(11) NOT NULL,
  `Categories_CATEGORIES_ID` int(11) NOT NULL,
  `THREADS_ID` int(11) NOT NULL,
  `THREAD_TITLE` tinytext NOT NULL,
  `THREAD_CONTENT` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT current_timestamp(),
  `Views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores thread information';

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
  `IMAGE` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User Account Information';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`USER_ID`, `USER_NAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `CREATED_AT`, `MAJOR`, `IMAGE`) VALUES
(1, 'ADMIN', 'Password1!', 'Adam', 'In', 'admin@grizzchat.com', '2021-11-09 03:54:50', 'Information_Technology', ''),
(2, 'testuser', '$2y$10$LOB35vH96UAqMqZEFbACZO83RVnjK22n3Sl5q8BJcnDm2feI6i2eG', 'testfirst', 'testlast', 'test@test.com', '2021-11-20 01:36:18', 'Electrical_Engineering', '');

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
  ADD KEY `posts-users` (`User_Info_USER_ID`);

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
  ADD KEY `threads-posts` (`Posts_Posts_ID`),
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
  MODIFY `CATEGORIES_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `ATTEMPT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Posts_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `THREADS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique User ID.', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts-users` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`);

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
  ADD CONSTRAINT `threads-posts` FOREIGN KEY (`Posts_Posts_ID`) REFERENCES `posts` (`Posts_ID`),
  ADD CONSTRAINT `threads-user` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
