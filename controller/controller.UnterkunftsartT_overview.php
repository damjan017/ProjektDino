<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: UnterkunftsartT";
Core::setView("UnterkunftsartT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "UnterkunftsartT");
$UnterkunftsartT_list=[];
$UnterkunftsartT=new UnterkunftsartT();
UnterkunftsartT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$UnterkunftsartT_list=$UnterkunftsartT->search(filter_input(INPUT_POST, "search"));
}else{
$UnterkunftsartT_list=UnterkunftsartT::findAll();
}
Core::publish($UnterkunftsartT_list, "UnterkunftsartT_list");
Core::publish($UnterkunftsartT, "UnterkunftsartT");
