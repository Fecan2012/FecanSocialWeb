-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2015 at 09:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comp231`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Comment_id` int(50) NOT NULL AUTO_INCREMENT,
  `Content` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `post_id` int(55) NOT NULL,
  PRIMARY KEY (`Comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `Event_id` int(50) NOT NULL AUTO_INCREMENT,
  `Profile_id` int(50) NOT NULL,
  `even_name` int(50) NOT NULL,
  PRIMARY KEY (`Event_id`),
  KEY `Profile_id` (`Profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE IF NOT EXISTS `invitation` (
  `invite_id` int(50) NOT NULL AUTO_INCREMENT,
  `event_id` int(50) NOT NULL,
  `profile_id` int(50) NOT NULL,
  PRIMARY KEY (`invite_id`),
  KEY `event_id` (`event_id`,`profile_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notify_id` int(60) NOT NULL AUTO_INCREMENT,
  `sender_profile_id` int(50) NOT NULL,
  `reciever_profile_id` int(50) NOT NULL,
  `date_time` int(33) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`notify_id`),
  KEY `sender_profile_id` (`sender_profile_id`,`reciever_profile_id`),
  KEY `reciever_profile_id` (`reciever_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `Page_id` int(50) NOT NULL AUTO_INCREMENT,
  `Profile_id` int(50) NOT NULL,
  `course_id` int(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  PRIMARY KEY (`Page_id`),
  KEY `Profile_id` (`Profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(50) NOT NULL AUTO_INCREMENT,
  `poster_type_id` int(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `entity_id` int(50) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `entity_id` (`entity_id`),
  KEY `poster_type_id` (`poster_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE IF NOT EXISTS `discussion` (
  `discussion_id` int(50) NOT NULL AUTO_INCREMENT,
  `poster_type_id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `entity_id` int(50) NOT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `entity_id` (`entity_id`),
  KEY `poster_type_id` (`poster_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE IF NOT EXISTS `poster` (
  `Poster_id` int(50) NOT NULL AUTO_INCREMENT,
  `Poter_type_id` int(50) NOT NULL,
  PRIMARY KEY (`Poster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `campus_name` varchar(20) NOT NULL,
  `role_id` int(2) NOT NULL,
  `sign_up_date` datetime not null,  
  PRIMARY KEY (`profile_id`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
`id` int(5) NOT NULL,
  `image` longblob,
  `first_name` varchar(50) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL DEFAULT 'image'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`Event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`sender_profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`reciever_profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`Profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`poster_type_id`) REFERENCES `poster` (`Poster_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Populating user roles
insert into role values(1,'Student');
insert into role values(2,'Faculty');
insert into role values(3,'Non Teaching Staff');
insert into role values(4,'College Administration');
insert into role values(5,'Monitor');
insert into role values(6,'Advertiser');
commit;

-- Populating poster table
insert into poster values(1,1);
insert into poster values(2,2);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
