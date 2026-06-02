<?php
// Buchungsbestätigung – wird nach erfolgreicher Buchung angezeigt
Core::$title = "Buchungsbestätigung";
Core::setView("Buchung_bestaetigung", "view1", "detail");

$Buchung = new Buchung();
$Buchung->loadDBData($_GET["id"]);
Core::publish($Buchung, "Buchung");

$Kunde = new Kunde();
$Kunde->loadDBData($Buchung->_Kunde);
Core::publish($Kunde, "Kunde");

$Zimmertyp = new Zimmertyp();
$Zimmertyp->loadDBData($Buchung->_Zimmertyp);
Core::publish($Zimmertyp, "Zimmertyp");

$Unterkunft = new Unterkunft();
$Unterkunft->loadDBData($Zimmertyp->_Unterkunft);
Core::publish($Unterkunft, "Unterkunft");

$Adresse = new Adresse();
$Adresse->loadDBData($Unterkunft->_Adresse);
Core::publish($Adresse, "Adresse");

$Mitgast_list = (new Mitgast())->query(Mitgast::SQL_SELECT_Buchung, [$Buchung->id]);
Core::publish($Mitgast_list, "Mitgast_list");
