-- --------------------------------------------------------
-- Host:                         141.47.76.150
-- Server-Version:               10.1.23-MariaDB-9+deb9u1 - Debian 9.0
-- Server-Betriebssystem:        debian-linux-gnu
-- HeidiSQL Version:             12.20.0.7320
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Adresse
CREATE TABLE IF NOT EXISTS `Adresse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Straße` text,
  `Hausnummer` int(11) DEFAULT NULL,
  `Postleitzahl` int(11) DEFAULT NULL,
  `Ortschaft` text,
  `Breitengrad` float DEFAULT NULL,
  `Laengengrad` float DEFAULT NULL,
  `DistanzzurStadt` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Adresse: ~11 rows (ungefähr)
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES
	(1, '2026-07-18 15:41:06', '2026-07-18 15:41:06', 'Tiefenbronner Str.', 65, 75175, 'Pforzheim', NULL, NULL, 2),
	(7, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Seestraße', 12, 78462, 'Konstanz', 47.6952, 9.1758, 1),
	(8, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Uferweg', 3, 88045, 'Friedrichshafen', 47.6549, 9.4795, 2),
	(9, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Königstraße', 45, 70173, 'Stuttgart', 48.7758, 9.1829, 1),
	(10, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Kaiserstraße', 18, 76133, 'Karlsruhe', 49.0069, 8.4037, 2),
	(11, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Kaiser-Joseph-Straße', 22, 79098, 'Freiburg im Breisgau', 47.999, 7.8421, 1),
	(12, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Hauptstraße', 60, 69117, 'Heidelberg', 49.3988, 8.6724, 1),
	(13, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Quadrat P7', 5, 68159, 'Mannheim', 49.4875, 8.466, 2),
	(14, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Neckargasse', 14, 72070, 'Tübingen', 48.5216, 9.0576, 1),
	(15, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Lichtentaler Allee', 8, 76530, 'Baden-Baden', 48.7606, 8.24, 2),
	(16, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Münsterplatz', 2, 89073, 'Ulm', 48.4011, 9.9876, 1);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Ausstattung
CREATE TABLE IF NOT EXISTS `Ausstattung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bezeichnung` text,
  `Kategorie` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Ausstattung: ~7 rows (ungefähr)
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES
	(1, '2026-07-18 15:37:56', '2026-07-18 16:48:24', 'Kostenloses WLAN', 1),
	(2, '2026-07-18 15:38:06', '2026-07-18 16:48:24', 'Kostenloser Parkplatz', 2),
	(3, '2026-07-18 15:38:13', '2026-07-18 16:48:24', 'Pool', 3),
	(4, '2026-07-18 15:38:21', '2026-07-18 16:48:24', 'Klimaanlage', 4),
	(5, '2026-07-18 15:38:27', '2026-07-18 16:48:24', 'Fruehstueck inklusive', 5),
	(6, '2026-07-18 15:38:33', '2026-07-18 16:48:24', 'Haustiere erlaubt', 6),
	(7, '2026-07-18 15:38:40', '2026-07-18 16:48:24', 'Fitnessstudio', 7);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.AusstattungskategorieT
CREATE TABLE IF NOT EXISTS `AusstattungskategorieT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.AusstattungskategorieT: ~7 rows (ungefähr)
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'WLAN', NULL),
	(2, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Parkplatz', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Pool', NULL),
	(4, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Klimaanlage', NULL),
	(5, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Fruehstueck', NULL),
	(6, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Haustiere erlaubt', NULL),
	(7, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Fitnessstudio', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Buchung
CREATE TABLE IF NOT EXISTS `Buchung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `AnzahlGaeste` int(11) DEFAULT NULL,
  `Gesamtpreis` float DEFAULT NULL,
  `Zahlungsart` int(11) DEFAULT NULL,
  `Zahlungsbetrag` float DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `_Hotelier` int(11) DEFAULT NULL,
  `_Kunde` int(11) DEFAULT NULL,
  `_Zimmertyp` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`),
  KEY `_Hotelier` (`_Hotelier`),
  KEY `_Kunde` (`_Kunde`),
  KEY `_Zimmertyp` (`_Zimmertyp`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Buchung: ~6 rows (ungefähr)
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES
	(1, '2026-07-18 16:30:17', '2026-07-18 16:30:17', '2026-07-18', '2026-07-19', 2, 500, 4, 500, 1, 100, 100, 100, 1, 2, 1),
	(4, '2026-07-18 17:01:31', '2026-07-18 17:01:31', '2026-08-05', '2026-08-08', 2, 357, 1, 357, 2, NULL, NULL, NULL, 8, 5, 12),
	(5, '2026-07-18 17:01:31', '2026-07-18 17:01:31', '2026-08-15', '2026-08-17', 2, 260, 4, 260, 1, NULL, NULL, NULL, 9, 6, 16),
	(6, '2026-07-18 17:01:31', '2026-07-18 17:01:31', '2026-09-01', '2026-09-03', 2, 498, 2, 498, 2, NULL, NULL, NULL, 10, 7, 22),
	(7, '2026-07-18 17:01:31', '2026-07-18 17:01:31', '2026-09-20', '2026-09-22', 3, 120, 3, 120, 1, NULL, NULL, NULL, 11, 8, 30),
	(8, '2026-07-20 09:04:46', '2026-07-20 09:04:46', '2026-07-20', '2026-07-21', 1, 500, 4, 500, 1, NULL, NULL, NULL, 1, 9, 1);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Favoriten
CREATE TABLE IF NOT EXISTS `Favoriten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `task` text,
  `task_label` text,
  `datensatz_id` int(11) DEFAULT NULL,
  `User_uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Favoriten: ~0 rows (ungefähr)

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.GruppeT
CREATE TABLE IF NOT EXISTS `GruppeT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.GruppeT: ~4 rows (ungefähr)
INSERT INTO `GruppeT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Kunde', NULL),
	(2, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Hotelier', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Superadmin', NULL),
	(4, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Administrator', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Hotelier
CREATE TABLE IF NOT EXISTS `Hotelier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name` text,
  `Vorname` text,
  `Email` text,
  `Passwort` text,
  `_User_uid` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Hotelier: ~7 rows (ungefähr)
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`, `_User_uid`) VALUES
	(1, '2026-07-18 15:41:36', '2026-07-18 19:03:33', 'HS', 'Pforzheim', 'info@hs-pforzheim.de', '$2y$10$ren7i8tzOq2yZab/0rV/tuhzfcOAgcBf5LtfP9FeJ3jl5yjZhpq7W', 102),
	(8, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Bauer', 'Sabine', 'bauer@bodensee-hotels.de', '$2y$10$abcdefghijklmnopqrstuv', NULL),
	(9, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Fischer', 'Thomas', 'fischer@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv', NULL),
	(10, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Wagner', 'Nicole', 'wagner@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv', NULL),
	(11, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 'Hoffmann', 'Stefan', 'hoffmann@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv', NULL),
	(12, '2026-07-18 18:56:52', '2026-07-18 18:56:52', '', '', '', '', NULL),
	(13, '2026-07-18 18:57:34', '2026-07-18 18:57:34', 'Damjan', 'Besarovic', 'besarovi@hs-pforzheim.de', '$2y$10$LhYgrtGn6ISBqQc.yL30ROxX34PwYBNt7jq59Fwhh9YsFoel0qzcm', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Kunde
CREATE TABLE IF NOT EXISTS `Kunde` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Nachname` text,
  `Vorname` text,
  `Email` text,
  `Geburtsdatum` date DEFAULT NULL,
  `Personalausweisnrummer` text,
  `_User_uid` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`),
  KEY `_User_uid` (`_User_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Kunde: ~7 rows (ungefähr)
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES
	(1, '2026-07-18 15:36:39', '2026-07-18 15:36:39', 'Test', '123', 'test@mail.com', '2004-02-12', 'test', 101),
	(2, '2026-07-18 16:30:17', '2026-07-18 16:30:17', 'Besarovic', 'Damjan', 'besarovic@gmail.com', '2004-02-12', '123455', NULL),
	(5, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Mustermann', 'Erika', 'erika.mustermann@test-mail.de', '1990-04-12', 'TEST-AUSWEIS-0001', NULL),
	(6, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Beispiel', 'Max', 'max.beispiel@test-mail.de', '1985-11-02', 'TEST-AUSWEIS-0002', NULL),
	(7, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Probe', 'Julia', 'julia.probe@test-mail.de', '1993-06-20', 'TEST-AUSWEIS-0003', NULL),
	(8, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Platzhalter', 'Tim', 'tim.platzhalter@test-mail.de', '1988-02-15', 'TEST-AUSWEIS-0004', NULL),
	(9, '2026-07-20 09:04:45', '2026-07-20 09:04:45', 'Buchung', 'Test', 'test@example.com', '1990-01-01', 'TEST-AUSWEIS-999', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Mitgast
CREATE TABLE IF NOT EXISTS `Mitgast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Vorname` text,
  `Nachname` text,
  `Geburtsdatum` date DEFAULT NULL,
  `Personalausweisnr` text,
  `_Buchung` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`),
  KEY `_Buchung` (`_Buchung`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Mitgast: ~6 rows (ungefähr)
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES
	(1, '2026-07-18 16:30:17', '2026-07-18 16:30:17', 'Lea', 'Blesl', '2003-08-01', '1234', 1),
	(4, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Test', 'Mitgast4_1', '1995-01-01', 'TEST-AUSWEIS-MG41', 4),
	(5, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Test', 'Mitgast5_1', '1995-01-01', 'TEST-AUSWEIS-MG51', 5),
	(6, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Test', 'Mitgast6_1', '1995-01-01', 'TEST-AUSWEIS-MG61', 6),
	(7, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Test', 'Mitgast7_1', '1995-01-01', 'TEST-AUSWEIS-MG71', 7),
	(8, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 'Test', 'Mitgast7_2', '1995-01-01', 'TEST-AUSWEIS-MG72', 7);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.StatusT
CREATE TABLE IF NOT EXISTS `StatusT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.StatusT: ~3 rows (ungefähr)
INSERT INTO `StatusT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'offen', NULL),
	(2, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'bezahlt', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'ungültig', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Unterkunft
CREATE TABLE IF NOT EXISTS `Unterkunft` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Unterkunftsart` int(11) DEFAULT NULL,
  `Name` text,
  `Bild` text,
  `Beschreibung` text,
  `Bewertung` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `_Adresse` int(11) DEFAULT NULL,
  `_Hotelier` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`),
  KEY `_Adresse` (`_Adresse`),
  KEY `_Hotelier` (`_Hotelier`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Unterkunft: ~11 rows (ungefähr)
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES
	(1, '2026-07-18 15:42:52', '2026-07-18 17:40:07', 2, 'HS Pforzheim Junior Suite', 'unterkunft_pforzheim.jpg', 'Gehobenes Zimmer in Pc Pool.', 10, 100, 100, 100, 1, 1),
	(7, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 1, 'Seehotel Konstanz', 'unterkunft_konstanz.jpg', 'Direkt am Bodensee gelegenes Hotel mit Seeblick.', 5, NULL, NULL, NULL, 7, 8),
	(8, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 3, 'Zeppelin Resort Friedrichshafen', 'unterkunft_friedrichshafen.jpg', 'Resort am Bodensee mit Blick auf die Alpen.', 4, NULL, NULL, NULL, 8, 8),
	(9, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 1, 'Stuttgart City Suites', 'unterkunft_stuttgart.jpg', 'Moderne Suiten mitten in der Stuttgarter Innenstadt.', 4, NULL, NULL, NULL, 9, 9),
	(10, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 4, 'Karlsruher Schlosshotel', 'unterkunft_karlsruhe.jpg', 'Elegantes Hotel nahe dem Karlsruher Schloss.', 5, NULL, NULL, NULL, 10, 9),
	(11, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 6, 'Freiburger Altstadt Pension', 'unterkunft_freiburg.jpg', 'Gemütliche Pension in der Freiburger Altstadt.', 4, NULL, NULL, NULL, 11, 10),
	(12, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 1, 'Heidelberg Schlossblick', 'unterkunft_heidelberg.jpg', 'Hotel mit Blick auf das Heidelberger Schloss.', 5, NULL, NULL, NULL, 12, 10),
	(13, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 2, 'Mannheim Quadrate Apartments', 'unterkunft_mannheim.jpg', 'Ferienwohnungen in den historischen Mannheimer Quadraten.', 4, NULL, NULL, NULL, 13, 10),
	(14, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 7, 'Tübinger Neckar Chalet', 'unterkunft_tuebingen.jpg', 'Charmantes Chalet direkt am Neckar.', 4, NULL, NULL, NULL, 14, 11),
	(15, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 1, 'Baden-Baden Kurhotel', 'unterkunft_badenbaden.jpg', 'Traditionsreiches Kurhotel im Kurviertel.', 5, NULL, NULL, NULL, 15, 11),
	(16, '2026-07-18 17:01:30', '2026-07-18 17:40:07', 6, 'Ulmer Münster Herberge', 'unterkunft_ulm.jpg', 'Herberge direkt am Ulmer Münster.', 3, NULL, NULL, NULL, 16, 11);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Unterkunft_Ausstattung
CREATE TABLE IF NOT EXISTS `Unterkunft_Ausstattung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `_Unterkunft_a` int(11) DEFAULT NULL,
  `_Ausstattung_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_Unterkunft_a` (`_Unterkunft_a`),
  KEY `_Ausstattung_b` (`_Ausstattung_b`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Unterkunft_Ausstattung: ~34 rows (ungefähr)
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES
	(20, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 1),
	(21, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 3),
	(22, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 5),
	(23, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 7, 1),
	(24, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 7, 3),
	(25, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 7, 5),
	(26, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 7, 6),
	(27, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 8, 1),
	(28, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 8, 2),
	(29, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 8, 3),
	(30, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 9, 1),
	(31, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 9, 2),
	(32, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 9, 4),
	(33, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 10, 1),
	(34, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 10, 2),
	(35, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 10, 4),
	(36, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 10, 7),
	(37, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 11, 1),
	(38, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 11, 5),
	(39, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 12, 1),
	(40, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 12, 4),
	(41, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 12, 5),
	(42, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 13, 1),
	(43, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 13, 2),
	(44, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 14, 1),
	(45, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 14, 6),
	(46, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 15, 1),
	(47, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 15, 3),
	(48, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 15, 4),
	(49, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 15, 5),
	(50, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 15, 7),
	(51, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 16, 1),
	(52, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 16, 5),
	(53, '2026-07-18 17:01:31', '2026-07-18 17:01:31', 16, 6);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.UnterkunftsartT
CREATE TABLE IF NOT EXISTS `UnterkunftsartT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.UnterkunftsartT: ~7 rows (ungefähr)
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Hotel', NULL),
	(2, '2026-05-19 11:15:31', '2026-07-20 20:47:49', 'Ferienwohnung', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Resort', NULL),
	(4, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Villa', NULL),
	(5, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Ferienhaus', NULL),
	(6, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Pension', NULL),
	(7, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Chalet', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.User
CREATE TABLE IF NOT EXISTS `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Passwort` text,
  `Gruppe` int(11) DEFAULT NULL,
  `Kennung` text,
  `roleid` text,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.User: ~3 rows (ungefähr)
INSERT INTO `User` (`id`, `c_ts`, `m_ts`, `Passwort`, `Gruppe`, `Kennung`, `roleid`) VALUES
	(100, '2026-05-19 11:15:30', '2026-07-18 19:19:21', '21232f297a57a5a743894a0e4a801fc3', 4, 'admin', ''),
	(101, '2026-07-18 15:36:16', '2026-07-18 15:36:46', '098f6bcd4621d373cade4e832627b4f6', 1, 'Test', '1'),
	(102, '2026-07-18 18:55:34', '2026-07-18 18:55:34', '7f7599f26af95a00413895cc78a7d8bc', 2, 'hotelier1', '1');

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Visits
CREATE TABLE IF NOT EXISTS `Visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `month` text,
  `visits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Visits: ~12 rows (ungefähr)
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES
	(1, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'Januar', 0),
	(2, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'Februar', 0),
	(3, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'März', 0),
	(4, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'April', 0),
	(5, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'Mai', 0),
	(6, '2026-05-19 11:15:30', '2026-06-09 09:57:48', 'Juni', 2),
	(7, '2026-05-19 11:15:30', '2026-07-20 14:58:20', 'Juli', 23),
	(8, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'August', 0),
	(9, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'September', 0),
	(10, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'Oktober', 0),
	(11, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'November', 0),
	(12, '2026-05-19 11:15:30', '2026-05-19 11:15:30', 'Dezember', 0);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.ZahlungsartT
CREATE TABLE IF NOT EXISTS `ZahlungsartT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.ZahlungsartT: ~4 rows (ungefähr)
INSERT INTO `ZahlungsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Kreditkarte', NULL),
	(2, '2026-05-19 11:15:31', '2026-07-20 09:18:42', 'Lastschrift', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Rechnung', NULL),
	(4, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Bar', NULL);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.Zimmertyp
CREATE TABLE IF NOT EXISTS `Zimmertyp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bezeichnung` int(11) DEFAULT NULL,
  `Anzahltbett` int(11) DEFAULT NULL,
  `ArtBett` text,
  `Preis` float DEFAULT NULL,
  `Aktionspreis` float DEFAULT NULL,
  `Aktionaktiv` int(11) DEFAULT NULL,
  `Bild` text,
  `AnzahlVerfuegbarkeit` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `_Unterkunft` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`),
  KEY `_Unterkunft` (`_Unterkunft`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.Zimmertyp: ~21 rows (ungefähr)
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES
	(1, '2026-07-18 15:44:44', '2026-07-18 16:33:21', 4, 1, 'Doppelbett', 500, 450, 0, NULL, 10, 100, 100, 100, 1),
	(12, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 2, 2, 'Doppelbett, Seeblick', 140, 119, 1, NULL, 5, NULL, NULL, NULL, 7),
	(13, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 4, 2, 'Boxspringbett', 240, NULL, 0, NULL, 2, NULL, NULL, NULL, 7),
	(14, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 5, 4, 'Doppelbett + Schlafsofa', 170, NULL, 0, NULL, 4, NULL, NULL, NULL, 8),
	(15, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 1, 'Einzelbett', 80, 65, 1, NULL, 6, NULL, NULL, NULL, 8),
	(16, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 2, 2, 'Doppelbett', 130, NULL, 0, NULL, 8, NULL, NULL, NULL, 9),
	(17, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 4, 3, 'Doppelbett + Sofa', 210, 180, 1, NULL, 2, NULL, NULL, NULL, 9),
	(18, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 4, 2, 'Himmelbett', 260, NULL, 0, NULL, 3, NULL, NULL, NULL, 10),
	(19, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 1, 'Einzelbett', 95, NULL, 0, NULL, 4, NULL, NULL, NULL, 10),
	(20, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 6, 6, '3x Etagenbett', 85, 70, 1, NULL, 4, NULL, NULL, NULL, 11),
	(21, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 3, 4, '2x Doppelbett', 150, NULL, 0, NULL, 3, NULL, NULL, NULL, 11),
	(22, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 4, 2, 'Boxspringbett, Schlossblick', 290, 249, 1, NULL, 2, NULL, NULL, NULL, 12),
	(23, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 2, 2, 'Doppelbett', 155, NULL, 0, NULL, 5, NULL, NULL, NULL, 12),
	(24, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 5, 4, 'Doppelbett + Schlafsofa', 165, NULL, 0, NULL, 3, NULL, NULL, NULL, 13),
	(25, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 1, 'Einzelbett', 75, NULL, 0, NULL, 5, NULL, NULL, NULL, 13),
	(26, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 7, 2, 'Himmelbett', 320, 275, 1, NULL, 1, NULL, NULL, NULL, 14),
	(27, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 2, 2, 'Doppelbett', 140, NULL, 0, NULL, 4, NULL, NULL, NULL, 14),
	(28, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 4, 2, 'Boxspringbett, Kurpark-Blick', 310, NULL, 0, NULL, 3, NULL, NULL, NULL, 15),
	(29, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 1, 1, 'Einzelbett', 110, 89, 1, NULL, 3, NULL, NULL, NULL, 15),
	(30, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 6, 6, 'Mehrbett-Zimmer', 60, NULL, 0, NULL, 6, NULL, NULL, NULL, 16),
	(31, '2026-07-18 17:01:30', '2026-07-18 17:01:30', 2, 2, 'Doppelbett', 95, NULL, 0, NULL, 4, NULL, NULL, NULL, 16);

-- Exportiere Struktur von Tabelle SoseDinoPROJEKT.ZimmertypT
CREATE TABLE IF NOT EXISTS `ZimmertypT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle SoseDinoPROJEKT.ZimmertypT: ~7 rows (ungefähr)
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES
	(1, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Einzelzimmer', NULL),
	(2, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Doppelzimmer', NULL),
	(3, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Familienzimmer', NULL),
	(4, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Suite', NULL),
	(5, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Apartment', NULL),
	(6, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Mehrbettzimmer', NULL),
	(7, '2026-05-19 11:15:31', '2026-05-19 11:15:31', 'Penthouse', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
