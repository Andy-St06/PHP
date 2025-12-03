-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 03. Dez 2025 um 14:37
-- Server-Version: 9.1.0
-- PHP-Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `weblog_steinacher`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vorname` varchar(45) DEFAULT NULL,
  `nachname` varchar(45) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `autor`
--

INSERT INTO `autor` (`id`, `vorname`, `nachname`, `passwort`, `nickname`) VALUES
(6, 'Isaac', 'Isaac', '$2y$10$LN25hJI1YQVNgJcWVi3ZtuTPre83tW6Atnuyk//1.ZUW8/HfPr/oO', 'inewton'),
(7, 'Jean-Paul', 'Jean-Paul', '$2y$10$ASR8Yn4socTHn02M02K3DOffAaXvAIgkfNX9xZ23jQaeWIsbN5JCK', 'jsartre'),
(8, 'Georg Wilhelm Friedrich', 'Georg Wilhelm Friedrich', '$2y$10$Ogcu6OSOVEPly2eRqR2WoOs4WgLZoeP5IeNFWU0bHgjC2jTNjv/UW', 'ghegel'),
(13, 'aa', 'a', '$2y$10$b3GXnQXYweZ86rxUdMnVV.SZKx8TrqnfK0bPbOEZjd4IbLtIDFRgW', 'abc');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eintrag`
--

DROP TABLE IF EXISTS `eintrag`;
CREATE TABLE IF NOT EXISTS `eintrag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titel` varchar(45) DEFAULT NULL,
  `inhalt` text,
  `autor_id` int NOT NULL,
  `erstellt_am` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eintrag_autor_idx` (`autor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `eintrag`
--

INSERT INTO `eintrag` (`id`, `titel`, `inhalt`, `autor_id`, `erstellt_am`) VALUES
(13, 'Hallo', 'Hallo Hallo', 6, '2025-11-30 17:11:46');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `eintrag`
--
ALTER TABLE `eintrag`
  ADD CONSTRAINT `fk_eintrag_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
