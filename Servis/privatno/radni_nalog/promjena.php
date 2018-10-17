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

              $izraz->bindParam(":sifra",$_POST["sifra"]);          
              $izraz->bindParam(":radionica",$_POST["radionica"]);
              $izraz->bindParam(":vozilo",$_POST["vozilo"]);

              if($_POST["kilometraza"]==="0"){
                $izraz->bindParam(":kilometraza",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":kilometraza",$_POST["kilometraza"]);
              }
              if($_POST["opis_kvara"]==="0"){
                $izraz->bindParam(":opis_kvara",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":opis_kvara",$_POST["opis_kvara"]);
              }

              if($_POST["datum_pocetka"]==="0"){
                $izraz->bindParam(":datum_pocetka",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":datum_pocetka",$_POST["datum_pocetka"]);
              }

              if($_POST["datum_zavrsetka"]==="0"){
                $izraz->bindParam(":datum_zavrsetka",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":datum_zavrsetka",$_POST["datum_zavrsetka"]);
              }

              if($_POST["napomena"]==="0"){
                $izraz->bindParam(":napomena",null,PDO::PARAM_INT);
              }else{
                $izraz->bindParam(":napomena",$_POST["napomena"]);
              }
              
              

  $izraz->execute();
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from radni_nalog where sifra=:sifra");
  $izraz->execute($_GET);
  ////$o=$izraz->fetch(PDO::FETCH_OBJ);////////////
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
  <h3>Promijeni radni nalog</h3>
  <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
  
  <div class="grid-x">  
  <div class="cell large-4">
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
                        if(isset( $_POST["radionica"]) && $_POST["radionica"]==$red->sifra){
                            echo ' selected="selected" ';
                        }
                        ?>
                            value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>
                <?php endforeach;?>
            </select>
        </div>
        </div>
        <div class="cell large-4"></div>
        <div class="cell large-4">
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
                        if(isset($_POST["radionica"]) && $_POST["radionica"]==$red->sifra){
                            echo ' selected="selected" ';
                        }
                        ?>
                            value="<?php echo $red->sifra ?>"><?php echo $red->registarska_oznaka,' ',$red->marka_vozila,' ', $red->oznaka_modela?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
   </div>
 <hr />


 <div class="grid-x">
     <div class="cell large-6">
      <input autocomplete="off" type="text" id="uvjet" placeholder="Unesio dio imena ili zaposlenika" />
     </div>
     

     <div class="cell large-12">

     <?php
$izraz = $veza->prepare("

select a.sifra, a.ime, a.prezime
from zaposlenik a  join zaposlenik_radni_nalog b on 
a.sifra=b.zaposlenik where b.radni_nalog=:radni_nalog
order by a.prezime, a.ime
");
$izraz->execute(array("radni_nalog"=>$_POST["sifra"]));////////////
$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);


?>
<table>
<thead>
<tr>
<th>Ime</th>
<th>Prezime</th>

<th>Akcija</th>
</tr>
</thead>
<tbody id="podaci">
  <?php foreach($rezultati as $red):?>
    <tr>
    <td><?php echo $red->ime; ?></td>
    <td ><?php echo $red->prezime; ?></td>

    <td>
    <i id="s_<?php echo $red->sifra ?>" class="fas fa-trash fa-2x brisi" style="color: red;"></i>
    </td>
    </tr>
  <?php endforeach;?>
</tbody>
</table>
     </div>
   </div>

 
 <hr>

  
    <div class="floated-label-wrapper">
      <label for="opis_kvara">Opis kvara</label>
      <textarea  autocomplete="on"  id="opis_kvara" name="opis_kvara" placeholder="Opis kvara" ><?php echo $_POST["opis_kvara"] ?> </textarea>
    </div>
    
    <div class="grid-x">
    <div class="cell large-4">
    <div class="floated-label-wrapper">
      <label for="kilometraza">Kilometraža</label>
      <input value="<?php echo $_POST["kilometraza"] ?>" autocomplete="off" type="number" id="kilometraza" name="kilometraza" placeholder="Kilometraža" >
    </div>
    </div>

    <div class="cell large-4">
    <div class="floated-label-wrapper">
      <label for="datum_pocetka">Datum početka</label>
      <input value="<?php  echo  $_POST["datum_pocetka"] ?>" autocomplete="off" type="date" id="datum_pocetka" name="datum_pocetka" placeholder="Datum početka" >
    </div>
   </div>

    <div class="cell large-4">
    <div class="floated-label-wrapper">
          <label for="datum_zavrsetka">Datum završetka</label>
      <input value="<?php echo   $_POST["datum_zavrsetka"] ?>" autocomplete="off" type="date" id="datum_zavrsetka" name="datum_zavrsetka" placeholder="Datum završetka" >
    </div>
    </div>
    </div>
    
    <div class="floated-label-wrapper">
      <label for="napomena">Napomena</label>
      <textarea  autocomplete="off" id="napomena" name="napomena" placeholder="Napomena" ><?php echo $_POST["napomena"] ?> </textarea>
       
    </div>


    

 <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
            <input type="hidden" name="sifra" value="<?php echo  $_POST["sifra"] ?>" />

            <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
            </div>
          </div>    

    
  </form>
  
    

  <?php include_once "../../predlozak/podnozje.php" ?>
  <?php include_once "../../predlozak/skripte.php" ?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

   $("#uvjet").autocomplete({
          source:"traziZaposlenika.php?sifraRadnogNaloga=<?php echo $_GET["sifra"] ?>",
          minLength: 2,
    		focus: function(event,ui){
    			event.preventDefault();
    		},
    		select: function(event,ui){
    			event.preventDefault();
          if(ui.item.sifra==0){
            $("#ime").val($("#uvjet").val());
            $("#uvjet").val("");
           
           
          }else{
            spremi(ui.item);
          }
          
    		}
      }).data("ui-autocomplete")._renderItem=function(ul,objekt){
        return $("<li>").append("<a>"
         + objekt.ime + " " + objekt.prezime + "</a>").appendTo(ul);
      }



      function spremi(zaposlenik){
    
    $.ajax({
      type: "POST",
      url: "dodajZaposlenika.php",
      data: "grupa=<?php echo $_GET["sifra"] ?>&zaposlenik="+zaposlenik.sifra,
      success: function(vratioServer){
        //console.log(vratioServer);
        if (vratioServer==="OK"){
          //loše
          //location.reload();
            $("#podaci").append("<tr>" + 
            "<td>" + zaposlenik.ime + "</td>" + 
            "<td>" + zaposlenik.prezime + "</td>" + 
            
            "<td><i id=\"s_" + zaposlenik.sifra + "\" class=\"fas fa-trash fa-2x brisi\" style=\"color: red;\"></i></td>" + 
            + "</tr>");
            definirajBrisanje();
           
            $("#ime").val("");
            $("#prezime").val("");
            $("#uvjet").focus();
        }
        
      }
    });

  }

   function definirajBrisanje(){
        $(".brisi").click(function(){
        // console.log($(this).attr("id").split("_"));
        // console.log("kliknuo " + $(this).attr("id").split("_")[1]);
            var e = $(this);
          $.ajax({
            type: "POST",
            url: "obrisiZaposlenika.php",
            data: "radni_nalog=<?php echo $_GET["sifra"] ?>&zaposlenik="+e.attr("id").split("_")[1],
            success: function(vratioServer){
              //console.log(vratioServer);
              if (vratioServer==="OK"){
                e.parent().parent().remove();
                

              }
              
            }
          });
        });
      }

      definirajBrisanje();


  
  </script>
 
  </body>
</html>
