-- phpMyAdmin SQL Dump
-- version 4.3.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 01:51 PM
-- Server version: 5.6.22
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategory`
--

CREATE TABLE IF NOT EXISTS `kategory` (
  `id_kategory` bigint(20) unsigned NOT NULL,
  `kategory` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategory`
--

INSERT INTO `kategory` (`id_kategory`, `kategory`) VALUES
(1, 'Newbie Forever'),
(2, 'Coder Newbie');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint(20) unsigned NOT NULL,
  `judul` varchar(20) NOT NULL,
  `post` text NOT NULL,
  `id_kategory` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `post`, `id_kategory`) VALUES
(15, 'a1', 'dv', 2),
(16, 'sd', 'sdfsd', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_post`
--
CREATE TABLE IF NOT EXISTS `view_post` (
`id` bigint(20) unsigned
,`judul` varchar(20)
,`post` text
,`id_kategory` int(20)
,`kategory` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_post`
--
DROP TABLE IF EXISTS `view_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_post` AS select `post`.`id` AS `id`,`post`.`judul` AS `judul`,`post`.`post` AS `post`,`post`.`id_kategory` AS `id_kategory`,`kategory`.`kategory` AS `kategory` from (`post` join `kategory`) where (`post`.`id_kategory` = `kategory`.`id_kategory`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`id_kategory`), ADD UNIQUE KEY `id_kategory` (`id_kategory`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategory`
--
ALTER TABLE `kategory`
  MODIFY `id_kategory` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
