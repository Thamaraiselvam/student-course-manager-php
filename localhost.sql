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
(10,	'Fundamental Programming Concepts',	'R. Harris',	'a:2:{i:0;s:7:\"Tuesday\";i:1;s:9:\"Wednesday\";}',	'02PM',	'04PM',	'Basic programming concepts and problem analysis are studied'),
(11,	'Introduction to Computing Using Python',	'H. Walsh',	'a:2:{i:0;s:6:\"Monday\";i:1;s:9:\"Wednesday\";}',	'11AM',	'12PM',	'Programming and problem solving using Python'),
(12,	'Computing Using MATLAB',	' L. Robertson',	'a:2:{i:0;s:8:\"Thursday\";i:1;s:6:\"Friday\";}',	'04PM',	'05PM',	'Programming and problem solving using MATLAB'),
(13,	'C++ Programming',	'W. Markle',	'a:2:{i:0;s:9:\"Wednesday\";i:1;s:8:\"Thursday\";}',	'9AM',	'11AM',	'An intermediate introduction to the C++'),
(14,	'UNIX Tools and Scripting',	'Alexandra D. Beal',	'a:2:{i:0;s:7:\"Tuesday\";i:1;s:9:\"Wednesday\";}',	'10AM',	'11AM',	'Introduction to UNIX Tools and Scripting.'),
(15,	'Programming Practicum',	'Ethel B. Magee',	'a:5:{i:0;s:6:\"Monday\";i:1;s:7:\"Tuesday\";i:2;s:9:\"Wednesday\";i:3;s:8:\"Thursday\";i:4;s:6:\"Friday\";}',	'01PM',	'02PM',	'Introduction to the application for writing Java program'),
(16,	' Practicum in Database Systems',	'Raymond M. Smith',	'a:3:{i:0;s:6:\"Monday\";i:1;s:7:\"Tuesday\";i:2;s:9:\"Wednesday\";}',	'10AM',	'11AM',	'Students build part of a database system in Java. \r\n'),
(17,	'Practicum in Operating Systems',	'Craig K. Beach',	'a:3:{i:0;s:9:\"Wednesday\";i:1;s:8:\"Thursday\";i:2;s:6:\"Friday\";}',	'11AM',	'12PM',	'Studies the practical aspects of operating systems'),
(18,	'Computer Graphics Practicum',	'James H. Stevenson',	'a:3:{i:0;s:6:\"Monday\";i:1;s:7:\"Tuesday\";i:2;s:8:\"Thursday\";}',	'01PM',	'02PM',	'semester-long project involves building a substantial interactive 3D system'),
(19,	'Robot Learning',	'J. Sanches',	'a:3:{i:0;s:6:\"Monday\";i:1;s:9:\"Wednesday\";i:2;s:6:\"Friday\";}',	'4PM',	'5PM',	'Studies the problem of how an agent can learn to perceive its world well enough to act in it'),
(20,	'Software Engineering',	'E. Keefe',	'a:3:{i:0;s:7:\"Tuesday\";i:1;s:9:\"Wednesday\";i:2;s:8:\"Thursday\";}',	'10AM',	'12PM',	'Introduction to the practical problems of specifying, designing, and building large, reliable software systems'),
(21,	'Cloud Computing',	'C. Guzman',	'a:2:{i:0;s:9:\"Wednesday\";i:1;s:8:\"Thursday\";}',	'01PM',	'03PM',	'Focuses on cloud computing, large-scale Internet applications'),
(22,	'Computer Vision',	'Jerry L. Torres',	'a:4:{i:0;s:6:\"Monday\";i:1;s:7:\"Tuesday\";i:2;s:9:\"Wednesday\";i:3;s:8:\"Thursday\";}',	'02PM',	'03PM',	'Introduction to computer vision.');

DROP TABLE IF EXISTS `enrolled_courses`;
CREATE TABLE `enrolled_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_type` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_course_id_sem_type` (`user_id`,`course_id`,`sem_type`(180))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `enrolled_courses` (`id`, `user_id`, `course_id`, `sem_type`) VALUES
(57,	3,	8,	'0'),
(58,	3,	4,	'0'),
(59,	3,	5,	'0'),
(62,	3,	6,	'fall'),
(73,	3,	5,	'fall'),
(74,	3,	7,	'fall'),
(75,	3,	4,	'summer'),
(76,	3,	5,	'summer'),
(77,	3,	6,	'summer'),
(78,	3,	7,	'summer'),
(79,	3,	4,	'spring'),
(80,	3,	5,	'spring'),
(81,	3,	6,	'spring'),
(82,	3,	7,	'spring'),
(83,	4,	4,	'spring'),
(84,	4,	5,	'spring'),
(85,	4,	4,	'fall'),
(87,	4,	4,	'summer'),
(88,	4,	5,	'summer'),
(89,	9,	10,	'spring'),
(90,	9,	11,	'spring'),
(91,	9,	15,	'spring'),
(92,	9,	13,	'spring'),
(93,	9,	22,	'summer'),
(94,	9,	21,	'summer'),
(95,	9,	20,	'summer'),
(96,	9,	19,	'summer'),
(97,	9,	15,	'fall'),
(98,	9,	16,	'fall'),
(99,	9,	18,	'fall'),
(100,	9,	14,	'fall'),
(102,	7,	11,	'spring'),
(106,	7,	10,	'spring'),
(107,	7,	12,	'spring'),
(108,	7,	10,	'summer'),
(109,	7,	11,	'summer'),
(110,	7,	10,	'fall');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `type` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `address`, `type`, `reg_no`, `phone_number`) VALUES
(1,	'admin@example.com',	'e64c7d89f26bd1972efa854d13d7dd61',	'Administrator',	'Not Specified',	'admin',	'',	''),
(6,	'JoseWStapleton@jourrapide.com',	'9699a3a1f55a82b15bc964dfd94d000f',	'Jose W. Stapleton',	'962 Ashcraft Court\r\nSan Diego, CA 92101',	'student',	'37938243',	''),
(7,	'MatthewCCollins@rhyta.com',	'c2e1f81d34057a983ab064fa98243e2d',	'Matthew C. Collins',	'1528 Dola Mine Road\r\nCary, NC 27513',	'student',	'2927392',	'88978990'),
(8,	'ChristineROakes@teleworm.us',	'90eedd85a5bf72a8fb4dda1e6bd5fe2f',	'Christine R. Oakes',	'2041 Drainer Avenue\r\nTallahassee, FL 32304',	'student',	'49842120',	''),
(9,	'EdithJGantz@rhyta.com',	'1116b12a1f0cc5086968fb7338bb1738',	'Edith J. Gantz',	'4681 Sheila Lane\r\nReno, NV 89502\r\n',	'student',	'68366631',	'');

-- 2016-12-10 20:03:22
