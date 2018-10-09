<?php

if(trim($_POST["naziv"])===""){
    $greske["naziv"]="Obavezno unos naziva radionice";
  }
 
  if(strlen($_POST["naziv"])>50){
    $greske["naziv"]="Naziv smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["naziv"]) . " znakova";
  }

  
 

  if(!empty($_POST["datumpocetka"])){
    $dateTime = DateTime::createFromFormat('Y-m-d', $_POST["datumpocetka"]);
    if(!$dateTime){
      $greske["datumpocetka"]="Datum nije u dobrom formatu, molimo unijeti dd.MM.yyyy. (npr. za danas " . date("d.m.Y.") . ")";
    }
  }
