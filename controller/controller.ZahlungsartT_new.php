<?php
Core::checkAccessLevel(1);
Core::$title="Neu: ZahlungsartT";
Core::setView("ZahlungsartT_new", "view1", "new");
Core::setViewScheme("view1", "new", "ZahlungsartT");
$ZahlungsartT=new ZahlungsartT();
ZahlungsartT::$activeViewport="new";
$ZahlungsartT_list = ZahlungsartT::findAll();
Core::publish($ZahlungsartT_list, "ZahlungsartT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $ZahlungsartT->loadFormData();
if($a===true){
if($ZahlungsartT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$ZahlungsartT_field =ZahlungsartT::$dataScheme[$filekey];
switch ($ZahlungsartT_field["type"]){
case "picture":
$ZahlungsartT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=ZahlungsartT::$dataScheme[$ZahlungsartT_field["sysParent"]];
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
$pfad = $ZahlungsartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$ZahlungsartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$ZahlungsartT=new ZahlungsartT();
Core::$view->path["view1"]="views/view.ZahlungsartT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($ZahlungsartT, "ZahlungsartT");
