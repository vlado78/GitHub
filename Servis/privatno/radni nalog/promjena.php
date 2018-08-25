<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(isset($_POST["promjeni"])){
  $izraz = $veza->prepare("update radni_nalog set 
              radionica=:radionica, 
              zaposlenik=:zaposlenik, 
              vozilo=:vozilo, 
              kilometraza=:kilometraza, 
              opis_kvara=:opis_kvara, 
              datum_pocetka=:datum_pocetka, 
              datum_zavrsetka=:datum_zavrsetka,  
              napomena=:napomena
              where sifra=:sifra;");
              
  unset($_POST["promjeni"]);
  $izraz->execute($_POST);
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from radni_nalog where sifra=:sifra");
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
  <h3>Promijeni radni nalog</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    
    <div class="floated-label-wrapper">
      <label for="radionica">Radionica</label>
      <input value="<?php echo $o->radionica ?>" autocomplete="off" type="number" id="radionica" name="radionica" placeholder="Radionica">
    </div>
    
    <div class="floated-label-wrapper">
      <label for="zaposlenik">Zaposlenik</label>
      <input value="<?php echo $o->zaposlenik ?>" autocomplete="off" type="number" id="zaposlenik" name="zaposlenik" placeholder="Zaposlenik" >
    </div>

    <div class="floated-label-wrapper">
      <label for="vozilo">Vozilo</label>
      <input value="<?php echo $o->vozilo ?>" autocomplete="off" type="number" id="vozilo" name="vozilo" placeholder="Vozilo" >
    </div>

    <div class="floated-label-wrapper">
      <label for="kilometraza">Kilometraža</label>
      <input value="<?php echo $o->kilometraza ?>" autocomplete="off" type="number" id="kilometraza" name="kilometraza" placeholder="Kilometraža" >
    </div>

    <div class="floated-label-wrapper">
      <label for="opis_kvara">Opis kvara</label>
      <textarea value="<?php echo $o->opis_kvara ?>" autocomplete="on"  id="opis_kvara" name="opis_kvara" placeholder="Opis kvara" ></textarea>
    </div>
    

    <div class="floated-label-wrapper">
      <label for="datum_pocetka">Datum početka</label>
      <input value="<?php echo $o->datum_pocetka ?>" autocomplete="off" type="date" id="datum_pocetka" name="datum_pocetka" placeholder="Datum početka" >
    </div>

    <div class="floated-label-wrapper">
      <label for="datum_zavrsetka">Datum završetka</label>
      <input value="<?php echo $o->datum_zavrsetka ?>" autocomplete="off" type="date" id="datum_zavrsetka" name="datum_zavrsetka" placeholder="Datum završetka" >
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
