<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

$stranica=1;
if(isset($_GET["stranica"])){
  $stranica=$_GET["stranica"];
}

$uvjet="";
if(isset($_GET["uvjet"])){
  $uvjet=$_GET["uvjet"];
}

$izraz = $veza->prepare("
 
 select count(a.sifra) 
 from radni_nalog a left join radionica b on a.radionica=b.sifra 
 where concat(a.sifra,' ',b.naziv ) 
 like :uvjet ;
 ");
 $izraz->execute(array("uvjet"=>"%" . $uvjet . "%"));
 $ukupnoRadnihNaloga = $izraz->fetchColumn();
$ukupnoStranica=ceil($ukupnoRadnihNaloga/6);

if($stranica>$ukupnoStranica){
  $stranica=$ukupnoStranica;
}
if($stranica==0){
  $stranica=1;
}


?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "../../predlozak/head.php" ?>
  </head>
  <body>
  <div class="grid-container">

     <?php include_once "../../predlozak/zaglavlje.php" ?>
     <?php include_once "../../predlozak/navbar.php" ?>


<br>
<div class="grid-x">
           
  <div class="cell large-3">
    <h3>Radni nalozi</h3>
  </div>
  <div class="cell large-2"></div>

  <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <div class="input-group input-group-rounded">
  <input class="input-group-field" type="text" placeholder="" name="uvjet" value="<?php echo $uvjet ?>">
  <div class="input-group-button">
    <input type="submit" class="button expanded" value="Traži..">
  </div>
</div>
</form>


  <div class="cell large-2"></div>
  <div class="cell large-2  ">
    <a href="novi.php"  class="button expanded rounded">Dodaj novi radni nalog</a>
  </div>
</div>       


  


 <?php
 
 $izraz = $veza->prepare("
 
 select 
 a.sifra, 
 b.naziv as radionica, 
 
 concat(d.marka_vozila,' ',d.oznaka_modela,' ',d.registarska_oznaka) as vozilo, 
 a.kilometraza, 
 concat(e.ime,' ',e.prezime) as vlasnik,
 a.opis_kvara, 
 a.datum_pocetka, 
 a.datum_zavrsetka, 
 a.napomena
 from radni_nalog a 
 left join radionica b on a.radionica=b.sifra 
 
 left join vozilo d on a.vozilo=d.sifra
 left join vlasnik e on d.vlasnik=e.sifra
 where concat(a.sifra,' ',b.naziv,' ', d.registarska_oznaka) like :uvjet
 
 order by a.datum_pocetka DESC
    limit :stranica, 6

 ");


 $izraz->bindValue("stranica",($stranica*6) - 6,PDO::PARAM_INT);
 $izraz->bindValue("uvjet","%" . $uvjet . "%");
  
  $izraz->execute();
  $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
  
 
 ?>


  
  <div class="cell large-6">
  <table class="responsive-card-table unstriped">
      <thead>
        <tr>
        <th>broj rn</th>
          <th>Radionica</th>
          
          <th>Vozilo</th>
          
          <th>Vlasnik</th>
          <th>Kilometraža</th>
          <th>Opis kvara</th>
          <th>Datum početka</th>
          <th>Datum kraja</th>
          <th>Napomena</th>
          <th>Akcija</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="broj rn"><?php echo $red->sifra; ?></td>
      <td data-label="Radionica"><?php echo $red->radionica; ?></td>
      
      <td data-label="Vozilo"><?php echo $red->vozilo; ?></td>
     
      <td data-label="Vlasnik"><?php echo $red->vlasnik; ?></td>
      <td data-label="Kilometraža"><?php echo ($red->kilometraza !=null) ? ($red->kilometraza) :  "Nije definirano "       ; ?></td>
      <td data-label="Opis kvara"><?php echo ($red->opis_kvara !=null) ? ($red->opis_kvara) :  "Nije definirano "       ; ?></td>
      <td data-label="Datum početka"><?php echo ($red->datum_pocetka!=null) ? date("d.m.Y.",strtotime($red->datum_pocetka)) : "Nije definirano "; ?></td>
      <td data-label="Datum kraja"><?php echo ($red->datum_zavrsetka!=null) ? date("d.m.Y.",strtotime($red->datum_zavrsetka)) : "Nije definirano "; ?></td>
      <td data-label="Napomena"><?php echo ($red->napomena !=null) ? ($red->napomena) :  "Nije definirano "       ; ?></td>
      <td data-label="Akcija">
            <a target="_blank" href="exportPDF.php?sifra=<?php echo $red->sifra; ?>"><i class="far fa-2x fa-file-pdf"></i></a>
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
          
        </td>
      </tr>
      
      
    <?php endforeach;?>
    </tbody>
    </table>

    <?php 
if($ukupnoStranica==0){
  $ukupnoStranica=1;
}
?>
 <nav aria-label="Pagination" class="text-center">
  <ul class="pagination">
  <li class="pagination-previous">
  <a href="index.php?stranica=<?php echo $stranica-1; ?>&uvjet=<?php echo $uvjet ?>" aria-label="Next page">Prethodno <span class="show-for-sr">page</span></a></li>
    <li class="current"><span class="show-for-sr">Trenutno na</span> <?php echo $stranica; ?>/<?php echo $ukupnoStranica; ?></li>
   
    <li class="pagination-next"><a href="index.php?stranica=<?php echo $stranica+1; ?>&uvjet=<?php echo $uvjet ?>" aria-label="Next page">Sljedeće <span class="show-for-sr">page</span></a></li>
  </ul>
</nav>



  </div>

   <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  </body>
  

</html>
