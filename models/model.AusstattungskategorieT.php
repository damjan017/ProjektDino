<?php
class AusstattungskategorieT extends DB{
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
const SQL_INSERT='INSERT INTO AusstattungskategorieT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE AusstattungskategorieT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT AusstattungskategorieT.* FROM AusstattungskategorieT WHERE id=?';
const SQL_SELECT_ALL='SELECT AusstattungskategorieT.* FROM AusstattungskategorieT';
const SQL_DELETE='DELETE FROM AusstattungskategorieT WHERE id=?';
const SQL_PRIMARY='id';
}
AusstattungskategorieT::$dataScheme=db::buildScheme("AusstattungskategorieT");
$fp = fopen("models/json/AusstattungskategorieT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("AusstattungskategorieT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
AusstattungskategorieT::$settings=db::loadSettings("AusstattungskategorieT");
$fp = fopen("models/json/AusstattungskategorieT_settings_complete.json", "w");
fwrite($fp, json_encode(AusstattungskategorieT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
