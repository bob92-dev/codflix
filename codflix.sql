-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 06:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `media_id`, `start_date`, `finish_date`, `watch_duration`) VALUES
(4, 31, 15, '2020-06-10 18:03:36', '2020-06-19 18:03:36', 0),
(5, 31, 19, '2020-06-10 18:03:36', NULL, 0),
(7, 31, 17, '2020-06-25 17:27:13', NULL, 0),
(10, 31, 1, '2020-06-25 17:38:06', NULL, 0),
(12, 31, 11, '2020-06-25 18:41:22', NULL, 0),
(13, 31, 11, '2020-06-25 18:44:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 1, 'MadMax original', 'film', '', '1979-05-15', 'Le premier mad max est certainement le meilleur', 'https://www.youtube.com/embed/caHnaRq8Qlg'),
(2, 1, 'mad max', 'film', '', '2015-05-15', 'Mad Max: Fury Road', 'https://www.youtube.com/watch?v=hEJnMQG9ev8'),
(7, 2, 'Ready Player one', 'film', '', '2018-09-14', 'mauvais film de steven spielbeerg', 'https://www.youtube.com/watch?v=oYGkAMHCOC4'),
(11, 2, 'Peppa Pig', 'serie', '', '2020-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/XnvYp33OcMY'),
(12, 2, 'Peppa Pig', 'serie', '', '2020-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/IZdW1W5xBtg'),
(13, 2, 'Peppa Pig', 'serie', '', '2009-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/IgTub4IrkUY'),
(14, 2, 'Peppa Pig', 'serie', '', '2009-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/TTcPYiB3SZM'),
(15, 2, 'Peppa Pig', 'serie', '', '2008-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/lFJI88LKW48'),
(16, 2, 'Peppa Pig', 'serie', '', '2015-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/bIBzfF0_DnM'),
(17, 2, 'Peppa Pig', 'serie', '', '2008-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/ahnJOWkWSNg'),
(18, 2, 'Tchoupi', 'serie', '', '2008-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/nz_tC4sj2Mo'),
(19, 2, 'Tchoupi', 'serie', '', '2012-06-02', 'Un gros navet pour enfant qui insupporte les parents balbla bla bla bla ', 'https://www.youtube.com/embed/c6C2bh71skQ'),
(20, 2, 'Tchoupi', 'serie', '', '2015-06-02', 'Un gros navet pour enfant qui insupporte les parents un episode insupportable balbla bla bla bla ', 'https://www.youtube.com/embed/fVopuaJzWN0'),
(21, 2, 'Tchoupi', 'serie', '', '2018-06-02', 'Un gros navet pour enfant qui insupporte les parents un episode insupportable balbla bla bla bla ', 'https://www.youtube.com/embed/s1_uVurA8yk'),
(22, 2, 'Tchoupi', 'serie', '', '2018-06-02', 'Un gros navet pour enfant qui insupporte les parents un episode insupportable balbla bla bla bla ', 'https://www.youtube.com/embed/0ShMKj1NKUw'),
(23, 2, 'C\'est arrivé près de chez vous', 'film', '', '2012-01-12', 'Le meilleur film du monde. ', 'https://www.youtube.com/embed/y-qeM7RbL94'),
(25, 1, 'Yes man', 'film', '', '2015-08-06', 'Jim carrey est extraotrinaire (ou pas) dans ce film ', 'https://www.youtube.com/embed/MRYyPIX9krQ'),
(26, 3, 'Ad astra', 'film', '', '2019-01-10', 'Ad astra est un film passionant. a voir basolument. ', 'https://www.youtube.com/embed/J2hdmMXf-sM'),
(29, 2, 'Saw 9', 'film', '', '2020-04-14', 'Contrairement à saw 6, on ne peut plus faire de jeux d emots avec saw 9', 'https://www.youtube.com/embed/1K14mRmQJ2g'),
(30, 2, 'The silence', 'film', '', '2019-12-18', 'Un des films les plus flippants de la terre, qui reveisite le soiseaux d\'hitchcok', 'https://www.youtube.com/embed/OZTNKmjNr40'),
(31, 3, 'Contagion', 'film', '', '2016-01-06', 'Ce film avait anticipé le coronavirus.', 'https://www.youtube.com/embed/4sYSyuuLk5g');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `mediaId` int(11) NOT NULL,
  `saison` varchar(2) DEFAULT NULL,
  `episode` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `mediaId`, `saison`, `episode`) VALUES
(1, 11, '1', '1'),
(2, 12, '1', '2'),
(3, 13, '1', '3'),
(4, 14, '2', '1'),
(5, 15, '2', '2'),
(6, 16, '3', '1'),
(7, 17, '3', '2'),
(8, 18, '1', '1'),
(9, 19, '1', '2'),
(10, 20, '2', '2'),
(11, 21, '2', '3'),
(12, 22, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `confirmkey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `verified`, `confirmkey`) VALUES
(31, 'coding@gmail.com', '49dc52e6bf2abe5ef6e2bb5b0f1ee2d765b922ae6cc8b95d39dc06c21c848f8c', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE,
  ADD KEY `media_mediID` (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MediaID` (`mediaId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `FK_MediaID` FOREIGN KEY (`mediaId`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
