<?php
include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  return;
}




$izraz = $veza->prepare("
 
 select sifra,ime,prezime
 from vlasnik 
 where concat(ime, ' ', prezime) like :uvjet
  order by b.prezime, b.ime limit 10
 ");
 $izraz->execute(array(
        "uvjet" => "%" . $_GET["term"] . "%"
        
    ));
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 
 
 $p = new stdClass();
 $p->sifra=0;
 $p->ime="Novi";
 $p->prezime="Vlasnik";
 

 $rezultati[]=$p;

 echo json_encode($rezultati);