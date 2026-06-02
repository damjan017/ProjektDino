<?php
$taskType = "detail";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Unterkunft";
Core::setView("Unterkunft_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Unterkunft");
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "detail";
$Unterkunft->loadDBData($_GET["id"]);
Core::publish($Unterkunft, "Unterkunft");

// Adresse laden
$Adresse = new Adresse();
$Adresse->loadDBData($Unterkunft->_Adresse);
Core::publish($Adresse, "Adresse");

// Zimmertypen dieser Unterkunft laden
$Zimmertyp_b = new Zimmertyp();
$Zimmertyp_b_list = $Zimmertyp_b->query(Zimmertyp::SQL_SELECT_Unterkunft, [$Unterkunft->id]);
Core::publish($Zimmertyp_b_list, "Zimmertyp_b_list");
Core::publish($Zimmertyp_b, "Zimmertyp_b");

// Ausstattung der Unterkunft laden
$Ausstattung_a = new Ausstattung();
$Ausstattung_a_list = $Ausstattung_a->query(Ausstattung::SQL_SELECT_Unterkunft_a, [$Unterkunft->id]);
Core::publish($Ausstattung_a_list, "Ausstattung_a_list");
Core::publish($Ausstattung_a, "Ausstattung_a");
