<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}



if(isset($_POST["dodaj"])){
  $izraz = $veza->prepare("insert into radni_nalog 
  (radionica,zaposlenik,vozilo,kilometraza,opis_kvara,datum_pocetka,datum_zavrsetka,napomena) 
  values
  (:radionica,:zaposlenik,:vozilo,:kilometraza,:opis_kvara,:datum_pocetka,datum_zavrsetka,:napomena)");
            
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
        <label for="radionica">Radionica</label>
        <input  autocomplete="off" type="number" id="radionica" name="radionica" placeholder="Radionica">
      </div>
      
      <div class="floated-label-wrapper">
        <label for="Zaposlenik">Zaposlenik</label>
        <input  autocomplete="off" type="number" id="zaposlenik" name="zaposlenik" placeholder="Zaposlenik" >
      </div>

      <div class="floated-label-wrapper">
        <label for="vozilo">Vozilo</label>
        <input  autocomplete="off" type="number" id="vozilo" name="vozilo" placeholder="Vozilo" >
      </div>

      <div class="floated-label-wrapper">
        <label for="kilometraza">Kilometaža</label>
        <input  autocomplete="off" type="number" id="kilometraza" name="kilometraza" placeholder="Kilometraža" >
      </div>

      <div class="floated-label-wrapper">
        <label for="opis_kvara">Opis kvara</label>
        <textarea  autocomplete="off" type="text" id="opis_kvara" name="opis_kvara" placeholder="Opis kvara" ></textarea>
      </div>

      <div class="floated-label-wrapper">
        <label for="datum_pocetka">Datum početka</label>
        <input  autocomplete="off"  type="date" id="datum_pocetka" name="datum_pocetka" placeholder="Datum početka" >
      </div>

      <div class="floated-label-wrapper">
        <label fora,datum_zavrsetka">Datum kraja</label>
        <input  autocomplete="off"  type="date" ida,datum_zavrsetka" namea,datum_zavrsetka" placeholder="Datum kraja" >
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
              <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi radni nalog">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>
