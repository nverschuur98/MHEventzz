-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 dec 2016 om 10:36
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mheventzz_web`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `category_id` int(1) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_by` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_visible` int(11) NOT NULL,
  `post_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_content`, `post_by`, `post_date`, `post_visible`, `post_img`) VALUES
(15, 1, 'Klaar voor een nieuw jaar', 'We zijn klaar voor het nieuwe jaar! We hebben dan eindelijk ons kvk en btw nummer, nu zijn we dus officieel een bedrijf. We hebben ons eigen .nl domein aangeschaft. Met al dit moois zijn we natuurlijk super blij. We kijken met veel plezier en geluk tegen al dat nieuws aan. Door de nieuwe site kunt nog meer en nog sneller informatie vinden op onze site. Komt u ergens niet uit? Dan mailt u toch gewoon naar ons eigen email adress: info@mheventzz.nl!', 2, '2016-12-04', 1, 'http://weknowyourdreams.com/images/new-year/new-year-03.jpg'),
(13, 1, 'Officieel!', 'Vanaf dit jaar zijn we officieel in bedrijf. Dat is natuurlijk reden voor een feestje. Wij hebben deze gelegenheid gebruikt om een prachtige nieuwe moderne website te lanceren. Zo zou het voor u makkelijker moeten zijn om informatie te vinden.', 2, '2016-12-01', 1, 'IMG/feest.jpg'),
(14, 1, 'Online!!', 'De nieuwe website is online, dat vinden wij (MHEventzz) natuurlijk super leuk. Er is veel veranderd. Wij hebben ons eigen domein gekregen en hebben een veel nieuwe functies op onze site. Wij vinden zelf dat onze site overzichtelijker is geworden en beter bereikbaar is geworden voor mensen die van buitenaf komen. Onze nieuwe site is sneller dan de vorige en draait op php. Verder hebben we de snelheid van de site verbeterd zodat wij sneller berichten kunnen plaatsen en dat u ze dan kunt lezen.', 2, '2016-12-01', 1, 'IMG/website.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slider`
--

CREATE TABLE `slider` (
  `slider_img` varchar(300) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_content` text NOT NULL,
  `slider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `slider`
--

INSERT INTO `slider` (`slider_img`, `slider_title`, `slider_content`, `slider_id`) VALUES
('IMG/eindmuziek2016.jpg', 'Crew', 'Helaas zonder Daan', 1),
('IMG/DSC (15).jpg', 'De zaal...', '..Vol mensen.', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexen voor tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
