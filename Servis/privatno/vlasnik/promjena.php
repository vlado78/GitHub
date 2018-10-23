<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "index.php");
}

$greske=Array();

if(isset($_POST["promjeni"])){

  include_once "kontrola.php";

  if(count($greske)===0){

  $izraz = $veza->prepare("update vlasnik set 
              ime=:ime, 
              prezime=:prezime, 
              ulica_i_broj=:ulica_i_broj, 
              mjesto=:mjesto, 
              broj_mobitela=:broj_mobitela, 
              email=:email, 
              datum_rodjenja=:datum_rodjenja, 
              oib=:oib, 
              napomena=:napomena
              where sifra=:sifra;");

              $izraz->bindParam(":sifra",$_POST["sifra"]);
              $izraz->bindParam(":ime",$_POST["ime"]);
              $izraz->bindParam(":prezime",$_POST["prezime"]);

              if($_POST["ulica_i_broj"]==="0"){
                $izraz->bindValue(":ulica_i_broj",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":ulica_i_broj",$_POST["ulica_i_broj"]);
              }

              if($_POST["mjesto"]==="0"){
                $izraz->bindValue(":mjesto",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":mjesto",$_POST["mjesto"]);
              }

              if($_POST["broj_mobitela"]==="0"){
                $izraz->bindValue(":broj_mobitela",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":broj_mobitela",$_POST["broj_mobitela"]);
              }

              if($_POST["email"]==="0"){
                $izraz->bindValue(":email",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":email",$_POST["email"]);
              }

              if($_POST["datum_rodjenja"]== ""){
                $izraz->bindValue(":datum_rodjenja",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":datum_rodjenja",$_POST["datum_rodjenja"]);
              }

              if($_POST["oib"]==="0"){
                $izraz->bindValue(":oib",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":oib",$_POST["oib"]);
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

else{

    $izraz = $veza->prepare("select * from vlasnik where sifra=:sifra");
    $izraz->execute($_GET);
    $_POST=$izraz->fetch(PDO::FETCH_ASSOC);
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
  <h3>Promijeni vlasnika</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" 
  method="post">
  
  
  <?php include_once "osnovniPodaci.php" ?>
    
 <div class="grid-x">
            <div class="cell large-1"></div>

            <div class="cell large-4">
              <a href="index.php" class="alert button expanded rounded ">Nazad</a>
            </div>

            <div class="cell large-2"></div>
            
            <div class="cell large-4">
            <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"] ?>">
              <input class="button expanded rounded" type="submit" name="promjeni" value="Promjeni">
            </div>
          </div>    

    
  </form>
  
    

  <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  </div>
  </body>
  

</html>
