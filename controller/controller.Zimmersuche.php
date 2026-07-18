<?php
// Zimmersuche für Gäste – Suche nach Ort, Personenanzahl oder Hotelname
require_once 'includes/ausstattung.functions.php';

Core::$title = "Zimmer suchen";
Core::setView("Zimmersuche", "view1", "list");

$Zimmertyp_list = [];
$Ausstattung_list = Ausstattung::findAll();
$selectedAusstattungIds = [];
$selectedAusstattungLabels = [];
$suchbegriff = "";
$anzahl_gaeste = 1;
$checkin  = date("Y-m-d");
$checkout = date("Y-m-d", strtotime("+1 day"));

if (count($_POST) > 0 && isset($_POST["suchen"])) {
    $suchbegriff   = filter_input(INPUT_POST, "suchbegriff", FILTER_SANITIZE_STRING);
    $anzahl_gaeste = filter_input(INPUT_POST, "anzahl_gaeste", FILTER_SANITIZE_NUMBER_INT);
    $checkin       = filter_input(INPUT_POST, "checkin");
    $checkout      = filter_input(INPUT_POST, "checkout");
    $selectedAusstattungIds = existingAusstattungIds(postedAusstattungIds(), $Ausstattung_list);

    foreach ($Ausstattung_list as $ausstattung) {
        if (in_array((int) $ausstattung->id, $selectedAusstattungIds, true)) {
            $selectedAusstattungLabels[] = $ausstattung->Bezeichnung;
        }
    }

    // SQL: Zimmertypen suchen, die zur Gästeanzahl passen und zur gesuchten Unterkunft/Stadt gehören
    $sql = "SELECT z.id as id,
                   zt.literal as Bezeichnung_literal,
                   z.Bezeichnung as Bezeichnung,
                   z.Anzahltbett as Anzahltbett,
                   z.ArtBett as ArtBett,
                   z.Preis as Preis,
                   z.Aktionspreis as Aktionspreis,
                   z.Aktionaktiv as Aktionaktiv,
                   z.Bild as Bild,
                   z.AnzahlVerfuegbarkeit as AnzahlVerfuegbarkeit,
                   u.Name as Unterkunft_Name,
                   u.id as _Unterkunft,
                   u.Bewertung as Bewertung,
                   u.Bild as Unterkunft_Bild,
                   a.Ortschaft as Ortschaft,
                   a.DistanzzurStadt as DistanzzurStadt
            FROM Zimmertyp z
            LEFT JOIN ZimmertypT zt ON z.Bezeichnung = zt.id
            LEFT JOIN Unterkunft u  ON z._Unterkunft = u.id
            LEFT JOIN Adresse a     ON u._Adresse = a.id
            WHERE z.Anzahltbett >= ?
              AND (u.Name LIKE ? OR a.Ortschaft LIKE ?)
              AND z.AnzahlVerfuegbarkeit > (
                  SELECT COUNT(*) FROM Buchung b
                  WHERE b._Zimmertyp = z.id
                    AND b.Status != 3
                    AND NOT (b.checkout <= ? OR b.checkin >= ?)
              )";

    $params = [$anzahl_gaeste, "%$suchbegriff%", "%$suchbegriff%", $checkin, $checkout];

    // UND-Verknüpfung: Für jede Auswahl muss eine passende Zuordnung existieren.
    foreach ($selectedAusstattungIds as $ausstattungId) {
        $sql .= " AND EXISTS (
                    SELECT 1
                    FROM Unterkunft_Ausstattung ua
                    WHERE ua._Unterkunft_a = u.id
                      AND ua._Ausstattung_b = ?
                  )";
        $params[] = $ausstattungId;
    }

    $sql .= " ORDER BY u.Bewertung DESC";

    $Zimmertyp = new Zimmertyp();
    $Zimmertyp_list = $Zimmertyp->query($sql, $params);
}

Core::publish($Zimmertyp_list, "Zimmertyp_list");
Core::publish($Ausstattung_list, "Ausstattung_list");
Core::publish($selectedAusstattungIds, "selectedAusstattungIds");
Core::publish($selectedAusstattungLabels, "selectedAusstattungLabels");
Core::publish($suchbegriff, "suchbegriff");
Core::publish($anzahl_gaeste, "anzahl_gaeste");
Core::publish($checkin, "checkin");
Core::publish($checkout, "checkout");
