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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

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

