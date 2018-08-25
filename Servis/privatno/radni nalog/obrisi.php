<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(!isset($_GET["sifra"])){
  header("location: " . $putanjaAPP . "index.php");
}




  $izraz = $veza->prepare("delete from radni_nalog
                          where sifra=:sifra;");
  $izraz->execute($_GET);
  header("location: index.php");
