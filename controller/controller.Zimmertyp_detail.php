<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
$istAdmin = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Administrator") === 0;

if (!$istHotelier && !$istAdmin) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "detail";
$classSettings = Zimmertyp::$settings;
if ($istHotelier) {
    $access = Core::checkAccessGui($classSettings, $taskType);
} else {
    // Administrator darf nur ansehen, keine Verwaltungsaktionen.
    $access = [
        "delete" => "false",
        "detail" => "true",
        "new" => "false",
        "list" => "false",
        "edit" => "false",
        "relations" => "false"
    ];
}
Core::publish($access, "access");
Core::$title = "Detail: Zimmertyp";
Core::setView("Zimmertyp_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Zimmertyp");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$hotelierId = (int) Core::$user->roleid;
$Zimmertyp = new Zimmertyp();
Zimmertyp::$activeViewport = "detail";

if (!$id || !$Zimmertyp->loadDBData($id)) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Zimmertyp wurde nicht gefunden"]);
    return;
}

$Unterkunft = new Unterkunft();
if (!$Unterkunft->loadDBData($Zimmertyp->_Unterkunft)) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Die zugehörige Unterkunft wurde nicht gefunden"]);
    return;
}
if ($istHotelier && ($hotelierId <= 0 || (int) $Unterkunft->_Hotelier !== $hotelierId)) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Dieser Zimmertyp gehört nicht zu Ihrem Konto"]);
    return;
}

// Buchungen werden erst nach der Eigentumsprüfung geladen.
$Buchung_b = new Buchung();
// Die Eigentumspruefung ist oben bereits erfolgt. Ohne Abschalten der Besitzer-
// Einschraenkung wuerde das Framework Gastbuchungen (ohne owner_id) ausblenden.
Buchung::$SQLrestrict = false;
$Buchung_b_list = $Buchung_b->query(Buchung::SQL_SELECT_Zimmertyp, [$Zimmertyp->id]);
Buchung::$SQLrestrict = true;

Core::publish($Zimmertyp, "Zimmertyp");
Core::publish($Unterkunft, "Unterkunft");
Core::publish($Buchung_b_list, "Buchung_b_list");
Core::publish($Buchung_b, "Buchung_b");
