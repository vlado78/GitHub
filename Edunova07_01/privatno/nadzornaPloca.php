<?php include_once "../konfiguracija.php" ;
if(!isset($_SESSION["o"])){
  header("location: " . $putanjaAPP . "odjava.php");
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

    <?php include_once "../predlozak/izbornik.php" ?>


  	Nadzorna ploča
    <?php 
    l($_SERVER);
    ?>

    <?php include_once "../predlozak/podnozje.php" ?>

    <?php include_once "../predlozak/skripte.php" ?>
  </body>
</html>
