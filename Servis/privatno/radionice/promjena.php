<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "index.php");
}






if(isset($_POST["promjeni"])){
  $izraz = $veza->prepare("update radionica set 
              naziv=:naziv, 
							datum_osnutka=:datum_osnutka
              where sifra=:sifra;");
              
  unset($_POST["promjeni"]);
  $izraz->execute($_POST);
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from radionica where sifra=:sifra");
  $izraz->execute($_GET);
  $o=$izraz->fetch(PDO::FETCH_OBJ);

 
    
    
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
    <h3>Promijeni radionicu</h3>
    

    


      <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        
        <div class="floated-label-wrapper">
          <label for="naziv">Ime radionice</label>
          <input value="<?php echo $o->naziv ?>" autocomplete="off" type="text" id="naziv" name="naziv" placeholder="Ime radionice">
        </div>
        
        <div class="floated-label-wrapper">
          <label for="datum_osnutka">Datum osnutka</label>
          <?php 
            $_POST=(array)$o; 
            if(strlen($_POST["datum_osnutka"])>0){
              $_POST["datum_osnutka"] = date("Y-m-d",strtotime($_POST["datum_osnutka"]));
            
            }
            ?>
          <input value="<?php echo $_POST["datum_osnutka"]  ?>" type="date" autocomplete="off" id="datum_osnutka" name="datum_osnutka" placeholder="Datum osnutka" >
        </div>
 
        
        
        <input type="hidden" name="sifra" value="<?php echo $o->sifra ?>" />
        <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
            <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
            </div>
          </div>       

        
      </form>
      

    <?php include_once "../../predlozak/podnozje.php" ?>
    <?php include_once "../../predlozak/skripte.php" ?>
  </div>
  </body>
  

</html>
