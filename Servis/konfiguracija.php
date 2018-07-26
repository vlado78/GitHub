<?php
session_start();
$putanjaAPP="/Servis/";
$nazivAPP="Moj mali servis";
$idAPP="Servis";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Servis/";
    $bojaOkvira="style=\"background-color: blue;\"";
    break;
    case "vladimir.byethost33.com":
    $putanjaAPP="/PP17/";
    $bojaIzbornika="";
    break;
}

$veza = new PDO("mysql:host=localhost;dbname=autoservis","edunova","edunova");
$veza->exec("set names utf8;");
