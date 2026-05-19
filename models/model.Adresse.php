<?php
class Adresse extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Straße;
public $Hausnummer;
public $Postleitzahl;
public $Ortschaft;
public $Breitengrad;
public $Laengengrad;
public $DistanzzurStadt;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Adresse (`Straße` , `Hausnummer` , `Postleitzahl` , `Ortschaft` , `Breitengrad` , `Laengengrad` , `DistanzzurStadt` ) VALUES (?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Adresse SET `Straße` =?, `Hausnummer` =?, `Postleitzahl` =?, `Ortschaft` =?, `Breitengrad` =?, `Laengengrad` =?, `DistanzzurStadt` =? where id=?';
const SQL_SELECT_PK='SELECT Adresse.`c_ts` as `c_ts`, Adresse.`m_ts` as `m_ts`, Adresse.`id` as `id`, `Adresse`.`Straße` as `Straße`, `Adresse`.`Hausnummer` as `Hausnummer`, `Adresse`.`Postleitzahl` as `Postleitzahl`, `Adresse`.`Ortschaft` as `Ortschaft`, `Adresse`.`Breitengrad` as `Breitengrad`, `Adresse`.`Laengengrad` as `Laengengrad`, `Adresse`.`DistanzzurStadt` as `DistanzzurStadt` from Adresse where Adresse.`id` = ?';
const SQL_SELECT_ALL='SELECT Adresse.`c_ts` as `c_ts`, Adresse.`m_ts` as `m_ts`, Adresse.`id` as `id`, `Adresse`.`Straße` as `Straße`, `Adresse`.`Hausnummer` as `Hausnummer`, `Adresse`.`Postleitzahl` as `Postleitzahl`, `Adresse`.`Ortschaft` as `Ortschaft`, `Adresse`.`Breitengrad` as `Breitengrad`, `Adresse`.`Laengengrad` as `Laengengrad`, `Adresse`.`DistanzzurStadt` as `DistanzzurStadt` from Adresse';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Adresse.`c_ts` as `c_ts`, Adresse.`m_ts` as `m_ts`, Adresse.`id` as `id`, `Adresse`.`Straße` as `Straße`, `Adresse`.`Hausnummer` as `Hausnummer`, `Adresse`.`Postleitzahl` as `Postleitzahl`, `Adresse`.`Ortschaft` as `Ortschaft`, `Adresse`.`Breitengrad` as `Breitengrad`, `Adresse`.`Laengengrad` as `Laengengrad`, `Adresse`.`DistanzzurStadt` as `DistanzzurStadt` from Adresse';
const SQL_DELETE='DELETE FROM Adresse WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function formatiert ($return){
//Hier ist Platz für die Funktion formatiert
}
const SQL_SELECT_Unterkunft_b='select Adresse.id as id, Adresse.Straße as Straße, Adresse.Hausnummer as Hausnummer, Adresse.Postleitzahl as Postleitzahl, Adresse.Ortschaft as Ortschaft, Adresse.Breitengrad as Breitengrad, Adresse.Laengengrad as Laengengrad, Adresse.DistanzzurStadt as DistanzzurStadt from Adresse where Adresse.id = ?';
}

Adresse::$dataScheme=db::buildScheme("Adresse");
$fp = fopen("models/json/Adresse_complete.json", "w");
fwrite($fp, json_encode(Adresse::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Adresse::$settings=db::loadSettings("Adresse");
$fp = fopen("models/json/Adresse_settings_complete.json", "w");
fwrite($fp, json_encode(Adresse::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
