<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(isset($_POST["dodaj"])){
  $izraz = $veza->prepare("insert into radionica (naziv,datum_osnutka) values 
                          (:naziv,:datum_osnutka)");
  unset($_POST["dodaj"]);
  $izraz->execute($_POST);
  header("location: index.php");
 
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

<h3>Nova radionica</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    
    <div class="floated-label-wrapper">
      <label for="naziv">Naziv</label>
      <input autocomplete="off" type="text" id="naziv" name="naziv" placeholder="Ime radionice">
    
    
    <div class="floated-label-wrapper">
      <label for="datum_osnutka">Datum_osnutka</label>
      <input autocomplete="off" type="date" id="datum_osnutka" name="datum_osnutka" placeholder="Datum osnutka">
    </div>
    
    <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
              <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi">
            </div>
          </div>       
            
   
  </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  </body>
  

</html>
