-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jun 2021 um 14:06
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `quiz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `Benutzername` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`Benutzername`) VALUES
('JonasCentarti'),
('Kilian');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antwort`
--

CREATE TABLE `antwort` (
  `Buchstabe` varchar(1) NOT NULL,
  `IDFrage` int(11) NOT NULL,
  `InhaltAntwort` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Richtig` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `antwort`
--

INSERT INTO `antwort` (`Buchstabe`, `IDFrage`, `InhaltAntwort`, `Richtig`) VALUES
('A', 1, 'Berlin', 0),
('A', 2, 'Marseille', 0),
('A', 3, '14', 0),
('A', 4, 'Erfurt', 1),
('A', 5, 'Argentinien', 0),
('A', 6, 'Baseball', 1),
('A', 7, '2,30 Meter', 0),
('A', 8, 'Help!', 0),
('A', 9, '1945', 0),
('A', 10, 'Japanische Revolution', 0),
('A', 11, 'Konrad Adenauer', 1),
('A', 12, 'Pabst Franziskus', 0),
('B', 1, 'Bremen', 1),
('B', 2, 'Bordeaux', 0),
('B', 3, '16', 1),
('B', 4, 'Jena', 0),
('B', 5, 'Brasilien', 1),
('B', 6, 'Tennis', 1),
('B', 7, '2,45 Meter', 1),
('B', 8, 'Yellow Submarine', 0),
('B', 9, '1960', 0),
('B', 10, 'Franz?sische Revolution', 1),
('B', 11, 'Willy Brandt', 0),
('B', 12, 'Ludwig Erhard', 0),
('C', 1, 'Saarland', 0),
('C', 2, 'Paris', 1),
('C', 3, '15', 0),
('C', 4, 'Weimar', 0),
('C', 5, 'Deutschland', 0),
('C', 6, 'Speerwerfen', 0),
('C', 7, '2,10 Meter', 0),
('C', 8, 'Revolver', 0),
('C', 9, '1914', 0),
('C', 10, 'Amerikanische Revolution', 0),
('C', 11, 'Helmut Schmidt', 0),
('C', 12, 'Gregor Mendel', 0),
('D', 1, 'Hamburg', 0),
('D', 2, 'Nizza', 0),
('D', 3, '18', 0),
('D', 4, 'Gera', 0),
('D', 5, 'Spanien', 0),
('D', 6, 'Hockey', 1),
('D', 7, '2,55 Meter', 0),
('D', 8, 'Let It Be', 1),
('D', 9, '1939', 1),
('D', 10, 'Deutsche Revolution', 0),
('D', 11, 'Ludwig Erhard', 0),
('D', 12, 'Johannes Gutenberg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bearbeitet`
--

CREATE TABLE `bearbeitet` (
  `Bentuzername` varchar(32) NOT NULL,
  `IDSet` int(11) NOT NULL,
  `IDRichtig` int(1) NOT NULL,
  `IDFalsch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `Benutzername` varchar(32) NOT NULL,
  `Passwort` varchar(32) NOT NULL,
  `Punkte` int(11) NOT NULL,
  `Rekord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`Benutzername`, `Passwort`, `Punkte`, `Rekord`) VALUES
('JonasCentarti', '123', 1002, 1002),
('Kilian', '123', 999, 0),
('Lukas', '123', 2, 0),
('Mathis', '123', 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `falsch`
--

CREATE TABLE `falsch` (
  `IDFalsch` int(11) NOT NULL,
  `IDFrage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `frage`
--

CREATE TABLE `frage` (
  `IDFrage` int(11) NOT NULL,
  `Inhalt` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Benutzername` varchar(32) NOT NULL,
  `IDKategorie` int(11) NOT NULL,
  `Bewertung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `frage`
--

INSERT INTO `frage` (`IDFrage`, `Inhalt`, `Benutzername`, `IDKategorie`, `Bewertung`) VALUES
(1, 'Was ist das fl?chenm??ig kleinste Bundesland Deutschlands?', 'JonasCentarti', 1, 0),
(2, 'Wie lautet die Hauptstadt von Frankreich?', 'JonasCentarti', 1, 0),
(3, 'Wie viele Bundesl?nder hat Deutschland?', 'JonasCentarti', 1, 0),
(4, 'Wie hei?t die Hauptstadt von Th?ringen?', 'JonasCentarti', 1, 0),
(5, 'Wer gewann die Fu?ball Weltmeisterschaft 2002?', 'JonasCentarti', 2, 0),
(6, 'In welcher dieser Sportarten werden Schl?ger verwendet?', 'JonasCentarti', 2, 0),
(7, 'Wie hoch ist der Hochsprung Weltrekord?', 'JonasCentarti', 2, 0),
(8, 'Wie hie? das letzte Album der Beatles?', 'JonasCentarti', 4, 0),
(9, 'In welchem Jahr Begann der Zweite Weltkrieg?', 'JonasCentarti', 3, 0),
(10, 'Im Zuge welcher Revolution wurde Ludwig XVI. zum Tode verurteilt und hingerichtet?', 'JonasCentarti', 3, 0),
(11, 'Wer war der erste Bundeskanzler der Bundesrepublik Deutschland?', 'JonasCentarti', 3, 0),
(12, 'Wer gilt als Erfinder des modernen Buchdrucks mit beweglichen Metalllettern und der Druckerpresse?', 'JonasCentarti', 3, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragenset`
--

CREATE TABLE `fragenset` (
  `IDSet` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Bezeichnung` varchar(1000) NOT NULL,
  `Schwierigkeit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ist_in`
--

CREATE TABLE `ist_in` (
  `IDFrage` int(11) NOT NULL,
  `IDSet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `IDKategorie` int(11) NOT NULL,
  `Bezeichnung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`IDKategorie`, `Bezeichnung`) VALUES
(1, 'Geographie '),
(2, 'Sport'),
(3, 'Geschichte'),
(4, 'Musik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `moderator`
--

CREATE TABLE `moderator` (
  `Benutzername` varchar(32) NOT NULL,
  `Telefonnummer` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `moderator`
--

INSERT INTO `moderator` (`Benutzername`, `Telefonnummer`) VALUES
('JonasCentarti', 123456789),
('Kilian', 123456789);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `richtig`
--

CREATE TABLE `richtig` (
  `IDRichtig` int(11) NOT NULL,
  `IDFrage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Benutzername`);

--
-- Indizes für die Tabelle `antwort`
--
ALTER TABLE `antwort`
  ADD PRIMARY KEY (`Buchstabe`,`IDFrage`),
  ADD KEY `IDFrage` (`IDFrage`);

--
-- Indizes für die Tabelle `bearbeitet`
--
ALTER TABLE `bearbeitet`
  ADD PRIMARY KEY (`Bentuzername`,`IDSet`),
  ADD KEY `IDSet` (`IDSet`),
  ADD KEY `IDFalsch` (`IDFalsch`),
  ADD KEY `IDRichtig` (`IDRichtig`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`Benutzername`);

--
-- Indizes für die Tabelle `falsch`
--
ALTER TABLE `falsch`
  ADD PRIMARY KEY (`IDFalsch`),
  ADD KEY `IDFrage` (`IDFrage`);

--
-- Indizes für die Tabelle `frage`
--
ALTER TABLE `frage`
  ADD PRIMARY KEY (`IDFrage`),
  ADD KEY `IDKategorie` (`IDKategorie`),
  ADD KEY `Benutzername` (`Benutzername`);

--
-- Indizes für die Tabelle `fragenset`
--
ALTER TABLE `fragenset`
  ADD PRIMARY KEY (`IDSet`);

--
-- Indizes für die Tabelle `ist_in`
--
ALTER TABLE `ist_in`
  ADD PRIMARY KEY (`IDFrage`,`IDSet`),
  ADD KEY `IDSet` (`IDSet`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`IDKategorie`);

--
-- Indizes für die Tabelle `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`Benutzername`);

--
-- Indizes für die Tabelle `richtig`
--
ALTER TABLE `richtig`
  ADD PRIMARY KEY (`IDRichtig`),
  ADD KEY `IDFrage` (`IDFrage`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `frage`
--
ALTER TABLE `frage`
  MODIFY `IDFrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Benutzername`) REFERENCES `benutzer` (`Benutzername`);

--
-- Constraints der Tabelle `antwort`
--
ALTER TABLE `antwort`
  ADD CONSTRAINT `antwort_ibfk_1` FOREIGN KEY (`IDFrage`) REFERENCES `frage` (`IDFrage`);

--
-- Constraints der Tabelle `bearbeitet`
--
ALTER TABLE `bearbeitet`
  ADD CONSTRAINT `bearbeitet_ibfk_1` FOREIGN KEY (`Bentuzername`) REFERENCES `benutzer` (`Benutzername`),
  ADD CONSTRAINT `bearbeitet_ibfk_2` FOREIGN KEY (`IDSet`) REFERENCES `fragenset` (`IDSet`),
  ADD CONSTRAINT `bearbeitet_ibfk_3` FOREIGN KEY (`IDFalsch`) REFERENCES `falsch` (`IDFalsch`),
  ADD CONSTRAINT `bearbeitet_ibfk_4` FOREIGN KEY (`IDRichtig`) REFERENCES `richtig` (`IDRichtig`);

--
-- Constraints der Tabelle `falsch`
--
ALTER TABLE `falsch`
  ADD CONSTRAINT `falsch_ibfk_1` FOREIGN KEY (`IDFrage`) REFERENCES `frage` (`IDFrage`);

--
-- Constraints der Tabelle `frage`
--
ALTER TABLE `frage`
  ADD CONSTRAINT `frage_ibfk_1` FOREIGN KEY (`IDKategorie`) REFERENCES `kategorie` (`IDKategorie`),
  ADD CONSTRAINT `frage_ibfk_2` FOREIGN KEY (`Benutzername`) REFERENCES `benutzer` (`Benutzername`);

--
-- Constraints der Tabelle `ist_in`
--
ALTER TABLE `ist_in`
  ADD CONSTRAINT `ist_in_ibfk_1` FOREIGN KEY (`IDFrage`) REFERENCES `frage` (`IDFrage`),
  ADD CONSTRAINT `ist_in_ibfk_2` FOREIGN KEY (`IDSet`) REFERENCES `fragenset` (`IDSet`);

--
-- Constraints der Tabelle `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `moderator_ibfk_1` FOREIGN KEY (`Benutzername`) REFERENCES `benutzer` (`Benutzername`);

--
-- Constraints der Tabelle `richtig`
--
ALTER TABLE `richtig`
  ADD CONSTRAINT `richtig_ibfk_1` FOREIGN KEY (`IDFrage`) REFERENCES `frage` (`IDFrage`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;