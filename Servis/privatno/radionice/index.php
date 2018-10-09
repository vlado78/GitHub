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
    <h3>Radionice</h3>
  </div>
  <div class="cell large-4"></div>
  <div class="cell large-4">
    <a href="novi.php"  class="button expanded">Dodaj novu radionicu</a>
  </div>
</div>       
  


 <?php
 
 $izraz = $veza->prepare("   select
      r.*, concat (z.ime,' ',z.prezime) as nadredjeni
      ,(select count(*) from radni_nalog rn where r.sifra=rn.radionica) as num_of_rn
      ,(select count(*) from zaposlenik z where r.sifra=z.radionica) as num_of_zaposlenika
      ,case
      when (
          (select count(*) from radni_nalog rn where r.sifra=rn.radionica)>0 
        or   
          (select count(*) from zaposlenik z where r.sifra=z.radionica)>0
        )then 0
        else 1
      end as flag_to_delete
      from
      radionica r left join zaposlenik z on r.nadredjeni=z.sifra;
          "); 
 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 

 ?>


  
  <div class="cell large-6">
  <table class="responsive-card-table unstriped">

    <thead>
      <tr>
        <th>Naziv</th>
        <th>Nadređeni</th>
        <th>Datum osnutka</th>
        <th>Akcija</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
        <td data-label="Naziv"><?php echo $red->naziv; ?></td>
        <td data-label="Voditelj radionice"><?php  echo ($red->nadredjeni !=null) ?  $red->nadredjeni : "Nije definirano " ;?> </td>
        <td data-label="Datum osnutka"><?php echo ($red->datum_osnutka!=null) ? date("d.m.Y.",strtotime($red->datum_osnutka)) : "Nije definirano "; ?></td>
        
        <td data-label="Akcija">
          <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
          </a>
          <?php if($red->flag_to_delete!=0): ?>
            <a onclick="return confirm('Sigurno obrisati <?php echo $red->naziv ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-trash fa-2x" style="color: red;"></i>
            </a>
          <?php endif;?>
          </td>
      </tr>
     </tr>
    <?php endforeach;?>
    </tbody>
    </table>
  </div>
  
  


  
    
    

   <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  </body>
  

</html>
