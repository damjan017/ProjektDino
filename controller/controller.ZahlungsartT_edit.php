<?php
Core::checkAccessLevel(1);
Core::$title="Edit: ZahlungsartT";
$id=$_GET["id"];
Core::setView("ZahlungsartT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "ZahlungsartT");
$ZahlungsartT=new ZahlungsartT();
ZahlungsartT::$activeViewport="edit";
$ZahlungsartT_list = ZahlungsartT::findAll();
Core::publish($ZahlungsartT_list, "ZahlungsartT_list");
ZahlungsartT::$activeViewport="edit";
$ZahlungsartT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $ZahlungsartT->loadFormData();
if($a===true){
if($ZahlungsartT->update()!="0"){
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
default:;
$ordner="files/";;
};
$pfad = $ZahlungsartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$ZahlungsartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("ZahlungsartT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($ZahlungsartT, "ZahlungsartT");
