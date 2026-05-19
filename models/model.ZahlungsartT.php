<?php
class ZahlungsartT extends DB{
//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public $literal;
public $sort;
public static $settings=array();
public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
//Konstanten
const SQL_INSERT='INSERT INTO ZahlungsartT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE ZahlungsartT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT ZahlungsartT.* FROM ZahlungsartT WHERE id=?';
const SQL_SELECT_ALL='SELECT ZahlungsartT.* FROM ZahlungsartT';
const SQL_DELETE='DELETE FROM ZahlungsartT WHERE id=?';
const SQL_PRIMARY='id';
}
ZahlungsartT::$dataScheme=db::buildScheme("ZahlungsartT");
$fp = fopen("models/json/ZahlungsartT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("ZahlungsartT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
ZahlungsartT::$settings=db::loadSettings("ZahlungsartT");
$fp = fopen("models/json/ZahlungsartT_settings_complete.json", "w");
fwrite($fp, json_encode(ZahlungsartT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
