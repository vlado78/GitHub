<?php
session_start();

$nazivAPP="Moj mali servis";
$idAPP="Servis";
include_once "funkcije.php";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Servis/";
    $bojaOkvira="style=\"background-color: blue;\"";
    $veza = new PDO("mysql:host=localhost;dbname=autoservis","edunova","edunova",array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
    $veza->exec("set names utf8;");
    break;
    
    case "vladimir.byethost17.com":
    $putanjaAPP="/";
    $bojaIzbornika="";
    $veza = new PDO("mysql:host=sql101.byethost.com;dbname=b17_21947030_autoservis","b17_21947030","edunova2018",array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
    $veza->exec("set names utf8;");
    break;
}


