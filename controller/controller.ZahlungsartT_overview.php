<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: ZahlungsartT";
Core::setView("ZahlungsartT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "ZahlungsartT");
$ZahlungsartT_list=[];
$ZahlungsartT=new ZahlungsartT();
ZahlungsartT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$ZahlungsartT_list=$ZahlungsartT->search(filter_input(INPUT_POST, "search"));
}else{
$ZahlungsartT_list=ZahlungsartT::findAll();
}
Core::publish($ZahlungsartT_list, "ZahlungsartT_list");
Core::publish($ZahlungsartT, "ZahlungsartT");
