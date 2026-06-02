<?php
$taskType = "detail";
$classSettings = Adresse::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Adresse";
Core::setView("Adresse_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Adresse");
$Adresse = new Adresse();
Adresse::$activeViewport = "detail";
$Adresse->loadDBData($_GET["id"]);
Core::publish($Adresse, "Adresse");

// Zugehörige Unterkunft laden
$Unterkunft_b = new Unterkunft();
$Unterkunft_b_list = $Unterkunft_b->query(Unterkunft::SQL_SELECT_Adresse, [$Adresse->id]);
Core::publish($Unterkunft_b_list, "Unterkunft_b_list");
Core::publish($Unterkunft_b, "Unterkunft_b");
