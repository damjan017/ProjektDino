<?php
$taskType = "detail";
$classSettings =Kunde::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Kunde";
Core::setView("Kunde_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Kunde");
$Kunde_list_2 = Kunde::findAll();
Core::publish($Kunde_list_2, "Kunde_list_2");
$Kunde_list=[];
$Kunde=new Kunde();
Kunde::$activeViewport="detail";
$Kunde->loadDBData($_GET["id"]);
Core::publish($Kunde, "Kunde");
//Beziehungen:
//Enumerationen
//to: Buchung  _b:
$Buchung_b=new Buchung();
$Buchung_b_list=[];
$Buchung_b_list = $Buchung_b->query(Buchung::SQL_SELECT_Kunde, [$Kunde->id]);
Core::publish($Buchung_b_list, "Buchung_b_list");
Core::publish($Buchung_b, "Buchung_b");
Core::$view->path["view_Buchung_b"]="views/view.Buchung_b_detail_overview.php";
//to: User _uid :
$User_uid=new User();
$User_uid_list=[];
$User_uid_list=$User_uid->query(User::SQL_SELECT_Kunde_uid, [$Kunde ->id]);
Core::publish($User_uid_list, "User_uid_list");
Core::publish($User_uid, "User_uid");
Core::$view->path["view_User_uid"]="views/view.User_uid_detail_overview.php";
