-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `sm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sm`;

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `professor` text NOT NULL,
  `days` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `courses` (`id`, `name`, `professor`, `days`, `start_time`, `end_time`, `description`) VALUES
(3,	'selvaa',	'Mr.Thamaraii',	'a:5:{i:0;s:6:\"Monday\";i:1;s:7:\"Tuesday\";i:2;s:9:\"Wednesday\";i:3;s:8:\"Thursday\";i:4;s:6:\"Friday\";}',	'9AM',	'5PM',	'CSE-CSE');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `type` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `address`, `type`, `reg_no`) VALUES
(1,	'a@live.com',	'ca676b517a4cee2da0ccbd208a051173',	'selva',	'selvaselvalselva',	'admin',	''),
(2,	'tselva',	'ca676b517a4cee2da0ccbd208a051173',	'tHAMARAISELVAM',	'cHENNAI',	'student',	'23232');

-- 2016-11-19 16:08:36
