<?php
Core::checkAccessLevel(1);
Core::$title="Neu: AusstattungskategorieT";
Core::setView("AusstattungskategorieT_new", "view1", "new");
Core::setViewScheme("view1", "new", "AusstattungskategorieT");
$AusstattungskategorieT=new AusstattungskategorieT();
AusstattungskategorieT::$activeViewport="new";
$AusstattungskategorieT_list = AusstattungskategorieT::findAll();
Core::publish($AusstattungskategorieT_list, "AusstattungskategorieT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $AusstattungskategorieT->loadFormData();
if($a===true){
if($AusstattungskategorieT->create()!="0"){
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
default:
$ordner="files/";
}
$pfad = $AusstattungskategorieT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$AusstattungskategorieT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$AusstattungskategorieT=new AusstattungskategorieT();
Core::$view->path["view1"]="views/view.AusstattungskategorieT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($AusstattungskategorieT, "AusstattungskategorieT");
