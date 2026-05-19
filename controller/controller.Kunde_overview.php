<?php
$taskType = "list";
$classSettings =Kunde::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Kunde";
Core::setView("Kunde_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Kunde");
$Kunde_list=[];
$Kunde=new Kunde();
Kunde::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Kunde_list=$Kunde->search(filter_input(INPUT_POST, "search"));
}else{
$Kunde_list=Kunde::findAll();
}
Core::publish($Kunde_list, "Kunde_list");
Core::publish($Kunde, "Kunde");
//Enumerationen
