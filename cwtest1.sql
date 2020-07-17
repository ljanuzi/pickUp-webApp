-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 09:59 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwtest1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `user_id` varchar(30) NOT NULL,
  `event_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`user_id`, `event_id`) VALUES
('aymeri', '5ecc1b8c7676f'),
('aymeri', '5ecc1c620469d'),
('ljanuzi', '5ecc1ad6e2262'),
('mrestelica', '5ecc19fc95b68'),
('mrestelica', '5ecc1e4f3c197');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` varchar(13) NOT NULL,
  `date_of_event` date NOT NULL,
  `time_of_event` time NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `max_users` int(11) DEFAULT NULL,
  `duration_of_event` time DEFAULT NULL,
  `date_of_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `description` longtext NOT NULL,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `date_of_event`, `time_of_event`, `subject`, `max_users`, `duration_of_event`, `date_of_posting`, `lat`, `lng`, `description`, `creator`) VALUES
('5ecc15d2c1499', '2020-05-30', '20:30:00', 'Basketball Game ', 10, '20:30:00', '2020-05-25 19:00:34', 40.6266, 22.9518, 'Basketball Game night event this weekend. #sports #fun #friends', 'mrestelica'),
('5ecc1739a72dc', '2020-05-29', '04:00:00', 'Hackathon', 0, '04:00:00', '2020-05-25 19:06:33', 40.6373, 22.9369, 'Hackathon event, the theme is ROBOTS! #technology #learning #fun', 'ljanuzi'),
('5ecc1915f230a', '2020-05-29', '08:45:00', 'Tennis Game', 4, '08:45:00', '2020-05-25 19:14:30', 40.6253, 22.9517, 'Tennis Game, this Friday morning.  #sports #morningExcercise', 'ljanuzi'),
('5ecc19fc95b68', '2020-06-01', '08:00:00', 'Spring Ball', 0, '08:00:00', '2020-05-25 19:18:20', 40.6307, 22.9462, 'Join our spring ball next month. Dressing code is formal #party #friends!', 'ldavidovikj'),
('5ecc1ad6e2262', '2020-05-30', '18:15:00', 'Webinar on human behavior', 30, '18:15:00', '2020-05-25 19:21:58', 42.6653, 21.1663, 'Webinar on what drives our behavior with Dr. Jane Smith. #psychology  ', 'ldavidovikj'),
('5ecc1b2348315', '2020-05-25', '21:30:00', 'Rugby ', 15, '21:30:00', '2020-05-25 19:23:15', 40.6266, 22.9518, 'Make sure to join us tonight! #sports', 'aymeri'),
('5ecc1b8c7676f', '2020-06-15', '15:00:00', 'City College - Spring Symposiu', 0, '15:00:00', '2020-05-25 19:25:00', 40.6373, 22.9369, 'We invite everyone to join our spring symposium. Our #students have prepared #amazing talks. ', 'aymeri'),
('5ecc1bea4d94f', '2020-07-01', '07:00:00', 'Boat tour', 3, '07:00:00', '2020-05-25 19:26:34', 40.6321, 22.9348, 'A boat tour around the coast of #Thessaloniki ', 'aymeri'),
('5ecc1c620469d', '2020-05-26', '21:30:00', 'Movie Night', 0, '21:30:00', '2020-05-25 19:28:34', 40.6424, 22.9358, 'I invite you all to join me and watch #DoctorStrange tomorrow nigh. It will be #fun', 'ljanuzi'),
('5ecc1d49a04a2', '2020-06-01', '21:00:00', 'Sakura Fest', 50, '21:00:00', '2020-05-25 19:32:25', 40.6374, 22.9395, 'We are welcoming #spring with this amazing #party. Join  us!', 'mrestelica'),
('5ecc1dd1f2d95', '2020-05-27', '08:08:00', 'Soccer game', 12, '08:08:00', '2020-05-25 19:34:42', 40.6266, 22.9518, '#football #gameNight #fun #friens', 'mrestelica'),
('5ecc1e4f3c197', '2020-05-27', '21:00:00', 'Tennis Night', 2, '21:00:00', '2020-05-25 19:36:47', 40.6266, 22.9518, 'let''s play #tennis !', 'mrestelica');

-- --------------------------------------------------------

--
-- Table structure for table `hashtag`
--

CREATE TABLE `hashtag` (
  `event_id` varchar(13) NOT NULL,
  `hashtag_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashtag`
--

INSERT INTO `hashtag` (`event_id`, `hashtag_name`) VALUES
('5ecc15d2c1499', 'friends'),
('5ecc15d2c1499', 'fun'),
('5ecc15d2c1499', 'sports'),
('5ecc1739a72dc', 'fun'),
('5ecc1739a72dc', 'learning'),
('5ecc1739a72dc', 'technology'),
('5ecc1915f230a', 'morningExcercise'),
('5ecc1915f230a', 'sports'),
('5ecc19fc95b68', 'friends'),
('5ecc19fc95b68', 'party'),
('5ecc1ad6e2262', 'psychology'),
('5ecc1b2348315', 'sports'),
('5ecc1b8c7676f', 'amazing'),
('5ecc1b8c7676f', 'students'),
('5ecc1bea4d94f', 'Thessaloniki'),
('5ecc1c620469d', 'DoctorStrange'),
('5ecc1c620469d', 'fun'),
('5ecc1d49a04a2', 'party'),
('5ecc1d49a04a2', 'spring'),
('5ecc1dd1f2d95', 'football'),
('5ecc1dd1f2d95', 'friens'),
('5ecc1dd1f2d95', 'fun'),
('5ecc1dd1f2d95', 'gameNight'),
('5ecc1e4f3c197', 'tennis');

-- --------------------------------------------------------

--
-- Table structure for table `isin`
--

CREATE TABLE `isin` (
  `user_id` varchar(30) NOT NULL,
  `event_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isin`
--

INSERT INTO `isin` (`user_id`, `event_id`) VALUES
('aymeri', '5ecc1739a72dc'),
('aymeri', '5ecc1e4f3c197'),
('ldavidovikj', '5ecc1e4f3c197'),
('ljanuzi', '5ecc1b2348315'),
('ljanuzi', '5ecc1bea4d94f'),
('mrestelica', '5ecc1ad6e2262'),
('mrestelica', '5ecc1bea4d94f'),
('mrestelica', '5ecc1c620469d');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `email`, `password`) VALUES
('aymeri', 'Ardit Ymeri', 'aymeri@citycollege.sheffield.eu', '1234'),
('ldavidovikj', 'Lola Davidovikj', 'ldavidovikj@citycollege.sheffield.eu', '123'),
('ljanuzi', 'Learta Januzi', 'ljanuzi@citycollege.sheffield.eu', '123'),
('mrestelica', 'Memli Restelica', 'mrestelica@citycollege.sheffield.eu', '123'),
('thanos', 'Thanos Hatziapostolou', 'hatziapostolou@citycollege.sheffield.eu', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`user_id`,`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`event_id`,`hashtag_name`);

--
-- Indexes for table `isin`
--
ALTER TABLE `isin`
  ADD PRIMARY KEY (`user_id`,`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
