<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: AusstattungskategorieT";
Core::setView("AusstattungskategorieT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "AusstattungskategorieT");
$AusstattungskategorieT_list=[];
$AusstattungskategorieT=new AusstattungskategorieT();
AusstattungskategorieT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$AusstattungskategorieT_list=$AusstattungskategorieT->search(filter_input(INPUT_POST, "search"));
}else{
$AusstattungskategorieT_list=AusstattungskategorieT::findAll();
}
Core::publish($AusstattungskategorieT_list, "AusstattungskategorieT_list");
Core::publish($AusstattungskategorieT, "AusstattungskategorieT");
