<?php
class ZimmertypT extends DB{
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
const SQL_INSERT='INSERT INTO ZimmertypT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE ZimmertypT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT ZimmertypT.* FROM ZimmertypT WHERE id=?';
const SQL_SELECT_ALL='SELECT ZimmertypT.* FROM ZimmertypT';
const SQL_DELETE='DELETE FROM ZimmertypT WHERE id=?';
const SQL_PRIMARY='id';
}
ZimmertypT::$dataScheme=db::buildScheme("ZimmertypT");
$fp = fopen("models/json/ZimmertypT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("ZimmertypT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
ZimmertypT::$settings=db::loadSettings("ZimmertypT");
$fp = fopen("models/json/ZimmertypT_settings_complete.json", "w");
fwrite($fp, json_encode(ZimmertypT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
