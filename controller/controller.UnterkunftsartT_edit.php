<?php
Core::checkAccessLevel(1);
Core::$title="Edit: UnterkunftsartT";
$id=$_GET["id"];
Core::setView("UnterkunftsartT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "UnterkunftsartT");
$UnterkunftsartT=new UnterkunftsartT();
UnterkunftsartT::$activeViewport="edit";
$UnterkunftsartT_list = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT_list, "UnterkunftsartT_list");
UnterkunftsartT::$activeViewport="edit";
$UnterkunftsartT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $UnterkunftsartT->loadFormData();
if($a===true){
if($UnterkunftsartT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$UnterkunftsartT_field =UnterkunftsartT::$dataScheme[$filekey];
switch ($UnterkunftsartT_field["type"]){
case "picture":
$UnterkunftsartT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=UnterkunftsartT::$dataScheme[$UnterkunftsartT_field["sysParent"]];
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
$pfad = $UnterkunftsartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$UnterkunftsartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
core::redirect("UnterkunftsartT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($UnterkunftsartT, "UnterkunftsartT");
