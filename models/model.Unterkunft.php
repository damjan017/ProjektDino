<?php
class Unterkunft extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Unterkunftsart;
public $Name;
public $Bild;
public $Beschreibung;
public $Bewertung;
public $_Adresse;
public $_Hotelier;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Unterkunft (_Adresse, _Hotelier, `Unterkunftsart` , `Name` , `Bild` , `Beschreibung` , `Bewertung` ) VALUES (?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Unterkunft SET _Adresse=?, _Hotelier=?, `Unterkunftsart` =?, `Name` =?, `Bild` =?, `Beschreibung` =?, `Bewertung` =? where id=?';
const SQL_SELECT_PK='SELECT Unterkunft.`c_ts` as `c_ts`, Unterkunft.`m_ts` as `m_ts`, Unterkunft.`id` as `id`, Unterkunft._Adresse as _Adresse, Unterkunft._Hotelier as _Hotelier, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, `Unterkunft`.`Name` as `Name`, `Unterkunft`.`Bild` as `Bild`, `Unterkunft`.`Beschreibung` as `Beschreibung`, `Unterkunft`.`Bewertung` as `Bewertung` from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id`  where Unterkunft.`id` = ?';
const SQL_SELECT_ALL='SELECT Unterkunft.`c_ts` as `c_ts`, Unterkunft.`m_ts` as `m_ts`, Unterkunft.`id` as `id`, Unterkunft._Adresse as _Adresse, Unterkunft._Hotelier as _Hotelier, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, `Unterkunft`.`Name` as `Name`, `Unterkunft`.`Bild` as `Bild`, `Unterkunft`.`Beschreibung` as `Beschreibung`, `Unterkunft`.`Bewertung` as `Bewertung` from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Unterkunft.`c_ts` as `c_ts`, Unterkunft.`m_ts` as `m_ts`, Unterkunft.`id` as `id`, Unterkunft._Adresse as _Adresse, Unterkunft._Hotelier as _Hotelier, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, `Unterkunft`.`Name` as `Name`, `Unterkunft`.`Bild` as `Bild`, `Unterkunft`.`Beschreibung` as `Beschreibung`, `Unterkunft`.`Bewertung` as `Bewertung` from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id` ';
const SQL_DELETE='DELETE FROM Unterkunft WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function zeigeetails ($return){
//Hier ist Platz für die Funktion zeigeetails
}
const SQL_SELECT_Zimmertyp_b='select Unterkunft.id as id, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, Unterkunft.Name as Name, Unterkunft.Bild as Bild, Unterkunft.Beschreibung as Beschreibung, Unterkunft.Bewertung as Bewertung from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id`  where Unterkunft.id = ?';
const SQL_SELECT_Adresse='select Unterkunft.id as id, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, Unterkunft.Name as Name, Unterkunft.Bild as Bild, Unterkunft.Beschreibung as Beschreibung, Unterkunft.Bewertung as Bewertung from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id`  where Unterkunft._Adresse = ?';
const SQL_SELECT_Hotelier='select Unterkunft.id as id, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, Unterkunft.Name as Name, Unterkunft.Bild as Bild, Unterkunft.Beschreibung as Beschreibung, Unterkunft.Bewertung as Bewertung from Unterkunft left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id`  where Unterkunft._Hotelier = ?';
const SQL_SELECT_Ausstattung_b = 'select Unterkunft.id as id, Unterkunft_Ausstattung.id as zwkls_id, `UnterkunftsartT0`.`literal` as `Unterkunftsart_literal`, `Unterkunft`.`Unterkunftsart` as `Unterkunftsart`, Unterkunft.Name as Name, Unterkunft.Bild as Bild, Unterkunft.Beschreibung as Beschreibung, Unterkunft.Bewertung as Bewertung from Unterkunft inner join Unterkunft_Ausstattung on Unterkunft.id = Unterkunft_Ausstattung._Unterkunft_a  left join `UnterkunftsartT` as UnterkunftsartT0 on `Unterkunft`.`Unterkunftsart` = `UnterkunftsartT0`.`id`   where Unterkunft_Ausstattung._Ausstattung_b = ?';
}

Unterkunft::$dataScheme=db::buildScheme("Unterkunft");
$fp = fopen("models/json/Unterkunft_complete.json", "w");
fwrite($fp, json_encode(Unterkunft::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Unterkunft::$settings=db::loadSettings("Unterkunft");
$fp = fopen("models/json/Unterkunft_settings_complete.json", "w");
fwrite($fp, json_encode(Unterkunft::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
