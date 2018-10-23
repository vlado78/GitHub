<?php
include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  return;
}


if(!isset($_GET["term"])){
    return;
}

$izraz = $veza->prepare("
 
 select a.sifra, a.ime, a.prezime,b.naziv as radionica
 from zaposlenik a left join radionica b on a.radionica=b.sifra
 where concat(a.ime, ' ', a.prezime,' ',b.naziv) like :uvjet

 and a.sifra not in 
 (select zaposlenik from zaposlenik_radni_nalog where radni_nalog=:radni_nalog)
 order by a.prezime, a.ime limit 10
 ");
 $izraz->execute(array(
        "uvjet" => "%" . $_GET["term"] . "%",
        "radni_nalog" => $_GET["sifraRadnogNaloga"]
       



    ));
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 


 echo json_encode($rezultati);