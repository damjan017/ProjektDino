<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: ZimmertypT";
Core::setView("ZimmertypT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "ZimmertypT");
$ZimmertypT_list=[];
$ZimmertypT=new ZimmertypT();
ZimmertypT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$ZimmertypT_list=$ZimmertypT->search(filter_input(INPUT_POST, "search"));
}else{
$ZimmertypT_list=ZimmertypT::findAll();
}
Core::publish($ZimmertypT_list, "ZimmertypT_list");
Core::publish($ZimmertypT, "ZimmertypT");
