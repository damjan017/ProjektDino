<?php
$taskType = "list";
$classSettings = Buchung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Buchungen";
Core::setView("Buchung_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Buchung");
$Buchung_list = [];
$Buchung = new Buchung();
Buchung::$activeViewport = "list";

// Ein Hotelier sieht die Buchungen seiner eigenen Unterkuenfte.
// (Ohne raw=true wuerde das Framework auf owner_id filtern - Gastbuchungen haben keinen Besitzer.)
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;

if ($istHotelier) {
    $hotelierId = (int) Core::$user->roleid;
    // Nur die Besitzer-Einschraenkung abschalten - die uebrige Aufbereitung
    // (Anzeigetexte der Wertelisten, Formatierung) bleibt erhalten.
    Buchung::$SQLrestrict = false;
    $alleBuchungen = Buchung::findAll();
    Buchung::$SQLrestrict = true;

    $Buchung_list = array_values(array_filter($alleBuchungen, function ($b) use ($hotelierId) {
        return (int) $b->_Hotelier === $hotelierId;
    }));
} elseif (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Buchung_list = $Buchung->search(filter_input(INPUT_POST, "search"));
} else {
    $Buchung_list = Buchung::findAll();
}
Core::publish($Buchung_list, "Buchung_list");
Core::publish($Buchung, "Buchung");
