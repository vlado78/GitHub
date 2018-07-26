<?php include_once "../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "../predlozak/head.php" ?>
  </head>
  <body>
  <div class="grid-container">

     <?php include_once "../predlozak/zaglavlje.php" ?>
     <?php include_once "../predlozak/navbar.php" ?>

Ovo je PDO

 <?php
 $veza = new PDO("mysql:host=localhost;dbname=autoservis","edunova","edunova");
 $izraz = $veza->prepare("select * from radionica");
 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 
 echo "<pre>";
 print_r($rezultati);
 echo "</pre>";
 ?>


  
  <div class="cell large-6">
    <table>
    <thead>
    <tr>
    <th>Šifra</th>
    <th>Naziv</th>
    <th>Datum osnutka</th>
    
    </tr>
    </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td><?php echo $red->sifra; ?></td>
      <td><?php echo $red->naziv; ?></td>
      <td><?php echo $red->datum_osnutka; ?></td>
      
      </tr>
    <?php endforeach;?>
    </tbody>
    </table>
  </div>
  
  
  <?php include_once "../predlozak/podnozje.php" ?>
  </div>
  
    
    

   <?php include_once "../predlozak/podnozje.php" ?>
  <?php include_once "../predlozak/skripte.php" ?>
  </body>
  

</html>

