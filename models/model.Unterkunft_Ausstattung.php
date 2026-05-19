<?php
class Unterkunft_Ausstattung extends DB{
//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public $_Unterkunft_a;
public $_Ausstattung_b;
public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
//Konstanten
const SQL_INSERT='INSERT INTO Unterkunft_Ausstattung (_Unterkunft_a, _Ausstattung_b) VALUES (?, ?)';
const SQL_DELETE='DELETE FROM Unterkunft_Ausstattung WHERE id=?';
const SQL_PRIMARY='id';
}
