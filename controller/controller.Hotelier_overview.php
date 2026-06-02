<?php
$taskType = "list";
$classSettings = Hotelier::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Hotelier";
Core::setView("Hotelier_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Hotelier");
$Hotelier_list = [];
$Hotelier = new Hotelier();
Hotelier::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Hotelier_list = $Hotelier->search(filter_input(INPUT_POST, "search"));
} else {
    $Hotelier_list = Hotelier::findAll();
}
Core::publish($Hotelier_list, "Hotelier_list");
Core::publish($Hotelier, "Hotelier");
