<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}
$greske=Array();
if(isset($_POST["dodaj"])){
  if(trim($_POST["broj_sasije"])===""){
    $greske["broj_sasije"]="Obavezno unos šasije ";
  }
  if(strlen($_POST["broj_sasije"])>50){
    $greske["broj_sasije"]="Broj šasije smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["ime"]) . " znakova";
  }
    if(trim($_POST["vlasnik"])===""){
        $greske["vlasnik"]="Obavezno izabrati vlasnika ";
    }
  if(count($greske)===0){
  $izraz = $veza->prepare("insert into vozilo 
  (broj_sasije,vlasnik,datum_prve_registracije,registarska_oznaka,marka_vozila,oznaka_modela,napomena) 
  values
  (:broj_sasije,:vlasnik,:datum_prve_registracije,:registarska_oznaka,:marka_vozila,:oznaka_modela,:napomena)");
    
  $izraz->bindParam(":broj_sasije",$_POST["broj_sasije"]);
  $izraz->bindParam(":vlasnik",$_POST["vlasnik"]);
  if($_POST["datum_prve_registracije"]===""){
    $izraz->bindValue(":datum_prve_registracije",null,PDO::PARAM_INT);
  }else{
    $izraz->bindParam(":datum_prve_registracije",$_POST["datum_prve_registracije"]);
  }
  if($_POST["registarska_oznaka"]==="0"){
    $izraz->bindValue(":registarska_oznaka",null,PDO::PARAM_INT);
  }else{
    $izraz->bindParam(":registarska_oznaka",$_POST["registarska_oznaka"]);
  }
  if($_POST["marka_vozila"]==="0"){
    $izraz->bindValue(":marka_vozila",null,PDO::PARAM_INT);
  }else{
    $izraz->bindParam(":marka_vozila",$_POST["marka_vozila"]);
  }
  if($_POST["oznaka_modela"]==="0"){
    $izraz->bindValue(":oznaka_modela",null,PDO::PARAM_INT);
  }else{
    $izraz->bindParam(":oznaka_modela",$_POST["oznaka_modela"]);
  }
  
  if($_POST["napomena"]==="0"){
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

   <h3>Novo vozilo</h3>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">




     <div class="floated-label-wrapper">

         <?php if(!isset($greske["broj_sasije"])): ?>
        <label for="broj_sasije">Broj šasije</label>
        <input  autocomplete="off" type="text" id="broj_sasije" name="broj_sasije" placeholder="Broj šasije"
        value="<?php echo isset($_POST["broj_sasije"]) ? $_POST["broj_sasije"] : "" ?>">
     
        <?php else:?>

        <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" 
              value="<?php echo  $_POST["broj_sasije"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="broj_sasije" name="broj_sasije" placeholder="Broj šasije">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["broj_sasije"]; ?>
              </span>
              </label>

              <?php endif;?> 


     
      </div>

      <div class="floated-label-wrapper">
          <?php if(!isset($greske["vlasnik"])): ?>

      <label for="vlasnika">Vlasnik</label>
            <select id="vlasnik" name="vlasnik">
              <option value="">Odaberi vlasnika</option>
              
              
              <?php 
             
              
              
              
              $izraz = $veza->prepare("
              
              select sifra, concat(ime, ' ',prezime) as vlasnik
              from vlasnik
              ");
              $izraz->execute();
              $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
               foreach($rezultati as $red):?>
             <option 
             <?php 
             if(isset($_POST["vlasnik"]) && $_POST["vlasnik"]==$red->sifra){
               echo ' selected="selected" ';
             }
             ?>
             value="<?php echo $red->sifra ?>"><?php echo $red->vlasnik ?></option>  
            <?php endforeach;?>

            </select>

          <?php else:?>

          <label class="is-invalid-label">
              Zahtjevani unos
              <select  class="is-invalid-input" style="color: #cc4b37; font-weight: bold" aria-describedby="nazivGreska" data-invalid=""
                        id="vlasnik" name="vlasnik"
                      aria-invalid="true">
                  <option value="">Odaberi vlasnika</option>
                  <?php
                  $izraz = $veza->prepare("
              
              select sifra, concat(ime, ' ',prezime) as vlasnik
              from vlasnik
              ");
                  $izraz->execute();
                  $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                  foreach($rezultati as $red):?>
                      <option
                          <?php
                          if(isset($_POST["vlasnik"]) && $_POST["vlasnik"]==$red->sifra){
                              echo ' selected="selected" ';
                          }
                          ?>
                              value="<?php echo $red->sifra ?>"><?php echo $red->vlasnik ?></option>
                  <?php endforeach;?>

              </select>

              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["vlasnik"]; ?>
              </span>
          </label>
          <?php endif;?>

      </div>

      <div class="floated-label-wrapper">
        <label for="datum_prve_registracije">Datum prve registracije</label>
        <input  autocomplete="off" type="date" id="datum_prve_registracije" name="datum_prve_registracije" placeholder="Datum prve registracije" value="<?php  echo (isset($_POST["datum_prve_registracije"])) ?   $_POST["datum_prve_registracije"]  : "" ;  ?>" >
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
              <a href="index.php" class="alert button expanded rounded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
              <input class="button expanded rounded" type="submit" name="dodaj" value="Dodaj novo vozilo">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>