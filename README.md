# Wingbooking

Booking.com-ähnliche Webanwendung für das Modul Internet Technologies, SoSe26 (Prof. Nippa). Zwei Ansichten: Hotelier-Verwaltung und Gast-Buchung, ohne Kundenkonto.

**Team:** Damjan, Tariq, Lea, Joana
**Repository:** github.com/damjan017/ProjektDino
**Abgabe:** 21.07.2026 · Interner Feature-Freeze: 17.07.2026

Wer welchen Teil umgesetzt hat, ergibt sich aus der Commit-Historie.

## Architektur

- PHP-Framework aus dem Workshop (MVC): `controller/` steuert den Ablauf, `models/` kapselt DB-Zugriff (Klassen aus UML generiert), `views/` reine Darstellung, kein Programmcode
- Frontend: jQuery Mobile, eigenes Kartenlayout (siehe Design) oben auf dem Workshop-Theme
- Datenbank: MySQL/MariaDB, Schema und PHP-Klassen aus dem UML-Klassendiagramm (Altova UModel) generiert
- Generator-Regel: Code aus automatisch generierten Limited/Full-Controllern darf nicht 1:1 in eigene Controller übernommen werden — nur Workshop-Controller/Views als Vorlage

## Setup (lokal)

1. XAMPP installieren, Repo nach `xampp/htdocs` (oder Symlink)
2. Datenbank anlegen und Schema/Testdaten importieren: `mysql -u root -p neue_datenbank < SoseDinoPROJEKT_dump.sql`
3. `includes/config.php` zeigt standardmäßig auf den HS-Datenbankserver (funktioniert nur im Campus-Netz). Für lokale Tests temporär auf `localhost` umstellen — **niemals mit lokalen Zugangsdaten committen**
4. Details zum Git-Workflow: siehe [GIT-ANLEITUNG.md](GIT-ANLEITUNG.md)

## Funktionsumfang

### Pflichtteil

- **Hotelier-Verwaltung:** Unterkunft anlegen/bearbeiten/löschen (inkl. Adresse und Geodaten in einem Formular), Zimmertyp anlegen/bearbeiten/löschen — jeweils nur für die eigene Unterkunft (Eigentumsprüfung über `_Hotelier`/`roleid`). Löschschutz: eine Unterkunft/ein Zimmertyp mit vorhandenen Zimmertypen bzw. Buchungen lässt sich nicht löschen.
- **Zimmersuche:** nach Ort/Hotelname, Zeitraum, Gästezahl, mit Eingabevalidierung (Datumsformat, Vergangenheit, Gästezahl-Bereich, Suchbegriff-Länge). Zeigt nur tatsächlich verfügbare Zimmertypen.
- **Buchungsworkflow:** Gastdaten erfassen, Mitgäste pro zusätzlichem Bettenplatz, Zahlungsart-Auswahl mit simulierter Kreditkarten-/Lastschrift-Eingabe (rein clientseitig, wird nicht an den Server übertragen oder gespeichert), Ergebnisseite nach erfolgreicher Buchung.
- **Verfügbarkeitsprüfung** (`models/model.Zimmertyp.php::berechneVerfuegbarkeit()`): prüft vor jeder Buchung sowie in der Suche, ob für den gewünschten Zeitraum noch ein Zimmer des gewählten Typs frei ist (Überlappungs-Query gegen bestehende Buchungen, Status "ungültig" wird ausgenommen).
- **Preisberechnung** (`models/model.Zimmertyp.php::berechnePreis()`): Nächte × Preis, bzw. Aktionspreis, falls beim Zimmertyp aktiv.
- **Mindestalter-Prüfung** (`models/model.Kunde.php::pruefeAlter()`): Hauptgast muss bei Buchung ≥ 18 Jahre alt sein.

### Fest eingeplante Erweiterungen (alle umgesetzt)

- **Ausstattungsmerkmale:** eigenes CRUD mit Duplikat-Prüfung (gleiche Bezeichnung+Kategorie wird abgefangen), Zuordnung zu Unterkünften (m:n über `Unterkunft_Ausstattung`).
- **Filterung nach Ausstattung** in der Zimmersuche: Mehrfachauswahl, UND-verknüpft (SQL `EXISTS`-Bedingungen), Suchergebnisse zeigen die gewählten Merkmale an.
- **Zahlungsmethoden:** Bar/Kreditkarte/Lastschrift im Workflow, inkl. sich dynamisch ein-/ausblendender Formularfelder je nach Auswahl.

### Stretch-Goal

- **Bildergalerie** auf der Unterkunfts-Detailseite (Hauptbild + Zimmerbilder, anklickbar).

### Zusätzlich umgesetzt (über den Plan hinaus)

- **Admin-Übersicht:** der `Administrator`-Account sieht über die App selbst alle Unterkünfte und Zimmertypen aller Hoteliers (rein lesend, mit Hotelier-Spalte) — praktisch zum Testen, ohne die Eigentumsprüfung für echte Hoteliers zu verändern.
- **Startseite:** Hero-Bereich mit direktem Sucheinstieg, Kennzahlen (Anzahl Unterkünfte/Städte/Zimmertypen, live aus der DB), Galerie mit den beliebtesten Reisezielen (klickbar zur passenden Suche), kurzer "So funktioniert's"-Bereich.

## Design

Kein 1:1-Nachbau von booking.com, aber strukturell angelehnt: Kartenraster statt Listenansicht bei Suche/Zimmerübersicht, klar getrennte Abschnitte auf Detail- und Buchungsseite. Farbschema konsequent auf Weiß/Dunkel/Gold umgestellt (Hochschul-Farben statt der ursprünglichen Blautöne des Workshop-Themes), siehe `css/themes/hs.css` (Abschnitt "Wingbooking - eigene Styles" am Dateiende).

## Datenbank / Testdaten

`SoseDinoPROJEKT_dump.sql` im Repo-Root enthält Schema und Testdaten (11 Unterkünfte in Baden-Württemberg — Pforzheim, Bodensee-Region, Stuttgart, Karlsruhe, Freiburg, Heidelberg, Mannheim, Tübingen, Baden-Baden, Ulm — mit passenden, lizenzfreien Fotos von Wikimedia Commons, Nachweis in `images/BILDNACHWEIS.txt`). Test-Ausweisnummern und Kundendaten sind ausschließlich Fantasiedaten (`TEST-AUSWEIS-...`), keine echten Personendaten.

## Bekannte Framework-Fixes

Zwei vorbestehende Fehler im Workshop-Framework wurden gefunden und behoben:

- `DB::buildScheme()` und `Core::init()` (in `includes/system.db.php`/`system.core.php`) waren fälschlich als Instanzmethoden deklariert, wurden aber überall statisch aufgerufen → PHP-8-Fatal-Error beim Laden jeder Seite. Fix: `static` ergänzt.
- Die Zimmersuche rief `query()` ohne `raw`-Modus auf, wodurch das Framework versuchte, automatisch zusätzliche Joins basierend auf dem UML-Modell einzufügen — das kollidierte mit der manuell geschriebenen Suchanfrage und lieferte nie Ergebnisse. Fix: `raw=true` ergänzt.
- Für Hotelier-Logins fehlte die Verknüpfungsspalte `_User_uid` (bei `Kunde` existiert sie, bei `Hotelier` war sie im ursprünglichen UML-Modell nicht vorgesehen) — dadurch konnte sich kein Hotelier über den normalen Login mit seinem Profil verknüpfen. Spalte wurde ergänzt.

## Offene Punkte

- [ ] Masken-Skizzen (Fotos) noch nicht im `docs/`-Ordner
- [ ] Belegungsansicht für Hotelier (zweites Stretch-Goal) noch offen — bei Zeitnot laut Plan streichbar
- [ ] Kundenkonto mit gespeicherten Zahlungsdaten (Zusatzfeature) — bewusst auf nach dem Feature-Freeze verschoben
- [ ] Frisches Clone samt SQL-Import auf einem zweiten Rechner einmal komplett durchtesten (Abgabe-Checkliste)
