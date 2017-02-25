-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 25 feb 2017 om 08:44
-- Serverversie: 5.6.11
-- PHP-versie: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `mheventzz_web`
--
CREATE DATABASE IF NOT EXISTS `mheventzz_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mheventzz_web`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(1) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_by` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_visible` int(11) NOT NULL,
  `post_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Gegevens worden uitgevoerd voor tabel `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_content`, `post_by`, `post_date`, `post_visible`, `post_img`) VALUES
(15, 1, 'Klaar voor een nieuw jaar', 'We zijn klaar voor het nieuwe jaar! We hebben dan eindelijk ons kvk en btw nummer, nu zijn we dus officieel een bedrijf. We hebben ons eigen .nl domein aangeschaft. Met al dit moois zijn we natuurlijk super blij. We kijken met veel plezier en geluk tegen al dat nieuws aan. Door de nieuwe site kunt nog meer en nog sneller informatie vinden op onze site. Komt u ergens niet uit? Dan mailt u toch gewoon naar ons eigen email adress: info@mheventzz.nl!', 2, '2016-12-04', 1, 'http://weknowyourdreams.com/images/new-year/new-year-03.jpg'),
(13, 1, 'Officieel!!', 'Vanaf dit jaar zijn we officieel in bedrijf. Dat is natuurlijk reden voor een feestje. Wij hebben deze gelegenheid gebruikt om een prachtige nieuwe moderne website te lanceren. Zo zou het voor u makkelijker moeten zijn om informatie te vinden.                            &lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;blockquote&gt;&lt;u&gt;&lt;/u&gt;Dit is een test&lt;u&gt;&lt;/u&gt;&lt;/blockquote&gt;&lt;/div&gt;', 2, '2016-12-01', 1, 'IMG/feest.jpg'),
(14, 1, 'Online!!', 'De nieuwe website is online, dat vinden wij (MHEventzz) natuurlijk super leuk. Er is veel veranderd. Wij hebben ons eigen domein gekregen en hebben een veel nieuwe functies op onze site. Wij vinden zelf dat onze site overzichtelijker is geworden en beter bereikbaar is geworden voor mensen die van buitenaf komen. Onze nieuwe site is sneller dan de vorige en draait op php. Verder hebben we de snelheid van de site verbeterd zodat wij sneller berichten kunnen plaatsen en dat u ze dan kunt lezen.', 2, '2016-12-01', 1, 'IMG/website.png'),
(35, 0, 'Het nieuwjaarsgala was super!', '&lt;p&gt;Jaa het was echt een super feestje!&lt;/p&gt;', 5, '2017-02-12', 1, 'admin/IMG/profile/CP/feest.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_img` varchar(300) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_content` text NOT NULL,
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `slider`
--

INSERT INTO `slider` (`slider_img`, `slider_title`, `slider_content`, `slider_id`) VALUES
('IMG/eindmuziek2016.jpg', 'Crew', 'Helaas zonder Daan', 1),
('IMG/DSC (15).jpg', 'De zaal...', '..Vol mensen.', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
