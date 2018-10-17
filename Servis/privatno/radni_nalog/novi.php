<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

$greske=Array();

if(isset($_POST["dodaj"])){

 include_once "kontrola.php";
  

  if(count($greske)===0){
    $izraz = $veza->prepare("insert into radni_nalog
                               (radionica,vozilo,kilometraza,opis_kvara,datum_pocetka,napomena) values 
                               (:radionica,:vozilo,:kilometraza,:opis_kvara,:datum_pocetka,:napomena)");

                              $izraz->bindParam(":radionica",$_POST["radionica"]);
                             
                              $izraz->bindParam(":vozilo",$_POST["vozilo"]);

                              if($_POST["kilometraza"]===""){
                                $izraz->bindValue(":kilometraza",null,PDO::PARAM_INT);
                              }else{
                                $izraz->bindParam(":kilometraza",$_POST["kilometraza"]);
                              }

                              if($_POST["opis_kvara"]===""){
                                $izraz->bindValue(":opis_kvara",null,PDO::PARAM_INT);
                              }else{
                                $izraz->bindParam(":opis_kvara",$_POST["opis_kvara"]);
                              }

                              if($_POST["datum_pocetka"]===""){
                                $izraz->bindValue(":datum_pocetka",null,PDO::PARAM_INT);
                              }else{
                                $izraz->bindParam(":datum_pocetka",$_POST["datum_pocetka"]);
                              }

                            
                              if($_POST["napomena"]===""){
                                $izraz->bindValue(":napomena",null,PDO::PARAM_INT);
                              }else{
                                $izraz->bindParam(":napomena",$_POST["napomena"]);
                              }


      $izraz->execute();
      header("location: index.php");
      }
 
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

   <h3>Novi radni nalog</h3>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">


 <div class="floated-label-wrapper">
    <?php if(!isset($greske["radionica"])): ?>

        <label for="radionica">Radionica</label>
              <select id="radionica" name="radionica">
                <option value="">Odaberi radionicu</option>
                <?php 
                
                $izraz = $veza->prepare("
                                select sifra, naziv from radionica
                        ");
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                foreach($rezultati as $red):?>
              <option 
              <?php 
              if(isset($_POST["radionica"]) && $_POST["radionica"]==$red->sifra){
                echo ' selected="selected" ';
              }
              ?>
              value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>  
              <?php endforeach;?>

              </select>

    <?php else:?>

            <label class="is-invalid-label">
                Zahtjevani unos
                <select  class="is-invalid-input" style="color: #cc4b37; font-weight: bold" aria-describedby="nazivGreska" data-invalid=""
                          id="radionica" name="radionica"
                        aria-invalid="true">
                    <option value="">Odaberi radionicu</option>
                    <?php

                    $izraz = $veza->prepare("
                            select sifra, naziv from radionica
                                    ");
                    $izraz->execute();
                    $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                    foreach($rezultati as $red):?>
                        <option
                            <?php
                            if(isset($_POST["radionica"]) && $_POST["radionica"]==$red->sifra){
                                echo ' selected="selected" ';
                            }
                            ?>
                                value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>
                    <?php endforeach;?>

                </select>

                <span class="form-error is-visible" id="nazivGreska">
                <?php echo $greske["radionica"]; ?>
                </span>
            </label>
    <?php endif;?>

      </div>





  

  
  <div class="floated-label-wrapper">
    <?php if(!isset($greske["vozilo"])): ?>

        <label for="vozilo">Vozilo</label>
              <select id="vozilo" name="vozilo">
                <option value="">Odaberi vozilo</option>
                <?php 
                
                $izraz = $veza->prepare("
                select sifra,concat(registarska_oznaka,'  ',marka_vozila,'  ',oznaka_modela,'  ',broj_sasije) as vozilo from vozilo
                        ");
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                foreach($rezultati as $red):?>
              <option 
              <?php 
              if(isset($_POST["vozilo"]) && $_POST["vozilo"]==$red->sifra){
                echo ' selected="selected" ';
              }
              ?>
              value="<?php echo $red->sifra ?>"><?php echo $red->vozilo ?></option>  
              <?php endforeach;?>

              </select>

    <?php else:?>

            <label class="is-invalid-label">
                Zahtjevani unos
                <select  class="is-invalid-input" style="color: #cc4b37; font-weight: bold" aria-describedby="nazivGreska" data-invalid=""
                          id="vozilo" name="vozilo"
                        aria-invalid="true">
                    <option value="">Odaberi vozilo</option>
                    <?php

                    $izraz = $veza->prepare("
                    select sifra,concat(registarska_oznaka,'  ',marka_vozila,'  ',oznaka_modela,'  ',broj_sasije) as vozilo from vozilo
                                    ");
                    $izraz->execute();
                    $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                    foreach($rezultati as $red):?>
                        <option
                            <?php
                            if(isset($_POST["vozilo"]) && $_POST["vozilo"]==$red->sifra){
                                echo ' selected="selected" ';
                            }
                            ?>
                                 value="<?php echo $red->sifra ?>"><?php echo $red->vozilo ?>
                                 </option>  
                                  
                    <?php endforeach;?>

                </select>

                <span class="form-error is-visible" id="nazivGreska">
                <?php echo $greske["vozilo"]; ?>
                </span>
            </label>
    <?php endif;?>

      </div> 
    

      <div class="floated-label-wrapper">
        <label for="kilometraza">Kilometaža</label>
        <input  autocomplete="off" type="number" id="kilometraza" name="kilometraza" placeholder="Kilometraža" value="<?php echo isset($_POST["kilometraza"]) ? $_POST["kilometraza"] : "" ?>"> 
      </div>

      <div class="floated-label-wrapper">
        <label for="opis_kvara">Opis kvara</label>
        <textarea  autocomplete="off" type="text" id="opis_kvara" name="opis_kvara" placeholder="Opis kvara" ><?php echo isset($_POST["opis_kvara"]) ? $_POST["opis_kvara"] : "" ?> </textarea>
      </div>

      <div class="floated-label-wrapper">
        <label for="datum_pocetka">Datum početka</label>
        <input  autocomplete="off"  type="date" id="datum_pocetka" name="datum_pocetka" placeholder="Datum početka" value="<?php echo isset($_POST["datum_pocetka"]) ? $_POST["datum_pocetka"] : "" ?>"> 
      </div>

           
      <div class="floated-label-wrapper">
        <label for="napomena">Napomena</label>
        <textarea  autocomplete="off" type="text" id="napomena" name="napomena" placeholder="Napomena" > <?php echo isset($_POST["napomena"]) ? $_POST["napomena"] : "" ?> </textarea>
      </div>
      <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded rounded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
              <input class="button expanded rounded" type="submit" name="dodaj" value="Dodaj novi radni nalog">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>
