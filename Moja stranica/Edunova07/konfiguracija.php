<?php

$nazivAPP="Edunova V1";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Edunova07/";
    $bojaIzbornika="style=\"background-color: blue;\"";
    break;
    case "edunovanastava.byethost33.com":
    $putanjaAPP="/PP17/";
    $bojaIzbornika="";
    break;
}



