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
$Buchung->loadDBData($_GET["id"]);
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
Core::publish($Mitgast_a_list, "Mitgast_a_list");
Core::publish($Mitgast_a, "Mitgast_a");
