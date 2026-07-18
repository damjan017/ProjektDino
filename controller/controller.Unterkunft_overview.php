<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
$istAdmin = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Administrator") === 0;

if (!$istHotelier && !$istAdmin) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Unterkünfte verwalten"]);
    return;
}

$taskType = "list";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::publish($istAdmin, "istAdmin");
Core::$title = "Übersicht: Unterkünfte";
Core::setView("Unterkunft_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Unterkunft");

$Unterkunft_list = [];

if ($istAdmin) {
    // Administrator sieht alle Unterkuenfte aller Hoteliers (nur lesend).
    $Unterkunft_list = DB::query(
        "SELECT u.id,
                u.Name,
                u.Unterkunftsart,
                ut.literal AS Unterkunftsart_literal,
                u.Bewertung,
                a.Ortschaft,
                a.DistanzzurStadt,
                CONCAT(h.Vorname, ' ', h.Name) AS HotelierName
         FROM Unterkunft u
         LEFT JOIN UnterkunftsartT ut ON u.Unterkunftsart = ut.id
         LEFT JOIN Adresse a ON u._Adresse = a.id
         LEFT JOIN Hotelier h ON u._Hotelier = h.id
         ORDER BY h.Name, u.Name",
        [],
        true
    );
} else {
    $hotelierId = (int) Core::$user->roleid;

    if ($hotelierId <= 0) {
        Core::addError("Dem angemeldeten Benutzer ist kein Hotelier-Profil zugeordnet");
    } else {
        $Unterkunft_list = DB::query(
            "SELECT u.id,
                    u.Name,
                    u.Unterkunftsart,
                    ut.literal AS Unterkunftsart_literal,
                    u.Bewertung,
                    a.Ortschaft,
                    a.DistanzzurStadt
             FROM Unterkunft u
             LEFT JOIN UnterkunftsartT ut ON u.Unterkunftsart = ut.id
             LEFT JOIN Adresse a ON u._Adresse = a.id
             WHERE u._Hotelier = ?
             ORDER BY u.Name",
            [$hotelierId],
            true
        );
    }
}

Core::publish($Unterkunft_list, "Unterkunft_list");
