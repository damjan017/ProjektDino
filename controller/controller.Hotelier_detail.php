<?php
$taskType = "detail";
$classSettings = Hotelier::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Hotelier";
Core::setView("Hotelier_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Hotelier");
$Hotelier = new Hotelier();
Hotelier::$activeViewport = "detail";
$Hotelier->loadDBData($_GET["id"]);
Core::publish($Hotelier, "Hotelier");

// Unterkünfte dieses Hoteliers laden
$Unterkunft_a = new Unterkunft();
$Unterkunft_a_list = $Unterkunft_a->query(Unterkunft::SQL_SELECT_Hotelier, [$Hotelier->id]);
Core::publish($Unterkunft_a_list, "Unterkunft_a_list");
Core::publish($Unterkunft_a, "Unterkunft_a");
