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
              
              vozilo=:vozilo, 
              kilometraza=:kilometraza, 
              opis_kvara=:opis_kvara, 
              datum_pocetka=:datum_pocetka, 
              datum_zavrsetka=:datum_zavrsetka,  
              napomena=:napomena
              where sifra=:sifra;");
              
  
  $izraz->execute();
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from radni_nalog where sifra=:sifra");
  $izraz->execute($_GET);
  $o=$izraz->fetch(PDO::FETCH_OBJ);////////////
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
            <select id="radionica" name="radionica">
                <option value="">Odaberi radionicu</option>
                <?php

                $izraz = $veza->prepare("
              
              select sifra, naziv
              from radionica
              


              ");
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                foreach($rezultati as $red):?>

                    <option
                        <?php
                        if(isset($o->radionica) && $o->radionica==$red->sifra){
                            echo ' selected="selected" ';
                        }
                        ?>
                            value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>
                <?php endforeach;?>
            </select>
        </div>

zaposlenik

 


 
<div class="floated-label-wrapper">
            <label for="vozilo">Vozilo</label>
            <select id="vozilo" name="vozilo">
                <option value="">Odaberi vozilo</option>
                <?php

                $izraz = $veza->prepare("
              
              select *
              from vozilo
              


              ");
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                foreach($rezultati as $red):?>

                    <option
                        <?php
                        if(isset($o->vozilo) && $o->vozilo==$red->sifra){
                            echo ' selected="selected" ';
                        }
                        ?>
                            value="<?php echo $red->sifra ?>"><?php echo $red->registarska_oznaka,' ',$red->marka_vozila,' ', $red->oznaka_modela?></option>
                <?php endforeach;?>
            </select>
        </div>

    <div class="floated-label-wrapper">
      <label for="kilometraza">Kilometraža</label>
      <input value="<?php echo $o->kilometraza ?>" autocomplete="off" type="number" id="kilometraza" name="kilometraza" placeholder="Kilometraža" >
    </div>

    <div class="floated-label-wrapper">
      <label for="opis_kvara">Opis kvara</label>
      <textarea  autocomplete="on"  id="opis_kvara" name="opis_kvara" placeholder="Opis kvara" ><?php echo $o->opis_kvara ?> </textarea>
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
      <textarea  autocomplete="off" id="napomena" name="napomena" placeholder="Napomena" ><?php echo $o->napomena ?> </textarea>
       
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
 
  </body>
</html>
