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
    <a href="novi.php"  class="button expanded">Dodaj novog  vlasnika</a>
  </div>
</div>       


  


 <?php
 
 $izraz = $veza->prepare("
 
 select 
 a.sifra,a.ime,a.prezime,a.ulica_i_broj,a.mjesto,
 a.broj_mobitela,a.email,a.datum_rodjenja,a.datum_pocetka_rada,
 a.oib,a.broj_ugovora,concat (b.ime,' ',b.prezime) as nadredjeni,c.naziv as radionica,a.radni_nalog,a.napomena



 from zaposlenik a
 
 left join radionica c on a.radionica=c.sifra
 left join zaposlenik b on a.nadredjeni=b.sifra
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
          <th>Ulica i broj</th>
          <th>Mjesto</th>
          <th>Broj mobitela</th>
          <th>e-mail</th>
          <th>Datum rođenja</th>
          <th>Daum početka rada</th>
          <th>Broj ugovora</th>
          <th>Nadređeni</th>
          <th>Radionica</th>
          <th>Radni nalog</th>
          <th>Napomena</th>
          <th>Akcija</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="Ime"><?php echo $red->ime; ?></td>
      <td title="<?php echo "OIB: " . $red->oib; ?>"><?php echo $red->prezime; ?></td>
      <td data-label="Ulica i broj"><?php echo ($red->ulica_i_broj !=null) ? ($red->ulica_i_broj) :  "Nije definirano "       ; ?></td>
      <td data-label="Mjesto"> <?php echo ($red->mjesto !=null) ? ( $red->mjesto) :  "Nije definirano " ; ?> </td>
      <td data-label="Broj mobitela">  <?php echo ($red->broj_mobitela !=null) ? ( $red->broj_mobitela) :  "Nije definirano " ; ?>  </td>
      <td data-label="e-mail"> <?php echo ($red->email !=null) ? ( $red->email) :  "Nije definirano " ; ?> </td>
      <td data-label="Datum rođenja"> <?php echo ($red->datum_rodjenja !=null) ? date ("d.m.Y.",strtotime($red->datum_rodjenja)) : "Nije definirano " ;  ?> </td>
      <td data-label="Datum rođenja"> <?php echo ($red->datum_pocetka_rada !=null) ? date ("d.m.Y.",strtotime($red->datum_pocetka_rada)) : "Nije definirano " ;  ?> </td>
      <td data-label="Napomena"> <?php  echo ($red->broj_ugovora !=null) ?  $red->broj_ugovora : "Nije definirano " ;?> </td>
      <td data-label="Napomena"> <?php  echo ($red->nadredjeni !=null) ?  $red->nadredjeni : "Nije definirano " ;?> </td>
      <td data-label="Napomena"> <?php  echo ($red->radionica !=null) ?  $red->radionica : "Nije definirano " ;?> </td>
      <td data-label="Napomena"> <?php  echo ($red->radni_nalog !=null) ?  $red->radni_nalog : "Nije definirano " ;?> </td>
      <td data-label="Napomena"> <?php  echo ($red->napomena !=null) ?  $red->napomena : "Nije definirano " ;?> </td>
      <td data-label="Akcija">
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
            <?php if($red->nadredjeni!==null): ?>
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
