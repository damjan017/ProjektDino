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
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Buchung_list = $Buchung->search(filter_input(INPUT_POST, "search"));
} else {
    $Buchung_list = Buchung::findAll();
}
Core::publish($Buchung_list, "Buchung_list");
Core::publish($Buchung, "Buchung");
