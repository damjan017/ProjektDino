# Git-Anleitung – Wingbooking Team

## Branch-Namensschema

| Präfix | Verwendung | Beispiel |
|---|---|---|
| `feature/` | Neue Funktionalität | `feature/buchung-verfuegbarkeit` |
| `fix/` | Bugfix | `fix/preis-berechnung` |
| `docs/` | Nur Dokumentation | `docs/git-anleitung` |

Jedes Teammitglied arbeitet auf seinem eigenen Branch. **Nur Damjan merged in `main`.**

---

## Git-Identität korrekt setzen

Commits werden GitHub nur dann dem eigenen Profil zugeordnet, wenn die konfigurierte
E-Mail-Adresse mit dem GitHub-Account übereinstimmt. Falsche Identität bedeutet: Beiträge
erscheinen nicht im Profil und die Commit-History ist schwer zuzuordnen.

Einmalig für dieses Repo setzen (ohne `--global` bleibt es lokal):

```bash
git config user.name  "Vorname Nachname"
git config user.email "deine@github-email.de"
```

Prüfen:

```bash
git config user.name
git config user.email
```

Die E-Mail muss exakt mit der unter github.com → Settings → Emails hinterlegten Adresse
übereinstimmen (auch eine verifizierte No-Reply-Adresse funktioniert).

---

## Lokales Testen mit XAMPP

- PHP 8.x + MariaDB über XAMPP starten (Apache + MySQL im Control Panel).
- Testdatenbank anlegen: `mysql -u root < setup_local_db.sql`
- Lokale Config: `includes/config.local.php` mit `$hostname = "localhost"`.
- Testskript: `php test_logic.php` aus dem Projekt-Root.

**`includes/config.php` darf niemals mit lokalen DB-Zugangsdaten committet werden.**
Die Datei zeigt immer auf den Hochschul-Server (`141.47.76.150`). Lokale Anpassungen
gehören ausschließlich in `includes/config.local.php`, die via `.git/info/exclude`
vom Tracking ausgenommen ist.

---

## PHP-8-Kompatibilität – bereits behobene Bugs

Im Framework (`includes/system.*.php`) waren zwei Methoden als Instanzmethoden deklariert,
wurden aber überall statisch aufgerufen – in PHP 7 eine Warnung, in PHP 8 ein Fatal Error:

| Datei | Methode | Fix |
|---|---|---|
| `includes/system.db.php` | `buildScheme()` | `public static function buildScheme(...)` |
| `includes/system.core.php` | `init()` | `public static function init()` |

Beide Fixes sind bereits in `main` eingepflegt. Bei weiteren Framework-Anpassungen
darauf achten, dass neue Methoden die richtige Sichtbarkeit (`static` vs. Instanz) haben.

---

## Keine Code-Übernahme aus generierten Controllern

Die Framework-generierten `*Limited*`- und `*Full*`-Controller (z. B. `controller.Buchung_new_limited.php`)
enthalten automatisch generierten CRUD-Boilerplate. Dieser Code darf **nicht** in eigene
Controller kopiert werden, da er bei einer Neugenerierung überschrieben wird und zu
schwer nachvollziehbaren Dopplungen führt. Eigene Logik gehört ausschließlich in die
selbst angelegten Controller unter `controller/controller.*.php`.
