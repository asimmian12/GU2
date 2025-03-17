-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 12:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wee_learners_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `badge_name` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`id`, `badge_name`, `description`, `fk_user_id`) VALUES
(1, 'Video Creator', 'Awarded for creating a video.', 27),
(2, 'Photo Expert', 'Awarded for uploading photos.', 27);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `albName` varchar(64) DEFAULT NULL,
  `albDescription` tinytext DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `fk_photo_id` int(11) DEFAULT NULL,
  `fk_person_id` int(11) DEFAULT NULL,
  `fk_record_label_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(64) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `albName`, `albDescription`, `release_date`, `fk_photo_id`, `fk_person_id`, `fk_record_label_id`, `is_active`, `image`, `fk_user_id`) VALUES
(121, 'Things I like to do', 'Ben Kweller', '2009-02-27', NULL, NULL, NULL, 1, 'benkweller_changinhorses.jpg', 27),
(130, 'The Big Rock Candy Mountains', 'Harry McClintock', '1928-11-16', NULL, NULL, NULL, 1, 'The Big Rock Candy Mountains.jpg', 27),
(131, 'Birds of a Feather', 'Billie Eillish', '2024-07-02', NULL, NULL, NULL, 1, 'birdsofthefeather.jpg', 27),
(132, 'Circles', 'Post Malone', '2019-08-30', NULL, NULL, NULL, 1, 'circles.jpg', 27),
(133, 'Attention', 'Charile Puth', '2017-04-21', NULL, NULL, NULL, 1, 'attention.jpg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(132) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `email` varchar(132) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pw` varchar(132) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `is_admin`, `email`, `is_active`, `username`, `pw`, `name`, `profile_picture`) VALUES
(26, '$2y$10$UcV3.Pvs9b7Jw5IHcaHgbuNw1d765BsUyED29ueHy9eamVMmLHr3u', 1, 'admin@musiconline.com', 1, 'admin', NULL, 'Admin', NULL),
(27, '$2y$10$BQ.jxuz7e12MGFNDSNMKH.sivaZV2/PH5oDWbosc58EpVIWCWvXIC', 0, 'karen@musiconline.com', 1, 'Karen', NULL, 'Karen', NULL),
(47, '$2y$10$/Oqd0lU1xPVVLi0P2Va9Ce00QtPHxBe8T4M5bbfKLyqh4ZMH4XwJS', 0, 'asim@musiconline.com', 1, 'asim1', NULL, 'asim1', NULL),
(49, '$2y$10$h8ejMnilcLbfgkM5iusSu.OVKzEUdVB8nB3kHmwisFVmYDjVyAAB.', 0, 'KarenS@musiconline.com', 1, 'KarenS', NULL, 'KarenS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `video_url` varchar(255) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL  -- Added image column here
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `release_date`, `is_active`, `video_url`, `fk_user_id`, `image`) VALUES
(1, 'My First Video', 'This is a test video description.', '2024-03-16', 1, 'https://example.com/video1.mp4', 27, 'myfirstvideo_thumbnail.jpg'),
(2, 'Summer Vacation Vlog', 'A fun vlog from my summer vacation.', '2024-03-15', 1, 'https://example.com/video2.mp4', 27, 'summervacationvlog_thumbnail.jpg');

-- --------------------------------------------------------

-- Indexes for dumped tables

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

-- --------------------------------------------------------

-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --------------------------------------------------------

-- Constraints for dumped tables

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
