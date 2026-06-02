<?php
$taskType = "list";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Unterkünfte";
Core::setView("Unterkunft_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Unterkunft");
$Unterkunft_list = [];
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Unterkunft_list = $Unterkunft->search(filter_input(INPUT_POST, "search"));
} else {
    $Unterkunft_list = Unterkunft::findAll();
}
Core::publish($Unterkunft_list, "Unterkunft_list");
Core::publish($Unterkunft, "Unterkunft");
