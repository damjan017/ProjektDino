<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "list";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Zimmertypen";
Core::setView("Zimmertyp_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Zimmertyp");

$hotelierId = (int) Core::$user->roleid;
$Zimmertyp_list = [];

if ($hotelierId <= 0) {
    Core::addError("Dem angemeldeten Benutzer ist kein Hotelier-Profil zugeordnet");
} else {
    $Zimmertyp_list = DB::query(
        "SELECT z.id,
                zt.literal AS Bezeichnung_literal,
                z.Anzahltbett,
                z.ArtBett,
                z.Preis,
                z.Aktionspreis,
                z.Aktionaktiv,
                z.AnzahlVerfuegbarkeit,
                u.Name AS Unterkunft_Name
         FROM Zimmertyp z
         LEFT JOIN ZimmertypT zt ON z.Bezeichnung = zt.id
         INNER JOIN Unterkunft u ON z._Unterkunft = u.id
         WHERE u._Hotelier = ?
         ORDER BY u.Name, zt.literal",
        [$hotelierId],
        true
    );
}

Core::publish($Zimmertyp_list, "Zimmertyp_list");
