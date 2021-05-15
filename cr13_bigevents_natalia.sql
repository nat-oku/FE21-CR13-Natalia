-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Mai 2021 um 11:21
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_bigevents_natalia`
--
CREATE DATABASE IF NOT EXISTS `cr13_bigevents_natalia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cr13_bigevents_natalia`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210514081029', '2021-05-14 10:10:39', 51);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `event_descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_capac` int(11) NOT NULL,
  `cont_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_phone` int(11) NOT NULL,
  `event_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `event_name`, `date_time`, `event_descr`, `event_img`, `event_capac`, `cont_email`, `cont_phone`, `event_address`, `event_url`, `event_type`) VALUES
(1, 'Lady with Fan', '2021-06-24 12:00:37', 'Gustav Klimt‘s Last Works', 'https://events.wien.info/media/full/Dame_mit_F%C3%A4cher.jpg', 23, 'contact@mail.com', 431795570, 'Upper Belvedere (Oberes Belvedere)\r\nPrinz-Eugen-Straße 27\r\n1030 Wien', 'https://events.wien.info/en/139j/lady-with-fan/', 'exhibition'),
(3, 'Red Hot Chilli Peppers', '2025-09-17 16:18:00', 'The band is back on tour!', 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80', 30, 'redhotaustria@mail.com', 2147483647, 'Arena, Baumgasse 80, 1030 Vienna, Austria', 'www.red-hot-austria.at', 'concert'),
(7, 'Photography can stop time for a moment', '2017-10-10 10:00:00', 'Photography exhibition of the best images.', 'https://images.unsplash.com/photo-1616512329844-1a33d02db6cd?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzZ8fGV4aGliaXRpb258ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60', 25, 'photo@mail.com', 1234567, 'Art Gallery, Deutz, Colonne, Germany', 'www.photo-now.de', 'exhibition'),
(12, 'World. Black & white', '2023-02-03 18:00:00', 'Exhibition of paintings in black and white.', 'https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=667&q=80', 156, 'exhibition@mail.com', 86756890, 'San Francisco - Modern Art Gallery, San Fransisco, USA', 'www.black&white.us', 'exhibition'),
(13, 'Connecting the dots project', '2020-12-15 00:00:00', 'We are proud to present the results of the work of our students.', 'https://images.unsplash.com/photo-1545987796-b199d6abb1b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80', 50, 'dots@mail.com', 2147483647, 'Kunsthalle Wien, Vienna, Austria', 'www.dots-connected.at', 'exhibition'),
(14, 'Viennale.', '2021-10-21 19:20:00', 'The Viennale takes place this year from October 21st to November 2nd. With us you can get the tickets first!', 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=625&q=80', 40, 'eventim-viennale@mail.com', 123456, 'Eventim, Eventim Straße 1, 1010 Vienna, Austria', 'www.eventim.at', 'cinema'),
(15, 'Festival of Arabic Movies.', '2023-01-10 18:00:00', 'The best movies from the Arabic culture and international standouts will be shown at this movie festival.', 'https://images.unsplash.com/photo-1566504182406-416ab1e86d5e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=749&q=80', 39, 'arabic-movies@mail.com', 2147483647, 'Cairo Street 1, Cairo, Egypt', 'www.arabic-movies-cairo.com', 'cinema'),
(16, 'American Dream?', '2022-05-31 11:00:00', 'Be part of the biggest festival on Earth.', 'https://images.unsplash.com/photo-1522775417749-29284fb89f43?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=667&q=80', 690, 'americandream@mail.com', 253567465, 'Arizona Street 1, Arizona, USA', 'americandream@mail.com', 'festival'),
(17, 'Festival of Lights. US tour.', '2024-07-01 00:00:00', 'The highly acclaimed an belowed Festival Of Lights goes on a tour through the US! We start in Las Vegas.', 'https://images.unsplash.com/photo-1497911174120-042e550e7e0a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=738&q=80', 980, 'festivaloflights-us@mail.com', 5634264, 'Las Vegas, USA', 'www.festival-of-light.com', 'festival');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
