<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

$greske=Array();

if(isset($_POST["dodaj"])){

  if(trim($_POST["ime"])===""){
    $greske["ime"]="Obavezno unos imena ";
  }

  if(strlen($_POST["ime"])>50){
    $greske["ime"]="Ime smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["ime"]) . " znakova";
  }

  
  if(trim($_POST["prezime"])===""){
    $greske["prezime"]="Obavezno unos prezimena";
  }

  if(strlen($_POST["prezime"])>50){
    $greske["prezime"]="Prezime smije imati maksimalno 50 znakovam vi, ste stavili " . strlen($_POST["prezime"]) . " znakova";
  }



  if(count($greske)===0){


  $izraz = $veza->prepare("insert into vlasnik (ime,prezime,ulica_i_broj,mjesto,broj_mobitela,email,datum_rodjenja,oib,napomena) values
              (:ime,:prezime,:ulica_i_broj,:mjesto,:broj_mobitela,:email,:datum_rodjenja,:oib,:napomena)");
   
              $izraz->bindParam(":ime",$_POST["ime"]);
              $izraz->bindParam(":prezime",$_POST["prezime"]);
        
              if($_POST["ulica_i_broj"]==="0"){
                $izraz->bindValue(":ulica_i_broj",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":ulica_i_broj",$_POST["predavac"]);
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
              
              if($_POST["oib"]===""){
                $izraz->bindValue(":oib",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":oib",$_POST["oib"]);
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

   <h3>Novi vlasnik</h3>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    
   
      <div class="floated-label-wrapper">
      <?php if(!isset($greske["ime"])): ?>
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
        <input  autocomplete="off" type="text" id="ulica_i_broj" name="ulica_i_broj" placeholder="Ulica i broj" >
      </div>

      <div class="floated-label-wrapper">
        <label for="mjesto">Mjesto</label>
        <input  autocomplete="off" type="text" id="mjesto" name="mjesto" placeholder="Mjesto" >
      </div>

      <div class="floated-label-wrapper">
        <label for="broj_mobitela">Broj mobitela</label>
        <input  autocomplete="off" type="text" id="broj_mobitela" name="broj_mobitela" placeholder="Broj mobitela" >
      </div>

      <div class="floated-label-wrapper">
        <label for="email">Email</label>
        <input  autocomplete="off"  type="text" id="email" name="email" placeholder="Email" >
      </div>

      <div class="floated-label-wrapper">
        <label for="datum_rodjenja">Datum rođenja</label>
        <input  autocomplete="off" type="date"id="datum_rodjenja" name="datum_rodjenja" placeholder="Datum rođenja" >
      </div>

      <div class="floated-label-wrapper">
        <label for="oib">Oib</label>
        <input  autocomplete="off" type="text" id="oib" name="oib" placeholder="Oib" >
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
              <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi">
            </div>
          </div>       

      
          
            
            
     
    </form>
   <?php include_once "../../predlozak/podnozje.php" ?>
   <?php include_once "../../predlozak/skripte.php" ?>
 </body>
  

</html>
