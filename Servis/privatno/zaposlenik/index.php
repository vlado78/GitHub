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
    <h3>Zaposlenici</h3>
  </div>
  <div class="cell large-4"></div>
  <div class="cell large-4">
    <a href="novi.php"  class="button expanded">Dodaj novog  zaposlenika</a>
  </div>
</div>       


  


 <?php
 
 $izraz = $veza->prepare("
 
 select 
 a.sifra,a.ime,a.prezime,a.ulica_i_broj,a.mjesto,
 a.broj_mobitela,a.email,a.datum_rodjenja,a.datum_pocetka_rada,
 a.oib,a.broj_ugovora,c.naziv as radionica,a.radni_nalog,a.napomena



 from zaposlenik a
 
 left join radionica c on a.radionica=c.sifra
 
 ");


 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 

 ?>


  
  <div class="cell large-6">
  <table class="responsive-card-table unstriped">
      <thead>
        <tr>
          <th>Ime</th>
          <th>Prezime</th>
            <th>Broj mobitela</th>
          <th>e-mail</th>

          <th>Radionica</th>

          <th>Napomena</th>
          <th>Akcija</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="Ime"><?php echo $red->ime; ?></td>
      <td title="<?php echo "OIB: " . $red->oib; ?>"><?php echo $red->prezime; ?></td>

      <td data-label="Broj mobitela">  <?php echo ($red->broj_mobitela !=null) ? ( $red->broj_mobitela) :  "Nije definirano " ; ?>  </td>
      <td data-label="e-mail"> <?php echo ($red->email !=null) ? ( $red->email) :  "Nije definirano " ; ?> </td>
      <td data-label="Radionica"> <?php  echo ($red->radionica !=null) ?  $red->radionica : "Nije definirano " ;?> </td>
     <td data-label="Napomena"> <?php  echo ($red->napomena !=null) ?  $red->napomena : "Nije definirano " ;?> </td>
      <td data-label="Akcija">
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
            <?php if($red->radni_nalog==null): ?>
				    <a onclick="return confirm('Sigurno obrisati <?php echo $red->ime,$red->prezime ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
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
