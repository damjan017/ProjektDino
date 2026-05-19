<?php

if ($_POST["registrieren-ng"] != "1"){
$taskType = "new";
$classSettings =Kunde::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Kunde";
Core::setView("Kunde_new", "view1", "new");
Core::setViewScheme("view1", "new", "Kunde");
}

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Kunde=new Kunde();
Kunde::$activeViewport="new";
Kunde::renderScript("new","form_Kunde");

if(count($_POST)>0){
$a= $Kunde->loadFormData();
if($a===true){
if($Kunde->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Kunde_field =Kunde::$dataScheme[$filekey];
switch ($Kunde_field["type"]){
case "picture":
$Kunde->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Kunde::$dataScheme[$Kunde_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:
$ordner="files/";
}
$pfad = $Kunde_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$Kunde->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$Kunde=new Kunde();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Kunde_new.php";
}else{
   $task_source = $_GET["task_source"];
   $array["register"] = "true";
   Core::redirect ($task_source, $array);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_User_uid = User::findAll(User::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_User_uid, "_User_uid");
Core::publish($Kunde, "Kunde");
//Enumerationen
