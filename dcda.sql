-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2013 at 11:26 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcda`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(32) NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `img_path` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `content`, `img_path`) VALUES
(1, '2013-04-24', 'Random post', 'eu', 'bla bla bla bla', '/img/65a088080ee1b1affcebf874e150a3e6.jpeg'),
(2, '2013-04-25', 'Post no. 346', 'Claudiu', 'once upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a timeonce upon a time', '/img/5e30529000dba625140e3afbdbffcaf0.jpeg'),
(3, '2013-04-24', 'Red car', 'Mishu', 'Ana nu \r\nare mere', '/img/df7f83a1bef2b6efc57697be8fa64082.png');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ipv4` varchar(15) DEFAULT NULL,
  `domain_name` varchar(40) DEFAULT NULL,
  `admin_key` varchar(40) DEFAULT NULL,
  `is_server` tinyint(1) NOT NULL DEFAULT '0',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `ipv4`, `domain_name`, `admin_key`, `is_server`, `latitude`, `longitude`) VALUES
(1, '192.168.0.75', NULL, 'claudiu', 1, 11, 11),
(2, '79.114.33.175', NULL, 'bogdan', 0, 22, 22),
(3, '192.168.0.78', '', 'mihai', 0, 33, 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT '',
  `last_name` varchar(20) DEFAULT '',
  `assigned_here` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `assigned_here`) VALUES
(7, 'claudiu', '$2a$10$xSDpfb6TCMiPd0vFj25gJO/EGqqok4tGSD3RsEnFeGLM2/MEYpLH2', 'Claudiu', 'Vintila', 1),
(13, 'bogdan', '$2a$10$rnrc7iYeQlwpJiAqXpRUUu5Kmwx2i24oDM4/5yCKBdch/pZVvME9W', 'Bogdan', 'Cimpoesu', 1),
(15, 'mihai', '$2a$10$EjfkdkaRHi9GwoVzht/oS.OmDVEUj7HfFtafsyKAgF9n3Uc3tKeqy', 'Mihai-Stelian', 'Simu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_inputs`
--

DROP TABLE IF EXISTS `user_inputs`;
CREATE TABLE IF NOT EXISTS `user_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tags` varchar(256) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_inputs`
--

INSERT INTO `user_inputs` (`id`, `user_id`, `tags`, `latitude`, `longitude`, `description`) VALUES
(1, 1, 'traffic-jam', 45.145, 25.142, 'blah blah'),
(4, 1, 'traffic-jam', 45.23, 25.32, ' '),
(3, 1, 'traffic-jam', 45.24, 25.34, 'avoid traffic jams!');
