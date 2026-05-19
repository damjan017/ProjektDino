<?php
class UnterkunftsartT extends DB{
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
const SQL_INSERT='INSERT INTO UnterkunftsartT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE UnterkunftsartT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT UnterkunftsartT.* FROM UnterkunftsartT WHERE id=?';
const SQL_SELECT_ALL='SELECT UnterkunftsartT.* FROM UnterkunftsartT';
const SQL_DELETE='DELETE FROM UnterkunftsartT WHERE id=?';
const SQL_PRIMARY='id';
}
UnterkunftsartT::$dataScheme=db::buildScheme("UnterkunftsartT");
$fp = fopen("models/json/UnterkunftsartT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("UnterkunftsartT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
UnterkunftsartT::$settings=db::loadSettings("UnterkunftsartT");
$fp = fopen("models/json/UnterkunftsartT_settings_complete.json", "w");
fwrite($fp, json_encode(UnterkunftsartT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
