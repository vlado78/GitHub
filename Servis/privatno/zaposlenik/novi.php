<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

$greske=Array();

if(isset($_POST["dodaj"])){

  include_once "kontrola.php";

  if(count($greske)===0){


  $izraz = $veza->prepare("insert into zaposlenik (ime,prezime,ulica_i_broj,mjesto,broj_mobitela,email,datum_rodjenja,datum_pocetka_rada,oib,broj_ugovora,radionica,napomena) values
               (:ime,:prezime,:ulica_i_broj,:mjesto,:broj_mobitela,:email,:datum_rodjenja,:datum_pocetka_rada,:oib,:broj_ugovora,:radionica,:napomena)");
   
              $izraz->bindParam(":ime",$_POST["ime"]);
              $izraz->bindParam(":prezime",$_POST["prezime"]);
        
              if($_POST["ulica_i_broj"]===""){
                $izraz->bindValue(":ulica_i_broj",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":ulica_i_broj",$_POST["ulica_i_broj"]);
              }
        
              if($_POST["mjesto"]===""){
                $izraz->bindValue(":mjesto",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":mjesto",$_POST["mjesto"]);
              }     

              if($_POST["broj_mobitela"]===""){
                $izraz->bindValue(":broj_mobitela",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":broj_mobitela",$_POST["broj_mobitela"]);
              } 
              
              if($_POST["email"]===""){
                $izraz->bindValue(":email",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":email",$_POST["email"]);
              }    
               
              if($_POST["datum_rodjenja"]===""){
                $izraz->bindValue(":datum_rodjenja",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":datum_rodjenja",$_POST["datum_rodjenja"]);
              }

              if($_POST["datum_pocetka_rada"]===""){
                  $izraz->bindValue(":datum_pocetka_rada",null,PDO::PARAM_INT);
              }else{
                  $izraz->bindParam(":datum_pocetka_rada",$_POST["datum_pocetka_rada"]);
              }
              if($_POST["oib"]===""){
                  $izraz->bindValue(":oib",null,PDO::PARAM_INT);
              }else{
                  $izraz->bindParam(":oib",$_POST["oib"]);
              }

              if($_POST["broj_ugovora"]===""){
                  $izraz->bindValue(":broj_ugovora",null,PDO::PARAM_INT);
              }else{
                  $izraz->bindParam(":broj_ugovora",$_POST["broj_ugovora"]);
              }

              if($_POST["radionica"]===""){
                  $izraz->bindValue(":radionica",null,PDO::PARAM_INT);
              }else{
                  $izraz->bindParam(":radionica",$_POST["radionica"]);
              }
          

              if($_POST["napomena"]===""){
                $izraz->bindValue(":napomena",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":napomena",$_POST["napomena"]);
              }  

  unset($_POST["dodaj"]);
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

   <h3>Novi zaposlenik</h3>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">



        <div class="floated-label-wrapper">
            <?php

            if(!isset($greske["ime"])): ?>
                <label for="ime">Ime</label>
                <input  autocomplete="off" type="text" id="ime" name="ime" placeholder="Ime"
                        value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : "" ?>">

            <?php else:?>
                <label class="is-invalid-label">
                    Zahtjevani unos
                    <input type="text"
                           value="<?php echo  $_POST["ime"]; ?>"
                           class="is-invalid-input" aria-describedby="nazivGreska" data-invalid=""
                           aria-invalid="true" autocomplete="off" type="text" id="ime" name="ime" placeholder="Ime">
                    <span class="form-error is-visible" id="nazivGreska">
        <?php echo $greske["ime"]; ?>
        </span>
                </label>

            <?php endif;?>
        </div>


        <div class="floated-label-wrapper">
            <?php if(!isset($greske["prezime"])): ?>
                <label for="prezime">Prezime</label>
                <input  autocomplete="off" type="text" id="prezime" name="prezime" placeholder="Prezime"
                        value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : "" ?>">

            <?php else:?>

                <label class="is-invalid-label">
                    Zahtjevani unos
                    <input type="text"
                           value="<?php echo  $_POST["prezime"]; ?>"
                           class="is-invalid-input" aria-describedby="nazivGreska" data-invalid=""
                           aria-invalid="true" autocomplete="off" type="text" id="prezime" name="prezime" placeholder="Prezime">
                    <span class="form-error is-visible" id="nazivGreska">
        <?php echo $greske["prezime"]; ?>
        </span>
                </label>

            <?php endif;?>
        </div>


        <div class="floated-label-wrapper">
            <label for="ulica_i_broj">Ulica i broj</label>
            <input  autocomplete="off" type="text" id="ulica_i_broj" name="ulica_i_broj" placeholder="Ulica i broj" value="<?php echo isset($_POST["ulica_i_broj"]) ? $_POST["ulica_i_broj"] : "" ?>">
        </div>

        <div class="floated-label-wrapper">
            <label for="mjesto">Mjesto</label>
            <input  autocomplete="off" type="text" id="mjesto" name="mjesto" placeholder="Mjesto"  value="<?php echo isset($_POST["mjesto"]) ?  $_POST["mjesto"]: ""; ?>">
        </div>

        <div class="floated-label-wrapper">
            <label for="broj_mobitela">Broj mobitela</label>
            <input  autocomplete="off" type="text" id="broj_mobitela" name="broj_mobitela" placeholder="Broj mobitela" value="<?php echo isset($_POST["broj_mobitela"]) ?  $_POST["broj_mobitela"]: ""; ?>">
        </div>

        <div class="floated-label-wrapper">
            <label for="email">Email</label>
            <input  autocomplete="off"  type="text" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ?  $_POST["email"]: ""; ?>">
        </div>

        <div class="floated-label-wrapper">
            <label for="datum_rodjenja">Datum rođenja</label>
            <input  autocomplete="off" type="date"  id="datum_rodjenja" name="datum_rodjenja" placeholder="Datum rođenja"  value="<?php  echo isset($_POST["datum_rodjenja"]) ?    $_POST["datum_rodjenja"]  : "" ;  ?>">


        </div>

        <div class="floated-label-wrapper">
            <label for="datum_pocetka_rada">Datum početka rada</label>
            <input  autocomplete="off" type="date"  id="datum_pocetka_rada" name="datum_pocetka_rada" placeholder="Datum početka rada"  value="<?php  echo isset($_POST["datum_pocetka_rada"]) ?    $_POST["datum_pocetka_rada"]  : "" ;  ?>">

         </div>

        <div class="floated-label-wrapper">
            <label for="oib">Oib</label>
            <input   autocomplete="off" type="text" id="oib" name="oib" placeholder="Oib"  value="<?php echo isset($_POST["oib"]) ?  $_POST["oib"]: ""; ?>">
        </div>

        <div class="floated-label-wrapper">
            <label for="broj_ugovora">Broj ugovora</label>
            <input   autocomplete="off" type="text" id="broj_ugovora" name="broj_ugovora" placeholder="Broj ugovora"  value="<?php echo isset($_POST["broj_ugovora"]) ?  $_POST["broj_ugovora"]: ""; ?>">
        </div>

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
                        if(isset($_POST["radionica"]) && $_POST["radionica"]==$red->sifra){
                            echo ' selected="selected" ';
                        }
                        ?>
                            value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>
                <?php endforeach;?>
            </select>
        </div>

       

        <div class="floated-label-wrapper">
            <label for="napomena">Napomena</label>
            <textarea  autocomplete="off" type="text" id="napomena" name="napomena" placeholder="Napomena"  ><?php echo isset($_POST["napomena"]) ?  $_POST["napomena"]: ""; ?></textarea>
        </div>



      <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded rounded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
              <input class="button expanded rounded" type="submit" name="dodaj" value="Dodaj novi">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>
