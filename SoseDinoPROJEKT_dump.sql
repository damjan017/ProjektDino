-- Wingbooking (ProjektDino) - Datenbank-Dump
-- Erstellt: 2026-07-18T19:40:29.881821
-- Datenbank: SoseDinoPROJEKT
-- Thema Testdaten: Baden-Wuerttemberg (Pforzheim, Bodensee, Stuttgart, Karlsruhe, ...)
-- Unterkuenfte haben jetzt echte, lizenzfreie Fotos (siehe images/BILDNACHWEIS.txt)

SET FOREIGN_KEY_CHECKS=0;
SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Adresse`;
CREATE TABLE `Adresse` (
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

-- Daten fuer Tabelle Adresse (11 Zeilen)
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (1, '2026-07-18 17:41:06', '2026-07-18 17:41:06', 'Tiefenbronner Str.', 65, 75175, 'Pforzheim', NULL, NULL, 2);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (7, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Seestraße', 12, 78462, 'Konstanz', 47.6952, 9.1758, 1);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (8, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Uferweg', 3, 88045, 'Friedrichshafen', 47.6549, 9.4795, 2);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (9, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Königstraße', 45, 70173, 'Stuttgart', 48.7758, 9.1829, 1);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (10, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Kaiserstraße', 18, 76133, 'Karlsruhe', 49.0069, 8.4037, 2);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (11, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Kaiser-Joseph-Straße', 22, 79098, 'Freiburg im Breisgau', 47.999, 7.8421, 1);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (12, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Hauptstraße', 60, 69117, 'Heidelberg', 49.3988, 8.6724, 1);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (13, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Quadrat P7', 5, 68159, 'Mannheim', 49.4875, 8.466, 2);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (14, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Neckargasse', 14, 72070, 'Tübingen', 48.5216, 9.0576, 1);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (15, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Lichtentaler Allee', 8, 76530, 'Baden-Baden', 48.7606, 8.24, 2);
INSERT INTO `Adresse` (`id`, `c_ts`, `m_ts`, `Straße`, `Hausnummer`, `Postleitzahl`, `Ortschaft`, `Breitengrad`, `Laengengrad`, `DistanzzurStadt`) VALUES (16, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Münsterplatz', 2, 89073, 'Ulm', 48.4011, 9.9876, 1);

DROP TABLE IF EXISTS `Ausstattung`;
CREATE TABLE `Ausstattung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bezeichnung` text,
  `Kategorie` int(11) DEFAULT NULL,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Ausstattung (7 Zeilen)
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (1, '2026-07-18 17:37:56', '2026-07-18 18:48:24', 'Kostenloses WLAN', 1);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (2, '2026-07-18 17:38:06', '2026-07-18 18:48:24', 'Kostenloser Parkplatz', 2);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (3, '2026-07-18 17:38:13', '2026-07-18 18:48:24', 'Pool', 3);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (4, '2026-07-18 17:38:21', '2026-07-18 18:48:24', 'Klimaanlage', 4);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (5, '2026-07-18 17:38:27', '2026-07-18 18:48:24', 'Fruehstueck inklusive', 5);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (6, '2026-07-18 17:38:33', '2026-07-18 18:48:24', 'Haustiere erlaubt', 6);
INSERT INTO `Ausstattung` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Kategorie`) VALUES (7, '2026-07-18 17:38:40', '2026-07-18 18:48:24', 'Fitnessstudio', 7);

DROP TABLE IF EXISTS `AusstattungskategorieT`;
CREATE TABLE `AusstattungskategorieT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle AusstattungskategorieT (7 Zeilen)
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'WLAN', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Parkplatz', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Pool', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (4, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Klimaanlage', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (5, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Fruehstueck', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (6, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Haustiere erlaubt', NULL);
INSERT INTO `AusstattungskategorieT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (7, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Fitnessstudio', NULL);

DROP TABLE IF EXISTS `Buchung`;
CREATE TABLE `Buchung` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Buchung (5 Zeilen)
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES (1, '2026-07-18 18:30:17', '2026-07-18 18:30:17', '2026-07-18', '2026-07-19', 2, 500.0, 4, 500.0, 1, 100, 100, 100, 1, 2, 1);
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES (4, '2026-07-18 19:01:31', '2026-07-18 19:01:31', '2026-08-05', '2026-08-08', 2, 357.0, 1, 357.0, 2, NULL, NULL, NULL, 8, 5, 12);
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES (5, '2026-07-18 19:01:31', '2026-07-18 19:01:31', '2026-08-15', '2026-08-17', 2, 260.0, 4, 260.0, 1, NULL, NULL, NULL, 9, 6, 16);
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES (6, '2026-07-18 19:01:31', '2026-07-18 19:01:31', '2026-09-01', '2026-09-03', 2, 498.0, 2, 498.0, 2, NULL, NULL, NULL, 10, 7, 22);
INSERT INTO `Buchung` (`id`, `c_ts`, `m_ts`, `checkin`, `checkout`, `AnzahlGaeste`, `Gesamtpreis`, `Zahlungsart`, `Zahlungsbetrag`, `Status`, `owner_id`, `created_id`, `modified_id`, `_Hotelier`, `_Kunde`, `_Zimmertyp`) VALUES (7, '2026-07-18 19:01:31', '2026-07-18 19:01:31', '2026-09-20', '2026-09-22', 3, 120.0, 3, 120.0, 1, NULL, NULL, NULL, 11, 8, 30);

DROP TABLE IF EXISTS `Favoriten`;
CREATE TABLE `Favoriten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `task` text,
  `task_label` text,
  `datensatz_id` int(11) DEFAULT NULL,
  `User_uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `GruppeT`;
CREATE TABLE `GruppeT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle GruppeT (4 Zeilen)
INSERT INTO `GruppeT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Kunde', NULL);
INSERT INTO `GruppeT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Hotelier', NULL);
INSERT INTO `GruppeT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Superadmin', NULL);
INSERT INTO `GruppeT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (4, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Administrator', NULL);

DROP TABLE IF EXISTS `Hotelier`;
CREATE TABLE `Hotelier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name` text,
  `Vorname` text,
  `Email` text,
  `Passwort` text,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Hotelier (5 Zeilen)
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`) VALUES (1, '2026-07-18 17:41:36', '2026-07-18 17:41:36', 'HS', 'Pforzheim', 'info@hs-pforzheim.de', '$2y$10$ren7i8tzOq2yZab/0rV/tuhzfcOAgcBf5LtfP9FeJ3jl5yjZhpq7W');
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`) VALUES (8, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Bauer', 'Sabine', 'bauer@bodensee-hotels.de', '$2y$10$abcdefghijklmnopqrstuv');
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`) VALUES (9, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Fischer', 'Thomas', 'fischer@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv');
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`) VALUES (10, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Wagner', 'Nicole', 'wagner@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv');
INSERT INTO `Hotelier` (`id`, `c_ts`, `m_ts`, `Name`, `Vorname`, `Email`, `Passwort`) VALUES (11, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 'Hoffmann', 'Stefan', 'hoffmann@bw-hotels.de', '$2y$10$abcdefghijklmnopqrstuv');

DROP TABLE IF EXISTS `Kunde`;
CREATE TABLE `Kunde` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Kunde (6 Zeilen)
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (1, '2026-07-18 17:36:39', '2026-07-18 17:36:39', 'Test', '123', 'test@mail.com', '2004-02-12', 'test', 101);
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (2, '2026-07-18 18:30:17', '2026-07-18 18:30:17', 'Besarovic', 'Damjan', 'besarovic@gmail.com', '2004-02-12', '123455', NULL);
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (5, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Mustermann', 'Erika', 'erika.mustermann@test-mail.de', '1990-04-12', 'TEST-AUSWEIS-0001', NULL);
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (6, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Beispiel', 'Max', 'max.beispiel@test-mail.de', '1985-11-02', 'TEST-AUSWEIS-0002', NULL);
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (7, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Probe', 'Julia', 'julia.probe@test-mail.de', '1993-06-20', 'TEST-AUSWEIS-0003', NULL);
INSERT INTO `Kunde` (`id`, `c_ts`, `m_ts`, `Nachname`, `Vorname`, `Email`, `Geburtsdatum`, `Personalausweisnrummer`, `_User_uid`) VALUES (8, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Platzhalter', 'Tim', 'tim.platzhalter@test-mail.de', '1988-02-15', 'TEST-AUSWEIS-0004', NULL);

DROP TABLE IF EXISTS `Mitgast`;
CREATE TABLE `Mitgast` (
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

-- Daten fuer Tabelle Mitgast (6 Zeilen)
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (1, '2026-07-18 18:30:17', '2026-07-18 18:30:17', 'Lea', 'Blesl', '2003-08-01', '1234', 1);
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (4, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Test', 'Mitgast4_1', '1995-01-01', 'TEST-AUSWEIS-MG41', 4);
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (5, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Test', 'Mitgast5_1', '1995-01-01', 'TEST-AUSWEIS-MG51', 5);
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (6, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Test', 'Mitgast6_1', '1995-01-01', 'TEST-AUSWEIS-MG61', 6);
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (7, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Test', 'Mitgast7_1', '1995-01-01', 'TEST-AUSWEIS-MG71', 7);
INSERT INTO `Mitgast` (`id`, `c_ts`, `m_ts`, `Vorname`, `Nachname`, `Geburtsdatum`, `Personalausweisnr`, `_Buchung`) VALUES (8, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 'Test', 'Mitgast7_2', '1995-01-01', 'TEST-AUSWEIS-MG72', 7);

DROP TABLE IF EXISTS `StatusT`;
CREATE TABLE `StatusT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle StatusT (3 Zeilen)
INSERT INTO `StatusT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'offen', NULL);
INSERT INTO `StatusT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'bezahlt', NULL);
INSERT INTO `StatusT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'ungültig', NULL);

DROP TABLE IF EXISTS `Unterkunft`;
CREATE TABLE `Unterkunft` (
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

-- Daten fuer Tabelle Unterkunft (11 Zeilen)
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (1, '2026-07-18 17:42:52', '2026-07-18 19:40:07', 2, 'HS Pforzheim Junior Suite', 'unterkunft_pforzheim.jpg', 'Gehobenes Zimmer in Pc Pool.', 10, 100, 100, 100, 1, 1);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (7, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 1, 'Seehotel Konstanz', 'unterkunft_konstanz.jpg', 'Direkt am Bodensee gelegenes Hotel mit Seeblick.', 5, NULL, NULL, NULL, 7, 8);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (8, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 3, 'Zeppelin Resort Friedrichshafen', 'unterkunft_friedrichshafen.jpg', 'Resort am Bodensee mit Blick auf die Alpen.', 4, NULL, NULL, NULL, 8, 8);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (9, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 1, 'Stuttgart City Suites', 'unterkunft_stuttgart.jpg', 'Moderne Suiten mitten in der Stuttgarter Innenstadt.', 4, NULL, NULL, NULL, 9, 9);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (10, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 4, 'Karlsruher Schlosshotel', 'unterkunft_karlsruhe.jpg', 'Elegantes Hotel nahe dem Karlsruher Schloss.', 5, NULL, NULL, NULL, 10, 9);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (11, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 6, 'Freiburger Altstadt Pension', 'unterkunft_freiburg.jpg', 'Gemütliche Pension in der Freiburger Altstadt.', 4, NULL, NULL, NULL, 11, 10);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (12, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 1, 'Heidelberg Schlossblick', 'unterkunft_heidelberg.jpg', 'Hotel mit Blick auf das Heidelberger Schloss.', 5, NULL, NULL, NULL, 12, 10);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (13, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 2, 'Mannheim Quadrate Apartments', 'unterkunft_mannheim.jpg', 'Ferienwohnungen in den historischen Mannheimer Quadraten.', 4, NULL, NULL, NULL, 13, 10);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (14, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 7, 'Tübinger Neckar Chalet', 'unterkunft_tuebingen.jpg', 'Charmantes Chalet direkt am Neckar.', 4, NULL, NULL, NULL, 14, 11);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (15, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 1, 'Baden-Baden Kurhotel', 'unterkunft_badenbaden.jpg', 'Traditionsreiches Kurhotel im Kurviertel.', 5, NULL, NULL, NULL, 15, 11);
INSERT INTO `Unterkunft` (`id`, `c_ts`, `m_ts`, `Unterkunftsart`, `Name`, `Bild`, `Beschreibung`, `Bewertung`, `owner_id`, `created_id`, `modified_id`, `_Adresse`, `_Hotelier`) VALUES (16, '2026-07-18 19:01:30', '2026-07-18 19:40:07', 6, 'Ulmer Münster Herberge', 'unterkunft_ulm.jpg', 'Herberge direkt am Ulmer Münster.', 3, NULL, NULL, NULL, 16, 11);

DROP TABLE IF EXISTS `Unterkunft_Ausstattung`;
CREATE TABLE `Unterkunft_Ausstattung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `_Unterkunft_a` int(11) DEFAULT NULL,
  `_Ausstattung_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_Unterkunft_a` (`_Unterkunft_a`),
  KEY `_Ausstattung_b` (`_Ausstattung_b`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Unterkunft_Ausstattung (34 Zeilen)
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (20, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (21, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 3);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (22, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (23, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 7, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (24, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 7, 3);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (25, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 7, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (26, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 7, 6);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (27, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 8, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (28, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 8, 2);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (29, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 8, 3);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (30, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 9, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (31, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 9, 2);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (32, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 9, 4);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (33, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 10, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (34, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 10, 2);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (35, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 10, 4);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (36, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 10, 7);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (37, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 11, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (38, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 11, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (39, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 12, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (40, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 12, 4);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (41, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 12, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (42, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 13, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (43, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 13, 2);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (44, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 14, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (45, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 14, 6);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (46, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 15, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (47, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 15, 3);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (48, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 15, 4);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (49, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 15, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (50, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 15, 7);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (51, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 16, 1);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (52, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 16, 5);
INSERT INTO `Unterkunft_Ausstattung` (`id`, `c_ts`, `m_ts`, `_Unterkunft_a`, `_Ausstattung_b`) VALUES (53, '2026-07-18 19:01:31', '2026-07-18 19:01:31', 16, 6);

DROP TABLE IF EXISTS `UnterkunftsartT`;
CREATE TABLE `UnterkunftsartT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle UnterkunftsartT (7 Zeilen)
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Hotel', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Ferinewohnung', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Resort', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (4, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Villa', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (5, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Ferienhaus', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (6, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Pension', NULL);
INSERT INTO `UnterkunftsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (7, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Chalet', NULL);

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Passwort` text,
  `Gruppe` int(11) DEFAULT NULL,
  `Kennung` text,
  `roleid` text,
  UNIQUE KEY `idx0` (`id`),
  KEY `idx1` (`m_ts`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle User (2 Zeilen)
INSERT INTO `User` (`id`, `c_ts`, `m_ts`, `Passwort`, `Gruppe`, `Kennung`, `roleid`) VALUES (100, '2026-05-19 13:15:30', '2026-05-19 13:15:30', '21232f297a57a5a743894a0e4a801fc3', 4, 'admin', '');
INSERT INTO `User` (`id`, `c_ts`, `m_ts`, `Passwort`, `Gruppe`, `Kennung`, `roleid`) VALUES (101, '2026-07-18 17:36:16', '2026-07-18 17:36:46', '098f6bcd4621d373cade4e832627b4f6', 1, 'Test', '1');

DROP TABLE IF EXISTS `Visits`;
CREATE TABLE `Visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `month` text,
  `visits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle Visits (12 Zeilen)
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (1, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'Januar', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (2, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'Februar', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (3, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'März', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (4, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'April', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (5, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'Mai', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (6, '2026-05-19 13:15:30', '2026-06-09 11:57:48', 'Juni', 2);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (7, '2026-05-19 13:15:30', '2026-07-18 17:30:30', 'Juli', 5);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (8, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'August', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (9, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'September', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (10, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'Oktober', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (11, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'November', 0);
INSERT INTO `Visits` (`id`, `c_ts`, `m_ts`, `month`, `visits`) VALUES (12, '2026-05-19 13:15:30', '2026-05-19 13:15:30', 'Dezember', 0);

DROP TABLE IF EXISTS `ZahlungsartT`;
CREATE TABLE `ZahlungsartT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle ZahlungsartT (4 Zeilen)
INSERT INTO `ZahlungsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Kreditkarte', NULL);
INSERT INTO `ZahlungsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'PayPal', NULL);
INSERT INTO `ZahlungsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Rechnung', NULL);
INSERT INTO `ZahlungsartT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (4, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Bar', NULL);

DROP TABLE IF EXISTS `Zimmertyp`;
CREATE TABLE `Zimmertyp` (
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

-- Daten fuer Tabelle Zimmertyp (21 Zeilen)
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (1, '2026-07-18 17:44:44', '2026-07-18 18:33:21', 4, 1, 'Doppelbett', 500.0, 450.0, 0, NULL, 10, 100, 100, 100, 1);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (12, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 2, 2, 'Doppelbett, Seeblick', 140.0, 119.0, 1, NULL, 5, NULL, NULL, NULL, 7);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (13, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 4, 2, 'Boxspringbett', 240.0, NULL, 0, NULL, 2, NULL, NULL, NULL, 7);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (14, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 5, 4, 'Doppelbett + Schlafsofa', 170.0, NULL, 0, NULL, 4, NULL, NULL, NULL, 8);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (15, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 1, 'Einzelbett', 80.0, 65.0, 1, NULL, 6, NULL, NULL, NULL, 8);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (16, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 2, 2, 'Doppelbett', 130.0, NULL, 0, NULL, 8, NULL, NULL, NULL, 9);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (17, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 4, 3, 'Doppelbett + Sofa', 210.0, 180.0, 1, NULL, 2, NULL, NULL, NULL, 9);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (18, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 4, 2, 'Himmelbett', 260.0, NULL, 0, NULL, 3, NULL, NULL, NULL, 10);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (19, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 1, 'Einzelbett', 95.0, NULL, 0, NULL, 4, NULL, NULL, NULL, 10);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (20, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 6, 6, '3x Etagenbett', 85.0, 70.0, 1, NULL, 4, NULL, NULL, NULL, 11);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (21, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 3, 4, '2x Doppelbett', 150.0, NULL, 0, NULL, 3, NULL, NULL, NULL, 11);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (22, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 4, 2, 'Boxspringbett, Schlossblick', 290.0, 249.0, 1, NULL, 2, NULL, NULL, NULL, 12);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (23, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 2, 2, 'Doppelbett', 155.0, NULL, 0, NULL, 5, NULL, NULL, NULL, 12);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (24, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 5, 4, 'Doppelbett + Schlafsofa', 165.0, NULL, 0, NULL, 3, NULL, NULL, NULL, 13);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (25, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 1, 'Einzelbett', 75.0, NULL, 0, NULL, 5, NULL, NULL, NULL, 13);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (26, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 7, 2, 'Himmelbett', 320.0, 275.0, 1, NULL, 1, NULL, NULL, NULL, 14);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (27, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 2, 2, 'Doppelbett', 140.0, NULL, 0, NULL, 4, NULL, NULL, NULL, 14);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (28, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 4, 2, 'Boxspringbett, Kurpark-Blick', 310.0, NULL, 0, NULL, 3, NULL, NULL, NULL, 15);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (29, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 1, 1, 'Einzelbett', 110.0, 89.0, 1, NULL, 3, NULL, NULL, NULL, 15);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (30, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 6, 6, 'Mehrbett-Zimmer', 60.0, NULL, 0, NULL, 6, NULL, NULL, NULL, 16);
INSERT INTO `Zimmertyp` (`id`, `c_ts`, `m_ts`, `Bezeichnung`, `Anzahltbett`, `ArtBett`, `Preis`, `Aktionspreis`, `Aktionaktiv`, `Bild`, `AnzahlVerfuegbarkeit`, `owner_id`, `created_id`, `modified_id`, `_Unterkunft`) VALUES (31, '2026-07-18 19:01:30', '2026-07-18 19:01:30', 2, 2, 'Doppelbett', 95.0, NULL, 0, NULL, 4, NULL, NULL, NULL, 16);

DROP TABLE IF EXISTS `ZimmertypT`;
CREATE TABLE `ZimmertypT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `literal` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Daten fuer Tabelle ZimmertypT (7 Zeilen)
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (1, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Einzelzimmer', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (2, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Doppelzimmer', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (3, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Familienzimmer', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (4, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Suite', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (5, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Apartment', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (6, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Mehrbettzimmer', NULL);
INSERT INTO `ZimmertypT` (`id`, `c_ts`, `m_ts`, `literal`, `sort`) VALUES (7, '2026-05-19 13:15:31', '2026-05-19 13:15:31', 'Penthouse', NULL);

SET FOREIGN_KEY_CHECKS=1;