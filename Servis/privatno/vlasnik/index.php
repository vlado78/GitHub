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
    <h3>Vlasnici</h3>
  </div>

  <div class="cell large-2"></div>

  <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <div class="input-group input-group-rounded">
  <input class="input-group-field" type="text" name="uvjet" placeholder="ime/prezime" value="<?php echo $uvjet ?>">
  <div class="input-group-button">
    <input type="submit" class="button expanded" value="Traži..">
  </div>
</div>
</form>


 <div class="cell large-2">
    
  </div>

  <div class="cell large-2">
    <a href="novi.php"  class="button expanded rounded">Dodaj novog  vlasnika</a>
  </div>
  </div> 




  




 <?php
 
 $izraz = $veza->prepare("
 
 select 
a.sifra,a.ime,a.prezime,a.ulica_i_broj,a.mjesto,a.broj_mobitela,a.email,a.datum_rodjenja,a.oib,a.napomena,
 count(b.sifra) as vozila
 from vlasnik a left join vozilo b
 on a.sifra=b.vlasnik 
 where concat(a.ime, ' ', a.prezime) like :uvjet
group by
a.sifra,a.ime,a.prezime,a.ulica_i_broj,a.mjesto,a.broj_mobitela,a.email,a.datum_rodjenja,a.oib,a.napomena
order by prezime
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
          <th>Ime</th>
          <th>Prezime</th>
          <th>Ulica i broj</th>
          <th>Mjesto</th>
          <th>Broj mobitela</th>
          <th>e-mail</th>
          <th>Datum rođenja</th>
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
      <td data-label="Napomena"> <?php  echo ($red->napomena !=null) ?  $red->napomena : "Nije definirano " ;?> </td>
      <td data-label="Akcija">
            <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-edit fa-2x"></i> 
            </a> 
            <?php if($red->vozila==0): ?>
				    <a onclick="return confirm('Sigurno obrisati <?php echo $red->ime,$red->prezime ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
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
