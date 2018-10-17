<?php
include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  return;
}


if(!isset($_POST["radni_nalog"])){
    return;
}

$izraz = $veza->prepare("
 
 insert into zaposlenik_radni_nalog (radni_nalog,zaposlenik) 
 values (:radni_nalog,:zaposlenik)
 ");
 $izraz->execute($_POST);

 echo "OK";