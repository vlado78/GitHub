<?php

session_start();
include_once "funkcije.php";

$nazivAPP="Edunova V1";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Edunova07/";
    $bojaIzbornika="style=\"background-color: blue;\"";
    break;
    case "vladimir.byethost17.com":
    $putanjaAPP="/Edunova07_01/";
    $bojaIzbornika="";
    break;
}




