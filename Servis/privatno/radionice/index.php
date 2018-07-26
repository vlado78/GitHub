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

ovo su radionice
<br>

<a href="novi.php" class="success button expanded">Dodaj novi smjer</a>
  


 <?php
 
 $izraz = $veza->prepare("select * from radionica");








 
 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 

 ?>


  
  <div class="cell large-6">
    <table>
    <thead>
    <tr>
    <th>Šifra</th>
    <th>Naziv</th>
    <th>Datum osnutka</th>
    <th>Akcija</th>
    
    </tr>
    </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td><?php echo $red->sifra; ?></td>
      <td><?php echo $red->naziv; ?></td>
      <td><?php echo $red->datum_osnutka; ?></td>
      <td>
          <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
          <i class="fas fa-edit fa-2x"></i> 
          </a>
          
        
          
         
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
