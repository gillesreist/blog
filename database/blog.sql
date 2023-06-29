-- Adminer 4.8.1 MySQL 10.3.38-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `blog`;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `text` varchar(150) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `importance` int(11) DEFAULT 0,
  `authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_authors1` (`authors_id`),
  CONSTRAINT `fk_articles_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `articles` (`id`, `title`, `text`, `date_start`, `date_end`, `importance`, `authors_id`) VALUES
(1,	'Quoi de neuf dans le sport ?',	'Un nouveau champion du monde de biathlon alors qu\'il est borgne et manchot !',	'2023-06-28 16:00:00',	'2024-06-28 16:00:00',	0,	1),
(2,	'Des castors sur la lune ?',	'Il semblerait que des traces de barrage auraient été trouvé sur la face cachée de la lune, nos rongeurs sont les premiers suspects.',	'2023-05-21 16:00:00',	'2023-07-28 00:00:00',	4,	2),
(3,	'c\'est un nouvel article sur le sport',	'Il parle aussi de biathlon',	'2023-08-29 14:00:00',	'2023-09-29 14:00:00',	2,	4),
(4,	'La montagne, ça vous gagne.',	'Faites de la randonnée, c\'est bon pour la santé.',	'2023-06-29 00:00:00',	'2023-07-15 00:00:00',	0,	1);

DROP TABLE IF EXISTS `articles_categories`;
CREATE TABLE `articles_categories` (
  `articles_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`articles_id`,`categories_id`),
  KEY `fk_articles_has_categories_categories1` (`categories_id`),
  CONSTRAINT `fk_articles_has_categories_articles` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_articles_has_categories_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `articles_categories` (`articles_id`, `categories_id`) VALUES
(1,	1),
(1,	3),
(2,	2),
(4,	3);

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authors` (`id`, `pseudonyme`, `surname`, `firstname`) VALUES
(1,	'Matéo',	'Pangolin',	NULL),
(2,	'Val',	'Moufette',	NULL),
(3,	'Doogi',	'Dugnou',	'Jean'),
(4,	'Bernouli',	'Poulain',	'Bernard'),
(5,	'Opolo',	'Dacascos',	'Mark');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `name`) VALUES
(1,	'sport'),
(2,	'fantastique'),
(3,	'loisirs'),
(4,	'sicence'),
(5,	'économie');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `articles_id` int(11) NOT NULL,
  `authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_articles1` (`articles_id`),
  KEY `fk_comments_authors1` (`authors_id`),
  CONSTRAINT `fk_comments_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`id`, `text`, `date`, `articles_id`, `authors_id`) VALUES
(1,	'J\'écris quand même divinement bien.',	'2023-06-28 09:20:37',	1,	1),
(2,	'Bravo',	'2023-06-27 18:39:38',	1,	3),
(4,	'nouveau commentaire',	'2023-06-28 00:00:00',	2,	4);

-- 2023-06-29 07:43:11
