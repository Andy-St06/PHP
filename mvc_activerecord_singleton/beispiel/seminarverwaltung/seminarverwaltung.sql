-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Feb 2022 um 10:34
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `seminarverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(11) NOT NULL,
  `vorname` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passwort` varchar(20) DEFAULT NULL,
  `registriert_seit` date DEFAULT NULL,
  `anrede` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `vorname`, `name`, `email`, `passwort`, `registriert_seit`, `anrede`) VALUES
(1, 'Frank', 'Reich', 'f.reich@example.com', 'kochtopf', '2008-04-12', 'Herr'),
(2, 'Marie', 'Huana', 'huana@example.com', 'reibekuche', '2009-02-03', 'Frau'),
(3, 'Andreas', 'Meisenbär', 'a.meisenbär@example.com', 'schüssel', '2008-07-15', 'Herr'),
(4, 'Klaus', 'Uhr', 'klaus@ur.org', 'bratpfanne', '2008-02-05', 'Herr'),
(5, 'Mike', 'Rosoft', 'sichtbar_grundlegend@kleinweich.com', 'teekessel', '2009-11-11', 'Herr'),
(6, 'Beatrice', 'Lödmann', 'beatrice@fraudoktor.de', 'kaffeemuehle', '2006-09-09', 'Dr');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nimmt_teil`
--

CREATE TABLE `nimmt_teil` (
  `benutzer_id` int(11) NOT NULL,
  `seminartermine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `nimmt_teil`
--

INSERT INTO `nimmt_teil` (`benutzer_id`, `seminartermine_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `seminare`
--

CREATE TABLE `seminare` (
  `id` int(11) NOT NULL,
  `titel` varchar(120) DEFAULT NULL,
  `beschreibung` text DEFAULT NULL,
  `preis` decimal(6,2) DEFAULT NULL,
  `kategorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `seminare`
--

INSERT INTO `seminare` (`id`, `titel`, `beschreibung`, `preis`, `kategorie`) VALUES
(1, 'Relationale Datenbanken & MySQL', 'Nahezu alle modernen W...', '975.00', 'Datenbanken'),
(2, 'Ruby on Rails', 'Ruby on Rails ist das neue, sensation...', '2500.00', 'Programmierung'),
(3, 'Ajax & DOM-Scripting', 'Ajax ist längst dem Hype-Stadium ... JavaScript ist dabei ein essentieller Teil ...', '1699.99', 'Programmierung'),
(4, 'Moderne JavaScript-Programmierung', '...gilt als DIE Programmiersprache für clientseitige Web...', '2500.00', 'Programmierung'),
(5, 'Adobe Flash Professional (Grundlagen)', 'Adobe Flash bringt voll animierte, multimediale, interaktive Präsentationen und Anwendungen ...', '1500.00', 'Webdesign'),
(6, 'Adobe Flash Professional (ActionScript)', 'Für anspruchsvolle Flash-Präsentationen und interaktive Anwendungen werden fundierte Kenntnisse in der Programmierung mit ActionScript ...', '1500.00', 'Programmierung'),
(7, 'Digitale Bildbearbeitung mit Adobe Photoshop', 'In diesem Seminar lernen Sie die Grundlagen der digitalen Bildbearbeitung mit Adobe Photoshop ...', '1500.00', 'Webdesign');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `seminartermine`
--

CREATE TABLE `seminartermine` (
  `id` int(11) NOT NULL,
  `beginn` date DEFAULT NULL,
  `ende` date DEFAULT NULL,
  `raum` varchar(30) DEFAULT NULL,
  `seminar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `seminartermine`
--

INSERT INTO `seminartermine` (`id`, `beginn`, `ende`, `raum`, `seminar_id`) VALUES
(1, '2005-06-20', '2005-06-25', 'Schulungsraum 1', 1),
(2, '2005-11-07', '2005-11-12', 'Schulungsraum 2', 1),
(3, '2006-03-20', '2006-03-25', 'Schulungsraum 1', 1),
(4, '2006-12-04', '2006-12-09', 'Besprechungsraum', 1),
(5, '2005-01-17', '2005-01-24', 'Schulungsraum 1', 4),
(6, '2005-05-31', '2005-06-07', 'Aula', 4),
(7, '2005-10-17', '2005-10-24', 'Schulungsraum 2', 4);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `nimmt_teil`
--
ALTER TABLE `nimmt_teil`
  ADD PRIMARY KEY (`benutzer_id`,`seminartermine_id`),
  ADD KEY `fk_benutzer_has_seminartermine_seminartermine1_idx` (`seminartermine_id`),
  ADD KEY `fk_benutzer_has_seminartermine_benutzer1_idx` (`benutzer_id`);

--
-- Indizes für die Tabelle `seminare`
--
ALTER TABLE `seminare`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `seminartermine`
--
ALTER TABLE `seminartermine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seminartermine_seminare_idx` (`seminar_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `seminare`
--
ALTER TABLE `seminare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `seminartermine`
--
ALTER TABLE `seminartermine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `nimmt_teil`
--
ALTER TABLE `nimmt_teil`
  ADD CONSTRAINT `fk_benutzer_has_seminartermine_benutzer1` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_benutzer_has_seminartermine_seminartermine1` FOREIGN KEY (`seminartermine_id`) REFERENCES `seminartermine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `seminartermine`
--
ALTER TABLE `seminartermine`
  ADD CONSTRAINT `fk_seminartermine_seminare` FOREIGN KEY (`seminar_id`) REFERENCES `seminare` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
