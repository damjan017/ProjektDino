<?php
class Kunde extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Nachname;
public $Vorname;
public $Email;
public $Geburtsdatum;
public $Personalausweisnrummer;
public $_User_uid;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Kunde (_User_uid, `Nachname` , `Vorname` , `Email` , `Geburtsdatum` , `Personalausweisnrummer` ) VALUES (?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Kunde SET _User_uid=?, `Nachname` =?, `Vorname` =?, `Email` =?, `Geburtsdatum` =?, `Personalausweisnrummer` =? where id=?';
const SQL_SELECT_PK='SELECT Kunde.`c_ts` as `c_ts`, Kunde.`m_ts` as `m_ts`, Kunde.`id` as `id`, Kunde._User_uid as _User_uid, `Kunde`.`Nachname` as `Nachname`, `Kunde`.`Vorname` as `Vorname`, `Kunde`.`Email` as `Email`, `Kunde`.`Geburtsdatum` as `Geburtsdatum`, `Kunde`.`Personalausweisnrummer` as `Personalausweisnrummer` from Kunde where Kunde.`id` = ?';
const SQL_SELECT_ALL='SELECT Kunde.`c_ts` as `c_ts`, Kunde.`m_ts` as `m_ts`, Kunde.`id` as `id`, Kunde._User_uid as _User_uid, `Kunde`.`Nachname` as `Nachname`, `Kunde`.`Vorname` as `Vorname`, `Kunde`.`Email` as `Email`, `Kunde`.`Geburtsdatum` as `Geburtsdatum`, `Kunde`.`Personalausweisnrummer` as `Personalausweisnrummer` from Kunde';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Kunde.`c_ts` as `c_ts`, Kunde.`m_ts` as `m_ts`, Kunde.`id` as `id`, Kunde._User_uid as _User_uid, `Kunde`.`Nachname` as `Nachname`, `Kunde`.`Vorname` as `Vorname`, `Kunde`.`Email` as `Email`, `Kunde`.`Geburtsdatum` as `Geburtsdatum`, `Kunde`.`Personalausweisnrummer` as `Personalausweisnrummer` from Kunde';
const SQL_DELETE='DELETE FROM Kunde WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function registrieren ($return){
//Hier ist Platz für die Funktion registrieren
}
public function pruefeAlter ($return){
//Hier ist Platz für die Funktion pruefeAlter
}
const SQL_SELECT_Buchung_b='select Kunde.id as id, Kunde.Nachname as Nachname, Kunde.Vorname as Vorname, Kunde.Email as Email, Kunde.Geburtsdatum as Geburtsdatum, Kunde.Personalausweisnrummer as Personalausweisnrummer from Kunde where Kunde.id = ?';
const SQL_SELECT_User_uid='select Kunde.id as id, Kunde.Nachname as Nachname, Kunde.Vorname as Vorname, Kunde.Email as Email, Kunde.Geburtsdatum as Geburtsdatum, Kunde.Personalausweisnrummer as Personalausweisnrummer from Kunde where Kunde._User_uid=?';
}

Kunde::$dataScheme=db::buildScheme("Kunde");
$fp = fopen("models/json/Kunde_complete.json", "w");
fwrite($fp, json_encode(Kunde::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Kunde::$settings=db::loadSettings("Kunde");
$fp = fopen("models/json/Kunde_settings_complete.json", "w");
fwrite($fp, json_encode(Kunde::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
