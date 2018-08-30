<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
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
           
  <div class="cell large-4">
    <h3>Vozila</h3>
  </div>
  <div class="cell large-4"></div>
  <div class="cell large-4">
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

 group by
  a.broj_sasije, 
  concat (b.ime,' ', b.prezime) ,
  a.datum_prve_registracije,
  a.registarska_oznaka,
  a.marka_vozila ,
  a.oznaka_modela,
  a.napomena 


  

 ");


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
      <td data-label="Broj Šasije"><?php echo $red->broj_sasije; ?></td>
      <td data-label="Vlasnik"><?php echo $red->vlasnik; ?></td>
      <td data-label="Datum prve reg."><?php echo date ("d.m.Y.",strtotime($red->datum_prve_registracije)); ?></td>
      <td data-label="Registracija"><?php echo $red->registarska_oznaka; ?></td>
      <td data-label="Marka"><?php echo $red->marka_vozila; ?></td>
      <td data-label="Model"><?php echo $red->oznaka_modela; ?></td>
      <td data-label="Napomena"><?php echo $red->napomena; ?></td>
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
  </div>
  
  


  
    
    

   <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  </body>
  

</html>
