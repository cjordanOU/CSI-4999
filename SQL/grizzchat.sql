-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 04:29 PM
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
(1, 'Introduction', 'Introduce yourself.', '2021-11-21 02:20:53'),
(2, 'Alumni', 'A place for OU Alumni to meet and interact with eachother.', '2021-12-08 14:57:37'),
(3, 'Mentorship', 'A place where current OU students and Alumni can go to meet and discuss mentorship opportunities.', '2021-12-08 14:57:37'),
(4, 'Computer Science', 'All things Computer Science related.', '2021-12-08 14:57:37'),
(5, 'Information Technology', 'All things IT related.', '2021-12-08 14:57:37'),
(6, 'Off Topic', 'All off topic discussions should go here.', '2021-12-08 14:57:37');

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
(2, '2021-11-21 20:28:35', 0, 2),
(3, '2021-12-06 21:33:16', 0, 1),
(4, '2021-12-07 16:43:23', 0, 8),
(5, '2021-12-08 09:51:19', 0, 1),
(6, '2021-12-08 09:51:40', 0, 1),
(7, '2021-12-08 09:58:28', 0, 11),
(8, '2021-12-08 09:59:37', 0, 11),
(9, '2021-12-08 09:59:45', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MESSAGE_ID` int(11) NOT NULL,
  `SENDER_ID` int(11) NOT NULL COMMENT 'USER_ID of sender of message',
  `RECIEVER_ID` int(11) NOT NULL COMMENT 'USER_ID of reciever of message',
  `MESSAGE_TITLE` tinytext NOT NULL COMMENT 'Title of message',
  `MESSAGE_CONTENT` text NOT NULL COMMENT 'Main contents of message',
  `MESSAGE_READ` tinyint(1) NOT NULL COMMENT 'Is message read by reciever',
  `MESSAGE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'when message was sent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passwdreset`
--

CREATE TABLE `passwdreset` (
  `resetID` int(11) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelector` text NOT NULL,
  `resetToken` longtext NOT NULL,
  `resetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwdreset`
--

INSERT INTO `passwdreset` (`resetID`, `resetEmail`, `resetSelector`, `resetToken`, `resetExpires`) VALUES
(36, 'cjordan@oakland.edu', '2797e58921717d99', '$2y$10$7ScctzFB685kXg/HUmZiaOIQSxKshEh025pBEwhqOMUS2epkWVd3O', '1638971891');

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
(7, 12, '<p>testing reply here</p>', '2021-11-22 16:47:15', 4),
(11, 13, '<p>OK Boomer.</p>', '2021-12-08 15:00:07', 9),
(2, 14, '<p>Yup.</p>', '2021-12-08 15:00:36', 9),
(11, 15, '<p>Cool beans my dude.</p>', '2021-12-08 15:04:13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `profile_info`
--

CREATE TABLE `profile_info` (
  `ABOUT` text NOT NULL,
  `ABOUT_PRIVACY` enum('private','friends','public') NOT NULL DEFAULT 'public',
  `LOCATION` tinytext NOT NULL,
  `LOCATION_PRIVACY` enum('private','friends','public') NOT NULL DEFAULT 'public',
  `CONTACT_EMAIL` tinytext NOT NULL,
  `CONTACT_EMAIL_PRIVACY` enum('private','friends','public') NOT NULL DEFAULT 'public',
  `LINKEDIN` tinytext NOT NULL,
  `LINKEDIN_PRIVACY` enum('private','friends','public') NOT NULL DEFAULT 'public',
  `PREFERRED_FONT` enum('default','comic_sans','Times_New_Roman','Helvetica','Tahoma','Garamond','Courier_New') NOT NULL DEFAULT 'default',
  `DEACTIVATE` tinyint(1) NOT NULL DEFAULT 0,
  `LINKED_USER_ID` int(11) NOT NULL,
  `PROFILE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_info`
--

INSERT INTO `profile_info` (`ABOUT`, `ABOUT_PRIVACY`, `LOCATION`, `LOCATION_PRIVACY`, `CONTACT_EMAIL`, `CONTACT_EMAIL_PRIVACY`, `LINKEDIN`, `LINKEDIN_PRIVACY`, `PREFERRED_FONT`, `DEACTIVATE`, `LINKED_USER_ID`, `PROFILE_ID`) VALUES
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 1, 1),
('Test about 123', 'public', 'Test location', 'public', 'test@test.edu', 'public', 'test.com', 'public', 'default', 0, 2, 2),
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 3, 3),
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 4, 4),
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 5, 5),
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 6, 6),
('', 'public', '', 'public', '', 'public', '', 'public', 'default', 0, 7, 7),
('My name is Cameron Jordan and I am currently a student at Oakland University. I will be graduating in the Winter 2022 semester with a bachelors of science in Information Technology.', 'public', 'Auburn Hills, MI', 'public', 'cjordan@oakland.edu', 'public', 'https://www.linkedin.com/in/cameron-jordan-5b87b614a/', 'public', 'default', 0, 11, 11),
('I graduated from OU in 2006.', 'public', 'Rochester Hills, MI', 'public', 'OUAlumni2006@gmail.com', 'public', 'linkedin.com', 'friends', 'Tahoma', 0, 12, 12),
('', 'public', 'Amogus Ohio', 'public', 'redsus@gmail.com', 'public', 'red_sus', 'friends', 'comic_sans', 0, 13, 13);

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
(7, 1, 8, 'Hello CSI-4999 demo', '<p>this is the thread body.</p>', '2021-11-22 16:46:33', 1),
(12, 6, 9, 'Did anyone else see that thing that happened last night?', '<p>As the title above says - that stuff was crazy.</p>', '2021-12-08 14:58:13', 1),
(2, 3, 10, 'Looking for a mentor? Look no further.', '<p>I am happy to announce that I am now taking mentees from Oakland University, reach out to me through my profile or this thread if you are interested. Thanks.</p>', '2021-12-08 15:01:38', 1),
(2, 1, 11, 'Hi folks', '<p>This is testuser here, the totally real CSI-4999 student who is not sus.</p>', '2021-12-08 15:02:34', 1),
(12, 2, 12, 'I am an OU Alumni', '<p>That is all... thanks for reading.</p>', '2021-12-08 15:03:54', 1),
(13, 2, 13, 'Is this how I make one of these new thread thingies?', '<p>Back in my day the only threads we had were from our clothes.</p>', '2021-12-08 15:06:39', 1),
(13, 4, 14, 'Computer science is interesting right?', '<p>How do computers even work? magic? who knows?</p>', '2021-12-08 15:16:12', 1),
(11, 5, 15, 'IT Growth', '<p>It\'s cool how IT is a rapidly growing field. I think our experience and skills we have gained at OU will put us at an advantage over others in this field which will be good for our careers. Does anyone else agree?</p>', '2021-12-08 15:20:45', 1);

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
  `GRADUATION_DATE` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User Account Information';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`USER_ID`, `USER_NAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `CREATED_AT`, `MAJOR`, `GRADUATION_DATE`) VALUES
(1, 'ADMIN', '$2y$10$LOB35vH96UAqMqZEFbACZO83RVnjK22n3Sl5q8BJcnDm2feI6i2eG', 'Adam', 'In', 'admin@grizzchat.com', '2021-11-09 03:54:50', 'Information_Technology', '2023'),
(2, 'testuser', '$2y$10$LOB35vH96UAqMqZEFbACZO83RVnjK22n3Sl5q8BJcnDm2feI6i2eG', 'testfirst', 'testlast', 'test@test.com', '2021-11-20 01:36:18', 'Electrical_Engineering', 'Alumni'),
(3, 'jsmith', '$2y$10$FzcuV4sTBWgx7tPu9BaRiO0A2P./.j1OkPVuQyEDRblsxgy1JllD6', 'John', 'Smith', 'jsmith@test.com', '2021-11-20 22:19:13', 'Bioengineering', '2022'),
(4, 'tester', '$2y$10$Q8dqng7fURzDMNtzNwCPkO2HLLAFQFvyf548BPL3kWMJoeExBbytS', 'firstname', 'lastname', 'tester@test.com', '2021-11-22 00:33:46', 'Bioengineering', '2021'),
(5, 'abcdef', '$2y$10$U/43EPUK0AOry7NtSu9TT.o.tG4Bzm5XMoiCnvpALXDTgjh7wVecy', 'abcdef', 'lastname', 'abcdef@lastname.com', '2021-11-22 01:36:34', 'Information_Technology', '2023'),
(6, 'ctester', '$2y$10$mAl2Fm0PjRK3D9sGQdOeZeIeK23hzBa7WLDyafRuvCOtwH3crMjPy', 'Cam', 'Jordan', 'cam@cam.com', '2021-11-22 15:25:23', 'Information_Technology', '2021'),
(7, 'camtest', '$2y$10$DtchJwsur2Xncl7TKgKaBe7n9vpDO2/.1j3WQTYHUd0UXkVu3HWkS', 'Testfirst', 'Testlast', 'cam@test.com', '2021-11-22 16:45:09', 'Computer_Engineering', '2022'),
(8, '2floofy4u', '$2y$10$J9txf9VH9fbhkaoFj1yCc.IMjaB.9/4Ftq4IOUBttAcDAAvIdZly6', 'flooftest', 'flooftest', 'dmbrown@oakland.edu', '2021-12-01 07:55:43', 'Information_Technology', '2022'),
(9, 'ADMIN123', '$2y$10$AA0MC/J2prcYkgGyNfa/3.SrIz2ik4OzY6Ga70qxZ.9oNEa.fS/Mm', 'Adam', 'In', 'CSI4999.FA21@gmail.com', '2021-12-07 03:01:45', 'Information_Technology', '2023'),
(10, 'lefloof', '$2y$10$V8Ur5SUxOPlHmJBp6E3r5OdwpF0pGL7Y34uLgLtkVCTrsaeDJwq9W', 'flooftest2', 'flooftest2', 'browndenm110@gmail.com', '2021-12-07 18:43:39', 'Information_Technology', '2022'),
(11, 'cjordan', '$2y$10$8GpD4ctEMz4OWUKBPXQURek9yV0VzyGhq5kN9f3QGGkqyvo33QMxO', 'Cameron', 'Jordan', 'cjordan@oakland.edu', '2021-12-08 01:27:56', 'Information_Technology', '2022'),
(12, 'OUAlumni2006', '$2y$10$3fVKIiYfJCcRB6yvI1sT2.NcK8rOywklTzkU3NY8qvi4mnKO/.VrS', 'Billy', 'Bob', 'OUAlumni2006@gmail.com', '2021-12-08 14:53:14', 'Computer_Engineering', 'Alumni'),
(13, 'red_sus', '$2y$10$LEGwSnb2yJk6VEAa38KB/ustdAbACBH.UIBZ5ZNqy6v5QTOPg4/Ni', 'Red', 'Susans', 'redsus@gmail.com', '2021-12-08 15:04:53', 'Computer_Engineering', 'Alumni');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MESSAGE_ID`),
  ADD KEY `SENDER_ID` (`SENDER_ID`);

--
-- Indexes for table `passwdreset`
--
ALTER TABLE `passwdreset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Posts_ID`),
  ADD KEY `posts-users` (`User_Info_USER_ID`),
  ADD KEY `PARENT_THREAD` (`PARENT_THREAD`);

--
-- Indexes for table `profile_info`
--
ALTER TABLE `profile_info`
  ADD PRIMARY KEY (`PROFILE_ID`),
  ADD KEY `LINKED_USER_ID` (`LINKED_USER_ID`);

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
  MODIFY `CATEGORIES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `ATTEMPT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passwdreset`
--
ALTER TABLE `passwdreset`
  MODIFY `resetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Posts_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `THREADS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique User ID.', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`SENDER_ID`) REFERENCES `user_info` (`USER_ID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts-users` FOREIGN KEY (`User_Info_USER_ID`) REFERENCES `user_info` (`USER_ID`),
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`PARENT_THREAD`) REFERENCES `threads` (`THREADS_ID`);

--
-- Constraints for table `profile_info`
--
ALTER TABLE `profile_info`
  ADD CONSTRAINT `profile_info_ibfk_1` FOREIGN KEY (`LINKED_USER_ID`) REFERENCES `user_info` (`USER_ID`);

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
