<?php
$taskType = "list";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Übersicht: Zimmertypen";
Core::setView("Zimmertyp_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Zimmertyp");
$Zimmertyp_list = [];
$Zimmertyp = new Zimmertyp();
Zimmertyp::$activeViewport = "list";
if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Zimmertyp_list = $Zimmertyp->search(filter_input(INPUT_POST, "search"));
} else {
    $Zimmertyp_list = Zimmertyp::findAll();
}
Core::publish($Zimmertyp_list, "Zimmertyp_list");
Core::publish($Zimmertyp, "Zimmertyp");
