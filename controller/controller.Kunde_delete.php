<?php
$taskType = "delete";
$classSettings =Kunde::$settings;
Core::checkAccessGui($classSettings, $taskType);
if(isset($_GET['id'])){
$result=Kunde::delete(filter_input(INPUT_GET, "id"));
if($result){
Core::redirect("Kunde", ["message"=>"Löschvorgang erfolgreich"]);
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
