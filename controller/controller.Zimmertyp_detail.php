<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "detail";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
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
if ($hotelierId <= 0 || (int) $Unterkunft->_Hotelier !== $hotelierId) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Dieser Zimmertyp gehört nicht zu Ihrem Konto"]);
    return;
}

// Buchungen werden erst nach der Eigentumsprüfung geladen.
$Buchung_b = new Buchung();
$Buchung_b_list = $Buchung_b->query(Buchung::SQL_SELECT_Zimmertyp, [$Zimmertyp->id]);

Core::publish($Zimmertyp, "Zimmertyp");
Core::publish($Unterkunft, "Unterkunft");
Core::publish($Buchung_b_list, "Buchung_b_list");
Core::publish($Buchung_b, "Buchung_b");
