<?php
Core::checkAccessLevel(1);
Core::$title="Edit: AusstattungskategorieT";
$id=$_GET["id"];
Core::setView("AusstattungskategorieT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "AusstattungskategorieT");
$AusstattungskategorieT=new AusstattungskategorieT();
AusstattungskategorieT::$activeViewport="edit";
$AusstattungskategorieT_list = AusstattungskategorieT::findAll();
Core::publish($AusstattungskategorieT_list, "AusstattungskategorieT_list");
AusstattungskategorieT::$activeViewport="edit";
$AusstattungskategorieT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $AusstattungskategorieT->loadFormData();
if($a===true){
if($AusstattungskategorieT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$AusstattungskategorieT_field =AusstattungskategorieT::$dataScheme[$filekey];
switch ($AusstattungskategorieT_field["type"]){
case "picture":
$AusstattungskategorieT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=AusstattungskategorieT::$dataScheme[$AusstattungskategorieT_field["sysParent"]];
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
$pfad = $AusstattungskategorieT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$AusstattungskategorieT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("AusstattungskategorieT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($AusstattungskategorieT, "AusstattungskategorieT");
