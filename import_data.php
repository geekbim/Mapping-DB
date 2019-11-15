<?php


//connect DB
$dt=array();

$link_db_lama=@mysqli_connect('localhost','root','','minori');
if (!$link_db_lama) {die('bd nc');}
$dt['link_db_lama']=$link_db_lama;

$link_db_baru=@mysqli_connect('localhost','root','','test');
if (!$link_db_baru) {die('bd nc');}
$dt['link_db_baru']=$link_db_baru;


include_once("class_import.php");
$import=new Import($dt);
$dt=$import->ambil_db_lama($dt);
// $dt=$import->isi_data_kota($dt);
$dt=$import->mapping_data_kota($dt);
$dt=$import->olah_data($dt);
$dt=$import->insert_db_baru($dt);

// echo "<pre>".print_r($dt,1)."</pre>";