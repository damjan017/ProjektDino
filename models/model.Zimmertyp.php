<?php
class Zimmertyp extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Bezeichnung;
public $Anzahltbett;
public $ArtBett;
public $Preis;
public $Aktionspreis;
public $Aktionaktiv;
public $Bild;
public $AnzahlVerfuegbarkeit;
public $_Unterkunft;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Zimmertyp (_Unterkunft, `Bezeichnung` , `Anzahltbett` , `ArtBett` , `Preis` , `Aktionspreis` , `Aktionaktiv` , `Bild` , `AnzahlVerfuegbarkeit` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Zimmertyp SET _Unterkunft=?, `Bezeichnung` =?, `Anzahltbett` =?, `ArtBett` =?, `Preis` =?, `Aktionspreis` =?, `Aktionaktiv` =?, `Bild` =?, `AnzahlVerfuegbarkeit` =? where id=?';
const SQL_SELECT_PK='SELECT Zimmertyp.`c_ts` as `c_ts`, Zimmertyp.`m_ts` as `m_ts`, Zimmertyp.`id` as `id`, Zimmertyp._Unterkunft as _Unterkunft, `ZimmertypT0`.`literal` as `Bezeichnung_literal`, `Zimmertyp`.`Bezeichnung` as `Bezeichnung`, `Zimmertyp`.`Anzahltbett` as `Anzahltbett`, `Zimmertyp`.`ArtBett` as `ArtBett`, `Zimmertyp`.`Preis` as `Preis`, `Zimmertyp`.`Aktionspreis` as `Aktionspreis`, `Zimmertyp`.`Aktionaktiv` as `Aktionaktiv`, `Zimmertyp`.`Bild` as `Bild`, `Zimmertyp`.`AnzahlVerfuegbarkeit` as `AnzahlVerfuegbarkeit` from Zimmertyp left join `ZimmertypT` as ZimmertypT0 on `Zimmertyp`.`Bezeichnung` = `ZimmertypT0`.`id`  where Zimmertyp.`id` = ?';
const SQL_SELECT_ALL='SELECT Zimmertyp.`c_ts` as `c_ts`, Zimmertyp.`m_ts` as `m_ts`, Zimmertyp.`id` as `id`, Zimmertyp._Unterkunft as _Unterkunft, `ZimmertypT0`.`literal` as `Bezeichnung_literal`, `Zimmertyp`.`Bezeichnung` as `Bezeichnung`, `Zimmertyp`.`Anzahltbett` as `Anzahltbett`, `Zimmertyp`.`ArtBett` as `ArtBett`, `Zimmertyp`.`Preis` as `Preis`, `Zimmertyp`.`Aktionspreis` as `Aktionspreis`, `Zimmertyp`.`Aktionaktiv` as `Aktionaktiv`, `Zimmertyp`.`Bild` as `Bild`, `Zimmertyp`.`AnzahlVerfuegbarkeit` as `AnzahlVerfuegbarkeit` from Zimmertyp left join `ZimmertypT` as ZimmertypT0 on `Zimmertyp`.`Bezeichnung` = `ZimmertypT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Zimmertyp.`c_ts` as `c_ts`, Zimmertyp.`m_ts` as `m_ts`, Zimmertyp.`id` as `id`, Zimmertyp._Unterkunft as _Unterkunft, `ZimmertypT0`.`literal` as `Bezeichnung_literal`, `Zimmertyp`.`Bezeichnung` as `Bezeichnung`, `Zimmertyp`.`Anzahltbett` as `Anzahltbett`, `Zimmertyp`.`ArtBett` as `ArtBett`, `Zimmertyp`.`Preis` as `Preis`, `Zimmertyp`.`Aktionspreis` as `Aktionspreis`, `Zimmertyp`.`Aktionaktiv` as `Aktionaktiv`, `Zimmertyp`.`Bild` as `Bild`, `Zimmertyp`.`AnzahlVerfuegbarkeit` as `AnzahlVerfuegbarkeit` from Zimmertyp left join `ZimmertypT` as ZimmertypT0 on `Zimmertyp`.`Bezeichnung` = `ZimmertypT0`.`id` ';
const SQL_DELETE='DELETE FROM Zimmertyp WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function berechneVerfuegbarkeit ($return, $von, $bis){
//Hier ist Platz für die Funktion berechneVerfuegbarkeit
}
public function berechnePreis ($return){
//Hier ist Platz für die Funktion berechnePreis
}
const SQL_SELECT_Buchung_b='select Zimmertyp.id as id, `ZimmertypT0`.`literal` as `Bezeichnung_literal`, `Zimmertyp`.`Bezeichnung` as `Bezeichnung`, Zimmertyp.Anzahltbett as Anzahltbett, Zimmertyp.ArtBett as ArtBett, Zimmertyp.Preis as Preis, Zimmertyp.Aktionspreis as Aktionspreis, Zimmertyp.Aktionaktiv as Aktionaktiv, Zimmertyp.Bild as Bild, Zimmertyp.AnzahlVerfuegbarkeit as AnzahlVerfuegbarkeit from Zimmertyp left join `ZimmertypT` as ZimmertypT0 on `Zimmertyp`.`Bezeichnung` = `ZimmertypT0`.`id`  where Zimmertyp.id = ?';
const SQL_SELECT_Unterkunft='select Zimmertyp.id as id, `ZimmertypT0`.`literal` as `Bezeichnung_literal`, `Zimmertyp`.`Bezeichnung` as `Bezeichnung`, Zimmertyp.Anzahltbett as Anzahltbett, Zimmertyp.ArtBett as ArtBett, Zimmertyp.Preis as Preis, Zimmertyp.Aktionspreis as Aktionspreis, Zimmertyp.Aktionaktiv as Aktionaktiv, Zimmertyp.Bild as Bild, Zimmertyp.AnzahlVerfuegbarkeit as AnzahlVerfuegbarkeit from Zimmertyp left join `ZimmertypT` as ZimmertypT0 on `Zimmertyp`.`Bezeichnung` = `ZimmertypT0`.`id`  where Zimmertyp._Unterkunft = ?';
}

Zimmertyp::$dataScheme=db::buildScheme("Zimmertyp");
$fp = fopen("models/json/Zimmertyp_complete.json", "w");
fwrite($fp, json_encode(Zimmertyp::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Zimmertyp::$settings=db::loadSettings("Zimmertyp");
$fp = fopen("models/json/Zimmertyp_settings_complete.json", "w");
fwrite($fp, json_encode(Zimmertyp::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
