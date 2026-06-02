<?php
$taskType = "list";
$classSettings = Mitgast::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Mitgäste";
Core::setView("Mitgast_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Mitgast");
$Mitgast_list = [];
$Mitgast = new Mitgast();
Mitgast::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Mitgast_list = $Mitgast->search(filter_input(INPUT_POST, "search"));
} else {
    $Mitgast_list = Mitgast::findAll();
}
Core::publish($Mitgast_list, "Mitgast_list");
Core::publish($Mitgast, "Mitgast");
