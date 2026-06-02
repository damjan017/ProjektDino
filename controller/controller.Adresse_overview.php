<?php
$taskType = "list";
$classSettings = Adresse::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Adresse";
Core::setView("Adresse_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Adresse");
$Adresse_list = [];
$Adresse = new Adresse();
Adresse::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Adresse_list = $Adresse->search(filter_input(INPUT_POST, "search"));
} else {
    $Adresse_list = Adresse::findAll();
}
Core::publish($Adresse_list, "Adresse_list");
Core::publish($Adresse, "Adresse");
