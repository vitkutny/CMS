-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `link` text,
  `link_id` int(11) DEFAULT NULL,
  `hidden` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `menu_id`, `title`, `link`, `link_id`, `hidden`) VALUES
(1,	NULL,	'Titulní strana',	':Home:Front:Presenter:view',	NULL,	NULL),
(2,	NULL,	'Administrace',	':Home:Admin:Presenter:view',	NULL,	NULL);

DROP TABLE IF EXISTS `menu_group`;
CREATE TABLE `menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `key` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_id` (`menu_id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu_group` (`id`, `menu_id`, `key`) VALUES
(1,	1,	'front'),
(2,	2,	'admin');

-- 2014-07-14 13:14:44