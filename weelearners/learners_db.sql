-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2025 at 11:56 PM
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
(5, 'Creative Artist', 'For outstanding artistic expression.', 47, 'badge5.jpeg', 1),
(7, 'Science Star', 'For excelling in science experiments.', 47, 'badge7.jpeg', 1),
(8, 'Storyteller', 'For creating imaginative stories.', 27, 'badge8.jpeg', 1),
(9, 'Sports Champ', 'For demonstrating great athletic skill.', 47, 'badge9.jpeg', 1),
(10, 'Music Maker', 'For creating beautiful music.', 27, 'badge10.jpeg', 1),
(11, 'Tech Whiz', 'For mastering computer skills.', 47, 'badge11.jpeg', 1),
(12, 'Kind Helper', 'For always being kind and helpful.', 27, 'badge12.jpeg', 1),
(13, 'Team Leader', 'For leading the team to success.', 47, 'badge13.jpeg', 1),
(14, 'Playground Solver', 'For finding clever solutions within the playground.', 27, 'badge14.jpeg', 1),
(15, 'Language Lover', 'For learning new languages.', 47, 'badge15.jpeg', 1),
(16, 'History Hero', 'For knowing lots about history.', 27, 'badge16.jpeg', 1),
(17, 'Geography Guru', 'For mastering geography.', 47, 'badge17.jpeg', 1),
(18, 'Drama Star', 'For shining in theater.', 27, 'badge18.jpeg', 1),
(20, 'Puzzle Pro', 'For solving tricky puzzles.', 27, 'badge20.jpeg', 1),
(21, 'Building Buddy', 'For being great at building things.', 47, 'badge21.jpeg', 1),
(22, 'Echo Enthusiast ', 'For loving and learning about nature.', 27, 'badge22.jpeg', 1),
(23, 'Cooking Champ', 'For making yummy food.', 47, 'badge23.jpeg', 1),
(24, 'Drawing Dynamo', 'For creating amazing drawings.', 27, 'badge24.jpeg', 1),
(25, 'Singing Star', 'For singing beautifully.', 47, 'badge25.jpeg', 1);

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
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `is_admin`, `email`, `is_active`, `username`, `pw`, `name`, `profile_picture`, `role`) VALUES
(26, '$2y$10$UcV3.Pvs9b7Jw5IHcaHgbuNw1d765BsUyED29ueHy9eamVMmLHr3u', 1, 'admin@weelearners.com', 1, 'admin', NULL, 'Admin', NULL, 'Staff'),
(27, '$2y$10$BQ.jxuz7e12MGFNDSNMKH.sivaZV2/PH5oDWbosc58EpVIWCWvXIC', 1, 'karen@weelearners.com', 1, 'Karen', NULL, 'Karen', NULL, 'Parent Helper'),
(47, '$2y$10$/Oqd0lU1xPVVLi0P2Va9Ce00QtPHxBe8T4M5bbfKLyqh4ZMH4XwJS', 0, 'asim@weelearners.com', 1, 'asim1', NULL, 'asim1', NULL, 'Student'),
(55, '$2y$10$Ch8YYtNN.sIGKQr8dDlyaekd8rS.375FXGVDBVqaADl9k0hxRJCk6', 0, 'mal@weelearners.com', 1, 'MAL', NULL, NULL, NULL, 'Parent Helper'),
(56, '$2y$10$7wJ8wRtmpZwKfJTpmmhpAesIsHY1Cfx//CT5z3KRw/BBVuDJeFfu.', 0, 'iain@weelearners.com', 1, 'Iain3', NULL, 'Iain', NULL, 'Student'),
(57, '$2y$10$Sg64LxzSwtWS.MRZkD4r.uI1Vwv7wAHYpZm6BPAi/tYjcqAiqE6Kq', 1, 'natailie@weelearners.com', 1, 'Natailie', NULL, 'Natailie', NULL, 'Staff');

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
(2, 'Beloved Nursary In Glasgow ', 'Meet Sarah McDonald, the childcare teacher in the heart of the South Side helping students to help reach their potiential.', '2018-06-19', 1, 'https://www.youtube.com/watch?v=se1wu3iH_mw', 27, 'wee_learners.jpeg'),
(3, ' Transition from Nursery to Primary ', 'Meet all of our gradutes that have completed their all of their years in nursary.', '2019-12-19', 1, 'https://www.youtube.com/watch?v=ZDrM_F-A0AM', 27, 'wee_learners_transition.jpg'),
(4, ' Gym Activties ', 'Watch all of our students doing gym excersies.', '2018-06-18', 1, 'https://www.youtube.com/watch?v=7WCFb22jnRk', 27, 'weelearners_gym_activities.jpeg'),
(5, 'Wee Learners Expansion', 'Learn More about how we are going to expand wee learners nursery.', '2023-03-29', 1, 'https://www.youtube.com/watch?v=FAKE_VIDEO_1', 27, 'weelearners_expansion.jpeg'),
(6, 'Nursery School in Glasgow', 'See our Nursery', '2023-02-01', 1, 'https://www.youtube.com/watch?v=uW1b7uLW0DU', 27, 'weelearners_location.jpeg'),
(7, 'Welcome to Wee Learners Nursery', 'Come and Meet us at our Nursery!', '2023-02-15', 1, 'https://www.youtube.com/watch?v=EqC2zeA0-6c', 27, 'weelearners_locarion2.jpeg'),
(8, 'Wee Learners Zoo Visit', 'Come and see what animals are in the jungle that the students get to explore', '2023-03-01', 1, 'https://www.youtube.com/watch?v=WSXZ7BnVOvI', 27, 'weelearners_zoo.jpeg'),
(9, 'Wee Learners Painting', 'See what our students has painted.', '2023-03-15', 1, 'https://www.youtube.com/watch?v=iVWnThMFR74', 27, 'weelearners_painting.jpeg'),
(10, 'Wee Learners Storytime', 'See our Storytime with our imaagaine students.', '2023-04-01', 1, 'https://www.youtube.com/watch?v=cc7CAm6CKwM', 27, 'weelearners_storytime.jpeg'),
(11, 'Wee Learners Natures Calling', 'Watch our Students learn about eco, and nature', '2023-04-15', 1, 'https://www.youtube.com/watch?v=jJAhVCPK1_w', 27, 'weelearners_planting.jpeg'),
(12, 'MUST WATCH Wee Learners students learns plants', 'Students will be exploring different forms of plants.', '2023-05-01', 1, 'https://www.youtube.com/watch?v=29iRiYi_c9k', 27, 'weelearners_planting2.jpeg'),
(13, 'Wee Learners Navaity', 'Watch our natavlity by our students.', '2023-05-15', 1, 'https://www.youtube.com/watch?v=VmFc-5_mRKg', 27, 'weelearners_nativity.jpeg'),
(14, 'Wee Learners Dance Day', 'Come to Dance Day in Glasgow at Wee Learners Nursery and Preschool is a beautiful Early Years education and childcare setting for children aged 3 months to 5 years old. ', '2016-04-12', 1, 'https://www.youtube.com/watch?v=TfSx50Cnk0U', 27, 'weelearners_dance.jpeg'),
(15, 'Wee Learners Festive Day', 'Come to Festive Day in Glasgow at Wee Learners Nursery for students aged 3 months to 5 years old. ', '2018-08-24', 1, 'https://www.youtube.com/shorts/7NVs_GNa2Ww', 27, 'weelearners_festive_day.jpeg'),
(16, 'Wee Learners Play Day', 'Come to Wee Learners in Glasgow at Wee Learners Nursery for students aged 3 months to 5 years old, and watch them having fun. ', '2018-11-21', 1, 'https://www.youtube.com/watch?v=JYauIqy67Cs', 27, 'wee_learners_outside.jpeg'),
(17, 'Wee Learners Catching Monster', 'Come to students catching those pesky little pests in Glasgow Day Nursery. ', '2025-05-14', 1, 'https://www.youtube.com/watch?v=PnXA4Ecc4aY', 27, 'weelearners_bugs.jpeg'),
(18, 'Wee Learners Tour', 'Come to our Glasgow Nursery. ', '2025-03-04', 1, 'https://www.youtube.com/watch?v=PnXA4Ecc4aY', 27, 'weelearners_tour.jpeg'),
(19, 'Wee Learners Libary', 'Come to our libary thats located in Glasgow right beside the Nursery. ', '2020-08-04', 1, 'https://www.youtube.com/watch?v=dxvZZDW4DvM', 27, 'wee_learners._libary.jpeg'),
(20, 'Wee Learners First Aid Kit', 'Come to our nursery thats located in Glasgow to learn about first aid treatment, for parentsgurdiains and carers. ', '2020-05-20', 1, 'https://www.youtube.com/watch?v=XueXFqEPzqM', 27, 'weelearners_course.jpeg'),
(21, 'Wee Learners Sign Lanauge', 'Come to our nursery thats located in Glasgow to learn about sign languge, for parentsgurdiains and carers. ', '2020-05-20', 1, 'https://www.youtube.com/watch?v=hcOUb5NJxog', 27, 'wee_learners._sl.jpeg'),
(22, 'Wee Learners Book Day', 'Come to our nursery thats located in Glasgow to lto celebrate international book day. ', '2025-04-02', 1, 'https://www.youtube.com/watch?v=kruVlGL7wU0', 27, 'wee_learners._ib.jpeg'),
(23, 'Wee Learners Learning Disablity Day', 'Come to our nursery thats located in Glasgow to lto celebrate our neurodiverse students, for all they have accomplished. ', '2025-06-16', 1, 'https://www.youtube.com/watch?v=D6VG1eW9ERY', 27, 'wee_learners._ld.jpeg');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
