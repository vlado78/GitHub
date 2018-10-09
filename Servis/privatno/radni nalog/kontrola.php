<?php

if(trim($_POST["radionica"])===""){
    $greske["radionica"]="Obavezno odaberite radionicu";
  }

  if(trim($_POST["zaposlenik"])===""){
    $greske["zaposlenik"]="Obavezno odaberite zaposlenika";
  }

  if(trim($_POST["vozilo"])===""){
    $greske["vozilo"]="Obavezno odaberite vozilo";
  }

  
 
 
  
 

  if(!empty($_POST["datumpocetka"])){
    $dateTime = DateTime::createFromFormat('Y-m-d', $_POST["datumpocetka"]);
    if(!$dateTime){
      $greske["datumpocetka"]="Datum nije u dobrom formatu, molimo unijeti dd.MM.yyyy. (npr. za danas " . date("d.m.Y.") . ")";
    }
  }
