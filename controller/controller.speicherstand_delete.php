<?php
if (isset($_GET["id"])) {

$files = glob("../ProjektDino_/speicherstände/workshop22/".$_GET["id"]."/*"); // alle Files im Ordner wählen
foreach($files as $file){
  if(is_file($file)) {
    unlink($file); // alle Files löschen
  }
}    
    
unlink("../ProjektDino_/speicherstände/workshop22/".$_GET["id"]);
}
require "controller.speicherstande_overview.php";