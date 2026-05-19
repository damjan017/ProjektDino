<?php
class Hotelier extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Name;
public $Vorname;
public $Email;
public $Passwort;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Hotelier (`Name` , `Vorname` , `Email` , `Passwort` ) VALUES (?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Hotelier SET `Name` =?, `Vorname` =?, `Email` =?, `Passwort` =? where id=?';
const SQL_SELECT_PK='SELECT Hotelier.`c_ts` as `c_ts`, Hotelier.`m_ts` as `m_ts`, Hotelier.`id` as `id`, `Hotelier`.`Name` as `Name`, `Hotelier`.`Vorname` as `Vorname`, `Hotelier`.`Email` as `Email`, `Hotelier`.`Passwort` as `Passwort` from Hotelier where Hotelier.`id` = ?';
const SQL_SELECT_ALL='SELECT Hotelier.`c_ts` as `c_ts`, Hotelier.`m_ts` as `m_ts`, Hotelier.`id` as `id`, `Hotelier`.`Name` as `Name`, `Hotelier`.`Vorname` as `Vorname`, `Hotelier`.`Email` as `Email`, `Hotelier`.`Passwort` as `Passwort` from Hotelier';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Hotelier.`c_ts` as `c_ts`, Hotelier.`m_ts` as `m_ts`, Hotelier.`id` as `id`, `Hotelier`.`Name` as `Name`, `Hotelier`.`Vorname` as `Vorname`, `Hotelier`.`Email` as `Email`, `Hotelier`.`Passwort` as `Passwort` from Hotelier';
const SQL_DELETE='DELETE FROM Hotelier WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function login ($return){
//Hier ist Platz für die Funktion login
}
public function logout ($return){
//Hier ist Platz für die Funktion logout
}
const SQL_SELECT_Buchung_a='select Hotelier.id as id, Hotelier.Name as Name, Hotelier.Vorname as Vorname, Hotelier.Email as Email, Hotelier.Passwort as Passwort from Hotelier where Hotelier.id = ?';
const SQL_SELECT_Unterkunft_a='select Hotelier.id as id, Hotelier.Name as Name, Hotelier.Vorname as Vorname, Hotelier.Email as Email, Hotelier.Passwort as Passwort from Hotelier where Hotelier.id = ?';
}

Hotelier::$dataScheme=db::buildScheme("Hotelier");
$fp = fopen("models/json/Hotelier_complete.json", "w");
fwrite($fp, json_encode(Hotelier::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Hotelier::$settings=db::loadSettings("Hotelier");
$fp = fopen("models/json/Hotelier_settings_complete.json", "w");
fwrite($fp, json_encode(Hotelier::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
