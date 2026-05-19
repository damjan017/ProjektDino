<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Buchung_b_list = [];
Core::setView("Kunde_handle_Buchung_b", "view1", "list");
Core::setViewScheme("view1", "list", "Buchung_b");
Buchung::$activeViewport="detail";
$Buchung_b_list = Buchung::findAll();
Core::publish($Buchung_b_list, "Buchung_b_list");
Core::publish($id, "id");
$Buchung = new Buchung();
Core::publish($Buchung, "Buchung");
if (isset($_id)) {
Buchung::$activeViewport="detail";
$Buchung->loadDBData($_id);
$Buchung->_Kunde=$id;
$a=$Buchung->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
