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

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `image`, `first_name`, `submission_date`, `location`, `caption`) VALUES
(3, NULL, 'Bruce', '2016-06-01', 'photos/2_Profile.JPG', 'Fecan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
