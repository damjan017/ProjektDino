<?php
class Buchung extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $checkin;
public $checkout;
public $AnzahlGaeste;
public $Gesamtpreis;
public $Zahlungsart;
public $Zahlungsbetrag;
public $Status;
public $_Hotelier;
public $_Kunde;
public $_Zimmertyp;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Buchung (_Hotelier, _Kunde, _Zimmertyp, `checkin` , `checkout` , `AnzahlGaeste` , `Gesamtpreis` , `Zahlungsart` , `Zahlungsbetrag` , `Status` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Buchung SET _Hotelier=?, _Kunde=?, _Zimmertyp=?, `checkin` =?, `checkout` =?, `AnzahlGaeste` =?, `Gesamtpreis` =?, `Zahlungsart` =?, `Zahlungsbetrag` =?, `Status` =? where id=?';
const SQL_SELECT_PK='SELECT Buchung.`c_ts` as `c_ts`, Buchung.`m_ts` as `m_ts`, Buchung.`id` as `id`, Buchung._Hotelier as _Hotelier, Buchung._Kunde as _Kunde, Buchung._Zimmertyp as _Zimmertyp, `Buchung`.`checkin` as `checkin`, `Buchung`.`checkout` as `checkout`, `Buchung`.`AnzahlGaeste` as `AnzahlGaeste`, `Buchung`.`Gesamtpreis` as `Gesamtpreis`, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, `Buchung`.`Zahlungsbetrag` as `Zahlungsbetrag`, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id`  where Buchung.`id` = ?';
const SQL_SELECT_ALL='SELECT Buchung.`c_ts` as `c_ts`, Buchung.`m_ts` as `m_ts`, Buchung.`id` as `id`, Buchung._Hotelier as _Hotelier, Buchung._Kunde as _Kunde, Buchung._Zimmertyp as _Zimmertyp, `Buchung`.`checkin` as `checkin`, `Buchung`.`checkout` as `checkout`, `Buchung`.`AnzahlGaeste` as `AnzahlGaeste`, `Buchung`.`Gesamtpreis` as `Gesamtpreis`, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, `Buchung`.`Zahlungsbetrag` as `Zahlungsbetrag`, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Buchung.`c_ts` as `c_ts`, Buchung.`m_ts` as `m_ts`, Buchung.`id` as `id`, Buchung._Hotelier as _Hotelier, Buchung._Kunde as _Kunde, Buchung._Zimmertyp as _Zimmertyp, `Buchung`.`checkin` as `checkin`, `Buchung`.`checkout` as `checkout`, `Buchung`.`AnzahlGaeste` as `AnzahlGaeste`, `Buchung`.`Gesamtpreis` as `Gesamtpreis`, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, `Buchung`.`Zahlungsbetrag` as `Zahlungsbetrag`, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id` ';
const SQL_DELETE='DELETE FROM Buchung WHERE id=?';
const SQL_PRIMARY='id';

//Operationen:
public function berechnungGesamtpreis ($return){
//Hier ist Platz für die Funktion berechnungGesamtpreis
}
public function bestaetigung ($return){
//Hier ist Platz für die Funktion bestaetigung
}
public function stornieren ($return){
//Hier ist Platz für die Funktion stornieren
}
const SQL_SELECT_Hotelier='select Buchung.id as id, Buchung.checkin as checkin, Buchung.checkout as checkout, Buchung.AnzahlGaeste as AnzahlGaeste, Buchung.Gesamtpreis as Gesamtpreis, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, Buchung.Zahlungsbetrag as Zahlungsbetrag, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id`  where Buchung._Hotelier = ?';
const SQL_SELECT_Kunde='select Buchung.id as id, Buchung.checkin as checkin, Buchung.checkout as checkout, Buchung.AnzahlGaeste as AnzahlGaeste, Buchung.Gesamtpreis as Gesamtpreis, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, Buchung.Zahlungsbetrag as Zahlungsbetrag, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id`  where Buchung._Kunde = ?';
const SQL_SELECT_Mitgast_a='select Buchung.id as id, Buchung.checkin as checkin, Buchung.checkout as checkout, Buchung.AnzahlGaeste as AnzahlGaeste, Buchung.Gesamtpreis as Gesamtpreis, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, Buchung.Zahlungsbetrag as Zahlungsbetrag, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id`  where Buchung.id = ?';
const SQL_SELECT_Zimmertyp='select Buchung.id as id, Buchung.checkin as checkin, Buchung.checkout as checkout, Buchung.AnzahlGaeste as AnzahlGaeste, Buchung.Gesamtpreis as Gesamtpreis, `ZahlungsartT0`.`literal` as `Zahlungsart_literal`, `Buchung`.`Zahlungsart` as `Zahlungsart`, Buchung.Zahlungsbetrag as Zahlungsbetrag, `StatusT1`.`literal` as `Status_literal`, `Buchung`.`Status` as `Status` from Buchung left join `ZahlungsartT` as ZahlungsartT0 on `Buchung`.`Zahlungsart` = `ZahlungsartT0`.`id`  left join `StatusT` as StatusT1 on `Buchung`.`Status` = `StatusT1`.`id`  where Buchung._Zimmertyp = ?';
}

Buchung::$dataScheme=db::buildScheme("Buchung");
$fp = fopen("models/json/Buchung_complete.json", "w");
fwrite($fp, json_encode(Buchung::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Buchung::$settings=db::loadSettings("Buchung");
$fp = fopen("models/json/Buchung_settings_complete.json", "w");
fwrite($fp, json_encode(Buchung::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
