-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 30 dec 2016 om 19:50
-- Serverversie: 5.6.11
-- PHP-versie: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `mhadmin`
--
CREATE DATABASE IF NOT EXISTS `mhadmin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mhadmin`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `noti_id` int(11) NOT NULL AUTO_INCREMENT,
  `noti_user` int(3) NOT NULL,
  `noti_cat` int(11) NOT NULL,
  `noti_title` varchar(255) NOT NULL,
  `noti_link` varchar(255) NOT NULL,
  PRIMARY KEY (`noti_id`),
  UNIQUE KEY `noti_id` (`noti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `notifications`
--

INSERT INTO `notifications` (`noti_id`, `noti_user`, `noti_cat`, `noti_title`, `noti_link`) VALUES
(1, 1, 1, 'Nieuw feestjee', 'index.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `regkeys`
--

CREATE TABLE IF NOT EXISTS `regkeys` (
  `regKey_id` int(11) NOT NULL AUTO_INCREMENT,
  `regKey_regKey` varchar(50) NOT NULL,
  PRIMARY KEY (`regKey_id`),
  UNIQUE KEY `regKey_regKey` (`regKey_regKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `regkeys`
--

INSERT INTO `regkeys` (`regKey_id`, `regKey_regKey`) VALUES
(3, 'AMMqSBznm2'),
(5, 'f2cXZW2tJh'),
(4, 'HkezV7ObWV');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` tinytext NOT NULL,
  `user_birthday` date NOT NULL,
  `user_description` text NOT NULL,
  `user_online` tinyint(1) NOT NULL,
  `user_image` text NOT NULL,
  `user_since` date NOT NULL,
  PRIMARY KEY (`user_name`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='The properties of an user' AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_birthday`, `user_description`, `user_online`, `user_image`, `user_since`) VALUES
(1, 'Admin', 'admin@test.nl', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0000-00-00', 'Admin', 0, 'dist/img/avatar5.png', '0000-00-00'),
(5, 'Nick Verschuur', 'n.verschuur98@gmail.com', 'ad1cffa4cc7b47f132eae4ed4ccc03213461b25b', '1998-02-10', 'Webdeveloper - Lichttechnicus', 0, 'dist/img/user9.jpg', '2016-12-30'),
(6, 'Daan van Beusekom', 'daanvanbeusekom@outlook.com', '3304b457089faeadd1b524af859cb1f4e08e9cd1', '0000-00-00', 'Webdeveloper - Lichttechnicus', 0, 'dist/img/user10.jpg', '2016-12-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
