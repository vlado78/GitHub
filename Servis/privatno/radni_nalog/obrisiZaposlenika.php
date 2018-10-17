<?php
include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  return;
}

if(!isset($_POST["radni_nalog"])){
    return;
}

$izraz = $veza->prepare("
 
delete from zaposlenik_radni_nalog where radni_nalog=:radni_nalog and zaposlenik=:zaposlenik
 ");
 $izraz->execute($_POST);

 echo "OK";