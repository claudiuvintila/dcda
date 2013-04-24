-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2013 at 09:45 PM
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

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(32) NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `content`) VALUES
(1, '2013-04-24', 'titlu', 'eu', 'bla bla'),
(2, '2013-04-25', 'Postul lui Claudiu', 'Claudiu', 'blah blah'),
(3, '2013-04-24', 'Mishu''s post', 'Mishu', 'Ana are mere');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ipv4` varchar(15) DEFAULT NULL,
  `domain_name` varchar(40) DEFAULT NULL,
  `admin_key` varchar(40) DEFAULT NULL,
  `is_server` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `ipv4`, `domain_name`, `admin_key`, `is_server`) VALUES
(1, NULL, 'dcda.lan', 'adminadminadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `first_name` varchar(20) DEFAULT '',
  `last_name` varchar(20) DEFAULT '',
  `consumer_key` varchar(40) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `consumer_key`) VALUES
(7, 'claudiu', 'Claudiu', 'Vintila', 'f0378600d6809931'),
(8, 'claudiu1', 'Claudiu', 'Vintila', '123451234512345'),
(9, 'claudiu2', 'Claudiu', 'Vintila', '123451234512345');
