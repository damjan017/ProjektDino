<?php
$taskType = "detail";
$classSettings = Buchung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Buchung";
Core::setView("Buchung_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Buchung");
$Buchung = new Buchung();
Buchung::$activeViewport = "detail";

// Gastbuchungen haben keinen Besitzer (owner_id), deshalb nur die Besitzer-
// Einschraenkung abschalten. Die Eigentumspruefung erfolgt danach fachlich.
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
Buchung::$SQLrestrict = false;

$Buchung->loadDBData($_GET["id"]);
if ($istHotelier && (int) $Buchung->_Hotelier !== (int) Core::$user->roleid) {
    Buchung::$SQLrestrict = true;
    Core::redirect("Buchung", ["errorMsg" => "Diese Buchung gehört nicht zu Ihren Unterkünften"]);
    return;
}
Core::publish($Buchung, "Buchung");

// Kunde laden
$Kunde = new Kunde();
$Kunde->loadDBData($Buchung->_Kunde);
Core::publish($Kunde, "Kunde");

// Zimmertyp laden
$Zimmertyp = new Zimmertyp();
$Zimmertyp->loadDBData($Buchung->_Zimmertyp);
Core::publish($Zimmertyp, "Zimmertyp");

// Unterkunft laden
$Unterkunft = new Unterkunft();
$Unterkunft->loadDBData($Zimmertyp->_Unterkunft);
Core::publish($Unterkunft, "Unterkunft");

// Mitgäste laden
$Mitgast_a = new Mitgast();
$Mitgast_a_list = $Mitgast_a->query(Mitgast::SQL_SELECT_Buchung, [$Buchung->id]);
Buchung::$SQLrestrict = true;
Core::publish($Mitgast_a_list, "Mitgast_a_list");
Core::publish($Mitgast_a, "Mitgast_a");
