<?php
$taskType = "detail";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Zimmertyp";
Core::setView("Zimmertyp_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Zimmertyp");
$Zimmertyp = new Zimmertyp();
Zimmertyp::$activeViewport = "detail";
$Zimmertyp->loadDBData($_GET["id"]);
Core::publish($Zimmertyp, "Zimmertyp");

// Zugehörige Unterkunft laden
$Unterkunft = new Unterkunft();
$Unterkunft->loadDBData($Zimmertyp->_Unterkunft);
Core::publish($Unterkunft, "Unterkunft");

// Buchungen für diesen Zimmertyp laden
$Buchung_b = new Buchung();
$Buchung_b_list = $Buchung_b->query(Buchung::SQL_SELECT_Zimmertyp, [$Zimmertyp->id]);
Core::publish($Buchung_b_list, "Buchung_b_list");
Core::publish($Buchung_b, "Buchung_b");
