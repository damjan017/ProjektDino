<?php
$taskType = "list";
$classSettings = Ausstattung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Ausstattung";
Core::setView("Ausstattung_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Ausstattung");
$Ausstattung_list = [];
$Ausstattung = new Ausstattung();
Ausstattung::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Ausstattung_list = $Ausstattung->search(filter_input(INPUT_POST, "search"));
} else {
    $Ausstattung_list = Ausstattung::findAll();
}
Core::publish($Ausstattung_list, "Ausstattung_list");
Core::publish($Ausstattung, "Ausstattung");
