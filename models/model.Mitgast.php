<?php
class Mitgast extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Vorname;
public $Nachname;
public $Geburtsdatum;
public $Personalausweisnr;
public $_Buchung;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Mitgast (_Buchung, `Vorname` , `Nachname` , `Geburtsdatum` , `Personalausweisnr` ) VALUES (?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Mitgast SET _Buchung=?, `Vorname` =?, `Nachname` =?, `Geburtsdatum` =?, `Personalausweisnr` =? where id=?';
const SQL_SELECT_PK='SELECT Mitgast.`c_ts` as `c_ts`, Mitgast.`m_ts` as `m_ts`, Mitgast.`id` as `id`, Mitgast._Buchung as _Buchung, `Mitgast`.`Vorname` as `Vorname`, `Mitgast`.`Nachname` as `Nachname`, `Mitgast`.`Geburtsdatum` as `Geburtsdatum`, `Mitgast`.`Personalausweisnr` as `Personalausweisnr` from Mitgast where Mitgast.`id` = ?';
const SQL_SELECT_ALL='SELECT Mitgast.`c_ts` as `c_ts`, Mitgast.`m_ts` as `m_ts`, Mitgast.`id` as `id`, Mitgast._Buchung as _Buchung, `Mitgast`.`Vorname` as `Vorname`, `Mitgast`.`Nachname` as `Nachname`, `Mitgast`.`Geburtsdatum` as `Geburtsdatum`, `Mitgast`.`Personalausweisnr` as `Personalausweisnr` from Mitgast';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Mitgast.`c_ts` as `c_ts`, Mitgast.`m_ts` as `m_ts`, Mitgast.`id` as `id`, Mitgast._Buchung as _Buchung, `Mitgast`.`Vorname` as `Vorname`, `Mitgast`.`Nachname` as `Nachname`, `Mitgast`.`Geburtsdatum` as `Geburtsdatum`, `Mitgast`.`Personalausweisnr` as `Personalausweisnr` from Mitgast';
const SQL_DELETE='DELETE FROM Mitgast WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function alter ($return){
//Hier ist Platz für die Funktion alter
}
const SQL_SELECT_Buchung='select Mitgast.id as id, Mitgast.Vorname as Vorname, Mitgast.Nachname as Nachname, Mitgast.Geburtsdatum as Geburtsdatum, Mitgast.Personalausweisnr as Personalausweisnr from Mitgast where Mitgast._Buchung = ?';
}

Mitgast::$dataScheme=db::buildScheme("Mitgast");
$fp = fopen("models/json/Mitgast_complete.json", "w");
fwrite($fp, json_encode(Mitgast::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Mitgast::$settings=db::loadSettings("Mitgast");
$fp = fopen("models/json/Mitgast_settings_complete.json", "w");
fwrite($fp, json_encode(Mitgast::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
