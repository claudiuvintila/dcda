# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: bogdan.net (MySQL 5.5.34-0ubuntu0.13.04.1)
# Database: dcda
# Generation Time: 2013-12-20 15:03:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table mau_stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mau_stats`;

CREATE TABLE `mau_stats` (
  `id` int(10) DEFAULT NULL,
  `timestamp` int(20) NOT NULL,
  `mau` int(10) NOT NULL,
  `wau` int(10) NOT NULL,
  `dau` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `mau_stats` WRITE;
/*!40000 ALTER TABLE `mau_stats` DISABLE KEYS */;

INSERT INTO `mau_stats` (`id`, `timestamp`, `mau`, `wau`, `dau`)
VALUES
	(0,1383760800,93,827,9665),
	(1,1383757200,13,557,5176),
	(2,1383753600,4,215,3597),
	(3,1383750000,98,859,7957),
	(4,1383746400,19,579,8429),
	(5,1383742800,54,458,2638),
	(6,1383739200,42,996,7583),
	(7,1383735600,54,692,9527),
	(8,1383732000,76,517,3134),
	(9,1383728400,79,809,3298),
	(10,1383724800,83,748,9728),
	(11,1383721200,79,859,5666),
	(12,1383717600,21,889,6688),
	(13,1383714000,48,869,5246),
	(14,1383710400,23,153,9446),
	(15,1383706800,4,617,4105),
	(16,1383703200,18,996,4332),
	(17,1383699600,89,626,9397),
	(18,1383696000,83,421,4357),
	(19,1383692400,1,174,2133),
	(20,1383688800,20,919,8387),
	(21,1383685200,16,727,6925),
	(22,1383681600,63,920,5974),
	(23,1383678000,22,463,4427),
	(24,1383674400,64,684,4863),
	(25,1383670800,58,721,9628),
	(26,1383667200,88,881,9594),
	(27,1383663600,16,767,5789),
	(28,1383660000,9,610,8156),
	(29,1383656400,44,639,8845),
	(30,1383652800,55,811,8108),
	(31,1383649200,34,950,5656),
	(32,1383645600,98,659,4703),
	(33,1383642000,47,829,7987),
	(34,1383638400,83,541,4716),
	(35,1383634800,20,134,1522),
	(36,1383631200,16,903,9167),
	(37,1383627600,11,160,6756),
	(38,1383624000,60,285,2982),
	(39,1383620400,38,643,8103),
	(40,1383616800,24,237,6051),
	(41,1383613200,0,527,5687),
	(42,1383609600,47,529,2084),
	(43,1383606000,84,938,8909),
	(44,1383602400,59,786,4278),
	(45,1383598800,97,960,4528),
	(46,1383595200,0,198,3040),
	(47,1383591600,91,367,3654),
	(48,1383588000,54,845,5223),
	(49,1383584400,73,333,9996),
	(50,1383580800,50,519,2616),
	(51,1383577200,5,501,6636),
	(52,1383573600,55,926,2347),
	(53,1383570000,61,787,9797),
	(54,1383566400,47,432,7604),
	(55,1383562800,78,422,7169),
	(56,1383559200,9,379,8094),
	(57,1383555600,31,311,9976),
	(58,1383552000,57,785,8467),
	(59,1383548400,99,580,1643),
	(60,1383544800,99,985,5524),
	(61,1383541200,11,141,8976),
	(62,1383537600,72,652,8301),
	(63,1383534000,77,333,6036),
	(64,1383530400,75,724,8978),
	(65,1383526800,47,525,2994),
	(66,1383523200,13,593,5604),
	(67,1383519600,92,878,7439),
	(68,1383516000,92,532,5167),
	(69,1383512400,73,510,9198),
	(70,1383508800,74,499,9034),
	(71,1383505200,17,566,9335),
	(72,1383501600,6,310,5662),
	(73,1383498000,86,1000,7527),
	(74,1383494400,40,782,4708),
	(75,1383490800,27,314,8261),
	(76,1383487200,45,445,4365),
	(77,1383483600,93,408,3042),
	(78,1383480000,61,312,6622),
	(79,1383476400,4,917,2067),
	(80,1383472800,95,711,5126),
	(81,1383469200,84,850,9354),
	(82,1383465600,76,898,3104),
	(83,1383462000,25,766,2990),
	(84,1383458400,95,301,9091),
	(85,1383454800,30,484,2416),
	(86,1383451200,10,872,5616),
	(87,1383447600,44,814,7771),
	(88,1383444000,63,491,9217),
	(89,1383440400,24,503,8425),
	(90,1383436800,26,456,5346),
	(91,1383433200,68,342,3692),
	(92,1383429600,60,969,3154),
	(93,1383426000,75,353,8964),
	(94,1383422400,90,320,1421),
	(95,1383418800,79,557,5092),
	(96,1383415200,90,645,3939),
	(97,1383411600,36,138,1637),
	(98,1383408000,8,675,5411),
	(99,1383404400,100,903,9038),
	(100,1383400800,81,295,3548),
	(101,1383397200,26,837,5660),
	(102,1383393600,54,499,5160),
	(103,1383390000,68,293,6923),
	(104,1383386400,56,192,8300),
	(105,1383382800,57,858,4039),
	(106,1383379200,100,783,8597),
	(107,1383375600,26,200,8524),
	(108,1383372000,32,280,5354),
	(109,1383368400,78,313,4313),
	(110,1383364800,66,977,5870),
	(111,1383361200,92,382,3957),
	(112,1383357600,38,802,7597),
	(113,1383354000,81,551,8801),
	(114,1383350400,46,158,9128),
	(115,1383346800,26,640,7761),
	(116,1383343200,53,645,5489),
	(117,1383339600,36,869,6305),
	(118,1383336000,19,270,7524),
	(119,1383332400,66,954,9039),
	(120,1383328800,0,639,8768),
	(121,1383325200,49,584,2324),
	(122,1383321600,79,912,8851),
	(123,1383318000,50,748,4306),
	(124,1383314400,35,275,4107),
	(125,1383310800,26,499,9261),
	(126,1383307200,99,968,5937),
	(127,1383303600,45,420,4360),
	(128,1383300000,100,613,5931),
	(129,1383296400,71,318,5308),
	(130,1383292800,59,314,1817),
	(131,1383289200,44,724,6432),
	(132,1383285600,53,549,5444),
	(133,1383282000,39,971,3291),
	(134,1383278400,70,437,4230),
	(135,1383274800,2,622,7930),
	(136,1383271200,94,653,7601),
	(137,1383267600,43,159,1463),
	(138,1383264000,78,189,6039),
	(139,1383260400,29,761,7760),
	(140,1383256800,75,437,9253),
	(141,1383253200,81,806,6637),
	(142,1383249600,37,391,1886),
	(143,1383246000,84,744,1938),
	(144,1383242400,0,447,4402),
	(145,1383238800,33,489,9362),
	(146,1383235200,8,420,5659),
	(147,1383231600,80,821,6015),
	(148,1383228000,83,638,6042),
	(149,1383224400,38,868,3918),
	(150,1383220800,10,641,6403),
	(151,1383217200,1,463,4297),
	(152,1383213600,61,815,6946),
	(153,1383210000,67,681,4280),
	(154,1383206400,69,683,7493),
	(155,1383202800,3,952,2835),
	(156,1383199200,96,217,5250),
	(157,1383195600,45,846,3810),
	(158,1383192000,97,717,8325),
	(159,1383188400,49,170,6860),
	(160,1383184800,75,283,3379),
	(161,1383181200,31,261,6887),
	(162,1383177600,65,798,5270),
	(163,1383174000,27,497,1836),
	(164,1383170400,59,254,7008),
	(165,1383166800,28,258,6535),
	(166,1383163200,39,233,6754),
	(167,1383159600,86,645,5397);

/*!40000 ALTER TABLE `mau_stats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(32) NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `img_path` varchar(512) DEFAULT NULL,
  `tag` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `content`, `img_path`, `tag`)
VALUES
	(1,'2013-04-24','Random post','eu','bla bla bla bla','/img/At-symbol-4.sm_1.jpg','news'),
	(2,'2013-04-25','Post no. 346','Claudiu','once upon a timeonce upon a timeonce upon a timeonce upon a time','/img/260-biohazard-symbol-design.png','news'),
	(8,'2013-12-20','Trafic Jam','bogdan','User bogdan marked a traffic jam at location: 45.73499555 21.24580346','http://downloads2.esri.com/support/TechArticles/blank256.png','traffic_jam'),
	(9,'2013-12-20','Trafic Jam','bogdan','User bogdan marked a traffic jam at location: 45.73499555 21.24580346','http://downloads2.esri.com/support/TechArticles/blank256.png','traffic_jam'),
	(10,'2013-12-20','Rygd','bogdan','Dhffy','http://downloads2.esri.com/support/TechArticles/blank256.png','Tttt'),
	(3,'2013-04-24','Red car','Mishu','Ana nu \r\nare mere','/img/Symbol.jpg','traffic_jam'),
	(4,'2013-10-03','Trafic Jam','bogdan','User bogdan marked a traffic jam at location: 45.73499555 21.24580346','/img/bunny2.jpg','traffic_jam'),
	(5,'2013-10-03','Trafic Jam','bogdan','User bogdan marked a traffic jam at location: 45.73499555 21.24580346','/img/Symbol.jpg','traffic_jam'),
	(6,'2013-10-03','titlu','eu','continut','','traffic_jem'),
	(7,'2013-12-20','Trafic Jam','bogdan','User bogdan marked a traffic jam at location: 45.73499555 21.24580346','/img/bunny2.jpg','traffic_jam');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table servers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `servers`;

CREATE TABLE `servers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ipv4` varchar(15) DEFAULT NULL,
  `domain_name` varchar(40) DEFAULT NULL,
  `admin_key` varchar(40) DEFAULT NULL,
  `is_server` tinyint(1) NOT NULL DEFAULT '0',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `servers` WRITE;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;

INSERT INTO `servers` (`id`, `ipv4`, `domain_name`, `admin_key`, `is_server`, `latitude`, `longitude`)
VALUES
	(1,'79.114.33.155',NULL,'claudiu',1,45,11),
	(2,'79.114.33.175',NULL,'bogdan',0,22,22),
	(3,'192.168.0.78','','mihai',0,33,33);

/*!40000 ALTER TABLE `servers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_inputs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_inputs`;

CREATE TABLE `user_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` varchar(256) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `description` text NOT NULL,
  `title` varchar(32) CHARACTER SET utf8 NOT NULL,
  `content` text NOT NULL,
  `author` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `img_path` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_inputs` WRITE;
/*!40000 ALTER TABLE `user_inputs` DISABLE KEYS */;

INSERT INTO `user_inputs` (`id`, `user_id`, `tag`, `latitude`, `longitude`, `description`, `title`, `content`, `author`, `date`, `img_path`)
VALUES
	(5,15,'news',33,33,'adas','Test','tralala','','2013-11-12','http://1.bp.blogspot.com/_Afm6-TcZ7Ho/S67FmmVW4eI/AAAAAAAAC6A/YqmRu7D1dcs/s400/bunny2.jpg'),
	(7,1,'news',45.23,25.32,' ','','','','2013-12-10','http://images4.fanpop.com/image/photos/19200000/Hello-Kitty-hello-kitty-19285460-849-757.gif');

/*!40000 ALTER TABLE `user_inputs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT '',
  `last_name` varchar(20) DEFAULT '',
  `assigned_here` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `assigned_here`)
VALUES
	(7,'claudiu','$2a$10$xSDpfb6TCMiPd0vFj25gJO/EGqqok4tGSD3RsEnFeGLM2/MEYpLH2','Claudiu','Vintila',1),
	(13,'bogdan','$2a$10$rnrc7iYeQlwpJiAqXpRUUu5Kmwx2i24oDM4/5yCKBdch/pZVvME9W','Bogdan','Cimpoesu',1),
	(15,'mihai','$2a$10$EjfkdkaRHi9GwoVzht/oS.OmDVEUj7HfFtafsyKAgF9n3Uc3tKeqy','Mihai-Stelian','Simu',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
