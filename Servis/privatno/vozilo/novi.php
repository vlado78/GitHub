<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}



if(isset($_POST["dodaj"])){
  $izraz = $veza->prepare("insert into vozilo 
  (broj_sasije,vlasnik,datum_prve_registracije,registarska_oznaka,marka_vozila,oznaka_modela,napomena) 
  values
  (:broj_sasije,:vlasnik,:datum_prve_registracije,:registarska_oznaka,:marka_vozila,:oznaka_modela,:napomena)");
            
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

   <h3>Novo vozilo</h3>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">


      <div class="floated-label-wrapper">
        <label for="broj_sasije">Broj šasije</label>
        <input  autocomplete="off" type="text" id="broj_sasije" name="broj_sasije" placeholder="Broj šasije">
      </div>
      
      <div class="floated-label-wrapper">
        <label for="vlasnik">Vlasnik</label>
        <input  autocomplete="off" type="text" id="vlasnik" name="vlasnik" placeholder="Vlasnik" >
      </div>

      <div class="floated-label-wrapper">
        <label for="datum_prve_registracije">Datum prve registracije</label>
        <input  autocomplete="off" type="date" id="datum_prve_registracije" name="datum_prve_registracije" placeholder="Datum prve registracije" >
      </div>

      <div class="floated-label-wrapper">
        <label for="registarska_oznaka">Registracija</label>
        <input  autocomplete="off" type="text" id="registarska_oznaka" name="registarska_oznaka" placeholder="Registracija" >
      </div>

      <div class="floated-label-wrapper">
        <label for="marka_vozila">Marka</label>
        <input  autocomplete="off" type="text" id="marka_vozila" name="marka_vozila" placeholder="Marka" >
      </div>

      <div class="floated-label-wrapper">
        <label for="oznaka_modela">Model</label>
        <input  autocomplete="off"  type="text" id="oznaka_modela" name="oznaka_modela" placeholder="Model" >
      </div>

      
      <div class="floated-label-wrapper">
        <label for="napomena">Napomena</label>
        <textarea  autocomplete="off" type="text" id="napomena" name="napomena" placeholder="Napomena" ></textarea>
      </div>
      <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
              <input class="button expanded" type="submit" name="dodaj" value="Dodaj novo vozilo">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>
