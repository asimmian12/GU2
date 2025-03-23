-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2025 at 03:42 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learners_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int NOT NULL,
  `badge_name` varchar(64) DEFAULT NULL,
  `description` text,
  `fk_user_id` int DEFAULT NULL,
  `badge_img` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`id`, `badge_name`, `description`, `fk_user_id`, `badge_img`, `is_active`) VALUES
(1, 'Nusary Gradute', 'Awarded for completed first year of nursary.', 27, 'badge1.jpg', 1),
(2, 'Care Expert', 'Awarded for taking care of someone who is injured.', 27, 'badge2.jpg', 1),
(3, 'Bronze Medal', 'Bronze Medal achievement, for great attendance', 47, 'badge3.jpg', 1),
(4, 'Silver Medal', 'This achievement is for social communication.', 47, 'badge4.jpg', 1),
(6, 'TestUser', 'testy', 47, 'test_pic.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int NOT NULL,
  `albName` varchar(64) DEFAULT NULL,
  `albDescription` tinytext,
  `release_date` date DEFAULT NULL,
  `fk_photo_id` int DEFAULT NULL,
  `fk_person_id` int DEFAULT NULL,
  `fk_record_label_id` int DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `image` varchar(64) DEFAULT NULL,
  `fk_user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `albName`, `albDescription`, `release_date`, `fk_photo_id`, `fk_person_id`, `fk_record_label_id`, `is_active`, `image`, `fk_user_id`) VALUES
(121, 'Class Drawings', 'By Sarah McDonald', '2018-08-21', NULL, NULL, NULL, 1, 'wee_learners_activites.jpeg', 27),
(130, 'Class Storytime ', 'By Iain Shaw', '2019-09-03', NULL, NULL, NULL, 1, 'wee_learners_storytime.jpeg', 27),
(131, 'Class Handpainting', 'By Sana Zahid', '2022-01-03', NULL, NULL, NULL, 1, 'wee_learners_handpainting.jpeg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `password` varchar(132) DEFAULT NULL,
  `is_admin` tinyint DEFAULT NULL,
  `email` varchar(132) DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pw` varchar(132) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role` enum('Student','Staff','Parent Helper') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `is_admin`, `email`, `is_active`, `username`, `pw`, `name`, `profile_picture`, `role`) VALUES
(26, '$2y$10$UcV3.Pvs9b7Jw5IHcaHgbuNw1d765BsUyED29ueHy9eamVMmLHr3u', 1, 'admin@weelearners.com', 1, 'admin', NULL, 'Admin', NULL, 'Staff'),
(27, '$2y$10$BQ.jxuz7e12MGFNDSNMKH.sivaZV2/PH5oDWbosc58EpVIWCWvXIC', 1, 'karen@weelearners.com', 1, 'Karen', NULL, 'Karen', NULL, 'Parent Helper'),
(47, '$2y$10$/Oqd0lU1xPVVLi0P2Va9Ce00QtPHxBe8T4M5bbfKLyqh4ZMH4XwJS', 0, 'asim@weelearners.com', 1, 'asim1', NULL, 'asim1', 'test_pic.jpg', 'Student'),
(51, '$2y$10$B.STsff0WKb5mbjUCF.0F.eEKjLQtSNNbz1sZ20IH/bsRCAc7xAYS', 0, 'mal@weelearners.com', 1, 'MAL', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` text,
  `release_date` date DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `video_url` varchar(255) DEFAULT NULL,
  `fk_user_id` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `release_date`, `is_active`, `video_url`, `fk_user_id`, `image`) VALUES
(1, 'Monkey Puzzel Day', 'Come to Monkey Puzzle Day in Glasgow Day Nursery and Preschool is a beautiful Early Years education and childcare setting for children aged 3 months to 5 years old. ', '2020-08-04', 1, 'https://www.youtube.com/watch?v=f3lompkS96I', 27, 'monkey_puzzle.jpg'),
(2, 'Beloved Nursary In Glasgow ', 'Meet Sarah McDonald, the childcare teacher in the heart of the South Side helping students to help reach their potiential.', '2018-06-19', 1, 'https://www.youtube.com/watch?v=se1wu3iH_mw', 27, 'wee_learners.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `badge`
--
ALTER TABLE `badge`
  ADD CONSTRAINT `badge_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
