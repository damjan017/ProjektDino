<?php
Core::checkAccessLevel(1);
Core::$title="Neu: ZimmertypT";
Core::setView("ZimmertypT_new", "view1", "new");
Core::setViewScheme("view1", "new", "ZimmertypT");
$ZimmertypT=new ZimmertypT();
ZimmertypT::$activeViewport="new";
$ZimmertypT_list = ZimmertypT::findAll();
Core::publish($ZimmertypT_list, "ZimmertypT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $ZimmertypT->loadFormData();
if($a===true){
if($ZimmertypT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$ZimmertypT_field =ZimmertypT::$dataScheme[$filekey];
switch ($ZimmertypT_field["type"]){
case "picture":
$ZimmertypT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=ZimmertypT::$dataScheme[$ZimmertypT_field["sysParent"]];
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
$pfad = $ZimmertypT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$ZimmertypT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$ZimmertypT=new ZimmertypT();
Core::$view->path["view1"]="views/view.ZimmertypT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($ZimmertypT, "ZimmertypT");
