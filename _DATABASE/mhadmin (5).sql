-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 05 mrt 2017 om 14:55
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
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text NOT NULL,
  `cat_icon_class` text NOT NULL,
  `cat_timeline_class` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_icon_class`, `cat_timeline_class`) VALUES
(1, 'Feestje', 'ion ion-beer text-green', 'ion ion-beer bg-gray'),
(2, 'Account', 'fa fa-gears text-grey', 'fa fa-gears bg-gray'),
(3, 'Nieuwe Gebruiker', 'fa fa-child text-aqua', 'fa fa-child bg-gray'),
(4, 'Nieuw Feestje', 'fa fa-lightbulb-o text-yellow', 'fa fa-lightbulb-o bg-yellow'),
(5, 'Bericht Gewijzigd', 'ion ion-android-textsms text-aqua', 'ion ion-android-textsms bg-aqua'),
(6, 'Feest Info Gewijzigd', 'fa fa-pencil text-orange', 'fa fa-pencil bg-orange'),
(7, 'Organisatie Gewijzigd', 'fa fa-address-book text-orange', 'fa fa-address-book bg-orange'),
(8, 'Feest Foto Gewijzigd', 'ion ion-image text-green', 'ion ion-image bg-green'),
(9, 'Feest Foto''s toegevoegd', 'ion ion-images text-green', 'ion ion-images bg-green');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_cat` int(3) NOT NULL,
  `event_location` text NOT NULL,
  `event_color` varchar(7) NOT NULL,
  `event_progress` int(11) NOT NULL,
  `event_cover_image` text NOT NULL,
  `event_post` int(11) NOT NULL,
  `event_organization` varchar(255) NOT NULL,
  `event_organization_contact` varchar(255) NOT NULL,
  `event_organization_tel` varchar(20) NOT NULL,
  `event_organization_mail` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='All the events' AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_date`, `event_cat`, `event_location`, `event_color`, `event_progress`, `event_cover_image`, `event_post`, `event_organization`, `event_organization_contact`, `event_organization_tel`, `event_organization_mail`) VALUES
(1, 'GHL Nieuwjaars Gala', 'Het nieuwjaarsgala op het Groene Hart Lyceum voor 2017', '2017-01-13', 4, 'Tolstraat 11, Alphen Aan Den Rijn', '#185efe', 100, '../IMG/event/1/cp/scene-light-hands-concertmusic.jpg', 35, 'De Feestcommisie', 'Erwin Kesting', '0653807162', '-'),
(2, 'GHL Kerst Gala', 'Het kerst gala op het Groene Hart Lyceum voor 2016', '2016-12-21', 1, 'Tolstraat 11, Alphen Aan Den Rijn', '#359db2', 100, '../IMG/event/2/cp/DSC0719.JPG', 0, 'De Feestcommisie', 'Henk', '0653807162', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event_categories`
--

CREATE TABLE IF NOT EXISTS `event_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_color` varchar(7) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `event_categories`
--

INSERT INTO `event_categories` (`cat_id`, `cat_name`, `cat_color`) VALUES
(1, 'School Feest', '#3C8DBC'),
(2, 'Bruiloften', '#F56954'),
(3, 'Prive Feest', '#00A65A'),
(4, 'Verenigingen', '#F39C12'),
(5, 'Overig', '#D2D6DE'),
(6, 'Verjaardagen', '#39CCCC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event_timeline_items`
--

CREATE TABLE IF NOT EXISTS `event_timeline_items` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_title` text NOT NULL,
  `item_cat` int(3) NOT NULL,
  `item_date` date NOT NULL,
  `item_event` int(3) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Gegevens worden uitgevoerd voor tabel `event_timeline_items`
--

INSERT INTO `event_timeline_items` (`item_id`, `item_title`, `item_cat`, `item_date`, `item_event`) VALUES
(2, '<a href="profile.php?show_user=Nick Verschuur">Nick Verschuur</a> heeft het feestje aangemaakt', 4, '2017-01-04', 2),
(3, '<a href="profile.php?show_user=Nick Verschuur">Nick Verschuur</a> heeft het feestje aangemaakt', 4, '2017-01-11', 1),
(25, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft het feest bericht gewijzigd', 5, '2017-02-12', 1),
(26, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-12', 1),
(27, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de basis informatie gewijzigd', 6, '2017-02-12', 1),
(28, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-12', 2),
(29, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-12', 2),
(30, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-14', 2),
(31, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-14', 2),
(32, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de organisatie gewijzigd', 6, '2017-02-14', 2),
(33, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft het feest bericht gewijzigd', 5, '2017-03-04', 1),
(34, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft het feest bericht gewijzigd', 5, '2017-03-04', 1),
(35, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-04', 1),
(36, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-04', 1),
(37, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-04', 1),
(38, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-04', 2),
(39, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-04', 1),
(40, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(41, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(42, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(43, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(44, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(45, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-04', 1),
(46, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de basis informatie gewijzigd', 6, '2017-03-05', 4),
(47, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de basis informatie gewijzigd', 6, '2017-03-05', 5),
(48, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-05', 5),
(49, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de extra informatie gewijzigd', 6, '2017-03-05', 1),
(50, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft de omslag foto gewijzigd', 8, '2017-03-05', 1),
(51, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft het feest bericht gewijzigd', 5, '2017-03-05', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Gegevens worden uitgevoerd voor tabel `notifications`
--

INSERT INTO `notifications` (`noti_id`, `noti_user`, `noti_cat`, `noti_title`, `noti_link`) VALUES
(24, 5, 2, 'Profiel foto gewijzigd', 'profile.php'),
(25, 5, 2, 'Profiel foto gewijzigd', 'profile.php'),
(26, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(27, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(28, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(29, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(30, 6, 2, 'Omslag foto gewijzigd', 'profile.php'),
(31, 5, 2, 'Profiel foto gewijzigd', 'profile.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `regkeys`
--

CREATE TABLE IF NOT EXISTS `regkeys` (
  `regKey_id` int(11) NOT NULL AUTO_INCREMENT,
  `regKey_regKey` varchar(50) NOT NULL,
  PRIMARY KEY (`regKey_id`),
  UNIQUE KEY `regKey_regKey` (`regKey_regKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `regkeys`
--

INSERT INTO `regkeys` (`regKey_id`, `regKey_regKey`) VALUES
(7, '4oBem2ElEr'),
(5, 'f2cXZW2tJh'),
(4, 'HkezV7ObWV');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `timeline_items`
--

CREATE TABLE IF NOT EXISTS `timeline_items` (
  `item_id` int(3) NOT NULL AUTO_INCREMENT,
  `item_title` text NOT NULL,
  `item_cat` int(3) NOT NULL,
  `item_date` date NOT NULL,
  `item_user` int(3) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='All items used on timelines' AUTO_INCREMENT=21 ;

--
-- Gegevens worden uitgevoerd voor tabel `timeline_items`
--

INSERT INTO `timeline_items` (`item_id`, `item_title`, `item_cat`, `item_date`, `item_user`) VALUES
(1, '<a href="profile.php?show_user=Nick%20Verschuur">Nick Verschuur</a> is lid geworden', 3, '2016-12-30', 5),
(4, '<a href=''profile.php?show_user=Admin''>Admin</a> heeft zijn profiel foto gewijzigd', 2, '2016-12-31', 1),
(8, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn profiel foto gewijzigd', 2, '2016-12-31', 5),
(10, '<a href=''profile.php?show_user=test''>test</a> is lid geworden', 3, '2016-12-31', 9),
(11, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn profiel foto gewijzigd', 2, '2016-12-31', 5),
(12, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn profiel foto gewijzigd', 2, '2016-12-31', 5),
(13, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 5),
(14, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 5),
(15, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 5),
(16, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 5),
(17, '<a href="profile.php?show_user=Daan%20van%20Beusekom">Daan van Beusekom</a> is lid geworden', 3, '2016-12-30', 6),
(18, '<a href=''profile.php?show_user=Daan%20van%20Beusekom''>Daan van Beusekom</a> heeft zijn profiel foto gewijzigd', 2, '2016-12-31', 6),
(19, '<a href=''profile.php?show_user=Daan van Beusekom''>Daan van Beusekom</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 6),
(20, '<a href=''profile.php?show_user=Nick Verschuur''>Nick Verschuur</a> heeft zijn profiel foto gewijzigd', 2, '2017-02-10', 5);

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
  `user_cover_image` text NOT NULL,
  PRIMARY KEY (`user_name`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='The properties of an user' AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_birthday`, `user_description`, `user_online`, `user_image`, `user_since`, `user_cover_image`) VALUES
(1, 'Admin', 'admin@test.nl', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1960-01-01', 'Admin', 0, 'IMG/profile/PP/avatar5.png', '1960-01-01', 'IMG/profile/PP/avatar5.png'),
(6, 'Daan van Beusekom', 'daanvanbeusekom@outlook.com', '3304b457089faeadd1b524af859cb1f4e08e9cd1', '2000-01-01', 'Webdeveloper - Lichttechnicus', 0, 'dist/img/user10.jpg', '2016-12-30', 'IMG/profile/CP/Lichtshow_Blue_City_Event_Scheemda-1024x394-1024x394.jpg'),
(5, 'Nick Verschuur', 'n.verschuur98@gmail.com', 'ad1cffa4cc7b47f132eae4ed4ccc03213461b25b', '1998-02-10', 'Webdeveloper \r\nLichttechnicus', 0, 'IMG/profile/PP/user9.jpg', '2016-12-30', 'IMG/profile/CP/crowd.jpg'),
(9, 'test', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '0000-00-00', '', 0, 'dist/img/avatar5.png', '2016-12-31', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
