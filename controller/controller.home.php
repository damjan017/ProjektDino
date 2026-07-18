<?php
Core::$title = "Wingbooking";
Core::setView("home", "view1");

$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
Core::publish($istHotelier, "istHotelier");

// Ein paar Reiseziele fuer die Galerie auf der Startseite (je Stadt eine Unterkunft mit Bild)
$reiseziele = Unterkunft::query(
    "SELECT u.Name, u.Bild, a.Ortschaft
     FROM Unterkunft u
     LEFT JOIN Adresse a ON u._Adresse = a.id
     WHERE u.Bild IS NOT NULL AND u.Bild != ''
     GROUP BY a.Ortschaft
     ORDER BY u.Bewertung DESC
     LIMIT 8",
    [],
    true
);
Core::publish($reiseziele, "reiseziele");

// Kennzahlen fuer die Startseite (Unterkuenfte / Staedte / Zimmertypen)
$kennzahlen = Unterkunft::query(
    "SELECT
        (SELECT COUNT(*) FROM Unterkunft) AS anzahlUnterkuenfte,
        (SELECT COUNT(DISTINCT a.Ortschaft) FROM Adresse a) AS anzahlStaedte,
        (SELECT COUNT(*) FROM Zimmertyp) AS anzahlZimmertypen",
    [],
    true
);
Core::publish($kennzahlen[0] ?? null, "kennzahlen");
