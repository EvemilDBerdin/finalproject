-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2023 at 08:09 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `backupa`
--

DROP TABLE IF EXISTS `backupa`;
CREATE TABLE IF NOT EXISTS `backupa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `backupa`
--

INSERT INTO `backupa` (`id`, `data`, `date_created`) VALUES
(4, '[{\"course\":{\"course_offered\":\"test1\",\"course_applied\":\"2023-05-31\"}}]', '2023-05-26 18:32:45'),
(5, '[{\"subject\":{\"course_id\":\"1\",\"name\":\"mobile development\"}}]', '2023-05-26 18:37:48'),
(6, '[{\"instructor\":{\"school_id\":\"647102849ef5d\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:03:32'),
(7, '[{\"instructor\":{\"school_id\":\"64710311a9d05\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `backupb`
--

DROP TABLE IF EXISTS `backupb`;
CREATE TABLE IF NOT EXISTS `backupb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `backupb`
--

INSERT INTO `backupb` (`id`, `data`, `date_created`) VALUES
(3, '[{\"users\":{\"school_id\":\"6470fc04dbbb9\",\"email\":\"employee@email.com\",\"role\":\"student\"}}]', '2023-05-26 18:35:48'),
(4, '[{\"instructor\":{\"school_id\":\"6471027cc6e7a\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:03:24'),
(5, '[{\"instructor\":{\"school_id\":\"647102e0cdb95\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:05:04'),
(6, '[{\"instructor\":{\"school_id\":\"647103dc5291c\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
CREATE TABLE IF NOT EXISTS `master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `data`, `date_created`) VALUES
(20, '[{\"course\":{\"course_offered\":\"test1\",\"course_applied\":\"2023-05-31\"}}]', '2023-05-26 18:32:45'),
(21, '[{\"users\":{\"school_id\":\"6470fc04dbbb9\",\"email\":\"employee@email.com\",\"role\":\"student\"}}]', '2023-05-26 18:35:48'),
(22, '[{\"subject\":{\"course_id\":\"1\",\"name\":\"mobile development\"}}]', '2023-05-26 18:37:48'),
(23, '[{\"instructor\":{\"school_id\":\"6471027cc6e7a\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:03:24'),
(24, '[{\"instructor\":{\"school_id\":\"647102849ef5d\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:03:32'),
(25, '[{\"instructor\":{\"school_id\":\"647102e0cdb95\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:05:04'),
(26, '[{\"instructor\":{\"school_id\":\"64710311a9d05\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:05:53'),
(27, '[{\"instructor\":{\"school_id\":\"647103dc5291c\",\"email\":\"harold.tamara@cpc.com\"}}]', '2023-05-26 19:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `school_course`
--

DROP TABLE IF EXISTS `school_course`;
CREATE TABLE IF NOT EXISTS `school_course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_offered` text NOT NULL,
  `course_applied` text NOT NULL,
  `flag` int NOT NULL COMMENT '0 - active, 1 - inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_course`
--

INSERT INTO `school_course` (`id`, `course_offered`, `course_applied`, `flag`) VALUES
(1, 'Bachelor of Science in Information Technology', '2023-05-29', 0),
(2, 'Bachelor of Elementary Education', '2023-05-25', 0),
(3, 'Bachelor of Science in Hospitality Management', '2023-05-29', 0),
(4, 'Bachelor in Secondary Education Major in Science', '2023-05-03', 1),
(5, 'Bachelor of Science in Computer Engineer', '2023-05-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_subject`
--

DROP TABLE IF EXISTS `school_subject`;
CREATE TABLE IF NOT EXISTS `school_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `name` text NOT NULL,
  `flag` int NOT NULL COMMENT '0 - active, 1 - inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_subject`
--

INSERT INTO `school_subject` (`id`, `course_id`, `name`, `flag`) VALUES
(1, 1, 'Information Management 5', 0),
(2, 2, 'Modern world mathematics', 1),
(3, 2, 'Life of Rizal', 1),
(4, 2, 'Human Reproduction', 1),
(5, 2, 'Child and adolescent development', 1),
(6, 2, 'Child and adolescent development', 1),
(7, 1, 'Modern world mathematics', 1),
(8, 3, 'Modern world mathematics', 1),
(12, 3, 'Software Engineer', 0),
(13, 1, 'mobile development', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_completed`
--

DROP TABLE IF EXISTS `subject_completed`;
CREATE TABLE IF NOT EXISTS `subject_completed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `school_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_taken`
--

DROP TABLE IF EXISTS `subject_taken`;
CREATE TABLE IF NOT EXISTS `subject_taken` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `school_id` int NOT NULL,
  `status` int NOT NULL COMMENT '0-current taken, 1-failed, if pass this will be deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `flag` int NOT NULL COMMENT '0 - active, 1 - inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `email`, `password`, `role`, `flag`) VALUES
(12, '6470db4133e8d', 'web2.evemilberdin@proweaver.net', '202cb962ac59075b964b07152d234b70', 'dean', 0),
(17, '6470fc04dbbb9', 'employee@email.com', '202cb962ac59075b964b07152d234b70', 'student', 0),
(19, '647103dc5291c', 'harold.tamara@cpc.com', '202cb962ac59075b964b07152d234b70', 'instructor', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
