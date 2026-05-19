<?php
class Ausstattung extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Bezeichnung;
public $Kategorie;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Ausstattung (`Bezeichnung` , `Kategorie` ) VALUES (?, ?)';
const SQL_UPDATE='UPDATE Ausstattung SET `Bezeichnung` =?, `Kategorie` =? where id=?';
const SQL_SELECT_PK='SELECT Ausstattung.`c_ts` as `c_ts`, Ausstattung.`m_ts` as `m_ts`, Ausstattung.`id` as `id`, `Ausstattung`.`Bezeichnung` as `Bezeichnung`, `AusstattungskategorieT0`.`literal` as `Kategorie_literal`, `Ausstattung`.`Kategorie` as `Kategorie` from Ausstattung left join `AusstattungskategorieT` as AusstattungskategorieT0 on `Ausstattung`.`Kategorie` = `AusstattungskategorieT0`.`id`  where Ausstattung.`id` = ?';
const SQL_SELECT_ALL='SELECT Ausstattung.`c_ts` as `c_ts`, Ausstattung.`m_ts` as `m_ts`, Ausstattung.`id` as `id`, `Ausstattung`.`Bezeichnung` as `Bezeichnung`, `AusstattungskategorieT0`.`literal` as `Kategorie_literal`, `Ausstattung`.`Kategorie` as `Kategorie` from Ausstattung left join `AusstattungskategorieT` as AusstattungskategorieT0 on `Ausstattung`.`Kategorie` = `AusstattungskategorieT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Ausstattung.`c_ts` as `c_ts`, Ausstattung.`m_ts` as `m_ts`, Ausstattung.`id` as `id`, `Ausstattung`.`Bezeichnung` as `Bezeichnung`, `AusstattungskategorieT0`.`literal` as `Kategorie_literal`, `Ausstattung`.`Kategorie` as `Kategorie` from Ausstattung left join `AusstattungskategorieT` as AusstattungskategorieT0 on `Ausstattung`.`Kategorie` = `AusstattungskategorieT0`.`id` ';
const SQL_DELETE='DELETE FROM Ausstattung WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Unterkunft_a = 'select Ausstattung.id as id, Unterkunft_Ausstattung.id as zwkls_id, Ausstattung.Bezeichnung as Bezeichnung, `AusstattungskategorieT0`.`literal` as `Kategorie_literal`, `Ausstattung`.`Kategorie` as `Kategorie` from Ausstattung inner join Unterkunft_Ausstattung on Ausstattung.id = Unterkunft_Ausstattung._Ausstattung_b  left join `AusstattungskategorieT` as AusstattungskategorieT0 on `Ausstattung`.`Kategorie` = `AusstattungskategorieT0`.`id`   where Unterkunft_Ausstattung._Unterkunft_a = ?';
}

Ausstattung::$dataScheme=db::buildScheme("Ausstattung");
$fp = fopen("models/json/Ausstattung_complete.json", "w");
fwrite($fp, json_encode(Ausstattung::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Ausstattung::$settings=db::loadSettings("Ausstattung");
$fp = fopen("models/json/Ausstattung_settings_complete.json", "w");
fwrite($fp, json_encode(Ausstattung::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
