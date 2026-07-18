# Wingbooking

Booking.com-ähnliche Webanwendung für das Modul Internet Technologies, SoSe26 (Prof. Nippa). Zwei Ansichten: Hotelier-Verwaltung und Gast-Buchung.

**Team:** Damjan, Tariq, Lea, Joana
**Repository:** github.com/damjan017/ProjektDino
**Abgabe:** 21.07.2026 · Interner Feature-Freeze: 17.07.2026

## Architektur

- PHP-Framework aus dem Workshop (MVC): `controller/` steuert den Ablauf, `models/` kapselt DB-Zugriff (Klassen aus UML generiert), `views/` reine Darstellung, kein Programmcode
- Frontend: jQuery Mobile
- Datenbank: MySQL/MariaDB, Schema und PHP-Klassen aus dem UML-Klassendiagramm (Altova UModel) generiert
- Generator-Regel: Code aus automatisch generierten Limited/Full-Controllern darf nicht 1:1 in eigene Controller übernommen werden — nur Workshop-Controller/Views als Vorlage

## Setup (lokal)

1. XAMPP installieren, Repo nach `xampp/htdocs` (oder Symlink)
2. Datenbank anlegen und Schema/Testdaten importieren: `mysql -u root -p < <dump-datei>.sql`
   *(Hinweis: SQL-Dump muss noch ins Repo — siehe Offene Punkte unten)*
3. `includes/config.php` zeigt standardmäßig auf den HS-Datenbankserver. Für lokale Tests temporär auf `localhost` umstellen — **niemals mit lokalen Zugangsdaten committen**
4. Details zum Git-Workflow: siehe [GIT-ANLEITUNG.md](GIT-ANLEITUNG.md)

## Aufgabenverteilung

| Person | Bereich |
|---|---|
| Damjan | UML-Klassendiagramm, DB/PHP-Generierung, Buchungsworkflow, Verfügbarkeitsprüfung, Integration/Merges |
| Tariq | Hotelier-Bereich (Unterkunft-CRUD inkl. Geodaten), Zimmertyp-CRUD, Suche/Filter, UML-Review |
| Lea | Masken-Grobentwurf, Ausstattung-CRUD + Filter-Anbindung |
| Joana | Masken-Grobentwurf, Views/Styling, Testdaten, Projektdokumentation |

---

## Umgesetzt: Damjan

**Buchungsworkflow** (`controller/controller.Buchung_new.php`, `views/view.Buchung_new.php`)
Gastdaten erfassen, Mitgäste pro zusätzlichem Bettenplatz, Zahlungsart-Auswahl mit simulierter Kreditkarten-/Lastschrift-Eingabe (rein clientseitig, wird nicht gespeichert), Ergebnisseite nach erfolgreicher Buchung.

**Verfügbarkeitsprüfung** (`models/model.Zimmertyp.php::berechneVerfuegbarkeit()`)
Prüft vor jeder Buchung, ob für den gewünschten Zeitraum noch ein Zimmer des gewählten Typs frei ist (Überlappungs-Query gegen bestehende, nicht stornierte Buchungen). Dieselbe Logik/Konvention (Status-ID 3 = storniert) wird auch in der Zimmersuche verwendet.

**Preisberechnung** (`models/model.Zimmertyp.php::berechnePreis()`)
Nächte × Preis (bzw. Aktionspreis, falls aktiv).

**Mindestalter-Prüfung** (`models/model.Kunde.php::pruefeAlter()`)
Hauptgast muss bei Buchung ≥ 18 Jahre alt sein.

**Framework-Fixes** (`includes/system.db.php`, `includes/system.core.php`)
`buildScheme()` und `Core::init()` waren fälschlich als Instanzmethoden deklariert, wurden aber überall statisch aufgerufen → PHP-8-Fatal-Error beim Laden jeder Seite. Fix: `static` ergänzt (Methodenkörper verwenden kein `$this`, daher unkritisch).

Offene Pull Requests: `fix/php8-static-methods`, `feature/buchung-verfuegbarkeit`, `docs/git-anleitung`

---

## Umgesetzt: Tariq / Lea

*(Bitte hier kurz ergänzen, was auf `feature/lea-unterkunft-zimmertyp-crud` umgesetzt wurde — Stichpunkte reichen, z.B. welche Dateien, welche Kernentscheidungen wie die Eigentumsprüfung oder der Löschschutz.)*

- Unterkunft-CRUD inkl. Adresse/Geodaten in einem Formular
- Zimmertyp-CRUD, nur eigene Unterkünfte wählbar
- Eigentumsprüfung + Löschschutz (kein Löschen bei vorhandenen Zimmertypen/Buchungen)
- Suche: Eingabevalidierung (Datum, Gästezahl, Suchbegriff-Länge)

## Umgesetzt: Lea (Ausstattung)

*(Bitte hier kurz ergänzen, was auf `feature/lea-ausstattung` umgesetzt wurde.)*

- Ausstattungsmerkmale-CRUD mit Duplikat-Prüfung
- Zuordnung Ausstattung ↔ Unterkunft
- Filterung in der Zimmersuche (Mehrfachauswahl, UND-verknüpft)

## Umgesetzt: Joana

*(Bitte hier ergänzen: Views/Styling, Testdaten, Doku-Stand.)*

---

## Offene Punkte

- [ ] SQL-Dump (Schema + Testdaten) fehlt noch im Repo — Pflicht laut Abgabe-Checkliste ("frisches Clone samt SQL-Import getestet")
- [ ] Masken-Skizzen (Fotos) noch nicht im `docs/`-Ordner
- [ ] Stretch-Goals (Belegungsansicht, Bildergalerie) noch offen — bei Zeitnot laut Plan streichbar
- [ ] Kundenkonto mit gespeicherten Zahlungsdaten (Zusatzfeature) — bewusst auf nach dem Feature-Freeze verschoben
- [ ] `feature/lea-ausstattung` und `feature/lea-unterkunft-zimmertyp-crud` überschneiden sich in `controller.Unterkunft_new.php`/`_edit.php`/`Zimmersuche.php` — beim Mergen händisch zusammenführen, kein automatischer Merge
