<?php include_once "../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "../predlozak/head.php" ?>
  </head>
  <body>
  <div class="grid-container">

     <?php include_once "../predlozak/zaglavlje.php" ?>
     <?php include_once "../predlozak/navbar.php" ?>


  <?php if(isset($_GET["poruka"])){
      switch($_GET["poruka"]){
      case "1":
          echo "<strong> Unesite korisnika i lozinke </strong>" ;
          break;
      case "2":
          echo "<strong> Niste ispravno upisali lozinke </strong>" ;
          break;
          case "3":
          echo "<strong> Kreirali ste novog korisnika </strong>" ;
          break;
      default:
          echo "";
          break;
      }
    } ?>
       
       <div class="grid-x grid-padding-x">
<div class="large-3 cell "></div>


 <div class="large-6 cell text-center">
        <form class="callout text-center" action="registracija.php" method="post">
          <h1>Registracija novog korisnika</h1>
          <div class="floated-label-wrapper">
            <label for="ime">korisničko ime</label>
            <input autocomplete="off" type="text" id="korisnik" name="ime">
          </div>
         
         
          <div class="floated-label-wrapper">
            <label for="lozinka">Lozinka</label>
            <input autocomplete="off" type="password" id="lozinka" name="lozinka" >
          </div>
          
          <div class="floated-label-wrapper">
            <label for="plozinka">Ponovo upišite lozinku</label>
            <input autocomplete="off" type="password" id="plozinka" name="plozinka">
          </div>
          <input class="button expanded" type="submit" value="Registriraj se">
        </form>
      </div>
    </div>


     
   


<?php include_once "../predlozak/podnozje.php" ?>
 
  </div>
  
    
 

   
    <?php include_once "../predlozak/skripte.php" ?>
  </body>
</html>
