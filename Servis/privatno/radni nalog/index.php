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
    <h3>Radni nalozi</h3>
  </div>
  <div class="cell large-4"></div>
  <div class="cell large-4">
    <a href="novi.php"  class="button expanded">Dodaj novi radni nalog</a>
  </div>
</div>       


  


 <?php
 
 $izraz = $veza->prepare("
 
 select 
 a.sifra, 
 b.naziv as radionica, 
 concat(c.ime,' ',c.prezime) as zaposlenik, 
 concat(d.marka_vozila,' ',d.oznaka_modela) as vozilo, 
 a.kilometraza, 
 concat(e.ime,' ',e.prezime) as vlasnik,
 a.opis_kvara, 
 a.datum_pocetka, 
 a.datum_zavrsetka, 
 a.napomena
 from radni_nalog a 
 left join radionica b on a.radionica=b.sifra 
 left join zaposlenik c on a.zaposlenik=c.sifra 
 left join vozilo d on a.vozilo=d.sifra
 left join vlasnik e on a.vozilo=e.sifra

 ");


 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 

 ?>


  
  <div class="cell large-6">
  <table class="responsive-card-table unstriped">
      <thead>
        <tr>
        <th>broj rn</th>
          <th>Radionica</th>
          <th>Zaposlenik</th>
          <th>Vozilo</th>
          <th>Vlasnik</th>
          <th>Kilometraža</th>
          <th>Opis kvara</th>
          <th>Datum i vrijeme početka</th>
          <th>Datum i vrijeme kraja</th>
          <th>Napomena</th>
          <th>Akcija</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="broj rn"><?php echo $red->sifra; ?></td>
      <td data-label="Radionica"><?php echo $red->radionica; ?></td>
      <td data-label="Zaposlenik"><?php echo $red->zaposlenik; ?></td>
      <td data-label="Vozilo"><?php echo $red->vozilo; ?></td>
      <td data-label="Zaposlenik"><?php echo $red->vlasnik; ?></td>
      <td data-label="Kilometraža"><?php echo $red->kilometraza; ?></td>
      <td data-label="Opis kvara"><?php echo $red->opis_kvara; ?></td>
      <td data-label="Datum početka"><?php echo $red->datum_pocetka; ?></td>
      <td data-label="Datum kraja"><?php echo $red->datum_zavrsetka; ?></td>
      <td data-label="Napomena"><?php echo $red->napomena; ?></td>
      <td data-label="Akcija">
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
            <?php /*if($red->vozila==0): // brisanje vozila ako nema radni nalog?>
				    <a onclick="return confirm('Sigurno obrisati radni nalog broj:  <?php echo $red->sifra ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
				    <i class="fas fa-trash fa-2x" style="color: red;"></i>
            </a> 
            <?php endif;*/?>
           
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
