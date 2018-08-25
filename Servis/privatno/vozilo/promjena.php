<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(isset($_POST["promjeni"])){
  $izraz = $veza->prepare("update vozilo set 
              broj_sasije=:broj_sasije, 
              vlasnik=:vlasnik, 
              datum_prve_registracije=:datum_prve_registracije, 
              registarska_oznaka=:registarska_oznaka, 
              marka_vozila=:marka_vozila, 
              oznaka_modela=:oznaka_modela,  
              napomena=:napomena
              where sifra=:sifra;");
              
  unset($_POST["promjeni"]);
  $izraz->execute($_POST);
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from vozilo where sifra=:sifra");
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
  <h3>Promijeni vlasnika</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    
    <div class="floated-label-wrapper">
      <label for="broj_sasije">Broj šasije</label>
      <input value="<?php echo $o->broj_sasije ?>" autocomplete="off" type="text" id="broj_sasije" name="broj_sasije" placeholder="Broj šasije">
    </div>
    
    <div class="floated-label-wrapper">
      <label for="vlasnik">Vlasnik</label>
      <input value="<?php echo $o->vlasnik ?>" autocomplete="off" type="text" id="vlasnik" name="vlasnik" placeholder="Vlasnik" >
    </div>

    <div class="floated-label-wrapper">
      <label for="datum_prve_registracije">Datum prve registracije</label>
      <input value="<?php echo $o->datum_prve_registracije ?>" autocomplete="off" type="date" id="datum_prve_registracije" name="datum_prve_registracije" placeholder="Datum prve registracije" >
    </div>

    <div class="floated-label-wrapper">
      <label for="registarska_oznaka">Registracija</label>
      <input value="<?php echo $o->registarska_oznaka ?>" autocomplete="off" type="text" id="registarska_oznaka" name="registarska_oznaka" placeholder="Registracija" >
    </div>

    

    <div class="floated-label-wrapper">
      <label for="marka_vozila">Marka</label>
      <input value="<?php echo $o->marka_vozila ?>" autocomplete="off" type="text" id="marka_vozila" name="marka_vozila" placeholder="Marka" >
    </div>

    <div class="floated-label-wrapper">
      <label for="oznaka_modela">Model</label>
      <input value="<?php echo $o->oznaka_modela ?>" autocomplete="off" type="text" id="oznaka_modela" name="oznaka_modela" placeholder="Model" >
    </div>

    
    <div class="floated-label-wrapper">
      <label for="napomena">Napomena</label>
      <textarea value="<?php echo $o->napomena ?>" autocomplete="off" id="napomena" name="napomena" placeholder="Napomena" ></textarea>
       
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
