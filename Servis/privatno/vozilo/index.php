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
 
 select count(sifra) from vlasnik where concat(ime, ' ', prezime) like :uvjet ;
 ");
 $izraz->execute(array("uvjet"=>"%" . $uvjet . "%"));
 $ukupnoVlasnika = $izraz->fetchColumn();
$ukupnoStranica=ceil($ukupnoVlasnika/10);

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
    <h3>Vozila</h3>
  </div>

  <div class="cell large-2"></div>

  <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <div class="input-group input-group-rounded">
  <input class="input-group-field" type="text" name="uvjet" value="<?php echo $uvjet ?>">
  <div class="input-group-button">
    <input type="submit" class="button expanded" value="Traži..">
  </div>
</div>
</form>


 
<div class="cell large-2"></div>
  <div class="cell large-2">
    <a href="novi.php"  class="button expanded">Dodaj novo vozilo</a>
  </div>
  </div> 




 <?php
 
 $izraz = $veza->prepare("
  
 select a.sifra,
  a.broj_sasije , 
 concat (b.ime,' ', b.prezime) as vlasnik  ,
  a.datum_prve_registracije ,
  a.registarska_oznaka ,
  a.marka_vozila  ,
  a.oznaka_modela ,
  a.napomena ,
  count(c.sifra) as 'naloga'
 
  
 from vozilo a left join vlasnik b
 on a.vlasnik=b.sifra
 left join radni_nalog c on a.sifra=c.vozilo

 where concat(a.broj_sasije, ' ', a.registarska_oznaka) like :uvjet

 group by
  a.broj_sasije, 
  concat (b.ime,' ', b.prezime) ,
  a.datum_prve_registracije,
  a.registarska_oznaka,
  a.marka_vozila ,
  a.oznaka_modela,
  a.napomena 
  limit :stranica, 10


  

 ");


 $izraz->bindValue("stranica",($stranica*10) - 10,PDO::PARAM_INT);
 $izraz->bindValue("uvjet","%" . $uvjet . "%");
  
  $izraz->execute();
  $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
  
 
 ?>


  
  <div class="cell large-6">
  <table class="responsive-card-table unstriped">
      <thead>
        <tr>
          <th>Broj šasije</th>
          <th>Vlasnik</th>
          <th>Datum prve reg.</th>
          <th>Registracija</th>
          <th>Marka</th>
          <th>Model</th>
          <th>Napomena</th>
          <th>Akcija</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="Broj Šasije"><?php echo $red->broj_sasije;?></td>
      <td data-label="Vlasnik"><?php echo $red->vlasnik; ?></td>
      <td data-label="Datum prve reg."><?php echo  ($red->datum_prve_registracije !=null) ? date ("d.m.Y.",strtotime($red->datum_prve_registracije)): "Nije definirano " ; ?></td>
      <td data-label="Registracija"><?php echo  ($red->registarska_oznaka !=null) ? $red->registarska_oznaka : "Nije definirano " ; ?></td>
      <td data-label="Marka"><?php echo  ($red->marka_vozila !=null) ?  $red->marka_vozila : "Nije definirano " ; ?></td>
      <td data-label="Model"><?php echo   ($red->oznaka_modela !=null) ? $red->oznaka_modela: "Nije definirano " ; ?></td>
      <td data-label="Napomena"><?php echo   ($red->napomena !=null) ? $red->napomena: "Nije definirano " ; ?></td>
      <td data-label="Akcija">
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
            <?php if($red->naloga==0): // brisanje vozila ako nema radni nalog?>
				    <a onclick="return confirm('Sigurno obrisati <?php echo $red->registarska_oznaka ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
				    <i class="fas fa-trash fa-2x" style="color: red;"></i>
            </a> 
            <?php endif;?>
           
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
