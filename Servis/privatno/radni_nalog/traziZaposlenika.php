<?php
include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  return;
}


if(!isset($_GET["term"])){
    return;
}

$izraz = $veza->prepare("
 
 select sifra, ime, prezime
 from zaposlenik 
 where concat(ime, ' ', prezime) like :uvjet

 and sifra not in (select zaposlenik from zaposlenik_radni_nalog 
 where radni_nalog=:radni_nalog)
 order by prezime, ime limit 10
 ");
 $izraz->execute(array(
        "uvjet" => "%" . $_GET["term"] . "%",
        "radni_nalog" => $_GET["sifraRadnogNaloga"]
    ));
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 
 $p = new stdClass();
 $p->sifra=0;
 $p->ime="Novi";
 $p->prezime="Polaznik";

 
 $rezultati[]=$p;

 echo json_encode($rezultati);