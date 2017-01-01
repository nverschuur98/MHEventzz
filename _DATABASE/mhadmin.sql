-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 jan 2017 om 20:02
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhadmin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(127) NOT NULL,
  `cat_icon_class` varchar(127) NOT NULL,
  `cat_timeline_class` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_icon_class`, `cat_timeline_class`) VALUES
(1, 'Feestje', 'ion ion-beer text-green', 'ion ion-beer bg-gray'),
(2, 'Account', 'fa fa-gears text-grey', 'fa fa-gears bg-gray'),
(3, 'Nieuwe Gebruiker', 'fa fa-child text-aqua', 'fa fa-child bg-gray');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_location` text NOT NULL,
  `event_color` varchar(7) NOT NULL,
  `event_progress` int(11) NOT NULL,
  `event_cover_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All the events';

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_date`, `event_location`, `event_color`, `event_progress`, `event_cover_image`) VALUES
(1, 'GHL Nieuwjaars Gala', 'Het nieuwjaarsgala op het Groene Hart Lyceum voor 2017', '2017-01-13', 'Tolstraat 11, Alphen Aan Den Rijn', '#25d435', 10, 'IMG/profile/CP/feest.jpg'),
(2, 'GHL Kerst Gala', 'Het kerst gala op het Groene Hart Lyceum voor 2016', '2016-12-21', 'Tolstraat 11, Alphen Aan Den Rijn', '#25d435', 100, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) NOT NULL,
  `noti_user` int(3) NOT NULL,
  `noti_cat` int(11) NOT NULL,
  `noti_title` varchar(255) NOT NULL,
  `noti_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `notifications`
--

INSERT INTO `notifications` (`noti_id`, `noti_user`, `noti_cat`, `noti_title`, `noti_link`) VALUES
(24, 5, 2, 'Profiel foto gewijzigd', 'profile.php'),
(25, 5, 2, 'Profiel foto gewijzigd', 'profile.php'),
(26, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(27, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(28, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(29, 5, 2, 'Omslag foto gewijzigd', 'profile.php'),
(30, 6, 2, 'Omslag foto gewijzigd', 'profile.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `regkeys`
--

CREATE TABLE `regkeys` (
  `regKey_id` int(11) NOT NULL,
  `regKey_regKey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `regkeys`
--

INSERT INTO `regkeys` (`regKey_id`, `regKey_regKey`) VALUES
(7, '4oBem2ElEr'),
(5, 'f2cXZW2tJh'),
(4, 'HkezV7ObWV');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `timeline_items`
--

CREATE TABLE `timeline_items` (
  `item_id` int(3) NOT NULL,
  `item_title` text NOT NULL,
  `item_cat` int(3) NOT NULL,
  `item_date` date NOT NULL,
  `item_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All items used on timelines';

--
-- Gegevens worden geëxporteerd voor tabel `timeline_items`
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
(19, '<a href=''profile.php?show_user=Daan van Beusekom''>Daan van Beusekom</a> heeft zijn omslag foto gewijzigd', 2, '2017-01-01', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` tinytext NOT NULL,
  `user_birthday` date NOT NULL,
  `user_description` text NOT NULL,
  `user_online` tinyint(1) NOT NULL,
  `user_image` text NOT NULL,
  `user_since` date NOT NULL,
  `user_cover_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='The properties of an user';

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_birthday`, `user_description`, `user_online`, `user_image`, `user_since`, `user_cover_image`) VALUES
(1, 'Admin', 'admin@test.nl', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1960-01-01', 'Admin', 0, 'IMG/profile/PP/avatar5.png', '1960-01-01', 'IMG/profile/PP/avatar5.png'),
(6, 'Daan van Beusekom', 'daanvanbeusekom@outlook.com', '3304b457089faeadd1b524af859cb1f4e08e9cd1', '2000-01-01', 'Webdeveloper - Lichttechnicus', 0, 'dist/img/user10.jpg', '2016-12-30', 'IMG/profile/CP/Lichtshow_Blue_City_Event_Scheemda-1024x394-1024x394.jpg'),
(5, 'Nick Verschuur', 'n.verschuur98@gmail.com', 'ad1cffa4cc7b47f132eae4ed4ccc03213461b25b', '1998-02-10', 'Webdeveloper \r\nLichttechnicus', 0, 'IMG/profile/PP/user9.jpg', '2016-12-30', 'IMG/profile/CP/crowd.jpg'),
(9, 'test', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '0000-00-00', '', 0, 'dist/img/avatar5.png', '2016-12-31', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexen voor tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`),
  ADD UNIQUE KEY `noti_id` (`noti_id`);

--
-- Indexen voor tabel `regkeys`
--
ALTER TABLE `regkeys`
  ADD PRIMARY KEY (`regKey_id`),
  ADD UNIQUE KEY `regKey_regKey` (`regKey_regKey`);

--
-- Indexen voor tabel `timeline_items`
--
ALTER TABLE `timeline_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT voor een tabel `regkeys`
--
ALTER TABLE `regkeys`
  MODIFY `regKey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `timeline_items`
--
ALTER TABLE `timeline_items`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
