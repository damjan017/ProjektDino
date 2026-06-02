<?php
$taskType = "detail";
$classSettings = Ausstattung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title = "Detail: Ausstattung";
Core::setView("Ausstattung_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Ausstattung");
$Ausstattung = new Ausstattung();
Ausstattung::$activeViewport = "detail";
$Ausstattung->loadDBData($_GET["id"]);
Core::publish($Ausstattung, "Ausstattung");
