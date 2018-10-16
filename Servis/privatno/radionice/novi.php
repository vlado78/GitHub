<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

$greske=Array();

if(isset($_POST["dodaj"])){

 include_once "kontrola.php";
  

  if(count($greske)===0){
    $izraz = $veza->prepare("insert into radionica (naziv,datum_osnutka) values 
                              (:naziv,:datum_osnutka)");
                              $izraz->bindParam(":naziv",$_POST["naziv"]);
                              


                              if($_POST["datum_osnutka"]===""){
                                $izraz->bindValue(":datum_osnutka",null,PDO::PARAM_INT);
                              }else{
                                $izraz->bindParam(":datum_osnutka",$_POST["datum_osnutka"]);
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

<h3>Nova radionica</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    
    <div class="floated-label-wrapper">
     
    <?php if(!isset($greske["naziv"])): ?>

      <label for="naziv">Naziv</label>
      <input autocomplete="off" type="text" id="naziv" name="naziv" placeholder="Ime radionice"
      value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : "" ?>">
     
     
     <?php else:?>

     <label class="is-invalid-label">
              Obavezni unos
              <input type="text" 
              value="<?php echo  $_POST["naziv"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="naziv" name="naziv" placeholder="Ime radionice">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["naziv"]; ?>
              </span>
              </label>




    <?php endif;?> 
    </div>
    <div class="floated-label-wrapper">
  

    
     
    
    <div class="floated-label-wrapper">
      <label 
            for="datum_osnutka">Datum_osnutka</label>
      <input 
      
      value="<?php echo isset($_POST["datum_osnutka"]) ? $_POST["datum_osnutka"] : "" ?>"
              autocomplete="off" type="date" id="datum_osnutka" name="datum_osnutka" placeholder="Datum osnutka">
      
           

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
