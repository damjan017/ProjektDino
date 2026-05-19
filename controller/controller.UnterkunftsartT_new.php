<?php
Core::checkAccessLevel(1);
Core::$title="Neu: UnterkunftsartT";
Core::setView("UnterkunftsartT_new", "view1", "new");
Core::setViewScheme("view1", "new", "UnterkunftsartT");
$UnterkunftsartT=new UnterkunftsartT();
UnterkunftsartT::$activeViewport="new";
$UnterkunftsartT_list = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT_list, "UnterkunftsartT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $UnterkunftsartT->loadFormData();
if($a===true){
if($UnterkunftsartT->create()!="0"){
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
default:
$ordner="files/";
}
$pfad = $UnterkunftsartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$filetypes=$parentField["filetypes"];
$UnterkunftsartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner, "filestypes"=>$filetypes]);
break;
default:
}
}
}
$UnterkunftsartT=new UnterkunftsartT();
Core::$view->path["view1"]="views/view.UnterkunftsartT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($UnterkunftsartT, "UnterkunftsartT");
