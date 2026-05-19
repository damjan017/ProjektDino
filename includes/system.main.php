<?php
session_start();
//  ****** System Dateien einbinden *******
require("includes/system.core.php");
require("includes/system.db.php");
require("includes/system.help.php");
require("includes/system.view.php");
require("includes/config.php");
require("includes/getSnippet/system.getSnippet.php");
require("includes/system.snippet.php");
require("includes/system.controls.php");
require("includes/system.menu.php");
//  ***** Anwendungsklassen einbinden *****
require("models/model.Kunde.php");
require("models/model.Buchung.php");
require("models/model.Zimmertyp.php");
require("models/model.Mitgast.php");
require("models/model.Adresse.php");
require("models/model.Unterkunft.php");
require("models/model.Hotelier.php");
require("models/model.Ausstattung.php");
require("models/model.GruppeT.php");
require("models/model.StatusT.php");
require("models/model.ZahlungsartT.php");
require("models/model.ZimmertypT.php");
require("models/model.UnterkunftsartT.php");
require("models/model.AusstattungskategorieT.php");
require("models/model.Unterkunft_Ausstattung.php");
require("models/model.User.php");
require("models/model.Favoriten.php");
// ****** Initialisierung  *******
$core=new Core($hostname,$username,$password,$database); // Bei der Instanzierung wird die (statische) DB-Verbnindung automatisch aufgebaut. 
Core::init(); // sicher den Task auslesen
// ************ Nachfolgende Variablen aus Config ***********
Core::$title=$title;
Core::$defaultTask=$defaultTask;
Core::$debugMode=$debugmode;
Core::$debugPrint=$debugprint;
Core::$xdebug = $xdebug;
Core::$debugConsole=$debugconsole;
Core::$version = $version;
if(Core::$debugMode==1 || Core::$debugConsole==1){
error_reporting(E_ALL & ~E_NOTICE);
}else {
error_reporting(0);
}
// sorgt dafür, dass PHP-Fehlermeldungen erst am Schluss angezeigt werden.
if(Core::$xdebug==1){
xdebug_start_error_collection();
}
require('system.taskmap.php');
Core::controller(); // lädt abhängig vom Task den korrekten Controller
