<?php
$taskType = "detail";
$classSettings = Mitgast::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Mitgast";
Core::setView("Mitgast_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Mitgast");
$Mitgast = new Mitgast();
Mitgast::$activeViewport = "detail";
$Mitgast->loadDBData($_GET["id"]);
Core::publish($Mitgast, "Mitgast");

// Zugehörige Buchung laden
$Buchung = new Buchung();
$Buchung->loadDBData($Mitgast->_Buchung);
Core::publish($Buchung, "Buchung");
