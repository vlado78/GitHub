<?php



if(trim($_POST["ime"])===""){
  $greske["ime"]="Obavezno unos imena ";
}

if(strlen($_POST["ime"])>50){
  $greske["ime"]="Ime smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["ime"]) . " znakova";
}


if(trim($_POST["prezime"])===""){
  $greske["prezime"]="Obavezno unos prezimena";
}

if(strlen($_POST["prezime"])>50){
  $greske["prezime"]="Prezime smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["prezime"]) . " znakova";
}

